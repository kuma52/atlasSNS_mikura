@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="added-element bold">
  <p>{{ $username }}さん</p><!-- registercontrollerで定義した変数$username -->
  <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div class="added-element">
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>
  </div>

  <p><a href="login" class="btn">ログイン画面へ</a></p>
</div>

@endsection
