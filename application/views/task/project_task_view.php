<!--<ul class="breadcrumb">
    <li>
        <p>YOU ARE HERE</p>
    </li>
    <li><a href="#" class="active">Simple Grids</a> </li>
</ul>
<div class="page-title"> <i class="icon-custom-left"></i>
    <h3>Simple Grids - <span class="semi-bold">Portlets</span></h3 >
</div>
-->
<div class="row">

    <div class="col-md-12">
        <div class="grid simple vertical green">
            <div class="grid-title no-border">
                <h4>Project <span class="semi-bold"><?php echo $project->project_vendor; ?></span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a>  </div>
                <span class="label label-important">
                    <?php
                    if ($project->project_end_date == "0000-00-00") {
                        echo 'Not Set';
                    } else {
                        echo date('d M Y', strtotime($project->project_end_date));
                    }
                    ?>
                </span>

            </div>
            <div class="grid-body no-border">
                <div class="row-fluid">
                    <div>
                        <h3><span class="semi-bold"> <?php echo $project->project_name; ?></span></h3>
                        <div class="color-bands green"></div>
                        <div class="color-bands purple"></div>
                        <div class="color-bands red"></div>
                        <div class="color-bands blue"></div>
                        <br>
                        <p><?php echo $project->project_description; ?></p>

                    </div>
                </div>
            </div>
        </div>
    </div>

</div>

<div class="row">
    <?php
    $employee_task_service = new Employee_task_service();

    foreach ($tasks as $task) {
        $employees_for_task = $employee_task_service->get_employees_for_task($task_id);
        ?>
        <div class="col-md-12">
            <div class="grid simple no-border">
                <div class="grid-title no-border descriptive clickable">
                    <h4 class="semi-bold"><?php echo $task->task_name; ?></h4>
                    <p ><span class="text-success bold">Ticket #456</span> - Created on 10/29/13 at 06:33 - Last reply About 1 Month ago by alex&nbsp;&nbsp;
                    <div class="progress progress-danger">
                        <div data-percentage="<?php echo $task->task_progress;?>%" class="bar animate-progress-bar"></div>
                    </div>
                    <?php if ($task->task_status == '0') { ?>
                        <span class="label label-important">0</span>
                    <?php } else { ?>
                        <span class="label label-success">1</span>
                    <?php } ?>
  
                    </p>
                    <div class="actions"> <a class="view" href="javascript:;"><i class="fa fa-search"></i></a> <a class="remove" href="javascript:;"><i class="fa fa-times"></i></a> </div>
                </div>
                
                <div class="grid-body  no-border" style="display:none">
                    <div class="post">
                        <div class="info-wrapper">
                            <div class="info"> 
                                <?php echo $task->task_description; ?>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                        <div class="clearfix"></div>
                        <div class="user-profile-pic-wrapper">
                            <?php foreach ($employees_for_task as $employee) { ?>
                                <div class="user-profile-pic-normal"> 
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>" src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>" alt="">
                                </div>
                            <?php } ?>
                        </div>
                    </div>
                    <br>
                    <div class="form-actions">
                        <div class="post col-md-12">
                            <div class="user-profile-pic-wrapper">
                                <div class="user-profile-pic-normal"> <img width="35" height="35" data-src-retina="assets/img/profiles/c2x.jpg" data-src="assets/img/profiles/c.jpg" src="assets/img/profiles/c.jpg" alt=""> </div>
                            </div>
                            <div class="info-wrapper">
                                <div class="info"> Hi,<br>
                                    <br>
                                    Thank you for reaching us, We are looking into this issue and will update you.<br>
                                    <br>
                                    Alex<br>
                                    <hr>
                                    <p class="small-text">Posted on 10/29/13 at 07:21</p>
                                </div>
                                <div class="form-group">
                                    <label class="form-label"><i class="fa fa-reply"></i>&nbsp;Post a reply</label>
                                    <div class="controls">
                                        <input type="text" class="form-control">
                                    </div>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                            <div class="clearfix"></div>
                        </div>
                    </div>
                </div>
            </div>
        </div>

    <?php } ?>

</div>