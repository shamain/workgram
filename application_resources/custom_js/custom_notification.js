/*
 * Name: W.B.M.C. Fernando
 *  ID : IT08003416
 */
var base_url = js_base_url;
var site_url = js_site_url;


////////////////Notification/////////////////////////////////////////////////////////

$(document).ready(function() {
//Notification Table
    $('#notification_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar notification_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "collection",
                    "sButtonText": "<i class='fa fa-cloud-download'></i>",
                    "aButtons": ["csv", "xls", "pdf", "copy"]
                }
            ]
        },
        "aaSorting": [[0, "asc"]],  //sort first column
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        },
        "aoColumnDefs": [
            {
                "aTargets": [5], //Added Date column
                "bSearchable": false,
                "sType": 'date',
                "mRender": function(data, type, full) { //convert utc date to local
                    var notification_date_local = moment.utc(data).toDate();
                    notification_date_local = new moment(notification_date_local).format("D-MMM-YYYY h:mm:ss a");
                    return "<div class='date'>" + notification_date_local + "<div>";
                }
            }
        ]
    });
    //Table head buttons
    $(".notification_table_tbar").html('<div class="table-tools-actions">\n\
        <button class="btn btn-primary" style="margin-left:12px" id="add_notification_btn" data-toggle="modal" data-target="#add_notification_modal">Add New Notification</button>\n\
        <button style="margin-left: 20px;" title="Create report.." class="btn btn-primary" id="notification_print_btn"><i class="fa fa-print"></i></button></div> '); //print button
    $('#notification_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#notification_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});
  
//Add Notification Form validate
    $('#add_notification_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            notification_msg: {
                required: true
            },
            system_code: {
                required: true
            },
            notification_area_url: {
                required: true
            },
            notified_users: {
                required: true
            }
        },
        invalidHandler: function(event, validator) {
            //display error alert on form submit    
        },
        errorPlacement: function(label, element) { // render error placement for each input type   
            $('<span class="error"></span>').insertAfter($(element).parent()).append(label);
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
            $.post(site_url + '/notification/notification_controller/add_new_notification', $('#add_notification_form').serialize(), function(msg)
            {
                if (msg == 1) {

                    $("#add_notification_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Notification </a>has been added.</div>');
                    $("#notified_users").prop("disabled", false);
                    add_notification_form.reset();
                    location.reload();
                } else {
                    $("#add_notification_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Notification </a>has failed.</div>');
                }
            });
        }
    });

//Edit Notification Form validate
    $('#edit_notification_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            system_id: {
                required: true
            },
            notification_msg: {
                required: true
            },
            notification_area_url: {
                required: true
            }
        },
        invalidHandler: function(event, validator) {
            //display error alert on form submit    
        },
        errorPlacement: function(label, element) { // render error placement for each input type   
            $('<span class="error"></span>').insertAfter($(element).parent()).append(label);
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
            $.post(site_url + '/notification/notification_controller/edit_notification', $('#edit_notification_form').serialize(), function(msg)
            {
                if (msg == 1)
                {
                    $("#edit_notification_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The<a class="link" > Notification </a>has been updated.</div>');
                    //edit_notification_form.reset();
                    location.reload();
                    //parent.location= site_url + "/notification/notification_controller/manage_notification/";
                }
                else
                {
                    $("#edit_notification_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Notification </a>has failed.</div>');
                }
            });
        }
    });

//pass data to Edit Notification Form modal
    $(document).on("click", ".open-edit_notification_modal", function() {

        $(".modal-body.edit-notification #notification_id").val($(this).data('id'));
        $(".modal-body.edit-notification #notification_msg").val($(this).data('msg'));
        $(".modal-body.edit-notification #notification_area_url").val($(this).data('aurl'));
        $(".modal-body.edit-notification #system_id").val($(this).data('sysid'));
    });

//Add Notification Form Select users control 
    $("#notified_users").val(['']).select2();
    
});

//Delete Notification
function delete_notification(notification_id) {

    if (confirm('Are you sure want to delete this Notification ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/notification/notification_controller/delete_notification',
            data: "id=" + notification_id,
            success: function(msg) {

                if (msg == 1) {
                    $('#notification_' + notification_id).hide();
                    initNotificationMenu();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Notifications');
                }
            }
        });
    }
}

// Clear button of Add Notification form 
function clearSelected() {
    $("#notified_users").val(['']).select2();
}

