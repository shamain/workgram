 
<div class="row">
    <div class="col-md-6">
        <div class=" tiles white col-md-12 no-padding">
            <div class="tiles green cover-pic-wrapper">						
                <div class="overlayer bottom-right">
                    <div class="overlayer-wrapper">
                        <div class="padding-10 hidden-xs">									
                            <button type="button" class="btn btn-primary btn-small"><i class="fa fa-check"></i>&nbsp;&nbsp;Following</button> <button type="button" class="btn btn-primary btn-small">Add</button>
                        </div>
                    </div>
                </div>
                <img src="assets/img/cover_pic.png" alt="">
            </div>
            <div class="tiles white">

                <div class="row">
                    <div class="col-md-3 col-sm-3" >
                        <div class="user-profile-pic">	
                            <img width="69" height="69" data-src-retina="assets/img/profiles/avatar2x.jpg" data-src="assets/img/profiles/avatar.jpg" src="assets/img/profiles/avatar.jpg" alt="">
                        </div>
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

                        <h4 class="semi-bold no-margin"><?php echo ucfirst($employee->employee_fname) ?><span class="semi-bold"><?php echo ucfirst($employee->employee_lname); ?></span>;</h4>
                        <h6 class="no-margin"><?php echo ($employee->employee_no) ?></h6>
                        <h6 class="no-margin"><?php echo ucfirst($employee->employee_email) ?></h6>
                        <h6 class="no-margin"><?php echo ucfirst($employee->employee_type) ?></h6>
                        <h6 class="no-margin"><?php echo ($employee->employee_bday) ?></h6>
                        <h6 class="no-margin"><?php echo ($employee->employee_contact) ?></h6>
                        <h6 class="no-margin"><?php echo ucfirst($employee->employee_contract) ?></h6>
                        <h6 class="no-margin"><?php echo ucfirst($employee->company_code) ?></h6>
                        <h6 class="no-margin"><?php echo ($employee->del_ind) ?></h6>
                        <h6 class="no-margin"><?php echo ucfirst($employee->added_by) ?></h6>
                        <h6 class="no-margin"><?php echo ($employee->added_date) ?></h6>
                        <h6 class="no-margin"><?php echo ucfirst($employee->updated_by) ?></h6>
                        <h6 class="no-margin"><?php echo ($employee->updated_date) ?></h6>

                    </div>
                    <div class="col-md-3  col-sm-3">
                        <h5 class="normal">Friends ( <span class="text-success">1223</span> )</h5>
                        <ul class="my-friends">
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="assets/img/profiles/d2x.jpg" data-src="assets/img/profiles/d.jpg" src="assets/img/profiles/d.jpg" alt="">
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="assets/img/profiles/c2x.jpg" data-src="assets/img/profiles/c.jpg" src="assets/img/profiles/c.jpg" alt="">
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="assets/img/profiles/h2x.jpg" data-src="assets/img/profiles/h.jpg" src="assets/img/profiles/h.jpg" alt="">
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="assets/img/profiles/avatar_small2x.jpg" data-src="assets/img/profiles/avatar_small.jpg" src="assets/img/profiles/avatar_small.jpg" alt=""> 
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="assets/img/profiles/e2x.jpg" data-src="assets/img/profiles/e.jpg" src="assets/img/profiles/e.jpg" alt=""> 
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="assets/img/profiles/b2x.jpg" data-src="assets/img/profiles/b.jpg" src="assets/img/profiles/b.jpg" alt=""> 
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="assets/img/profiles/h2x.jpg" data-src="assets/img/profiles/h.jpg" src="assets/img/profiles/h.jpg" alt="">
                                </div>
                            </li>
                            <li><div class="profile-pic"> 
                                    <img width="35" height="35" data-src-retina="assets/img/profiles/d2x.jpg" data-src="assets/img/profiles/d.jpg" src="assets/img/profiles/d.jpg" alt="">
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
                                    <img width="35" height="35" data-src-retina="assets/img/profiles/c2x.jpg" data-src="assets/img/profiles/c.jpg" src="assets/img/profiles/c.jpg" alt="">
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
                                            <img width="35" height="35" alt="" src="assets/img/profiles/e.jpg" data-src="assets/img/profiles/e.jpg" data-src-retina="assets/img/profiles/e2x.jpg">
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
                                            <img width="35" height="35" src="assets/img/profiles/h.jpg" data-src="assets/img/profiles/h.jpg" data-src-retina="assets/img/profiles/h2x.jpg" alt="">
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
                                        <img width="35" height="35" src="assets/img/profiles/d.jpg" data-src="assets/img/profiles/d.jpg" data-src-retina="assets/img/profiles/d2x.jpg" alt="">
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
                                        <img width="35" height="35" src="assets/img/profiles/b.jpg" data-src="assets/img/profiles/b.jpg" data-src-retina="assets/img/profiles/b2x.jpg" alt="">
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
                        <img width="35" height="35" src="assets/img/profiles/c.jpg" data-src="assets/img/profiles/c.jpg" data-src-retina="assets/img/profiles/c2x.jpg" alt="">
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
                                <img width="35" height="35" data-src-retina="assets/img/profiles/e2x.jpg" data-src="assets/img/profiles/e.jpg" src="assets/img/profiles/e.jpg" alt="">
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
                                <img width="35" height="35" data-src-retina="assets/img/profiles/b2x.jpg" data-src="assets/img/profiles/b.jpg" src="assets/img/profiles/b.jpg" alt="">
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


