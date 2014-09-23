var base_url = js_base_url;
var site_url = js_site_url;


//////////////////Employee Event//////////////////////////////////////////////////////////////
$(document).ready(function() {
    //employee event table
    var employee_event_table = $('#employee_event_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar employee_event_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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

    $(".employee_event_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_employee_event_btn" data-toggle="modal" data-target="#add_employee_event_modal">Add New Employee Event</button></div>');

    $('#employee_event_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#employee_event_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

    //add employee event Form
    $('#add_employee_event_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            event_title: {
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
            $.post(site_url + '/employee_event/employee_event_controller/add_new_employee_event', $('#add_employee_event_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#add_employee_event_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Employee Event </a>has been added.</div>');
                    add_employee_event_form.reset();
                    location.reload();
                } else {
                    $("#add_employee_event_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Employee Event </a>has failed.</div>');
                }
            });


        }
    });


     
});

//edit employee event Form
$('#edit_employee_event_form').validate({
    focusInvalid: false,
    ignore: "",
    rules: {
        event_title: {
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
        $.post(site_url + '/employee_event/employee_event_controller/edit_employee_event', $('#edit_employee_event_form').serialize(), function(msg)
        {
            if (msg == 1) {
                $("#edit_employee_event_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Employee Event </a>has been updated.</div>');
                
                location.reload();
                parent.location= "../manage_employee_event/"
            } else {
                $("#edit_employee_event_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Employee Event </a>has failed.</div>');
            }
        });


    }
});


//delete employee event
function delete_employee_event(employee_event_id) {

    if (confirm('Are you sure want to delete this ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/employee_event/employee_event_controller/delete_employee_event',
            data: "id=" + employee_event_id,
            success: function(msg) {

                if (msg == 1) {
                    $('#employee_events_' + employee_event_id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Events');
                }
            }
        });
    }
}



////////////////Event/////////////////////////////////////////////////////////

//delete event
function delete_event(event_id) {

    if (confirm('Are you sure want to delete this Event ?')) {

        $.ajax({
            type: "POST",
            url: site_url + '/event/event_controller/delete_event',
            data: "id=" + event_id,
            success: function(msg) {
                //alert(msg);
                if (msg == 1) {
                    location.reload();
                    $('#event_' + event_id).hide();
                }
                else if (msg == 2) {
                    alert('Cannot be deleted as it is already assigned to Events');
                }
            }
        });
    }
}

$(document).ready(function() {
    //event table
    var event_table = $('#event_table').dataTable({
        "sDom": "<'row'<'col-md-6'l <'toolbar event_table_tbar'>><'col-md-6'f>r>t<'row'<'col-md-12'p i>>",
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

    $(".event_table_tbar").html('<div class="table-tools-actions"><button class="btn btn-primary" style="margin-left:12px" id="add_event_btn" data-toggle="modal" data-target="#add_event_modal">Add New Event</button></div>');

    $('#event_table_wrapper .dataTables_filter input').addClass("input-medium ");
    $('#event_table_wrapper .dataTables_length select').addClass("select2-wrapper span12");
    $(".select2-wrapper").select2({minimumResultsForSearch: -1});

    
    //add Event Form
    $('#add_event_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            event_title: {
                required: true
            },
            event_description: {
                required: true
            },
            start_date: {
                required: true
            },
            end_date: {
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
            $.post(site_url + '/event/event_controller/add_new_event', $('#add_event_form').serialize(), function(msg)
            {
                 if (msg.charAt(msg.length-1) == 1) {
                    $("#add_event_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The <a class="link" >Event </a>has been added.</div>');
                    add_event_form.reset();
                    location.reload();
                } else {
                    $("#add_event_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Event </a>has failed.</div>');
                }
            });
        }
    });
    
// edit event form
    $('#edit_event_form').validate({
        focusInvalid: false,
        ignore: "",
        rules: {
            event_title: {
                required: true
            },
            event_description: {
                required: true
            },
            start_date: {
                required: true
            },
            end_date: {
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
            $.post(site_url + '/event/event_controller/edit_event', $('#edit_event_form').serialize(), function(msg)
            {
                if (msg == 1) {
                    $("#edit_event_msg").html('<div class="alert alert-success"><button class="close" data-dismiss="alert"></button>Success: The<a class="link" > Event </a>has been updated.</div>');

                    location.reload();
                    parent.location= "../manage_event/"
                } else {
                    $("#edit_event_msg").html('<div class="alert alert-error"><button class="close" data-dismiss="alert"></button>Error: The <a class="link" href="#">Event </a>has failed.</div>');
                }
            });
        }
    });
    
          $("#employee_events").val(['']).select2();
});



//multi select field

function clearEventSelected(){
    $("#employee_events").val(['']).select2();
}


//radio button 
function event_type_select(etypeRadio) {
 
    if(etypeRadio.value=='global')
    {
   
       document.getElementById("employee_events").disabled=true;
       $("#employee_events").select2();
       document.getElementById("lblevent").innerHTML = '<del>Select Users (Send to...)</del>';
    }
    else
    {
        document.getElementById("employee_events").disabled=false;
        $("#employee_events").select2();
        document.getElementById("lblevent").innerHTML = 'Select Users (Send to...)';
    }
}

$(document).ready(function() {
        /*
		$('#calendar').fullCalendar({
			defaultDate: '2014-06-12',
			editable: true,
			events: [
				{
					title: 'All Day Event',
					start: '2014-06-01'
				},
				{
					title: 'Long Event',
					start: '2014-06-07',
					end: '2014-06-10'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2014-06-09T16:00:00'
				},
				{
					id: 999,
					title: 'Repeating Event',
					start: '2014-06-16T16:00:00'
				},
				{
					title: 'Meeting',
					start: '2014-06-12T10:30:00',
					end: '2014-06-12T12:30:00'
				},
				{
					title: 'Lunch',
					start: '2014-06-12T12:00:00'
				},
				{
					title: 'Birthday Party',
					start: '2014-06-13T07:00:00'
				}
			]
                            new edit
		}); */
                      $('#calendar').fullCalendar();                                                                                                                                                    
                      init_calendar();    
	});
        
        ////////////////////////////////new edit
       function init_calendar() {
    var newEvent = new Object();
    $.getJSON(site_url + '/event/event_controller/init_calendar_view',
            function(msg) {
                $.each(msg, function(key, val) {



                    newEvent.title = val.event_title;
                    newEvent.start = val.start_date;
                    newEvent.allDay = false;
                    newEvent.end = val.end_date;
                    newEvent.description = val.event_description;
                    newEvent.event_type=val.event_type;
                    if(newEvent.event_type=="global"){
                        newEvent.color='orange';
                    }
                    else{
                        newEvent.color='green';
                    }
                    
                    $('#calendar').fullCalendar('renderEvent',
                            {
                                title: newEvent.title,
                                start: newEvent.start,
                                end: newEvent.end,
                                allDay: newEvent.allDay,
                                description: newEvent.description,
                                color: newEvent.color
                            },
                    true // make the event "stick"
                            );
                });
            });
}



//generate report button
$(document).on('click', '#event_print_btn', function() {
    var win = window.open(site_url + '/event/event_controller/print_event_pdf_report', '_blank');
    win.focus();
});