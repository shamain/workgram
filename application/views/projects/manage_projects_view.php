
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
                            <th>#</th>
                            <th>Title</th>
                            <th>Founder</th>
                            <th>Deadline</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($projects as $project) {
         
                            ?> 
                            <tr  id="projects_<?php echo $project->project_id; ?>">
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $project->project_name; ?></td>
                                <td><?php echo $project->employee_fname . ' ' . $project->employee_lname; ?></td>
                                <td>
                                    <?php
                                    if ($project->project_end_date == "0000-00-00") {
                                        echo 'Not Set';
                                    } else {
                                        echo date('d M Y', strtotime($project->project_end_date));
                                    }
                                    ?>
                                </td>
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
</div>

<!-- Modal -->
<div class="modal fade" id="add_project_modal" tabindex="-1" role="dialog" aria-labelledby="add_project_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_project_form" name="add_project_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_project_modalLabel" class="semi-bold text-white">It's a new project</h4>
                    <p class="no-margin text-white">Include project details here.</p>
                    <br>
                </div>
                <div class="modal-body">

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Title</label>
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
                                <label class="form-label">Vendor</label>
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
                                <label class="form-label">Start Date</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-with-icon  right input-append primary date  no-padding" id="project_start_date_dpicker">                                       
                                <i class=""></i>

                                <input class="form-control" type="text" id="project_start_date" name="project_start_date" readonly="true" value="<?php echo date("Y-m-d"); ?>">
                                <span class="add-on">
                                    <span class="arrow"></span>
                                    <i class="fa fa-th"></i>
                                </span>
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Dead Line</label>

                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-with-icon  right input-append primary date  no-padding" id="project_end_date_dpicker">                                       
                                <i class=""></i>

                                <input class="form-control" type="text" id="project_end_date" name="project_end_date" readonly="true">
                                <span class="add-on">
                                    <span class="arrow"></span>
                                    <i class="fa fa-th"></i>
                                </span>
                            </div>
                        </div>
                    </div><div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <textarea id="project_description" class="form-control" type="text" name="project_description">    </textarea>                          
                            </div>
                        </div>
                    </div>

                </div>
                <div id="add_project_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

