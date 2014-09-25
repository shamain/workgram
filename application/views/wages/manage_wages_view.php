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
                    <option value="<?php echo $company->company_code; ?>" <?php if ($company->company_code == $this->session->userdata('EMPLOYEE_COMPANY_CODE')) { ?> selected="true"<?php } ?>><?php echo ucfirst($company->company_name); ?></option>
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
            <div class="input-with-icon  right input-append primary date  no-padding" id="datepicker_wages">                                       
                <i class=""></i>

                <input class="form-control" type="text" input-append id="year_wages"value="<?php echo date('Y') ?>" readonly="true">
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
</div>
<!--////////////////////////////modal//////////////////////////////////-->
<!-- Modal -->
<div class="modal fade" id="wages_pop_up" tabindex="-1" role="dialog" aria-labelledby="wages_pop_upLabel" aria-hidden="true">
    <div class="modal-dialog" id="wages_pop_up_inner_content">

        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>

<script type="text/javascript">
    $('#wages_parent_menu').addClass('active open');
</script>