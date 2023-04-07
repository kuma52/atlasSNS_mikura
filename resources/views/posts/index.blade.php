<!-- 「top」ページ -->
@extends('layouts.login')

@section('content')
<!-- <h2>機能を実装していきましょう。</h2> -->
<!-- 投稿機能（アイコン、150字まで、「投稿内容を入力してください」、送信ボタン） -->
<div class="newpost-wrapper">
    <img src="storage/{{ Auth::user()->images }}" alt="my-icon" class="icon-space newpost-place">
    {!! Form::open(['url' => 'post/create']) !!}
    {{Form::token()}}
    @csrf
    {!! Form::input('text', 'post', null, ['required', 'class' => 'newpost', 'placeholder' => '投稿内容を入力してください']) !!}
    <input type="image" class="button" src="images/post.png" alt="送信"></input>
    {!! Form::close() !!}
</div>

@if ($errors->any())
  <div class="">
    <ul>
      @foreach ($errors->all() as $error)
      <li>{{ $error }}</li>
      @endforeach
    </ul>
  </div>
  <br>
@endif

<span class="bold line"></span><!-- グレーの線 -->

<!-- タイムライン（自分、フォローしている人のアイコン、投稿、投稿日時を表示　自分の投稿には編集、削除ボタン） -->
@foreach($list as $list)
<div class="timeline">
  <img src="storage/{{ $list->user->images }}" alt="icon" class="icon-space">
    <div class="">
      <p>{{ $list->user->username }}</p>
      <p class="posts-area">{{ $list->post }}</p>
    </div>
    <div >
      <p>{{ $list->created_at }}</p>
    </div>
</div><!-- /timeline -->
<!-- たぶんifを使って、自分以外の人の投稿にはボタンを出さないようにする -->
      <div class="button-area">
        <a href="" post="{{ $list->post }}" post_id="{{ $list->id }}" class="modal-open"><img src="images/edit.png" alt="編集"></a>
        <a href="/post/{{ $list->id }}/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')"><img src="images/trash.png" alt="削除"></a>
      </div>
<!-- えんどいふ -->
{!! Form::close() !!}

<span class="line thin"></span><!-- 細いグレーの線 -->
@endforeach

<!-- モーダル中身 -->
  <div class="modal">
      <div class="modal-bg"></div>
      <div class="modal-content">
          <form action="post/update" method="post">
              <textarea name="post" class="modal-post"></textarea>
              <input type="hidden" name="post_id" class="modal-id" value="">
              <input type="image" class="button" src="/images/edit.png" alt="更新">
              {{ csrf_field() }}
          </form>

          @if ($errors->any())
          <div class="">
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
