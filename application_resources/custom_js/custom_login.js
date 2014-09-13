

var base_url = js_base_url;
var site_url = js_site_url;

$(document).ready(function() {
    $('#login_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            txtusername: {
                minlength: 6,
                required: true
            },
            txtpassword: {
                required: true,
            }
        },
        invalidHandler: function(event, validator) {
            //display error alert on form submit
        },
        errorPlacement: function(label, element) { // render error placement for each input type
            $('<span class="error"></span>').insertAfter($(element).parent().parent()).append(label)
            var parent = $(element).parent('.input-with-icon');
            var icon = $(element).parent('.input-with-icon').children('i');
            icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
            parent.removeClass('success-control').addClass('error-control');
        },
        highlight: function(element) { // hightlight error inputs
            var parent = $(element).parent();
            var icon = $(element).parent().children('i');
            icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
            parent.removeClass('success-control').addClass('error-control');

        },
        unhighlight: function(element) { // revert the change done by hightlight

        },
        success: function(label, element) {
            var parent = $(element).parent('.input-with-icon');
            var icon = $(element).parent('.input-with-icon').children('i');
            icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
            parent.removeClass('error-control').addClass('success-control');
        }
    });
    //Form Wizard Validations
    var $validator = $("#commentForm").validate({
        rules: {
            txtCompanyName: {
                required: true,
                minlength: 3
            },
            txtCompanyEmail: {
                required: true,
                email: true,
                minlength: 3
            },
            txtCompanyDesc: {
                required: true,
                minlength: 3
            },
            txtCompanyContact: {
                required: true,
                minlength: 3
            },
            txtCompanyAddress: {
                required: true,
                minlength: 3
            },
            txtFirstName: {
                required: true,
                minlength: 3
            },
            txtLastName: {
                required: true,
                minlength: 3
            },
            txtPassword: {
                required: true,
                minlength: 3
            },
            txtConfirmPassword: {
                minlength: 3,
                equalTo: "#txtPassword"
            },
            txtEmail: {
                required: true,
                email: true,
                minlength: 3

            },
            txtContact: {
                required: true,
                minlength: 3

            }

        },
        errorPlacement: function(label, element) {
            $('<span class="arrow"></span>').insertBefore(element);
            $('<span class="error"></span>').insertAfter(element).append(label)
        }
    });



    $('#rootwizard').bootstrapWizard({
        'tabClass': 'form-wizard',
        'onNext': function(tab, navigation, index) {

            var $valid = $("#commentForm").valid();
            if (!$valid) {
                $validator.focusInvalid();
                return false;
            }
            else {
                if (index == 2) {
                    $('.next').hide();
                    $('.last').show();
                }

                $('#rootwizard').find('.form-wizard').children('li').eq(index - 1).addClass('complete');
                $('#rootwizard').find('.form-wizard').children('li').eq(index - 1).find('.step').html('<i class="fa fa-check"></i>');
            }
        },
        'onLast': function(tab) {

            $.post(site_url + '/company/company_controller/company_registration', $('#commentForm').serialize(), function(msg)
            {
                if (msg == 1) {

                    /* $("#add_privilege_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Privilege</a>has been added.</div>');
                     add_privilege_form.reset();
                     location.reload();*/

                    $("#commentForm").find('input[type=text], textarea').val('');

                    $('#comapnymodal').modal('toggle');
                    $('#tab1').addClass('active');
                    $('#tab3').removeClass('active');
                } else {
                    $("#add_privilege_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Privilege</a>has failed.</div>');
                }
            });


        },
        'onPrevious': function(tab, navigation, index) {

            $('.last').hide();
            $('#nextbtn').show();


        }
    });


//sign in wizard
    $('#signin_wizard').bootstrapWizard({
        'tabClass': 'form-wizard',
        'onNext': function(tab, navigation, index) {
            var $valid = $("#sign_in_form").valid();
            if (!$valid) {
                $validator.focusInvalid();
                return false;
            }
            else {
                $('#signin_wizard').find('.form-wizard').children('li').eq(index - 1).addClass('complete');
                $('#signin_wizard').find('.form-wizard').children('li').eq(index - 1).find('.step').html('<i class="fa fa-check"></i>');
            }
        }
    });

    $('#birthday').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });


});


function validkey(e) {
    var keynum;
    var keychar;
    var numcheck;
    if (window.event) // IE
    {
        keynum = e.keyCode;
    }
    else if (e.which) // Netscape/Firefox/Opera
    {
        keynum = e.which;
    }
    if (keynum == 13) {
        login();
    }
}






//login submit button actions
function login() {

    var login_username = $('#txtusername').val();
    var login_password = $('#txtpassword').val();

    if ($('#login_form').valid()) {
        var x = $('.load-anim').show().delay(5000);
        $('#login_msg').hide();
        $.ajax({
            type: "POST",
            url: site_url + "/login/login_controller/authenticate_user",
            data: "login_username=" + login_username + "&login_password=" + login_password,
            async: false,
            success: function(msg) {
                if (msg == 1) {
                    $('#login_msg').html('<span class="input-notification success png_bg">Login Success...</span>');
                    element = $('#txtusername');
                    var parent = $(element).parent('.input-with-icon');
                    var icon = $(element).parent('.input-with-icon').children('i');
                    icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
                    parent.removeClass('error-control').addClass('success-control');
                    element = $('#txtpassword');
                    var parent = $(element).parent('.input-with-icon');
                    var icon = $(element).parent('.input-with-icon').children('i');
                    icon.removeClass("fa fa-exclamation").addClass('fa fa-check');
                    parent.removeClass('error-control').addClass('success-control');
                    setTimeout("location.href = site_url+'/login/login_controller/';", 100);
                    x.fadeOut('slow');
                } else {
                    x.fadeOut('fast');
                    $('#login_msg').html('<span class="input-notification error png_bg">Invalid login details...</span>');
                    $('#login_msg').show();
                    element = $('#txtusername');
                    label = '<label class="error" for="txtusername">Please enter at least 6 characters.</label>';
                    $('<span class="error"></span>').insertAfter($(element).parent().parent());
                    var parent = $(element).parent('.input-with-icon');
                    var icon = $(element).parent('.input-with-icon').children('i');
                    icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
                    parent.removeClass('success-control').addClass('error-control');
                    element = $('#txtpassword');
                    label = '<label class="error" for="txtusername">Please enter at least 6 characters.</label>';
                    $('<span class="error"></span>').insertAfter($(element).parent().parent());
                    var parent = $(element).parent('.input-with-icon');
                    var icon = $(element).parent('.input-with-icon').children('i');
                    icon.removeClass('fa fa-check').addClass('fa fa-exclamation');
                    parent.removeClass('success-control').addClass('error-control');
                }

            }
        });
    }
}

