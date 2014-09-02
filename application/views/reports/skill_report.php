
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Employee</span> <span class="caret"></span> </a>
                <ul class="dropdown-menu" id="employee_na">
                    <li class="active" data-filter="all" data-dimension="employee"><a href="#">All</a></li>
                    <?php
                    foreach ($employees as $employee) {
                        ?>
                        <li data-filter = "<?php echo $employee->employee_code; ?>" data-dimension = "employee"><a href = "#"><?php echo ucfirst($employee->employee_fname . ' ' . $employee->employee_lname); ?></a></li>
                    <?php }
                    ?>
                </ul>
            </div>

            <button id="search_employee_skill_btn" style="margin-left:12px" name="search_employee_skill_btn" class="btn btn-primary"><i class="fa fa-search"></i></button>

            <div id="Empskill" class="just list">
                <div class="list_header">

                    <div id="sortByName" class="meta name employee active desc">
                        Employee
                        <span clas ="sort anim150 asc" data-order="desc" data-sort="data-name"></span>
                        <span class="sort anim150 desc active" data-order="asc" data-sort="data-name"></span>
                    </div>

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
                                        <td><?php echo ++$i; ?></td>
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





