<?php $__env->startSection('content'); ?>
<div class="follow-icons">
    <h2>Follower List</h2>
    <!-- followしてるuserのアイコンを１０個ずつ横並びにする -->
    <!-- ↓アイコンクリックしたらその人のplofileページに遷移 -->
    <div class="followicon-wrapper">
<?php $__currentLoopData = $followed_icons; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $followed_icons): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <tr>
        <td>
            <a href="users/<?php echo e($followed_icons->id); ?>/user-profile">
                <img src="storage/<?php echo e($followed_icons->images); ?>" alt="icon" class="icon-space">
            </a>
        </td>
    </tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </div>
</div>

<div class="line-wrapper"><span class="bold line"></span></div><!-- グレーの線 -->

<!-- フォローしている人の投稿を新しい順に表示 -->
<?php $__currentLoopData = $followed_timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $followed_timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="timeline">
                <a href="users/<?php echo e($followed_timeline->user->id); ?>/user-profile">
                    <img src="storage/<?php echo e($followed_timeline-> user-> images); ?>" alt="icon" class="icon-space">
                </a>
                <div class="padding-left">
                    <p class="timeline-content bold-text"><?php echo e($followed_timeline-> user-> username); ?></p>
                    <p class="posts-area timeline-content"><?php echo e($followed_timeline -> post); ?></p>
                </div>
                <div class="timeline-content created-at">
                    <p><?php echo e($followed_timeline -> created_at); ?></p>
                </div>
            </div><!-- /timeline -->

<div class="thin-wrapper"><span class="line thin"></span></div><!-- 細いグレーの線 -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iamku\atlasSNS_mikura\resources\views/follows/followerList.blade.php ENDPATH**/ ?>