@extends('layouts.logout')

@section('content')





<!-- フォーム -->
{!! Form::open() !!}
@csrf
<h2>新規ユーザー登録</h2>

<!-- エラーメッセージの表示 -->
@if ($errors->any())
  <div class="error-text">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  <br><br><!-- 後で<br>の代わりにCSSでmarginかpaddingつける -->
@endif
<!-- $errors->any()は、変数$errorsの中にエラーメッセージがあるかどうかチェックを行うメソッドです。エラーメッセージがあればtrue、なければfalseを戻します。 -->
<!-- $errors->all()にはバリデーションの中のチェックで発生したエラー情報が配列として保持しています。foreachを使用することで1つ1つのメッセージを取り出すことができます。 -->



<div class="inner-element">
{{ Form::label('ユーザー名') }}<br>
{{ Form::text('username',null,['class' => 'input']) }}
</div>
<div class="inner-element">
{{ Form::label('メールアドレス') }}<br>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="inner-element">
{{ Form::label('パスワード') }}<br>
{{ Form::password('password',['class' => 'input']) }}
</div>
<div class="inner-element">
{{ Form::label('パスワード確認') }}<br>
{{ Form::password('password_confirmation',['class' => 'input']) }}
</div>
<div class="btn-wrapper">{{ Form::submit('登録', ['class' => 'btn']) }}</div>

<p class="back"><a href="login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
