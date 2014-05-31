

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
            $('<span class="error"></span>').insertAfter(element).append(label)
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('success-control').addClass('error-control');
        },
        highlight: function(element) { // hightlight error inputs

        },
        unhighlight: function(element) { // revert the change done by hightlight

        },
        success: function(label, element) {
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('error-control').addClass('success-control');
        }
    });



//login submit button actions
    $('#login-submit').click(function() {

        var login_username = $('#txtusername').val();
        var login_password = $('#txtpassword').val();

        if ($('#login_form').valid()) {

            var x = $('.load-anim').show().delay(5000);

            $.ajax({
                type: "POST",
                url: site_url + "/login/login_controller/authenticateUser",
                data: "login_username=" + login_username + "&login_password=" + login_password,
                async: false,
                success: function(msg) {
                    $('#login_msg').html('<span class="response-msg notice ui-corner-all">validating...</span>');
                    if (msg == 1) {
                        $('#login_msg').html('<span class="response-msg notice ui-corner-all">validating...</span>');
                        setTimeout("location.href = site_url+'/login/login_controller/';", 100);
                        x.fadeOut('slow');
                    } else {

                        $('#login_msg').html('<span class="input-notification error png_bg">Invalid login details...</span>');
                    }

                }
            });
        }
    });
});





