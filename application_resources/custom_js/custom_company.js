
var base_url = js_base_url;
var site_url = js_site_url;


////////////////////company//////////////////////////////////////////////////////////////
$(document).ready(function() {
    //company table
    var company_table = $('#company_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar company_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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
            {"bSortable": false, "aTargets": [0]}
        ],
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        }
    });



    $(".company_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_company_btn" data-toggle="modal" data-target="#add_company_modal">Add New Company</button></div>');

    $('#company_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#company_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

    //add company Form
    $('#add_company_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            company_code: {
                required: true
            },
            company_name: {
                required: true
            },
            company_email: {
                required: true,
                email: true

            },
            company_address: {
                required: true

            },
            company_contact: {
                required: true,
                number:true
            },
            company_description: {
                required: true
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
        }, submitHandler: function(form)
        {
            $.post(site_url + '/company/company_controller/add_new_company', $('#add_company_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_company_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >company </a>has been added.</div>');
                    add_company_form.reset();
                    window.location = site_url + '/company/company_controller/manage_companies';
                } else {
                    $("#add_company_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">company </a>has failed.</div>');
                }
            });


        }
    });
});

//edit company Form
$('#edit_company_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        company_code: {
            required: true
        },
        company_name: {
            required: true
        },
        company_email: {
            required: true,
            email: true
        },
        company_address: {
            required: true
        },
        company_contact: {
            required: true,
            number:true
        },
        company_description: {
            required: true
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
    }, submitHandler: function(form)
    {
        $.post(site_url + '/company/company_controller/edit_company', $('#edit_company_form').serialize(), function(msg)
        {
            if (msg == 1) {
                $("#edit_company_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >company </a>has been updated.</div>');
                edit_company_form.reset();
                window.location = site_url + '/company/company_controller/manage_companies';
            } else {
                $("#edit_company_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">company </a>has failed.</div>');
            }
        });


    }
});

//print company  report
$(document).on('click', '#company_print_btn', function() {
    var win = window.open(site_url + '/company/company_controller/print_company_pdf_report');
    win.focus();
});



////delete company
function delete_company(code) {

    if (confirm('Are you sure want to delete this Company ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/company/company_controller/delete_company',
            data: "code=" + code,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#company_'+code).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Employees.<br> First delete employees');
                }
            }
        });
    }
}



