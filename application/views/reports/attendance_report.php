<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <label>Select Employee </label>

                    <select class="select2 span12">
                        <?php
                        foreach ($employees as $employee) {
                            ?>
                            <option value="<?php echo $employee->employee_code; ?>"><?php echo ucfirst($employee->employee_fname . ' ' . $employee->employee_lname); ?></option>
                        <?php }
                        ?>
                    </select>

                <table class="table" id="employee_attendance_table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Attendance ID</th>
                            <th>Company Worker ID</th>
                            <th>Worker date</th>
                            
                        </tr>
                    </thead>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#reports_parent_menu').addClass('active open');
</script>
                    

