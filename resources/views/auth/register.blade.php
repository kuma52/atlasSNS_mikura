@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>新規ユーザー登録</h2>
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
{{ Form::text('password',null,['class' => 'input']) }}
</div>
<div class="inner-element">
{{ Form::label('パスワード確認') }}<br>
{{ Form::text('password-confirm',null,['class' => 'input']) }}
</div>
<div class="btn-wrapper">{{ Form::submit('登録', ['class' => 'btn']) }}</div>

<p class="back"><a href="/login">ログイン画面へ戻る</a></p>

{!! Form::close() !!}


@endsection
