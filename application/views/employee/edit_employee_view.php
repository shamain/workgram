
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form id="edit_employee_form" name="edit_employee_form">




                            <div class="form-group">
                                <label class="form-label">Previous id ?</label>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="employee_no" class="form-control" type="text" name="employee_no" value="<?php echo $employee->employee_no; ?>" style="width: 50%">                              
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="employee_fname" class="form-control" type="text" name="employee_fname" value="<?php echo $employee->employee_fname; ?>" style="width: 50%">                              
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="employee_lname" class="form-control" type="text" name="employee_lname" value="<?php echo $employee->employee_lname; ?>" style="width: 50%">                              
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Password</label>
                                <span style="color: red">*</span>


                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="employee_password" class="text" type="text" name="employee_password" value="" style="width: 50%"> 
                                    <button type="button" class="btn btn-primary btn-sm btn-small"onclick="generatePassword()">Password</button>
                                </div>




                            </div>

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="employee_email" class="form-control" type="text" name="employee_email" value="<?php echo $employee->employee_email; ?>" style="width: 50%">                              
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Type</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="employee_type" id="employee_type" class="select2 form-control" style="width: 50%" >


                                        <option value="1" <?php if ($this->config->item('ADMIN') == $employee->employee_type) { ?> selected="true" <?php } ?>>Admin</option>
                                        <option value="2" <?php if ($this->config->item('COMPANY_OWNER') == $employee->employee_type) { ?> selected="true" <?php } ?>>Company Owner</option>
                                        <option value="3" <?php if ($this->config->item('EMPLOYEE') == $employee->employee_type) { ?> selected="true" <?php } ?>>Employee</option>

                                    </select>                               
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Birth Day</label>
                                <span style="color: red">*</span><br>

                                <div class="input-with-icon  right input-append primary date  no-padding" id="employee_bday_edit_dpicker">                                       
                                    <i class=""></i>

                                    <input class="form-control" type="text" input-append id="employee_bday" name="employee_bday" readonly="true"  value="<?php echo $employee->employee_bday; ?>">
                                    <span class="add-on">
                                        <span class="arrow"></span>
                                        <i class="fa fa-th"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Contact No</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="employee_contact" class="form-control" type="text" name="employee_contact" value="<?php echo $employee->employee_contact; ?>" style="width: 50%">                              
                                </div>
                            </div>

                         
                        
                            <div class="form-group">
                                <label class="form-label">Wages Category</label>

                            </div>
                      
                        
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                 <select name="employee_wages_category" id="employee_wages_category" class="select2 form-control" value="<?php echo $employee->employee_wages_category; ?>"style="width: 50%" >

                                 <?php foreach ($wages_categories as $wages_category) {
                                        ?> 
                                        <option value="<?php echo $wages_category->wages_category_id; ?>"><?php echo $wages_category->category_name; ?></option>
                                 <?php } ?>
                                  
                                </select>    
                                          
                            </div>
                       
                   
                            <div class="form-group">
                                <label class="form-label">Contract</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="employee_contract" id="employee_contract" class="select2 form-control"  style="width: 50%">

                                        <option value="FULL_TIME" <?php if ($this->config->item('FULL_TIME') == $employee->employee_contract) { ?> selected="true" <?php } ?>>Full Time</option>
                                        <option value="PART_TIME" <?php if ($this->config->item('PART_TIME') == $employee->employee_contract) { ?> selected="true" <?php } ?>>Part Time</option>

                                    </select>                               
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label">Avatar</label>
                                <span style="color: red">*</span>



                                <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
                                <script src="<?php echo base_url(); ?>application_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>
                                <script type="text/javascript">

                                        $(function() {
                                            var btnUpload = $('#upload');
                                            var status = $('#status');
                                            new AjaxUpload(btnUpload, {
                                                action: '<?PHP echo site_url(); ?>/employee/employee_controller/upload_image',
                                                name: 'uploadfile',
                                                onSubmit: function(file, ext) {
                                                    if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                                        // extension is not allowed 
                                                        status.text('Only JPG, PNG or GIF files are allowed');
                                                        return false;
                                                    }
                                                    //status.text('Uploading...Please wait');
                                                    $("#files").html("<i id='animate-icon' class='fa fa-spinner fa fa-2x fa-spin'></i>");

                                                },
                                                onComplete: function(file, response) {
                                                    //On completion clear the status
                                                    //status.text('');
                                                    $("#files").html("");
                                                    $("#sta").html("");
                                                    //Add uploaded file to list
                                                    if (response != "error") {
                                                        $('#files').html("");

                                                        $('<div></div>').appendTo('#files').html('<img src="<?PHP echo base_url(); ?>uploads/employee_avatar/' + response + '" width="100px" height="100px"  /><br />');
                                                        picFileName = response;
                                                        document.getElementById('image').value = file;
                                                        document.getElementById('employee_avatar').value = response;
                                                    } else {
                                                        $('<div></div>').appendTo('#files').text(file).addClass('error');
                                                    }
                                                }
                                            });

                                        });




                                </script>

                                <div class="row form-row">
                                    <div class="col-md-5">
                                        <div class="form-group">
                                            <div id="files" class="project-logo">
                                                <img src="<?PHP echo base_url(); ?>uploads/employee_avatar/<?php
                                                if ($employee->employee_avatar != '') {
                                                    echo $employee->employee_avatar;
                                                } else {
                                                    echo 'avatar.jpg';
                                                }
                                                ?>" alt="" width="100px" height="100px"  />
                                            </div>

                                        </div>
                                    </div>
                                    <div class="col-md-8">
                                        <div class=" right">                                       
                                            <i class=""></i>

                                            <div id="upload">

                                                <input type="text" id="image" name="image"/>
                                                <button class="btn btn-default btn-sm btn-small" type="button" id="browse">
                                                    <i class="fa fa-camera"></i>
                                                </button>
                                                <label class="form-label">upload Image Here</label>
                                                <input type="text" id="employee_avatar" name="employee_avatar" style="visibility: hidden" value="<?php
                                                if ($employee->employee_avatar != '') {
                                                    echo $employee->employee_avatar;
                                                } else {
                                                    echo 'avatar.jpg';
                                                }
                                                ?>"/>
                                            </div>
                                            <div id="sta"><span id="status" ></span></div>



                                        </div>
                                    </div>
                                </div>

                            </div> 

                            <div id="edit_employee_msg" class="form-row"> </div>

                            <input type="hidden" id="employee_code" name="employee_code" value="<?php echo $employee->employee_code; ?>"/>
                            <div class="modal-footer">

                                <button class="btn btn-primary btn-cons" type="submit">
                                    <i class="icon-ok"></i>
                                    Save
                                </button>

                                <a href="<?php echo site_url(); ?>/employee/employee_controller/manage_employees" class="btn btn-white btn-cons" type="button">Cancel</a>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#employee_parent_menu').addClass('active open');
</script>



