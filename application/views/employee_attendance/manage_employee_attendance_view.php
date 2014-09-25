<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="col-md-11">
    <div class="col-md-2" >
        <select class="select2 span12" id="emp_atn_employee">
            <option value="">Select Employee</option>
            <?php
            foreach ($employees as $employee) {
                ?>
                <option value="<?php echo $employee->employee_code; ?>"><?php echo ucfirst($employee->employee_fname . ' ' . $employee->employee_lname); ?></option>
            <?php }
            ?>
        </select>

    </div>


<!-- month date picker-->

    <div class="col-md-2" >
        <div class="input-with-icon  right input-append primary date  no-padding" id="att_month_dpicker">                                       
            <i class=""></i>

            <input class="form-control" type="text" readonly="true" id="att_filter_m_picker" value="<?php echo date('F Y', strtotime("0 month")) ?>">
            <span class="add-on">
                <span class="arrow"></span>
                <i class="fa fa-th"></i>
            </span>
        </div>
    </div>

<!--search button-->

    <div class="col-md-2" >
        <button id="search_employee_attendance_btn" style="margin-left:12px" name="search_employee_attendance_btn" class="btn btn-primary"><i class="fa fa-search"></i></button>

    </div>

<!-- Days representation-->

    <div class="col-md-2" >
        <table style="position:absolute;top:9px;right:9px;;font-size:smaller;color:#545454">
            <tbody>
                <tr>
                    <td class="legendColorBox">
                        <div style="border:1px solid #ccc;padding:1px">
                            <div style="width:4px;height:0;border:5px solid <?php echo $this->config->item('ABSENT_C'); ?>;overflow:hidden"></div>
                        </div>
                    </td>
                    <td class="legendLabel">Absent</td>
                    <td class="legendColorBox">
                        <div style="border:1px solid #ccc;padding:1px">
                            <div style="width:4px;height:0;border:5px solid <?php echo $this->config->item('HALF_DAY_C'); ?>;overflow:hidden"></div>
                        </div>
                    </td>
                    <td class="legendLabel">Half Day</td>
                    <td class="legendColorBox">
                        <div style="border:1px solid #ccc;padding:1px">
                            <div style="width:4px;height:0;border:5px solid <?php echo $this->config->item('FULL_DAY_C'); ?>;overflow:hidden"></div>
                        </div>
                    </td>
                    <td class="legendLabel">Full Day</td>
                </tr>
            </tbody>
        </table>
    </div>
</div>
    
    <!-- print button-->
    
    <div class="col-md-1">
        <div class="invoice-button-action-set">
            <p>
                <button class="btn btn-primary" type="button" id="attendance_print_btn"><i class="fa fa-print"></i></button>
            </p>
        </div>
    </div>
</div> 

<div class="clearfix"></div>

<div class="row-fluid">
    <div class="span15">
        <div class="grid simple ">
            <div class="row" >

                <div class="col-md-11" >
                    <div class="grid-body myscroll" >

                        <div id="search_result_table">
                            <table class="table table-bordered no-more-tables">
                                <thead>
                                    

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
<script type="text/javascript">
    $('#employee_attendance_parent_menu').addClass('active open');
</script>

