<?php
$pages = \App\Model\Pages::all();
?>
<nav id="navigation_bar" class="navbar navbar-default">
    <div class="container">
        <div class="navbar-header">
            <div class="logo">
                <a href="<?php echo e(url('/')); ?>"><img src="<?php echo e(url('assets/website/img/logo.png')); ?>" alt="image" /></a>
            </div> <!-- /Logo -->
            <div id="menu_slide">
                <div id="nav-toggle-label">
                    <div id="hamburger">
                        <span></span>
                        <span></span>
                        <span></span>
                    </div>
                    <div id="cross">
                        <span></span>
                        <span></span>
                    </div>
                </div>
            </div>
        </div>
        <div class="collapse navbar-collapse" id="navigation">
            <ul class="nav navbar-nav">
                <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
                <li><a href="<?php echo e(route('event-lists')); ?>">Events</a></li>
                <li><a href="<?php echo e(url('/contact-us')); ?>">Contact Us</a></li>
                <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <li><a href="<?php echo e(url('/page/' . $page->slug)); ?>"><?php echo e($page->title); ?></a></li>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                <?php if(Auth::user()): ?> 
                    <li><a href="<?php echo e(url('/my-profile')); ?>">hello <?php echo e($session->first_name); ?></a></li>
                <?php else: ?>        
                    <li><a href="<?php echo e(url('/')); ?>" >Log in</a></li>
                <?php endif; ?>
            </ul>
        </div>
    </div>
</nav>
<!-- Navigation end -->
<!-- Mobile Navigation -->
<div class="mobile-menu">
    <ul class="wd-menu pop-scroll">
        <li><a href="<?php echo e(url('/')); ?>">Home</a></li>
        <li><a href="<?php echo e(route('event-lists')); ?>">Events</a></li>
        <li><a href="<?php echo e(url('/contact-us')); ?>">Contact Us</a></li>
        <?php $__currentLoopData = $pages; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $page): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
        <li><a href="<?php echo e(url('/page/' . $page->slug)); ?>"><?php echo e($page->title); ?></a></li>
        <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
        <?php if(Auth::user()): ?> 
            <li><a href="<?php echo e(url('/my-profile')); ?>">hello <?php echo e($session->first_name); ?></a></li>
        <?php else: ?>        
            <li><a href="<?php echo e(url('/')); ?>" >Log in</a></li>
        <?php endif; ?>
    </ul>
</div>
<!-- END/Mobile Navigation --><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/includes/header.blade.php ENDPATH**/ ?>