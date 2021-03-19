
<?php $__env->startSection('css'); ?>
<link href="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-datepicker/css/bootstrap-datepicker3.min.css')); ?>" rel="stylesheet" type="text/css" />
<?php $__env->stopSection(); ?>
<?php $__env->startSection('main_content'); ?>
<div class="container">
    <div class="event-detail-banner">
        <div class="img">
            <img src="<?php echo e(url('images/')); ?>/<?php echo e($event['event_image']); ?>"/>
        </div>
        <div class="caption">
            <div class="row align-items-center">
                <div class="col-md-9">
                    <h2><?php echo e($event->event_name); ?></h2>
                </div>
                <div class="col-md-3">
                    <?php
                    $session = Auth::user();
                    ?>
                    <?php if(Auth::user()): ?>  
                    <?php if($event->members_only == '1' && $session->is_member == 'Yes' ): ?>  
                    <button type="button" id="book_now" class="btn btn-primary btn-block">Book Now</button> 
                    <?php elseif($event->members_only == '0'): ?>
                    <button type="button" id="book_now" class="btn btn-primary btn-block">Book Now</button>
                    <?php else: ?>
                    <a href="<?php echo e(url('/contact-us')); ?>" class="btn btn-primary btn-block">Membership to Book Event </a>
                    <?php endif; ?>
                    <?php else: ?>        
                    <a href="<?php echo e(url('/')); ?>" class="btn btn-primary btn-block">Log in</a>
                    <?php endif; ?>
                </div>
            </div>
            <p class="date-price"> 
                <?php $__currentLoopData = $event->dates; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                <?php echo e(date('jS M', strtotime($date['event_start_date']))); ?>

                <?php if($event->event_type == "group_event"): ?>
                - <?php echo e(date('jS M', strtotime($date['event_end_date']))); ?>

                <?php endif; ?>
                <?php if(!$loop->last): ?>, <?php endif; ?>
                <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                | £<span id="event_price"><?php echo e(number_format($event->charges,2)); ?></span>  onwards
            </p>
        </div>
    </div>
    <div class="event-detail-box">
        <div class="title"><h2>Event Details</h2></div>
        <div class="content"><?php echo e($event->event_description); ?></div>
    </div>
    <form class="" id="add_player_form" enctype="multipart/form-data" onsubmit="return false;" method="post"  >
        <?php echo csrf_field(); ?>
        <input type="hidden" value="<?php echo e($event->id); ?>" name="event_id" id="event_id">
        <input type="hidden" value="1" name="player_count" id="player_count">
    </form>
    <form method="POST" onsubmit="return false;" name="event_form" id="event_form" style="display: none" autocomplete="false">
        <?php echo csrf_field(); ?>
        <input type="hidden" value="<?php echo e($event->id); ?>" name="event_id" id="event_id">
        <div class="event-detail-box">
            <div class="title"><h2>Attendee Details</h2></div>
            <span id="payer_list">
            </span>
            <div class="text-right mt-3 mb-2">
                <button type="button" class="btn btn-primary" onclick="addPlayer()">Add Player</button>
            </div>
        </div>

        <div class="event-detail-box">
            <div class="title"><h2>Parent /Guardian Details</h2></div>
            <div class="content">
                <div class="add-player-box">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="first_name" id="first_name" placeholder="Full name" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="email" id="email" placeholder="Email address" />
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <input type="text" class="form-control" name="phone_number" id="phone_number" placeholder="Phone number" />
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="event-total">
            <div class="row align-items-center justify-content-between">
                <div class="col"><p>TOTAL: £<span id="totale_price"></span></p></div>
                <div class="col text-right"><button type="button" class="btn btn-primary" onclick="checkout();">Checkout</button></div>
            </div>
        </div>
    </form>
