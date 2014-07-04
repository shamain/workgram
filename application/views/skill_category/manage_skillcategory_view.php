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
                <table class="table" id="skillcategory_table" >
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Skill category code</th>
                            <th>Skill category name</th>                       
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($skillcategories as $skillcategory) {
                            ?> 
                            <tr  id="skillcategory_<?php echo $skill_category->skill_cat_code; ?>">
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $skill_category->skill_cat_name; ?></td>

                                <td>

                                    <a href="<?php echo site_url(); ?>/skill/skill_category_controller/edit_sillcategory_view/<?php echo $skill_category->skill_cat_code; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this skill category" onclick="delete_skill_category(<?php echo $companyskill_category->skill_cat_code; ?>)">
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
<div class="modal fade" id="add_skill_category_modal" tabindex="-1" role="dialog" aria-labelledby="add_skill_category_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_skill_category_form" name="add_skill_category_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_skill_category_modalLabel" class="semi-bold text-white">It's a new skill category</h4>
                    <p class="no-margin text-white">Include skill category details here.</p>
                    <br>
                </div>
                <div class="modal-body">

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Skill category code</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="skill_cat_code" class="form-control" type="text" name="skill_cat_code">                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Skill category name</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="skill_cat_name" class="form-control" type="text" name="skill_cat_name">                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Added by</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="added_by" class="form-control" type="text" name="added_by">                              
                            </div>
                        </div>
                    </div>

                    <div id="add_skill_category_msg" class="form-row"> </div>
                    <div class="modal-footer">
                        <button type="submit" class="btn btn-primary">Save</button>
                        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                    </div>

            </form>
        </div>

    </div>

</div>



