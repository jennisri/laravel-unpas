<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\Blog;
use Illuminate\Database\Seeder;

class BlogSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // Blog::insert([
        //     [
        //         'title' => 'Judul Pertama',
        //         'category_id' => 2,
        //         'user_id' => 1,
        //         'slug' => 'judul-pertama',
        //         'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        //         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        //         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        //         ',
        //         'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        //         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        //         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        //         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        //         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        //         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>
        //         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        //         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        //         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        //         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        //         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
        //         'created_at' => date('Y-m-d H:i:s', time()),
        //         'updated_at' => date('Y-m-d H:i:s', time())
        //     ],
        //     [
        //         'title' => 'Judul Kedua',
        //         'category_id' => 2,
        //         'user_id' => 2,
        //         'slug' => 'judul-kedua',
        //         'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        //         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        //         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        //         ',
        //         'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        //         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        //         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        //         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        //         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        //         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>
        //         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        //         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        //         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        //         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        //         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
        //         'created_at' => date('Y-m-d H:i:s', time()),
        //         'updated_at' => date('Y-m-d H:i:s', time())
        //     ],
        //     [
        //         'title' => 'Judul Ketiga',
        //         'category_id' => 1,
        //         'user_id' => 2,
        //         'slug' => 'judul-ketiga',
        //         'excerpt' => 'Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        //         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        //         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        //         ',
        //         'body' => '<p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod
        //         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        //         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        //         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        //         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        //         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod</p><p>
        //         tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam,
        //         quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo
        //         consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse
        //         cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non
        //         proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>',
        //         'created_at' => date('Y-m-d H:i:s', time()),
        //         'updated_at' => date('Y-m-d H:i:s', time())
        //     ]
        // ]);

        Blog::factory(20)->create();
    }
}
