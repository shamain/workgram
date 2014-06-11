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
                        <form id="edit_project_form" name="edit_project_form">

                           
                            <div class="form-group">
                                <label class="form-label">Project Name </label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="project_name" class="form-control" type="text" name="project_name" value="<?php echo $project->project_name; ?>">                              
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label">Project Vendor</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="project_vendor" class="form-control" type="text" name="project_vendor" value="<?php echo $project->project_vendor; ?>">                              
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Project Duration</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="project_duration" class="form-control" type="text" name="project_duration" value="<?php echo $project->project_duration; ?>">                              
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Project Deadline</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="project_deadline" class="form-control" type="text" name="project_deadline" value="<?php echo $project->project_deadline; ?>">                              
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Project Description</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="project_description" class="form-control" type="text" name="project_description" value="<?php echo $project->project_description; ?>">                              
                                </div>
                            </div>





                            <div id="edit_project_msg" class="form-row"> </div>

                            <input type="hidden" id="project_id" name="project_id" value="<?php echo $project->project_id; ?>"/>
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



