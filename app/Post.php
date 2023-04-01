<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    //指定したカラム（post他）にのみ登録や更新ができるようにする
    protected $fillable = [
        'post', 'username', 'mail', 'password', 'user_id'
    ];

    //postsは1つのuserに属する
    public function user()
    {
        return $this->belongsTo('App\User');
    }
}
