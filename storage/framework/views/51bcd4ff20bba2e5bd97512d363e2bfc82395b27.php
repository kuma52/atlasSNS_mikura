<?php $__env->startSection('content'); ?>

<?php echo Form::open(); ?>

<?php echo csrf_field(); ?>
<h2>AtlasSNSへようこそ</h2>
<div class="inner-element">
<?php echo e(Form::label('e-mail')); ?><br>
<?php echo e(Form::text('mail',null,['class' => 'input'])); ?>

</div>
<div class="inner-element">
<?php echo e(Form::label('password')); ?><br>
<?php echo e(Form::password('password',['class' => 'input'])); ?>

</div>
<div class="btn-wrapper"><?php echo e(Form::submit('ログイン', ['class' => 'btn'])); ?></div>

<p><a href="register">新規ユーザーの方はこちら</a></p>

<?php echo Form::close(); ?>


<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.logout', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iamku\atlasSNS_mikura\resources\views/auth/login.blade.php ENDPATH**/ ?>