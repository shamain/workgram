//$(document).ready(function() {		
//	$('#login-form').validate({
//
//                focusInvalid: false, 
//                ignore: "",
//                rules: {
//                    txtusername: {
//                        minlength: 2,
//                        required: true
//                    },
//                    txtpassword: {
//                        required: true,
//                    }
//                },
//
//                invalidHandler: function (event, validator) {
//					//display error alert on form submit    
//                },
//
//                errorPlacement: function (label, element) { // render error placement for each input type   
//					$('<span class="error"></span>').insertAfter(element).append(label)
//                    var parent = $(element).parent('.input-with-icon');
//                    parent.removeClass('success-control').addClass('error-control');  
//                },
//
//                highlight: function (element) { // hightlight error inputs
//					
//                },
//
//                unhighlight: function (element) { // revert the change done by hightlight
//                    
//                },
//
//                success: function (label, element) {
//					var parent = $(element).parent('.input-with-icon');
//					parent.removeClass('error-control').addClass('success-control'); 
//                },
//			    submitHandler: function(form) {
//						form.submit();
//				}
//            });	
//
//});

function login() {
    var login_username = $('#txtusername').val();
    var login_password = $('#txtpassword').val();

//            $('#login_msg').html('<span class="response-msg notice ui-corner-all">validating...</span>');

    $.ajax({
        type: "POST",
        url: site_url + "login/login_controller/authenticateUser",
        data: "login_username=" + login_username + "&login_password=" + login_password,
        async: false,
        success: function(msg) {
            $('#login_msg').html('<span class="response-msg notice ui-corner-all">validating...</span>');
            //alert(msg);
            if (msg == 1) {
                $('#login_msg').html('<span class="response-msg notice ui-corner-all">validating...</span>');
                $.ajax({
                    type: "POST",
                    url: site_url + "/login_controller/getUserdepartments",
                    data: "login_username=" + login_username + "&login_password=" + login_password,
                    async: false,
                    success: function(dep_msg) {
                        $('#da-login-box-content').html(dep_msg);
                        $('#login_msg').html('');

                    }
                });
            } else {

                $('#login_msg').html('<span class="input-notification error png_bg">Invalid login details...</span>');
            }
            //$('#login_msg').html(msg);
        }
    });
}