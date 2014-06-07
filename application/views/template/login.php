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
                                <button class="btn btn-primary btn-cons pull-right" type="button"id="login-submit" data-toggle="modal" data-target="#comapnymodal">Sign In</button>


                            </div>
                        </div>
                    </form>
                </div>


            </div>
        </div>

        <div aria-hidden="true" aria-labelledby="company-modal-label" role="dialog" tabindex="-1" id="comapnymodal" class="modal fade">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <button aria-hidden="true" data-dismiss="modal" class="close" type="button">×</button>
                        <br>
                        <i class="fa fa-credit-card fa-7x"></i>
                        <h4 class="semi-bold" id="company-modal-label">We need your billing info.</h4>
                        <p class="no-margin">You'll be charged $29/Month and get immediate access to new plan </p>
                        <br>
                    </div>
                    <div class="modal-body">
                        <div class="row form-row">
                            <form id="commentForm">
                  <div id="rootwizard" class="col-md-12">
                    <div class="form-wizard-steps">
                      <ul class="wizard-steps form-wizard">
                        <li class="active" data-target="#step1"> <a href="#tab1" data-toggle="tab"> <span class="step">1</span> <span class="title">Basic information</span> </a> </li>
                        <li data-target="#step2" class=""> <a href="#tab2" data-toggle="tab"> <span class="step">2</span> <span class="title">Account information</span> </a> </li>
                        <li data-target="#step3" class=""> <a href="#tab3" data-toggle="tab"> <span class="step">3</span> <span class="title">User settings</span> </a> </li>
                        <li data-target="#step4" class=""> <a href="#tab4" data-toggle="tab"> <span class="step">4</span> <span class="title">Feedback <br>
                          </span> </a> </li>
                      </ul>
                      <div class="clearfix"></div>
                    </div>
                    <div class="tab-content transparent">
                      <div class="tab-pane active" id="tab1"> <br>Company Information</span></h4>
                        <br>
                        <div class="row form-row">
                          <div class="col-md-12">
                            <input type="text" placeholder="Company Name" class="form-control no-boarder " name="txtCompanyName" id="txtCompanyName">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-12">
                            <input type="text" placeholder="First Name" class="form-control no-boarder " name="txtFirstName" id="txtFirstName">
                          </div>
                          <div class="col-md-12">
                            <input type="text" placeholder="Last Name" class="form-control no-boarder " name="txtLastName" id="txtLastName">
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab2"> <br>
                        <h4 class="semi-bold">Step 2 - <span class="light">Account Information</span></h4>
                        <br>
                        <div class="row form-row">
                          <div class="col-md-8">
                            <input type="text" placeholder="Country" class="form-control no-boarder " name="txtCountry" id="txtCountry">
                          </div>
                          <div class="col-md-4">
                            <input type="text" placeholder="Postal Code" class="form-control no-boarder " name="txtPostalCode" id="txtPostalCode">
                          </div>
                        </div>
                        <div class="row form-row">
                          <div class="col-md-4">
                            <input type="text" placeholder="+94" class="form-control no-boarder " name="txtPhoneCode" id="txtPhoneCode">
                          </div>
                          <div class="col-md-8">
                            <input type="text" placeholder="Phone Number" class="form-control no-boarder " name="txtPhoneNumber" id="txtPhoneNumber">
                          </div>
                        </div>
                      </div>
                      <div class="tab-pane" id="tab3"> <br>
                        <h4 class="semi-bold">Step 3 - <span class="light">User Settings</span></h4>
                        <br>
                      </div>
                      <div class="tab-pane" id="tab4"> <br>
                        <h4 class="semi-bold">Step 4 - <span class="light">Feedback</span></h4>
                        <br>
                      </div>
                      <ul class=" wizard wizard-actions">
                        <li class="previous first" style="display:none;"><a href="javascript:;" class="btn">&nbsp;&nbsp;First&nbsp;&nbsp;</a></li>
                        <li class="previous"><a href="javascript:;" class="btn">&nbsp;&nbsp;Previous&nbsp;&nbsp;</a></li>
                        <li class="next last" style="display:none;"><a href="javascript:;" class="btn btn-primary">&nbsp;&nbsp;Last&nbsp;&nbsp;</a></li>
                        <li class="next"><a href="javascript:;" class="btn btn-primary">&nbsp;&nbsp;Next&nbsp;&nbsp;</a></li>
                      </ul>
                    </div>
                  </div>
                </form>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button data-dismiss="modal" class="btn btn-default" type="button">Close</button>
                        <button class="btn btn-primary" type="button">Save changes</button>
                    </div>
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
        <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_login.js" type="text/javascript"></script>
        <!-- BEGIN CORE TEMPLATE JS -->
        <!-- END CORE TEMPLATE JS -->
    </body>

    <!-- Mirrored from www.revox.io/webarch/HTML/login.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 21 May 2014 14:46:51 GMT -->
</html>

