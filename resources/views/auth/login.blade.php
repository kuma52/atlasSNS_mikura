@extends('layouts.logout')

@section('content')

{!! Form::open() !!}

<h2>AtlasSNSへようこそ</h2>
<div class="inner-element">
{{ Form::label('e-mail') }}<br>
{{ Form::text('mail',null,['class' => 'input']) }}
</div>
<div class="inner-element">
{{ Form::label('password') }}<br>
{{ Form::password('password',['class' => 'input']) }}
</div>
<div class="btn-wrapper">{{ Form::submit('ログイン', ['class' => 'btn']) }}</div>
<!-- <input class="btn" type="submit" value="ログイン"> -->

<p><a href="/register">新規ユーザーの方はこちら</a></p>

{!! Form::close() !!}

@endsection
