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
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form id="edit_employee_event_form" name="edit_employee_event_form">

                            <div class="form-group">

                                <label class="form-label">Event Title</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="event_id" id="event_id" class="select2 form-control" style="width: 50%" >
                                        <?php foreach ($events as $event) {
                                            ?> 
                                            <option value="<?php echo $event->event_id; ?>"  <?php if ($event->event_id == $employee_event->event_id) { ?> selected="true" <?php } ?>><?php echo $event->event_title; ?></option>
                                        <?php } ?>
                                    </select>                              
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="form-label">Employee Name</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="employee_code" id="employee_code" class="select2 form-control"  >
                                        <?php foreach ($employees as $employee) {
                                            ?> 
                                            <option value="<?php echo $employee->employee_code; ?>"<?php if ($employee->employee_code == $employee_event->employee_code) { ?> selected="true" <?php } ?>><?php echo $employee->employee_fname, ' ', $employee->employee_lname; ?></option>
                                        <?php } ?>
                                    </select>                                
                                </div>
                            </div>

                            <input id="employee_event_id" class="form-control" type="hidden" name="employee_event_id" value="<?php echo $employee_event->employee_event_id; ?>" style="width: 50%"> 

<!--                            <div class="modal-footer">
                                <button class="btn btn-primary btn-cons" type="submit">
                                    <i class="icon-ok"></i>
                                    Save
                                </button>
                                <button class="btn btn-white btn-cons" type="button" onclick="parent.location='<?php echo site_url(); ?>/employee_event/employee_event_controller/manage_employee_event/'">Cancel</button>
                            </div>-->


                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>