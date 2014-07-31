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
                    <img src="<?php echo base_url(); ?>application_resources/img/cover_pic.png" alt="">
                </div>
            </div>
            <div class="tiles white">

                <div class="row">
                    <div class="col-md-3 col-sm-3" >
                        <div class="user-profile-pic profile-upload-pic" id="pro_pic">	
<!--                            <img width="69" height="69" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/avatar2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/avatar.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/avatar.jpg" alt="">-->
                            <?php if ($this->session->userdata('EMPLOYEE_PROPIC') == '') { ?>

                                <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar2x.jpg" width="69" height="69" />

                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" width="69" height="69" />

                            <?php } ?> 
                                
                            <span class="hover_edit fa fa-camera">
                            <!--<i class="fa fa-camera"></i>-->
                            </span>
                        </div>


                        <!-- js for pro_pic-->

                        <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
                        <script src="<?php echo base_url(); ?>application_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>


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
                        
                        <div id="upload2">
                            <button type="button" class="btn btn-primary btn-small" id="browse2"><i class="  fa fa-camera"></i></button>
                        </div>
                        
                        <div id="sta2"><span id="status2" ></span></div>
                        


                        <div class="user-mini-description">
                            <h3 class="text-success semi-bold">
                                2548
                            </h3>
                            <h5>Followers</h5>
                            <h3 class="text-success semi-bold">
                                457
                            </h3>
                            <h5>Following</h5>
                        </div>
                    </div>

                    <!-- loading employee's details-->

                    <div class="col-md-5 user-description-box  col-sm-5">


                        <h4 class="semi-bold no-margin"> <i class="fa fa-user"></i>   <?php echo ucfirst($employee_detail->employee_fname) ?><span class="semi-bold"><?php echo ucfirst($employee_detail->employee_lname) ?></span>;</h4>
                        <br>
                        <h6 class="no-margin"><i class="fa fa-sort-numeric-asc"></i>   <?php echo ($employee_detail->employee_no) ?></h6>
                        <br>
                        <h6 class="no-margin"><i class="fa fa-envelope"></i>    <?php echo ucfirst($employee_detail->employee_email) ?></h6>
                        <br>
                        <h6 class="no-margin"><i class="fa fa-suitcase"></i>   <?php echo ucfirst($employee_detail->employee_type) ?></h6>
                        <br>
                        <h6 class="no-margin"><i class="fa fa-smile-o"></i>   <?php echo ($employee_detail->employee_bday) ?></h6>
                        <br>
                        <h6 class="no-margin"><i class="fa fa-mobile"></i>   <?php echo ($employee_detail->employee_contact) ?></h6>
                        <br>
                        <h6 class="no-margin"><i class="fa fa-clock-o"></i>   <?php echo ucfirst($employee_detail->employee_contract) ?></h6>



                        <a href="<?php echo site_url(); ?>/employee/employee_profile_controller/edit_employee_profile/<?php echo $employee_detail->employee_code; ?>">
                            <i class="fa fa-pencil"></i>
                        </a>                  



<!--                    <h6 class="no-margin"><?php echo ucfirst($employee_detail->company_code) ?></h6>
<h6 class="no-margin"><?php echo ($employee_detail->del_ind) ?></h6>
<h6 class="no-margin"><?php echo ucfirst($employee_detail->added_by) ?></h6>
<h6 class="no-margin"><?php echo ($employee_detail->added_date) ?></h6>
<h6 class="no-margin"><?php echo ucfirst($employee_detail->updated_by) ?></h6>
<h6 class="no-margin"><?php echo ($employee_detail->updated_date) ?></h6>-->
                    </div>
                    
              
            
                    <div class="col-md-3  col-sm-3">
                        <h5 class="normal">Friends ( <span class="text-success">1223</span> )</h5>
                        <ul class="my-friends">
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/d2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/d.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/d.jpg" alt="">
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/c2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/c.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/c.jpg" alt="">
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/h2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/h.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/h.jpg" alt="">
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/avatar_small2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/avatar_small.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/avatar_small.jpg" alt=""> 
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/e2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/e.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/e.jpg" alt=""> 
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/b2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/b.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/b.jpg" alt=""> 
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/h2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/h.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/h.jpg" alt="">
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/d2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/d.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/d.jpg" alt="">
                                </div>
                            </li>							
                        </ul>	
                        <div class="clearfix"></div>
                        
                            <!-- skill graph-->
                <div id="donut-example" style="height:200px;">
                    </div>
                    </div>				
                </div>
                
                <!-- load tasks-->     
              
              
              <div class="grid-body ">
                <table class="table" id="employee_Profile_table" >
                    <thead>
                        <tr>                          
                            <th>Project ID</th>
                            <th>Task ID</th>
                            <th>Task Name</th>
                            <th>Deadline</th>
                            <th>Progress</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($employee_tasks as $task) {
                            ?> 
                                <td><?php echo $employee_tasks->project_id; ?></td>
                                <td><?php echo $employee_tasks->task_id; ?>  </td>
                                <td><?php echo $employee_tasks->task_name; ?></td>
                                <td><?php echo $employee_tasks->task_deadline; ?>  </td>
                                <td><?php echo $employee_tasks->task_progress; ?>  </td>

                       <?php } ?>    
                    </tbody>
                </table>
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
<!-- chart-->
<div class="row ">
    <div class="col-md-12">
        <div class="row tiles-container spacing-bottom tiles grey">
            <div class="tiles white col-md-8 col-sm-8 no-padding">
                <div class="tiles-body">
                    <div class="row">
                        <div class="col-md-6 col-sm-6">
                            <div class="mini-chart-wrapper">
                                <div class="chart-details-wrapper">
                                    <div class="chartname"> New Orders </div>
                                    <div class="chart-value"> 17,555 </div>
                                </div>
                                <div class="mini-chart">
                                    <div id="mini-chart-orders_2"></div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-6 col-sm-6">
                            <div class="mini-chart-wrapper">
                                <div class="chart-details-wrapper">
                                    <div class="chartname"> My Balance </div>
                                    <div class="chart-value"> $17,555 </div>
                                </div>
                                <div class="mini-chart">
                                    <div id="mini-chart-other_2" ></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div id="profile_skill_chart" class="ricksaw" ></div>
                <div class="clearfix"></div>
            </div>
            <div class="col-md-4 col-sm-4 no-padding">
                <div class="tiles grey ">
                    <div class="tiles white no-margin">
                        <div class="tiles-body">
                            <div class="tiles-title blend"> OVERALL VIEWS </div>
                            <div class="heading"> <span data-animation-duration="1000" data-value="432852" class="animate-number">0</span> </div>
                            44% higher <span class="blend">than last month</span> </div>
                    </div>
                    <div id="legend_2"></div>
                </div>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#employee_parent_menu').addClass('active open');
    $(document).ready(function() {

        loadSampleChartDemo2();
    });

</script>







