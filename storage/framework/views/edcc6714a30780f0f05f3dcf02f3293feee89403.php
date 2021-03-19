

<?php $__env->startSection('main_content'); ?>
<div class="row" style="margin: auto;width: 65%;">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">Wallets Update </span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form class="form-horizontal" id="wallets_form" enctype="multipart/form-data" >
                    <?php echo e(csrf_field()); ?>

                    <div class="form-body">
                        <input type="hidden" class="form-control" value="<?php echo e(isset($data->id) ? $data->id : ''); ?>" placeholder="" name="id" id="id">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="user_id">User
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="<?php echo e(isset($data->eventuser->username) ? $data->eventuser->username : ''); ?>" placeholder="" name="user_id" id="user_id">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="booking_id">Booking Id
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="<?php echo e(isset($data->booking_id) ? $data->booking_id : ''); ?>" placeholder="" name="booking_id" id="booking_id">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="transaction_id">Transaction Id
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" readonly value="<?php echo e(isset($data->transaction_id) ? $data->transaction_id : ''); ?>" placeholder="" name="transaction_id" id="transaction_id">
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="transaction_type">Transaction Type
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <select class="form-control" id="transaction_type" name="transaction_type">
                                    <?php $__currentLoopData = $type; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $t): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($t); ?>" <?php echo e(isset($data->transaction_type)?$data->transaction_type==$t?'selected':'':''); ?>><?php echo e($t); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Select Transaction Type</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="amount">Amount
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo e(isset($data->amount) ? $data->amount : ''); ?>" placeholder="" name="amount" id="amount">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter Amount</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="description">Description
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" value="<?php echo e(isset($data->description) ? $data->description : ''); ?>" placeholder="" name="description" id="description">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter Description</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="payment_status">Payment Status
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <select class="form-control" id="payment_status" name="payment_status">
                                    <?php $__currentLoopData = $status; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $s): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                    <option value="<?php echo e($s); ?>" <?php echo e(isset($data->payment_status)?$data->payment_status==$s?'selected':'':''); ?>><?php echo e($s); ?></option>
                                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                </select>
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Select Payment Status</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="button" class="btn green" id="add_wallets">Update</button>
                            </div>
                        </div>
                    </div>
                </form>
                <!-- END FORM-->
            </div>
        </div>
        <!-- END VALIDATION STATES-->
    </div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script type="text/javascript">
    $('#content').wysihtml5();
    $(document).on("click", "#add_wallets", function (e) {
        $("#wallets_form").validate({
            rules: {
                user_id: {required: true},
                booking_id: {required: true},
                transaction_id: {required: true},
                transaction_type: {required: true},
                amount: {required: true},
                description: {required: true},
                payment_status: {required: true},
            }
        });
        if ($("#wallets_form").valid()) {
            e.preventDefault();
            var form = $(this).parents("form");
            var formdata = false;
            if (window.FormData) {
                formdata = new FormData(form[0]);
            }
            submit_form(window.baseUrl + '/admin/update-wallets', formdata, form, function (data) {
                var final_data = $.parseJSON(data);
                if (final_data.status_code == 200) {
                    toastr.success(final_data.message.desc);
                    window.location.href = window.baseUrl + "/admin/wallets-history";
                } else {
                    toastr.error(final_data.message.desc);
                }

            });
            return false;
        }
    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('webadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/pages/wallets/form.blade.php ENDPATH**/ ?>