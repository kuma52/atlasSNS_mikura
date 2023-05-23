<?php $__env->startSection('content'); ?>

<div id="clear">
  <div class="added-element bold">
  <p><?php echo e($username); ?>さん</p><!-- registercontrollerで定義した変数$username -->
  <p>ようこそ！AtlasSNSへ！</p>
  </div>
  <div class="added-element">
  <p>ユーザー登録が完了しました。</p>
  <p>早速ログインをしてみましょう。</p>
  </div>

  <p><a href="login" class="btn">ログイン画面へ</a></p>
</div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iamku\atlasSNS_mikura\resources\views/auth/added.blade.php ENDPATH**/ ?>