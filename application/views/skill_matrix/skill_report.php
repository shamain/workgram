
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">


            <div id="Empskill" class="just list">
                <div class="list_header">

                    <select class="select2 span12" >
                        <option value="">Select Employee</option>
                        <?php
                        foreach ($employees as $employee) {
                            ?>
                            <option value="<?php echo $employee->employee_code; ?>"><?php echo ucfirst($employee->employee_fname . ' ' . $employee->employee_lname); ?></option>
                        <?php }
                        ?>
                    </select>

                    <button id="search_employee_skill_btn" style="margin-left:12px" name="search_employee_skill_btn" class="btn btn-primary"><i class="fa fa-search"></i></button>

                    <div class="clearfix"></div>

                    <div class="grid-body ">

                        <table class="table">
                            <thead>
                                <tr>
                                    <th>#</th>
                                    <th>Employee Name</th>
                                    <th>Skill</th>
                                    <th>Skill Category</th>
                                    <th>Progress</th>
                                    <th>References</th>

                                <tr>
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



<script type="text/javascript">
    $('#skill_parent_menu').addClass('active open');
</script>

