<?php

use Illuminate\Database\Seeder;
use App\Post;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 1; $i <= 10; $i++) {
            Post::create([
                'id' => $i,
                'user_id' => $username,//kokohen
                'post' => 'seederで作ったテスト投稿です' ,
                'created_at' => now(),
                'updated_at' => now()
            ]);
        }
    }
}
