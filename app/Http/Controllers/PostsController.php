<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Post; //以下追加した
use App\User;
use App\Follow;
use Illuminate\Support\facades\Auth;
use App\Http\Request\PostRequest;
use Illuminate\Support\Facades\Validator;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Redirect;

class PostsController extends Controller
{
    //auth認証を適用
    public function __construct()
    {
        $this->middleware('auth');
    }

    //topページviewの表示
    public function index()
    {
        //postsテーブルから新着順で全てのレコードを取得する
        //$list = Post::latest()->get();
        //postsテーブルから新着順で、自分と自分がfollowしている人のレコードをすべて取得する
        $list = Post::query()->whereIn('user_id', Auth::user()->following()->pluck('followed_id'))->orWhere('user_id', Auth::user()->id)->latest()->get();
        //'表示したいファイル名'[受け渡したいデータ名]
        return view('posts.index', ['list' => $list]);
    }

    public function followList()
    {
        return view('follows.followList');
    }

    public function followerList()
    {
        return view('follows.followerList');
    }

    //投稿機能
    public function create(Request $request)
    {
        $post = $request->input('post'); //formに入力されるtext
        $user_id = Auth::id(); //ログインしているuserのidを取得
        //create前にバリデーションかける
        $request->validate([
            'post' => 'required|min:1|max:200',
        ]);
        //バリデーション通過したらcreate
        Post::create([
            'post' => $post, 'user_id' => $user_id
        ]);

        return redirect('top');
    }


    //投稿のdeleteメソッド
    public function delete($id)
    {
        Post::where('id', $id)->delete();
        return redirect('top');
    }

    //投稿のupdateメソッド
    public function update(Request $request)
    {
        //フォームの値を別々の変数で取得
        $id = $request->input('post_id');
        $up_post = $request->input('post');

        //update前にバリデーションかける
        $request->validate([
            'post' => 'required|min:1|max:200',
        ]);
        // //もしバリデーションに引っかかったら、
        // if($request->fails()){
        //     //モーダル画面に戻る
        //     return back();
        // }
        //バリデーション通過したらupdate
        Post::where('id', $id)->update([
            'post' => $up_post
        ]);

        return redirect('top');
    }

    // public function update(Request $request)
    // {
    //     //フォームの値を別々の変数で取得
    //     $id = $request->input('post_id');
    //     $up_post = $request->input('post');

    //     $validate = Validator::make($request->all(),[
    //         'post' => 'required|min:1|max:200',
    //     ]);

    //     if($validate->fails()){
    //         return back();
    //     }
    //     //バリデーション通過したらupdate
    //     Post::where('id', $id)->update([
    //         'post' => $up_post
    //     ]);

    //     return redirect('top');
    // }
}
