<!DOCTYPE html>
<html>


    <head>
        <meta http-equiv="content-type" content="text/html;charset=UTF-8" />
        <meta charset="utf-8" />

        <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />
        <meta content="" name="description" />
        <meta content="" name="author" />
        <link href="<?php echo base_url(); ?>application_resources/plugins/jquery-polymaps/style.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/jquery-metrojs/MetroJs.css" rel="stylesheet" type="text/css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application_resources/plugins/shape-hover/css/demo.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application_resources/plugins/shape-hover/css/component.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application_resources/plugins/owl-carousel/owl.carousel.css" />
        <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>application_resources/plugins/owl-carousel/owl.theme.css" />
        <link href="<?php echo base_url(); ?>application_resources/plugins/pace/pace-theme-flash.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/bootstrap-select2/select2.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/bootstrap-tag/bootstrap-tagsinput.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/dropzone/css/dropzone.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/bootstrap-datepicker/css/datepicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>application_resources/plugins/bootstrap-colorpicker/css/bootstrap-colorpicker.css" rel="stylesheet" type="text/css" />
        <link href="<?php echo base_url(); ?>application_resources/plugins/ios-switch/ios7-switch.css" rel="stylesheet" type="text/css" media="screen">
        <link href="<?php echo base_url(); ?>application_resources/plugins/jquery-slider/css/jquery.sidr.light.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/fullcalendar/fullcalendar.css" rel="stylesheet" type="text/css" media="screen"/>
        <link rel="stylesheet" href="<?php echo base_url(); ?>application_resources/plugins/jquery-ricksaw-chart/css/rickshaw.css" type="text/css" media="screen" >
        <link rel="stylesheet" href="<?php echo base_url(); ?>application_resources/plugins/jquery-morris-chart/css/morris.css" type="text/css" media="screen">
        <link href="<?php echo base_url(); ?>application_resources/plugins/jquery-isotope/isotope.css" rel="stylesheet" type="text/css"/>

        
        <link href="<?php echo base_url(); ?>application_resources/plugins/jquery-datatable/css/jquery.dataTables.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/boostrap-checkbox/css/bootstrap-checkbox.css" rel="stylesheet" type="text/css" media="screen"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/datatables-responsive/css/datatables.responsive.css" rel="stylesheet" type="text/css" media="screen"/>

        <!-- BEGIN CORE CSS FRAMEWORK -->
        <link href="<?php echo base_url(); ?>application_resources/plugins/boostrapv3/css/bootstrap.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/boostrapv3/css/bootstrap-theme.min.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/plugins/font-awesome/css/font-awesome.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/css/animate.min.css" rel="stylesheet" type="text/css"/>
        <!-- END CORE CSS FRAMEWORK -->
        <!-- BEGIN CSS TEMPLATE -->
        <link href="<?php echo base_url(); ?>application_resources/css/style.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/css/responsive.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/css/custom-icon-set.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/css/magic_space.css" rel="stylesheet" type="text/css"/>
        <link href="<?php echo base_url(); ?>application_resources/css/tiles_responsive.css" rel="stylesheet" type="text/css"/>
        <!-- END CSS TEMPLATE -->

        <link href="<?php echo base_url(); ?>application_resources/plugins/boostrap-slider/css/slider.css" rel="stylesheet" type="text/css"/>

        <!-- JS -->
        <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
        <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>

        <script src="http://js.pusher.com/1.12/pusher.min.js"></script>
        <script src="<?php echo base_url(); ?>application_resources/custom_js/PusherChatWidget.js"></script> 
        <link href="<?php echo base_url(); ?>application_resources/css/pusher-chat-widget.css" rel="stylesheet" type="text/css"/>
        <script>
            setPath("<?php echo base_url(); ?>", "<?php echo site_url(); ?>");
            setName("<?php echo ucfirst($this->session->userdata('EMPLOYEE_FNAME')); ?>");
            setEmail("<?php echo ucfirst($this->session->userdata('EMPLOYEE_EMAIL')); ?>");

        </script>

        <!-- JS -->

        <!-- favicon icon -->
        <link rel="icon" type="image/ico" href="<?php echo base_url(); ?>application_resources/img/favicon.ico" />

        <title><?php
            echo $this->config->item('APPLICATION_MAIN_TITLE');
            if (!empty($title)) {
                echo ' - ' . $title;
            }
            ?>
        </title>



    </head>
    <!-- END HEAD -->
    <!-- BEGIN BODY -->
    <body class="">
        <!-- BEGIN HEADER -->
        <div class="header navbar navbar-inverse ">
            <!-- BEGIN TOP NAVIGATION BAR -->
            <div class="navbar-inner">
                <div class="header-seperation">
                    <ul class="nav pull-left notifcation-center" id="main-menu-toggle-wrapper" style="display:none">
                        <li class="dropdown"> <a id="main-menu-toggle" href="#main-menu"  class="" >
                                <div class="iconset top-menu-toggle-white"></div>
                            </a> </li>
                    </ul>
                    <!-- BEGIN LOGO -->
                    <a href="index-2.html"><img src="<?php echo base_url(); ?>application_resources/img/logo.png" class="logo" alt=""  data-src="<?php echo base_url(); ?>application_resources/img/logo.png" data-src-retina="<?php echo base_url(); ?>application_resources/img/logo2x.png" width="125" height="30"/></a>
                    <!-- END LOGO -->
                    <ul class="nav pull-right notifcation-center">
                        <li class="dropdown" id="header_task_bar"> <a href="<?php echo site_url(); ?>/dashboard/dashboard_controller/" class="dropdown-toggle active" data-toggle="">
                                <div class="iconset top-home"></div>
                            </a> </li>
                        <li class="dropdown" id="header_inbox_bar" > <a href="email.html" class="dropdown-toggle" >
                                <div class="iconset top-messages"></div>
                                <span class="badge" id="msgs-badge">2</span> </a></li>
                        <li class="dropdown" id="portrait-chat-toggler" style="display:none"> <a href="#sidr" class="chat-menu-toggle">
                                <div class="iconset top-chat-white "></div>
                            </a> </li>
                    </ul>
                </div>
                <!-- END RESPONSIVE MENU TOGGLER -->
                <div class="header-quick-nav" >
                    <!-- BEGIN TOP NAVIGATION MENU -->
                    <div class="pull-left">
                        <ul class="nav quick-section">
                            <li class="quicklinks"> <a href="#" class="" id="layout-condensed-toggle" >
                                    <div class="iconset top-menu-toggle-dark"></div>
                                </a> </li>
                        </ul>
                        <ul class="nav quick-section">
                            <li class="quicklinks"> <a href="#" class="" >
                                    <div class="iconset top-reload"></div>
                                </a> </li>
                            <li class="quicklinks"> <span class="h-seperate"></span></li>
                            <li class="quicklinks"> <a href="#" class="" >
                                    <div class="iconset top-tiles"></div>
                                </a> </li>
                            <li class="m-r-10 input-prepend inside search-form no-boarder"> <span class="add-on"> <span class="iconset top-search"></span></span>
                                <input name="" type="text"  class="no-boarder " placeholder="Search Dashboard" style="width:250px;">
                            </li>
                        </ul>
                    </div>

                    <!-- END TOP NAVIGATION MENU -->
                    <!-- BEGIN CHAT TOGGLER -->
                    <div class="pull-right">
                        <div class="chat-toggler"> <a href="#" class="dropdown-toggle" id="my-task-list" data-placement="bottom"  data-content='' data-toggle="dropdown" data-original-title="Notifications">
                                <div class="user-details">
                                    <div class="username" id="user-name"> <span id="notification-count" class="badge badge-important"></span> <?php echo ucfirst($this->session->userdata('EMPLOYEE_FNAME')); ?> <span class="bold"><?php echo ucfirst($this->session->userdata('EMPLOYEE_LNAME')); ?></span> </div>
                                </div>
                                <div class="iconset top-down-arrow"></div>
                            </a>
                            <div id="notification-list" style="display:none">
                                <div style="width:300px">
                                    <div class="notification-messages info">
                                        <div class="user-profile"> <img src="<?php echo base_url(); ?>application_resources/img/profiles/d.jpg"  alt="" data-src="<?php echo base_url(); ?>application_resources/img/profiles/d.jpg" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/d2x.jpg" width="35" height="35"> </div>
                                        <div class="message-wrapper">
                                            <div class="heading"> David Nester - Commented on your wall </div>
                                            <div class="description"> Meeting postponed to tomorrow </div>
                                            <div class="date pull-left"> A min ago </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="notification-messages danger">
                                        <div class="iconholder"> <i class="icon-warning-sign"></i> </div>
                                        <div class="message-wrapper">
                                            <div class="heading"> Server load limited </div>
                                            <div class="description"> Database server has reached its daily capicity </div>
                                            <div class="date pull-left"> 2 mins ago </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="notification-messages success">
                                        <div class="user-profile"> <img src="<?php echo base_url(); ?>application_resources/img/profiles/h.jpg"  alt="" data-src="<?php echo base_url(); ?>application_resources/img/profiles/h.jpg" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/h2x.jpg" width="35" height="35"> </div>
                                        <div class="message-wrapper">
                                            <div class="heading"> You haveve got 150 messages </div>
                                            <div class="description"> 150 newly unread messages in your inbox </div>
                                            <div class="date pull-left"> An hour ago </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                </div>
                            </div>
                            <div class="profile-pic">
                                <a href="<?php echo site_url(); ?>/employee/employee_profile_controller/view_profile">
                                    <?php if ($this->session->userdata('EMPLOYEE_PROPIC') == '') { ?>

                                        <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small2x.jpg" width="35" height="35" />

                                    <?php } else { ?>
                                        <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" width="35" height="35" />

                                    <?php } ?> 
                                </a>
                            </div>
                        </div>
                        <ul class="nav quick-section ">
                            <li class="quicklinks"> <a data-toggle="dropdown" class="dropdown-toggle  pull-right " href="#" id="user-options">
                                    <div class="iconset top-settings-dark "></div>
                                </a>
                                <ul class="dropdown-menu  pull-right" role="menu" aria-labelledby="user-options">
                                    <li><a href="<?php echo site_url(); ?>/employee/employee_profile_controller/view_profile"> My Profile</a> </li>
                                    <li><a href="calender.html">My Calendar</a> </li>
                                    <li><a href="email.html"> My Inbox&nbsp;&nbsp;<span class="badge badge-important animated bounceIn">2</span></a> </li>
                                    <li class="divider"></li>
                                    <li><a  href="<?php echo site_url(); ?>/login/login_controller/logout"><i class="fa fa-power-off"></i>&nbsp;&nbsp;Log Out</a></li>
                                </ul>
                            </li>
                            <li class="quicklinks"> <span class="h-seperate"></span></li>
                            <li class="quicklinks"> <a id="chat-menu-toggle" href="#sidr" class="chat-menu-toggle" >
                                    <div class="iconset top-chat-dark "><span class="badge badge-important hide" id="chat-message-count">1</span></div>
                                </a>
                                <div class="simple-chat-popup chat-menu-toggle hide" >
                                    <div class="simple-chat-popup-arrow"></div>
                                    <div class="simple-chat-popup-inner">
                                        <div style="width:100px">
                                            <div class="semi-bold">David Nester</div>
                                            <div class="message">Hey you there </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                        </ul>
                    </div>
                    <!-- END CHAT TOGGLER -->
                </div>
                <!-- END TOP NAVIGATION MENU -->
            </div>
            <!-- END TOP NAVIGATION BAR -->
        </div>
        <!-- END HEADER -->
        <!-- BEGIN CONTAINER -->
        <div class="page-container row-fluid">
            <!-- BEGIN SIDEBAR -->
            <div class="page-sidebar" id="main-menu">
                <!-- BEGIN MINI-PROFILE -->
                <div class="page-sidebar-wrapper" id="main-menu-wrapper">
                    <div class="user-info-wrapper">
                        <div class="profile-wrapper"> 
                            <a href="<?php echo site_url(); ?>/employee/employee_profile_controller/view_profile">
