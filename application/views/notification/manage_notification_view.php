<!--
   Name: W.B.M.C. Fernando
   ID  : IT08003416
-->
<div class="page-title">	
    <h3><b><?php echo $heading; ?></b></h3>		
</div>

<!-- replace URLs with hyperlinks -->
<?php
function replace_urls($text = null) {
    $regex = '/((http|ftp|https):\/\/)?[\w-]+(\.[\w-]+)+([\w.,@?^=%&amp;:\/~+#-]*[\w@?^=%&amp;\/~+#-])?/';
    return preg_replace_callback($regex, function( $m ) {
        $link = $name = $m[0];
        if (empty($m[1])) {
            $link = "http://" . $link;
        }
        return '<a href="' . $link . '" target="_blank" rel="nofollow">' . $name . '</a>';
    }, $text);
}
?>

<!-- Notification Table -->
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a><a href="javascript:;" class="reload"></a> </div>
            </div>

            <div class="grid-body ">
                <table class="table table-hover" id="notification_table">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Notification Message</th>
                            <th>Sent to..</th>
                            <th>URL / description</th>
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
                                <td style="word-break:break-all ;"><?php echo $notification->notification_msg; ?></td>
                                <td style="width:80px"><!-- Sent To column -->
                                    <?php
                                    $dcontent = "<div style='overflow-y: scroll; max-height: 100px'>";
                                    foreach ($notified_users[$i - 1] as $notified_user) {
                                        $dcontent .= '<p>' . $notified_user->employee_fname . ' ' . $notified_user->employee_lname . '</p>';
                                    }
                                    $dcontent .= '</div>';
                                    ?>
                                    <a href="javascript:;" tabindex="0" data-toggle="popover" data-trigger="focus" data-html="true" data-title="notified users" data-content="<?php echo $dcontent; ?>" onmousedown="$(this).popover('toggle')">
                                        <?php
                                        if ($userscount[$i - 1] == count($employees)) {  // check if global notification

                                            echo '<span class="label" style="background-color:rgb(130,190,255); color:black">All users</span>';
                                        } else {
                                            echo '<span class="label" style="background-color:rgb(100,210,100); color:black">' . $userscount[$i - 1] . ' user(s)</span>';
                                        }
                                        ?>
                                    </a>
                                </td>
                                <td style="word-break:break-all ;"><?php echo replace_urls($notification->notification_area_url); ?></td>

                                <td><?php echo $notification->system; ?></td>

                                <td style="width:100px"><?php echo $notification->notification_added_date; ?></td>

                                <td>
                                    <a href="#edit_notification_modal" 
                                       class="open-edit_notification_modal" 
                                       data-toggle="modal" data-id="<?php echo $notification->notification_id; ?>" 
                                       data-msg="<?php echo $notification->notification_msg; ?>" 
                                       data-aurl="<?php echo $notification->notification_area_url; ?>" 
                                       data-sysid="<?php echo $notification->system_id; ?>">
                                        <span class="label label-info">Edit</span>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Notification" onclick="delete_notification(<?php echo $notification->notification_id; ?>)">
                                        <span class="label label-important">Delete</span>
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

<button class="btn btn-primary" style="margin-left:12px" data-toggle="modal" onclick="parent.location='<?php echo site_url(); ?>/notification/notified_users_controller/manage_notified_users/'">View All Notified Users</button>

<!-- Add Notification Modal -->
<div class="modal fade" id="add_notification_modal" tabindex="-1" role="dialog" aria-labelledby="add_notification_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_notification_form" name="add_notification_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_notification_modalLabel" class="semi-bold text-white">Add New Notification</h4>
                    <p class="no-margin text-white">Include notification details here.</p>
                    <br>
                </div>
                
                <div class="modal-body">

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Notification Type</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <div class="radio radio-success">
                                    <input id="nglobal" type="radio" name="ntype" value="global" onclick="notification_type_select(this);">
                                    <label for="nglobal">Global</label>
                                    <input id="nspecific" type="radio" name="ntype" value="specific" checked="checked" onclick="notification_type_select(this);">
                                    <label for="nspecific">Specific</label>
                                </div>       
                            </div>
                        </div>
                    </div>
                    
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
                                <textarea id="notification_msg" name="notification_msg" class="form-control" rows="2" cols="50"></textarea>
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
    				<select name="system_code" id="system_code" class="select2 form-control">
                                    <?php foreach ($systems as $system) { ?>
                                        <option value="<?php echo $system->system_code; ?>" ><?php echo $system->system; ?></option>
                                    <?php } ?>
                                </select>                          
                            </div>
                        </div>
                    </div>
                
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">URL / Description</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <textarea id="notification_area_url" class="form-control" name="notification_area_url" rows="2" cols="50"></textarea>                              
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label" id="lblnotified">Select Users (Send to...)</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                
                                <select rows="2" name="notified_users[]" id="notified_users" style="width: 100%;" multiple="multiple" class="select2" data-msg-required="Select at least one user." data-rule-required="true">
                                    <?php foreach ($employees as $employee) { ?>
                                        <option value="<?php echo $employee->employee_code; ?>"><?php echo $employee->employee_fname, ' ', $employee->employee_lname; ?></option> 
                                    <?php } ?> 
                                </select>
                                <br><br>
                            </div>
                        </div>
                        <button type="button" id="btnclear" onClick="clearSelected();">Clear</button>
                    </div>
                    
                </div>    
                
                <div id="add_notification_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" style="margin-left:100px" class="btn btn-primary">Add</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button></center>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Edit Notification Modal -->
<div class="modal fade" id="edit_notification_modal" tabindex="-1" role="dialog" aria-labelledby="edit_notification_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit_notification_form" name="edit_notification_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="edit_notification_modalLabel" class="semi-bold text-white">Edit Notification</h4>
                    <p class="no-margin text-white">Include notification details here.</p>
                    <br>
                </div>
                
                <div class="modal-body edit-notification">

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
                                <select name="system_id" id="system_id" class="select2 form-control"  >
                                        <?php foreach ($systems as $system) {
                                            ?> 
                                        <option value="<?php echo $system->system_code; ?>"><?php echo $system->system; ?></option>
                                        <?php } ?>
                                </select>      
                            </div>
                        </div>
                    </div>
                    
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
                                <textarea id="notification_msg" name="notification_msg" class="form-control" rows="2" cols="50"></textarea>
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">URL/Description</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
    				<textarea id="notification_area_url" name="notification_area_url" class="form-control" rows="2" cols="50"></textarea>                     
                            </div>
                        </div>
                    </div>
                
                    <input id="notification_id" class="form-control" type="hidden" name="notification_id">
                </div>    
                
                <div id="edit_notification_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" style="margin-left:100px" class="btn btn-primary">Update</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Cancel</button>
                </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#notification_parent_menu').addClass('active open');
</script>
