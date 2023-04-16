<?php

use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *コマンドラインから呼び出せるようにクラスを登録
     * @return void
     */
    public function run()
    {
        $this->call([
            UsersTableSeeder::class,
            // PostsTableSeeder::class,
            // FollowsTableSeeder::class
        ]);
    }
}
