<?php $__env->startSection('content'); ?>





<!-- フォーム -->
<?php echo Form::open(); ?>

<?php echo csrf_field(); ?>
<h2>新規ユーザー登録</h2>

<!-- エラーメッセージの表示 -->
<?php if($errors->any()): ?>
  <div class="error-text">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
  <br><br><!-- 後で<br>の代わりにCSSでmarginかpaddingつける -->
<?php endif; ?>
<!-- $errors->any()は、変数$errorsの中にエラーメッセージがあるかどうかチェックを行うメソッドです。エラーメッセージがあればtrue、なければfalseを戻します。 -->
<!-- $errors->all()にはバリデーションの中のチェックで発生したエラー情報が配列として保持しています。foreachを使用することで1つ1つのメッセージを取り出すことができます。 -->



<div class="inner-element">
<?php echo e(Form::label('ユーザー名')); ?><br>
<?php echo e(Form::text('username',null,['class' => 'input'])); ?>

</div>
<div class="inner-element">
<?php echo e(Form::label('メールアドレス')); ?><br>
<?php echo e(Form::text('mail',null,['class' => 'input'])); ?>

</div>
<div class="inner-element">
<?php echo e(Form::label('パスワード')); ?><br>
<?php echo e(Form::password('password',['class' => 'input'])); ?>

</div>
<div class="inner-element">
<?php echo e(Form::label('パスワード確認')); ?><br>
<?php echo e(Form::password('password_confirmation',['class' => 'input'])); ?>

</div>
<div class="btn-wrapper"><?php echo e(Form::submit('登録', ['class' => 'btn'])); ?></div>

<p class="back"><a href="login">ログイン画面へ戻る</a></p>

<?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iamku\atlasSNS_mikura\resources\views/auth/register.blade.php ENDPATH**/ ?>