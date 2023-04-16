<!-- 「top」ページ -->
@extends('layouts.login')

@section('content')
<!-- 新規投稿エリア -->
<div class="newpost-wrapper">
    <div class="icon-wrapper"><img src="storage/{{ Auth::user()->images }}" alt="my-icon" class="icon-space newpost-place"></div>
    {!! Form::open(['url' => 'post/create']) !!}
    {{Form::token()}}
    @csrf
    {!! Form::input('text', 'post', null, ['required', 'class' => 'newpost', 'placeholder' => '投稿内容を入力してください']) !!}
    <input type="image" class="button" src="images/post.png" alt="送信"></input>
    {!! Form::close() !!}
</div>

@if ($errors->any())
  <div class="error-text">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  <br>
@endif

<div class="line-wrapper"><span class="bold line"></span></div><!-- グレーの線 -->

<!-- タイムライン -->
@foreach($list as $list)
<div class="timeline">
  <img src="storage/{{ $list->user->images }}" alt="icon" class="icon-space">
    <div>
      <p class="timeline-content bold-text">{{ $list->user->username }}</p>
      <p class="timeline-content posts-area">{{ $list->post }}</p>
    </div>
    <div class="timeline-content created-at">
      <p>{{ $list->created_at }}</p>
    </div>
</div><!-- /timeline -->
<!-- 自分以外の投稿にはボタンを出さない = postsテーブルのuser_idとログインuserのidが一致したらボタンを出す -->
      @if($list->user_id == Auth::id())
        <div class="button-area">
          <a href="" post="{{ $list->post }}" post_id="{{ $list->id }}" class="modal-open">
            <img class="btn" src="images/edit3.png" alt="編集">
          </a>
          <a href="/post/{{ $list->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
            <div class="trash-container">
              <img src="images/trash-h3.png" class="trash-h" alt="削除">
              <img class="btn" src="images/trash2.png" alt="削除">
            </div>
          </a>
        </div>
      @endif
{!! Form::close() !!}

<div class="thin-wrapper"><span class="line thin"></span></div><!-- 細いグレーの線 -->
@endforeach

<!-- モーダル中身 -->
  <div class="modal">
      <div class="modal-bg"></div>
      <div class="modal-content">
          <form action="post/update" method="post">
              <textarea name="post" class="modal-post"></textarea>
              <input type="hidden" name="post_id" class="modal-id" value="">
              <input type="image" class="button" src="/images/edit3.png" alt="更新">
              {{ csrf_field() }}
          </form>

          @if ($errors->any())
          <div class="error-text">
            <ul>
              @foreach ($errors->all() as $error)
              <li>{{ $error }}</li>
              @endforeach
            </ul>
          </div>
          <br>
          @endif
      </div>
  </div>

@endsection
