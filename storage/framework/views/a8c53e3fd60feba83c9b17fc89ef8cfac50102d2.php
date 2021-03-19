

<?php $__env->startSection('css'); ?>
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<!-- <script src="<?php echo e(url('assets/admin/assets/global/plugins/datatables/datatables.min.css')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.css')); ?>" type="text/javascript"></script>
<link href="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')); ?>" rel="stylesheet" type="text/css" /> -->
<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
<div class="row">
    <div class="col-md-12">
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Events</span>
                </div> 
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group  pull-right">
                                <a href="../admin/event" class="btn green"> Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-scrollable" style="border: none !important;">
                    <table id="event_table" class="table table-striped table-hover responsive nowrap table-bordered">
                        <thead>
                            <tr>   
                                <th>No</th> 
                                <th> Event Type </th>
                                <th> Event Name </th>
                                <th> Description </th>
                                <!-- <th> Start Date </th>
                                <th> End Date </th>
                                <th> Start Time </th>
                                <th> End Time </th> -->
                                <th> Members Only </th>
                                <th> charges </th>
                                <!-- <th> Persons Allowed </th> -->
                                <!-- <th> Edit </th>
                                <th> Delete </th> -->
                                <th> Action </th>
                            </tr>
                        </thead>
                        <tbody>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>



<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<!-- <script src="<?php echo e(url('assets/admin/assets/global/scripts/datatable.js')); ?>" type="text/javascript"></script> -->
<!-- <script src="<?php echo e(url('assets/admin/assets/global/plugins/datatables/datatables.min.js')); ?>" type="text/javascript"></script> -->
<!-- <script src="<?php echo e(url('assets/admin/assets/global/plugins/datatables/plugins/bootstrap/datatables.bootstrap.js')); ?>" type="text/javascript"></script> -->
<!-- <script src="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script> -->
<script src="<?php echo e(url('assets/admin/assets/global/plugins/jquery-repeater/jquery.repeater.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets/admin/assets/pages/scripts/form-repeater.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets/admin/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')); ?>" type="text/javascript"></script>


<script type="text/javascript">

var FormInputMask = function () {
    var a = function () {
        $("#start_date").inputmask("y/m/d", {
            placeholder: "yyyy/mm/dd"
        }),
                $("#end_date").inputmask("y/m/d", {
            placeholder: "yyyy/mm/dd"
        }),
                $("#start_time").inputmask("hh:mm:ss", {
            placeholder: "HH:MM:SS",
        }),
                $("#end_time").inputmask("hh:mm:ss", {
            placeholder: "HH:MM:SS",
        })
    };
    return {
        init: function () {
            a()
        }
    }
}();
App.isAngularJsApp() === !1 && jQuery(document).ready(function () {
    FormInputMask.init()
});


var table;
$.ajaxSetup({headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}});

$(function () {
    $('#event_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: '<?php echo e(route('call-event')); ?>',
        columns: [
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {data: 'event_type', name: 'event_type'},
            {data: 'event_name', name: 'event_name'},
            {data: 'event_description', name: 'event_description'},
            // { data: 'start_date', name: 'start_date' },
            // { data: 'end_date', name: 'end_date' },
            // { data: 'start_time', name: 'start_time' },
            // { data: 'end_time', name: 'end_time' },
            {data: 'members_only', name: 'members_only', "orderable": false, render: function (data, type, row, meta) {
                    return data == 0 ? 'No' : 'Yes';
                },
            },
            {data: 'charges', name: 'charges'},
            // { data: 'persons_allowed', name: 'persons_allowed' },
            {
                orderable: false,
                searchable: false,
                data: 'id', "orderable": false, render: function (data, type, row, meta)
                {
                    return '<a href="../admin/edit-event/' + data + '" id="' + data + '" class="btn btn-sm btn-clean btn-icon btn-icon-md editRecord"><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0);" id="' + data + '" class="btn btn-sm btn-clean btn-icon btn-icon-md deleteRecord" title="Delete" onclick=deleate_events("' + data + '")><i class="fa fa-trash" aria-hidden="true"></i></a> <a href="../admin/export-bookings/' + data + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Export Bookings"><i class="fa fa-download" aria-hidden="true"></i></a>';
                },
            },
                    // {
                    //     orderable: false,
                    //     searchable: false,
                    //     data: 'id', "orderable": false, render: function (data, type, row, meta)
                    //     {
                    //         return '<a href="javascript:void(0);" id="' + data + '" class="btn btn-sm btn-clean btn-icon btn-icon-md deleteRecord" title="Delete" onclick=deleate_events("' + data + '")>Delete</a>';
                    //     }
                    // },
                    // {
                    //     orderable: false,
                    //     searchable: false,
                    //     data: 'id', "orderable": false, render: function (data, type, row, meta)
                    //     {
                    //         return '<a href="../admin/export-bookings/' + data + '" class="btn btn-sm btn-clean btn-icon btn-icon-md" title="Export Bookings">Export Bookings</a>';
                    //     }
                    // },
        ]
    });
});

function deleate_events(id) {
    if (confirm("Are you sure you want to delete this Event?")) {
        var form = $(this).parents("form");
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData();
            formdata.append('id', id);
        }
        submit_form(window.baseUrl + '/admin/deleate-event/' + id, formdata, form, function (data) {
            var final_data = $.parseJSON(data);
            // console.log(final_data);
            if (final_data.status_code == 200) {

                $('#event_table').DataTable().ajax.reload()
                $("#event_edit").modal('toggle');

                toastr.success(final_data.message.desc);
                return false;
            } else {
                toastr.error(final_data.message.desc);
            }

        })
        return false;
    }
}



$(document).on("click", "#deleate_event", function (e) {
    var table;
    $("#update_event_form").validate({
        rules: {
            age_grp_val: {
                required: true,
            },
        },
    });

    if ($("#update_event_form").valid()) {
        e.preventDefault();
        var id = $('#id').val();
        //var weburl = "<?php echo e(env('APP_URL')); ?>";
        var form = $(this).parents("form")
        var formdata = false;
        if (window.FormData)
        {

            //formdata = new FormData();
            formdata = new FormData(form[0]);
            formdata.append('id', id);
        }
        submit_form(window.baseUrl + '/admin/deleate_event/' + id, formdata, form, function (data)
        {
            var final_data = $.parseJSON(data);
            if (final_data.status_code == 200) {
                toastr.success(final_data.message.desc);
                window.location.href = window.baseUrl + "/admin/view-event";
                // $('#event_table').DataTable().ajax.reload()
                // $("#event_edit").modal('toggle');
                return false;
            } else {
                toastr.error(final_data.message.desc);
            }

        })
        return false;
    }

});



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('webadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/pages/view-event.blade.php ENDPATH**/ ?>