
<?php $__env->startSection('main_content'); ?>
<div class="container-fluid">
    <div class="order_summery_time"><span>Order on <?php echo e(date('d F Y', strtotime($booking_data->created_at))); ?></span> | <span>Order<b> <?php echo e($booking_data->order_no); ?></b></span></div>
    <div class="summary-section order-detail-page">
        <div class="title">
            <h2>summary of tickets</h2>
        </div>
        <div class="content">
            <div class="media" style="width: 100px; height: 100px;">
                <img src="<?php echo e(url('images/')); ?>/<?php echo e($booking_data->eventData->event_image); ?>"/>
                <div class="media-body">
                    <h5 class="mt-0"><?php echo e(isset($booking_data->eventData->event_name) ? $booking_data->eventData->event_name : ''); ?></h5>
                    <!--<p>Toronto, Canada</p>-->
                </div>
            </div>
            <!--<?php echo e(isset($booking_data->eventPlayerData) ?  count($booking_data->eventPlayerData) : 0); ?>-->
            <?php $__empty_1 = true; $__currentLoopData = $booking_data->eventPlayerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
            <!--subtotal-->
            <?php
            $Stotal=0;
            ?>
            <?php $__currentLoopData = $player->dateTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php $__currentLoopData = $date->playerTimeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playerTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $Stotal=$Stotal+ $booking_data->eventData->charges;
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <!--addon calculation-->
            <?php $__currentLoopData = $date->addOnData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addOn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
            <?php
            $Stotal = $Stotal + $addOn->price;
            ?>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>

            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
            <div class="ticket-list-box">
                <div class="row align-items-center justify-content-between">
                    <div class="col col-sm-8">
                        <p class="title-txt"><?php echo e($player->first_name); ?> <?php echo e($player->middle_name); ?> <?php echo e($player->last_name); ?></p>
                        <p class="m-0">
                            <?php $__currentLoopData = $player->dateTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php if($booking_data->eventData->event_type == "group_event"): ?>
                            <?php echo e($date['event_dates']); ?>

                            <?php else: ?>
                             <?php echo e(date('jS M', strtotime($date['event_start_date']))); ?> 
                            <?php endif; ?>
                            |  
                            <?php $__currentLoopData = $date->playerTimeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playerTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e(date("h:iA", strtotime($playerTime['event_start_time']))); ?> - <?php echo e(date("h:iA", strtotime($playerTime['event_end_time']))); ?><?php if(!$loop->last): ?>,<?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <p class="m-0">
                            <?php $__currentLoopData = $date->addOnData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addOn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e($addOn->activities_name); ?>

                            <?php if(!$loop->last): ?>
                            ,
                            <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                        <?php if(!$loop->last): ?>
                        <hr>
                        <?php endif; ?>
                        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </p>
                    </div>
                    <div class="col-sm-4 text-right">
                        <span class="price-label">£<?php echo e(number_format($Stotal,2)); ?></span>
                    </div>
                </div>
            </div>
            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
            <p class="p-1" style="text-align: center; margin-top: 20%;">No Player Found</p>
            <?php endif; ?>
        </div>
    </div>
    <div class="summary-section">
        <div class="content">
            <div class="row justify-content-between">
                <div class="col-md-6">
<!--                    <p class="title-txt mb-1">Payment method</p>
                    <p class="order-detail-payment"><img src="<?php echo e(url('assets/website/img/visa-img-icon.png')); ?>" class="img-fluid" /><span></span>**** 1234</p>-->
                </div>
                <div class="col-md-3">
                    <ul class="order-detail-summary-ul">
                        <li><strong>Order Summary</strong></li>
                    </ul>
                    <ul class="order-detail-summary-ul">
                        <li>Item(s) Subtotal</li>
                        <li>£<?php echo e(number_format($booking_data->amout,2)); ?></li>
                    </ul>
                    <ul class="order-detail-summary-ul">
                        <li>Wallet Balance Used</li>
                        <li>-£<?php echo e(number_format($booking_data->wallet_amout,2)); ?></li>
                    </ul>
                    <ul class="order-detail-summary-ul">
                        <li><strong>Grand Total:</strong></li>
                        <li>£<?php echo e(number_format($booking_data->amout - $booking_data->wallet_amout,2)); ?></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/orders-details.blade.php ENDPATH**/ ?>