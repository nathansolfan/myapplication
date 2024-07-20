<?php

namespace Database\Seeders;

use App\Models\Post;
use App\Models\User;
// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // if no factory, Post:: import
        // User::factory(10)->create();
        // will create 10 users based on UserFactory, no need of it

        Post::factory(15)->create();
    }
}
