<div class="grid simple">
    <div class="grid-body no-border invoice-body"> <br>
        <div class="pull-right">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="clearfix"></div>
        <br>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr>  
                    <th>ID</th>                    
                    <th>Skill</th>
                    <th>Expert Level</th> 
                    <th>References</th> 
                    <th>Actions</th> 
                </tr>
            </thead>
            <tbody>
                <?php
                $i = 0;
                foreach ($assigned_skills as $assigned_skill) {
                    ?> 
                    <tr  id="skill_matrix_<?php echo $assigned_skill->employee_skill_id; ?>">
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $assigned_skill->skill_name; ?>



                        <td valign="middle">
                            <?php echo $assigned_skill->expert_level; ?> 
                            <?php
                            if ($assigned_skill->expert_level == 100) {
                                ?>
                                <div class="progress">
                                    <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="<?php echo $assigned_skill->expert_level; ?>%" style="width: 79%;"></div>

                                </div>
                                <?php
                            } else if ($assigned_skill->expert_level == 0) {
                                ?>
                                <div class="progress">
                                    <div data-percentage="<?php echo $assigned_skill->expert_level; ?>%" id="" class="progress-bar progress-bar-danger animate-progress-bar"></div>
                                </div>
                                <?php
                            } else {
                                ?>
                                <div class="progress">
                                    <div data-percentage="<?php echo $assigned_skill->expert_level; ?>%" id="" class="progress-bar progress-bar-warning animate-progress-bar"></div>
                                </div>
                            <?php } ?>
                        </td>
                        <td>
                            <a href="<?php echo $assigned_skill->reference; ?>" target="_blank"><?php echo $assigned_skill->reference; ?></a> 
                        </td>
                        <td>
                            <a href="<?php echo site_url(); ?>/skill_matrix/skill_matrix_controller/edit_skill_matrix_view/<?php echo $assigned_skill->employee_skill_id; ?>">
                                <span class="label label-info">Edit</span>
                            </a>
                            <a style="cursor: pointer;"   title="Delete this Skill" onclick="delete_employee_skill(<?php echo $assigned_skill->employee_skill_id; ?>)">
                                <span class="label label-important">Delete</span>
                            </a>

                        </td>
                    </tr>
                <?php } ?>    
            </tbody>
        </table>
    </div>
</div>