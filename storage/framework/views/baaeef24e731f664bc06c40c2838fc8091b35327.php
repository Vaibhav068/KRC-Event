<?php

use Request as Input;

$session = Auth::user();
?>
<!DOCTYPE html>
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <head>
        <?php echo $__env->make('website.includes.head', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('css'); ?>
    </head>

    <body>
        <!-- Header -->
        <header id="header" class="nav-stacked" data-spy="affix" data-offset-top="1">
            <!-- Navigation -->
            <?php echo $__env->make('website.includes.header', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </header>
        <!-- /Header -->
        <!-- Intro -->
        <?php echo $__env->yieldContent('main_content'); ?>  

        <!-- Footer -->
        <footer id="footer">
            <?php echo $__env->make('website.includes.footer', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </footer>
        <!-- jQuery first, then Popper.js, then Bootstrap JS -->
        <?php echo $__env->make('website.includes.common_script', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        <?php echo $__env->yieldContent('script'); ?>
    </body>

</html>
<?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/layouts/master.blade.php ENDPATH**/ ?>