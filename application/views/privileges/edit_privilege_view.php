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
                    <form id="add_privilege_form" name="add_privilege_form">

                        <div class="form-group">
                            <label class="form-label">Master Privilege</label>
                            <span style="color: red">*</span>

                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <select name="master_privilege_code" id="master_privilege_code" class="select2 form-control"  >
                                    <?php foreach ($master_privileges as $master_privilege) {
                                        ?> 
                                        <option value="<?php echo $master_privilege->privilege_master_code; ?>"><?php echo $master_privilege->master_privilege; ?></option>
                                    <?php } ?>
                                </select>                               
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Privilege</label>
                            <span style="color: red">*</span>

                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="privilege" class="form-control" type="text" name="privilege">                              
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="form-label">Privilege Description</label>
                            <span style="color: red">*</span>

                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="privilege_desc" class="form-control" type="text" name="privilege_desc">                              
                            </div>
                        </div>


                        <div class="form-group">
                            <label class="form-label">Human Friendly Privilege Code</label>
                            <span style="color: red">*</span>

                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="privilege_hf" class="form-control" type="text" name="privilege_hf">                              
                            </div>
                        </div>

                        <div id="msg" class="form-row"> </div>
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
