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
                <table class="table" id="skill_category_table" >
                    <thead>
                        <tr>
                            <th>Skill category code</th>
                            <th>Skill category name</th>    
                            <th>System</th>
                            <th>Options</th>

                        </tr>
                        </thead>
                    <tbody>
                        <?php
                        foreach ($skill_categories as $skill_category) {
                            ?> 
                            <tr  id="skill_category_<?php echo $skill_category->skill_cat_code; ?>">
                                <td><?php echo $skill_category->skill_cat_code; ?></td>
                                <td><?php echo $skill_category->skill_cat_name; ?></td>  
                               <td>
                                    <?php echo  $skill_category->system;?> 
                                       
                                </td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/settings/skill_category_controller/edit_skill_category_view/<?php echo $skill_category->skill_cat_code; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Skill category" onclick="delete_skill_category(<?php echo $skill_category->skill_cat_code; ?>)">
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



<div class="modal fade" id="add_skill_category_model" tabindex="-1" role="dialog" aria-labelledby="add_skill_category_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_skill_category_master_form" name="add_skill_category_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-eye fa-4x"></i>
                    <h4 id="add_skill_category_modalLabel" class="semi-bold text-white">Add new Skill category</h4
                    <br>
                </div>
                <div class="modal-body">

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Skill category</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="skill_category" class="form-control" type="text" name="skill_category" >                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Skill category Name</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                       <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="skill_category_desc" class="form-control" type="text" name="skill_category_desc">                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">System</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <select name="system_code" id="system_code" class="select2 form-control"  >
                                    <?php foreach ($systems as $system) { ?>
                                        <option value="<?php echo $system->system_code;?>" ><?php echo $system->system;?></option>
                                    <?php } ?>
                                </select>                              
                            </div>
                        </div>
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>        
    </div>   
</div>


