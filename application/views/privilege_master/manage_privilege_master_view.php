<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <table class="table" id="privilege_table" >
                    <thead>
                        <tr>
                            <th>Master Privilege ID</th>
                            <th>Master Privilege</th>
                            <th>Description</th>
                            <th>Options</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($privilege_masters as $privilege_master) {
                            ?> 
                            <tr  id="privilege_master_<?php echo $privilege_master->privilege_master_code; ?>">
                                <td><?php echo $privilege_master->privilege_master_code; ?></td>
                                <td><?php echo $privilege_master->master_privilege; ?></td>
                                <td><?php echo $privilege_master->master_privilege_description; ?></td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/settings/privilege_controller/edit_privilege_master_view/<?php echo $privilege_master->privilege_master_code; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Master Privilege" onclick="delete_privilege_master(<?php echo $privilege_master->privilege_master_code; ?>)">
                                        <i class="fa fa-times"></i>
                                    </a>

                                </td>
                            </tr>
                        <?php } ?>    

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

