<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div id="work_snap_filters" class="pull-left">
        <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Employee</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu">
                <li class="active" data-filter="all" data-dimension="region"><a href="#">All</a></li>
                <?php
                foreach ($employees as $employee) {
                    ?>
                    <li data-filter = "alaska" data-dimension = "region"><a href = "#"><?php echo ucfirst($employee->employee_fname . ' ' . $employee->employee_lname); ?></a></li>
                <?php }
                ?>
            </ul>
        </div>
        <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Project</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu">
                <li class="active" data-filter="all" data-dimension="recreation"><a href="#">All</a></li>

                <?php
                foreach ($projects as $project) {
                    ?>
                    <li data-filter = "alaska" data-dimension = "region"><a href = "#"><?php echo ucfirst($project->project_name); ?></a></li>
                <?php }
                ?>


            </ul>
        </div>
        <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Task</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu">
                <li class="active" data-filter="all" data-dimension="region"><a href="#">All</a></li>
                <?php
                foreach ($tasks as $task) {
                    ?>
                    <li data-filter = "alaska" data-dimension = "region"><a href = "#"><?php echo ucfirst($task->task_id . ' ' . $task->task_name); ?></a></li>
                <?php }
                ?>
            </ul>
        </div>
    </div>

    <div class="pull-right">
        <div class="btn-group" data-toggle="buttons-radio">
            <button id="ToList" class="btn btn-primary active" type="button">
                <i class="fa fa-th-list"></i>
            </button>
            <button id="ToGrid" class="btn btn-primary" type="button">
                <i class="fa fa-th-large"></i>
            </button>
        </div>
    </div>
    <div class="clearfix"></div>

    <div id="Parks" class="just list">
        <div class="list_header">

            <div id="sortByName" class="meta name active desc">
                Employee
                <span class="sort anim150 asc" data-order="desc" data-sort="data-name"></span>
                <span class="sort anim150 desc active" data-order="asc" data-sort="data-name"></span>
            </div>
            <div class="meta region">
                Project
            </div>
            <div class="meta rec">
                Task
            </div>

            <div id="SortByArea" class="meta area">
                Date 
                <span class="sort anim150 asc" data-order="asc" data-sort="data-area"></span>
                <span class="sort anim150 desc" data-order="desc" data-sort="data-area"></span>
            </div>
            <div class="meta rec">
                <div class="checkbox check-primary checkbox-circle">
                    <input id="checkbox9" type="checkbox" checked="checked" value="1">
                    <label for="checkbox9">Mark</label>
                </div>
            </div>

        </div>



        <ul>
            <?php for ($i = 0; $i < 10; $i++) { ?>
                <li class="mix northeast camping climbing fishing swimming" data-name="Acadia" data-area="47452.80">

                    <div class="meta name">
                        <div class="img_wrapper"> <img src="<?php echo base_url(); ?>application_resources/img/others/acadia.jpg" alt="" /> </div>
                        <div class="titles">
                            <h2>Acadia</h2>
                            <p><em>Maine</em></p>
                        </div>
                    </div>
                    <div class="meta region">
                        <p>Northeast</p>
                    </div>
                    <div class="meta rec">
                        <ul>
                            <li>Camping</li>
                            <li>Climbing</li>
                            <li>Fishing</li>
                            <li>Swimming</li>
                        </ul>
                    </div>
                    <div class="meta area">
                        <p>47,452.80</p>
                    </div>

                    <div class="meta rec">
                        <div class="checkbox check-primary checkbox-circle">
                            <input id="checkbox9" type="checkbox" checked="checked" value="1">
                            <label for="checkbox9">Mark</label>
                        </div>
                    </div>
                </li>
            <?php } ?>
            <!-- END LIST OF PARKS -->
        </ul>


    </div>
</div>


































</div>