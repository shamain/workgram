<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<!--start calender import -->
<!--                <link href="<?php echo base_url(); ?>application_resources/css/fullcalendar.css" rel="stylesheet" type="text/css"/>
            <link href="<?php echo base_url(); ?>application_resources/css/fullcalendar.print.css" rel="stylesheet" type="text/css"/>

            <script src="<?php echo base_url(); ?>application_resources/js/fullcalendar.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/js/moment.min.js" type="text/javascript"></script>
            <script src="<?php echo base_url(); ?>application_resources/js/jquery-ui.custom.min.js" type="text/javascript"></script>-->
<!--end calender import -->

<!--calender bigin -->


<script>
    $(document).ready(function() {
		
		$('#calendar').fullCalendar({

			
			eventClick: function(event){
                             
                         //
                         
                            $(this).popover({
                            html: true,
                            placement: 'bottom',
     
                            title: function() {
                            return event.title.toString();
                            },
     
                            content: function() {
                                
                             var data = "<p>Start: " + event.start.toString() + "</p>";
                            data += "<p>End: " + event.end.toString() + "</p>";
//                            var data = "<p>Start: " + event.start.toString() + "</p>";
//                            data += "<p>End: " + event.end.toString() + "</p>";
                            return data;
                            }
                            });
                            $(this).popover('toggle'); 
                         
                        
                        //alert('hh');
                        
                       //--------------------------------------- 
                        //var title = prompt('Event Title:');
				var eventData;
				if (title) {
					eventData = {
						title: title,
						start: start,
						end: end
					};
					$('#calendar').fullCalendar('renderEvent', eventData, true); // stick? = true
                                }   
                       //---------------------------------------
                         },

});

});
</script>


<div>
    <style>

        body {
            margin: 0;
            padding: 0;
            font-family: "Lucida Grande",Helvetica,Arial,Verdana,sans-serif;
            font-size: 14px;
        }

        #calendar {
            width: 900px;
            margin: 40px auto;
        }

    </style>
</div> 
<div class="clearfix"></div>
<br>
<br>
<br>
<div class="row-fluid">
    
                    <!-- report button -->
                    <div align="right">
                    <button class="btn btn-primary" id="event_print_btn"><i class="fa fa-print"></i></button>
                    </div>
    
    <div class="grid-body no-border">
    <div class="tiles row tiles-container white  no-padding">
        <div id='calendar'></div>
    </div>
    </div>
    <!--calender end -->

</div>



<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="javascript:;" class="reload"></a>  </div>
            </div>
            <div class="grid-body ">
                <table class="table" id="event_table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Title</th> 
                            <th>Event Description</th>
                            <th>Start Date</th>
                            <th>End Date</th>
                            <th>Added By</th>
                            <th>Added Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($events as $event) {
                            ?> 
                            <tr  id="event_<?php echo $event->event_id; ?>">
                                <td><?php echo++$i; ?></td>
                                <td><?php echo $event->event_title; ?></td>
                                <td><?php echo $event->event_description; ?></td>
                                <td><?php echo $event->start_date; ?></td>
                                <td><?php echo $event->end_date; ?></td>
                                <td><?php echo $event->employee_fname . ' ' . $event->employee_lname; ?></td>
                                <td><?php echo $event->added_date; ?></td>

                                <td>

                                    <a href="<?php echo site_url(); ?>/event/event_controller/edit_event_view/<?php echo $event->event_id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this event" onclick="delete_event(<?php echo $event->event_id; ?>)">
                                        <i class="fa fa-times"></i>
                                    </a>

                                </td>
                            </tr>
                        <?php } ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--<button class="btn btn-primary" style="margin-left:12px" data-toggle="modal" onclick="parent.location='<?php echo site_url(); ?>/employee_event/employee_event_controller/manage_employee_event/'">View All Employee Events</button>-->

<!-- Modal--> 
<div class="modal fade" id="add_event_modal" tabindex="-1" role="dialog" aria-labelledby="add_event_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_event_form" name="add_event_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_event_modalLabel" class="semi-bold text-white">It's a new event</h4>
                    <p class="no-margin text-white">Include event details here.</p>
                    <br>
                </div>
                <div class="modal-body">

                    <!--  start radio button  -->

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Event Type</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <div class="radio radio-success">
                                    <input id="eglobal" type="radio" name="etype" value="global" onclick="event_type_select(this);">
                                    <label for="eglobal">Global</label>
                                    <input id="especific" type="radio" name="etype" value="specific" checked="checked" onclick="event_type_select(this);">
                                    <label for="especific">Specific</label>
                                </div>       
                            </div>
                        </div>
                    </div>

                    <!--end radio button--> 


                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Event Title</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="event_title" class="form-control" type="text" name="event_title">                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Event Description</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="event_description" class="form-control" type="text" name="event_description">                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Start Date</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="input-with-icon  right input-append primary date  no-padding" id="project_start_date_edit_dpicker">                                       
                            <i class=""></i>

                            <input class="form-control" type="text" id="start_date" name="start_date" readonly="true" value="<?php echo date("Y-m-d"); ?>">
                            <span class="add-on">
                                <span class="arrow"></span>
                                <i class="fa fa-th"></i>
                            </span>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">End Date</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="input-with-icon  right input-append primary date  no-padding" id="project_end_date_edit_dpicker">                                       
                            <i class=""></i>

                            <input class="form-control" type="text" id="end_date" name="end_date" readonly="true">
                            <span class="add-on">
                                <span class="arrow"></span>
                                <i class="fa fa-th"></i>
                            </span>
                        </div>
                    </div>

                </div>

                <!-- multi select field start-->
                <div class="row form-row">
                    <div class="col-md-5">
                        <div class="form-group">
                            <label class="form-label" id="lblevent">Select Users (Send to...)</label>
                            <span style="color: red">*</span>
                        </div>
                    </div>
                    <div class="col-md-6">
                        <div class="input-with-icon  right">                                       
                            <i class=""></i>

                            <select rows="2" name="employee_events[]" id="employee_events" style="width: 100%;" multiple="yes" class="select2 form-control">
                                <?php foreach ($employees as $employee) { ?>
                                    <option value="<?php echo $employee->employee_code; ?>"><?php echo $employee->employee_fname, ' ', $employee->employee_lname; ?></option> 
                                <?php } ?> 
                            </select>
                            <br><br>
                        </div>
                    </div>
                    <button type="button" id="btnEventClear" onClick="clearEventSelected();">Clear</button>
                </div>

                <!-- multi select field end -->


                <div id="add_event_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>

    </div>
</div>
