<?php

namespace App\Models;

// use Illuminate\Database\Eloquent\Factories\HasFactory;
// use Illuminate\Database\Eloquent\Model;

class Blog
{
    // use HasFactory;
    private static $blog_post = [
        [
            "title" => 'Judul Tulisan Pertama',
            "slug" => 'judul-tulisan-pertama',
            "author" => 'Sandhika Galih',
            "body" => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam esse mollitia eligendi, maiores reprehenderit, veritatis sit officia ab ratione debitis atque libero quas officiis perspiciatis nulla autem magni exercitationem odio Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas eveniet id numquam accusantium. Saepe, eveniet temporibus deleniti, veniam maxime enim repudiandae amet natus culpa eum sint sit sapiente dolores quod.'
        ],

        [
            "title" => 'Judul Tulisan kedua',
            "slug" => 'judul-tulisan-kedua',
            "author" => 'Sri Jenni Murniati',
            "body" => 'Lorem ipsum dolor sit amet consectetur, adipisicing elit. Ullam esse mollitia eligendi, maiores reprehenderit, veritatis sit officia ab ratione debitis atque libero quas officiis perspiciatis nulla autem magni exercitationem odio Lorem ipsum dolor sit amet consectetur adipisicing elit. Voluptas eveniet id numquam accusantium. Saepe, eveniet temporibus deleniti, veniam maxime enim repudiandae amet natus culpa eum sint sit sapiente dolores quod.'
        ],

    ];

    public static function all()
    {
        return collect(self::$blog_post);
    }

    public static function find($slug)
    {
        $blogs = static::all();

        // $blog = [];
        // foreach ($blogs as $b) {
        //     if($b['slug'] === $slug) {
        //         $blog = $b;
        //     }
        // }

        return $blogs->firstWhere('slug', $slug);
    }
}
