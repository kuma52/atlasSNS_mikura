@extends('layouts.login')

@section('content')
<div class="follow-icons">
    <h2>Follow List</h2>
    <div class="followicon-wrapper">
@foreach($follow_icons as $follow_icons)
    <tr>
        <td>
            <a href="users/{{ $follow_icons->id }}/user-profile">
                <img src="storage/{{ $follow_icons->images }}" alt="icon" class="icon-space">
            </a>
        </td>
    </tr>
@endforeach
    </div>
</div>

<div class="line-wrapper"><span class="bold line"></span></div><!-- グレーの線 -->

<!-- フォローしている人の投稿を新しい順に表示 -->
@foreach($follows_timeline as $follows_timeline)
            <div class="timeline">
                <a href="users/{{ $follows_timeline->user->id }}/user-profile">
                    <img src="storage/{{ $follows_timeline->user->images }}" alt="icon" class="icon-space">
                </a>
                <div class="padding-left">
                    <p class="timeline-content bold-text">{{ $follows_timeline->user->username }}</p>
                    <p class="posts-area timeline-content">{{ $follows_timeline->post }}</p>
                </div>
                <div class="timeline-content created-at">
                    <p>{{ $follows_timeline->created_at }}</p>
                </div>
            </div><!-- /timeline -->

<div class="thin-wrapper"><span class="line thin"></span></div><!-- 細いグレーの線 -->
@endforeach

@endsection