</div>
<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script src="<?php echo e(url('assets/admin/assets/global/plugins/moment.min.js')); ?>" type="text/javascript"></script>
<script src="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-datepicker/js/bootstrap-datepicker.min.js')); ?>" type="text/javascript"></script>
<script type="text/javascript">
                    availableDates = <?php echo json_encode($date_array); ?>

                    activitiesArray = <?php echo json_encode($activities_array); ?>

                    $(document).on('click', '.date_class', function (e) {
                        $(".event-date-" + $(this).attr('data-count') + " li").each(function () {
                            if ($('#event_type_' + $(this).attr('data-count')).val() == "general_event" || $('#event_type_' + $(this).attr('data-count')).val() == "kids_tennis") {
                                $(this).removeClass("selected");
                            }
                        });
                        $(this).addClass('selected');
                        var valu = $('#date_' + $(this).attr('data-count')).val();
                        valu = valu != "" ? valu + ',' + $(this).attr('data-id') : $(this).attr('data-id');
                        $('#date_' + $(this).attr('data-count')).val(valu);
                    });
                    $(document).on('click', '.time_class', function (e) {
                        $(".event-time-" + $(this).attr('data-count') + " li").each(function () {
                            if ($('#event_type_' + $(this).attr('data-count')).val() == "general_event" || $('#event_type_' + $(this).attr('data-count')).val() == "kids_tennis") {
                                $(this).removeClass("selected");
                            }
                        });
                        if ($(this).hasClass('selected')) {
                            $(this).removeClass('selected');
                        } else {
                            $(this).addClass('selected');
                        }
                        if ($('#event_type_' + $(this).attr('data-count')).val() == "general_event" || $('#event_type_' + $(this).attr('data-count')).val() == "kids_tennis") {
                            $('#time_' + $(this).attr('data-count')).val($(this).attr('data-id'));
                        } else {
                            var valu = '';
                            $(".event-time-" + $(this).attr('data-count') + " li").each(function () {
                                if ($(this).hasClass('selected')) {
                                    valu = valu != "" ? valu + ',' + $(this).attr('data-id') : $(this).attr('data-id');
                                }
                            });
                            $('#time_' + $(this).attr('data-count')).val(valu);
                        }
                    });
                    $("#book_now").click(function (e) {
                        addPlayer();
                        $('#event_form').show();
                    });
                    $(document).on('click', '.dltEventSlot', function (e) {
                        var countData = $(this).attr('data-count');
                        if (($('.selectEvent').length) > 1) {
                            $('#selectEvent_' + countData).remove();
                        } else {
                            toastr.error("Can't remove time slot, you need at least one time slot");
                        }
                        calculateData();
                    });
                    $(document).on('click', '.add-more-event', function (e) {
                        var countData = $(this).attr('data-id');
                        var form = $("#add_slot_" + countData);
                        var formdata = false;
                        if (window.FormData) {
                            formdata = new FormData(form[0]);
                        }
                        submit_form(window.baseUrl + '/add-time-slot', formdata, form, function (data) {
                            var finalData = $.parseJSON(data);
                            if (finalData.status_code == 200) {
                                $('#player_div_' + countData).append(finalData.data);
                                calculateData();
                                $('#player_slot_count_' + countData).val(parseInt($('#player_slot_count_' + countData).val()) + 1);
                                $('.start_date').datepicker({autoclose: !0, format: 'dd/mm/yyyy', beforeShowDay: function (date) {
                                        var dateString = date.getDate() + "-" + (date.getMonth() + 1) + "-" + date.getFullYear();
                                        if (availableDates.indexOf(dateString) < 0) {
                                            return {enabled: false};
                                        } else {
                                            return {enabled: true};
                                        }
                                    }, changeMonth: true, changeYear: true}).on('changeDate',
                                        function (e) {
                                            var count = $('#' + e.target.id).attr('data-count');
                                            var selectedDate = e.date;
                                            var date = selectedDate.getFullYear() + "/" + (selectedDate.getMonth() + 1) + "/" + selectedDate.getDate();
                                            $('#start_date_' + count).val(date);
                                            $('#end_date_' + count).val(date);
                                        });
                                $('.multiSelectMenu ').selectpicker('refresh');
                            } else {
                                toastr.error(finalData.message.desc);
                            }
                        });
                    });
                    function addPlayer() {
                        var form = $("#add_player_form");
                        var formdata = false;
                        if (window.FormData) {
                            formdata = new FormData(form[0]);
                        }
                        submit_form(window.baseUrl + '/add-player', formdata, form, function (data) {
                            var finalData = $.parseJSON(data);
                            if (finalData.status_code == 200) {
                                $('#payer_list').append(finalData.data);
                                calculateData();
                                $('#player_count').val(parseInt($('#player_count').val()) + 1);
                                $('.multiSelectMenu ').selectpicker('refresh');
                                $('.date_class').click();
                                $('.add-more-event').click();
                            } else {
                                toastr.error(finalData.message.desc);
                            }
                        });
                    }
                    function removePlayer(id) {
//                        $('#player_count').val(parseInt($('#player_count').val()) - 1);
                        $('#content_' + id).remove();
                        calculateData();
                    }
                    $(document).on('change', 'select.time_slot_option', function (e) {
                        calculateData();
                    });
                    $(document).on('change', 'select.activities_option', function (e) {
                        calculateData();
                    });
                    function calculateData() {
                        var addonPrice = 0;
                        var countBoking = 0;
                        $(".selectEvent").each(function () {
                            var dateId = $(this).attr('data-id');
                            var playerCountData = $(this).attr('data-player');
                            var slotVal = $('#time_slot_' + playerCountData + '_' + dateId).val();
                            if (slotVal) {
                                countBoking = parseInt(countBoking) + parseInt(slotVal.length);
                            }
                            var activityprice = $('#activities_' + playerCountData + '_' + dateId).val();
                            if (activityprice) {
                                $.each(activityprice, function (index, value) {
                                    addonPrice = parseInt(addonPrice) + parseInt(activitiesArray[value]['activities_charges']);
                                });
//                                countBoking = parseInt(countBoking) + parseInt(slotVal.length);
                            }
                        });
                        var price = (parseInt($('#event_price').text()) * parseInt(countBoking) + addonPrice);
                        $('#totale_price').html(price.toFixed(2));
                    }
                    function checkFormValidateion() {
                        var isValid = true;
                        var player = 1;
                        $(".content-count-class").each(function () {
                            var id = $(this).attr('data-id');
                            if ($('#first_name_' + id).val() == "") {
                                toastr.error("Please Enter The First Name For Player " + player);
                                isValid = false;
                                return false;
                            }
//                            if ($('#middle_name_' + id).val() == "") {
//                                toastr.error("Please Enter The Middle Name For Player " + player);
//                                isValid = false;
//                                return false;
//                            }
                            if ($('#last_name_' + id).val() == "") {
                                toastr.error("Please Enter The Last Name For Player " + player);
                                isValid = false;
                                return false;
                            }
                            if ($('#age_' + id).val() == "") {
                                toastr.error("Please Enter The Age For Player " + player);
                                isValid = false;
                                return false;
                            } else {
                                var ageGroup = $('#age_' + id);
                                var ageVal = parseInt($('#age_' + id).val());
                                var minlength = parseInt(ageGroup.attr('minlength'));
                                var maxlength = parseInt(ageGroup.attr('maxlength'));
                                if (ageVal < minlength || ageVal > maxlength) {
                                    toastr.error("The age must be a number between " + ageGroup.attr('minlength') + " and " + ageGroup.attr('maxlength') + " For player" + player);
                                    isValid = false;
                                    return false;
                                }
                            }
                            $(".selectEvent").each(function () {
                                var dateId = $(this).attr('data-id');
                                var playerCountData = $(this).attr('data-player');
                                if ($('#date_piker_' + playerCountData + '_' + dateId).val() == "") {
                                    toastr.error("Please Select The Event Date");
                                    isValid = false;
                                    return false;
                                }
                                if ($('#time_slot_' + playerCountData + '_' + dateId).val() == null || $('#time_slot_' + playerCountData + '_' + dateId).val() == "") {
                                    toastr.error("Please Select The Event Time");
                                    isValid = false;
                                    return false;
                                }
                            });
                            player = player + 1;
                        });
                        return isValid;
                    }
                    function checkout() {
                        var form = $("#event_form");
                        var formdata = false;
                        if (window.FormData) {
                            formdata = new FormData(form[0]);
                        }
                        if (this.checkFormValidateion()) {
                            submit_form(window.baseUrl + '/checkout', formdata, form, function (data) {
                                var finalData = $.parseJSON(data);
                                if (finalData.status_code == 200) {
                                    toastr.success(finalData.message.desc);
                                    window.location = window.baseUrl + '/tickets-summary/' + finalData.data['booking_id'];
                                } else {
                                    if (finalData.message == "Unauthenticated.") {
                                        toastr.error("Please login and try to book event");
                                    } else {
                                        toastr.error(finalData.message.desc);
                                    }
                                }
                            });
                        }
                    }


</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/event-details.blade.php ENDPATH**/ ?>