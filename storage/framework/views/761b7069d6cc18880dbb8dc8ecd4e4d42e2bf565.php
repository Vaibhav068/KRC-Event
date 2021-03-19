
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <?php echo $__env->make('website.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-8 col-lg-9">
            <?php echo $__env->make('errormessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
            <form class="" id="change_pass" enctype="multipart/form-data" action="<?php echo e(route('user-update-password')); ?>" method="post" >
                <?php echo csrf_field(); ?>
                <div class="my-profile-content">
                    <div class="form-group">
                        <ul class="list-inline input-title">
                            <li class="list-inline-item"><h4>Change Password</h4></li>
                            <li class="list-inline-item"><!-- <a href="">Edit</a> --></li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-8 form-group">
                                <input type="password" class="form-control " placeholder="Current Password" name="current_password" >
                            </div>
                            <br>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 form-group">
                                <input type="password" class="form-control " placeholder=" Password" name="password" >
                            </div><br>
                        </div>
                        <div class="row">
                            <div class="col-lg-8 form-group">
                                <input type="password" class="form-control " placeholder="Confirm Password" name="confirm_password" >
                            </div><br>
                        </div>
                    </div>
                    <button type="submit" class="btn btn-primary">Update</button>
                </div>
            </form>

        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/change-password.blade.php ENDPATH**/ ?>