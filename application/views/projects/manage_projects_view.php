
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
                            <th>Logo</th>
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
                                <td><?php echo++$i; ?></td>
                                <td><?php echo $project->project_name; ?></td>
                                <td><img src="<?PHP echo base_url(); ?>uploads/project_logo/<?php echo $project->project_logo;?>" alt="" width="50px" height="50px" /></td>
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
                                    <a href="<?php echo site_url(); ?>/task/task_controller/view_task_for_projects/<?php echo $project->project_id; ?>" style="cursor: pointer;"   title="Assign Tasks">
                                        <i class="fa fa-bolt"></i>
                                    </a>
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
                    </div>
                    <div class="row form-row">
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
                    <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
                    <script src="<?php echo base_url(); ?>application_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>
                    <script type="text/javascript">

                                    $(function() {
                                        var btnUpload = $('#upload');
                                        var status = $('#status');
                                        new AjaxUpload(btnUpload, {
                                            action: '<?PHP echo site_url(); ?>/project/project_controller/upload_project_logo',
                                            name: 'uploadfile',
                                            onSubmit: function(file, ext) {
                                                if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                                    // extension is not allowed 
                                                    status.text('Only JPG, PNG or GIF files are allowed');
                                                    return false;
                                                }
                                                //status.text('Uploading...Please wait');
                                                $("#files").html("<i id='animate-icon' class='fa fa-spinner fa fa-2x fa-spin'></i>");

                                            },
                                            onComplete: function(file, response) {
                                                //On completion clear the status
                                                //status.text('');
                                                $("#files").html("");
                                                $("#sta").html("");
                                                //Add uploaded file to list
                                                if (response != "error") {

                                                    $('#files').html("");
                                                    $('<div></div>').appendTo('#files').html('<img src="<?PHP echo base_url(); ?>uploads/project_logo/' + response + '" width="100px" height="100px" /><br />');
                                                    picFileName = response;
                                                    document.getElementById('image').value = file;
                                                    document.getElementById('project_logo').value = response;
                                                } else {
                                                    $('<div></div>').appendTo('#files').text(file).addClass('error');
                                                }
                                            }
                                        });

                                    });




                    </script>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <div id="files" ></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class=" right">                                       
                                <i class=""></i>

                                <div id="upload">

                                    <input type="text" id="image" name="image"/>
                                    <button class="btn btn-default btn-sm btn-small" type="button" id="browse">
                                        <i class="fa fa-camera"></i>
                                    </button>
                                    <label class="form-label">upload project logo</label>
                                    <input type="text" id="project_logo" name="project_logo" style="visibility: hidden" />
                                </div>
                                <div id="sta"><span id="status" ></span></div>



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

<script type="text/javascript">
                                        $('#project_parent_menu').addClass('active open');
</script>
