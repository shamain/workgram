<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div id="work_snap_filters" class="pull-left">

        <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Employee</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu" id="employee_ul">
                <li class="active" data-filter="all" data-dimension="employee"><a href="#">All</a></li>
                <?php
                foreach ($employees as $employee) {
                    ?>
                    <li data-filter = "<?php echo $employee->employee_code; ?>" data-dimension = "employee"><a href = "#"><?php echo ucfirst($employee->employee_fname . ' ' . $employee->employee_lname); ?></a></li>
                <?php }
                ?>
            </ul>
        </div>
        <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Project</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu" id="project_ul">
                <li class="active" data-filter="all" data-dimension="project"><a href="#">All</a></li>

                <?php
                foreach ($projects as $project) {
                    ?>
                    <li data-filter = "<?php echo $project->project_id; ?>" data-dimension = "project"><a href = "#"><?php echo ucfirst($project->project_name); ?></a></li>
                <?php }
                ?>


            </ul>
        </div>
        <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Task</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu" id="tasks_ul">
                <li class="active" data-filter="all" data-dimension="tasks"><a href="#">All</a></li>
                <?php
                foreach ($tasks as $task) {
                    ?>
                    <li data-filter = "<?php echo $task->task_id; ?>" data-dimension = "tasks"><a href = "#"><?php echo ucfirst($task->task_name); ?></a></li>
                <?php }
                ?>
            </ul>
        </div>
    </div>
    <button id="search_screenshot_btn" style="margin-left:12px" name="search_screenshot_btn" class="btn btn-primary"><i class="fa fa-search"></i></button>
    <button class="btn btn-primary" style="margin-left:12px" background-color="#f35958"  id="add_inquiry_btn" data-toggle="modal" data-target="#add_inquiry_modal">Add Inquiry</button>
    <div class="pull-right">
        <div class="btn-group" data-toggle="buttons-radio">
            <button id="ToList" class="btn btn-primary active" type="button">
                <i class="fa fa-th-list"></i>
            </button>
            <button id="ToGrid" class="btn btn-primary" type="button">
                <i class="fa fa-th-large"></i>
            </button>
        </div>
    </div>
    <div class="clearfix"></div>

    <div id="Parks" class="just list">
        <div class="list_header">

            <div id="sortByName" class="meta name employee active desc">
                Employee
                <span class="sort anim150 asc" data-order="desc" data-sort="data-name"></span>
                <span class="sort anim150 desc active" data-order="asc" data-sort="data-name"></span>
            </div>
            <div class="meta project  ">
                Project
            </div>
            <div class="meta rec tasks">
                Task
            </div>

            <div class="meta area">
                Date 

            </div>
            <div class="meta rec">
                <div class="checkbox check-primary checkbox-circle">
                    <input id="checkbox9" type="checkbox" checked="checked"  class="main_sc_chk_box">
                    <label for="checkbox9">Mark</label>
                </div>
<!--                <a href="<?php echo site_url(); ?>/screenshot/screenshot_controller/edit_screenshot_view/<?php echo $employee_screenshot_id->worker_id; ?>">
                    <i class="fa fa-pencil"></i>
                </a>-->

            </div>

        </div>



        <div id="filter_result_div">
            <ul>
                <?php
                foreach ($my_screen_shots as $my_screen_shot) {
                    ?>
                    <li class="mix northeast camping climbing fishing swimming" data-name="Acadia" data-area="47452.80">

                        <div class="meta name employee">
                            <div class="img_wrapper"> <img src="<?php echo base_url(); ?>uploads/screenshots/<?php echo $user_name . '/' . $my_screen_shot->worker_shot_name; ?>" alt="" /> </div>
                            <div class="titles">
                                <h2><?php echo $my_screen_shot->project_name; ?></h2>
                                <p><em><?php echo $my_screen_shot->employee_fname . ' ' . $my_screen_shot->employee_lname; ?></em></p>
                            </div>
                        </div>
                        <div class="meta project">
                            <p><?php echo $my_screen_shot->task_name; ?></p>
                        </div>
                        <div class="meta tasks">
                            <ul>
                                <li>Camping</li>
                                <li>Climbing</li>
                                <li>Fishing</li>
                                <li>Swimming</li>
                            </ul>
                        </div>


                        <div class="meta rec">
                            <div class="checkbox check-primary checkbox-circle">
                                <input id="checkbox9" type="checkbox" class="sc_chk_box">
                                <input type="hidden" value="0" name="chk_boxes[]">
                                <input type="hidden" value="<?php echo $my_screen_shot->worker_id; ?>" >
                                <label for="checkbox9"></label>

                            </div>
                        </div>
                    </li>
                <?php } ?>
                <!-- END LIST OF PARKS -->
            </ul>
        </div>

    </div>
</div>



<div class="modal fade" id="add_inquiry_modal" tabindex="-1" role="dialog" aria-labelledby="add_inquiry_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_inquiry_form" name="add_inquiry_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-users fa-4x"></i>
                    <h4 id="add_inquiry_modalLabel" class="semi-bold text-white">Add Inquiry</h4>
                    <!--<p class="no-margin text-white">Choose a Skill category and make this a child of it.</p>-->
                    <br>
                </div>
                <div class="modal-body">
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Inquiry Name</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="inquiry_name" class="form-control" type="text" name="inquiry_name">                              
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
                                <textarea id="inquiry_description" class="form-control" type="text" name="inquiry_description">    </textarea>                          
                            </div>
                        </div
                    </div>
                </div>

        </div>
        <div id="add_inquiry_msg" class="form-row"> </div>
        <div class="modal-footer">
            <button type="submit" class="btn btn-primary">Save</button>
            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>

        </form>
    </div>
</div>
</div>
<script type="text/javascript">
    $('#snap_shot_parent_menu').addClass('active open');
</script>
