@extends('layouts.login')

@section('content')
<div class="follow-icons">
    <h2>Follower List</h2>
    <!-- followしてるuserのアイコンを１０個ずつ横並びにする -->
    <!-- ↓アイコンクリックしたらその人のplofileページに遷移 -->
    <div class="followicon-wrapper">
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
</div>

<div class="line-wrapper"><span class="bold line"></span></div><!-- グレーの線 -->

<!-- フォローしている人の投稿を新しい順に表示 -->
@foreach($followed_timeline as $followed_timeline)
            <div class="timeline">
                <a href="users/{{ $followed_timeline->user->id }}/user-profile">
                    <img src="storage/{{ $followed_timeline-> user-> images }}" alt="icon" class="icon-space">
                </a>
                <div class="padding-left">
                    <p class="timeline-content bold-text">{{ $followed_timeline-> user-> username }}</p>
                    <p class="posts-area timeline-content">{{ $followed_timeline -> post }}</p>
                </div>
                <div class="timeline-content created-at">
                    <p>{{ $followed_timeline -> created_at }}</p>
                </div>
            </div><!-- /timeline -->

<div class="thin-wrapper"><span class="line thin"></span></div><!-- 細いグレーの線 -->
@endforeach

@endsection
