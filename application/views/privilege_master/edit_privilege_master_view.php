<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a>  <a href="javascript:;" class="reload"></a>  </div>
            </div>
            <div class="grid-body ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form id="edit_privilege_master_form" name="edit_privilege_master_form">

                            <div class="row form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Master Privilege</label>
                                        <span style="color: red">*</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-with-icon  right">                                       
                                        <i class=""></i>
                                        <input id="master_privilege" class="form-control" type="text" name="master_privilege" value="<?php echo $privilege_master->master_privilege; ?>" style="width: 50%">                              
                                    </div>
                                </div>
                            </div>
                            <div class="row form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Master Privilege Description</label>
                                        <span style="color: red">*</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-with-icon  right">                                       
                                        <i class=""></i>
                                        <input id="master_privilege_desc" class="form-control" type="text" name="master_privilege_desc" value="<?php echo $privilege_master->master_privilege_description; ?>" style="width: 50%">                              
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
                                        <select name="system_code" id="system_code" class="select2 form-control"  style="width: 50%">
                                            <?php foreach ($systems as $system) { ?>
                                                <option value="<?php echo $system->system_code; ?>" <?php if ($system->system_code == $privilege_master->system_code) { ?> selected="true" <?php } ?>><?php echo $system->system; ?></option>
                                            <?php } ?>
                                        </select>                                  
                                    </div>
                                </div>
                            </div>

                            <div id="edit_privilege_master_msg" class="form-row"> </div>

                            <input type="hidden" id="privilege_master_code" name="privilege_master_code" value="<?php echo $privilege_master->privilege_master_code; ?>"/>

                            <div class="modal-footer">
                                <button class="btn btn-primary btn-cons" type="submit">
                                    <i class="icon-ok"></i>
                                    Save
                                </button>
                                <button class="btn btn-white btn-cons" type="button">Cancel</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#settings_parent_menu').addClass('active open');
</script>