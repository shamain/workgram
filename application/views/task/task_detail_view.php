<div class="row">
    <div class="col-md-12">
        <div class="grid solid yellow">
            <div class="grid-title">
                <h4> Created by <?php echo $task->employee_fname . ' ' . $task->employee_lname; ?> on <?php echo date('Y-m-d', strtotime($task->added_date)) . ' at ' . date('H:i:s', strtotime($task->added_date)) ?> &nbsp;&nbsp;</h4>
                <a class="right" style="cursor: pointer;float: right" data-toggle="modal" data-target="#edit_task_modal"><i class="fa fa-pencil-square-o"></i></a>
            </div>
            <div class="grid-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <a href="<?php echo site_url(); ?>/task/task_controller/view_task_for_projects/<?php echo $task->project_id; ?>"><span class="semi-bold"><?php echo ucfirst($task->task_name); ?></span></a>
                        </h3>
                    </div>         
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p> <?php echo $task->task_description; ?></p>
                    </div>

                    <div class="clearfix"></div>
                    <ul class="my-friends no-margin ">
                        <?php
                        if (!empty($employees_for_task)) {
                            ?>
                            <?php
                            foreach ($employees_for_task as $employee) {
                                ?>
                                <li>
                                    <div class="profile-pic">
                                        <?php if ($employee->employee_avatar == '') {
                                            ?>
                                            <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small2x.jpg" width="35" height="35" />
                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>" width="35" height="35" />
                                            <?php
                                        }
                                        ?>

                                    </div>
                                </li>
                                <?php
                            }
                        }
                        ?>
                    </ul>
                    <br>
                    <div class="pull-right">
                        <span class="semi-bold">
                            Hey Guys ! we have  
                        </span>
                        <span class="label label-important">
                            <?php
                            if ($remain_dates != '') {
                                echo $remain_dates;
                            }
                            ?>
                        </span>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div class="row">
    <div class="col-md-10 col-vlg-7">
        <ul class="cbp_tmtimeline" id="task_comments">
            <?php
            foreach ($task_comments as $task_comment) {
                ?>
                <li>
                    <time class="cbp_tmtime" datetime="2013-04-10 18:30">
                        <span class="date">today</span>
                        <span class="time">10:05 <span class="semi-bold">am</span></span>
                    </time>
                    <div class="cbp_tmicon primary animated bounceIn"> <i class="fa fa-comments"></i> </div>
                    <div class="cbp_tmlabel">
                        <div class="p-t-10 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
                            <h4 class="inline m-b-5"><span class="text-success semi-bold"><?php echo $task_comment->employee_fname . " " . $task_comment->employee_lname; ?></span> </h4>
                            <div class="muted">Commented on - <?php echo date('d M Y h:i a', strtotime($task_comment->added_date)) ?></div>
                            <div class="m-t-5 dark-text">
                                <h3 > 
                                    <?php echo $task_comment->comment; ?>
                                </h3>
                            </div>
                        </div>
                        <div class="clearfix"></div>

                    </div>
                </li>
                <?php
            }
            ?>


            <li>
                <time class="cbp_tmtime" datetime="<?php echo date("Y-m-d H:i:s"); ?>">
                    <span class="date">today</span>
                    <span class="time"><span class="animate-number" data-value="<?php echo date("h"); ?>" data-animation-duration="600"></span>:<span class="animate-number" data-value="<?php echo date("i"); ?>" data-animation-duration="600"></span> <span class="semi-bold"><?php echo date("a"); ?></span></span>
                </time>
                <div class="cbp_tmicon animated bounceIn">
                    <div class="user-profile">
                        <?php if ($this->session->userdata('EMPLOYEE_PROPIC') == '') { ?>

                            <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar2x.jpg" width="35" height="35" />

                        <?php } else { ?>
                            <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" width="35" height="35" />

                        <?php } ?> 

                    </div>
                </div>
                <div class="cbp_tmlabel">
                    <div class="p-t-10 p-l-30 p-r-20 p-b-20 xs-p-r-10 xs-p-l-10 xs-p-t-5">
                        <div class="clearfix"></div><br>
                        <div class="inline" style="width:100%">
                            <div class="input-group transparent ">
                                <input class="form-control" type="text" placeholder="Write a comment" id="employe_task_comment" onkeypress="task_comment_enter_btn_trgr(event);">
                                <input type="hidden" name="task_id" id="task_id" value="<?php echo $task->task_id; ?>"/>
                                <input type="hidden" name="employee_code" id="employee_code" value="<?php echo $this->session->userdata('EMPLOYEE_CODE'); ?>"/>
                                <span class="input-group-addon">
                                    <i class="fa fa-camera"></i>
                                </span>
                            </div>
                        </div>
                        <div class="clearfix"></div>
                    </div>

                    <div class="clearfix"></div>

                </div>
            </li>
        </ul>
    </div>
