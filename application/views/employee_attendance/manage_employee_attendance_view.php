<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>



<!--employee Attendance table-->
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <table class="table" id="employee_attendance_table" >
                    <thead>
                        <tr>                          
                            <th>Attendance ID</th>                    
                            <th>Employee ID</th>                           
                            <th>Company work ID</th>
                            <th>Date</th>
                            <th>Fine</th>
                            <th>Allowance</th>
                            <th>Paid</th>
                            

                        </tr>
                    </thead>
<!--                    <tbody>
                        //<?php
//                    foreach ($employee_attendances as $employee_attendance) {
//                            ?> 
                            <tr  id="employee_attendance_<?php echo $employee_attendance->attendance_id; ?>">

                                
                                <td><?php echo $employee_attendance->attendance_id ; ?></td>
                                <td><?php echo $employee_attendance->employee_id; ?></td>
                                 <td><?php echo $employee_attendance->company_work_id ; ?></td>
                                <td><?php echo $employee_attendance->date; ?></td>
                                 <td><?php echo $employee_attendance->fine; ?></td>
                                 <td><?php echo $employee_attendance->allowance; ?></td>
                                 <td><?php echo $employee_attendance->paid; ?></td>
                                
                                
                                   

                                    

                                 
                            </tr>

                        <?php //  } ?>    
                    </tbody>-->
                </table>
            </div>
        </div>
    </div>
</div>

<script type="text/javascript">
    $('#employee_attendance_parent_menu').addClass('active open');
</script>

