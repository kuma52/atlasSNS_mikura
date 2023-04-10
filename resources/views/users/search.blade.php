@extends('layouts.login')

@section('content')
<!-- ユーザー検索窓と検索ボタン -->
{!! Form::open(['route' => 'search'], ['method' => 'GET']) !!}
    {{Form::token()}}
    @csrf
        <input type="text" name="keyword" value="">
        <input type="submit" value="検索">
    {!! Form::close() !!}
<!-- 検索したら検索ワードを右に表示 -->
@if (!empty($keyword))
    <p>検索ワード：{{ $keyword }}</p>
@endif

<span class="bold line"></span><!-- グレーの線 -->

<!-- 自分以外の全userリスト-->

@foreach($users as $users)
@if(Auth::id() != $users->id)
<div class="userlist-wrapper">
  <div class="userlist">
  <tr>
    <td>
      <img src="storage/{{ $users -> images }}" alt="icon" class="icon-space">
    </td>
    <td class="name-holder">{{ $users -> username }}</td>
    <td>
      @if(Auth::user()->isFollowing($users->id))
        <a class="" href="/users/{{$users->id}}/unfollow">unfollow</a>
      @else
        <a class="" href="/users/{{$users->id}}/follow">follow</a>
      @endif
    </td>
  </tr>
  </div>
</div>
@endif
@endforeach




@endsection
