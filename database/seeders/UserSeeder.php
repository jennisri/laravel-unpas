<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\User;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        User::create([
            'name' => 'Sri Jenni Murniati',
            'username' => 'jenni',
            'email' => 'jenisrijeni123@gmail.com',
            'password' => bcrypt('password')
        ]);
        User::factory(3)->create();
        // User::insert([
        //     [
        //         'name' => 'Sri Jenni Murniati',
        //         'email' => 'srijenni622@gmail.com',
        //         'password' => bcrypt('12345')
        //     ],
        //     [
        //         'name' => 'Tiya Maharani',
        //         'email' => 'maharani@gmail.com',
        //         'password' => bcrypt('12345')
        //     ]
        // ]);
    }
}
