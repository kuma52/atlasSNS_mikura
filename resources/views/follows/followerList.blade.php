@extends('layouts.login')

@section('content')
<div>
    <h2>Follower List</h2>
    <!-- followしてるuserのアイコンを１０個ずつ横並びにする -->
    <!-- ↓アイコンクリックしたらその人のplofileページに遷移 -->
@foreach($followed_icons as $followed_icons)
    <tr>
        <td>
            <a href="users/{{ $followed_icons->id }}/user-profile">
                <img src="storage/{{ $followed_icons->images }}" alt="icon" class="icon-space">
            </a>
        </td>
    </tr>
@endforeach
</div>
<span class="bold line"></span><!-- グレーの線 -->

<!-- フォローしている人の投稿を新しい順に表示 -->
<!-- ｃｓｓはindexとほぼ一緒？ -->
@foreach($followed_timeline as $followed_timeline)
            <div class="timeline">
                <!-- ↓アイコンクリックしたらその人のplofileページに遷移 -->
                <a href=""><img src="storage/{{ $followed_timeline-> user-> images }}" alt="icon" class="icon-space"></a>
                <div class="">
                    <p>{{ $followed_timeline-> user-> username }}</p>
                    <p class="posts-area">{{ $followed_timeline -> post }}</p>
                </div>
                <div >
                    <p>{{ $followed_timeline -> created_at }}</p>
                </div>
            </div><!-- /timeline -->
      <!-- <div class="button-area">
      </div> -->
<span class="line thin"></span><!-- 細いグレーの線 -->
@endforeach

@endsection