<!--                            <img src="<?php echo base_url(); ?>application_resources/img/profiles/avatar.jpg"  alt="" data-src="<?php echo base_url(); ?>application_resources/img/profiles/avatar.jpg" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/avatar2x.jpg" width="69" height="69" />
                                -->
                                <?php if ($this->session->userdata('EMPLOYEE_PROPIC') == '') { ?>

                                    <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar2x.jpg" width="69" height="69" />

                                <?php } else { ?>
                                    <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" width="69" height="69" />

                                <?php } ?> 

                            </a>
                        </div>
                        <div class="user-info">
                            <div class="greeting">Welcome</div>
                            <div class="username"><?php echo ucfirst($this->session->userdata('EMPLOYEE_FNAME')); ?> <span class="semi-bold"><?php echo ucfirst($this->session->userdata('EMPLOYEE_LNAME')); ?></span></div>
                            <div class="status">Status
                                <?php if ($this->session->userdata('EMPLOYEE_ONLINE') == 'Y') { ?>
                                    <a href="#">
                                        <div class="status-icon green"></div>
                                        Online
                                    </a>
                                <?php } else { ?>
                                    <a href="#">
                                        <div class="status-icon red"></div>
                                        Offline
                                    </a>
                                <?php } ?>
                            </div>
                        </div>
                    </div>
                    <!-- END MINI-PROFILE -->
                    <!-- BEGIN SIDEBAR MENU -->
                    <p class="menu-title">BROWSE <span class="pull-right"><a href="javascript:;"><i class="fa fa-refresh"></i></a></span></p>
                    <ul>
                        <?php echo $this->load->view('template/menu'); ?>
                    </ul>
                    <div class="side-bar-widgets">
                        <p class="menu-title">FOLDER <span class="pull-right"><a href="#" class="create-folder"> <i class="fa fa-plus"></i></a></span></p>
                        <ul class="folders" >
                            <li><a href="#">
                                    <div class="status-icon green"></div>
                                    My quick tasks </a> </li>
                            <li><a href="#">
                                    <div class="status-icon red"></div>
                                    To do list </a> </li>
                            <li><a href="#">
                                    <div class="status-icon blue"></div>
                                    Projects </a> </li>
                            <li class="folder-input" style="display:none">
                                <input type="text" placeholder="Name of folder" class="no-boarder folder-name" name="" >
                            </li>
                        </ul>
                        <p class="menu-title">PROJECTS </p>
                        <div class="status-widget">
                            <div class="status-widget-wrapper">
                                <div class="title">Test Project 1<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                                <p>Design visual is done</p>
                            </div>
                        </div>
                        <div class="status-widget">
                            <div class="status-widget-wrapper">
                                <div class="title">Test Project 2<a href="#" class="remove-widget"><i class="icon-custom-cross"></i></a></div>
                                <p>Gathering requirements</p>
                            </div>
                        </div>
                    </div>
                    <div class="clearfix"></div>
                    <!-- END SIDEBAR MENU -->
                </div>
            </div>
            <a href="#" class="scrollup">Scroll</a>
            <div class="footer-widget">
                <div class="progress transparent progress-small no-radius no-margin">
                    <div data-percentage="79%" class="progress-bar progress-bar-success animate-progress-bar" ></div>
                </div>
                <div class="pull-right">
                    <div class="details-status"> <span data-animation-duration="560" data-value="86" class="animate-number"></span>% </div>
                    <a href="lockscreen.html"><i class="fa fa-power-off"></i></a></div>
            </div>
            <!-- END SIDEBAR -->
            <!-- BEGIN PAGE CONTAINER-->
            <div class="page-content">
                <!-- BEGIN SAMPLE PORTLET CONFIGURATION MODAL FORM-->
                <div id="portlet-config" class="modal hide">
                    <div class="modal-header">
                        <button data-dismiss="modal" class="close" type="button"></button>
                        <h3>Widget Settings</h3>
                    </div>
                    <div class="modal-body"> Widget settings form goes here </div>
                </div>
                <div class="clearfix"></div>
                <div class="content">
                    <?php echo $content; ?>
                </div>

            </div>

            <!-- Notification View Details -->
            <div id="notification_view_details"></div>

            <!-- END CONTAINER -->
            <!-- BEGIN CHAT -->
            <div id="sidr" class="chat-window-wrapper">
                <div id="main-chat-wrapper" >
                    <?php echo $this->load->view('template/chat'); ?>
                </div>
            </div>
            <!-- END CHAT -->
            <!-- END CONTAINER -->
            <!-- BEGIN CORE JS FRAMEWORK-->

            <!--[if lt IE 9]>
            <script src="<?php echo base_url(); ?>application_resources/plugins/respond.js"></script>
            <![endif]-->

            <script type="text/javascript">

                var js_base_url = "<?php echo base_url(); ?>";
                var js_site_url = "<?php echo site_url(); ?>";

                //alert(js_url_path);
            </script>

            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-ui/jquery-ui-1.10.1.custom.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/bootstrap/js/bootstrap.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/breakpoints.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-unveil/jquery.unveil.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-block-ui/jqueryblockui.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-lazyload/jquery.lazyload.min.js" type="text/javascript"></script>
            <!-- END CORE JS FRAMEWORK -->
            <!-- BEGIN PAGE LEVEL JS -->
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-slider/jquery.sidr.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/webarchScroll.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/pace/pace.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/bootstrap-datepicker/js/bootstrap-datepicker.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/bootstrap-select2/select2.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/bootstrap-colorpicker/js/bootstrap-colorpicker.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-validation/js/jquery.validate.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-numberAnimate/jquery.animateNumbers.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-slimscroll/jquery.slimscroll.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-mixitup/jquery.mixitup.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/modernizr.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/boostrap-slider/js/bootstrap-slider.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-superbox/js/superbox.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-ricksaw-chart/js/raphael-min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-ricksaw-chart/js/d3.v2.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-ricksaw-chart/js/rickshaw.min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-sparkline/jquery-sparkline.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.animator.min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.resize.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.orderBars.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-sparkline/jquery-sparkline.js"></script>
            <!--<script src="<?php echo base_url(); ?>application_resources/plugins/jquery-morris-chart/js/morris.min.js"></script>-->
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-easy-pie-chart/js/jquery.easypiechart.min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-metrojs/MetroJs.min.js" type="text/javascript" ></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/skycons/skycons.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/owl-carousel/owl.carousel.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-polymaps/polymaps.min.js" type="text/javascript"></script>


            
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-datatable/js/jquery.dataTables.min.js" type="text/javascript" ></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-datatable/extra/js/TableTools.min.js" type="text/javascript" ></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>application_resources/plugins/datatables-responsive/js/datatables.responsive.js"></script>
            <script type="text/javascript" src="<?php echo base_url(); ?>application_resources/plugins/datatables-responsive/js/lodash.min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/ios-switch/ios7-switch.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/bootstrap-wysihtml5/wysihtml5-0.3.0.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/bootstrap-wysihtml5/bootstrap-wysihtml5.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/bootstrap-tag/bootstrap-tagsinput.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/plugins/dropzone/dropzone.min.js" type="text/javascript"></script>
            <!-- END PAGE LEVEL PLUGINS -->
            <script src="<?php echo base_url(); ?>application_resources/js/datatables.js" type="text/javascript"></script>



            <!-- BEGIN CUSTOM JS -->
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_privilege.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_project.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_statistics.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_dahami.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_employee_profile.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_kaumadi.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_company.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_tasks.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_skill.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_notification.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_wages.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_event.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/custom_js/custom_employee_attendance.js" type="text/javascript"></script>
            <!-- END CUSTOM JS -->


            <!-- BEGIN CORE TEMPLATE JS -->
 <script src="<?php echo base_url(); ?>application_resources/js/moment.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/js/fullcalendar.min.js" type="text/javascript"></script>

            <!-- END PAGE LEVEL PLUGINS -->
            <!-- BEGIN CORE TEMPLATE JS -->
            <script src="<?php echo base_url(); ?>application_resources/js/core.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/js/chat.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/js/demo.js" type="text/javascript"></script>




            <script src="<?php echo base_url(); ?>application_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>

