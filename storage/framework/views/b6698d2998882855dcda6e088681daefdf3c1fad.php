<li class="nav-item start <?php echo e(Request::segment(2) === 'dashboard' ? 'active open ' : null); ?>">
    <a href="<?php echo e(url('admin/dashboard')); ?>" class="nav-link nav-toggle">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start <?php echo e((Request::segment(2) === 'event' || Request::segment(2) === 'view-event' || Request::segment(2) === 'view-event' || Request::segment(2) === 'create-event' || Request::segment(2) === 'edit-event') ? 'active open ' : null); ?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-note"></i>
        <span class="title">Event</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start <?php echo e((Request::segment(2) === 'event') ? 'active open ' : null); ?>">
            <a href="<?php echo e(url('admin/event')); ?>" class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">Create</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start <?php echo e((Request::segment(2) === 'view-event') ? 'active open ' : null); ?> ">
            <a href="<?php echo e(url('admin/view-event')); ?>" class="nav-link ">
                <i class="icon-book-open"></i>
                <span class="title">View</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start <?php echo e((Request::segment(2) === 'agegroup' ||Request::segment(2) === 'view-agegroup' || Request::segment(2) === 'viewagegroup' || Request::segment(2) === 'edit-agegroup' || Request::segment(2) === 'list-agegroup') ? 'active open ' : null); ?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-user"></i>
        <span class="title">Age Group</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start <?php echo e((Request::segment(2) === 'agegroup') ? 'active open ' : null); ?>">
            <a href="<?php echo e(url('admin/agegroup')); ?>" class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">Create</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start <?php echo e((Request::segment(2) === 'view-agegroup') ? 'active open ' : null); ?> ">
            <a href="<?php echo e(url('admin/view-agegroup')); ?>" class="nav-link ">
                <i class="icon-book-open"></i>
                <span class="title">View</span>
            </a>
        </li>
    </ul>
</li>

<li class="nav-item start <?php echo e((Request::segment(2) === 'pages' || Request::segment(2) === 'view-pages' || Request::segment(2) === 'edit-pages') ? 'active open ' : null); ?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-layers"></i>
        <span class="title">Pages</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start <?php echo e((Request::segment(2) === 'pages') ? 'active open ' : null); ?>">
            <a href="<?php echo e(url('admin/pages')); ?>" class="nav-link ">
                <i class="icon-plus"></i>
                <span class="title">Create</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start <?php echo e((Request::segment(2) === 'view-pages') ? 'active open ' : null); ?> ">
            <a href="<?php echo e(url('admin/view-pages')); ?>" class="nav-link ">
                <i class="icon-book-open"></i>
                <span class="title">View</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start <?php echo e((Request::segment(2) === 'customers' || Request::segment(2) === 'view-customers' || Request::segment(2) === 'edit-customers') ? 'active open ' : null); ?>">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="icon-user"></i>
        <span class="title">Customer</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu">
        <li class="nav-item start <?php echo e((Request::segment(2) === 'customers') ? 'active open ' : null); ?>">
            <a href="<?php echo e(url('admin/customers')); ?>" class="nav-link">
                <i class="icon-plus"></i>
                <span class="title">Create</span>
                <span class="selected"></span>
            </a>
        </li>
        <li class="nav-item start <?php echo e((Request::segment(2) === 'view-customers') ? 'active open ' : null); ?> ">
            <a href="<?php echo e(url('admin/view-customers')); ?>" class="nav-link">
                <i class="icon-book-open"></i>
                <span class="title">View</span>
            </a>
        </li>
    </ul>
</li>
<li class="nav-item start <?php echo e(Request::segment(2) === 'view-bookings' ? 'active open ' : null); ?>">
    <a href="<?php echo e(url('admin/view-bookings')); ?>" class="nav-link nav-toggle">
        <i class="icon-basket"></i>
        <span class="title">Bookings</span>
        <span class="selected"></span>
    </a>
</li>
<li class="nav-item start <?php echo e(Request::segment(2) === 'wallets-history' ? 'active open ' : null); ?>">
    <a href="<?php echo e(url('admin/wallets-history')); ?>" class="nav-link nav-toggle">
        <i class="icon-note"></i>
        <span class="title">Wallet History</span>
        <span class="selected"></span>
    </a>
</li>
<!--<li class="nav-item start <?php echo e(Request::segment(2) === 'settings' ? 'active open ' : null); ?>">
    <a href="<?php echo e(url('admin/settings')); ?>" class="nav-link nav-toggle">
        <i class="icon-settings"></i>
        <span class="title">Settings</span>
        <span class="selected"></span>
    </a>
</li>--><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/includes/sidebar.blade.php ENDPATH**/ ?>