@extends('layouts.login')

@section('content')
    <!-- アイコン、名前、bio、フォロー/アンフォローボタン -->
<div id="user-profile">
    @foreach($user as $user)
    <div>
        <table>
            <tbody>
                <tr>
                    <td class="icon-wrapper">
                        <img src="{{ \Storage::url($user->images) }}" alt="icon" class="icon-space">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="item">name</td>
                    <td class="content">{{ $user->username }}</td>
                </tr>
                <tr>
                    <td></td>
                    <td class="item">bio</td>
                    <td class="content">{{ $user->bio }}</td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="btn-area">
        @if(Auth::user()->isFollowing($user->id))
            <a class="btn btn-danger" href="/users/{{$user->id}}/unfollow">フォロー解除</a>
        @else
            <a class="btn btn-primary" href="/users/{{$user->id}}/follow">フォローする</a>
        @endif
    </div>
@endforeach
</div>

<div class="line-wrapper"><span class="bold line"></span></div><!-- グレーの線 -->

<!-- このuserの投稿を新しい順に表示 -->
@foreach($users_timeline as $users_timeline)
            <div class="timeline">
                <img src="{{ \Storage::url($users_timeline->user->images) }}" alt="icon" class="icon-space">
                <div>
                    <p class="timeline-content bold-text">{{ $users_timeline->user->username }}</p>
                    <p class="timeline-content posts-area">{{ $users_timeline->post }}</p>
                </div>
                <div class="timeline-content created-at">
                    <p>{{ $users_timeline->created_at }}</p>
                </div>
            </div><!-- /timeline -->

<span class="line thin"></span><!-- 細いグレーの線 -->
@endforeach

@endsection
