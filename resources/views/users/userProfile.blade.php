@extends('layouts.login')

@section('content')
@foreach($user as $user)
<table>
    <tbody>
        <tr>
            <td class="icon-wrapper"><img src="{{ \Storage::url($user->images) }}" alt="icon" class="icon-space"></td>
            <td>name</td>
            <td>{{ $user->username }}</td>
        </tr>
        <tr>
            <td>bio</td>
            <td>{{ $user->bio }}</td>
        </tr>
    </tbody>
      @if(Auth::user()->isFollowing($user->id))
        <a class="" href="/users/{{$user->id}}/unfollow">unfollow</a>
      @else
        <a class="" href="/users/{{$user->id}}/follow">follow</a>
      @endif
</table>
@endforeach
<div>
    <!-- アイコン、名前、bio、フォロー/アンフォローボタン -->
</div>
<span class="bold line"></span><!-- グレーの線 -->

<!-- そのuserの投稿を新しい順に表示 -->
<!-- ｃｓｓはindexとほぼ一緒？ -->
@foreach($users_timeline as $users_timeline)
            <div class="timeline">
                <img src="{{ \Storage::url($users_timeline->user->images) }}" alt="icon" class="icon-space">
                <div class="">
                    <p>{{ $users_timeline->user->username }}</p>
                    <p class="posts-area">{{ $users_timeline->post }}</p>
                </div>
                <div >
                    <p>{{ $users_timeline->created_at }}</p>
                </div>
            </div><!-- /timeline -->
<span class="line thin"></span><!-- 細いグレーの線 -->
@endforeach

@endsection
