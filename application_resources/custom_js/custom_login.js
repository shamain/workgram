

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
                   if(index==2){
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
        'onPrevious':function(tab, navigation, index){
               
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

        $.ajax({
            type: "POST",
            url: site_url + "/login/login_controller/authenticate_user",
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
}

////js for manage_company
//
//var base_url = js_base_url;
//var site_url = js_site_url;
//
//
////////////////////company//////////////////////////////////////////////////////////////
//$(document).ready(function() {
//    //company table
//    var company_table = $('#company_table').dataTable({
//        "sDom": "<'row'<'col-md-6'l <'toolbar company_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
//        "oTableTools": {
//            "aButtons": [
//                {
//                    "sExtends": "collection",
//                    "sButtonText": "<i class='fa fa-cloud-download'></i>",
//                    "aButtons": ["csv", "xls", "pdf", "copy"]
//                }
//            ]
//        },
//        "aoColumnDefs": [
//            {"bSortable": false, "aTargets": [0]}
//        ],
//        "aaSorting": [[3, "desc"]],
//        "oLanguage": {
//            "sLengthMenu": "_MENU_ ",
//            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
//        }
//    });
//
////
//
//    $(".company_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_company_btn" data-toggle="modal" data-target="#add_company_modal">Add New Company</button></div>');
//
//    $('#company_table_wrapper .dataTables_filter input').addClass("input-medium ");
//    $('#company_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
//    $(".select2-wrapper").select2({minimumResultsForSearch: -1});
//    
//     //add company Form
//    $('#add_company_form').validate({
//        focusInvalid: false,
//        ignore: "",
//        rules: {
//            
//           company_code: {
//                required: true
//            },
//            company_name: {
//                required: true
//            },
//            company_email: {
//               
//                required: true
//            },
//            
//            company_address:{
//                required:true
//                
//            },
//           
//           company_contact: {
//                required: true
//            },
//           company_description: {
//                required: true
//            }
//
//
//        },
//        invalidHandler: function(event, validator) {
//            //display error alert on form submit    
//        },
//        errorPlacement: function(label, element) { // render error placement for each input type   
//            $('<span class="error"></span>').insertAfter($(element).parent()).append(label)
//            var parent = $(element).parent('.input-with-icon');
//            parent.removeClass('success-control').addClass('error-control');
//        },
//        highlight: function(element) { // hightlight error inputs
//            var parent = $(element).parent();
//            parent.removeClass('success-control').addClass('error-control');
//
//        },
//        unhighlight: function(element) { // revert the change done by hightlight
//
//        },
//        success: function(label, element) {
//            var parent = $(element).parent('.input-with-icon');
//            parent.removeClass('error-control').addClass('success-control');
//        }, submitHandler: function(form)
//        {
//            $.post(site_url + '/company/company_controller/add_new_company', $('#add_company_form').serialize(), function(msg)
//            {
//                if (msg == 1) {
//                    $("#add_company_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >company</a>has been added.</div>');
//                    add_company_form.reset();
//                    location.reload();
//                } else {
//                    $("#add_company_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">company</a>has failed.</div>');
//                }
//            });
//
//
//        }
//    });
//});
//
//   //edit company Form
//     $('#edit_company_form').validate({
//        focusInvalid: false,
//        ignore: "",
//        rules: {
//            
//            company_code: {
//                required: true
//            },
//            company_name: {
//                required: true
//            },
//           company_email: {
//                required: true
//            },
//            company_address: {
//                required: true
//            },
//           company_contact: {
//                required: true
//            },
//            company_description: {
//                required: true
//            }
//
//
//        },
//    invalidHandler: function(event, validator) {
//        //display error alert on form submit    
//    },
//    errorPlacement: function(label, element) { // render error placement for each input type   
//        $('<span class="error"></span>').insertAfter($(element).parent()).append(label)
//        var parent = $(element).parent('.input-with-icon');
//        parent.removeClass('success-control').addClass('error-control');
//    },
//    highlight: function(element) { // hightlight error inputs
//        var parent = $(element).parent();
//        parent.removeClass('success-control').addClass('error-control');
//
//    },
//    unhighlight: function(element) { // revert the change done by hightlight
//
//    },
//    success: function(label, element) {
//        var parent = $(element).parent('.input-with-icon');
//        parent.removeClass('error-control').addClass('success-control');
//    }, submitHandler: function(form)
//    {
//        $.post(site_url + '/company/company_controller/edit_company', $('#edit_company_form').serialize(), function(msg)
//        {
//            if (msg == 1) {
//                $("#edit_company_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >company</a>has been updated.</div>');
//                edit_company_form.reset();
//                location.reload();
//            } else {
//                $("#edit_company_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">company</a>has failed.</div>');
//            }
//        });
//
//
//    }
//});
//
//
// 
////delete company
//function delete_company(code) {
//
//    if (confirm('Are you sure want to delete this Company ?')) {
//
//        $.ajax({
//            type: "POST",
//            url: site_url + '/company/company_controller/delete_company',
//            data: "code=" + code,
//            success: function(msg) {
//                //alert(msg);
//                if (msg == 1) {
//                    //document.getElementById(trid).style.display='none';
//                    $('#company_' + code).hide();
//                }
//                else if (msg == 2) {
//                    alert('Cannot be deleted as it is already assigned to Tasks');
//                }
//            }
//        });
//    }
//}
