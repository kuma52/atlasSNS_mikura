<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\follow;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'username', 'mail', 'password', 'bio', 'images',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    //一人のuserが複数の投稿を持つ、一対多の関係
    public function posts()
    {
        return $this->hasMany('App\Post');
    }

    //多対多のリレーション
    //フォローしているユーザーを取得
    public function following()
    {
        return $this -> belongsToMany('App\User', 'follows','following_id','followed_id')->withTimestamps();
    }

    // //フォローされているユーザーを取得
    public function followed()
    {
        return $this -> belongsToMany('App\User', 'follows', 'following_id', 'followed_id')->withTimestamps();
    }


//belongsToMany('①最終的な接続先モデル名','②中間テーブル名','③接続先モデルIDを示す中間テーブル内のカラム名','④接続元モデルIDのカラム名','⑤接続先モデルIDのカラム名','⑥最終的な接続先モデルIDのカラム名')

//●リレーション元のusersテーブルのidと、followee_idが紐づいている
//●リレーション先のusersテーブルとfollower_idが紐づいている
//→このような関係性の場合は第三、第四引数は省略せずに中間テーブルのカラム名の記述をします。
//※中間テーブルカラム名【リレーション元・先のテーブル名の単数形＿id】という規則性に当てはまらない


  //上に書いたリレーションのメソッド(followingとfollowed)を使用して
    //フォローする
    public function follow(Int $user_id)
    {
        return $this->following()->attach($user_id);
    }
    //フォロー解除する
    public function unfollow(Int $user_id)
    {
        return $this->following()->detach($user_id);
    }
    //フォローしているかどうか
    public function isFollowing(Int $user_id){
        return (boolean) $this->following()->where('followed_id',$user_id)->first();
    }
    //フォローされているかどうか
    public function isFollowed(Int $user_id){
        return (boolean) $this->followed()->where('following_id',$user_id)->first();
    }

}
