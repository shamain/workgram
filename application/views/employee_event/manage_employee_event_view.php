<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <table class="table" id="employee_event_table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Event Title</th>
                            <th>Employee Name</th>                  
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($employee_events as $employee_event) {
                            ?> 
                            <tr  id="employee_events_<?php echo $employee_event->employee_event_id; ?>">
                                <td><?php echo++$i; ?></td>
                                <td><?php echo $employee_event->event_title; ?></td>
                                <td>
                                    <?php echo $employee_event->employee_fname, ' ', $employee_event->employee_lname; ?> 

                                </td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/employee_event/employee_event_controller/edit_employee_event_view/<?php echo $employee_event->employee_event_id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Employee Event" onclick="delete_employee_event(<?php echo $employee_event->employee_event_id; ?>)">
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

<button class="btn btn-primary" style="margin-left:12px" data-toggle="modal" onclick="parent.location='<?php echo site_url(); ?>/event/event_controller/manage_event/'">View All Events</button>

<!-- Modal -->
<div class="modal fade" id="add_employee_event_modal" tabindex="-1" role="dialog" aria-labelledby="add_employee_event_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_employee_event_form" name="add_employee_event_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-users fa-4x"></i>
                    <h4 id="add_employee_event_modalLabel" class="semi-bold text-white">Add new Employee Event</h4>
                    <p class="no-margin text-white">Choose a Employee and make this a child of it.</p>
                    <br>
                </div>
                
                <div class="modal-body">
                    
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
                                <select name="event_id" id="event_id" class="select2 form-control"  >
                                    <?php foreach ($events as $event) {
                                        ?> 
                                        <option value="<?php echo $event->event_id; ?>"><?php echo $event->event_title; ?></option>
                                    <?php } ?>
                                </select>                              
                            </div>
                        </div>
                    </div>
                
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Employee Name</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <select name="employee_code" id="employee_code" class="select2 form-control"  >
                                    <?php foreach ($employees as $employee) {
                                        ?> 
                                        <option value="<?php echo $employee->employee_code; ?>"><?php echo $employee->employee_fname, ' ', $employee->employee_lname; ?></option>
                                    <?php } ?>
                                </select>                              
                            </div>
                        </div>
                    </div>
                </div>
        
                <div id="add_employee_event_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>

    </div>

</div>