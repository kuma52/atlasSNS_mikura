@extends('layouts.logout')

@section('content')

<div id="clear">
  <div class="added-element bold">
  <p>〇〇さん</p>
  <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div class="added-element">
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>
  </div>

  <p><a href="auth/login" class="btn">ログイン画面へ</a></p>
</div>

@endsection
