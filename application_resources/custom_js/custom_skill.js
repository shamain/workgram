/* 
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
var base_url = js_base_url;
var site_url = js_site_url;


////////////////////skill//////////////////////////////////////////////////////////////
$(document).ready(function() {
    //skill table
    var skill_table = $('#skill_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar skill_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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



    $(".skill_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_skill_btn" data-toggle="modal" data-target="#add_skill_modal">Add New Skill</button></div>');

    $('#skill_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#skill_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

    //add skill 
    $('#add_company_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            skill_code: {
                required: true
            },
            skill_name: {
                required: true
            },
            skill_cat_code: {
                required: true,
                email: true

            },
            del_index: {
                required: true

            },
            added_by: {
                required: true
            },
            added_date: {
                required: true
            }


        },
        invalidHandler: function(event, validator) {

        },
        errorPlacement: function(label, element) {
            $('<span class="error"></span>').insertAfter($(element).parent()).append(label)
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('success-control').addClass('error-control');
        },
        highlight: function(element) {
            var parent = $(element).parent();
            parent.removeClass('success-control').addClass('error-control');

        },
        unhighlight: function(element) {

        },
        success: function(label, element) {
            var parent = $(element).parent('.input-with-icon');
            parent.removeClass('error-control').addClass('success-control');
        }, submitHandler: function(form)
        {
            $.post(site_url + '/skill/skill_controller/add_new_skill', $('#add_skill_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_skill_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >skill </a>has been added.</div>');
                    add_company_form.reset();
                    location.reload();
                } else {
                    $("#add_skill_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">skill </a>has failed.</div>');
                }
            });


        }
    });
});



//delete skill
function delete_skill(skill_code) {

    if (confirm('Are you sure want to delete this Skill?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/skill/skill_controller/delete_skill',
            data: "code=" + code,
            success: function(msg) {

                if (msg == 1) {
                    $('#skill_' + code).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Employees');
                }
            }
        });
    }
}