<!--            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery-ui-1.8.20.custom.min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/vendor/jquery.ui.widget.js"></script>-->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/tmpl.min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/load-image.min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/canvas-to-blob.min.js"></script>
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.blueimp-gallery.min.js"></script>
            <!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.iframe-transport.js"></script>
            <!-- The basic File Upload plugin -->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload.js"></script>
            <!-- The File Upload processing plugin -->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-process.js"></script>
            <!-- The File Upload image preview & resize plugin -->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-image.js"></script>
            <!-- The File Upload audio preview plugin -->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-audio.js"></script>
            <!-- The File Upload video preview plugin -->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-video.js"></script>
            <!-- The File Upload validation plugin -->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-validate.js"></script>
            <!-- The File Upload user interface plugin -->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-ui.js"></script>
            <!-- The main application script -->
            <script src="<?php echo base_url(); ?>application_resources/jupload/js/main.js"></script>

            <!-- jQuery UI styles -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>application_resources/jupload/css/jquery-ui-1.8.21.custom.css" id="theme" />
            <!-- jQuery Image Gallery styles -->

            <!-- CSS to style the file input field as button and adjust the jQuery UI progress bars -->
            <link rel="stylesheet" href="<?php echo base_url(); ?>application_resources/jupload/css/jquery.fileupload-ui.css" />

            <script type="text/javascript">
                $(document).ready(function() {
                    $(".live-tile,.flip-list").liveTile();
                    $(".select2").select2();
                });
            </script>

            <!-- END CORE TEMPLATE JS -->
    </body>

</html>
