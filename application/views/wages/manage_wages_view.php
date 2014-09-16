<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="col-md-11">
        <div class="col-md-4" >
            <select class="select2 span12" id="select_company">
                <option value="">Select Company</option>
                <?php
                foreach ($companies as $company) {
                    ?>
                <option value="<?php echo $company->company_code; ?>" <?php if($company->company_code == $this->session->userdata('EMPLOYEE_COMPANY_CODE')){?> selected="true"<?php }?>><?php echo ucfirst($company->company_name); ?></option>
                <?php }
                ?>
            </select>

            <select class="select2 span12" id="select_employee">
                <option value="">Select Employee</option>
                <?php
                foreach ($employees as $employee) {
                    ?>
                    <option value="<?php echo $employee->employee_code; ?>"><?php echo ucfirst($employee->employee_fname . ' ' . $employee->employee_lname); ?></option>
                <?php }
                ?>
            </select>

        </div>
        <div class="col-md-2" >
            <div class="input-with-icon  right input-append primary date  no-padding" id="datepicker">                                       
                <i class=""></i>

                <input class="form-control" type="text" input-append id="year_wages"value="<?php echo date('Y') ?>" >
                <span class="add-on">
                    <span class="arrow"></span>
                    <i class="fa fa-th"></i>
                </span>
            </div>
        </div>

        <div class="col-md-2" >
            <button id="search_wages_btn" style="margin-left:12px" name="search_wages_btn" class="btn btn-primary"><i class="fa fa-search"></i></button>
        </div>
    </div>
    <div class="col-md-1">
        <div class="invoice-button-action-set">
            <p>
                <button class="btn btn-primary" type="button"><i class="fa fa-print"></i></button>
            </p>
        </div>
    </div>
</div>


<div class="clearfix"></div>

<!--//////////////////////Table//////////////////////-->
<div class="row-fluid">
    <div class="span15">
        <div class="grid simple ">
            <div class="row" >

                <div class="col-md-11" >
                    <div class="grid-body myscroll" >
                        <div id="search_wages_div">
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
                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <!--////////////////////////////modal//////////////////////////////////-->
    <!-- Modal -->
<div class="modal fade" id="add_wages_modal" tabindex="-1" role="dialog" aria-labelledby="add_wages_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_wages_form" name="add_wages_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_wages_modalLabel" class="semi-bold text-white"><div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="semi-bold text-white">Employee Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                    <input id="employee_name" class="form-control" type="text" name="employee_name" value="<?php echo $employee->employee_fname . ' ' . $employee->employee_lname; ?>">                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="semi-bold text-white">Year</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                    <input id="employee_name" class="form-control" type="text" name="employee_name" value="<?php echo $employee->employee_fname . ' ' . $employee->employee_lname; ?>">                              
                            </div>
                        </div>
                    </div></h4>
                    
                   
                    <br>
                </div>
                <div class="modal-body">

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Employee Name</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                    <input id="employee_name" class="form-control" type="text" name="employee_name" value="<?php echo $employee->employee_fname ?>">                              
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
                                <input id="basic_salary" class="form-control" type="text" name="basic_salary" >                              
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
                                <input id="allowance" class="form-control" type="text" name="allowance" >                              
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
                                <input id="bonus" class="form-control" type="text" name="bonus" >                              
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
                                <input id="basic_salary" class="form-control" type="text" name="basic_salary" >                              
                            </div>
                        </div>
                    </div>
                </div>



                <div id="add_wages_msg" class="form-row"> </div>
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

    <script type="text/javascript">
        $('#wages_parent_menu').addClass('active open');
    </script>