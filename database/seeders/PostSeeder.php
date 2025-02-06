<?php

namespace Database\Seeders;
use App\Http\Controllers\PostController;
use Illuminate\Database\Seeder;
use App\Models\Post;

class PostSeeder extends Seeder
{
    public function run()
    {
        \App\Models\Post::factory(500)->create(); 
    }
}
