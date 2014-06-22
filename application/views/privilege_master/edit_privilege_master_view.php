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
                                        <input id="master_privilege" class="form-control" type="text" name="master_privilege" value="<?php echo $privilege_master->master_privilege; ?>" >                              
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
                                        <input id="master_privilege_desc" class="form-control" type="text" name="master_privilege_desc" value="<?php echo $privilege_master->master_privilege_description; ?>">                              
                                    </div>
                                </div>
                            </div>

                            <div class="row form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Assign For</label>
                                        <span style="color: red">*</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-with-icon  right">                                       
                                        <i class=""></i>
                                        <select name="assign_for" id="assign_for" class="select2 form-control"  >
                                            <option value="1" <?php if($this->config->item('ADMIN') == 1){?> selected="true" <?php } ?>>Admin</option>
                                            <option value="2" <?php if($this->config->item('COMPANY_OWNER') == 2){?> selected="true" <?php } ?>>Company Owner</option>
                                            <option value="3" <?php if($this->config->item('EMPLOYEE') == 3){?> selected="true" <?php } ?>>Employee</option>
                                            <option value="4" <?php if($this->config->item('ALL') == 4){?> selected="true" <?php } ?>>All</option>

                                        </select>                              
                                    </div>
                                </div>
                            </div>

                            <div id="edit_privilege_master_msg" class="form-row"> </div>

                            <input type="hidden" id="privilege_master_code" name="privilege_master_code" value="<?php echo $privilege_master->privilege_master_code; ?>"/>

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
