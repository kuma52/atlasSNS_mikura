<!-- 「top」ページ -->


<?php $__env->startSection('content'); ?>
<!-- 新規投稿エリア -->
<div class="newpost-wrapper">
    <div class="icon-wrapper"><img src="storage/<?php echo e(Auth::user()->images); ?>" alt="my-icon" class="icon-space newpost-place"></div>
    <?php echo Form::open(['url' => 'post/create']); ?>

    <?php echo e(Form::token()); ?>

    <?php echo csrf_field(); ?>
    <?php echo Form::input('text', 'post', null, ['required', 'class' => 'newpost', 'placeholder' => '投稿内容を入力してください']); ?>

    <input type="image" class="button" src="images/post.png" alt="送信"></input>
    <?php echo Form::close(); ?>

</div>

<?php if($errors->any()): ?>
  <div class="error-text">
    <ul>
      <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
      <li><?php echo e($error); ?></li>
      <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>
  </div>
  <br>
<?php endif; ?>

<div class="line-wrapper"><span class="bold line"></span></div><!-- グレーの線 -->

<!-- タイムライン -->
<?php $__currentLoopData = $list; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $list): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="timeline">
  <img src="storage/<?php echo e($list->user->images); ?>" alt="icon" class="icon-space">
    <div>
      <p class="timeline-content bold-text"><?php echo e($list->user->username); ?></p>
      <p class="timeline-content posts-area"><?php echo e($list->post); ?></p>
    </div>
    <div class="timeline-content created-at">
      <p><?php echo e($list->created_at); ?></p>
    </div>
</div><!-- /timeline -->
<!-- 自分以外の投稿にはボタンを出さない = postsテーブルのuser_idとログインuserのidが一致したらボタンを出す -->
      <?php if($list->user_id == Auth::id()): ?>
        <div class="button-area">
          <a href="" post="<?php echo e($list->post); ?>" post_id="<?php echo e($list->id); ?>" class="modal-open">
            <img class="btn" src="images/edit3.png" alt="編集">
          </a>
          <a href="/post/<?php echo e($list->id); ?>/delete" onclick="return confirm('この投稿を削除します。よろしいでしょうか？')">
            <div class="trash-container">
              <img src="images/trash-h3.png" class="trash-h" alt="削除">
              <img class="btn" src="images/trash2.png" alt="削除">
            </div>
          </a>
        </div>
      <?php endif; ?>
<?php echo Form::close(); ?>


<div class="thin-wrapper"><span class="line thin"></span></div><!-- 細いグレーの線 -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<!-- モーダル中身 -->
  <div class="modal">
      <div class="modal-bg"></div>
      <div class="modal-content">
          <form action="post/update" method="post">
              <textarea name="post" class="modal-post"></textarea>
              <input type="hidden" name="post_id" class="modal-id" value="">
              <input type="image" class="button" src="/images/edit3.png" alt="更新">
              <?php echo e(csrf_field()); ?>

          </form>

          <?php if($errors->any()): ?>
          <div class="error-text">
            <ul>
              <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
              <li><?php echo e($error); ?></li>
              <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </ul>
          </div>
          <br>
          <?php endif; ?>
      </div>
  </div>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iamku\atlasSNS_mikura\resources\views/posts/index.blade.php ENDPATH**/ ?>