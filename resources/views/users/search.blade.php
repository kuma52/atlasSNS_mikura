@extends('layouts.login')

@section('content')
<!-- ユーザー検索窓と検索ボタン -->
{!! Form::open(['route' => 'search'], ['method' => 'GET']) !!}
    {{Form::token()}}
    @csrf
    <div id="search">
      <div>
        <input type="text" name="keyword" value="" placeholder="ユーザー名">
        <button id="sbtn" type="submit">
            <i class="fa fa-search fa-lg"></i>
          </button>
    {!! Form::close() !!}
      </div>
      <div class="keyword">
<!-- 検索したら検索ワードを右に表示 -->
@if (!empty($keyword))
    <p>検索ワード：{{ $keyword }}</p>
@endif
      </div>
    </div>

<div class="line-wrapper"><span class="bold line"></span></div><!-- グレーの線 -->

<!-- 自分以外の全userリスト-->

@foreach($users as $users)
@if(Auth::id() != $users->id)
<div class="userlist-wrapper">
      <img src="storage/{{ $users -> images }}" alt="icon" class="icon-space">
      <p class="name-holder">{{ $users -> username }}</p>
      <div class="btn-holder">
      @if(Auth::user()->isFollowing($users->id))
        <a class="btn btn-danger" href="/users/{{$users->id}}/unfollow">フォロー解除</a>
      @else
        <a class="btn btn-primary" href="/users/{{$users->id}}/follow">フォローする</a>
      @endif
      </div>
</div>
@endif
@endforeach




@endsection
