<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *データベース初期値設定の実行
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'username' => 'UserName',
            'mail' => 'User@mailaddress.com',
            'password' => bcrypt('password')
        ]);
    }
}
