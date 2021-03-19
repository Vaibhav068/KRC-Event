
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
<div class="container">
    <div class="Thank-you">
        <?php if($is_succ): ?>
        <h1>Thank you!</h1>
        <?php endif; ?>
        <?php if(!$is_succ): ?>
        <h1>Thank you!</h1>
        <?php endif; ?>
        <?php if($is_succ): ?>
        <p>
            <span>Your tickets has been booked, For more details <a href="<?php echo e(url('/my-orders')); ?>" >click here</a></span>
            <span>Order number : <?php echo e($data['INVNUM']); ?></span>
        </p>
        <?php endif; ?>

        <a href="<?php echo e(url('/event-lists')); ?>" class="btn btn-primary">keep Playing</a>
    </div>      

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/thank-you.blade.php ENDPATH**/ ?>