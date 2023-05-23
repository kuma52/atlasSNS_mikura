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

    //フォロー機能
    public function follow(User $user)
    {
        dd($user->id);
        $follower = Auth::User();
        //followしているかどうかをUserモデルからメソッド呼び出して判定
        $is_following = $follower->isFollowing($user->id);
        //もしフォローしていなかったら
        if (!$is_following) {
            //followする
            $follower->follow($user->id);
            // return redirect('/search');
            return back();
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
        if ($is_following) {
            //フォローを外す
            $follower->unfollow($user->id);
            // return redirect('/search');
            return back();
        }
    }

    //followListページ
    public function followList(Post $post, User $user, Follow $follow)
    {
        //following_idという変数で置換
        $following_id = Auth::user()->following()->pluck('followed_id');
        //following_idをもとに、postテーブルから投稿をひっぱり出す
        $follows_timeline = Post::with('user')->whereIn('user_id', $following_id)->latest()->get();
        //dd($follows_timeline);
        //usertableから直接値をとる(Userモデルを使って書く)
        $follow_icons = User::whereIn('id', $following_id)->get();
        //dd($follow_icons);

        return view(
            'follows.followList',
            compact(
                'follows_timeline',
                'follow_icons'
            )
        );
    }

    //followerListページ
    public function followerList()
    {
        $followed_id = Auth::user()->followed()->pluck('following_id');
        $followed_timeline = Post::with('user')->whereIn('user_id', $followed_id)->latest()->get();

        $followed_icons = User::whereIn('id', $followed_id)->get();

        return view('follows.followerList', compact('followed_timeline', 'followed_icons'));
    }
}
