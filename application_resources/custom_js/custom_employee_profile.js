
 

//edit employee bday datepicker
$('#employee_bday_edit_dpicker').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true
});

   //edit employee profile Form
$('#edit_profile_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        employee_fname:{
            required: true
           },
        employee_lname:{
            required: true
         },
       
        employee_email: {
            required: true,
            email:true
        },
        
        employee_bday: {
            required: true
        },
        employee_contact: {
            required: true,
            number:true
        },
        


    },
    invalidHandler: function(event, validator) {
        //display error alert on form submit    
    },
    errorPlacement: function(label, element) { // render error placement for each input type   
        $('<span class="error"></span>').insertAfter($(element).parent()).append(label)
        var parent = $(element).parent('.input-with-icon');
        parent.removeClass('success-control').addClass('error-control');
    },
    highlight: function(element) { // hightlight error inputs
        var parent = $(element).parent();
        parent.removeClass('success-control').addClass('error-control');

    },
    unhighlight: function(element) { // revert the change done by hightlight

    },
    success: function(label, element) {
        var parent = $(element).parent('.input-with-icon');
        parent.removeClass('error-control').addClass('success-control');
    }, submitHandler: function(form)
    {
        $.post(site_url + '/employee/employee_profile_controller/edit_employee', $('#edit_profile_form').serialize(), function(msg)
        {
            
            if (msg == 1) {
                $("#edit_profile_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >details </a>has been updated.</div>');
                edit_employee_profile_form.reset();
                window.location = site_url + '/employee/employee_profile_controller/view_profile';
            } else {
                $("#edit_profile_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">details </a>has failed.</div>');
            }
        });


    }
});



   


 
 $(document).ready(function () {
                $(document).on('mouseenter', '.divbutton', function () {
                    $(this).find(":button").show();
                }).on('mouseleave', '.divbutton', function () {
                    $(this).find(":button").hide();
                });
            });


 