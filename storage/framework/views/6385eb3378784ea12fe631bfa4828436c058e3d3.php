
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div class="inner-page-title"><div class="container">Recent Events</div></div>
<section class="event-listing-section">
    <div class="container-fluid">
        <div class="row">
            <div class="col-md-4 col-lg-3">
                <div class="shorting-box">
                    <div class="title">Age</div>
                    <form class="" id="age_group_form" enctype="multipart/form-data" onsubmit="return false;" method="post"  >
                        <?php echo csrf_field(); ?>
                        <div class="content">
                            <?php $__currentLoopData = $age_groups; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $group): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                            <div class="form-group form-check">
                                <input type="checkbox" name="age_group[]" value="<?php echo e($group['id']); ?>" class="form-check-input" id="check_<?php echo e($group['id']); ?>">
                                <label class="form-check-label" for="check_<?php echo e($group['id']); ?>"><?php echo e($group['age_grp_val']); ?></label>
                            </div>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                        </div>
                    </form>
                </div>
            </div>
            <div class="col-md-8 col-lg-9">
                <div class="row" id="event_list">
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
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </div>
            </div>
        </div>
    </div>
</section>

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
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/event-lists.blade.php ENDPATH**/ ?>