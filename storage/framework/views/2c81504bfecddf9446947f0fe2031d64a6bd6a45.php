<?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<div class="col-md-6 col-lg-3">
    <div class="pro-list-box">
        <div class="img">
            <img src="<?php echo e(url('images/')); ?>/<?php echo e($event['event_image']); ?>" class="img-fluid" />
        </div>
        <div class="content">
            <h3><?php echo e($event['event_name']); ?></h3>
            <p>
                <?php $__currentLoopData = $event['dates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(date('M d,Y', strtotime($date['event_start_date']))); ?> 
                <?php if($event['event_type'] == "group_event"): ?>
                - <?php echo e(date('jS M', strtotime($date['event_end_date']))); ?>

                <?php endif; ?>         
                <?php if(!$loop->last): ?>
                |
                <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            </p>
            <div class="text-center">
                <a href="<?php echo e(url('event-details/'.$event['id'])); ?>" class="btn btn-primary">View Details</a>
            </div>
        </div>
    </div>
</div>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/events_search.blade.php ENDPATH**/ ?>