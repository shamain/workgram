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
                            <th>Privilege ID</th>
                            <th>Master Privilege</th>
                            <th>Privilege</th>
                            <th>Human Friendly Code</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($privileges as $privilege) {
                            ?> 
                            <tr  id="privileges_<?php echo $privilege->privilege_code; ?>">
                                <td><?php echo $privilege->privilege_code; ?></td>
                                <td><?php echo $privilege->master_privilege; ?></td>
                                <td><?php echo $privilege->privilege; ?></td>
                                <td><?php echo $privilege->priviledge_code_HF; ?></td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/settings/privilege_controller/edit_privileges_view/<?php echo $privilege->privilege_code; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Privilege" onclick="delete_privilege(<?php echo $privilege->privilege_code; ?>)">
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



<div class="grid_4">
    <div class="da-panel collapsible">
        <div class="da-panel-header">
            <span class="da-panel-title">
                <img src="<?php echo base_url(); ?>/application_resources/images/icons/black/16/list.png" alt="" />
                <?php echo $title; ?>            
                <?php if (Access_controllerservice :: checkAccess('ADD_MASTER_PRIVILEGES')) { ?>   <span style="float:right;padding-right:10px;">    <button id="da-ex-dialog-add_master_priviledge_form" class="da-button blue">Add a new Master Priviledge</button></span> <?php } ?>

                <div id="da-ex-dialog-add_master_priviledge_form-div" class="no-padding">
                    <form id="add_master_priviledge_form" class="da-form" name="add_employee_from">
                        <div id="da-validate-error" class="da-message error" style="display:none;"></div>
                        <div class="da-form-inline">

                            <div class="da-form-row">
                                <label>LCS System</label>
                                <div class="da-form-item small">
                                    <select id="Main_System_Code" name="Main_System_Code">

                                        <!-- <option value="">Please Select</option>  -->
                                        <?php foreach ($systems as $rowsystems) {
                                            ?> 
                                            <option value="<?php echo $rowsystems->System_Code; ?>"><?php echo $rowsystems->System; ?></option>
                                        <?php } ?>
                                    </select>
                                </div>
                            </div>

                            <div class="da-form-row">
                                <label>Master Priviledge</label>
                                <div class="da-form-item large">
                                    <input type="text" name="Master_Privilege" id="Master_Privilege" />
                                </div>
                            </div>


                            <div class="da-form-row">
                                <label>Master Priviledge Description</label>
                                <div class="da-form-item large">
                                    <input type="text" name="Master_Privilege_Description"  id="Master_Privilege_Description" />
                                </div>
                            </div>






                        </div>
                    </form>
                    <div class="da-form-row" id="msg">

                    </div>


                </div>



            </span>

        </div>
        <div class="da-panel-content">
            <table id="da-ex-datatable-numberpaging" class="da-table">
                <thead>
                    <tr>
                        <th width="71">Master Priviledge ID</th>
                        <th width="61">Main System</th>
                        <th width="153">Master Priviledge</th>
                        <th width="102">Options</th>
                    </tr>
                </thead>
                <tbody>
                    <?php
                    foreach ($master_priviledges as $rowmasterpriviledges) {
                        ?> 
                        <tr id="master_priviledges_<?php echo $rowmasterpriviledges->Privilege_Master_Code; ?>">

                            <td><?php echo $rowmasterpriviledges->Privilege_Master_Code; ?></td>
                            <td><?php echo $rowmasterpriviledges->System; ?></td>
                            <td><?php echo $rowmasterpriviledges->Master_Privilege; ?></td>

                            <td>

                                <?php if (Access_controllerservice :: checkAccess('EDIT_MASTER_PRIVILEGES')) { ?> 
                                    <a href="<?php echo site_url(); ?>/master_priviledges/edit_master_priviledges_view/<?php echo $rowmasterpriviledges->Privilege_Master_Code; ?>"><img src="<?php echo base_url(); ?>/application_resources/images/icons/color/pencil.png" /></a>
                                <?php } ?> 
                                <?php if (Access_controllerservice :: checkAccess('DELETE_MASTER_PRIVILEGES')) { ?>
                                    <a style="cursor: pointer;"  
                                       id="btn_<?php echo $rowmasterpriviledges->Privilege_Master_Code; ?>"  title="Delete this Master Priviledge" onclick="deletemasterpriviledge(<?php echo $rowmasterpriviledges->Privilege_Master_Code; ?>)">
                                        <img src="<?php echo base_url(); ?>/application_resources/images/icons/color/cross.png" /></a>
                                <?php } ?> 


                            </td>
                        </tr>




                    <?php } ?>    

                </tbody>
            </table>
        </div>
    </div>
</div>






<script type="text/javascript">
    $('#priviledges_parent_menu').addClass('active');
    $('#priviledges_sub_menu').removeClass('closed');

</script>                                  
