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
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <form id="edit_skill_form" name="edit_skill_form">

                            <div class="form-group">

                                <label class="form-label">Skill Category</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="skill_cat_code" id="skill_cat_code" class="select2 form-control"  >
                                        <?php foreach ($skill_categories as $skill_category) {
                                            ?> 
                                        <option value="<?php echo $skill_category->skill_cat_code; ?>"  <?php if($skill_category->skill_cat_code == $skill->skill_cat_code ){?> selected="true" <?php } ?>><?php echo $skill_category->skill_cat_name; ?></option>
                                        <?php } ?>
                                    </select>                              
                                </div>

                            </div>
                            <div class="form-group">
                                <label class="form-label">Skill Name</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="skill_name" class="form-control" type="text" name="skill_name" value="<?php echo $skill->skill_name; ?>" >                              
                                </div>
                            </div>

                            <input id="skill_code" class="form-control" type="hidden" name="skill_code" value="<?php echo $skill->skill_code; ?>" > 

                            <div class="form-actions">
                                <div class="pull-right">
                                    <button class="btn btn-primary btn-cons" type="submit">
                                        <i class="icon-ok"></i>
                                        Save
                                    </button>
                                    <button class="btn btn-white btn-cons" type="button">Cancel</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
                                        $('#skill_parent_menu').addClass('active open');
</script>







