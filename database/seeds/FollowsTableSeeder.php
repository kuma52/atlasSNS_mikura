<?php

use Illuminate\Database\Seeder;
use App\Models\Follow;

class FollowsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //
        for ($i = 2; $i <= 10; $i++){
            Follow::create([
                'folloeing_id' => $i,
                'followed_id' => 1
            ]);
        }
    }
}
