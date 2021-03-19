

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
            <form class="" id="update_profile" enctype="multipart/form-data" action="<?php echo e(route('update-user-profile')); ?>" method="post" >
                <?php echo csrf_field(); ?>
                <div class="my-profile-content">
                    <div class="form-group">
                        <ul class="list-inline input-title">
                          <li class="list-inline-item"><h4>Personal Information</h4></li>
                          <li class="list-inline-item"><!-- <a href="">Edit</a> --></li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control mb-2" placeholder="James" name="first_name" value="<?php echo e($data->first_name); ?>">
                            </div>
                            <div class="col-lg-6">
                                <input type="text" class="form-control" placeholder="Smith" name="last_name" value="<?php echo e($data->last_name); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <ul class="list-inline input-title">
                          <li class="list-inline-item"><h4>Email Address</h4></li>
                          <li class="list-inline-item"><!-- <a href="">Edit</a> --></li>
                          <li class="list-inline-item"><a href="<?php echo e(route('user-change-password')); ?>">Change Password</a></li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="email" class="form-control" placeholder="James.smith@gmail.com" disabled value="<?php echo e($data->email); ?>">
                            </div>
                        </div>
                    </div>
                    <div class="form-group">
                        <ul class="list-inline input-title">
                          <li class="list-inline-item"><h4>Mobile Number</h4></li>
                          <li class="list-inline-item"><!-- <a href="">Edit</a> --></li>
                        </ul>
                        <div class="row">
                            <div class="col-lg-6">
                                <input type="text" class="form-control" name="mobile" placeholder="+1 12345 67890" value="<?php echo e($data->mobile); ?>">
                            </div>
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
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/my-profile.blade.php ENDPATH**/ ?>