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
                <table class="table" id="notification_table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Notification Message</th>
                            <th>Area URL</th>
                            <th>System</th>
                            <th>Added Date</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($notifications as $notification) {
                            ?> 
                            <tr  id="notification_<?php echo $notification->notification_id; ?>">
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $notification->notification_msg; ?></td>
                                <td class="v-align-middle">
                                    <div style="padding:1px;top:9px;right:9px;;font-size:smaller;color:#545454;width: 21px;">
                                        <div style="width:9px;height:0;border:10px solid <?php echo $notification->notification_area_url; ?>;overflow:hidden"></div>
                                    </div>
                                </td>
                                <td><?php echo $notification->system_id; ?></td>
								
                                <td><?php echo $notification->notification_added_date; ?></td>

                                <td>

                                    <a href="<?php echo site_url(); ?>/notification/notification_controller/edit_notification_view/<?php echo $notification->notification_id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this notification" onclick="delete_notification(<?php echo $notification->notification_id; ?>)">
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
<div class="modal fade" id="add_notification_modal" tabindex="-1" role="dialog" aria-labelledby="add_notification_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_notification_form" name="add_notification_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_notification_modalLabel" class="semi-bold text-white">It's a new Notification</h4>
                    <p class="no-margin text-white">Include notification details here.</p>
                    <br>
                </div>
                <div class="modal-body">


                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Notification Message</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="notification_msg" class="form-control" type="text" name="notification_msg">                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">System</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
    							<select name="system_code" id="system_code" class="select2 form-control"  >
                                    <?php foreach ($systems as $system) { ?>
                                        <option value="<?php echo $system->system_code; ?>" ><?php echo $system->system; ?></option>
                                    <?php } ?>
                                </select>                          
                            </div>
                        </div>
                    </div>

                </div>
                
                <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Notification Area URL</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="notification_area_url" class="form-control" type="text" name="notification_area_url">                              
                            </div>
                        </div>
                    </div>
                <div id="add_notification_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>
            </form>
        </div>

    </div>
</div>
