var base_url = js_base_url;
var site_url = js_site_url;


$('.grid .clickable').on('click', function() {
    var el = jQuery(this).parents(".grid").children(".grid-body");
    el.slideToggle(200);
});

$(document).ready(function() {
//HTML5 editor
    $('#task_description').wysihtml5();

    $("#task_users").val(['']).select2();
    $("#task_cats_add").val(['']).select2();

//add task form start date datepicker
    $('#task_deadline_dpicker').datepicker({
        format: "yyyy-mm-dd",
        autoclose: true,
        todayHighlight: true
    });


//add Task form
    $('#add_task_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            task_name: {
                required: true
            },
            task_description: {
                required: true
            },
            task_deadline: {
                required: true
            },
            task_users: {
                required: true
            },
            task_cats_add: {
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
            $.post(site_url + '/task/task_controller/add_task', $('#add_task_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_task_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" > Task </a>has been added.</div>');
                    add_task_form.reset();
                    location.reload();
                } else {
                    $("#add_task_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#"> Task </a>has failed.</div>');
                }
            });


        }
    });

    //edit Task form
    $('#edit_task_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            task_name: {
                required: true
            },
            task_description: {
                required: true
            },
            task_deadline: {
                required: true
            },
//            task_priority: {
//                required: true
//            },
//            task_progress: {
//                required: true
//            }
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
            $.post(site_url + '/task/task_controller/edit_task', $('#edit_task_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#edit_task_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" > Task </a>has been updated successfully.</div>');
                    edit_task_form.reset();
                    location.reload();
                } else {
                    $("#edit_task_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#"> Task </a>has failed.</div>');
                }
            });


        }
    });


//Employee Task Comments


    var conversation = [[1, "sadsadsad"], [1, "asdsad"], [0, "asdsada"]];
    $('.user-details-wrapper').click(function() {
        set_user_details($(this).attr('data-user-name'), $(this).attr('data-chat-status'));
        $('#messages-wrapper').addClass('animated');
        $('#messages-wrapper').show();
        $('#chat-users').removeClass('animated');
        $('#chat-users').hide();
        $('.chat-input-wrapper').show();
    })

    $('.chat-back').click(function() {
        $('#messages-wrapper .chat-messages-header .status').removeClass('online');
        $('#messages-wrapper .chat-messages-header .status').removeClass('busy');
        $('#messages-wrapper').hide();
        $('#messages-wrapper').removeClass('animated');
        $('#chat-users').addClass('animated');
        $('#chat-users').show();
        $('.chat-input-wrapper').hide();
    })
    $('.bubble').click(function() {
        $(this).parent().parent('.user-details-wrapper').children('.sent_time').slideToggle();
    })
    $('#employe_task_comment').keypress(function(e) {
        if (e.keyCode == 13)
        {
            var employee_code = $('#employee_code').val();
            var task_id = $('#task_id').val();

            send_message($(this).val(), employee_code, task_id);
            $(this).val("");
            $(this).blur()
        }
        $('#main-chat-wrapper').slimScroll({resize: true});
    })
    $(window).setBreakpoints({
        distinct: true,
        breakpoints: [
            320,
            480,
            768,
            1024
        ]
    });
    var eleHeight = window.screen.height;
    eleHeight = eleHeight;

    $(window).setBreakpoints({
        distinct: true,
        breakpoints: [
            320,
            480,
            768,
            1024
        ]
    });
    //Break point entry 
    $(window).bind('enterBreakpoint320', function() {
        eleHeight = eleHeight - 20;
    });

    $(window).bind('enterBreakpoint480', function() {
        eleHeight = eleHeight - 20;
    });

    function initChatScroll() {
        var eleHeight = window.innerHeight;
        console.log(eleHeight);
        $('#main-chat-wrapper').slimScroll({
            color: '#a1b2bd',
            size: '4px',
            height: eleHeight,
            alwaysVisible: false
        });
    }
    $(window).resize(function() {
        $('#main-chat-wrapper').slimScroll({resize: true});
    });
    initChatScroll();
});

function set_user_details(username, status) {
    $('#messages-wrapper .chat-messages-header .status').addClass(status);
    $('#messages-wrapper .chat-messages-header span').text(username);
}
function build_conversation(msg, isOpponent, img, retina) {
    if (isOpponent == 1) {
        $('.chat-messages').append('<div class="user-details-wrapper">' +
                '<div class="user-details">' +
                '<div class="user-profile">' +
                '<img src="' + img + '"  alt="" data-src="' + img + '" data-src-retina="' + retina + '" width="35" height="35">' +
                '</div>' +
                '<div class="bubble old sender">' +
                msg +
                '</div>' +
                '</div>' +
                '<div class="clearfix"></div>' +
                '</div>');
    }
    else {
        $('.chat-messages').append('<div class="user-details-wrapper pull-right">' +
                '<div class="user-details">' +
                '<div class="bubble old sender">' +
                msg +
                '</div>' +
                '</div>' +
                '<div class="clearfix"></div>' +
                '</div>')
    }
}

function send_message(msg, employee_code, task_id) {

    $.post(site_url + '/task/task_controller/add_task_comment', {msg: msg, employee_code: employee_code, task_id: task_id}, function(msg)
    {
        $('#task_comments').append(msg);
    });
}

//search selected fa items
function task_comment_enter_btn_trgr(e) {
    var keynum;
    var keychar;
    var numcheck;
    if (window.event) // IE
    {
        keynum = e.keyCode;
    }
    else if (e.which) // Netscape/Firefox/Opera
    {
        keynum = e.which;
    }
    if (keynum == 13) {
        add_task_comment();
    }
}

function  add_task_comment() {

    var task_id = $('#task_id').val();
    var employee_code = $('#employee_code').val();
    var employe_task_comment = $('#employe_task_comment').val();


    $.post(site_url + '/task/task_controller/add_task_comment', {msg: employe_task_comment, employee_code: employee_code, task_id: task_id}, function(msg)
    {
        location.reload();
    });

}

function clear_task_users() {
    $("#task_users").val(['']).select2();
}

//get skills for skill category when assigning skills for tasks
$(document).on('change', '#skill_cat_code', function() {
    var skill_cat_code = $('#skill_cat_code').val();
    $.post(site_url + '/skill_matrix/skill_matrix_controller/get_skill_for_skill_category_filter', {skill_cat_code: skill_cat_code}, function(msg) {
        if (msg != '') {
            $("#skill_code").html('');
            $("#skill_code").html(msg);
        }
    });

});
