

<?php $__env->startSection('css'); ?>

<?php $__env->stopSection(); ?>

<?php $__env->startSection('main_content'); ?>
<section id="intro">
    <div class="overlay overlay-bg"></div>
    <div class="owl-carousel">
        <div class="item section-padding" style="background-image:url(<?php echo e(url('assets/website/img/banner-1.png')); ?>);">
            <div class="container">
                <div class="intro_text white_text">
                    <h1>2020 Summer Holiday Camps 5-16 Years</h1>
                    <p>The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here.</p>
                    <a href="<?php echo e(route('event-lists')); ?>" class="btn">Explore Events</a>
                </div>
            </div>
        </div>
        <div class="item section-padding" style="background-image:url(<?php echo e(url('assets/website/img/banner-2.png')); ?>);">
            <div class="container">
                <div class="intro_text white_text">
                    <h1>Holiday Kids Tennis Camps</h1>
                    <p> The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here. </p>
                    <a href="<?php echo e(route('event-lists')); ?>" class="btn">Explore Events</a>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- /Intro -->

<!--sign up-->
<?php if(auth()->guard()->guest()): ?>
<section class="register">
    <div class="container">
        <div class="row">
            <div class="col-md-12 register-right" style="margin-bottom: 10px;">
                <br>
                <?php echo $__env->make('errormessage', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?>
                <ul class="nav nav-tabs nav-justified" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="login-tab" data-toggle="tab" href="#login" role="tab" aria-controls="login" aria-selected="true">Guest Login</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Guest Registration</a>
                    </li>
                </ul>
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active" id="login" role="tabpanel" aria-labelledby="login-tab">
                        <div class="container">
                            <div class="row justify-content-center">
                                <div class="col-lg-6 register-form">
                                    <form class="" id="login_form" enctype="multipart/form-data" action="<?php echo e(route('user-login')); ?>" method="post" >
                                        <?php echo csrf_field(); ?>
                                        <div class="form-group">
                                            <label for="inputEmail">Email address</label>
                                            <input type="email" class="form-control" id="inputEmail" aria-describedby="emailHelp" placeholder="Enter email" name="email">
                                        </div>
                                        <div class="form-group">
                                            <label for="inputPassword">Password</label>
                                            <input type="password" class="form-control" id="inputPassword" placeholder="Password" name="password">
                                        </div>
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a class="forgot" href="javascript:void(0);" data-toggle="modal" data-target="#exampleModal">Forgot password?</a>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="tab-pane fade show" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                        <div id="reg_div">
                            <form class="" id="register_form" method="post" enctype="multipart/form-data" >
                                <?php echo e(csrf_field()); ?>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-6 register-form"> 
                                            <div class="form-group">
                                                <label>First Name</label>
                                                <input type="text" class="form-control" placeholder="First Name *" name="first_name" />
                                            </div>
                                            <div class="form-group">
                                                <label>Last Name</label>
                                                <input type="text" class="form-control" placeholder="Last Name *" name="last_name" />
                                            </div>

                                            <div class="form-group">
                                                <label>Email</label>
                                                <input type="email" class="form-control" placeholder="Email *" name="email" id="email" />
                                            </div>
                                        </div>
                                        <div class="col-md-6 register-form">
                                            <div class="form-group">
                                                <label>Phone Number</label>
                                                <input type="text" maxlength="10" minlength="10" class="form-control" placeholder="Phone *" name="mobile" />
                                            </div>
                                            <div class="form-group">
                                                <label>Password</label>
                                                <input type="password" class="form-control" placeholder="Password *" name="password" id="password" />
                                            </div>

                                            <div class="form-group">
                                                <label>Confirm Password</label>
                                                <input type="password" class="form-control" placeholder="Confirm Password *" name="confirm_password"  />
                                            </div>
                                            <button type="submit" class="btn btn-primary" id="form_register_btn">Register</button>
                                        </div>
                                    </div>
                                </div>
                            </form>
                        </div>
                        <div id="verify_otp_div" style="display: none">
                            <form class="" id="otp_verify_form" method="post" enctype="multipart/form-data" >
                                <?php echo e(csrf_field()); ?>

                                <div class="container">
                                    <div class="row">
                                        <div class="col-md-12 register-form"> 
                                            <div class="form-group">
                                                <label>Verify OTP</label>
                                                <input type="text" class="form-control" placeholder="OTP" name="otp" />
                                            </div>
                                            <input type="hidden" class="form-control" placeholder="id" id="user_id" name="id" value="" />
                                        </div>
                                        <button type="submit" class="btn btn-primary" id="otp_verify_btn">verify</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    </div>
</section>
<?php endif; ?>
<!-- /sign up-->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">  
            <form id="forgot_form" class="forgot_form" method="post" enctype="multipart/form-data" >
                <?php echo e(csrf_field()); ?>

                <div class="modal-body">
                    <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                    <div class="forgot-pass-box text-center">
                        <img src="<?php echo e(url('img/forgot-pass-lock-icon.jpg')); ?>" />
                        <p class="title">Forgot Password</p>
                        <p>Enter your email and we will send you a link to rest your password</p>
                    </div>
                    <div class="form-group">
                        <input type="email" class="form-control" name="email" placeholder="Enter your email ID" />
                    </div>
                </div>
                <div class="modal-footer text-center">
                    <button type="submit" class="btn btn-primary" id="send_email">Send Email</button>
                </div>
            </form>
        </div>
    </div>
</div>

<?php $__env->stopSection(); ?>
<?php $__env->startSection('script'); ?>
<script type="text/javascript">
    $(document).ready(function () {
        $('#register_form').validate({
            rules: {
                first_name: {
                    required: true
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                mobile: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
            },
        });

        $('#login_form').validate({
            rules: {
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
            },
        });
    });


    $(document).on("click", "#form_register_btn", function (e) {
        $('#register_form').validate({
            rules: {
                first_name: {
                    required: true
                },
                email: {
                    required: true,
                },
                password: {
                    required: true,
                },
                last_name: {
                    required: true,
                },
                mobile: {
                    required: true,
                },
                confirm_password: {
                    required: true,
                    equalTo: "#password"
                },
            },
        });

        if ($("#register_form").valid()) {
            e.preventDefault();
            //var weburl = "<?php echo e(env('APP_URL')); ?>";
            var form = $(this).parents("form")
            var formdata = false;
            if (window.FormData)
            {
                formdata = new FormData(form[0]);
            }
            submit_form(window.baseUrl + '/user-register', formdata, form, function (data)
            {
                // console.log(data);
                var final_data = $.parseJSON(data);
                console.log(final_data.data);
                var id = final_data.data;
                //return false;
                if (final_data.status_code == 200) {
                    $("#reg_div").hide();
                    // var id = $('#user_id').val();
                    // $("#verify_otp_div").hide();
                    $("#verify_otp_div").show();
                    $('#user_id').val(id);
                    toastr.success(final_data.message.desc);
                    //window.location.href = window.baseUrl + "/";
                } else {
                    toastr.error(final_data.message.desc);
                }

            })
            return false;
        }

    });

    $(document).on("click", "#otp_verify_btn", function (e) {
        $('#otp_verify_form').validate({
            rules: {
                otp: {
                    required: true
                },
            },
        });

        if ($("#otp_verify_form").valid()) {
            e.preventDefault();
            //var weburl = "<?php echo e(env('APP_URL')); ?>";
            var form = $(this).parents("form")
            var formdata = false;
            if (window.FormData)
            {
                formdata = new FormData(form[0]);
            }
            submit_form(window.baseUrl + '/otp-verify', formdata, form, function (data)
            {
                // console.log(data);
                var final_data = $.parseJSON(data);

                //return false;
                if (final_data.status_code == 200) {
                    toastr.success(final_data.message.desc);
                    window.location.href = window.baseUrl + "/";
                } else {
                    toastr.error(final_data.message.desc);
                }

            })
            return false;
        }

    });


</script>

<script type="text/javascript">
    $(document).on("click", "#send_email", function (e) {
        $("#forgot_form").validate({
            rules: {
                email: {
                    required: true,
                    email: true
                },

            },
        });

        if ($("#forgot_form").valid()) {
            e.preventDefault();
            //var weburl = "<?php echo e(env('APP_URL')); ?>";
            var form = $(this).parents("form")
            var formdata = false;
            if (window.FormData)
            {
                formdata = new FormData(form[0]);
            }
            submit_form(window.baseUrl + '/resetpasswordemail', formdata, form, function (data)
            {
                // console.log(data);
                var final_data = $.parseJSON(data);
                console.log(final_data);
                if (final_data.status_code == 200) {
                    toastr.success(final_data.message.desc);
                    window.location.href = window.baseUrl + "/";
                } else {
                    toastr.error(final_data.message.desc);
                }

            })
            return false;
        }

    });

</script>
<?php $__env->stopSection(); ?>
<?php echo $__env->make('website.layouts.master', \Illuminate\Support\Arr::except(get_defined_vars(), ['__data', '__path']))->render(); ?><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/website/pages/home.blade.php ENDPATH**/ ?>