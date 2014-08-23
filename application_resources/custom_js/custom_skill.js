var base_url = js_base_url;
var site_url = js_site_url;


//////////////////Skill//////////////////////////////////////////////////////////////
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
        },
    });

    $(".skill_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_skill_btn" data-toggle="modal" data-target="#add_skill_modal">Add New Skill</button></div>');

    $('#skill_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#skill_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

    //add Skill Form
    $('#add_skill_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            skill_name: {
                required: true
            },
            skill_cat_code: {
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
            $.post(site_url + '/skill/skill_controller/add_new_skill', $('#add_skill_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_skill_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Skill </a>has been added.</div>');
                    add_skill_form.reset();
                    location.reload();
                } else {
                    $("#add_skill_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Skill </a>has failed.</div>');
                }
            });


        }
    });

});

//edit Skill Form
$('#edit_skill_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        skill_name: {
            required: true
        },
        sill_cat_code: {
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
        $.post(site_url + '/skill/skill_controller/edit_skill', $('#edit_skill_form').serialize(), function(msg)
        {
            if (msg == 1) {
                $("#edit_skill_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Skill </a>has been updated.</div>');
//                edit_skill_form.reset();
                window.location = site_url + '/skill/skill_controller/manage_skill';
            } else {
                $("#edit_skill_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Skill </a>has failed.</div>');
            }
        });


    }
});


//delete skills
function delete_skill(skill_code) {

    if (confirm('Are you sure want to delete this Skill ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/skill/skill_controller/delete_skill',
            data: "id=" + skill_code,
            success: function(msg) {

                if (msg == 1) {

                    $('#skills_' + skill_code).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to skills');
                }
            }
        });
    }
}



////////////////Skill Category/////////////////////////////////////////////////////////

//delete skill category
function delete_skill_category(skill_cat_code) {

    if (confirm('Are you sure want to delete this Skill Category ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/skill/skill_category_controller/delete_skill_category',
            data: "id=" + skill_cat_code,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {

                    $('#skill_category_' + skill_cat_code).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Skill category');
                }
            }
        });
    }
}

$(document).ready(function() {
    //skill category table
    var skill_category_table = $('#skill_category_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar skill_category_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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

    $(".skill_category_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_skill_category_btn" data-toggle="modal" data-target="#add_skill_category_modal">Add New Skill Category</button></div>');

    $('#skill_category_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#skill_category_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

    //colour picker
    $('.skill_cat_colour_picker').colorpicker()

    //add Skill Category Form
    $('#add_skill_category_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            skill_cat_name: {
                required: true
            },
            skill_cat_code: {
                required: true
            },
            colour: {
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
            $.post(site_url + '/skill/skill_category_controller/add_new_skill_category', $('#add_skill_category_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_skill_category_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Skill Category </a>has been added.</div>');
                    add_skill_category_form.reset();
                    location.reload();
                } else {
                    $("#add_skill_category_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Skill Category </a>has failed.</div>');
                }
            });
        }
    });

    $('#edit_skill_category_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            skill_cat_name: {
                required: true
            },
            skill_cat_code: {
                required: true
            },
            colour: {
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
            $.post(site_url + '/skill/skill_category_controller/edit_skill_category', $('#edit_skill_category_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#edit_skill_category_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The<a class="link" > Skill Category </a>has been updated.</div>');
//                    edit_skill_category_form.reset();
                    window.location = site_url + '/skill/skill_category_controller/manage_skill_category';
                } else {
                    $("#edit_skill_category_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Skill Category </a>has failed.</div>');
                }
            });
        }
    });


});


///////////////////////////////Skill Matrix//////////////////////////////

//skill chart
//$(document).ready(function() {


function d() {
    alert();
}

//skill matrix table
$(document).ready(function() {

    var skill_matrix_table = $('#my_skill_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar my_skill_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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

    $(".skill_my_skill_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_skill_category_btn" data-toggle="modal" data-target="#add_skill_category_modal">Add New Skill Category</button></div>');

    $('#my_skill_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#my_skill_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

});

$('#add_employee_skill_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        skill_code: {
            required: true
        },
        expert_level: {
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
        var expert_level = $('.slider-selection')[0].style.left;
        expert_level = expert_level.replace('%', '');

        var data = $('#add_employee_skill_form').serialize() + '&expert_level=' + expert_level;
        $.post(site_url + '/skill_matrix/skill_matrix_controller/add_new_skill_matrix', data, function(msg)
        {
            if (msg == 1) {
                $("#add_emp_skill_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Skill </a>has been added.</div>');
                add_employee_skill_form.reset();
                location.reload();
            } else {
                $("#add_emp_skill_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Skill </a>has failed.</div>');
            }
        });
    }
});

//});
//    edit employee skill matrix

$('#edit_skill_matrix_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        skill_code: {
            required: true
        },
        expert_level: {
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
        $.post(site_url + '/skill_matrix/skill_matrix_controller/edit_employee_skill_matrix', $('#edit_skill_matrix_form').serialize(), function(msg)
        {
            if (msg == 1) {
                $("#edit_skill_matrix_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Skill </a>has been updated.</div>');
//                edit_employee_skill_form.reset();             
//                location.reload();
                window.location = site_url + '/skill_matrix/skill_matrix_controller/manage_skill_matrix';;
            } else {
                $("#edit_skill_matrix_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Skill </a>has failed.</div>');
            }
        });


    }

});
//});

function delete_employee_skill(employee_skill_id) {

    if (confirm('Are you sure want to delete this Skill Matrix ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/skill_matrix/skill_matrix_controller/delete_employee_skill',
            data: "id=" + employee_skill_id,
            success: function(msg) {

                if (msg == 1) {

                    $('#skill_matrix_' + employee_skill_id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to skills');
                }
            }
        });
    }
}

//get skills for skill category when assigning skills for employees
$(document).on('change', '#skill_cat_code', function() {
    var skill_cat_code = $('#skill_cat_code').val();
    $.post(site_url + '/skill_matrix/skill_matrix_controller/get_skill_for_skill_category_filter', {skill_cat_code: skill_cat_code}, function(msg) {
        if (msg != '') {
            $("#skill_code").html('');
            $("#skill_code").html(msg);
        }
    });

});