// Radio buttons of Add Notification form 
function notification_type_select(ntypeRadio) {

    if (ntypeRadio.value == 'global')
    {
        document.getElementById("notified_users").disabled = true;
        $("#notified_users").select2();
        document.getElementById("lblnotified").innerHTML = '<del>Select Users (Send to...)</del>';
    }
    else
    {
        document.getElementById("notified_users").disabled = false;
        $("#notified_users").select2();
        document.getElementById("lblnotified").innerHTML = 'Select Users (Send to...)';
    }
}


//////////////////Notified Users//////////////////////////////////////////////////////////////

$(document).ready(function() {
//Notified Users Table
    $('#notified_users_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar notified_users_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
        "oTableTools": {
            "aButtons": [
                {
                    "sExtends": "collection",
                    "sButtonText": "<i class='fa fa-cloud-download'></i>",
                    "aButtons": ["csv", "xls", "pdf", "copy"]
                }
            ]
        },
        "aaSorting": [[0, "asc"]],  // sort first column
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        }
    });

    $(".notified_users_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_notified_users_btn" data-toggle="modal" data-target="#add_notified_users_modal">Add New Notified User</button></div>');

    $('#notified_users_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#notified_users_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

//Add Notified Users Form validate
    $('#add_notified_users_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            notification_id: {
                required: true
            },
            employee_code: {
                required: true
            }
        },
        invalidHandler: function(event, validator) {
            //display error alert on form submit    
        },
        errorPlacement: function(label, element) { // render error placement for each input type   
            $('<span class="error"></span>').insertAfter($(element).parent()).append(label);
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
            $.post(site_url + '/notification/notified_users_controller/add_new_notified_user', $('#add_notified_users_form').serialize(), function(msg)
            {
                if (msg == 1)
                {
                    $("#add_notified_users_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Notified User </a>has been added.</div>');
                    add_notified_users_form.reset();
                    location.reload();
                }
                else if (msg == 2) {
                    $("#add_notified_users_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">User </a>has already been notified with the notification.</div>');
                }
                else {
                    $("#add_notified_users_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Notified User </a>has failed.</div>');
                }
            });
        }
    });
    
//Edit Notified Users Form validate
    $('#edit_notified_users_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            notification_id: {
                required: true
            },
            employee_code: {
                required: true
            }
        },
        invalidHandler: function(event, validator) {
            //display error alert on form submit    
        },
        errorPlacement: function(label, element) { // render error placement for each input type   
            $('<span class="error"></span>').insertAfter($(element).parent()).append(label);
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
            $.post(site_url + '/notification/notified_users_controller/edit_notified_users', $('#edit_notified_users_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#edit_notified_users_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Notified Users </a>has been updated.</div>');
                    //edit_notified_users_form.reset();
                    location.reload();
                    //parent.location = site_url + "/notification/notified_users_controller/manage_notified_users/";
                }
                else if (msg == 2) {
                    $("#edit_notified_users_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">User </a>has already been notified with the notification.</div>');
                }
                else {
                    $("#edit_notified_users_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Notified User </a>has failed.</div>');
                }
            });
        }
    });
    
//pass data to Edit Notified Users form modal
    $(document).on("click", ".open-edit_notified_users_modal", function() {

        $(".modal-body.edit-notified-users #notified_users_id").val($(this).data('id'));
        $(".modal-body.edit-notified-users #notification_id").val($(this).data('nid')).select2();
        $(".modal-body.edit-notified-users #employee_code").val($(this).data('emp_code')).select2();

    });
    
});

//delete notified users
function delete_notified_users(notified_users_id) {

    if (confirm('Are you sure want to delete this Notified User ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/notification/notified_users_controller/delete_notified_users',
            data: "id=" + notified_users_id,
            success: function(msg) {

                if (msg == 1) {

                    $('#notified_users_' + notified_users_id).hide();
                    initNotificationMenu();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to notified users');
                }
            }
        });
    }
}
//////////////////////////////////////////////////////////////////////////////////////////////////


//Initialise Notification Menu
$(document).ready(function() {
    document.getElementById('notification-count').className="badge badge-important hide";
    initNotificationMenu();
    setInterval(initNotificationMenu, 3000);
});

//window onload
$(window).load(function() {
    setTimeout(function() {
        if ($('#notification-count').html() != "") {
            showTooltip($('#notification-count').html()); 
        }
    }, 500);
});

