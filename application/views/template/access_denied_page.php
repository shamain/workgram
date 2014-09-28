<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />

    <!-- Viewport metatags -->
    <meta name="HandheldFriendly" content="true" />
    <meta name="MobileOptimized" content="320" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no" />

    <!-- iOS webapp metatags -->
    <meta name="apple-mobile-web-app-capable" content="yes" />
    <meta name="apple-mobile-web-app-status-bar-style" content="black" />

    <!-- CSS Reset -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/application_resources/css/reset.css" media="screen" />
    <!--  Fluid Grid System -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/application_resources/css/fluid.css" media="screen" />
    <!-- Theme Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/application_resources/css/dandelion.theme.css" media="screen" />
    <!--  Main Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/application_resources/css/dandelion.css" media="screen" />
    <!-- Demo Stylesheet -->
    <link rel="stylesheet" type="text/css" href="<?php echo base_url(); ?>/application_resources/css/demo.css" media="screen" />

    <!-- jQuery JavaScript File -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/application_resources/js/jquery-1.7.2.min.js"></script>

    <!-- Plugin Files -->

    <!-- Demo JavaScript Files -->

    <!-- Core JavaScript Files -->
    <script type="text/javascript" src="<?php echo base_url(); ?>/application_resources/js/core/dandelion.core.js"></script>

    <title>MIS LankaCom - Access Denied</title>

</head>

<body>

<!-- Main Wrapper. Set this to 'fixed' for fixed layout and 'fluid' for fluid layout' -->
<div id="da-wrapper" class="fluid">

    <!-- Content -->
    <div id="da-content">

        <!-- Container -->
        <div class="da-container clearfix">

            <div id="da-error-wrapper">

                <div id="da-error-pin"></div>
                <div id="da-error-code">
                    access <span>denied</span>
                </div>

                <h1 class="da-error-heading">Whoops, it seems you are lost</h1>
                <p><a href="#" class="back">CLICK HERE</a> To Go Back.</p>

                <script>
                    $(document).ready(function(){
                        $('a.back').click(function(){
                            parent.history.back();
                            return false;
                        });
                    });
                </script>
            </div>

        </div>

    </div>

    <!-- Footer -->
    <div id="da-footer">
        <div class="da-container clearfix">
            <p>Copyright 2013. Lankacom. All Rights Reserved.</p>
        </div>
    </div>

</div>

</body>

</html>