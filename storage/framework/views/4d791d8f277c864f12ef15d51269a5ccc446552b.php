<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="<?php echo e(str_replace('_', '-', app()->getLocale())); ?>">
    <!--<![endif]-->
    <!-- BEGIN HEAD -->

    <head>
        <meta charset="utf-8" />
        <meta name="csrf-token" content="<?php echo e(csrf_token()); ?>">
        <title><?php echo e(config('app.name', 'KRC Events')); ?></title>
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta content="width=device-width, initial-scale=1" name="viewport" />
        <meta content="Preview page of Metronic Admin Theme #1 for " name="description" />
        <meta content="" name="author" />
        <!-- BEGIN GLOBAL MANDATORY STYLES -->
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/admin/custom/css/progress.css')); ?>">
        <link rel="stylesheet" type="text/css" href="<?php echo e(url('assets/admin/custom/css/toastr.min.css')); ?>">

        <link href="http://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(url('assets/admin/assets/global/plugins/font-awesome/css/font-awesome.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(url('assets/admin/assets/global/plugins/simple-line-icons/simple-line-icons.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap/css/bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-switch/css/bootstrap-switch.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END GLOBAL MANDATORY STYLES -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <link href="<?php echo e(url('assets/admin/assets/global/plugins/select2/css/select2.min.css')); ?>" rel="stylesheet" type="text/css" />
        <link href="<?php echo e(url('assets/admin/assets/global/plugins/select2/css/select2-bootstrap.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL STYLES -->
        <link href="<?php echo e(url('assets/admin/assets/global/css/components.min.css')); ?>" rel="stylesheet" id="style_components" type="text/css" />
        <link href="<?php echo e(url('assets/admin/assets/global/css/plugins.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END THEME GLOBAL STYLES -->
        <!-- BEGIN PAGE LEVEL STYLES -->
        <link href="<?php echo e(url('assets/admin/assets/pages/css/login-5.min.css')); ?>" rel="stylesheet" type="text/css" />
        <!-- END PAGE LEVEL STYLES -->
        <!-- BEGIN THEME LAYOUT STYLES -->
        <!-- END THEME LAYOUT STYLES -->
        <link rel="shortcut icon" href="favicon.ico" /> </head>
    <!-- END HEAD -->

    <body class=" login">
        <!-- BEGIN : LOGIN PAGE 5-2 -->
        <div class="user-login-5">
            <div class="row bs-reset">
                <div class="col-md-6 login-container bs-reset">
                    <img class="login-logo login-6" src="<?php echo e(url('assets/admin/assets/pages/img/login/login-invert.png')); ?>" />
                    <div class="login-content">
                        <h1>KRC Admin Login</h1>
                        <p></p>
                        <form id="login_form" class="login-form" method="post" enctype="multipart/form-data" onsubmit="return false;" >
                             <?php echo e(csrf_field()); ?>

                            <div class="alert alert-danger display-hide">
                                <button class="close" data-close="alert"></button>
                                <span>Enter any Email and password. </span>
                            </div>
                            <div class="row">
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="text" autocomplete="off" placeholder="Email Address" name="email" required id="username" /> </div>
                                <div class="col-xs-6">
                                    <input class="form-control form-control-solid placeholder-no-fix form-group" type="password" autocomplete="off" placeholder="Password" name="password" required id="password" /> </div>
                            </div>
                            <div class="row">
                                <div class="col-sm-4">
                                    <label class="rememberme mt-checkbox mt-checkbox-outline">
                                        <input type="checkbox" name="remember" value="1" /> Remember me
                                        <span></span>
                                    </label>
                                </div>
                                <div class="col-sm-8 text-right">
                                    <!-- <div class="forgot-password">
                                        <a href="javascript:;" id="forget-password" class="forget-password">Forgot Password?</a>
                                    </div> -->
                                    <button class="btn blue" type="submit" id="form_submit_btn">Sign In</button>
                                </div>
                            </div>
                        </form>
                        <!-- BEGIN FORGOT PASSWORD FORM -->
                        <form class="forget-form" action="javascript:;" method="post">
                            <h3>Forgot Password ?</h3>
                            <p> Enter your e-mail address below to reset your password. </p>
                            <div class="form-group">
                                <input class="form-control placeholder-no-fix" type="text" autocomplete="off" placeholder="Email" name="email" /> </div>
                            <div class="form-actions">
                                <button type="button" id="back-btn" class="btn blue btn-outline">Back</button>
                                <button type="submit" class="btn blue uppercase pull-right">Submit</button>
                            </div>
                        </form>
                        <!-- END FORGOT PASSWORD FORM -->
                    </div>
                    <div class="login-footer">
                        <div class="row bs-reset">
                            <div class="col-xs-5 bs-reset">
                                <ul class="login-social">
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-facebook"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-twitter"></i>
                                        </a>
                                    </li>
                                    <li>
                                        <a href="javascript:;">
                                            <i class="icon-social-dribbble"></i>
                                        </a>
                                    </li>
                                </ul>
                            </div>
                            <div class="col-xs-7 bs-reset">
                                <div class="login-copyright text-right">
                                    <p>Copyright &copy; KRC Team 2020</p>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-md-6 bs-reset">
                    <div class="login-bg"> </div>
                </div>
            </div>
        </div>
        <!-- END : LOGIN PAGE 5-2 -->
        <!--[if lt IE 9]>
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/respond.min.js')); ?>"></script>
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/excanvas.min.js')); ?>"></script> 
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/ie8.fix.min.js')); ?>"></script> 
        <![endif]-->
        <!-- BEGIN CORE PLUGINS -->
        <script type="text/javascript">window.baseUrl = "<?php echo URL::to('/') ?>";</script>
        <script src="<?php echo e(url('assets/admin/custom/js/jquery-1.11.1.min.js')); ?>"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/jquery.validate.min.js"></script>
        <script src="https://cdn.jsdelivr.net/jquery.validation/1.16.0/additional-methods.min.js"></script>
        <script src="<?php echo e(url('assets/admin/custom/js/progress.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/admin/custom/js/toastr.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/admin/custom/js/laravel.js')); ?>" type="text/javascript"></script>
        <!-- <script src="<?php echo e(url('assets/admin/assets/global/plugins/jquery.min.js')); ?>" type="text/javascript"></script> -->
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap/js/bootstrap.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/js.cookie.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/jquery-slimscroll/jquery.slimscroll.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/jquery.blockui.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/bootstrap-switch/js/bootstrap-switch.min.js')); ?>" type="text/javascript"></script>
        <!-- END CORE PLUGINS -->
        <!-- BEGIN PAGE LEVEL PLUGINS -->
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/jquery-validation/js/jquery.validate.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/jquery-validation/js/additional-methods.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/select2/js/select2.full.min.js')); ?>" type="text/javascript"></script>
        <script src="<?php echo e(url('assets/admin/assets/global/plugins/backstretch/jquery.backstretch.min.js')); ?>" type="text/javascript"></script>
        <!-- END PAGE LEVEL PLUGINS -->
        <!-- BEGIN THEME GLOBAL SCRIPTS -->
        <script src="<?php echo e(url('assets/admin/assets/global/scripts/app.min.js')); ?>" type="text/javascript"></script>
        <!-- END THEME GLOBAL SCRIPTS -->
        <!-- BEGIN PAGE LEVEL SCRIPTS -->
        <!-- END PAGE LEVEL SCRIPTS -->
        <!-- BEGIN THEME LAYOUT SCRIPTS -->
        <!-- END THEME LAYOUT SCRIPTS -->

        <script type="text/javascript">
             $(document).on("click", "#form_submit_btn", function (e) {
                $("#login_form").validate({
                    rules: {
                        email: {
                            required: true,
                            email: true
                        },
                        password:{
                          required: true,
                        },
                      
                    },
                });

                if($("#login_form").valid()){
                    e.preventDefault();
                    //var weburl = "<?php echo e(env('APP_URL')); ?>";
                    var form = $(this).parents("form")
                    var formdata = false;
                    if(window.FormData)
                    {
                        formdata = new FormData(form[0]);
                    }
                    submit_form(window.baseUrl+'/admin/app-login',formdata,form,function(data) 
                    {   
                        // console.log(data);
                        var final_data =$.parseJSON(data);
                        console.log(final_data);
                        if (final_data.status_code == 200) {
                            toastr.success(final_data.message.desc);
                            window.location.href = window.baseUrl+"/admin/dashboard";
                        }else{
                            toastr.error(final_data.message.desc);
                        }
                        
                    })
                    return false;
                    }

            });

        </script>
        
        <script src="<?php echo e(url('assets/admin/assets/pages/scripts/login-5.js')); ?>" type="text/javascript"></script>
    </body>

</html><?php /**PATH C:\xampp\htdocs\KRC_Event\resources\views/webadmin/login/login.blade.php ENDPATH**/ ?>