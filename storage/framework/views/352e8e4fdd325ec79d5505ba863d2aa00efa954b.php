
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-lg-8">
            <?php if($token): ?>
            <br>
            <div class="alert alert-danger">
                We can't process your payment right now, so please try again later. We're sorry for the inconvenience.
            </div>
            <?php endif; ?>
            <div class="summary-section">
                <div class="title">
                    <h2>Summary of Tickets</h2>
                </div>
                <div class="content">
                    <div class="media">
                        <img src="<?php echo e(url('images/')); ?>/<?php echo e($booking->eventData->event_image); ?>" class="mr-3" alt="...">
                        <div class="media-body">
                            <h5 class="mt-0"><?php echo e($booking->eventData->event_name); ?></h5>
                            <?php $__currentLoopData = $booking->eventData->dateData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <?php echo e(date('jS M', strtotime($date['event_start_date']))); ?>

                            <?php if($booking->eventData->event_type == "group_event"): ?>
                            - <?php echo e(date('jS M', strtotime($date['event_end_date']))); ?>

                            <?php endif; ?>
                            <?php if(!$loop->last): ?>, <?php endif; ?>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        <!-- <p>5th aug to 6th aug | 4:00pm to 5:00pm</p> -->
                        </div>
                    </div>
                    <!--calculate player wish sub total value-->
                    <?php $__currentLoopData = $booking->eventPlayerData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $Player): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <!--calculate player wish value-->
                    <?php
                    $Stotal=0;
                    ?>
                    <?php $__currentLoopData = $Player->dateTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $date->playerTimeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playerTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $Stotal=$Stotal+ $booking->eventData->charges;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php $__currentLoopData = $date->addOnData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addOn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <?php
                    $Stotal = $Stotal + $addOn->price;
                    ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                    <div class="ticket-list-box">
                        <div class="row align-items-center justify-content-between">
                            <div class="col"><h3><?php echo e($Player->first_name); ?> <?php echo e($Player->middle_name); ?> <?php echo e($Player->last_name); ?></h3></div>
                            <div class="col text-right">
                                <span class="price-label">£<?php echo e(number_format($Stotal,2)); ?></span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col col-sm-12">
                                <?php $__currentLoopData = $Player->dateTime; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php if($booking->eventData->event_type == "group_event"): ?>
                                <?php echo e($date['event_dates']); ?>

                                <?php else: ?>
                                <?php echo e(date('jS M', strtotime($date['event_start_date']))); ?> 
                                <?php endif; ?>
                                | 
                                <?php $__currentLoopData = $date->playerTimeData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $playerTime): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                <?php echo e(date("h:iA", strtotime($playerTime['event_start_time']))); ?> - <?php echo e(date("h:iA", strtotime($playerTime['event_end_time']))); ?> 
                                <?php if(!$loop->last): ?>, <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                <p class="m-0">
                                    <?php $__currentLoopData = $date->addOnData; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $addOn): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <?php echo e($addOn->activities_name); ?>

                                    <?php if(!$loop->last): ?>, <?php endif; ?>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </p>
                                <?php if(!$loop->last): ?>
                                <hr>
                                <?php endif; ?>
                                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                            </div>
                        </div>
                    </div>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
        <div class="col-lg-4">
            <div class="payment-info">
                <div class="title"><h2>Payment Summary</h2></div>
                <div class="content">
                    <ul>
                        <li>Your Total</li>
                        <li>£<?php echo e(number_format($booking->amout,2)); ?></li>
                    </ul>
                    <ul>
                        <li>Wallet Balance</li>
                        <li>-£<?php echo e(($wallet_data>$booking->amout)?number_format($booking->amout,2): number_format($wallet_data,2)); ?></li>
                    </ul>
                    <ul>
                        <li><strong>Payable</strong></li>
                        <li><strong>£<?php echo e((($booking->amout-$wallet_data)>0)?number_format($booking->amout-$wallet_data,2):number_format(0,2)); ?></strong></li>
                    </ul>
                    <div class="text-center mt-4">
                        <form class="form-horizontal" method="POST" id="payment-form" role="form" action="<?php echo URL::route('make.payment'); ?>" >
                            <?php echo e(csrf_field()); ?>

                            <input type="hidden" name="booking_id" value="<?php echo e($booking->id); ?>" id="booking_id">
                            <button type="submit" class="btn btn-primary">
                                Checkout
                            </button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(".form-check-input").change(function (e) {
        var form = $("#age_group_form");
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData(form[0]);
        }
        submit_form(window.baseUrl + '/event-lists', formdata, form, function (data) {
            var final_data = $.parseJSON(data);
            if (final_data.status_code == 200) {
//                toastr.success(final_data.message.desc);
                $('#event_list').html(final_data.data);
            } else {
                toastr.error(final_data.message.desc);
            }

        });
        return false;
    });
</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/tickets-summary.blade.php ENDPATH**/ ?>