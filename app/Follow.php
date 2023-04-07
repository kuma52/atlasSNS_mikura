<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Follow extends Model
{
    protected $fillable = ['followed_id','following_id',];
    //

    //一つのidが複数の？？
    // public function dummy()
    // {
    //     return $this->hasMany('App\')
    // }

}
