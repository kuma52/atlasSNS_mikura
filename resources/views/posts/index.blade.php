<!-- 「top」ページ -->
@extends('layouts.login')

@section('content')
<h2>機能を実装していきましょう。</h2>
<!-- 投稿機能（アイコン、150字まで、「投稿内容を入力してください」、送信ボタン） -->
<img src="images/icon1" alt="my-icon">
<input type="text" value="投稿内容を入力してください。">
<input class="btn btn-submit" type="button" alt="送信">

<!-- タイムライン（自分、フォローしている人のアイコン、投稿、投稿日時を表示　自分の投稿には編集、削除ボタン） -->
<!-- 繰り返し（foreach） -->


@endsection
