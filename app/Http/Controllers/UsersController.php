<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\User;
use App\Post;
use App\Follow;
use Illuminate\Support\facades\Auth;
use Illuminate\Support\Facades\Validator;

class UsersController extends Controller
{
    //     /**
    //  * Get a validator for an incoming registration request.
    //  *
    //  * @param  array  $data
    //  * @return \Illuminate\Contracts\Validation\Validator
    //  */

    //profileページの表示
    public function profile(){
        $id = Auth::id();
        //ログインしているユーザーの情報を受け取る
        $user = User::where('id', $id);
        return view('users.profile');
    }

    //profileのupdate
    public function profileUpdate(Request $request){
        //メソッドpostでリクエストされたら
        if($request->isMethod('post')){
            //フォームの値を別々の変数で取得
            $id = Auth::id();
            $username = $request->input('name');
            $mail = $request->input('mail');
            $password = $request->input('newpassword');
            $bio = $request->input('bio');

            //updateする前にバリデーションをかける。バリデートメソッドを呼び出して使用
            $request->validate([
                //'postしてきた値' => '検証ルール'
                'mail' => 'required|string|email|min:5|max:40|unique:users,mail,'.$id.',id',//$idとusersテーブルのidカラムが一致するレコードはルール対象外とする
                'bio' => 'max:150',
            ]);

            //バリデーション通過したらmodelからwhereでdataを検索→updateメソッドで更新する
            User::where('id', $id)->update([
                //'カラム名' => 上で取得した$変数
                'mail' => $mail,
                'bio' => $bio,
            ]);

            if(isset($username)) {
                $request->validate([
                    'name' => 'string|min:2|max:12',
                ]);
                //更新する
                User::where('id', $id)->update([
                    'username' => $username,
                ]);
            }

            //もしpasswordに値が入っていたら(nullでなければ)
            //→この条件を付けないと、パスワードがnullに更新されちゃった
            if(isset($password)) {
                $request->validate([
                    'newpassword' => 'string|min:8|max:20|confirmed',
                ]);
                //更新する
                User::where('id', $id)->update([
                    'password' => bcrypt($password),//暗号化
                ]);
            }

            //もしname="new_image"にファイルが入っていたら
            if($request->hasFile('new_image')){
                // $request->validate([
                //     'new_image' => 'nullable|mimes:jpg, png, bmp, gif, svg'
                // ]);
                //ファイル名を取得
                $filename = $request->file('new_image')->getClientOriginalName();
                //storeAsメソッドでファイルをpublicフォルダに格納
                $request->file('new_image')->storeAs('public/',$filename);
                //imageカラムを更新
                User::where('id', $id)->update([
                    'images' => $filename,
                ]);
            }
        }

        return redirect('profile');
    }



    //search機能 完了したからいじらない！
    public function search(Request $request){
        //DBから全てのuserデータを取り出す
        $users = User::all();
        //値を変数に入れる
        $keyword = $request->input('keyword');
        $query = User::query();

        //もし検索窓に値が入力されたら
        if(!empty($keyword)) {
            //名前かbioの中からキーワードをあいまい検索
            $query->where('username', 'LIKE', "%{$keyword}%")
            ->orwhere('bio', 'LIKE', "%{$keyword}%");
        }

        $users = $query->get();

        return view('users.search')->with([
            'users' => $users,
            'keyword' => $keyword
        ]);

        return redirect('users.search',['users'=>$users]);
    }

    //ログインユーザー以外のユーザーのプロフィールページ
    public function userProfile($id)
{
    $user = User::where('id', $id)->get();
    $users_timeline = Post::with('user')->where('user_id', $id)->latest()->get();
    return view('users.userProfile', compact('user', 'users_timeline'));
}

}
