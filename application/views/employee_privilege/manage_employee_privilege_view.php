<div class="page-title">	
    <h3><?php echo $heading . ' - ' . ucfirst($employee_detail->employee_fname) ?><span class="semi-bold"><?php echo ucfirst($employee_detail->employee_lname); ?></h3>		
</div>

<div class="row-fluid">
    <div class="span6">
        <ul class="nav nav-tabs" id="tab-01">
            <?php
            $privilege_master_service = new Privilege_master_service();
            $privilege_service = new Privilege_service();

            $a = 0;
            foreach ($systems as $system) {
                ++$a;
                ?>
                <li class="active">
                    <a href="#tabs-<?php echo $a; ?>"><?php $system->system; ?></a>
                </li>
            <?php } ?>
        </ul>

        <div class="tools"> 
            <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
        <div class="tab-content">
            <?php
            $a = 0;
            foreach ($systems as $system) {
                ++$a;
                ?>
                <div class="tab-pane active" id="tabs-<?php echo $a; ?>">
                    <div class="row-fluid row-seperation">
                        <?php
                        $privilege_masters = $privilege_master_service->get_privilege_master_by_system_code($system->system_code);
                        if (count($privilege_masters) != 0) {
                            foreach ($privilege_masters as $privilege_master) {
                                ?>
                                <div class="span6">
                                    <h3><span class="semi-bold"><?php echo $privilege_master->master_privilege; ?></span> Small 
                                        things in life means 
                                        the most</h3>

                                    <div>
                                        <?php
                                        $privileges = $privilege_service->get_privileges_by_master_privilege($id);

                                        foreach ($privileges as $privilege) {
                                            ?>

                                            <div class="divcls" ><input <?php
                                                if (in_array($privilege->privilege_code, $assigned_privileges)) {
                                                    echo 'checked="checked"';
                                                }
                                                ?>  type="checkbox" value="<?php echo $privilege->privilege_code; ?>" onclick="saveprivilegesfromuser(<?php echo $privilege->privilege_code; ?>,<?php echo $employee_id; ?>)" name="privileges[]" id="privilege<?php echo $privilege->privilege_code; ?>" class="chkbox<?php echo $system->system_code; ?>">
                                                <label><?php echo $privilege->privilege; ?></label>
                                                <div id="msg<?php echo $privilege->privilege_code; ?>" class="msgdisplay"></div>
                                            </div>
                                        <?php } ?>
                                    </div>
                                </div>
                                <?php
                            }
                        }
                        ?>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


