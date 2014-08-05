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
                            <th>Full Name</th>                    
                            <th>Email</th>
                            <th>Type</th>
                            <th>Contact No</th>
                            <th>Contract</th>
                            <th>Options</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($employees as $employee) {
                            ?> 
                            <tr  id="employee_<?php echo $employee->employee_code; ?>">


                                <td><?php echo $employee->employee_fname . ' ' . $employee->employee_lname; ?></td>
                                <td><?php echo $employee->employee_email; ?></td>
                                <td>  
                                    <?php if ($employee->employee_type == $this->config->item('ADMIN')) {
                                        ?>
                                        <span class="label label-important"><?php echo 'ADMIN'; ?></span>

                                    <?php } else if ($employee->employee_type == $this->config->item('COMPANY_OWNER')) {
                                        ?>

                                        <span class="label label-success"><?php echo 'COMPANY OWNER'; ?></span>

                                    <?php } else {
                                        ?>
                                        <span class="label label-info"><?php echo 'EMPLOYEE'; ?></span>
                                    <?php } ?>

                                </td>


                                <td><?php echo $employee->employee_contact; ?>  </td>

                                <td>  <?php if ($employee->employee_contract == $this->config->item('FULL_TIME')) {
                                        ?>
                                        <span class="label label-success"><?php echo 'FULL TIME'; ?></span>
                                      
                                 <?php } else if ($employee->employee_contract == $this->config->item('PART_TIME')) {
                                     ?>   
                                        <span class="label label-warning"><?php echo 'PART TIME'; ?></span>
                                    <?php } ?>
                                </td>


                                <td>
                                    <a href="<?php echo site_url(); ?>/employee/employee_controller/edit_employee_view/<?php echo $employee->employee_code; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Employee" onclick="delete_employee(<?php echo $employee->employee_code; ?>)">
                                        <i class="fa fa-times"></i>
                                    </a>
                                    <a href="<?php echo site_url(); ?>/employee_privilege/employee_privilege_controller/manage_employee_privileges/<?php echo $employee->employee_code; ?>">
                                        <i class="fa fa-unlock-alt"></i>
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

<!-- Modal -->
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
                                <label class="form-label">Previous id ?</label>
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
                                <label class="form-label">First Name</label>
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
                                <label class="form-label">Last Name</label>
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
                                <label class="form-label">Password</label>
                                <span style="color: red">*</span>                             
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right" id="generatePassword">                                       
                                <i class="">
                                </i>
                                <input id="employee_password" class="form-control" type="text" name="employee_password"  >
                                
                                 <button type="button" class="btn btn-primary btn-cons"onclick="generatePassword()">Password</button>
                               
                            </div>
                            
                        </div>
                           
                    </div>
        
                   

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Email</label>
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
                                <label class="form-label">Type</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <select name="employee_type" id="employee_type" class="select2 form-control"  >
                                    <option value="1">Admin</option>
                                    <option value="2">Company Owner</option>
                                     <option value="3">Employee</option>
                                </select>  

                            </div>
                        </div>
                    </div>
                    

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Salary</label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_salary" class="form-control" type="text" name="employee_salary" onkeypress="return numbersonly(this,event)">                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Contract</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>

                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                              <select name="employee_contract" id="employee_contract" class="select2 form-control"  >
                                    <option value="FULL_TIME">FULL TIME</option>
                                    <option value="PART_TIME">PART TIME</option>
                                     
                                </select>                             
                            </div>
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
<script type="text/javascript">
    $('#employee_parent_menu').addClass('active open');
</script>

