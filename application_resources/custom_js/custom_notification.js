var base_url = js_base_url;
var site_url = js_site_url;


//////////////////Notified Users//////////////////////////////////////////////////////////////
$(document).ready(function() {
    //notified users table
    var notified_users_table = $('#notified_users_table').dataTable({
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
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [0]}
        ],
        "aaSorting": [[3, "desc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        }
    });

    $(".notified_users_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_notified_users_btn" data-toggle="modal" data-target="#add_notified_users_modal">Add New Notified User</button></div>');

    $('#notified_users_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#notified_users_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

    //add Notified Users Form
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
        }, submitHandler: function(form)
        {
            $.post(site_url + '/notification/notified_users_controller/add_new_notified_user', $('#add_notified_users_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_notified_users_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Notified User </a>has been added.</div>');
                    add_notified_users_form.reset();
                    location.reload();
                } else {
                    $("#add_notified_users_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Notified User </a>has failed.</div>');
                }
            });


        }
    });

});

//edit Notified Users Form
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
    }, submitHandler: function(form)
    {
        $.post(site_url + '/notification/notified_users_controller/edit_notified_users', $('#edit_notified_users_form').serialize(), function(msg)
        {
            if (msg == 1) {
                $("#edit_notified_users_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Notified Users </a>has been updated.</div>');
                edit_notified_users_form.reset();
                
                parent.location= site_url + "/notification/notified_users_controller/manage_notified_users/";
                //location.reload();
            } else {
                $("#edit_notified_users_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Notified User </a>has failed.</div>');
            }
        });


    }
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
                    init_notification_menu();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to notified users');
                }
            }
        });
    }
}



////////////////Notification/////////////////////////////////////////////////////////

//delete notification
function delete_notification(notification_id) {

    if (confirm('Are you sure want to delete this Notification ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/notification/notification_controller/delete_notification',
            data: "id=" + notification_id,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {

                    $('#notification_' + notification_id).hide();
                    init_notification_menu();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Notifications');
                }
            }
        });
    }
}

$(document).ready(function() {
    //notification table
    var notification_table = $('#notification_table').dataTable({
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
        "aoColumnDefs": [
            {"bSortable": false, "aTargets": [0]}
        ],
        "aaSorting": [[3, "desc"]],
        "oLanguage": {
            "sLengthMenu": "_MENU_ ",
            "sInfo": "Showing <b>_START_ to _END_</b> of _TOTAL_ entries"
        }
    });

    $(".notification_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_notification_btn" data-toggle="modal" data-target="#add_notification_modal">Add New Notification</button></div>');
    

    $('#notification_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#notification_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

    
    
    //edit Notification Form
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
        }, submitHandler: function(form)
        {
            $.post(site_url + '/notification/notification_controller/edit_notification', $('#edit_notification_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#edit_notification_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The<a class="link" > Notification </a>has been updated.</div>');
                   edit_notification_form.reset();
             
                  //location.reload();
                  
                  parent.location= site_url + "/notification/notification_controller/manage_notification/";
                
                } else {
                    $("#edit_notification_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Notification </a>has failed.</div>');
                }
            });
        }
    });

    //add Notification Form
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
        }, submitHandler: function(form)
        {
            $.post(site_url + '/notification/notification_controller/add_new_notification', $('#add_notification_form').serialize(), function(msg)
            {
                
                if (msg.charAt(msg.length-1) == 1) {
                    $("#add_notification_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Notification </a>has been added.</div>');
                    add_notification_form.reset();
                    location.reload();
                } else {
                    $("#add_notification_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Notification </a>has failed.</div>');
                }
            });
        }
    });
  
    $("#notified_users").val(['']).select2();
    document.getElementById("user-name").onclick=init_notification_menu();
    init_notification_menu();
});


function clearSelected(){
    $("#notified_users").val(['']).select2();
}

function notification_type_select(ntypeRadio) {
 
    if(ntypeRadio.value=='global')
    {
   
       document.getElementById("notified_users").disabled=true;
       $("#notified_users").select2();
       document.getElementById("lblnotified").innerHTML = '<del>Select Users (Send to...)</del>';
    }
    else
    {
        document.getElementById("notified_users").disabled=false;
        $("#notified_users").select2();
        document.getElementById("lblnotified").innerHTML = 'Select Users (Send to...)';
    }
}

