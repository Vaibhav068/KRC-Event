
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <?php echo $__env->make('website.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="my-profile-content">
                <?php $__empty_1 = true; $__currentLoopData = $booking_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $booking): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                <div class="order-grid">
                    <div>
                        <div class="media" style="width: 100px; height: 100px;">
                            <img src="<?php echo e(url('images/')); ?>/<?php echo e($booking->eventData->event_image); ?>" class="mr-3 image-fluid" >
                            <div class="media-body">
                                <h5 class="mt-0"><?php echo e(isset($booking->eventData->event_name) ? $booking->eventData->event_name : ''); ?></h5>
                            </div>
                        </div>
                    </div>
                    <div>
                        <h5 class="mt-0"> 
                            <?php $__currentLoopData = $booking->eventPlayerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php $__currentLoopData = $player->dateTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($booking->eventData->event_type == "group_event"): ?>
                            <?php echo e($date['event_dates']); ?>

                            <?php else: ?>
                            <?php echo e(date('jS M', strtotime($date['event_start_date']))); ?> 
                            <?php endif; ?>
                            |  
                            <?php $__currentLoopData = $date->playerTimeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playerTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e(date("h:iA", strtotime($playerTime['event_start_time']))); ?>-<?php echo e(date("h:iA", strtotime($playerTime['event_end_time']))); ?><?php if(!$loop->last): ?>,<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <br>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </h5>
                        <p><?php echo e(isset($booking->eventPlayerData) ?  count($booking->eventPlayerData) : 0); ?> Player </p>
                    </div>
                    <div class="more-detail-div">
                        <h5 class="mt-0" style="color: <?php echo e($booking->booking_status=='canceled'?'#ff0000de':'green'); ?>"><?php echo e($booking->booking_status); ?></h5>
                        <h5 class="mt-0">£ <?php echo e(number_format($booking->amout,2)); ?></h5>
                        <a href="<?php echo e(url('/orders-details/' . $booking->id)); ?>">More Details</a>
                    </div>
                </div>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                <p class="p-1" style="text-align: center; margin-top: 20%;">No Orders Found</p>
                <?php endif; ?>
                <?php echo e($booking_data->links()); ?>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/my-orders.blade.php ENDPATH**/ ?>