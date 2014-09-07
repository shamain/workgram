<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>




<div class="row-fluid">
    <div class="col-md-2" >
        <select class="select2 span12">
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
        <div class="input-with-icon  right input-append primary date  no-padding" id="att_month_dpicker">                                       
            <i class=""></i>

            <input class="form-control" type="text" readonly="true" id="att_filter_m_picker" >
            <span class="add-on">
                <span class="arrow"></span>
                <i class="fa fa-th"></i>
            </span>
        </div>
    </div>
    
    <div class="col-md-2" >
        <button id="search_employee_attendance_btn" style="margin-left:12px" name="search_employee_attendance_btn" class="btn btn-primary"><i class="fa fa-search"></i></button>

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

<script type="text/javascript">
    $('#employee_attendance_parent_menu').addClass('active open');
</script>

