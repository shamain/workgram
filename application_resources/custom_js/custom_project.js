var base_url = js_base_url;
var site_url = js_site_url;


//////////////////project//////////////////////////////////////////////////////////////
$(document).ready(function() {
    //project table
    var project_table = $('#project_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar project_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "collection",
                    "sButtonText": "<i class='fa fa-cloud-download'></i>",
                    "aButtons": ["csv", "xls", "pdf", "copy"]
                }
            ]
        },
        "aaSorting": [[0, "asc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        }
    });

    $(".project_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_project_btn" data-toggle="modal" data-target="#add_project_modal">Add New Project</button></div>');

    $('#project_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#project_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});


    //add project form start date datepicker
    $('#project_start_date_dpicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });

    //add project form start date datepicker
    $('#project_end_date_dpicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });

    //add project Form
    $('#add_project_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            project_name: {
                required: true
            },
            project_vendor: {
                required: true
            },
            project_start_date: {
                required: true
            },
            project_description: {
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
            $.post(site_url + '/project/project_controller/add_new_project', $('#add_project_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_project_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >project </a>has been added.</div>');
                    add_project_form.reset();
                    location.reload();
                } else {
                    $("#add_project_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">project </a>has failed.</div>');
                }
            });


        }
    });
});

//edit project form start date datepicker
$('#project_start_date_edit_dpicker').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true
});

//edit project form start date datepicker
$('#project_end_date_edit_dpicker').datepicker({
    format: "yyyy-mm-dd",
    autoclose: true,
    todayHighlight: true
});

//edit project Form
$('#edit_project_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        project_name: {
            required: true
        },
        project_vendor: {
            required: true
        },
        project_start_date: {
            required: true
        },
        project_description: {
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
        $.post(site_url + '/project/project_controller/edit_project', $('#edit_project_form').serialize(), function(msg)
        {
            if (msg == 1) {
                $("#edit_project_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >project </a>has been updated.</div>');
                edit_project_form.reset();
                location.reload();
            } else {
                $("#edit_project_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">project </a>has failed.</div>');
            }
        });


    }
});



//delete projects
function delete_project(id) {

    if (confirm('Are you sure want to delete this Project ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/project/project_controller/delete_project',
            data: "id=" + id,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {
                    //document.getElementById(trid).style.display='none';
                    $('#projects_' + id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Tasks');
                }
            }
        });
    }
}












        