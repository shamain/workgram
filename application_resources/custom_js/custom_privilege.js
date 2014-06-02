var base_url = js_base_url;
var site_url = js_site_url;

$(document).ready(function() {
    //privilege table
    var oTable4 = $('#privilege_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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

    $("div.toolbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_privilege_btn" data-toggle="modal" data-target="#add_privilege_modal">Add New Privilege</button></div>');


    $('#privilege_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#privilege_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

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
                    $("#msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The<a class="link" >Privilege</a>has been added.</div>');
                    add_privilege_form.reset();
                    location.reload();
                } else {
                    $("#msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The daily<a class="link" href="#">Privilege</a>has failed.</div>');
                }
            });


        }
    });


});

   