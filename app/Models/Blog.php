<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Cviebrock\EloquentSluggable\Sluggable;

class Blog extends Model
{
    use HasFactory, Sluggable;

    // property yang boleh diisi
    // protected $fillable = ['title', 'excerpt', 'body'];

    // property yang tidak boleh diisi
    protected $guarded = [];

    // eager load bisa digunakan disini
    protected $with = ['author', 'category'];

    public function scopeFilter($query, array $filters)
    {
        // cari berdasarkan dua filter
        $query->when($filters['search'] ?? false, function($query, $search){
            return $query->where(function($query) use ($search) {
                $query->where('title', 'like', '%'.$search.'%')
                ->orWhere('body', 'like', '%'.$search.'%');
            });
        });

        $query->when($filters['category'] ?? false, function($query, $category){
            return $query->whereHas('category', function($query) use ($category){
                $query->where('slug', $category);
            });
        });

        // very pake arrow function
        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn($query) => 
                $query->where('username', $author)
            )
        );
    }

    // jika ingin menghubungkan model blog dengan model kategory
    // buat method dengan nama method sama dengan nama modelnya
    public function Category()
    {
        // satu blog itu hanya punya satu kategori
        return $this->belongsTo(Category::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // mengganti key pada route agar otomatis dari slug bukan id
    public function getRouteKeyName()
    {
        return 'slug';
    }

    // untuk slug otomatis dari title
    public function sluggable(): array
    {
        return [
            'slug' => [
                'source' => 'title'
            ]
        ];
    }
}