</div>


<div class="modal fade" id="edit_task_modal" tabindex="-1" role="dialog" aria-labelledby="edit_task_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit_task_form" name="edit_task_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_task_modalLabel" class="semi-bold text-white">It's a new task </h4>
                    <p class="no-margin text-white">Include task details here.</p>
                    <br>
                </div>
                <div class="modal-body">
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Task</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="task_name" class="form-control" type="text" name="task_name" value=" <?php echo $task->task_name; ?>">                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-3">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="right">                                       
                                <i class=""></i>
                                <textarea id="task_description" class="form-control" type="text" name="task_description" rows="10"><?php echo $task->task_description; ?></textarea>                        
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Deadline</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right input-append primary date  no-padding" id="task_deadline_dpicker">                                       
                                <i class=""></i>

                                <input class="form-control" type="text" id="task_deadline" name="task_deadline" readonly="true" value="<?php echo $task->task_deadline; ?>">
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
                                <label class="form-label" id="lblnotified">Skill Categories for Task</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>

                                <select rows="2" name="task_cats_add[]" id="task_cats_add" style="width: 100%;" multiple="yes" class="select2 form-control">
                                    <?php foreach ($skill_cats as $skill_cat) { ?>
                                        <option value="<?php echo $skill_cat->skill_cat_code; ?>"><?php echo $skill_cat->skill_cat_name; ?></option> 
                                    <?php } ?> 
                                </select>
                                <br><br>
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label" id="lblnotified">Assign Users</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>

                                <select rows="2" name="task_users[]" id="task_users" style="width: 100%;" multiple="yes" class="select2 form-control">
                                    <?php foreach ($employees as $employee) { ?>
                                        <option value="<?php echo $employee->employee_code; ?>"><?php echo $employee->employee_fname, ' ', $employee->employee_lname; ?></option> 
                                    <?php } ?> 
                                </select>
                                <br><br>
                            </div>
                        </div>
                    </div>

                    <!--                    <div class="row form-row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Priority</label>
                                                    <span style="color: red">*</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-with-icon  right">                                       
                                                    <i class=""></i>
                                                    <input id="task_priority" class="form-control" type="text" name="task_priority">                              
                                                </div>
                                            </div>
                                        </div>
                    
                                        <div class="row form-row">
                                            <div class="col-md-5">
                                                <div class="form-group">
                                                    <label class="form-label">Progress</label>
                                                    <span style="color: red">*</span>
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="input-with-icon  right">                                       
                                                    <i class=""></i>
                                                    <input id="task_progress" class="form-control" type="text" name="task_progress">                              
                                                </div>
                                            </div>
                                        </div>-->

                </div>
                <div id="edit_task_msg" class="form-row"> </div>
                <input id="task_id" class="form-control" type="hidden" name="task_id" value="<?php echo $task->task_id; ?>">                              
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>
    </div>
</div>


<script type="text/javascript">
                                    $('#project_parent_menu').addClass('active open');
</script>