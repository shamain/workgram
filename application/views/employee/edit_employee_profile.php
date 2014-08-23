
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<!--<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <div class="row">
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <form id="edit_employee_profile_form" name="edit_employee_profile_form">-->

<div class="modal fade" id="edit_profile_modal" tabindex="-1" role="dialog" aria-labelledby="edit_profile_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="edit_profile_form" name="edit_profile_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="edit_profile_modalLabel" class="semi-bold text-white">Edit Details</h4>
                    <p class="no-margin text-white">Edit your details here.</p>
                    <br>
                
                            <div class="form-group">
                                <label class="form-label">First Name</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="employee_fname" class="form-control" type="text" name="employee_fname" value="<?php echo $employee_detail->employee_fname; ?>">                              
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Last Name</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="employee_lname" class="form-control" type="text" name="employee_lname" value="<?php echo $employee_detail->employee_lname; ?>">                              
                                </div>
                            </div>
                            

                         

                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="employee_email" class="form-control" type="text" name="employee_email" value="<?php echo $employee_detail->employee_email; ?>">                              
                                    
                                </div>
                            </div>
                            
                            

                            <div class="form-group">
                                <label class="form-label">Birth Day</label>
                                <span style="color: red">*</span><br>

                                <div class="input-with-icon  right input-append primary date  no-padding" id="employee_bday_edit_dpicker">                                       
                                    <i class=""></i>

                                    <input class="form-control" type="text" input-append id="employee_bday" name="employee_bday" readonly="true"  value="<?php echo $employee_detail->employee_bday; ?>">
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
                                    <input id="employee_contact" class="form-control" type="text" name="employee_contact" value="<?php echo $employee_detail->employee_contact; ?>">                              
                                </div>
                            </div>

                            

                            

                            
                             

                            <div id="edit_employee_profile_msg" class="form-row"> </div>

                            <input type="hidden" id="employee_code" name="employee_code" value="<?php echo $employee_detail->employee_code; ?>"/>
                            <div class="form-actions">
                                <div class="pull-right">
                                    <button class="btn btn-primary btn-cons" type="submit">
                                        <i class="icon-ok"></i>
                                        Save
                                    </button>
                                    <a href="<?php echo site_url(); ?>/employee/employee_profile_controller/view_profile" class="btn btn-white btn-cons" type="button">Cancel</a>
                                </div>
                            </div>
                            
                            

                        <!--</form>-->
                    </div>
            </form>
                </div>
            </div>
        </div>
    <!--</div>-->
<!--</div>-->
<script type="text/javascript">
    $('#employee_parent_menu').addClass('active open');
    
        
</script>