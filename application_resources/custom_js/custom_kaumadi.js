var base_url = js_base_url;
var site_url = js_site_url;


//////////////////employee//////////////////////////////////////////////////////////////
$(document).ready(function() {
    //employee table
    var employee_table = $('#employee_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar employee_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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
        "aaSorting": [[3, "desc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        }
    });

//

    $(".employee_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_employee_btn" data-toggle="modal" data-target="#add_employee_modal">Add New Employee</button></div>');

    $('#employee_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#employee_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});
    
//add project form start date datepicker
    $('#employee_bday_dpicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });


    //add employee Form
    $('#add_employee_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            
            employee_fname: {
                required: true
            },
            employee_lname: {
                required: true
            },
            employee_email: {
                required: true
            },
            employee_type: {
                required: true
            },
            employee_contact: {
                required: true
            },
            employee_contract: {
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
            $.post(site_url + '/employee/employee_controller/add_new_employee', $('#add_employee_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_employee_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >employee</a>has been added.</div>');
                    add_employee_form.reset();
                    location.reload();
                } else {
                    $("#add_employee_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">employee</a>has failed.</div>');
                }
            });


        }
    });
});

//delete projects
function delete_employee(code) {

    if (confirm('Are you sure want to delete this Employee ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/employee/employee_controller/delete_employee',
            data: "code=" + code,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#employee_' + code).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Tasks');
                }
            }
        });
    }
}





















