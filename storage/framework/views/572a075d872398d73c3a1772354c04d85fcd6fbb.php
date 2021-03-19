

<?php $__env->startSection('main_content'); ?>
 <div class="row" style="margin: auto; width: 50%;">
    <div class="col-md-12">
        <!-- BEGIN VALIDATION STATES-->
        <div class="portlet light portlet-fit portlet-form bordered">
            <div class="portlet-title">
                <div class="caption">
                    <i class=" icon-layers font-green"></i>
                    <span class="caption-subject font-green sbold uppercase">Add Age Group</span>
                </div>
            </div>
            <div class="portlet-body">
                <!-- BEGIN FORM-->
                <form class="form-horizontal" id="age_grp_form" enctype="multipart/form-data" >
                    <?php echo e(csrf_field()); ?>

                    <div class="form-body">
                        <div class="form-group form-md-line-input">
                            <label class="col-md-3 control-label" for="form_control_1">Age Group
                                <span class="required">*</span>
                            </label>
                            <div class="col-md-9">
                                <input type="text" class="form-control" placeholder="" name="age_grp_val" id="age_grp_val">
                                <div class="form-control-focus"> </div>
                                <span class="help-block">Enter your Age Grp</span>
                            </div>
                        </div>
                    </div>
                    <div class="form-actions">
                        <div class="row">
                            <div class="col-md-offset-3 col-md-9">
                                <button type="submit" class="btn green" id="add_age_grp">Add</button>
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
     $(document).on("click", "#add_age_grp", function (e) {
        $("#age_grp_form").validate({
            rules: {
                age_grp_val:{
                  required: true,
                  // number: true
                },
            },
        });

        if($("#age_grp_form").valid()){
            e.preventDefault();
            //var weburl = "<?php echo e(env('APP_URL')); ?>";
            var form = $(this).parents("form")
            var formdata = false;
            if(window.FormData)
            {
                formdata = new FormData(form[0]);
            }
            submit_form(window.baseUrl+'/admin/create-agegroup',formdata,form,function(data) 
            {   
                // console.log(data);
                var final_data =$.parseJSON(data);
                console.log(final_data);
                if (final_data.status_code == 200) {
                    toastr.success(final_data.message.desc);
                    window.location.href = window.baseUrl+"/admin/view-agegroup";
                }else{
                    toastr.error(final_data.message.desc);
                }
                
            })
            return false;
            }

    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('webadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/pages/age-group.blade.php ENDPATH**/ ?>