<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>




<div class="row-fluid">
    <div class="col-md-2" >

        <div class="btn-group"> <a href="#" onclick="alert(sf)" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Company</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu" id="wages_company_filter" onchange="alert(l);">
                <li class="active" data-filter="all" data-dimension="company"><a href="#">All</a></li>
                <?php
                foreach ($companies as $company) {
                    ?>
                    <li data-filter = "alaska" data-dimension = "company"><a href = "#"><?php echo ucfirst($company->company_name); ?></a></li>
                <?php }
                ?>
            </ul>
        </div>
    </div>
     <div class="col-md-2" >
          <select rows="2" name="notified_users[]" id="notified_users" style="width: 100%;" multiple="yes" class="select2 form-control">
                                    <?php foreach ($employees as $employee) { ?>
                                        <option value="<?php echo $employee->employee_code; ?>"><?php echo $employee->employee_fname, ' ', $employee->employee_lname; ?></option> 
                                    <?php } ?> 
                                </select>
     </div>
                              
   <div class="col-md-2" >
<div class="input-with-icon  right input-append primary date  no-padding" id="year_dpicker">                                       
    <i class=""></i>

    <input class="form-control" type="text" input-append id="month" >
    <span class="add-on">
        <span class="arrow"></span>
        <i class="fa fa-th"></i>
    </span>
</div>
   </div>
</div> 

<div class="clearfix"></div>

<table class="table table-bordered no-more-tables">
    <thead>
        <tr>

            <th class="text-center" style="width:22%">Employee</th>
            <th class="text-center" style="width:22%">January</th>
            <th class="text-center" style="width:22%">February</th>
            <th class="text-center" style="width:22%">March</th>
            <th class="text-center" style="width:22%">April</th>
            <th class="text-center" style="width:22%">May</th>
            <th class="text-center" style="width:22%">June</th>
            <th class="text-center" style="width:22%">July</th>
            <th class="text-center" style="width:22%">August</th>
            <th class="text-center" style="width:22%">September</th>
            <th class="text-center" style="width:22%">October</th>
            <th class="text-center" style="width:22%">November</th>
            <th class="text-center" style="width:22%">December</th>

        </tr>

    </thead>
    <tbody>


    </tbody>
</table>
<!-- Modal -->
<div class="modal fade" id="wages_modal" tabindex="-1" role="dialog" aria-labelledby="wages_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="wages_form" name="wages_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="wages_modalLabel" class="semi-bold text-white">Employee Name</h4>
                   
                    <br>
                </div>
                <div class="modal-header">

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
                            <i class="">
                                <div class="form-group">                               
                                    <label class="form-label">Password</label>
                                    <span style="color: red">*</span>                             
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div class="inner-addon left-addon" id="generatePassword">                                         
                                <i class=""></i>
                                <input id="employee_password" class="text" type="text" name="employee_password"  >  
                                <button type="button" class="btn btn-primary btn-sm btn-small"onclick="generatePassword()">Password</button> 

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
                                    <option value="1"  selected="true" >Admin</option>
                                    <option value="2"  selected="true" >Company Owner</option>
                                    <option value="3" selected="true">Employee</option>
                                </select>  

                            </div>
                        </div>
                    </div>


                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Wages Category</label>

                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                 <select name="wages_category" id="wages_category" class="select2 form-control"  >

                                 <?php foreach ($wages_categories as $wages_category) {
                                        ?> 
                                        <option value="<?php echo $wages_category->wages_category_id; ?>"><?php echo $wages_category->category_name; ?></option>
                                 <?php } ?>
                                  
                                </select>    
                                          
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
                                    <option value="FULL_TIME" selected="true">Full Time</option>
                                    <option value="PART_TIME" selected="true">Part Time</option>

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