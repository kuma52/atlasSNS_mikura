<?php

namespace App\Http\Controllers\Auth;

use App\User;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Illuminate\Http\Request;
use Auth;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/top';//変更/homeから

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
       $this->middleware('guest');
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */


    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return \App\User
     */
    protected function create(array $data)
    {
        return User::create([
            'username' => $data['username'],
            'mail' => $data['mail'],
            'password' => bcrypt($data['password']),
        ]);
    }

    public function redirectPath()
    {
        return '/index';
    }

    public function register(Request $request){
        //メソッドpostでリクエストされたら
        if($request->isMethod('post')){
            //データをインプットする
            $data = $request->input();
            $username = $request->username;//→usernameをaddedページに渡すために定義

            //createする前にバリデーションをかける。バリデートメソッドを呼び出して使用
            $request->validate([
                'username' => 'required|string|min:2|max:12',
                'mail' => 'required|string|email|min:5|max:40|unique:users',
                'password' => 'required|string|min:8|max:20|confirmed'
            ]);

            //バリデーションをパスしたら先に書いておいたcreateメソッドを呼び出して使い、DBに登録される
            $this->create($data);

            return view('auth.added', ['username' => $username]);//上で定義したusernameを引数にしてページに反映させる
        }
        return view('auth.register');
    }


    public function added(){
        return view('auth.added');
    }


}
