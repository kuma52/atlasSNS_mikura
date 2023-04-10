<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8" />
    <!--IEブラウザ対策-->
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="description" content="ページの内容を表す文章" />
    <title>AtlasSNS</title>

    <!-- css -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ asset('css/reset.css') }} ">
    <link rel="stylesheet" href="{{ asset('css/style.css') }} ">

    <!--スマホ,タブレット対応-->
    <meta name="viewport" content="width=device-width,initial-scale=1" />
    <!--サイトのアイコン指定-->
    <link rel="icon" href="画像URL" sizes="16x16" type="image/png" />
    <link rel="icon" href="画像URL" sizes="32x32" type="image/png" />
    <link rel="icon" href="画像URL" sizes="48x48" type="image/png" />
    <link rel="icon" href="画像URL" sizes="62x62" type="image/png" />
    <!--iphoneのアプリアイコン指定-->
    <link rel="apple-touch-icon-precomposed" href="画像のURL" />
    <!--OGPタグ/twitterカード-->
</head>


<body>
    <header>
        <div id="head">
        <h1>
            <a href="/top"><img src="{{ asset('images/atlas.png') }}" alt="Atlas"></a>
        </h1>
            <div id="menu">
                <div id="username">
                    <p>{{ Auth::user()->username }}　さん　<span class="arrow"></span></p>
                </div>

                <!-- ナビゲーションメニュー -->
                <ul class="nav">
                    <li><a href="/top">ホーム</a></li>
                    <li><a href="/profile">プロフィール</a></li>
                    <li><a href="/logout">ログアウト</a></li>
                </ul>
                <img src="{{ \Storage::url(Auth::user()->images) }}" alt="my-icon" class="my-icon icon-space">
            </div>
        </div>
    </header>


    <div id="row">
        <div id="container">
            @yield('content')
        </div >
        <div id="side-bar">
            <div id="confirm">
                <p class="left">{{ Auth::user()->username }}　さんの</p>
                <div class="d-flex wrapper">
                    <p class="left">フォロー数</p>
                    <p class="left">{{ Auth()->user()->following->count() }}名</p>
                </div>
                <p class="btn-position"><a href="/follow-list" class="btn btn-primary">フォローリスト</a></p>
                <div class="d-flex wrapper">
                    <p class="left">フォロワー数</p>
                    <p class="left">{{ Auth()->user()->followed->count() }}名</p>
                </div>
                <p class="btn-position"><a href="/follower-list" class="btn btn-primary">フォロワーリスト</a></p>
            </div>

            <span class="line short"></span><!-- 横線 -->

            <p class="pt-5"><a href="/search" class="btn btn-primary">ユーザー検索</a></p>
        </div>
    </div>
    <footer>
    </footer>

    <!-- js -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="{{ asset('js/app.js') }}" defer></script>
    <script src="{{ asset('js/login.js') }}" defer></script>

</body>
</html>
