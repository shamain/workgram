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
            skill_category: {
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
        sill_category: {
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
                edit_skill_form.reset();
                location.reload();
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
            data: "id=" + id,
            success: function(msg) {

                if (msg == 1) {

                    $('#skills_' + id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to skills');
                }
            }
        });
    }
}

//this is to autofill the Skill Category Code
function auto_write_skill_cat_code() {

    var skill_category_text = $("#skill_name").val();

    //replace spaces with _
    var replaced_text = skill_category_text.replace(" ", "_");
    //convert to upper case
    document.getElementById('skill_cat_code').value = replaced_text.toUpperCase();
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
            $.post(site_url + '/skill_category/skill_category_controller/edit_skill_category', $('#edit_skill_category_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#edit_skill_category_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The<a class="link" > Skill Category </a>has been updated.</div>');
                    edit_skill_category_form.reset();
                    location.reload();
                } else {
                    $("#edit_skill_category_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Skill Category </a>has failed.</div>');
                }
            });
        }
    });


});