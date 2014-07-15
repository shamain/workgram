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
                <table class="table" id="skill_table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Skill Name</th>
                            <th>Skill Category</th>                  
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($skills as $skill) {
                            ?> 
                            <tr  id="skills_<?php echo $skill->skill_code; ?>">
                                <td><?php echo++$i; ?></td>
                                <td><?php echo $skill->skill_name; ?></td>
                                <td>
                                    <?php echo $skill->skill_cat_name; ?> 

                                </td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/skill/skill_controller/edit_skill_view/<?php echo $skill->skill_code; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Skill" onclick="delete_skill(<?php echo $skill->skill_code; ?>)">
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

<!-- Modal -->
<div class="modal fade" id="add_skill_modal" tabindex="-1" role="dialog" aria-labelledby="add_skill_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_skill_form" name="add_skill_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-users fa-4x"></i>
                    <h4 id="add_skill_modalLabel" class="semi-bold text-white">Add new Skill</h4>
                    <p class="no-margin text-white">Choose a Skill category and make this a child of it.</p>
                    <br>
                </div>
                <div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Skill Category</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <select name="skill_cat_code" id="skill_cat_code" class="select2 form-control"  >
                                    <?php foreach ($skill_categories as $skill_category) {
                                        ?> 
                                        <option value="<?php echo $skill_category->skill_cat_code; ?>"><?php echo $skill_category->skill_cat_name; ?></option>
                                    <?php } ?>
                                </select>                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Skill Name</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="skill_name" class="form-control" type="text" name="skill_name">                              
                            </div>
                        </div>
                    </div>
                </div>
                <div id="add_skill_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>

    </div>

</div>
