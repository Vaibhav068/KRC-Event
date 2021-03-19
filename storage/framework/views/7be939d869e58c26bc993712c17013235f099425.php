
<?php $__env->startSection('css'); ?>
<link  href="https://cdn.datatables.net/1.10.16/css/jquery.dataTables.min.css" rel="stylesheet">
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>

<div class="row">
    <div class="col-md-12">
        <form class="form-horizontal" id="cancele_booking_form" enctype="multipart/form-data" >
            <?php echo e(csrf_field()); ?>

            <input type="hidden" name="booking_id" id="booking_id">
        </form>
        <!-- BEGIN EXAMPLE TABLE PORTLET-->
        <div class="portlet light portlet-fit bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class="icon-settings font-red"></i>
                    <span class="caption-subject font-red sbold uppercase">Bookings</span>
                </div> 
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="col-md-2">
                                <div class="btn-group  pull-left">
                                    <!--<a href="<?php echo e(url('admin/export-bookings')); ?>" style="margin-right: 5px;" class="btn green"> Export to CSV</a>-->
                                    <button class="btn red" id="cencall_booking"> Cancele Booking</button>
                                </div>
                                
                                    
                            </div>
                            <div class="col-md-2">
                                <div class="drop_cls">
                                    <select id='event_filter' class="form-control" style="width: 200px">
                                        <option value=""> Select Event </option>
                                         <?php $__currentLoopData = $events; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $event): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                                            <option value="<?php echo e($event['id']); ?>"><?php echo e($event['event_name']); ?></option>
                                         <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                                    </select>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="table-scrollable" style="border: none !important;">
                    <table id="booking_table" class="table table-striped table-hover responsive nowrap table-bordered">
                        <thead>
                            <tr>  
                                <th>#</th> 
                                <th><input type="checkbox" name="select_all" value="1" id="example-select-all"></th>
                                <th>No</th> 
                                <th> Event Name</th>
                                <th> Order Number</th>
                                <th> User </th>
                                <th> First Name </th>
                                <th> Email  </th>
                                <th> Mobile Number  </th>
                                <th> Amount   </th>
                                <th> Wallet Amount   </th>
                                <th> Booking Status   </th>
                                <th> Payment Status   </th>
                                <th> Action  </th>
                                <!--<th> Edit </th>-->
                                <!--<th> Delete </th>-->
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
    customersTable = $('#booking_table').DataTable({
        processing: true,
        serverSide: true,
        responsive: true,
        ajax: {
            url:'<?php echo e(route('call_bookings')); ?>',
            data: function (d) {
                d.event_filter = $('#event_filter').val()
            }

        },
        order: [[2, 'desc']],
        columns: [
            {
                "data": null, 'orderable': false, "className": 'details-control', 'render': function (data, type, full, meta) {
                    return '';
                }
            },
            {
                data: 'id', 'searchable': false, 'orderable': false,
                'className': 'dt-body-center',
                'render': function (data, type, full, meta) {
                    return (full.booking_status != 'cart' && full.booking_status != 'canceled') ? '<input type="checkbox" name="order_id[]" value="' + $('<div/>').text(data).html() + '">' : '';
                }
            },
            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
            {
                data: 'event_data', 'render': function (data, type, full, meta) {
                    return data ? data.event_name : '';
                }
            },
            {data: 'order_no', name: 'order_no'},
            {
                data: 'eventuser', 'render': function (data, type, full, meta) {
                    return data ? data.username : '';
                }
            },
            {data: 'first_name', name: 'first_name'},
            {data: 'email_address', name: 'email_address'},
            {data: 'phone_number', name: 'phone_number'},
            {data: 'amout', name: 'amout'},
            {data: 'wallet_amout', name: 'wallet_amout'},
            {data: 'booking_status', name: 'booking_status'},
            {data: 'payment_status', name: 'payment_status'},
            {
                orderable: false,
                searchable: false,
                data: 'id', "orderable": false, render: function (data, type, row, meta) {
                    return (row.booking_status != 'cart' && row.booking_status != 'canceled') ? '<a href="javascript:void(0);" id="' + data + '" class="btn btn-sm btn red cancelleBooking" title="Delete" data-id="' + data + '">Cancelle Booking</a>' : '';
                }
            },
        ],
    });
});
$(document).on('click', '#example-select-all', function (e) {
    var rows = customersTable.rows({'search': 'applied'}).nodes();
    $('input[type="checkbox"]', rows).prop('checked', this.checked);
});
function cancelleBooking() {
    if (confirm("Are you sure you want to  Cancele this Bookings?")) {
        var form = $('#cancele_booking_form');
        var formdata = false;
        if (window.FormData) {
            formdata = new FormData();
            formdata.append('booking_id', $('#booking_id').val());
        }
        submit_form(window.baseUrl + '/admin/cencall-booking', formdata, form, function (data) {
            var final_data = $.parseJSON(data);
            if (final_data.status_code == 200) {
                $('#booking_table').DataTable().ajax.reload();
                toastr.success(final_data.message.desc);
                return false;
            } else {
                toastr.error(final_data.message.desc);
            }
        });
        return false;
    }
}
$(document).on('click', 'td.details-control', function () {
    var tr = $(this).closest('tr');
    var row = customersTable.row(tr);
    if (row.child.isShown()) {
        row.child.hide();
        tr.removeClass('shown');
    } else {
        hideShowRow(customersTable);
        $.ajax({headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            method: 'POST',
            url: APP_URL + '/admin/player-details',
            data: {'booking_id': row.data().id},
            success: function (result) {
                var htmlData = '<table id="booking_child_' + row.data().id + '">' +
                        '<thead><tr><th style="width: 1px;">#</th><th>First Name</th><th>Middle Name</th><th>Last Name</th><th>Age</th><th>Allergy</th></tr></thead>' +
                        '<tbody>' + result.data + '</tbody>' +
                        '</table>';
                row.child(htmlData).show();
                tr.addClass('shown');
            }
        });
    }
});
//<th>Event Date</th><th>Event Time</th>
function hideShowRow(table) {
    table.rows().every(function () {
        if (this.child.isShown()) {
            this.child.hide();
            $(this.node()).removeClass('shown');
        }
    });
}
$(document).on('click', '.cancelleBooking', function () {
    var values = [];
    values.push($(this).attr('data-id'));
    $('#booking_id').val(values);
    if ($('#booking_id').val() && $('#booking_id').val() != '') {
        cancelleBooking();
    } else {
        toastr.error('please select at least one booking for cancelle');
    }
});
$(document).on('click', '#cencall_booking', function () {
    var values = [];
    $.each($("input[name='order_id[]']:checked"), function () {
        values.push($(this).val());
    });
    $('#booking_id').val(values);
    cancelleBooking();
});


$('#event_filter').change(function(){
    var table = $('#booking_table').DataTable();
        table.draw();
        e.preventDefault();

    });
</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('webadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/pages/booking/view-booking.blade.php ENDPATH**/ ?>