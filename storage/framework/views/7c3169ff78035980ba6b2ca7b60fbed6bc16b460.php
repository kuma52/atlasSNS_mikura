<?php $__env->startSection('content'); ?>

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

    <?php echo Form::open(['route' => ['profileUpdate'], 'method' => 'POST', "enctype" => "multipart/form-data" ]); ?>

    <?php echo e(Form::token()); ?>

    <?php echo csrf_field(); ?>

<table id="profile">
  <tbody>
    <tr>
      <td class="icon-wrapper"><p><img src="storage/<?php echo e(Auth::user()->images); ?>" alt="my-icon" class="icon-space"></p></td>
      <td>user name</td>
      <td class="p-content"><?php echo e(Form::text('name', Auth::user()->username, ['class' => 'update'])); ?></td>
    </tr>
    <tr>
      <td></td>
      <td>mail address</td>
      <td class="p-content"><?php echo e(Form::text('mail', Auth::user()->mail,['class' => 'update'])); ?></td>
    </tr>
    <tr>
      <td></td>
      <td>password</td>
      <td class="p-content"><?php echo e(Form::password('newpassword',['class' => 'update'])); ?></td>
    </tr>
    <tr>
      <td></td>
      <td>password confirm</td>
      <td class="p-content"><?php echo e(Form::password('newpassword_confirmation',['class' => 'update'])); ?></td>
    </tr>
    <tr>
      <td></td>
      <td>bio</td>
      <td class="p-content"><?php echo e(Form::text('bio', Auth::user()->bio, ['class' => 'update'])); ?></td>
    </tr>
    <tr>
      <td></td>
      <td>icon image</td>
      <td class="icon-form">
          <label for="file-upload" class="file-space">
              <input type="file" name="new_image" class="update-image" id="file-upload" accept=".jpg, .png, .bmp, .gif, .svg">
          </label>
      </td>
    </tr>
  </tbody>
</table>

<div id="update-btn">
<?php echo e(Form::submit('更新',['class'=>'btn btn-danger update-btn'])); ?>

</div>

<?php echo Form::close(); ?>



<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iamku\atlasSNS_mikura\resources\views/users/profile.blade.php ENDPATH**/ ?>