<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PostsController extends Controller
{
    //
    public function index(){
        return view('posts.index');
    }

    //
    // public function login()
    // {
    //     $list = Post::get();
    //     return view('posts.index',['list'=>$list]);
    // }
}
