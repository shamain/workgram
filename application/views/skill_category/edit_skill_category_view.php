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
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form id="edit_skill_category_form" name="edit_skill_category_form">

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
                                        <input id="skill_cat_name" class="form-control" type="text" name="skill_cat_name" value="<?php echo $skill_category->skill_cat_name; ?>" style="width: 50%">                              
                                        <input id="skill_cat_code" class="form-control" type="hidden" name="skill_cat_code" value="<?php echo $skill_category->skill_cat_code; ?>" >                              
                                    </div>
                                </div>
                            </div>

                            <div class="row form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Color</label>
                                        <span style="color: red">*</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-with-icon  right">                                       
                                        <i class=""></i>
                                        <input autocomplete="false" data-color="rgb(255, 255, 255)" data-color-format="hex" id="colour" class="form-control skill_cat_colour_picker" type="text" name="colour" value="<?php echo $skill_category->colour; ?>" style="width: 50%">                              
                                    </div>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary btn-cons" type="submit">
                                    <i class="icon-ok"></i>
                                    Save
                                </button>
                                <a href="<?php echo site_url(); ?>/skill/skill_category_controller/manage_skill_category" class="btn btn-white btn-cons" type="button">Cancel</a>
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




