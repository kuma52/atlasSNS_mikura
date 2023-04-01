<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateFollowsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    //初めからあった記述をいったんコメントアウト
    // public function up()
    // {
    //     Schema::create('follows', function (Blueprint $table) {
    //         $table->integer('id')->autoIncrement();
    //         $table->integer('following_id');
    //         $table->integer('followed_id');
    //         $table->timestamp('created_at')->useCurrent();
    //         $table->timestamp('updated_at')->default(DB::raw('current_timestamp on update current_timestamp'));
    //     });
    // }　ここまで

    //ここからリレーションを張るための記述
    //→いらないかも？マイグレーションしてテーブル作成のための記述だたぽい
    public function up(){
        Schema::create('follows', function (Blueprint $table){
            $table -> id();
            $table -> bigInteger('following_id');
            $table -> bigInteger('followed_id');
            $table -> timestamps();
        });
    }//ここまで




    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('follows');
    }
}
