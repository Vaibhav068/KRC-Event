<div class="content content-count-class" data-id="<?php echo e($player_count); ?>" id="content_<?php echo e($player_count); ?>">
    <div class="player-title">Player - <?php echo e($player_count); ?> <a href="javascript:void(0);" onclick="removePlayer(<?php echo e($player_count); ?>);">Delete</a></div>
    <div class="add-player-box">
        <label>Add Player Details</label>
        <div class="row">
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="player[<?php echo e($player_count); ?>][first_name]" id="first_name_<?php echo e($player_count); ?>" placeholder="First name" />
                </div>
            </div>
            <div class="col-md-4" style="display: none;">
                <div class="form-group">
                    <input type="text" class="form-control"  name="player[<?php echo e($player_count); ?>][middle_name]" id="middle_name_<?php echo e($player_count); ?>" placeholder="Middle name" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="player[<?php echo e($player_count); ?>][last_name]" id="last_name_<?php echo e($player_count); ?>" placeholder="Last name" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="number" class="form-control" minlength="<?php echo e($events['age_min']); ?>" maxlength="<?php echo e($events['age_max']); ?>" name="player[<?php echo e($player_count); ?>][age]" id="age_<?php echo e($player_count); ?>" placeholder="Age" />
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <input type="text" class="form-control" name="player[<?php echo e($player_count); ?>][allergy]" id="_<?php echo e($player_count); ?>" placeholder="Allergy if any" />
                </div>
            </div>
        </div>
        <div class="row" id="player_div_<?php echo e($player_count); ?>">
            <input type="hidden" class="form-control" id="event_type_<?php echo e($player_count); ?>" value="<?php echo e($events['event_type']); ?>" name="player[<?php echo e($player_count); ?>][event_type]" />
            <form class="" id="add_slot_<?php echo e($player_count); ?>" enctype="multipart/form-data" onsubmit="return false;" method="post"  >
                <?php echo csrf_field(); ?>
                <input type="hidden" value="<?php echo e($events['event_id']); ?>" name="event_id" id="event_id">
                <input type="hidden" value="<?php echo e($player_count); ?>" name="player_count_slot" id="player_count<?php echo e($player_count); ?>">
                <input type="hidden" value="1" name="player_slot_count" id="player_slot_count_<?php echo e($player_count); ?>">
            </form>
        </div>
        <?php if($events['event_type']=="group_event"): ?>
        <a href="javascript:void(0);" data-id="<?php echo e($player_count); ?>" class="add-more-event" style="display: none;" >Book Aditional Day</a>
        <?php else: ?>
        <div class="row">
            <div class="col-md-12 addMoreEvent">
                <a href="javascript:void(0);" data-id="<?php echo e($player_count); ?>" class="add-more-event">Book Aditional Day</a>
            </div>
        </div>
        <?php endif; ?>
    </div>
</div><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/player_details.blade.php ENDPATH**/ ?>