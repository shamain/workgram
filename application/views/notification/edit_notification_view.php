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
                        <form id="edit_notification_form" name="edit_notification_form">

                            <div class="form-group">
                                
                                <label class="form-label">System</label>
                                <span style="color: red">*</span>
                                    
                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="system_id" id="system_id" class="select2 form-control"  >
                                        <?php foreach ($systems as $system) {
                                            ?> 
                                        <option value="<?php echo $system->system_code; ?>"  <?php if($system->system_code == $notification->system_id ){?> selected="true" <?php } ?>><?php echo $system->system; ?></option>
                                        <?php } ?>
                                    </select>                              
                                </div>
                                
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Notification Message</label>
                                <span style="color: red">*</span>
                            
                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="notification_msg" class="form-control" type="text" name="notification_msg" value="<?php echo $notification->notification_msg; ?>">                              
                                </div>
                            </div>
                    
                            <div class="form-group">
                                <label class="form-label">Notification Area URL</label>
                                <span style="color: red">*</span>
                            
                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="notification_area_url" class="form-control" type="text" name="notification_area_url" value="<?php echo $notification->notification_area_url; ?>">                              
                                </div>
                            </div>
                    
                            <input id="notification_id" class="form-control" type="hidden" name="notification_id" value="<?php echo $notification->notification_id; ?>" > 

                            <div class="form-actions">
                                <div class="pull-right">
                                    <button class="btn btn-primary btn-cons" type="submit">
                                        <i class="icon-ok"></i>
                                        Save
                                    </button>
                                    <button class="btn btn-white btn-cons" type="button">Cancel</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>