@extends('layouts.login')

@section('content')
<div>
    <h2>Follow List</h2>
    <!-- followしてるuserのアイコンを１０個ずつ横並びにする -->
    <!-- ↓アイコンクリックしたらその人のplofileページに遷移 -->
@foreach($follow_icons as $follow_icons)
    <tr>
        <td>
            <a href="users/{{ $follow_icons->id }}/user-profile"><img src="storage/{{ $follow_icons->images }}" alt="icon" class="icon-space"></a>
        </td>
    </tr>
@endforeach
</div>
<span class="bold line"></span><!-- グレーの線 -->

<!-- フォローしている人の投稿を新しい順に表示 -->
<!-- ｃｓｓはindexとほぼ一緒？ -->
@foreach($follows_timeline as $follows_timeline)
            <div class="timeline">
                <!-- ↓アイコンクリックしたらその人のplofileページに遷移 -->
                <a href="users/{{ $follows_timeline->user->id }}/user-profile"><img src="storage/{{ $follows_timeline->user->images }}" alt="icon" class="icon-space"></a>
                <div class="">
                    <p>{{ $follows_timeline->user->username }}</p>
                    <p class="posts-area">{{ $follows_timeline->post }}</p>
                </div>
                <div >
                    <p>{{ $follows_timeline->created_at }}</p>
                </div>
            </div><!-- /timeline -->
      <!-- <div class="button-area">
      </div> -->
<span class="line thin"></span><!-- 細いグレーの線 -->
@endforeach

@endsection
