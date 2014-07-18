<div class="row">
    <div class="col-md-6">
        <div class=" tiles white col-md-12 no-padding">
            <div class="tiles green cover-pic-wrapper">						
                <div class="overlayer bottom-right">
                    <div class="overlayer-wrapper">
                        <div class="padding-10 hidden-xs">
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
                                                $('<div></div>').appendTo('#files').html('<img src="<?PHP echo base_url(); ?>uploads/employee_avatar/' + response + '"  /><br />');
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
                        <div class="user-profile-pic">	
<!--                            <img width="69" height="69" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/avatar2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/avatar.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/avatar.jpg" alt="">-->
                            <?php if ($this->session->userdata('EMPLOYEE_PROPIC') == '') { ?>

                                <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar2x.jpg" width="69" height="69" />

                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" width="69" height="69" />

                            <?php } ?> 
                            
                        </div>
                        
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

                                                $('#files2').html("");
                                                $('<div></div>').appendTo('#files2').html('<img src="<?PHP echo base_url(); ?>uploads/employee_avatar/' + response + '"  /><br />');
                                                picFileName = response;
                                                document.getElementById('image2').value = file;
                                                document.getElementById('emp_image').value = response;
                                            } else {
                                                $('<div></div>').appendTo('#files2').text(file).addClass('error');
                                            }
                                        }
                                    });

                                });




                            </script>
                        
                        
                                <div id="upload2">
                                    <button type="button" class="btn btn-primary btn-small" id="browse2"><i class="fa fa-camera"></i></button>

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
    
    
<div id="donut-example" style="height:200px;">
    <svg height="200" version="1.1" width="230" xmlns="http://www.w3.org/2000/svg" style="overflow: hidden; position: relative;">
    <desc style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></desc>
    <defs style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></defs>
    <path fill="none" stroke="#60bfb6" d="M115,160A60,60,0,0,0,171.95770043472734,118.86320124442962" stroke-width="2" opacity="1" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 1;"></path>
    <path fill="#60bfb6" stroke="#ffffff" d="M115,163A63,63,0,0,0,174.8055854564637,119.8063613066511L200.436550652091,128.29480186664443A90,90,0,0,1,115,190Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
    <path fill="none" stroke="#91cdec" d="M171.95770043472734,118.86320124442962A60,60,0,0,0,61.20860892026032,73.42019101448432" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
    <path fill="#91cdec" stroke="#ffffff" d="M174.8055854564637,119.8063613066511A63,63,0,0,0,58.51903936627333,72.09120056520852L38.79552930370211,62.345270603852775A85,85,0,0,1,195.69007561586372,126.72286842960862Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
    <path fill="none" stroke="#eceff1" d="M61.20860892026032,73.42019101448432A60,60,0,0,0,114.98115044438853,159.99999703911863" stroke-width="2" opacity="0" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); opacity: 0;"></path>
    <path fill="#eceff1" stroke="#ffffff" d="M58.51903936627333,72.09120056520852A63,63,0,0,0,114.98020796660795,162.99999689107455L114.97329646288375,184.99999580541805A85,85,0,0,1,38.79552930370211,62.345270603852775Z" stroke-width="3" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></path>
    <text x="115" y="90" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" font-size="15px" font-weight="800" transform="matrix(0.9558,0,0,0.9558,5.0885,4.3805)" stroke-width="1.0462962962962963" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: 800; font-size: 15px; line-height: normal; font-family: Arial;">
    <tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);">UI Design</tspan></text>
    <text x="115" y="110" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" font-size="14px" transform="matrix(1.25,0,0,1.25,-28.75,-25.5)" stroke-width="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-family: Arial;">
    <tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></tspan></text>
    <text x="115" y="110" text-anchor="middle" font="10px &quot;Arial&quot;" stroke="none" fill="#000000" font-size="14px" transform="matrix(1.25,0,0,1.25,-28.75,-25.5)" stroke-width="0.8" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0); text-anchor: middle; font-style: normal; font-variant: normal; font-weight: normal; font-size: 14px; line-height: normal; font-family: Arial;">
    <tspan dy="5" style="-webkit-tap-highlight-color: rgba(0, 0, 0, 0);"></tspan></text>
    
    </svg></div>
    

    <div class="col-md-6">
        <div class="row">
            <div class="tiles white col-md-12  no-padding">			
                <div class="tiles-body">
                    <h5 ><span class="semi-bold">You many also know</span>&nbsp;&nbsp; <a href="#" class="text-info normal-text">view more</a></h5>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="friend-list">
                                <div class="friend-profile-pic">
                                    <div class="user-profile-pic-normal">
                                        <img width="35" height="35" src="<?php echo base_url(); ?>application_resources/img/profiles/d.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/d.jpg" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/d2x.jpg" alt="">
                                    </div>
                                </div>
                                <div class="friend-details-wrapper">
                                    <div class="friend-name">
                                        Johne Drake
                                    </div>
                                    <div class="friend-description">
                                        James Smith in commman
                                    </div>
                                </div>
                                <div class="action-bar pull-right">
                                    <button class="btn btn-primary" type="button">Add</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="friend-list">
                                <div class="friend-profile-pic">
                                    <div class="user-profile-pic-normal">
                                        <img width="35" height="35" src="<?php echo base_url(); ?>application_resources/img/profiles/b.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/b.jpg" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/b2x.jpg" alt="">
                                    </div>
                                </div>
                                <div class="friend-details-wrapper">
                                    <div class="friend-name">
                                        Johne Drake
                                    </div>
                                    <div class="friend-description">
                                        James Smith in commman
                                    </div>
                                </div>
                                <div class="action-bar pull-right">
                                    <button class="btn btn-primary" type="button">Add</button>
                                </div>
                                <div class="clearfix"></div>
                            </div>	
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <br>
        <div class="row">
            <div class="col-md-12 no-padding">
                <div class="tiles white">
                    <textarea rows="3"  class="form-control user-status-box post-input"  placeholder="Whats on your mind?"></textarea>
                </div>
                <div class="tiles grey padding-10">
                    <div class="pull-left">
                        <button class="btn btn-default btn-sm btn-small" type="button"><i class="fa fa-camera"></i></button>
                        <button class="btn btn-default btn-sm btn-small" type="button"><i class="fa fa-map-marker"></i></button>
                    </div>
                    <div class="pull-right">
                        <button class="btn btn-primary btn-sm btn-small" type="button">POST</button>
                    </div>					
                    <div class="clearfix"></div>
                </div>										
            </div>
        </div>
        <br>
        <br>
        <div class="row">
            <div class="post col-md-12">
                <div class="user-profile-pic-wrapper">
                    <div class="user-profile-pic-normal">
                        <img width="35" height="35" src="<?php echo base_url(); ?>application_resources/img/profiles/c.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/c.jpg" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/c2x.jpg" alt="">
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
                                <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/e2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/e.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/e.jpg" alt="">
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
                                <img width="35" height="35" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/b2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/b.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/b.jpg" alt="">
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
                        <div class="row-fluid">
                            <div class="input-append success date span12">
                                <input type="text" class="span11">
                                <span class="add-on"><span class="arrow"></span><i class="fa fa-th"></i></span>
                            </div>
                        </div>
                    </div>
                </div>	
                <div class="clearfix"></div>						
            </div>
        </div>
    </div>
</div>