//Notification Menu popover control
$('#my-task-list').click(function() {
    initNotificationMenu();
});
$('#my-task-list').popover({
    html: true,
    content: function() {
        return $('#notification-list').html();
    },
    template: '<div class="popover"><div class="arrow"></div><h3 class="popover-title"></h3><div class="popover-content" id="hh" style="overflow-y: scroll; max-height: 340px"></div></div>'
});


// Notification Menu Initialise
function initNotificationMenu() {

    var menu_HTML = "";  //notification menu html
    var divMenu = document.getElementById('notification-list');  //notification menu container
    var divNotificationCount = document.getElementById('notification-count');  //notification count label

    $.getJSON(site_url + '/notification/notification_controller/init_notification_menu',
            function(notifications) {

                divMenu.innerHTML = "";
                var $menu_item_view_class = "";
                var $menu_item_border_color = "";
                menu_HTML = '<div style="width:300px" id="ngroup">';
                var unseen_count = 0;
                if (notifications.length > 0) {

                    $.each(notifications, function(key, notification) {
                        if (notification.notified_user_is_seen == 'n') {
                            $menu_item_view_class = "notification-messages danger";
                            unseen_count++;
                        }
                        else {
                            $menu_item_view_class = "notification-messages info";
                        }
                        switch (notification.system_id){
                            case '1':  //employee
                                $menu_item_border_color = '#58D3F7';
                                break;
                            case '2':  //projects
                                $menu_item_border_color = '#80FF00';
                                break;
                            case '3':  //privileges
                                $menu_item_border_color = '#FFBF00';
                                break;
                            case '4':  //master privileges
                                $menu_item_border_color = '#DF0101';
                                break;
                            default:
                                $menu_item_border_color = '';
                        }
                        var notification_date_local = moment.utc(notification.notification_added_date).toDate(); //convert from utc to local
                        var ndatetime = new moment(notification_date_local).format("dddd, MMMM Do YYYY [at] h:mm:ss a"); //for tooltip
                        var datetime_from_now = new moment(notification_date_local).from(new Date()); //mins ago format
                        var nfulldatetime = new moment(notification_date_local).format("dddd, MMMM Do YYYY [at] h:mm:ss a [(]Z[)]") + "  (" + datetime_from_now + ")"; //for message details view

                        menu_HTML += [
                            '<div class="' + $menu_item_view_class + '" onclick="mark_notification_as_seen(' + notification.notified_users_id + '); view_notification_details(' + notification.notified_users_id + ');initNotificationMenu();" id="notification_' + notification.notified_users_id + '" style="border-style: solid; border-color: ' + $menu_item_border_color + ';border-width: 1px">',
                                '<div class="message-wrapper">',
                                    '<div class="heading" id="msg_' + notification.notified_users_id + '" > ' + notification.notification_msg + ' </div>',
                                    '<div class="description" id="desc_' + notification.notified_users_id + '" > ' + notification.notification_area_url + ' </div>',
                                    '<div class="date pull-left" id="msgtime_' + notification.notified_users_id + '" title="' + ndatetime + '"><b>' + datetime_from_now + '</b></div>',
                                    '<input id="msgdatetime_' + notification.notified_users_id + '" type="hidden" value="' + nfulldatetime + '">',
                                '</div>',
                                '<div class="clearfix"></div>',
                            '</div>'].join('\n');
                    });
                }
                else {      //if no notifications
                    menu_HTML += [
                        '<div class="notification-messages success">',
                            '<div class="message-wrapper">',
                                '<div class="heading"> No Notifications.. </div>',
                                '<div class="description"></div>',
                                '<div class="date pull-left"></div>',
                            '</div>',
                            '<div class="clearfix"></div>',
                        '</div>'].join('\n');
                }

                menu_HTML += '</div>';
                divNotificationCount.title = "You have " + unseen_count + " unseen Notification(s)..";
                if (unseen_count == 0)
                {
                    divNotificationCount.className = "";
                    divNotificationCount.innerHTML = "";
                }
                else
                {
                    if ((parseInt(divNotificationCount.innerHTML)) < parseInt(unseen_count))
                    {
                        divNotificationCount.className = "badge badge-important hide";
                        showTooltip(unseen_count);
                    }
                    divNotificationCount.innerHTML = unseen_count;
                }

                divMenu.innerHTML = menu_HTML;
            });

}

