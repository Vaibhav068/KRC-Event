
<?php $__env->startSection('css'); ?>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-md-4 col-lg-3">
            <?php echo $__env->make('website.includes.sidebar', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
        </div>
        <div class="col-md-8 col-lg-9">
            <div class="my-profile-content">
                <div class="row justify-content-between add-money-main">
                    <div class="col-lg-12">
                        <div class="media left">
                            <img src="<?php echo e(url('assets/website/img/wallet-icon.png')); ?>"  class="align-self-center mr-3" >
                            <div class="media-body align-self-center">
                                <h5 class="mt-0">Wallet Balance</h5>
                                <p>£<?php echo e(number_format($wallet_balance,2)); ?></p>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="table-responsive">
                    <table class="table wallet-table">
                        <thead>
                            <tr>
                                <th scope="col" colspan="2">TRANSACTIONS</th>
                                <th scope="col">AMOUNT</th>
                                <th scope="col">TYPE</th>
                                <th scope="col">STATUS</th>
                            </tr>
                        </thead>
                        <tbody>
<!--                            <tr>
                                <th colspan="5">August 2020</th>
                            </tr>-->
                            <?php $__empty_1 = true; $__currentLoopData = $wallet_data; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $wallet): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); $__empty_1 = false; ?>
                            <tr>
                                <td>
                                    <div class="media">
                                        <img src="<?php echo e(url('assets/website/img/rupies-icon.png')); ?>" class="align-self-center mr-3" >
                                        <div class="media-body align-self-center">
                                            <p><?php echo e($wallet->description); ?></p>
                                            <p><?php echo e(date('d M, h:i A', strtotime($wallet->created_at))); ?></p>
                                        </div>
                                    </div>
                                </td>
                                <td>
                                    <p>Order ID : <?php echo e($wallet->booking_id); ?></p>
                                    <p>Transaction ID: <?php echo e($wallet->transaction_id); ?></p>
                                </td>
                                <td>£<?php echo e(number_format($wallet->amount,2)); ?></td>
                                <td><?php echo e($wallet->transaction_type); ?></td>
                                <td><?php echo e($wallet->payment_status); ?></td>
                            </tr>
                            <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); if ($__empty_1): ?>
                            <tr>
                                <th colspan="5" style="text-align: center; margin-top: 20%;">No Wallet History Found</th>
                            </tr>
                            <?php endif; ?>
                        </tbody>
                    </table>
                    <?php echo e($wallet_data->links()); ?>

                </div>

            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/user-wallet.blade.php ENDPATH**/ ?>