

<?php $__env->startSection('css'); ?>
<link href="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div class="row" style="margin: auto; width: 70%;">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">Add Events</span>
                </div>
            </div>
            <div class="portlet-body">
                <?php echo $__env->make('errormessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <!-- BEGIN FORM-->
                <form class="form-horizontal" autocomplete="off" id="event_form" enctype="multipart/form-data" action="<?php echo e(route('create-event')); ?>" method="post"  >
                    <div class="form-body">
                        <!-- <?php echo e(csrf_field()); ?> -->
                        <?php echo csrf_field(); ?>
                        <div class="form-group form-md-radios">
                            <label class="col-md-3 control-label" for="form_control_1">Event Type</label>
                            <div class="col-md-9">
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="general_event" name="event_type" value="general_event" class="md-radiobtn">
                                        <label for="general_event">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> General Event </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="kids_tennis" value="kids_tennis" name="event_type" class="md-radiobtn">
                                        <label for="kids_tennis">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Kids Tennis </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="group_event" value="group_event" name="event_type" class="md-radiobtn">
                                        <label for="group_event">
                                            <span></span>
                                            <span class="check"></span>
                                            <span class="box"></span> Group Event</label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="form_control_1">Name
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="event_name" id="event_name">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter of your Event Name</span>
                            </div>
                        </div>

                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="form_control_1">Description
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="event_description" id="event_name">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter of your Event Description</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="form_control_1">Event Picture
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="file" class="form-control" placeholder="" name="event_picture" id="event_picture">
                                <!-- <div class="form-control-focus"> </div>
                                <span class="help-block">Enter of your Event Name</span> -->
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <a href="javascript:;" data-repeater-create="" class="btn btn-info addNewDate mt-repeater-add">
                                <i class="fa fa-plus"></i> Add Dates
                            </a>
                            <div data-repeater-list="dates" class="dynamic_date_row">
                                <div class="mt-date-row index1">
                                    <div class="col-md-5">
                                        <label class="control-label">Start Date</label>
                                        <input type="text" name="dates[0][start_date]" placeholder="Start Date" data-id="0" id="start_0" class="form-control start_date"  required=""> 
                                    </div>
                                    <div class="col-md-5 end-date-class">
                                        <label class="control-label">End Date</label>
                                        <input type="text" name="dates[0][end_date]" placeholder="End Date" data-id="0" id="end_0" class="form-control end_date"  required="" readonly="true"> 
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete">
                                            <i class="fa fa-close close1"></i>
                                        </a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <a href="javascript:;" data-repeater-create="" class="btn btn-info addNewTime mt-repeater-add">
                                <i class="fa fa-plus"></i> Add Times
                            </a>
                            <div data-repeater-list="times" class="dynamic_time_row">
                                <div class="mt-time-row index1">
                                    <div class="col-md-3">
                                        <label class="control-label">Start Time</label>
                                        <input type="text" name="times[0][start_time]"  placeholder="Start Time" class="form-control start_time timepicker timepicker-24" required=""> 
                                    </div>
                                    <div class="col-md-3">
                                        <label class="control-label">End Time</label>
                                        <input type="text" name="times[0][end_time]" placeholder="End Time" class="form-control end_time" required=""> 
                                    </div>
                                    <div class="col-md-4">
                                        <label class="control-label">Persons Allowed</label>
                                        <input type="text" name="times[0][persons_allowed]" placeholder="Persons Allowed" class="form-control" id="persons_allowed" required=""> 
                                    </div>
                                    <div class="col-md-1">
                                        <a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete">
                                            <i class="fa fa-close close1"></i>
                                        </a>
                                    </div>
                                </div> 
                            </div>
                        </div>
                        <div class="form-group form-md-radios">
                            <label class="col-md-3 control-label" for="form_control_1">Members Only</label>
                            <div class="col-md-9">
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="member_yes" name="members_only" value="1" class="md-radiobtn">
                                        <label for="member_yes"><span></span><span class="check"></span><span class="box"></span> Yes </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="member_no" name="members_only" value="0" class="md-radiobtn">
                                        <label for="member_no"><span></span><span class="check"></span><span class="box"></span> No </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-radios">
                            <label class="col-md-3 control-label" for="form_control_2">Multiple Time Slot Allow</label>
                            <div class="col-md-9">
                                <div class="md-radio-inline">
                                    <div class="md-radio">
                                        <input type="radio" id="multiple_time_yes" name="is_multiple_time" value="1" class="md-radiobtn">
                                        <label for="multiple_time_yes"><span></span><span class="check"></span><span class="box"></span> Yes </label>
                                    </div>
                                    <div class="md-radio">
                                        <input type="radio" id="multiple_time_no" name="is_multiple_time" value="0" class="md-radiobtn">
                                        <label for="multiple_time_no"><span></span><span class="check"></span><span class="box"></span> No </label>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input" id="select_box">
                            <label class="col-md-3 control-label" for="form_control_1">Age Group</label>
                            <div class="col-md-6">
                                <select class="form-control" name="age_grp_id" id="select_age_grp">
                                </select>
                                <div class="form-control-focus"> </div>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="form_control_1">Charges
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-6">
                                <input type="text" class="form-control" placeholder="" name="charges" id="charges">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter of your Charges</span>
                            </div>
                        </div>
                        <div class="form-group form-md-line-input">
                            <a href="javascript:;" data-repeater-create="" class="btn btn-info addNewActivite mt-repeater-add">
                                <i class="fa fa-plus"></i> Add Activities
                            </a>
                            <div data-repeater-list="activities" class=" dynamic_row"> 
                                <!-- <div data-repeater-item="">
                                    <div class="mt-row index1">
                                        <div class="col-md-8">
                                            <label class="control-label">Name</label>
                                            <input type="text" name="activities[0][name]" placeholder="Name" class="form-control"> 
                                        </div>
                                        <div class="col-md-3">
                                            <label class="control-label">Charges</label>
                                            <input type="text" name="activities[0][charges]" placeholder="Charge" class="form-control"> 
                                        </div>
                                        <div class="col-md-1">
                                            <a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete">
                                                <i class="fa fa-close close1"></i>
                                            </a>
                                        </div>
                                    </div>                                    
                                </div> -->
                            </div>
                        </div>

                    </div>
            </div>
            <div class="form-actions">
                <div class="row">
                    <div class="col-md-offset-3 col-md-9">
                        <button type="submit" class="btn green" id="add_event">Add</button>
                        <a href="<?php echo e(route('view-event')); ?>" class="btn" id="">Back</a>
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
<script src="<?php echo e(url('assets/admin/assets/global/plugins/moment.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets/admin/assets/global/plugins/jquery-inputmask/jquery.inputmask.bundle.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-timepicker/js/bootstrap-timepicker.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-datetimepicker/js/bootstrap-datetimepicker.min.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
$(document).ready(function () {

    callHideShow();

    $('input[type=radio][name=event_type]').change(function () {
        if (this.value == 'group_event') {
            $('.end-date-class').show();
        } else {
            $('.end-date-class').hide();
        }
    });
    $(document).on("click", ".addNewActivite", function () {

        var row_lenth = parseInt($(".mt-row").length);
        var html = '</br><div class="mt-row row_index' + row_lenth + '">';
        html += '<div class="col-md-8">';
        html += '<label class="control-label">Name</label>';
        html += '<input type="text" name="activities[' + row_lenth + '][name]" placeholder="Name" class="form-control"> ';
        html += '</div>';

        html += '<div class="col-md-3">';
        html += '<label class="control-label">Charges</label>';
        html += '<input type="text" name="activities[' + row_lenth + '][charges]" placeholder="Charge" class="form-control"> ';
        html += '</div>';


        html += '<div class="col-md-1">';
        html += '<a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete">';
        html += '<i class="fa fa-close remove_row" data-attr="' + row_lenth + '"></i>';
        html += '</a>';
        html += '</div>';

        html += '</div>';

        $(".dynamic_row").append(html);

    });

    $(document).on("click", ".remove_row", function () {
        var row_id = $(this).attr('data-attr');
        $(".row_index" + row_id).remove();
    });


    $(document).on("click", ".addNewDate", function () {

        var row_lenth = parseInt($(".mt-date-row").length);
        var html = '</br><div class=" mt-date-row row_index' + row_lenth + '">';
        html += '<div class="col-md-5">';
        html += '<label class="control-label">Start Date</label>';
        html += '<input type="text" name="dates[' + row_lenth + '][start_date]" data-id="' + row_lenth + '" id="start_' + row_lenth + '" placeholder="Start Date" class="form-control start_date" required=""> ';
        html += '</div>';

        html += '<div class="col-md-5 end-date-class">';
        html += '<label class="control-label">End Date</label>';
        html += '<input type="text" name="dates[' + row_lenth + '][end_date]" placeholder="End Date" data-id="' + row_lenth + '" readonly="true" id="end_' + row_lenth + '" class="form-control end_date" required=""> ';
        html += '</div>';


        html += '<div class="col-md-1">';
        html += '<a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete">';
        html += '<i class="fa fa-close remove_date_row" data-attr="' + row_lenth + '"></i>';
        html += '</a>';
        html += '</div>';
        html += '</div>';
        $(".dynamic_date_row").append(html);
        callHideShow();
        FormInputMask.init();
    });

    $(document).on("click", ".remove_date_row", function () {

        var row_id = $(this).attr('data-attr');
        $(".row_index" + row_id).remove();
    });

    $(document).on("click", ".addNewTime", function () {

        var row_lenth = parseInt($(".mt-time-row").length);
        // console.log(row_lenth);
        var html = '</br><div class=" mt-time-row row_index' + row_lenth + '">';
        html += '<div class="col-md-3">';
        html += '<label class="control-label">Start Time</label>';
        html += '<input type="text" name="times[' + row_lenth + '][start_time]" placeholder="Start Time" class="form-control start_time" required=""> ';
        html += '</div>';

        html += '<div class="col-md-3">';
        html += '<label class="control-label">End Time</label>';
        html += '<input type="text" name="times[' + row_lenth + '][end_time]" placeholder="End Time" class="form-control end_time" required=""> ';
        html += '</div>';

        html += '<div class="col-md-4">';
        html += '<label class="control-label">Persons Allowed</label>';
        html += '<input type="text" name="times[' + row_lenth + '][persons_allowed]" placeholder="Persons Allowed" class="form-control" required=""> ';
        html += '</div>';

        html += '<div class="col-md-1">';
        html += '<a href="javascript:;" data-repeater-delete="" class="btn btn-danger mt-repeater-delete">';
        html += '<i class="fa fa-close remove_time_row" data-attr="' + row_lenth + '"></i>';
        html += '</a>';
        html += '</div>';

        html += '</div>';
        $(".dynamic_time_row").append(html);
        FormInputMask.init();
    });

    $(document).on("click", ".remove_time_row", function () {

        var row_id = $(this).attr('data-attr');
        $(".row_index" + row_id).remove();
    });

    var form = $(this).parents("form");
    var csrf_token = $('meta[name="csrf-token"]').attr('content');
    var formdata = false;
    if (window.FormData)
    {
        formdata = new FormData();
        formdata.append('_token', csrf_token);
    }
    submit_form(window.baseUrl + '/admin/list-agegroup', formdata, form, function (data)
    {
        var final_data = $.parseJSON(data);
        if (final_data.status_code == 200) {
            $.each(final_data.data, function (key, value) {
                $("#select_box").find("select").append('<option value=' + value.id + '>' + value.age_grp_val + '</option>');
            });
            return false;
        } else {
            toastr.error(final_data.message.desc);
        }

    });
    return false;

});

function callHideShow() {
    if ($('input[name="event_type"]:checked').val() == 'group_event') {
        $('.end-date-class').show();
    } else {
        $('.end-date-class').hide();
    }
}
function pad(s) {
    return (s < 10) ? '0' + s : s;
}
var FormInputMask = function () {
    var a = function () {
        var date = new Date();
        $('.start_date').datepicker({
            autoclose: !0,
            format: 'dd/mm/yyyy',
            startDate: date
        }).on('changeDate',
                function (e) {
                    var count = $('#' + e.target.id).attr('data-id');
                    var selectedDate = e.date;
                    $('#end_' + count).val([pad(selectedDate.getDate()), pad(selectedDate.getMonth() + 1), selectedDate.getFullYear()].join('/'));
                    $('#end_' + count).prop('readonly', false);
                    $('#end_' + count).datepicker({
                        autoclose: !0,
                        format: 'dd/mm/yyyy',
                        startDate: selectedDate
                    })
                });
        // $('.end_date').datepicker({autoclose: !0, format: 'dd/mm/yyyy'});
        $(".start_time").timepicker({
            autoclose: !0,
            minuteStep: 5,
            showSeconds: !1,
            showMeridian: !1
        });
        $(".end_time").timepicker({
            autoclose: !0,
            minuteStep: 5,
            showSeconds: !1,
            showMeridian: !1
        });

    };
    return {
        init: function () {
            a()
        }
    }
}();

App.isAngularJsApp() === !1 && jQuery(document).ready(function () {
    FormInputMask.init();
});

$(document).ready(function () {
    $('#event_form').validate({
        rules: {
            event_type: {
                required: true
            },
            event_name: {
                required: true,

            },
            event_description: {
                required: true,

            },
            event_picture: {
                required: true,
                extension: "jpg|jpeg|png"
            },
            // dates[]: {
            //     required: true,

            // }, 
            // end_date: {
            //     required: true,

            // },
            start_time: {
                required: true,

            },
            end_time: {
                required: true,

            },
            members_only: {
                required: true,

            },
            charges: {
                required: true,

            },
            persons_allowed: {
                required: true,

            },
        },
    });
});



</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('webadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/pages/events.blade.php ENDPATH**/ ?>