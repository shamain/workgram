<!DOCTYPE html>
<html>

    <!-- Mirrored from www.revox.io/webarch/HTML/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 May 2014 14:46:50 GMT -->
    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="<?php echo base_url(); ?>application_resources/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="<?php echo base_url(); ?>application_resources/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
        <!-- END CSS TEMPLATE -->

        <!-- CUSTOM CSS -->
        <link href="<?php echo base_url(); ?>application_resources/css/custom_css.css" rel="stylesheet" type="text/css"/>
        <!-- END CUSTOM CSS -->

        <title><?php echo $this->config->item('APPLICATION_MAIN_TITLE'); ?> - Login</title>
        
        <style>
            .input-group .form-control {
                position: static;
            }
        </style>


    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="error-body no-top">
        <div class="load-anim">
            <center>
                <i id="animate-icon" class="fa fa-spinner fa fa-3x fa-spin loader-icon-margin"></i>
            </center>

        </div>
        <div class="container">
            <div class="row login-container column-seperation">  
                <div class="col-md-5 col-md-offset-1">
                    <h2>Sign in to workgram</h2>
                    <p>Use Facebook, Twitter or your email to sign in.<br>
                        <a href="#">Sign up Now!</a> for a workgram account,It's free and always will be..</p>
                    <br>

                    <button class="btn btn-block btn-info col-md-8" type="button">
                        <span class="pull-left"><i class="icon-facebook"></i></span>
                        <span class="bold">Login with Facebook</span> </button>
                    <button class="btn btn-block btn-success col-md-8" type="button">
                        <span class="pull-left"><i class="icon-twitter"></i></span>
                        <span class="bold">Login with Twitter</span>
                    </button>
                </div>
                <div class="col-md-5 "> <br>
                    <form id="login_form" class="login-form"  method="post">
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label class="form-label">Username</label>
                                <div class="controls">
                                    <div class="input-group"> 
                                        <span class="input-group-addon primary">
                                            <span class="arrow"></span>
                                            <i class="fa fa-align-justify"></i>
                                        </span>
                                        <div class="input-with-icon right">
                                            <i class=""></i>
                                            <input type="text" name="txtusername" id="txtusername" class="form-control" onFocus="validkey(event)" onClick="validkey(event)" onKeyPress="validkey(event)" placeholder="User Name">                                 
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-md-10">
                                <label class="form-label">Password</label>
                                <span class="help"></span>
                                <div class="controls">
                                    <div class="input-group">  
                                        <span class="input-group-addon primary">
                                            <span class="arrow"></span>
                                            <i class="fa fa-unlock"></i>
                                        </span>
                                        <div class="input-with-icon right ">
                                            <i class=""></i>
                                            <input type="password" name="txtpassword" id="txtpassword" class="form-control" onFocus="validkey(event)" onClick="validkey(event)" onKeyPress="validkey(event)" placeholder="Password"> 
                                        </div>
                                    </div>

                                </div>
                            </div>



                        </div>
                        <div class="row">
                            <div class="control-group  col-md-10">
                                <div class="checkbox checkbox check-success"> <a href="#">Trouble login in?</a>&nbsp;&nbsp;
                                    <input type="checkbox" id="checkbox1" value="1">
                                    <label for="checkbox1">Keep me reminded </label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-10">

                                <button class="btn btn-primary btn-cons pull-right" type="button"id="login-submit" onclick="login()">Login</button>


                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>
        <!-- END CONTAINER -->
        <!-- BEGIN CORE JS FRAMEWORK-->

        <script type="text/javascript">

                                                var js_base_url = "<?php echo base_url(); ?>";
                                                var js_site_url = "<?php echo site_url(); ?>";

                                                //alert(js_url_path);
        </script>

        <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>application_resources/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>application_resources/plugins/pace/pace.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>application_resources/custom_js/login.js" type="text/javascript"></script>
        <!-- BEGIN CORE TEMPLATE JS -->
        <!-- END CORE TEMPLATE JS -->
    </body>

    <!-- Mirrored from www.revox.io/webarch/HTML/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 May 2014 14:46:51 GMT -->
</html>

