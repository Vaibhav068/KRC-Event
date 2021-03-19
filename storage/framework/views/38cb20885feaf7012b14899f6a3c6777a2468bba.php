<?php if($message = Session::get('login_error')): ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <div class="alert-text"><?php echo e($message); ?></div>
    <div class="alert-close"> <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i> </div>
</div>
<?php endif; ?>

<?php if($message = Session::get('fortgot_email_not_found')): ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <div class="alert-text"><?php echo e($message); ?></div>
    <div class="alert-close"> <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i> </div>
</div>
<?php endif; ?>

<?php if($message = Session::get('invalid_reset_url')): ?>
<div class="alert alert-danger alert-dismissible" role="alert">
    <div class="alert-text"><?php echo e($message); ?></div>
    <div class="alert-close"> <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i> </div>
</div>
<?php endif; ?>

<?php if($message = Session::get('reset_link_sucess')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
    <div class="alert-text"><?php echo e($message); ?></div>
    <div class="alert-close"> <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i> </div>
</div>
<?php endif; ?>

<?php if($message = Session::get('password_updated')): ?>
<div class="alert alert-success alert-dismissible" role="alert">
    <div class="alert-text"><?php echo e($message); ?></div>
    <div class="alert-close"> <i class="flaticon2-cross kt-icon-sm" data-dismiss="alert"></i> </div>
</div>
<?php endif; ?>

<?php if($message = Session::get('success')): ?>
<div class="alert alert-solid-success alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
    <div class="alert-icon"><i class="fa fa-check-circle"></i></div>    
    <div class="alert-text"><?php echo e($message); ?></div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
<?php endif; ?>

<?php if($message = Session::get('status')): ?>
<div class="alert alert-success alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button> 
    <?php echo e($message); ?>

</div>
<?php endif; ?>

<?php if($message = Session::get('error')): ?>
<div class="alert alert-solid-danger alert-bold fade show kt-margin-t-20 kt-margin-b-40" role="alert">
    <div class="alert-icon"><i class="fas fa-times"></i></div>    
    <div class="alert-text"><?php echo e($message); ?></div>
    <div class="alert-close">
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">
            <span aria-hidden="true"><i class="la la-close"></i></span>
        </button>
    </div>
</div>
<?php endif; ?>


<?php if($message = Session::get('warning')): ?>
<div class="alert alert-warning alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>	
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>


<?php if($message = Session::get('info')): ?>
<div class="alert alert-info alert-block">
    <button type="button" class="close" data-dismiss="alert">x</button>	
    <strong><?php echo e($message); ?></strong>
</div>
<?php endif; ?>


<?php if($errors->any()): ?>
<div class="alert alert-danger">

    <button type="button" class="close" data-dismiss="alert">x</button>	
    <ul>
        <?php $__currentLoopData = $errors->all(); $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $error): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><?php echo e($error); ?><br></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
    </ul>  
</div>
<?php endif; ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/errormessage.blade.php ENDPATH**/ ?>