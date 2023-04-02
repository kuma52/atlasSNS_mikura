<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){

        return view('follows.followList');
    }

        //フォロー機能3回目
    public function follow(User $user)
    {
        dd($user->id);
        $follower = Auth::User();
        //followしているかどうかをUserモデルからメソッド呼び出して判定
        $is_following = $follower->isFollowing($user->id);
        //もしフォローしていなかったら
        if(!$is_following) {
            //followする
            $follower->follow($user->id);
            return back();
        }
    }

    //フォローを外す3回目
    public function unfollow(User $user)
    {
        //dd($user);
        $follower = Auth::User();
        //followしているかどうかをUserモデルからメソッド呼び出して判定
        $is_following = $follower->isFollowing($user->id);
        //もしフォローしていたら
        if($is_following) {
            //フォローを外す
            $follower->unfollow($user->id);
            return back();
        }
    }

    //follow２
    // public function follow(User $user)
    // {
    //     //var_dump($user->id);
    //     //$id = User::all();
    //     //$id = User::where('id');
    //     //$user = User::find($id);
    //     var_dump($user);
    //     //$follower = auth()->user();
    //     $follower = Auth::user();
    //     //フォローしているか
    //     $is_following = $follower->isFollowing($user->id);
    //     if(!$is_following) {
    //         //フォローしていなければフォローする
    //         $follower->follow($user->id);
    //         return back();
    //     }
    // }
    // //unfollow２
    // public function unfollow(User $user)
    // {
    //     $follower = auth()->user();
    //     //フォローしているか
    //     $is_following = $follower->isFollowing($user->id);
    //     if($is_following) {
    //         //フォローしていなければフォロー解除する
    //         $follower->unfollow($user->id);
    //         return back();
    //     }
    // }

    //フォローする機能
    // public function follows(Request $request)
    // {
    //     Follows::firstOrCreate([
    //         'followed_id' => $request->post_user,
    //         'following_id' => $request->auth_user
    //     ]);
    //     return true;
    // }

    // public function unfollow(Request $request)
    // {
    //     $follow = Follows::where('followed_id', $request->post_user)
    //         ->where('following_id', $request->auth_user)
    //         ->first();
    //     if ($follow) {
    //         $follow->delete();
    //         var_dump($follow);//デバッグ
    //         return false;
    //     }
    // }
    //user_id は following_id
    // public function store($followingId){
    //     Auth::users()->follows()->attach($followingId);
    //     return;
    // }

    public function followerList(){
        return view('follows.followerList');
    }
}
