<div class="row">
    <div class="col-md-12">
        <div class=" tiles white col-md-12 no-padding">
            <div class="tiles green cover-pic-wrapper">						
                <div class="overlayer bottom-right">
                    <div class="overlayer-wrapper">
                        <div class="padding-10 hidden-xs">

                            <!-- js for cover_pic-->

                            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
                            <script src="<?php echo base_url(); ?>application_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>
                            <script type="text/javascript">

                                $(function() {
                                    var btnUpload = $('#upload');
                                    var status = $('#status');
                                    new AjaxUpload(btnUpload, {
                                        action: '<?PHP echo site_url(); ?>/employee/employee_profile_controller/upload_employee_cover_pic',
                                        name: 'uploadfile',
                                        onSubmit: function(file, ext) {
                                            if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                                // extension is not allowed 
                                                status.text('Only JPG, PNG or GIF files are allowed');
                                                return false;
                                            }
                                            //status.text('Uploading...Please wait');
//                                            $("#files").html("<i id='animate-icon' class='fa fa-spinner fa fa-2x fa-spin'></i>");

                                        },
                                        onComplete: function(file, response) {
                                            //On completion clear the status
                                            //status.text('');
                                            $("#files").html("");
                                            $("#sta").html("");
                                            //Add uploaded file to list
                                            if (response != "error") {

                                                //save new pic in database and session
                                                $.post(site_url + '/employee/employee_profile_controller/update_employee_cover_image', {employee_cover_image: response, employee_code: $('#employee_code').val()}, function(msg)
                                                {

                                                });

                                                $('#files').html("");
                                                $('<div></div>').appendTo('#files').html('<img src="<?PHP echo base_url(); ?>uploads/employee_cover_pics/' + response + '"  /><br />');
                                                picFileName = response;
                                                document.getElementById('image').value = file;
                                                document.getElementById('cover_image').value = response;
                                            } else {
                                                $('<div></div>').appendTo('#files').text(file).addClass('error');
                                            }
                                        }
                                    });

                                });




                            </script>

