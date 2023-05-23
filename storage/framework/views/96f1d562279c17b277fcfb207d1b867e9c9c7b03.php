<?php $__env->startSection('content'); ?>
<!-- ユーザー検索窓と検索ボタン -->
<?php echo Form::open(['route' => 'search'], ['method' => 'GET']); ?>

    <?php echo e(Form::token()); ?>

    <?php echo csrf_field(); ?>
    <div id="search">
      <div>
        <input type="text" name="keyword" value="" placeholder="ユーザー名">
        <button id="sbtn" type="submit">
            <i class="fa fa-search fa-lg"></i>
          </button>
    <?php echo Form::close(); ?>

      </div>
      <div class="keyword">
<!-- 検索したら検索ワードを右に表示 -->
<?php if(!empty($keyword)): ?>
    <p>検索ワード：<?php echo e($keyword); ?></p>
<?php endif; ?>
      </div>
    </div>

<div class="line-wrapper"><span class="bold line"></span></div><!-- グレーの線 -->

<!-- 自分以外の全userリスト-->

<?php $__currentLoopData = $users; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<?php if(Auth::id() != $users->id): ?>
<div class="userlist-wrapper">
      <img src="storage/<?php echo e($users -> images); ?>" alt="icon" class="icon-space">
      <p class="name-holder"><?php echo e($users -> username); ?></p>
      <div class="btn-holder">
      <?php if(Auth::user()->isFollowing($users->id)): ?>
        <a class="btn btn-danger" href="/users/<?php echo e($users->id); ?>/unfollow">フォロー解除</a>
      <?php else: ?>
        <a class="btn btn-primary" href="/users/<?php echo e($users->id); ?>/follow">フォローする</a>
      <?php endif; ?>
      </div>
</div>
<?php endif; ?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>




<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iamku\atlasSNS_mikura\resources\views/users/search.blade.php ENDPATH**/ ?>