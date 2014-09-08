
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a>  <a href="javascript:;" class="reload"></a> </div>
            </div>
            <div class="grid-body ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form id="edit_skill_matrix_form" name="edit_skill_matrix_form">

                            <div class="form-group">
                                <label class="form-label">Skill Category</label>
                                <span style="color: red">*</span>                       

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="skill_cat_code" id="skill_cat_code" class="select2 form-control" style="width: 30%" >
                                        <option value="">-- Select Skill Category --</option>
                                        <?php foreach ($skill_categories as $skill_category) {
                                            ?> 
                                            <option value="<?php echo $skill_category->skill_cat_code; ?>" <?php if ($employee_skill_detail->skill_cat_code == $skill_category->skill_cat_code) { ?> selected="true" <?php } ?>><?php echo $skill_category->skill_cat_name; ?></option>
                                        <?php } ?>
                                    </select>                            
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Skill</label>
                                <span style="color: red">*</span>
                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="skill_code" id="skill_code" class="select2 form-control"  style="width: 50%">
                                        <?php foreach ($skills as $skill) {
                                            ?> 
                                            <option value="<?php echo $skill->skill_code; ?>" <?php if ($skill->skill_code == $employee_skill->skill_code) { ?> selected="true" <?php } ?>><?php echo $skill->skill_name; ?></option>
                                        <?php } ?>
                                    </select>    
                                </div>
                            </div>



                            <div class="form-group">
                                <label class="form-label">Expert Level</label>
                                <span style="color: red">*</span>
                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <div class="slider sucess">
                                        <input type="text" class="slider-element form-control" value="" data-slider-min="1" data-slider-max="70" data-slider-step="1" data-slider-value="50" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="hide">
                                    </div>
                                </div>

                            </div>



                            <div class="form-group">
                                <label class="form-label">References</label>
                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="references" class="form-control" type="text" name="references" value="<?php echo $employee_skill->reference; ?>" style="width: 50%">                                         
                                </div>

                            </div>

                            <div id="edit_skill_matrix_msg" class="form-row"> </div>

                            <input type="hidden" id="employee_skill_id" name="employee_skill_id" value="<?php echo $employee_skill->employee_skill_id; ?>"/>

                            <div class="modal-footer">
                                <button class="btn btn-primary btn-cons" type="submit">
                                    <i class="icon-ok"></i>
                                    Save
                                </button>
                                <a href="<?php echo site_url(); ?>/skill_matrix/skill_matrix_controller/manage_skill_matrix" class="btn btn-white btn-cons" type="button">Cancel</a>
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
    $(document).ready(function() {

        $('.slider-element').slider();
    });
</script>




