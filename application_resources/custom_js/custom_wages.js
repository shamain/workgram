var base_url = js_base_url;
var site_url = js_site_url;


$(document).ready(function() {
    //wages_category table
    var wages_category_table = $('#wages_category_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar wages_category_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "collection",
                    "sButtonText": "<i class='fa fa-cloud-download'></i>",
                    "aButtons": ["csv", "xls", "pdf", "copy"]
                }
            ]
        },
        "aoColumnDefs": [
            {
                "bSortable": false,
                "aTargets": [0]
            }
        ],
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        }
    });

    //add wages Form

    $('#add_wages_category_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            category_name: {
                required: true

            },
            basic_salary: {
                required: true,
                number: true
            },
            ot_rate: {
                required: true,
                number: true

            },
            allowance: {
                required: true,
                number: true
            },
            bonus: {
                required: true,
                number: true
            }


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
        },
        submitHandler: function(form)

        {
            $.post(site_url + '/wages_category/wages_category_controller/add_new_wages_category', $('#add_wages_category_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_wages_category_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >wages category </a>has been added.</div>');
                    add_wages_category_form.reset();
                    location.reload();
                } else {
                    $("#add_wages_category_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">wages category </a>has failed.</div>');
                }
            });


        }
    });

});

    //edit wages category Form
    $('#edit_wages_category_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            category_name: {
                required: true

            },
            basic_salary: {
                required: true,
                number: true
            },
            ot_rate: {
                required: true,
                number: true

            },
            allowance: {
                required: true,
                number: true
            },
            bonus: {
                required: true,
                number: true
            }

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
        },
        submitHandler: function(form)

        {
            $.post(site_url + '/wages_category/wages_category_controller/edit_wages_category', $('#edit_wages_category_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#edit_wages_category_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >wages category</a> has been updated.</div>');
                    edit_wages_category_form.reset();
                    window.location = site_url + '/wages_category/wages_category_controller/manage_wages_category';
                } else {
                    $("#edit_wages_category_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">wages category </a> has failed.</div>');
                }
            });


        }
    });


    $("#datepicker_wages").datepicker({
        format: "yyyy",
        viewMode: "years",
        autoclose: true,
        minViewMode: "years"
    });



////delete wages_category
function delete_wages_category(id) {

    if (confirm('Are you sure want to delete this Wages Category?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/wages_category/wages_category_controller/delete_wages_category',
            data: "id=" + id,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#wages_category_'+id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Employees. First delete employees');
                }
            }
        });
    }
}
//get employee for company
$(document).on('change', '#select_company', function() {

    var company_code = $('#select_company').val();

    $.post(site_url + '/wages/manage_wages_controller/get_employee_by_company', {company_code: company_code}, function(msg) {
        if (msg != '') {
            $("#select_employee").html('');
            $("#select_employee").html(msg);
        }
    });

});
//Search button
$(document).on('click', '#search_wages_btn', function() {

    var company_code = $('#select_company').val();
    var employee_code = $('#select_employee').val();
    var year = $('#year_wages').val();

    $.post(site_url + '/wages/manage_wages_controller/get_employee_payment', {company_code: company_code, employee_code: employee_code, year: year}, function(msg) {
        if (msg != '') {
            $("#search_wages_div").html('');
            $("#search_wages_div").html(msg);

        }
    });

});



function  get_wages_pop_up_view(employee_code, year_month) {
console.log(year_month);
    $.post(site_url + '/wages/manage_wages_controller/get_wages_details_for_employee', {employee_code: employee_code, year_month: year_month}, function(msg) {

        $('#wages_pop_up_inner_content').html('');
        $('#wages_pop_up_inner_content').html(msg);
    });

//    $("#wages_pop_up").dialog({
//        autoOpen: false,
//        modal: true,
//        width: "650"
//
//    });
    $("#wages_pop_up").modal("show");
//    event.preventDefault();
}
//print attendance report
$(document).on('click', '#wages_print_btn', function() {
 var company_code = $('#select_company').val();
    var emp_code = $('#select_employee').val();
    var year = $('#year_wages').val();
    var win = window.open(site_url + '/wages/manage_wages_controller/print_wages_pdf_report()?company_code='+ company_code+'&emp_code=' + emp_code+'&year='+year, '_blank');
    win.focus();
});