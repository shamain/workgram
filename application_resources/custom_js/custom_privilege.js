var base_url = js_base_url;
var site_url = js_site_url;


//////////////////Privilege//////////////////////////////////////////////////////////////
$(document).ready(function() {
    //privilege table
    var privilege_table = $('#privilege_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar privilege_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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
        },
    });

    $(".privilege_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_privilege_btn" data-toggle="modal" data-target="#add_privilege_modal">Add New Privilege</button></div>');

    $('#privilege_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#privilege_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});





//add Privilege Form
    $('#add_privilege_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            master_privilege_code: {
                required: true
            },
            privilege: {
                required: true
            },
            privilege_desc: {
                required: true
            },
            privilege_hf: {
                required: true
            },
            assign_for: {
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
            $.post(site_url + '/settings/privilege_controller/add_new_privilege', $('#add_privilege_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_privilege_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Privilege </a>has been added.</div>');
                    add_privilege_form.reset();
                    location.reload();
                } else {
                    $("#add_privilege_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Privilege </a>has failed.</div>');
                }
            });


        }
    });


//edit Privilege Form
    $('#edit_privilege_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            master_privilege_code: {
                required: true
            },
            privilege: {
                required: true
            },
            privilege_desc: {
                required: true
            },
            privilege_hf: {
                required: true
            },
            assign_for: {
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
            $.post(site_url + '/settings/privilege_controller/edit_privilege', $('#edit_privilege_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#edit_privilege_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Privilege </a>has been updated.</div>');
                    edit_privilege_form.reset();
                    location.reload();
                } else {
                    $("#edit_privilege_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Privilege </a>has failed.</div>');
                }
            });


        }
    });
});



//delete privileges
function delete_privilege(id) {

    if (confirm('Are you sure want to delete this Privilege ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/settings/privilege_controller/delete_privilege',
            data: "id=" + id,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#privileges_' + id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Privilege');
                }
            }
        });
    }
}

//add new privilege			
//this is to autofill the Privilege Human Code	
function auto_write_human_friendly_code() {

    var privilege_text = $("#privilege").val();

    //replace spaces with _
    var replaced_text = privilege_text.replace(/ /g, "_");

    //convert to upper case
    document.getElementById('privilege_hf').value = replaced_text.toUpperCase();
}

////////////////Privilege Master/////////////////////////////////////////////////////////

//delete master pivileges
function delete_privilege_master(id) {

    if (confirm('Are you sure want to delete this Master Privilege ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/settings/privilege_master_controller/delete_privilege_master',
            data: "id=" + id,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {

                    $('#privilege_master_' + id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Master Privilege');
                }
            }
        });
    }
}

$(document).ready(function() {
    //privilege master table
    var oTable4 = $('#privilege_master_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar privilege_master_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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
        },
    });

    $(".privilege_master_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_privilege_master_btn" data-toggle="modal" data-target="#add_privilege_master_modal">Add New Master Privilege</button></div>');

    $('#privilege_master_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#privilege_master_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

    //add Master Privilege Form
    $('#add_privilege_master_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            master_privilege: {
                required: true
            },
            master_privilege_desc: {
                required: true
            },
            system_code: {
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
            $.post(site_url + '/settings/privilege_master_controller/add_new_privilege_master', $('#add_privilege_master_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_privilege_master_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Master Privilege </a>has been added.</div>');
                    add_privilege_master_form.reset();
                    location.reload();
                } else {
                    $("#add_privilege_master_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Master Privilege </a>has failed.</div>');
                }
            });
        }
    });


    //edit Master Privilege Form
    $('#edit_privilege_master_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            master_privilege: {
                required: true
            },
            master_privilege_desc: {
                required: true
            },
            system_code: {
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
            $.post(site_url + '/settings/privilege_master_controller/edit_master_privilege', $('#edit_privilege_master_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#edit_privilege_master_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The<a class="link" > Master Privilege </a>has been updated.</div>');
                    edit_privilege_master_form.reset();
                    location.reload();
                } else {
                    $("#edit_privilege_master_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Master Privilege </a>has failed.</div>');
                }
            });
        }
    });

});


////////////////////////Employee Privileges//////////////////////////////////////////////

function save_privileges_from_system(system_code, emp_id) {

    var loadersh = document.getElementById("loader_ajax_check_all_hrm" + system_code);
    loadersh.style.display = "inline";
    $("#loader_ajax_check_all_hrm" + system_code).html('<i id="animate-icon" class="fa fa-spinner fa fa-2x fa-spin"></i>');

    $("#msgsystem" + system_code).html('');
    var checkboxes = $('.chkbox' + system_code);
    $checkbox = document.getElementById('privilegesystem' + system_code);
    if ($($checkbox).is(':checked')) {
        checkboxes.attr("checked", true);
    } else {
        checkboxes.attr("checked", false);
    }

    if ($($checkbox).is(':checked')) {
        $.post(site_url + '/employee_privilege/employee_privilege_controller/employee_privileges_add_all', {system_code: system_code, emp_id: emp_id}, function(msg)
        {
            if (msg == 1) {

                $("#msgsystem" + system_code).html('<img src="' + base_url + '/application_resources/images/icons/color/accept.png"  />  ');
                $("#loader_ajax_check_all_hrm" + system_code).html('');

            } else {
                $("#msgsystem" + system_code).html('<img src="' + base_url + '/application_resources/images/icons/color/error.png"  />');
                $("#loader_ajax_check_all_hrm" + system_code).html('');

            }
        });
    } else {
        $.post(site_url + '/employee_privilege/employee_privilege_controller/employee_privileges_delete_all', {system_code: system_code, emp_id: emp_id}, function(msg)
        {

            if (msg == 1) {

                $("#msgsystem" + system_code).html('<img src="' + base_url + '/application_resources/images/icons/color/accept.png"  />');
                $("#loader_ajax_check_all_hrm" + system_code).html('');

            } else {
                $("#msgsystem" + system_code).html('<img src="' + base_url + '/application_resources/images/icons/color/error.png"  />');
                $("#loader_ajax_check_all_hrm" + system_code).html('');

            }
        });
    }
}


function save_privileges_from_user(privilige_code, emp_code) {
    
    $("#msg" + privilige_code).html('');
    $("#loader_ajax_check_all_hrm" + system_code).html('<i id="animate-icon" class="fa fa-spinner fa fa-2x fa-spin"></i>');

    $checkbox = document.getElementById('privilege' + privilige_code);

    $.post(site_url + '/employee_privilege/employee_privilege_controller/add_employee_privileges', {pri_code: privilige_code, emp_code: emp_code}, function(msg)
    {

        if (msg == 1) {

            $("#msg" + privilige_code).html('<img src="' + base_url + '/application_resources/images/icons/color/accept.png"  />');

        } else {
            $("#msg" + privilige_code).html('<img src="' + base_url + '/application_resources/images/icons/color/error.png"  />');
        }
    });

}
