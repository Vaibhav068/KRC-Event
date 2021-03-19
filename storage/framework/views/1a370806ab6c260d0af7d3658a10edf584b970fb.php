<div class="col-md-4 selectEvent" style="padding-top: 10px;" data-player="<?php echo e($player_count_slot); ?>" data-id="<?php echo e($player_slot_count); ?>" id="selectEvent_<?php echo e($player_slot_count); ?>">
    <div class="eventSlot">
        <a class="dltEventSlot" data-count="<?php echo e($player_slot_count); ?>" href="javascript:void(0);">x</a>
        <div class="col-md-12">
            <label>Select Event Date</label>
            <?php if($slot_data['event_type']=="kids_tennis" || $slot_data['event_type']=="general_event"): ?>
            <div class="form-group">
                <input type="hidden" class="form-control" id="start_date_<?php echo e($player_count_slot); ?>_<?php echo e($player_slot_count); ?>" name="player[<?php echo e($player_count_slot); ?>][slot][<?php echo e($player_slot_count); ?>][start_date]" />
                <input type="hidden" class="form-control" id="end_date_<?php echo e($player_count_slot); ?>_<?php echo e($player_slot_count); ?>" name="player[<?php echo e($player_count_slot); ?>][slot][<?php echo e($player_slot_count); ?>][end_date]" />
                <input type="text" class="form-control date-picker start_date" data-count="<?php echo e($player_count_slot); ?>_<?php echo e($player_slot_count); ?>" id="date_piker_<?php echo e($player_count_slot); ?>_<?php echo e($player_slot_count); ?>" data-date-format="mm/dd/yyyy" placeholder="Select Date" />
            </div>
            <?php else: ?>
            <div class="form-group">
                <select class="multiSelectMenu show-menu-arrow form-control" multiple readonly="readonly" id="date_piker_<?php echo e($player_count_slot); ?>_<?php echo e($player_slot_count); ?>" name="player[<?php echo e($player_count_slot); ?>][slot][<?php echo e($player_slot_count); ?>][date_slot]" data-live-search="false">
                    <option value="">Slect Date</option>
                    <?php $__currentLoopData = $slot_data['dates']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $date): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($date['id']); ?>" selected="selected"> 
                        <?php echo e(date('M d,Y', strtotime($date['event_start_date']))); ?> to <?php echo e(date('M d,Y', strtotime($date['event_end_date']))); ?>

                    </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
            <?php endif; ?>
        </div>

        <div class="col-md-12">
            <label>Select Event Time</label>
            <div class="form-group">
                <select class="multiSelectMenu show-menu-arrow form-control time_slot_option" id="time_slot_<?php echo e($player_count_slot); ?>_<?php echo e($player_slot_count); ?>" <?php echo e(($slot_data['is_multiple_time']==1)?"multiple":''); ?> name="player[<?php echo e($player_count_slot); ?>][slot][<?php echo e($player_slot_count); ?>][time_slot][]" data-live-search="false">
                    <?php if($slot_data['is_multiple_time']==0): ?>
                    <option value="">Slect Time slot</option>
                    <?php endif; ?>
                    <?php $__currentLoopData = $slot_data['times']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $time): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($time['id']); ?>"> <?php echo e(date("h:i A", strtotime($time['event_start_time']))); ?> to <?php echo e(date("h:i A", strtotime($time['event_end_time']))); ?></option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

        <div class="col-md-12">
            <label>Optional Items</label>
            <div class="form-group">
                <select class="multiSelectMenu show-menu-arrow form-control activities_option" id="activities_<?php echo e($player_count_slot); ?>_<?php echo e($player_slot_count); ?>" name="player[<?php echo e($player_count_slot); ?>][slot][<?php echo e($player_slot_count); ?>][activities][]" multiple data-live-search="false">
                    <?php $__currentLoopData = $slot_data['activities']; $__env->addLoop($__currentLoopData); foreach($__currentLoopData as $key => $activitie): $__env->incrementLoopIndices(); $loop = $__env->getLastLoop(); ?>
                    <option value="<?php echo e($activitie['id']); ?>"><?php echo e($activitie['activities_name']); ?> &nbsp;&nbsp;&nbsp;£<?php echo e(number_format($activitie['activities_charges'],2)); ?> </option>
                    <?php endforeach; $__env->popLoop(); $loop = $__env->getLastLoop(); ?>
                </select>
            </div>
        </div>

    </div>
</div><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/slot_details.blade.php ENDPATH**/ ?>