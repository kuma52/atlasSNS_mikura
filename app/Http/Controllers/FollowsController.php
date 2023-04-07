<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;
use App\Post;
use Illuminate\Support\Facades\Auth;

class FollowsController extends Controller
{
    //
    public function followList()
    {
        // $follows_timeline = Post::query()->whereIn('user_id', Auth::user()->following()->pluck('followed_id'))->latest()->get();
        $following_id = Auth::user()->following()->pluck('followed_id');
        $follows_timeline = Post::with('user')->whereIn('user_id',$following_id)->latest()->get();

        return redirect('/follows/followList', compact('follows_timeline'));
    }

        //フォロー機能
    public function follow(User $user)
    {
        //dd($user->id);値渡せた！
        $follower = Auth::User();
        //followしているかどうかをUserモデルからメソッド呼び出して判定
        $is_following = $follower->isFollowing($user->id);
        //もしフォローしていなかったら
        if(!$is_following) {
            //followする
            $follower->follow($user->id);
            return redirect('/search');
        }
    }

    //フォローを外す
    public function unfollow(User $user)
    {
        //dd($user->id);
        $follower = Auth::User();
        //followしているかどうかをUserモデルからメソッド呼び出して判定
        $is_following = $follower->isFollowing($user->id);
        //もしフォローしていたら
        if($is_following) {
            //フォローを外す
            $follower->unfollow($user->id);
            return redirect('/search');
        }
    }

    public function followerList(){
        return view('follows.followerList');
    }
}
