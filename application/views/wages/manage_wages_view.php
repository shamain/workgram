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
