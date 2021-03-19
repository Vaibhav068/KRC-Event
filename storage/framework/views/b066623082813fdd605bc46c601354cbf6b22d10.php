
<?php $__env->startSection('css'); ?>
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Wallets History</span>
                </div> 
            </div>
            <div class="portlet-body">
                <div class="table-scrollable" style="border: none !important;">
                    <table id="wallets_table" class="table table-striped table-hover responsive nowrap table-bordered">
                        <thead>
                            <tr>   
                                <th>No</th> 
                                <th> User</th>
                                <th> Booking Id</th>
                                <th> Transaction Id </th>
                                <th> Transaction Type </th>
                                <th> Amount  </th>
                                <th> Description  </th>
                                <th> Payment Status   </th>
                                <th> Edit </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>
<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>
<script src="<?php echo e(url('assets/admin/assets/pages/scripts/form-repeater.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets/admin/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
var table;
$.ajaxSetup({headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}});
$(function () {
    var today = new Date();
    customersTable = $('#wallets_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '<?php echo e(route('call-history')); ?>',
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {
                data: 'eventuser', 'render': function (data, type, full, meta) {
                    return data ? data.username : '';
                }
            },
            {data: 'booking_id', name: 'booking_id'},
            {data: 'transaction_id', name: 'transaction_id'},
            {data: 'transaction_type', name: 'transaction_type'},
            {data: 'amount', name: 'amount'},
            {data: 'description', name: 'description'},
            {data: 'payment_status', name: 'payment_status'},
            {
                orderable: false,
                searchable: false,
                data: 'id', "orderable": false, render: function (data, type, row, meta)
                {
                    return '<a href="../admin/edit-wallets/' + data + '" id="' + data + '" class="btn btn-sm btn-clean btn-icon btn-icon-md editRecord">Edit</a>';
                },
            },
        ],
    });
});
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('webadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/pages/wallets/list.blade.php ENDPATH**/ ?>