<!--<button type="button" class="btn btn-primary btn-small"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</button>-->

                            <div id="upload">
                                <button type="button" class="btn btn-primary btn-small" id="browse"><i class="fa fa-camera"></i></button>

                            </div>
                            <div id="sta"><span id="status" ></span></div>
                        </div>
                    </div>
                </div>


                <div id="files">
                    <?php if ($this->session->userdata('EMPLOYEE_COVERPIC') == '') { ?>

                        <img src="<?php echo base_url(); ?>uploads/employee_cover_pics/default_cover_pic.png"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_cover_pics/default_cover_pic.png" data-src-retina="<?php echo base_url(); ?>uploads/employee_cover_pics/default_cover_pic.png"  />

                    <?php } else { ?>
                        <img src="<?php echo base_url(); ?>uploads/employee_cover_pics/<?php echo $this->session->userdata('EMPLOYEE_COVERPIC'); ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_cover_pics/<?php echo $this->session->userdata('EMPLOYEE_COVERPIC'); ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_cover_pics/<?php echo $this->session->userdata('EMPLOYEE_COVERPIC'); ?>"  />

                    <?php } ?>
                </div>
            </div>


            <!--                         js for pro_pic-->

            <script type="text/javascript">

                $(function() {
                    var btnUpload = $('#upload2');
                    var status = $('#status2');
                    new AjaxUpload(btnUpload, {
                        action: '<?PHP echo site_url(); ?>/employee/employee_profile_controller/upload_employee_avatar',
                        name: 'uploadfile2',
                        onSubmit: function(file, ext) {
                            if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                // extension is not allowed 
                                status.text('Only JPG, PNG or GIF files are allowed');
                                return false;
                            }
                            //status.text('Uploading...Please wait');
                            //                                            $("#files").html("<i id='animate-icon' class='fa fa-spinner fa fa-2x fa-spin'></i>");

                        },
                        onComplete: function(file, response) {

                            //On completion clear the status
                            //status.text('');
                            $("#files2").html("");
                            $("#sta2").html("");
                            //Add uploaded file to list
                            if (response != "error") {

                                //save new pic in database and session
                                $.post(site_url + '/employee/employee_profile_controller/update_employee_avatar', {employee_avatar: response, employee_code: $('#employee_code').val()}, function(msg)
                                {

                                });

                                $('#pro_pic').html("");
                                $('<div></div>').appendTo('#pro_pic').html('<img src="<?PHP echo base_url(); ?>uploads/employee_avatar/' + response + '"  /><br />');
                                picFileName = response;
                                document.getElementById('image2').value = file;
                                document.getElementById('employee_avatar').value = response;
                            } else {
                                $('<div></div>').appendTo('#files2').text(file).addClass('error');
                            }
                        }
                    });

                });




            </script>

            <div class="tiles white">

                <div class="row">
                    <div class="col-md-2 col-sm-2" >
                        <div class="user-profile-pic profile-upload-pic" >

                            <div id="upload2">
                                <button type="button"  id="browse2">
                                    <div id="pro_pic" class="profile_custom_image_change">
                                        <?php if ($this->session->userdata('EMPLOYEE_PROPIC') == '') { ?>

                                            <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar2x.jpg" width="69" height="69" />

                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" width="69" height="69" />

                                        <?php } ?> 

                                    </div>

                                    <span class="hover_edit fa fa-camera" >


                                    </span>
                                </button>
                            </div>


                        </div>
                        <input type="hidden" id="employee_code" value="<?php echo $this->session->userdata('EMPLOYEE_CODE'); ?>"/>
                        <div class="user-mini-description">
                            <h3 class="text-success semi-bold">
                                2548
                            </h3>
                            <h5>Performance Point</h5>
                            <h3 class="text-success semi-bold">
                                457
                            </h3>
                            <h5>Projects Done</h5>
                        </div>
                    </div>

                    <!-- loading employee's details-->

                    <div class="col-md-6 user-description-box  col-sm-6">


                        <h3 class="semi-bold no-margin"> <i class="fa fa-user"></i>   <?php echo ucfirst($employee_detail->employee_fname) ?><span class="semi-bold"><?php echo ucfirst($employee_detail->employee_lname) ?></span></h3>
                        <br>
                        <h4 class="no-margin"><i class="fa fa-sort-numeric-asc"></i>   <?php echo ($employee_detail->employee_no) ?></h4>
                        <br>
                        <h4 class="no-margin"><i class="fa fa-envelope"></i>    <?php echo ucfirst($employee_detail->employee_email) ?></h4>
                        <br>
                        <h4 class="no-margin"><i class="fa fa-smile-o"></i>   <?php echo ($employee_detail->employee_bday) ?></h4>
                        <br>
                        <h4 class="no-margin"><i class="fa fa-mobile"></i>   <?php echo ($employee_detail->employee_contact) ?></h4>
                        <br>
                        <h4 class="no-margin"><i class="fa fa-clock-o"></i>   <?php echo ucfirst($employee_detail->employee_contract) ?></h4>



                        <a href="<?php echo site_url(); ?>/employee/employee_profile_controller/edit_employee_profile/<?php echo $employee_detail->employee_code; ?>">
                            <i class="fa fa-pencil"></i>
                        </a>                  

                    </div>

                    <!--friend's images-->

                    <div class="col-md-3  col-sm-3">
                        <h5 class="normal">Friends ( <span class="text-success"><?php echo count($employees) ?></span> )</h5>
                        <ul class="my-friends">

                            <?php
                            foreach ($employees as $employee) {
                                ?>
                                <li>
                                    <div class="profile-pic"> 
                                        <?php if ($employee->employee_avatar == '') { ?>

                                            <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar_small2x.jpg" width="35" height="35" />

                                        <?php } else { ?>
                                            <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $employee->employee_avatar; ?>" width="35" height="35" />

                                        <?php } ?> 
                                    </div>
                                </li>
                            <?php } ?> 

                        </ul>	
                        <div class="clearfix"></div>

                        <!-- skill graph-->
                        <div id="donut-example" style="height:200px;">
                        </div>
                    </div>				
                </div>

                <!-- load tasks-->   


                <div class="row">
                    <div class="col-md-2 col-sm-2"></div>
                    <div class="col-md-6 user-description-box col-sm-6">
                        <div class="row ">
                            <div class="col-md-12 col-sm-4 m-b-20" data-aspect-ratio="true" style="height: 200px;">
                                <div class="live-tile slide ha tiles carousel" data-speed="750" data-delay="1000" data-mode="carousel" style="background-color:#CDEAF1">

                                    <div class="slide-back ha tiles slide active" style="transform: translate(0%, 0%) translateZ(0px); transition: transform 750ms ease; -webkit-transition: transform 750ms ease;background-color:#CDEAF1;color: #12334d !important;">
                                        <?php
                                        $employee_service = new Employee_service();
                                        foreach ($employee_tasks as $task) {

                                            $added_by = $employee_service->get_employee($task->added_by);
                                            ?> 
                                            <div class="p-t-20 p-l-20 p-r-20 p-b-20">
                                                <h4 class="no-margin normal-line-height" ><span class="semi-bold" ><?php echo $task->task_name; ?></span></h4>
                                            </div>
                                            <div class="overlayer bottom-left normalwidth">
                                                <div class="overlayer-wrapper">
                                                    <div class="user-comment-wrapper">
                                                        <div class="profile-wrapper"> <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $added_by->employee_avatar; ?>" alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $added_by->employee_avatar; ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $added_by->employee_avatar; ?>" width="35" height="35"> </div>
                                                        <div class="comment">
                                                            <div class="user-name"><span class="bold"> <?php echo $added_by->employee_fname; ?></span> <?php echo $added_by->employee_lname; ?> </div>
                                                            <p style="color: #12334d !important;">@ <?php echo $task->project_name; ?></p>
                                                        </div>
                                                        <div class="clearfix"></div>
                                                    </div>
                                                </div>
                                            </div>

                                        <?php } ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-3">

                    </div>
                </div>


                <div class="tiles-body">
                    <div class="row">
                        <div class="post col-md-12">
                            <div class="user-profile-pic-wrapper">
                                <div class="user-profile-pic-normal">
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/c2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/c.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/c.jpg" alt="">
                                </div>
                            </div>
                            <div class="info-wrapper">					
                                <div class="username">
                                    <span class="dark-text">John Drake</span> in <span class="dark-text">nervada hotspot</span>	
                                </div>
                                <div class="info">
                                    Great design concepts by <span class="dark-text">John Smith</span> and his crew! Totally owned the WCG!, Best of luck for your future endeavours, 
                                    Special thanks for <span class="dark-text">Jane smith</span> for her motivation ;) 
                                </div>	
                                <div class="more-details">
                                    <ul class="post-links">
                                        <li><a href="#" class="muted">2 Minutes ago</a></li>
                                        <li><a href="#" class="text-info">Collapse</a></li>
                                        <li><a href="#" class="text-info" ><i class="fa fa-reply"></i> Reply</a></li>
                                        <li><a href="#" class="text-warning"><i class="fa fa-star"></i> Favourited</a></li>
                                        <li><a href="#"  class="muted">More</a></li>
                                    </ul>
                                </div>
                                <div class="clearfix"></div>

                                <ul class="action-bar">
                                    <li><a href="#"  class="muted"><i class="fa fa-comment"></i> 1584</a> Comments</li>
                                    <li><a href="#" class="text-error" ><i class="fa fa-heart"></i> 47k</a> likes</li>
                                </ul>
                                <div class="clearfix"></div>
                                <div class="post comments-section">
                                    <div class="user-profile-pic-wrapper">
                                        <div class="user-profile-pic-normal">
                                            <img width="35" height="35" alt="" src="<?php echo base_url(); ?>application_resources/img/profiles/e.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/e.jpg" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/e2x.jpg">
                                        </div>
                                    </div>
                                    <div class="info-wrapper">					
                                        <div class="username">
                                            <span class="dark-text">Thunderbolt</span> 
                                        </div>
                                        <div class="info">
                                            Congrats, <span class="dark-text">John Smith</span>  & <span class="dark-text">Jane Smith</span>
                                        </div>	
                                        <div class="more-details">
                                            <ul class="post-links">
                                                <li><a href="#" class="muted">2 Minutes ago</a></li>
                                                <li><a href="#" class="text-error" ><i class="fa fa-heart"></i> Like</a></li>
                                                <li><a href="#"  class="muted">Details</a></li>
                                            </ul>
                                        </div>

                                    </div>	
                                    <div class="clearfix"></div>						
                                </div>
                                <div class="post comments-section">
                                    <div class="user-profile-pic-wrapper">
                                        <div class="user-profile-pic-normal">
                                            <img width="35" height="35" src="<?php echo base_url(); ?>application_resources/img/profiles/h.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/h.jpg" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/h2x.jpg" alt="">
                                        </div>
                                    </div>
                                    <div class="info-wrapper">					
                                        <div class="username">
                                            <span class="dark-text">Thunderbolt</span> 
                                        </div>
                                        <div class="info">
                                            Congrats, <span class="dark-text">John Smith</span>  & <span class="dark-text">Jane Smith</span>
                                        </div>	
                                        <div class="more-details">
                                            <ul class="post-links">
                                                <li><a href="#" class="muted">2 Minutes ago</a></li>
                                                <li><a href="#" class="text-error" ><i class="fa fa-heart"></i> Like</a></li>
                                                <li><a href="#"  class="muted">Details</a></li>
                                            </ul>
                                        </div>

                                    </div>	
                                    <div class="clearfix"></div>						
                                </div>							
                            </div>	
                            <div class="clearfix"></div>	
                            <br>
                            <br>
                        </div>
                    </div>
                </div>
            </div>
        </div>	
    </div>
</div>




<script type="text/javascript">
    $('#employee_parent_menu').addClass('active open');
    $(document).ready(function() {

        checkEmail();
        phonenumber(employee_contact);

    });


</script>







