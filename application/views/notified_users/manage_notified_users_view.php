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
                <table class="table" id="notified_users_table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Employee Name</th>
                            <th>Notification Message</th>                  
                            <th>Is Seen</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($notified_users as $notified_user) {
                            ?> 
                            <tr  id="notified_users_<?php echo $notified_user->notified_users_id; ?>">
                                <td><?php echo++$i; ?></td>
                                <td><?php echo $notified_user->employee_fname, ' ', $notified_user->employee_lname ; ?>
                                </td>
                                <td>
                                    <?php echo $notified_user->notification_msg; ?> 

                                </td>
                                <td>
                                    <?php echo $notified_user->notified_user_is_seen; ?> 

                                </td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/notification/notified_users_controller/edit_notified_users_view/<?php echo $notified_user->notified_users_id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this" onclick="delete_notified_users(<?php echo $notified_user->notified_users_id; ?>)">
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

<!-- Modal -->
<div class="modal fade" id="add_notified_users_modal" tabindex="-1" role="dialog" aria-labelledby="add_notified_users_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_notified_users_form" name="add_notified_users_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-users fa-4x"></i>
                    <h4 id="add_notified_users_modalLabel" class="semi-bold text-white">Add new Notified User</h4>
                    <p class="no-margin text-white">Choose a Notification.</p>
                    <br>
                </div>
                <div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Notification</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <select name="notification_id" id="notification_id" class="select2 form-control"  >
                                    <?php foreach ($notifications as $notification) {
                                        ?> 
                                        <option value="<?php echo $notification->notification_id; ?>"><?php echo $notification->notification_msg; ?></option>
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
                <div id="add_notified_users_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>

    </div>

</div>