// Mark Notification as Seen
function mark_notification_as_seen(id) {

    $.post(site_url + '/notification/notified_users_controller/mark_notified_user_as_seen/' + id);
    document.getElementById("notification_" + id).className = "notification-messages info";
}

// Function to Extract URLs from String
function replace_string_with_urls(text) {
    var exp = /(\b(((https?|ftp|file|):\/\/)|www[.])[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    var temp = text.replace(exp, '<a href=\"$1\" target=\"_blank\" style="color:blue">$1</a>');
    var result = "";

    while (temp.length > 0) {
        var pos = temp.indexOf("href=\"");
        if (pos == -1) {
            result += temp;
            break;
        }
        result += temp.substring(0, pos + 6);

        temp = temp.substring(pos + 6, temp.length);
        if ((temp.indexOf("://") > 8) || (temp.indexOf("://") == -1)) {
            result += "http://";
        }
    }

    return result;
}

//Notification Details View modal
$(document).ready(function() {
    var notification_view_modal = [
        '<div class="modal fade" id="view_notification_modal" tabindex="-1" role="dialog" aria-labelledby="view_notification_modalLabel" aria-hidden="true">',
            '<div class="modal-dialog">',
                '<div class="modal-content">',
                    '<form id="view_notification_form" name="view_notification_form">',
                        '<div class="modal-header tiles blue">',
                            '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">x</button>',
                            '<h5 id="view_notification_modalLabel" class="semi-bold text-white">Notification Details</h5>',
                        '</div>',
                        '<div class="modal-body" id="notification_details_madal">',
                            '<table class="table" style="table-layout: auto" id="noti_view_table">',
                                '<tr><td style="word-break:break-all;background-color: white" id="view_noti_msg"><b></b></td></tr>',
                                '<tr><td style="word-break:break-all;background-color: white" id="view_noti_url"></td></tr>',
                                '<tr><td style="word-break:break-all;background-color: white" id="view_noti_time"></td></tr>',
                                '<tr><td>',
                                    '<button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center>',
                                '</td></tr>',
                            '</table>',
                        '</div>',
                    '</form>',
                '</div>',
            '</div>',
        '</div>'].join('\n');
    
    document.getElementById('notification_view_details').innerHTML=notification_view_modal;
});

//open Notification Details modal
function view_notification_details(n_id) {

    document.getElementById("view_noti_msg").innerHTML = "<b>" + document.getElementById("msg_" + n_id).innerHTML + "</b>";
    document.getElementById("view_noti_url").innerHTML = replace_string_with_urls(document.getElementById("desc_" + n_id).innerHTML);
    document.getElementById("view_noti_time").innerHTML = document.getElementById("msgdatetime_" + n_id).value.toString();
    document.getElementById("notification_details_madal").style.border="2px solid " + document.getElementById("notification_" + n_id).style.borderColor;
    
    $('#view_notification_modal').modal('show');
}

//Function to show Notification Tooltip
function showTooltip(ncount) {
    $('#notification-count').tooltip('destroy');
    $('#notification-count').tooltip({
        title: '<div class="message">You have ' + ncount + ' unread notifications..</div>',
        trigger: 'manual',
        html: true,
        placement: 'bottom'
    });
    setTimeout(function() {
        $('#notification-count').removeClass('hide');	
        $('#notification-count').addClass('animated bounceIn');
    }, 200);
    setTimeout(function() {
        $('#notification-count').removeClass('animated bounceIn');
    }, 1000);
    setTimeout(function() {
        $('#notification-count').tooltip('show');
        $('#notification-count').removeClass('animated bounceIn');
    }, 3000);
    setTimeout(function() {
        $('#notification-count').tooltip('hide');
    }, 8000);
}


//Global function to Send Notifications
function send_notification(message, description, system_code, ntype, employees_codes) {
    //ntype = {global or specific; default=specific}
    //employees_codes = IDs of notified users {array}

    if (message != "" && system_code != "" && employees_codes != "")
    {
        var data = {
            notification_msg: message,
            notification_area_url: description,
            system_code: system_code,
            ntype: ntype,
            notified_users: employees_codes
        };

        $.post(site_url + '/notification/notification_controller/add_new_notification', data, function(msg)
        {
            return msg;
        });
    }
}

//print notification report button
$(document).on('click', '#notification_print_btn', function() {
    var win = window.open(site_url + '/notification/notification_controller/print_notification_pdf_report', '_blank');
    win.focus();
});