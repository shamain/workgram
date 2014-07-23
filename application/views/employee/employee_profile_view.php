<div class="row">
    <div class="col-md-6">
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
                        <div class="user-profile-pic" id="pro_pic">	
<!--                            <img width="69" height="69" data-src-retina="<?php echo base_url(); ?>application_resources/img/profiles/avatar2x.jpg" data-src="<?php echo base_url(); ?>application_resources/img/profiles/avatar.jpg" src="<?php echo base_url(); ?>application_resources/img/profiles/avatar.jpg" alt="">-->
                            <?php if ($this->session->userdata('EMPLOYEE_PROPIC') == '') { ?>

                                <img src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/avatar.jpg" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/avatar2x.jpg" width="69" height="69" />

                            <?php } else { ?>
                                <img src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>"  alt="" data-src="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" data-src-retina="<?php echo base_url(); ?>uploads/employee_avatar/<?php echo $this->session->userdata('EMPLOYEE_PROPIC'); ?>" width="69" height="69" />

                            <?php } ?> 
                            
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
    
    <!-- generate graph-->
    
    
<!--<div class="row tiles-container spacing-bottom tiles grey">
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
<div id="mini-chart-orders"><canvas width="70" height="30" style="display: inline-block; width: 70px; height: 30px; vertical-align: top;"></canvas></div>
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
<div id="mini-chart-other"><canvas width="62" height="30" style="display: inline-block; width: 62px; height: 30px; vertical-align: top;"></canvas></div>
</div>
</div>
</div>
</div>
</div>
<br>
<div id="ricksaw" class="rickshaw_graph"><svg width="395" height="200"><g><path d="M0,16.8321704065894Q6.846666666666668,12.920371051174834,7.9,12.440419405141029C9.48,11.72049193609032,14.22,10.678917854616222,15.8,9.632895716082317S22.120000000000005,2.224447210505602,23.700000000000003,1.9801980198019749S30.020000000000003,6.41720840481702,31.6,7.190403809046046S37.92,8.93315454122409,39.5,9.71215206209223S45.82000000000001,15.278015277131928,47.400000000000006,14.980379017727444S53.720000000000006,7.957965400988237,55.300000000000004,6.735789468047386S61.620000000000005,2.0959099576944342,63.2,2.7586196883189302S69.52000000000001,11.697234938725694,71.10000000000001,13.362886774292349S77.42,18.443998130174872,79,19.41513804398548S85.32000000000001,22.935694285863256,86.9,23.07428591239841S93.22000000000001,21.986007192791288,94.80000000000001,20.80105430933699S101.12,10.94431794800102,102.7,11.224757077855429S109.02000000000001,21.847519757887135,110.60000000000001,23.60544560788108S116.92,29.23546066185265,118.5,28.80401557779487S124.82000000000001,20.129207405874446,126.4,19.29099476730329S132.72,19.513579153925566,134.3,20.421889192083285S140.62000000000003,28.551245936542774,142.20000000000002,28.374095148880485S148.52,18.070014597771266,150.1,18.650381315460407S156.42,33.34041931247787,158,34.17776232577191S164.32,26.757985341351734,165.9,27.023811448400778S172.22,36.52113836146292,173.8,36.83602339626236S180.12,31.737026964685548,181.70000000000002,30.172661796395232S188.02000000000004,20.889506381775895,189.60000000000002,21.192371713359194S195.92000000000002,31.875369097156014,197.5,33.2013151122282S203.82,35.299003388319065,205.4,34.45183186408107S211.72,25.062126553891837,213.3,24.729599869848244S219.62,29.6793419575892,221.20000000000002,31.126565023645128S227.52000000000004,39.916988390885024,229.10000000000002,39.201830530407506S235.42000000000002,24.626291830303888,237,23.974986418869975S243.32,32.57162339620103,244.9,32.68877641606838S251.22000000000003,24.23038458896325,252.8,25.146516617543398S259.12,40.11279562093341,260.7,41.85009670186986S267.02000000000004,43.41007665427102,268.6,42.51952742690784S274.92,34.34893685321514,276.5,32.94460442823802S282.82000000000005,27.357354437793624,284.40000000000003,28.476203177136625S290.72,43.80043933661102,292.3,44.13309182166802S298.62,32.26076260634249,300.2,31.802728027706564S306.52000000000004,39.74827430054774,308.1,39.552746035308786S314.42,31.557102331331155,316,29.847445375316994S322.32000000000005,22.852241487670312,323.90000000000003,22.456176475167183S330.22,25.363022310723174,331.8,25.8867952502857S338.12,27.714537185150288,339.7,27.693905870792435S346.02000000000004,25.679897923807637,347.6,25.68048210670716S353.92,27.55493866497376,355.5,27.69974769978765S361.82000000000005,25.51107388658768,363.40000000000003,27.12857245484605S369.72,42.87078985668755,371.3,43.874733382371346S377.62000000000006,36.663448006679566,379.20000000000005,37.16800771168397S385.52000000000004,48.37749375281646,387.1,48.92033043241537Q388.15333333333336,49.28222155214797,395,42.596374507673005L395,87.32307910416483Q388.15333333333336,92.31518905278483,387.1,92.06592874889728C385.52000000000004,91.69203829306595,380.78000000000003,83.5711957833456,379.20000000000005,83.58417454585154S372.88,92.1839930935666,371.3,92.19571637395671S364.98,84.77400609337191,363.40000000000003,83.70140734975264S357.08,81.73736323196417,355.5,81.4697289377641S349.18,80.49708772155475,347.6,81.02506440775201S341.28,86.63050531150589,339.7,86.74949579973672S333.38,82.77582560981327,331.8,82.21496929006034S325.48,81.09909310781627,323.90000000000003,81.14093260220739S317.58,81.65692881895147,316,82.63336423397145S309.68,91.16744858503641,308.1,90.90528675240715S301.78,79.53904461660528,300.2,80.01174590767887S293.88,94.83167821236236,292.3,95.63229966314309S285.98,88.94426165174234,284.40000000000003,88.0179604154861S278.08,85.33604280965557,276.5,86.36928730058078S270.18,98.12116870551718,268.6,98.35040532473822S262.28,89.94207452471584,260.7,88.66165349279117S254.38,85.30406545416908,252.8,85.54619500549161S246.48000000000002,91.45944108853091,244.9,91.08294900601655S238.57999999999998,81.89174805642271,237,81.78127418034798S230.68,89.63493951280749,229.10000000000002,89.97821024526912S222.78000000000003,85.85041689631565,221.20000000000002,85.21398150496428S214.88000000000002,83.41979880911747,213.3,83.61385633175547S206.98000000000002,87.05346178534812,205.4,87.15455673134431S199.07999999999998,85.58176459547204,197.5,84.62480579171738S191.18,77.84750059837705,189.60000000000002,77.58496869379773S183.28000000000003,80.53670991698947,181.70000000000002,81.99948674592417S175.38000000000002,92.15890637695847,173.8,92.21273698314488S167.48000000000002,83.11253216997758,165.9,82.5377928077883S159.58,86.87561928586886,158,86.46534336125204S151.67999999999998,78.59134809498701,150.1,78.43503356162005S143.78,84.68573031339783,142.20000000000002,84.90219802758234S135.88000000000002,81.46163172247364,134.3,80.59971070346523S127.98,76.00512675253282,126.4,76.2829878374983S120.08,82.37770159534752,118.5,83.37832155312003S112.18,86.83919626372328,110.60000000000001,86.28918741522351S104.28,78.9545020377404,102.7,77.87823306812236S96.38000000000001,74.68867528540035,94.80000000000001,75.52649771904312S88.48,85.72745408768628,86.9,86.25645740455006S80.58,82.49864091667362,79,80.81653088768097S72.68,70.81217864607525,71.10000000000001,69.43535711462346S64.78,66.92708131982448,63.2,67.04831557316302S56.88,69.99310226112468,55.300000000000004,70.64769964800885S48.980000000000004,73.23910859744494,47.400000000000006,73.59428944200484S41.08,74.92849098801315,39.5,74.1995080936078S33.18,66.49752564917857,31.6,66.30446049795137S25.28,71.54155099214422,23.700000000000003,72.26885658133584S17.38,72.49531804901869,15.8,73.57751638986754S9.48,82.91877623690374,7.9,83.09083998982433Q6.846666666666668,83.20554915843806,0,75.29815391907341Z" class="area" fill="#eceff1"></path></g><g><path d="M0,75.29815391907341Q6.846666666666668,83.20554915843806,7.9,83.09083998982433C9.48,82.91877623690374,14.22,74.65971473071639,15.8,73.57751638986754S22.120000000000005,72.99616217052746,23.700000000000003,72.26885658133584S30.020000000000003,66.11139534672417,31.6,66.30446049795137S37.92,73.47052519920246,39.5,74.1995080936078S45.82000000000001,73.94947028656473,47.400000000000006,73.59428944200484S53.720000000000006,71.30229703489303,55.300000000000004,70.64769964800885S61.620000000000005,67.16954982650157,63.2,67.04831557316302S69.52000000000001,68.05853558317166,71.10000000000001,69.43535711462346S77.42,79.13442085868832,79,80.81653088768097S85.32000000000001,86.78546072141384,86.9,86.25645740455006S93.22000000000001,76.36432015268589,94.80000000000001,75.52649771904312S101.12,76.80196409850431,102.7,77.87823306812236S109.02000000000001,85.73917856672374,110.60000000000001,86.28918741522351S116.92,84.37894151089255,118.5,83.37832155312003S124.82000000000001,76.56084892246378,126.4,76.2829878374983S132.72,79.73778968445683,134.3,80.59971070346523S140.62000000000003,85.11866574176686,142.20000000000002,84.90219802758234S148.52,78.27871902825308,150.1,78.43503356162005S156.42,86.05506743663521,158,86.46534336125204S164.32,81.96305344559903,165.9,82.5377928077883S172.22,92.26656758933129,173.8,92.21273698314488S180.12,83.46226357485888,181.70000000000002,81.99948674592417S188.02000000000004,77.32243678921841,189.60000000000002,77.58496869379773S195.92000000000002,83.66784698796272,197.5,84.62480579171738S203.82,87.25565167734051,205.4,87.15455673134431S211.72,83.80791385439348,213.3,83.61385633175547S219.62,84.57754611361291,221.20000000000002,85.21398150496428S227.52000000000004,90.32148097773076,229.10000000000002,89.97821024526912S235.42000000000002,81.67080030427324,237,81.78127418034798S243.32,90.70645692350219,244.9,91.08294900601655S251.22000000000003,85.78832455681415,252.8,85.54619500549161S259.12,87.38123246086651,260.7,88.66165349279117S267.02000000000004,98.57964194395926,268.6,98.35040532473822S274.92,87.402531791506,276.5,86.36928730058078S282.82000000000005,87.09165917922986,284.40000000000003,88.0179604154861S290.72,96.43292111392381,292.3,95.63229966314309S298.62,80.48444719875246,300.2,80.01174590767887S306.52000000000004,90.64312491977789,308.1,90.90528675240715S314.42,83.60979964899143,316,82.63336423397145S322.32000000000005,81.1827720965985,323.90000000000003,81.14093260220739S330.22,81.65411297030741,331.8,82.21496929006034S338.12,86.86848628796756,339.7,86.74949579973672S346.02000000000004,81.55304109394928,347.6,81.02506440775201S353.92,81.20209464356404,355.5,81.4697289377641S361.82000000000005,82.62880860613338,363.40000000000003,83.70140734975264S369.72,92.20743965434683,371.3,92.19571637395671S377.62000000000006,83.59715330835748,379.20000000000005,83.58417454585154S385.52000000000004,91.69203829306595,387.1,92.06592874889728Q388.15333333333336,92.31518905278483,395,87.32307910416483L395,136.54277722781197Q388.15333333333336,147.61142587268984,387.1,147.7420431353762C385.52000000000004,147.9379690294058,380.78000000000003,138.87295435649565,379.20000000000005,138.5020361681077S372.88,144.13891862650556,371.3,144.03286125149666S364.98,137.51449274615027,363.40000000000003,137.4414624180186S357.08,143.38091368327264,355.5,143.30255797017998S349.18,137.22530214120175,347.6,136.65790528709186S341.28,137.1395084544042,339.7,137.62858942908107S333.38,141.491264315893,331.8,141.54871503386073S325.48,138.05663553444907,323.90000000000003,138.20309660875827S317.58,142.42582116576222,316,143.01332577695277S309.68,144.6746627434904,308.1,144.07814272066372S301.78,136.85449003306167,300.2,137.0481255486862S293.88,145.9750968695611,292.3,146.01449787690908S285.98,137.65336121688185,284.40000000000003,137.44213562216595S278.08,142.91198464127967,276.5,143.90224192974998S270.18,147.05191926590842,268.6,147.34470850686904S262.28,147.3850426409241,260.7,146.83013433935616S254.38,141.94628544526614,252.8,141.79562549118975S246.48000000000002,145.65910955368034,244.9,145.32353479859216S238.57999999999998,138.78373473828432,237,138.43987794030795S230.68,141.35081836973538,229.10000000000002,141.88496681882842S222.78000000000003,143.37740756734902,221.20000000000002,143.78136243123828S214.88000000000002,145.72663637739862,213.3,145.9245154577211S206.98000000000002,146.16641927467748,205.4,145.76015323446305S199.07999999999998,142.49096287441347,197.5,141.86185505557685S191.18,139.83819189309708,189.60000000000002,139.46907504609678S183.28000000000003,137.75987988568096,181.70000000000002,138.1706865855739S175.38000000000002,143.20518920334996,173.8,143.57714204502608S167.48000000000002,141.64846779147243,165.9,141.8902150023351S159.58,146.47282629468364,158,145.9946141536529S151.67999999999998,137.4534138994866,150.1,137.10809359202747S143.78,141.92088942575612,142.20000000000002,142.5414110790615S135.88000000000002,144.12167668003647,134.3,143.31331012508144S127.98,134.90705440301397,126.4,134.4577455295111S120.08,138.14965391927788,118.5,138.82022139005267S112.18,140.71936764443743,110.60000000000001,141.16342023725895S104.28,143.5156407584765,102.7,143.26074731826793S96.38000000000001,138.60111706208596,94.80000000000001,138.61448583517318S88.48,143.50336269733404,86.9,143.39443504914016S80.58,138.36964106728865,79,137.52520935323423S72.68,135.22393191897396,71.10000000000001,134.95011790859587S64.78,135.13095732650814,63.2,134.78706924945328S56.88,131.71706807702313,55.300000000000004,131.5112371380472S48.980000000000004,132.57484720709613,47.400000000000006,132.72875985969398S41.08,133.02180072012032,39.5,133.05036366402567S33.18,132.22932801883664,31.6,133.01438929874755S25.28,141.15736439687953,23.700000000000003,140.90097646313467S17.38,130.2083750396309,15.8,130.45050996129902S9.48,142.718047503175,7.9,143.32232567981592Q6.846666666666668,143.72517779757652,0,136.49329172770814Z" class="area" fill="#f8a4a3"></path></g><g><path d="M0,136.49329172770814Q6.846666666666668,143.72517779757652,7.9,143.32232567981592C9.48,142.718047503175,14.22,130.69264488296713,15.8,130.45050996129902S22.120000000000005,140.6445885293898,23.700000000000003,140.90097646313467S30.020000000000003,133.79945057865845,31.6,133.01438929874755S37.92,133.078926607931,39.5,133.05036366402567S45.82000000000001,132.88267251229183,47.400000000000006,132.72875985969398S53.720000000000006,131.30540619907126,55.300000000000004,131.5112371380472S61.620000000000005,134.44318117239843,63.2,134.78706924945328S69.52000000000001,134.67630389821778,71.10000000000001,134.95011790859587S77.42,136.6807776391798,79,137.52520935323423S85.32000000000001,143.28550740094627,86.9,143.39443504914016S93.22000000000001,138.6278546082604,94.80000000000001,138.61448583517318S101.12,143.00585387805936,102.7,143.26074731826793S109.02000000000001,141.60747283008047,110.60000000000001,141.16342023725895S116.92,139.49078886082745,118.5,138.82022139005267S124.82000000000001,134.00843665600823,126.4,134.4577455295111S132.72,142.50494357012641,134.3,143.31331012508144S140.62000000000003,143.1619327323669,142.20000000000002,142.5414110790615S148.52,136.76277328456834,150.1,137.10809359202747S156.42,145.51640201262214,158,145.9946141536529S164.32,142.1319622131978,165.9,141.8902150023351S172.22,143.9490948867022,173.8,143.57714204502608S180.12,138.58149328546682,181.70000000000002,138.1706865855739S188.02000000000004,139.09995819909648,189.60000000000002,139.46907504609678S195.92000000000002,141.23274723674024,197.5,141.86185505557685S203.82,145.3538871942486,205.4,145.76015323446305S211.72,146.12239453804358,213.3,145.9245154577211S219.62,144.18531729512753,221.20000000000002,143.78136243123828S227.52000000000004,142.41911526792146,229.10000000000002,141.88496681882842S235.42000000000002,138.09602114233158,237,138.43987794030795S243.32,144.987960043504,244.9,145.32353479859216S251.22000000000003,141.64496553711336,252.8,141.79562549118975S259.12,146.27522603778823,260.7,146.83013433935616S267.02000000000004,147.63749774782966,268.6,147.34470850686904S274.92,144.89249921822028,276.5,143.90224192974998S282.82000000000005,137.23091002745005,284.40000000000003,137.44213562216595S290.72,146.05389888425705,292.3,146.01449787690908S298.62,137.2417610643107,300.2,137.0481255486862S306.52000000000004,143.48162269783705,308.1,144.07814272066372S314.42,143.60083038814332,316,143.01332577695277S322.32000000000005,138.34955768306747,323.90000000000003,138.20309660875827S330.22,141.60616575182846,331.8,141.54871503386073S338.12,138.11767040375796,339.7,137.62858942908107S346.02000000000004,136.09050843298198,347.6,136.65790528709186S353.92,143.2242022570873,355.5,143.30255797017998S361.82000000000005,137.36843208988694,363.40000000000003,137.4414624180186S369.72,143.92680387648775,371.3,144.03286125149666S377.62000000000006,138.13111797971976,379.20000000000005,138.5020361681077S385.52000000000004,147.9379690294058,387.1,147.7420431353762Q388.15333333333336,147.61142587268984,395,136.54277722781197L395,200Q388.15333333333336,200,387.1,200C385.52000000000004,200,380.78000000000003,200,379.20000000000005,200S372.88,200,371.3,200S364.98,200,363.40000000000003,200S357.08,200,355.5,200S349.18,200,347.6,200S341.28,200,339.7,200S333.38,200,331.8,200S325.48,200,323.90000000000003,200S317.58,200,316,200S309.68,200,308.1,200S301.78,200,300.2,200S293.88,200,292.3,200S285.98,200,284.40000000000003,200S278.08,200,276.5,200S270.18,200,268.6,200S262.28,200,260.7,200S254.38,200,252.8,200S246.48000000000002,200,244.9,200S238.57999999999998,200,237,200S230.68,200,229.10000000000002,200S222.78000000000003,200,221.20000000000002,200S214.88000000000002,200,213.3,200S206.98000000000002,200,205.4,200S199.07999999999998,200,197.5,200S191.18,200,189.60000000000002,200S183.28000000000003,200,181.70000000000002,200S175.38000000000002,200,173.8,200S167.48000000000002,200,165.9,200S159.58,200,158,200S151.67999999999998,200,150.1,200S143.78,200,142.20000000000002,200S135.88000000000002,200,134.3,200S127.98,200,126.4,200S120.08,200,118.5,200S112.18,200,110.60000000000001,200S104.28,200,102.7,200S96.38000000000001,200,94.80000000000001,200S88.48,200,86.9,200S80.58,200,79,200S72.68,200,71.10000000000001,200S64.78,200,63.2,200S56.88,200,55.300000000000004,200S48.980000000000004,200,47.400000000000006,200S41.08,200,39.5,200S33.18,200,31.6,200S25.28,200,23.700000000000003,200S17.38,200,15.8,200S9.48,200,7.9,200Q6.846666666666668,200,0,200Z" class="area" fill="#736086"></path></g><g class="y_ticks glow"><g transform="translate(0,200)" style="opacity: 1;"><line class="tick" x2="4" y2="0"></line><text x="7" y="0" dy=".32em" text-anchor="start"></text></g><g transform="translate(0,63.773905888046954)" style="opacity: 1;"><line class="tick" x2="4" y2="0"></line><text x="7" y="0" dy=".32em" text-anchor="start">200</text></g><path class="domain" d="M4,0H0V200H4"></path></g><g class="y_grid"><g transform="translate(0,200)" style="opacity: 1;"><line class="tick" x2="395" y2="0"></line><text x="398" y="0" dy=".32em" text-anchor="start"></text></g><g transform="translate(0,63.773905888046954)" style="opacity: 1;"><line class="tick" x2="395" y2="0"></line><text x="398" y="0" dy=".32em" text-anchor="start">200</text></g><path class="domain" d="M395,0H0V200H395"></path></g></svg><div class="detail" style="left: 237px;"><div class="x_label">Mon, 21 Jul 2014 11:40:34 GMT</div><div class="item active" style="top: 23.974986418869975px;">All:&nbsp;84.87</div><div class="dot active" style="top: 23.974986418869975px; border-color: rgb(236, 239, 241);"></div></div><div class="x_tick glow" style="left: 136.828px;"><div class="title">17:00</div></div><div class="x_tick glow" style="left: 279.028px;"><div class="title">17:15</div></div></div>
<div class="clearfix"></div>
</div>
<div class="col-md-4 col-sm-4 no-padding">
<div class="tiles grey ">
<div class="tiles white no-margin">
<div class="tiles-body">
<div class="tiles-title blend"> OVERALL VIEWS </div>
<div class="heading"> <span data-animation-duration="1000" data-value="432852" class="animate-number">432,852</span> </div>
44% higher <span class="blend">than last month</span> </div>
</div>
<div id="legend" class="rickshaw_legend" style="height: 125px;"><ul class="ui-sortable"><li class="line"><a class="action">✔</a><div class="swatch" style="background-color: rgb(236, 239, 241);"></div><span class="label">All</span></li><li class="line"><a class="action">✔</a><div class="swatch" style="background-color: rgb(248, 164, 163);"></div><span class="label">Uploads</span></li><li class="line"><a class="action">✔</a><div class="swatch" style="background-color: rgb(115, 96, 134);"></div><span class="label">Downloads</span></li></ul></div>
</div>
</div>
</div>-->

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



