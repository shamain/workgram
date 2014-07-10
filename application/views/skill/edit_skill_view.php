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

                            <div class="row form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Skill Category Code</label>
                                        <span style="color: red">*</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-with-icon  right">                                       
                                        <i class=""></i>
                                        <input id="skill_cat_code" class="form-control" type="text" name="skill_cat_code" value="<?php echo $skill->skill_cat_code; ?>" >                              
                                    </div>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Skill Name</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="skill_name" class="form-control" type="text" name="skill_name" value="<?php echo $skill->skill_name; ?>" onkeyup="auto_write_skill_cat_code()">                              
                                </div>
                            </div>


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







