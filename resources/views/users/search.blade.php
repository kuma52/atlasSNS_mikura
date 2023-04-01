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
@if (!empty($kerword))
    <p>{{ $keyword }}</p>
@endif

<span class="bold line"></span><!-- グレーの線 -->

<!-- ページ遷移後すぐは、自分以外の全登録ユーザーを表示 -->
<!-- 検索かけたらその結果絞られたユーザーのみ表示 -->
<!-- アイコン、名前、ボタン（フォローする、解除）
//user_id は following_id -->
<div>
  <tr>
    <td><img src="storage/{{ $users -> images }}" alt="icon" class="icon-space"></td>
    <td>{{ $users -> username }}</td>
    <td><button>follow</button><button>unfollow</button></td>
  </tr>
</div>



@endsection
