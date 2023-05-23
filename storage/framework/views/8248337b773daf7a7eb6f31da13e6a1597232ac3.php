<!DOCTYPE html>
<html>
<head>
  <meta charset="utf-8" />
  <!--IEブラウザ対策-->
  <meta http-equiv="X-UA-Compatible" content="IE=edge" />
  <meta name="description" content="ページの内容を表す文章" />
  <title>AtlasSNS</title>
  <link rel="stylesheet" href="<?php echo e(asset('css/reset.css')); ?> ">
  <link rel="stylesheet" href="<?php echo e(asset('css/logout.css')); ?> ">
  <!-- <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous"> -->
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
    <h1><img src="images/atlas.png" alt="Atlas"></h1>
    <p class="sub-title">Social Network Service</p>
  </header>
  <div id="container">
    <?php echo $__env->yieldContent('content'); ?>
  </div>
  <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
  <script src="JavaScriptファイルのURL"></script>
</body>
</html>
<?php /**PATH C:\Users\iamku\atlasSNS_mikura\resources\views/layouts/logout.blade.php ENDPATH**/ ?>