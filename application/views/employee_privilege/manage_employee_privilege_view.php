<div class="page-title">	
    <h3><?php echo $heading . ' - ' . ucfirst($employee_detail->employee_fname) ?><span class="semi-bold"><?php echo ucfirst($employee_detail->employee_lname); ?></h3>		
</div>

<?php
$privilege_master_service = new Privilege_master_service();
$privilege_service = new Privilege_service();

$a = 0;
foreach ($systems as $system) {
    ++$a;
    ?> 
    <span><?php $system->system; ?></span> 
    <?php
    $privi_masters = $privilege_master_service->get_privilege_master_by_system_code($system->system_code);
    if (count($privi_masters) != 0) {
        foreach ($privilege_masters as $privilege_master) {
            ?>
            <h2 ><?php echo $privilege_master->master_privilege; ?></h2>

            <div class="da-form-item">


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

        <?php } ?>
    <?php } ?>
<?php } ?>

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
                    <div class="row-fluid column-seperation">
                        <div class="span6">
                            <h3><span class="semi-bold">Sometimes</span> Small 
                                things in life means 
                                the most</h3>
                        </div>
                        <div class="span6">
                            <h3 class="semi-bold">great tabs</h3>
                            <p class="light">default, the textarea element comes with a vertical scrollbar (and maybe even a horizontal scrollbar). This vertical scrollbar enables the user to continue entering and reviewing their text (by scrolling up and down).</p>
                        </div>
                    </div>
                </div>
            <?php } ?>
        </div>
    </div>
</div>


