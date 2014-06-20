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
                <table class="table" id="employee_table" >
                    <thead>
                        <tr>
                            <th>Employee Code</th>
                            <th>First Name</th>
                            <th>Second Name</th>
                            <th>Email</th>
                            <th>Type</th>
                            <th>Contact No</th>
                            <th>Contract</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($employees as $employee) {
                            ?> 
                            <tr  id="employee_<?php echo $employee->employee_code; ?>">
                                <td><?php echo $employee->employee_code; ?></td>
                                <td><?php echo $employee->employee_fname; ?></td>
                                <td><?php echo $employee->employee_lname; ?></td>
                                <td><?php echo $employee->employee_email; ?></td>
                                <td><?php echo $employee->employee_type; ?></td>
                                <td><?php echo $employee->employee_contact; ?></td>
                                <td><?php echo $employee->employee_contract; ?></td>

                             
                                <td>
                                    <a href="<?php echo site_url(); ?>/settings/employee_controller/edit_employee_view/<?php echo $employee->employee_code; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Employee" onclick="delete_employee(<?php echo $employee->employee_code; ?>)">
                                        <i class="fa fa-times"></i>
                                    </a>

                                </td>
                            </tr>
                        <?php } ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<!-- /.modal -->
<div class="modal fade" id="add_employee_modal" tabindex="-1" role="dialog" aria-labelledby="add_employee_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_employee_form" name="add_employee_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_employee_modalLabel" class="semi-bold text-white">It's a new employee</h4>
                    <p class="no-margin text-white">Include Employee details here.</p>
                    <br>
                </div>
                <div class="modal-body">

                    
                    
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_no</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_no" class="form-control" type="text" name="employee_no">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_fname</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_fname" class="form-control" type="text" name="employee_fname">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_lname</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_lname" class="form-control" type="text" name="employee_lname">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_password</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_password" class="form-control" type="text" name="employee_password">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_email</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_email" class="form-control" type="text" name="employee_email">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_type</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_type" class="form-control" type="text" name="employee_type">                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_bday</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-with-icon  right input-append primary date  no-padding" id="employee_bday_dpicker">                                       
                                <i class=""></i>
                                
                                    <input class="form-control" type="text" id="employee_bday" name="employee_bday" readonly="true">
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
                                <label class="form-label">employee_contact</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_contact" class="form-control" type="text" name="employee_contact">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_salary</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_salary" class="form-control" type="text" name="employee_salary">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_contract</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_contract" class="form-control" type="text" name="employee_contract">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_avatar</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_avatar" class="form-control" type="text" name="employee_avatar">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">employee_activation_code</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_activation_code" class="form-control" type="text" name="employee_activation_code">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">company_code</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="company_code" class="form-control" type="text" name="company_code">                              
                            </div>
                        </div>
                    </div>
                    
                      <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">del_ind</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="del_ind" class="form-control" type="text" name="del_ind">                              
                            </div>
                        </div>
                    </div>
                    
                      
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">added_by</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-with-icon  right input-append primary date  no-padding" id="employee_added_by_dpicker">                                       
                                <i class=""></i>
                                
                                    <input class="form-control" type="text" id="employee_added_by" name="employee_added_by" readonly="true">
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
                                <label class="form-label">added_date</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-with-icon  right input-append primary date  no-padding" id="employee_added_date_dpicker">                                       
                                <i class=""></i>
                                
                                <input class="form-control" type="text" id="employee_added_date" name="employee_added_date" readonly="true">
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
                                <label class="form-label">updated_by</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-with-icon  right input-append primary date  no-padding" id="employee_updated_by_dpicker">                                       
                                <i class=""></i>
                                
                                    <input class="form-control" type="text" id="employee_updated_by" name="employee_updated_by" readonly="true">
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
                                <label class="form-label">updated_date</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-3">
                            <div class="input-with-icon  right input-append primary date  no-padding" id="employee_updated_date_dpicker">                                       
                                <i class=""></i>
                                
                                <input class="form-control" type="text" id="employee_updated_date" name="employee_updated_date" readonly="true">
                                    <span class="add-on">
                                        <span class="arrow"></span>
                                        <i class="fa fa-th"></i>
                                    </span>
                            </div>
                        </div>
                    </div>
                <div id="add_employee_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    
                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->

