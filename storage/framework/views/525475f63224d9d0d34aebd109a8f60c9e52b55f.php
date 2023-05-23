<?php $__env->startSection('content'); ?>
    <!-- アイコン、名前、bio、フォロー/アンフォローボタン -->
<div id="user-profile">
    <?php $__currentLoopData = $user; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $user): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
    <div>
        <table>
            <tbody>
                <tr>
                    <td class="icon-wrapper">
                        <img src="<?php echo e(\Storage::url($user->images)); ?>" alt="icon" class="icon-space">
                    </td>
                </tr>
                <tr>
                    <td></td>
                    <td class="item">name</td>
                    <td class="content"><?php echo e($user->username); ?></td>
                </tr>
                <tr>
                    <td></td>
                    <td class="item">bio</td>
                    <td class="content"><?php echo e($user->bio); ?></td>
                </tr>
            </tbody>
        </table>
    </div>
    <div class="btn-area">
        <?php if(Auth::user()->isFollowing($user->id)): ?>
            <a class="btn btn-danger" href="/users/<?php echo e($user->id); ?>/unfollow">フォロー解除</a>
        <?php else: ?>
            <a class="btn btn-primary" href="/users/<?php echo e($user->id); ?>/follow">フォローする</a>
        <?php endif; ?>
    </div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
</div>

<div class="line-wrapper"><span class="bold line"></span></div><!-- グレーの線 -->

<!-- このuserの投稿を新しい順に表示 -->
<?php $__currentLoopData = $users_timeline; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $users_timeline): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <div class="timeline">
                <img src="<?php echo e(\Storage::url($users_timeline->user->images)); ?>" alt="icon" class="icon-space">
                <div>
                    <p class="timeline-content bold-text"><?php echo e($users_timeline->user->username); ?></p>
                    <p class="timeline-content posts-area"><?php echo e($users_timeline->post); ?></p>
                </div>
                <div class="timeline-content created-at">
                    <p><?php echo e($users_timeline->created_at); ?></p>
                </div>
            </div><!-- /timeline -->

<span class="line thin"></span><!-- 細いグレーの線 -->
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

<?php $__env->stopSection(); ?>

<?php echo $__env->make('layouts.login', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\Users\iamku\atlasSNS_mikura\resources\views/users/userProfile.blade.php ENDPATH**/ ?>