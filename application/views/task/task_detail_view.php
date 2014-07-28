<div class="row">
    <div class="col-md-12">
        <div class="grid solid yellow">
            <div class="grid-title">
                <h4> Created by <?php echo $task->employee_fname . ' ' . $task->employee_lname; ?> on <?php echo date('Y-m-d', strtotime($task->added_date)) . ' at ' . date('H:i:s', strtotime($task->added_date)) ?> &nbsp;&nbsp;</h4>

            </div>
            <div class="grid-body">
                <div class="row">
                    <div class="col-md-12">
                        <h3>
                            <span class="semi-bold"><?php echo ucfirst($task->task_name); ?></span>
                        </h3>
                    </div>         
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <p> <?php echo $task->task_descrption; ?></p>
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
                        } ?>
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
        <ul class="cbp_tmtimeline">
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
                                <input class="form-control" type="text" placeholder="Write a comment">
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
