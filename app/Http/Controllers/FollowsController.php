<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Follow;
//use App\Http\Controllers\Controller;//いる？３．３１
use App\User;

class FollowsController extends Controller
{
    //
    public function followList(){

        return view('follows.followList');
    }


    //follow
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
    // //unfollow
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
