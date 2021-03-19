
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
                    <span class="caption-subject font-red sbold uppercase">Pages</span>
                </div> 
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group  pull-right">
                                <a href="<?php echo e(url('admin/pages')); ?>" class="btn green"> Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
                <table id="pages_table" class="table table-striped table-hover table-bordered">
                    <thead>
                        <tr>   
                            <th>No</th> 
                            <th> Title</th>
                            <th> Description </th>
                            <th> Action </th>
                            <!-- <th> Delete </th> -->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
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
    $('#pages_table').DataTable({
        processing: true,
        serverSide: true,
        ajax: '<?php echo e(route('call-pages')); ?>',
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'title', name: 'title'},
            {data: 'description', name: 'description'},
            {
                orderable: false,
                searchable: false,
                data: 'id', "orderable": false, render: function (data, type, row, meta)
                {
                    return '<a href="../admin/edit-pages/' + data + '" id="' + data + '" class="btn btn-sm btn-clean btn-icon btn-icon-md editRecord"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0);" id="' + data + '" class="btn btn-sm btn-clean btn-icon btn-icon-md deleteRecord" title="Delete" onclick=deleate_pages("' + data + '")><i class="fa fa-trash" aria-hidden="true"></i></a>';
                },
            },
                    // {
                    //     orderable: false,
                    //     searchable: false,
                    //     data: 'id', "orderable": false, render: function (data, type, row, meta)
                    //     {
                    //         return '<a href="javascript:void(0);" id="' + data + '" class="btn btn-sm btn-clean btn-icon btn-icon-md deleteRecord" title="Delete" onclick=deleate_pages("' + data + '")>Delete</a>';
                    //     }
                    // },
        ]
    });
});

function deleate_pages(id) {
    if (confirm("Are you sure you want to delete this Pages?")) {
        var form = $(this).parents("form");
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData();
            formdata.append('id', id);
        }
        submit_form(window.baseUrl + '/admin/deleate-pages/' + id, formdata, form, function (data) {
            var final_data = $.parseJSON(data);
            // console.log(final_data);
            if (final_data.status_code == 200) {
                $('#pages_table').DataTable().ajax.reload();
                toastr.success(final_data.message.desc);
                return false;
            } else {
                toastr.error(final_data.message.desc);
            }
        });
        return false;
    }
}
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('webadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/pages/view-pages.blade.php ENDPATH**/ ?>