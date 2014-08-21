<h3>Employees  at <span class="semi-bold"><?php echo ucfirst($company); ?></span></h3>

<div class="row">

    <?php
    foreach ($employees as $employee) {
        if($employee->employee_code != $this->session->userdata('EMPLOYEE_CODE')) {
            ?>
            <div class="col-md-3 col-sm-5">
                <div class="col-md-12 m-b-20">
                    <div class="widget-item narrow-margin">
                        <div class="controller overlay right"> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
                        <div class="tiles green " style="max-height:345px">
                            <div class="tiles-body">
                                <h3 class="text-white m-t-20 m-b-10 m-r-20">Current Project<span class="semi-bold">Niharathi Web</span> </h3>
                                <div class="overlayer bottom-right fullwidth">
                                    <div class="overlayer-wrapper">
                                        <div class=" p-l-20 p-r-20 p-b-20 p-t-20">
                                            <div class="pull-right"> <a href="#" class="hashtags transparent"> #Art Design </a> </div>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                                <br>
                            </div>
                        </div>
                        <div class="tiles white ">
                            <div class="tiles-body">
                                <div class="row">
                                    <div class="user-comment-wrapper pull-left">
                                        <div class="profile-wrapper"> 
                                            <!--<img src="<?php echo base_url(); ?>application_resources/img/profiles/avatar_small.jpg" alt="" data-src="<?php echo base_url(); ?>application_resources/img/profiles/avatar_small.jpg" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/avatar_small2x.jpg" width="35" height="35">--> 
                                            <?php if ($employee->employee_avatar == '') { ?>

                                                <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small2x.jpg" width="35" height="35" />

                                            <?php } else { ?>
                                                <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>" width="35" height="35" />

                                            <?php } ?> 
                                        </div>
                                        <div class="comment">
                                            <div class="user-name text-black bold"> <?php echo ucfirst($employee->employee_fname); ?> <span class="semi-bold"><?php echo ucfirst($employee->employee_lname); ?></span> </div>
                                            <div class="preview-wrapper">@ workgram </div>
                                        </div>
                                        <div class="clearfix"></div>
                                    </div>
                                    <div class="pull-right m-r-20"> <span class="bold text-black small-text">24m</span> </div>
                                    <div class="clearfix"></div>
                                    <div class="p-l-15 p-t-10 p-r-20">
                                        <p>I have made the visuals for nirahathi</p>
                                        <div class="post p-t-10 p-b-10">
                                            <ul class="action-bar no-margin p-b-20 ">
                                                <li><a href="#" class="muted bold"><i class="fa fa-comment  m-r-10"></i>1584</a> </li>
                                                <li><a href="#" class="text-error bold"><i class="fa fa-heart  m-r-10"></i>47k</a> </li>
                                            </ul>
                                            <div class="clearfix"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
    }
    ?>

</div>