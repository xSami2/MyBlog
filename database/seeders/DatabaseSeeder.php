<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Post;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{

    public function run()
    {
       User::truncate();
       Post::truncate();
       Category::truncate();
        $user =
            User::factory()->create([
                'name'=>'John Doe'
            ]);


        Post::factory(5)->create([
           'user_id' =>$user->id
       ]);





    }
}
