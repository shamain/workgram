<div class="page-title">	
    <h3><?php echo $heading . ' - ' . ucfirst($employee_detail->employee_fname) ?>&nbsp;<span class="semi-bold"><?php echo ucfirst($employee_detail->employee_lname); ?></h3>		
</div>


<div class="col-md-12">
    <ul class="nav nav-tabs" id="emp_privi_tab">
        <?php
        $privilege_master_service = new Privilege_master_service();
        $privilege_service = new Privilege_service();

        $a = 0;
        foreach ($systems as $system) {
            ++$a;
            ?>
            <li <?php if ($a == 1) { ?>class="active" <?php } ?>>
                <a href="#tabs-<?php echo $a; ?>"><span class="semi-bold"><?php echo $system->system; ?></span></a>
            </li>
        <?php } ?>
    </ul>

    <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> </div>
    <div class="tab-content">
        <?php
        $a = 0;
        foreach ($systems as $system) {
            ++$a;
            ?>
            <div class="tab-pane <?php if ($a == 1) { ?> active <?php } ?>" id="tabs-<?php echo $a; ?>">
                <div class="row">
                    <div class="col-md-12">
                        <?php
                        $privilege_masters = $privilege_master_service->get_privilege_master_by_system_code($system->system_code);
                        if (count($privilege_masters) != 0) {
                            ?> 
                            <div class="divcls" >
                                <div class="row-fluid">
                                    <div class="checkbox check-primary">
                                        <div id="msgsystem<?php echo $system->system_code; ?>" class="msgsystem"></div>
                                        <div id="loader_ajax_check_all_hrm<?php echo $system->system_code; ?>" class="loader_ajax_check_all_hrm"> </div>
                                        <input type="checkbox" value="<?php echo $system->system_code; ?>" onclick="save_privileges_from_system(<?php echo $system->system_code; ?>,<?php echo $employee_detail->employee_code; ?>)" name="privilegessystem[]" id="privilegesystem<?php echo $system->system_code; ?>" class="checkbox msgsystemchk<?php echo $system->system_code; ?>">
                                        <label for="privilegesystem<?php echo $system->system_code; ?>">Select All - <?php echo $system->system; ?> </label>

                                    </div>
                                </div>
                            </div>
                            <hr width="100%">
                            <?php foreach ($privilege_masters as $privilege_master) {
                                ?>
                                <div>
                                    <h4><span class="semi-bold"><?php echo $privilege_master->master_privilege; ?></span></h4>

                                    <p>
                                        <?php
                                        $privileges = $privilege_service->get_privileges_by_master_privilege_assigned_for($privilege_master->privilege_master_code, $employee_detail->employee_type);

                                        foreach ($privileges as $privilege) {
                                            ?>

                                        <div class="divcls" >
                                            <div class="row-fluid">
                                                <div class="checkbox check-primary">
                                                    <input <?php
                                                    if (in_array($privilege->privilege_code, $assigned_privileges)) {
                                                        echo 'checked="checked"';
                                                    }
                                                    ?>  type="checkbox" value="<?php echo $privilege->privilege_code; ?>" onclick="save_privileges_from_user(<?php echo $privilege->privilege_code; ?>,<?php echo $employee_code; ?>)" name="privileges[]" id="privilege<?php echo $privilege->privilege_code; ?>" class="checkbox chkbox<?php echo $system->system_code; ?>">
                                                    <label for="privilege<?php echo $privilege->privilege_code; ?>"><?php echo $privilege->privilege; ?></label>
                                                    <div id="msg<?php echo $privilege->privilege_code; ?>" class="msgdisplay"></div>
                                                </div>
                                            </div>


                                        </div>
                                    <?php } ?>
                                    </p>
                                </div>
                                <hr width="100%"/>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            </div>
        <?php } ?>
    </div>
</div>



