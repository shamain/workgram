
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
                <table class="table" id="project_table" >
                    <thead>
                        <tr>
                            <th>Project ID</th>
                            <th>Project Name</th>
                            <th>Vendor</th>
                            <th>Duration</th>
                            <th>Deadline</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($projects as $project) {
                            ?> 
                            <tr  id="projects_<?php echo $project->project_id; ?>">
                                <td><?php echo $project->project_name; ?></td>
                                <td><?php echo $project->project_vendor; ?></td>
                                <td><?php echo $project->project_duration; ?></td>
                                <td><?php echo $project->project_deadline; ?></td>
                                <td><?php echo $project->project_description; ?></td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/project/project_controller/edit_project_view/<?php echo $project->project_id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Project" onclick="delete_project(<?php echo $project->project_id; ?>)">
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
</div><!-- Modal -->
<div class="modal fade" id="add_project_modal" tabindex="-1" role="dialog" aria-labelledby="add_project_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_project_form" name="add_project_form">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="icon-credit-card icon-7x"></i>
                    <h4 id="add_project_modalLabel" class="semi-bold">We need your billing info.</h4>
                    <p class="no-margin">You'll be charged $29/Month and get immediate access to new plan </p>
                    <br>
                </div>
                <div class="modal-body">

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">project Name</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="project_name" class="form-control" type="text" name="project_name" >                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">project vendor</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="project_vendor" class="form-control" type="text" name="project_vendor">                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">project duration</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="project_duration" class="form-control" type="text" name="project_duration">                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">project deadline</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="project_deadline" class="form-control" type="text" name="project_deadline">                              
                            </div>
                        </div>
                    </div><div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">project description</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="project_description" class="form-control" type="text" name="project_description">                              
                            </div>
                        </div>
                    </div>

                </div>
                <div id="add_project_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="submit" class="btn btn-primary">Save</button>
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

