<?php
$count=1;
?>
<?php $__currentLoopData = $results; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $item): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td style="width: 1px;"><?php echo e($count); ?></td>
    <td><?php echo e($item->first_name); ?></td>
    <td><?php echo e($item->middle_name); ?></td>
    <td><?php echo e($item->last_name); ?></td>
    <td><?php echo e($item->age); ?></td>
    <td><?php echo e($item->allergy); ?></td>
</tr>
<tr>
    <th colspan="7" style="text-align: center;">Date and time of Player</th>
</tr>
<?php $__currentLoopData = $item->dateTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $dateT): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
<tr>
    <td colspan="2" style="text-align: center">  
        <?php if($dateT->event_dates): ?>
        <?php echo e($dateT->event_dates); ?>|
        <?php else: ?>
        <?php echo e(date('M d,Y', strtotime($dateT->event_start_date))); ?> to <?php echo e(date('M d,Y', strtotime($dateT->event_end_date))); ?>|
        <?php endif; ?>
        <?php $__currentLoopData = $dateT->playerTimeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playerTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e(date("h:iA", strtotime($playerTime['event_start_time']))); ?> - <?php echo e(date("h:iA", strtotime($playerTime['event_end_time']))); ?> 
        <?php if(!$loop->last): ?>
        ,
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>
    <td colspan="4" style="text-align: left">
        <?php $__currentLoopData = $dateT->addOnData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addOn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <?php echo e($addOn->activities_name); ?>

        <?php if(!$loop->last): ?>
        ,
        <?php endif; ?>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </td>
</tr>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php
$count=$count+1;
?>
<?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
<?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/pages/booking/item_data.blade.php ENDPATH**/ ?>