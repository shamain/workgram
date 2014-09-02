<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>




<div class="row-fluid">
    <div class="col-md-2" >

        <div class="btn-group"> <a href="#" onclick="alert(sf)" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Employee</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu" id="employee_attendance_filter" onchange="alert(l);">
                <li class="active" data-filter="all" data-dimension="company"><a href="#">All</a></li>
                <?php
                foreach ($employees as $employee) {
                    ?>
                    <li data-filter = "alaska" data-dimension = "employee"><a href = "#"><?php echo  $employee->employee_fname, ' ', $employee->employee_lname; ?></a></li>
                <?php }
                ?>
            </ul>
        </div>
    </div>
     
                              
   <div class="col-md-2" >
<div class="input-with-icon  right input-append primary date  no-padding" id="year_dpicker">                                       
    <i class=""></i>

    <input class="form-control" type="text" input-append id="year_dpicker" >
    <span class="add-on">
        <span class="arrow"></span>
        <i class="fa fa-th"></i>
    </span>
</div>
       
       
   </div>
    
    <div class="col-md-2" >
<div class="input-with-icon  right input-append primary date  no-padding" id="month_dpicker">                                       
    <i class=""></i>

    <input class="form-control" type="text" input-append id="month_dpicker" >
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

<script type="text/javascript">
    $('#employee_attendance_parent_menu').addClass('active open');
</script>

