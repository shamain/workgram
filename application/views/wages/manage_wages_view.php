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
                  <div class="modal-header">

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Employee Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
<!--                                <input id="employee_name" class="form-control" type="text" name="employee_name">                              -->
                            </div>
                        </div>
                    </div>

                   
                    <br>
                </div>
                     <div class="modal-header">
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Year</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
<!--                                <input id="year" class="form-control" type="text" name="year">                              -->
                            </div>
                        </div>
                    </div>
                  </div>
                   <div class="modal-header">
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Month</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
<!--                                <input id="month" class="form-control" type="text" name="month">                              -->
                            </div>
                        </div>
                    </div>
                     </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <i class="">
                                <div class="form-group">                               
                                    <label class="form-label">Total hours worked</label>
                                    <span style="color: red">*</span>                             
                                </div>
                        </div>
                        <div class="col-md-6">
                            <div  class="input-with-icon  right">                                         
                                <i class=""></i>
                                  <input id="workedhours" class="form-control" type="text" name="workedhours">

                            </div>
                        </div>

                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Basic Salary</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="basic_salary" class="form-control" type="text" name="basic_salary">                              
                            </div>
                        </div>
                    </div>
                            <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Bonus</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="bonus" class="form-control" type="text" name="bonus">                              
                            </div>
                        </div>
                    </div>
                
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Allowance</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="allowance" class="form-control" type="text" name="allowance">                              
                            </div>
                        </div>
                    </div>


                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">OT Rate</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="ot_rate" class="form-control" type="text" name="ot_rate">                              
                            </div>
                        </div>
                    </div>




                <div id="wages_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Paid</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>