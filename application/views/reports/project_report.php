
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple">
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

                <button id="report_project_search_btn" style="margin-left:12px" name="report_project_search_btn" class="btn btn-primary"><i class="fa fa-search"></i></button>

                <div class="clearfix"></div>


                <div class="grid-body ">
                    <table class="table"  >
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
                                    <td><?php echo++$i; ?></td>
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

                                    

                                </tr>
                            <?php } ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    $('#reports_parent_menu').addClass('active open');
</script>
