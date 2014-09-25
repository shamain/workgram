<!--
   Name: W.B.M.C. Fernando
   ID  : IT08003416
-->
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
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <form id="edit_notified_users_form1" name="edit_notified_users_form1">

                            <div class="form-group">

                                <label class="form-label">Notification</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="notification_id" id="notification_id" class="select2 form-control"  >
                                        <?php foreach ($notifications as $notification) {
                                            ?> 
                                        <option value="<?php echo $notification->notification_id; ?>"  <?php if($notification->notification_id == $notified_users->notification_id ){?> selected="true" <?php } ?>><?php echo $notification->notification_msg; ?></option>
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
                                        <option value="<?php echo $employee->employee_code; ?>"  <?php if($employee->employee_code == $notified_users->employee_code ){?> selected="true" <?php } ?>><?php echo $employee->employee_fname, ' ', $employee->employee_lname; ?></option>
                                        <?php } ?>
                                    </select>                               
                                </div>
                            </div>

                            <input id="notified_users_id" class="form-control" type="hidden" name="notified_users_id" value="<?php echo $notified_users->notified_users_id; ?>" > 

                            <div class="form-actions">
                                <div class="pull-right">
                                    <button class="btn btn-primary btn-cons" type="submit">
                                        <i class="icon-ok"></i>
                                        Save
                                    </button>
                                    <button class="btn btn-white btn-cons" type="button" onclick="parent.location='<?php echo site_url(); ?>/notification/notified_users_controller/manage_notified_users/'">Cancel</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>