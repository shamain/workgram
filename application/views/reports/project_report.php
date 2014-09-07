
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a><a href="javascript:;" class="reload"></a></div>
            </div>
            <div class="grid-body ">
                <label>Select Employee </label>

                    <select class="select2 span12">
                         <option value="">Select Employee</option>
                        <?php
                        foreach ($employees as $employee) {
                            ?>
                            <option value="<?php echo $employee->employee_code; ?>"><?php echo ucfirst($employee->employee_fname . ' ' . $employee->employee_lname); ?></option>
                        <?php }
                        ?>
                    </select>

                <table class="table" id="project_table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Title</th>
                            <th>Founder</th>
                            <th>Deadline</th>
                            <th>Progress</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $task_service = new Task_service();
                        $i = 0;
                        foreach ($projects as $project) {

                            $complete_count = $task_service->get_complete_task_count_for_project($project->project_id);
                            $not_complete_count = $task_service->get_not_complete_task_count_for_project($project->project_id);

                            //calculate progress
                            $total = $complete_count + $not_complete_count;

                            $progress = 0;
                            if ($total != 0) {
                                $progress = ( $complete_count * 100) / $total;
                            }


                            $project_dead_line = strtotime($project->project_end_date);
                            $now = time();
                            //$remain_dates = timespan($now, $project_dead_line);
                            ?> 
                            <tr  id="projects_<?php echo $project->project_id; ?>">
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $project->project_name; ?></td>
                                <td><?php echo $project->employee_fname . ' ' . $project->employee_lname; ?></td>
                                <td>
                                    <?php
                                    if ($project->project_end_date == "0000-00-00") {
                                        echo 'Not Set';
                                    } else {
                                        echo date('d M Y', strtotime($project->project_end_date));
                                    }
                                    ?>
                                </td>

                                <td valign="middle">
                                    <?php
                                    if ($progress == 100) {
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="<?php echo $progress; ?>%" style="width: 79%;"></div>

                                        </div>
                                        <?php
                                    } else if ($progress == 0) {
                                        ?>
                                        <div class="progress">
                                            <div data-percentage="<?php echo $progress; ?>%" id="" class="progress-bar progress-bar-danger animate-progress-bar"></div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="progress">
                                            <div data-percentage="<?php echo $progress; ?>%" id="" class="progress-bar progress-bar-warning animate-progress-bar"></div>
                                        </div>
                                    <?php } ?>
                                </td>

                            </tr>
                        <?php } ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#reports_parent_menu').addClass('active open');
</script>
