

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
                    <span class="caption-subject font-red sbold uppercase">Age Group</span>
                </div> 
            </div>
            <div class="portlet-body">
                <div class="table-toolbar">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="btn-group  pull-right">
                                <a href="../admin/agegroup" class="btn green"> Add New</a>
                            </div>
                        </div>
                    </div>
                </div>
                <table class="table table-striped table-hover table-bordered" id="age_grp_table">
                    <thead>
                        <tr>   
                            <th>No</th> 
                            <th> Age Group </th>
                            <th>Action</th>
                            <!-- <th> Delete </th> -->
                        </tr>
                    </thead>
                    <tbody>
                    </tbody>
                </table>
            </div>
        </div>
        <!-- END EXAMPLE TABLE PORTLET-->
    </div>
</div>

<button class="btn btn-primary btn-lg" style="display: none;" data-toggle="modal" data-target="#basic">Edit age grp </button>

 <div class="modal fade" id="basic" tabindex="-1" role="basic" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal" aria-hidden="true"></button>
                <h4 class="modal-title">Update Age group</h4>
            </div>
            <!-- <div class="modal-body"> Modal body goes here </div> -->
            <form class="form-horizontal" id="update_age_grp_form" enctype="multipart/form-data" >
                <?php echo e(csrf_field()); ?>

                <div class="form-body">
                    <div class="form-group form-md-line-input">
                        <label class="col-md-3 control-label" for="form_control_1">Age Group
                            <span class="required">*</span>
                        </label>
                        <div class="col-md-6">
                            <input type="text" class="form-control" placeholder="" name="age_grp_val" id="age_grp_val" >
                            <div class="form-control-focus"> </div>
                            <span class="help-block">Enter your Age Grp</span>
                        </div>
                            <input type="hidden" class="form-control" placeholder="" name="id" id="id" >
                    </div>
                </div>
            </form>
            <div class="modal-footer">
                <button type="button" class="btn dark btn-outline" data-dismiss="modal">Close</button>
                <button type="submit" class="btn green" id="update_age_grp">Update</button>
            </div>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

</div>
<?php $__env->stopSection(); ?>

<?php $__env->startSection('script'); ?>

<script src="https://cdn.datatables.net/1.10.16/js/jquery.dataTables.min.js"></script>

<script type="text/javascript">


    var table;
        $.ajaxSetup({headers: {'X-CSRF-TOKEN': jQuery('meta[name="csrf-token"]').attr('content')}});
    
    $(function() {
               $('#age_grp_table').DataTable({
               processing: true,
               serverSide: true,
               ajax: '<?php echo e(route('callagegroup')); ?>',
               columns: [   
                            {data: 'DT_RowIndex', name: 'DT_RowIndex'},
                            { data: 'age_grp_val', name: 'age_grp_val' },
                            {
                                orderable: false, 
                                searchable: false,
                                data: 'id', "orderable": false, render: function (data, type, row, meta) 
                                {
                                    return '<a href="#basic" id="'+data+'"  data-toggle="modal" class="btn btn-sm btn-clean btn-icon btn-icon-md editRecord" onclick=edit_age_group("'+data+'")><i class="fa fa-pencil-square-o" aria-hidden="true"></i></a> <a href="javascript:void(0);" id="'+data+'" class="btn btn-sm btn-clean btn-icon btn-icon-md deleteRecord" title="Delete"><i class="fa fa-trash" aria-hidden="true"></i></a></a>';
                                },
                            },
                            // {
                            //     orderable: false, 
                            //     searchable: false,
                            //     data: 'id', "orderable": false, render: function (data, type, row, meta) 
                            //     {
                            //         return '<a href="javascript:void(0);" id="'+data+'" class="btn btn-sm btn-clean btn-icon btn-icon-md deleteRecord" title="Delete">Delete</a>';
                            //     }
                            // },
                        ]
            });
         });
             
        function edit_age_group(id){
            var form = $(this).parents("form")
            var formdata = false;
            if(window.FormData)
            {
                formdata = new FormData();
                formdata.append('id',id);
            }
            submit_form(window.baseUrl+'/admin/edit-agegroup/'+id,formdata,form,function(data) 
            {   
                var final_data =$.parseJSON(data);
                console.log(final_data);
                if (final_data.status_code == 200) {
                     $('#basic').modal('show');
                     $('#age_grp_val').val(final_data.data.age_grp_val);
                     $('#id').val(final_data.data.id);
                    toastr.success(final_data.message.desc);
                }else{
                    toastr.error(final_data.message.desc);
                }
                
            })
            return false;
        }

            

   $(document).on("click", "#update_age_grp", function (e) {
        var table;
        $("#update_age_grp_form").validate({
            rules: {
                age_grp_val:{
                  required: true,
                },
            },
        });

        if($("#update_age_grp_form").valid()){
            e.preventDefault();
            var id = $('#id').val();
            var age_grp_val = $('#age_grp_val').val();
            //var weburl = "<?php echo e(env('APP_URL')); ?>";
            var form = $(this).parents("form")
            var formdata = false;
            if(window.FormData)
            {

                formdata = new FormData();
                formdata.append('id',id);
                formdata.append('age_grp_val',age_grp_val);
            }
            submit_form(window.baseUrl+'/admin/update-agegroup/'+id,formdata,form,function(data) 
            {   
                var final_data =$.parseJSON(data);
                if (final_data.status_code == 200) {
                    toastr.success(final_data.message.desc);
                    $('#age_grp_table').DataTable().ajax.reload()
                    $("#basic").modal('toggle');
                    return false;
                }else{
                    toastr.error(final_data.message.desc);
                }
                
            })
            return false;
            }

    });

</script>

<?php $__env->stopSection(); ?>
<?php echo $__env->make('webadmin.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/pages/view-age-group.blade.php ENDPATH**/ ?>