// Main Notification Menu
function init_notification_menu(){
    
    var $messagehtml = "";
    var $div_menu = document.getElementById('notification-list');

    $.getJSON(site_url + '/notification/notification_controller/init_notification_menu',
            function(msg) {
                
                init_menu_unseen_count();
                $div_menu.innerHTML ="";
                var $msg_view_cls="";
                $messagehtml='<div style="width:300px">';
                
                if (msg.length>0){
                    var url_string
                $.each(msg, function(key, val) {
                    if(val.notified_user_is_seen=='n'){
                        $msg_view_cls="notification-messages danger";
                    }
                    else{
                        $msg_view_cls="notification-messages info";
                    }
                        
                    $messagehtml += [
                        '<div class="' + $msg_view_cls + '" onclick="mark_notification_as_seen(' + val.notified_users_id + '); view_notification_details(' + val.notified_users_id + ');" id="notification_' + val.notified_users_id + '" >',
                            '<div class="message-wrapper">',
                                '<div class="heading" id="msg_' + val.notified_users_id + '" > ' + val.notification_msg + ' </div>',
                                '<div class="description" id="desc_' + val.notified_users_id + '" > ' + val.notification_area_url + ' </div>',
                                '<div class="date pull-left" id="msgtime_' + val.notified_users_id + '"> ' + val.notification_added_date + ' </div>',
                            '</div>',
                            '<div class="clearfix"></div>',
                        '</div>'].join('\n');
                    
                    
                });
                }
                else{
                    $messagehtml += [
                        '<div class="notification-messages success">',
                            '<div class="message-wrapper">',
                                '<div class="heading"> No Notifications.. </div>',
                                '<div class="description"></div>',
                                '<div class="date pull-left"></div>',
                            '</div>',
                            '<div class="clearfix"></div>',
                        '</div>'].join('\n');
                }
                $messagehtml += '</div>';
                
                $div_menu.innerHTML = $messagehtml;
                

            });
            
            
}

//notification count
function init_menu_unseen_count(){
    var notification_count = document.getElementById('notification-count');
                
                $.post(site_url + '/notification/notified_users_controller/user_unseen_notification_count/', function(data) {
                    if (data=="0")
                    {
                        notification_count.className="";
                        notification_count.innerHTML = "";
                    }
                    else{
                        notification_count.className="badge badge-important";
                        notification_count.innerHTML = data;
                    }
                      
                    notification_count.title="You have " + data + " unseen Notification(s)..";
                    
                });
    
}

function mark_notification_as_seen(id){
    
    $.post(site_url + '/notification/notified_users_controller/mark_notification_as_seen/'+ id);
    document.getElementById("notification_" + id).className="notification-messages info";
    init_menu_unseen_count();
    document.getElementById("user-name").onclick=init_notification_menu();
}

function replace_string_with_urls(text){
    var exp = /(\b(((https?|ftp|file|):\/\/)|www[.])[-A-Z0-9+&@#\/%?=~_|!:,.;]*[-A-Z0-9+&@#\/%=~_|])/ig;
    var temp = text.replace(exp,'<a href=\"$1\" target=\"_blank\" style="color:blue">$1</a>');
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

//notification details view
$(document).ready(function() {
var notification_view_modal=[
    '<div class="modal fade" id="view_notification_modal" tabindex="-1" role="dialog" aria-labelledby="view_notification_modalLabel" aria-hidden="true">',
    '<div class="modal-dialog">',
        '<div class="modal-content">',
            '<form id="view_notification_form" name="view_notification_form">',
                '<div class="modal-header tiles blue">',
                    
                    '<button type="button" class="close" data-dismiss="modal" aria-hidden="true">X</button>',
                    
                    
                    '<h5 id="view_notification_modalLabel" class="semi-bold text-white">Notification Message Details</h5>',
                '</div>',
                
                '<div class="modal-body">',

                    
                    '<table class="table" style="table-layout: auto">',
                        
                        '<tr ><td style="word-break:break-all;background-color: white" id="view_noti_msg"><b>',
                     '</b></td> ',
                    '</tr>',
                    '<tr><td style="word-break:break-all;background-color: white" id="view_noti_url">',
                               
                    '</td></tr>',
                    
                    '<tr><td style="word-break:break-all;background-color: white" id="view_noti_time">',
                  
                     '</td></tr>',
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

function view_notification_details($n_id){
        
    $('#view_notification_modal').modal('show');
    document.getElementById("view_noti_msg").innerHTML="<b>"+ document.getElementById("msg_"+ $n_id).innerHTML + "</b>";
    document.getElementById("view_noti_url").innerHTML=replace_string_with_urls(document.getElementById("desc_"+ $n_id).innerHTML);
    document.getElementById("view_noti_time").innerHTML=document.getElementById("msgtime_"+ $n_id).innerHTML;
}