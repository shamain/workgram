
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">


            <div id="Empskill" class="just list">
                <div class="list_header">

                    <select class="select2 span12">
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

                        <table class="table" id="emp_skill_table" >
                            <thead>
                                <tr>
                                    <th>#</th>    
                                    <th>Skill Name</th>
                                    <th>Skill Category</th>                    
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $i = 0;
                                foreach ($skills as $skill) {
                                    ?> 
                                    <tr  id="skills_<?php echo $skill->skill_code; ?>">
                                        <td><?php echo++$i; ?></td>
                                        <td><?php echo $skill->skill_name; ?></td>
                                        <td>
                                            <?php echo $skill->skill_cat_name; ?> 
                                        </td>
                                    </tr>
                                <?php } ?>    
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

