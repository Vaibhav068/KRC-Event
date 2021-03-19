<div class="profile-box">
    <div class="media">
        <img src="<?php echo e(url('assets/website/img/profile-default-img.png')); ?>" class="align-self-center mr-3" >
        <div class="media-body align-self-center">
            <p>Hello</p>
            <h5 class="mt-0"><?php echo e((Auth::user()->first_name)); ?></h5>
        </div>
    </div>
</div>
<div class="side-bar-link">
    <ul>
        <li  class="<?php echo e(Request::is('my-profile') ? 'active' : ''); ?>"><a href="<?php echo e(route('user-profile')); ?>">My Profile</a></li>
        <li class="<?php echo e(Request::is('change-password') ? 'active' : ''); ?>"><a href="<?php echo e(route('user-change-password')); ?>">Change Password</a></li>
        <li class="<?php echo e(Request::is('my-orders') ? 'active' : ''); ?>"><a href="<?php echo e(route('user-orders')); ?>">My Orders</a></li>
        <li class="<?php echo e(Request::is('wallet') ? 'active' : ''); ?>"><a href="<?php echo e(route('user-wallet')); ?>">Wallet</a></li>
        <li><a href="<?php echo e(route('logout')); ?>">Logout</a></li>
    </ul>
</div><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/includes/sidebar.blade.php ENDPATH**/ ?>