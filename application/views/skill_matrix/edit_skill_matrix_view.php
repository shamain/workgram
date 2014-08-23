
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
                        <form id="edit_skill_matrix_form" name="edit_skill_matrix_form">

                           <div class="form-group">
                                <label class="form-label">Skill Name</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="skill_matrix_name" class="form-control" type="text" name="skill_matrix_name" value="<?php echo $assigned_skill->skill_code; ?>" style="width: 50%">                              
                                </div>
                            </div>
                            
                             <div class="form-group">

                                <label class="form-label">Expert Level</label>
                                <span style="color: red">*</span>


                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <div class="slider sucess">
                                         <input id="expert_level" class="form-control" type="text" name="expert_level" value="<?php echo $assigned_skill->expert_level; ?>" style="width: 50%">              
                                    </div>
                                </div>

                            </div>

                            
                               <div class="form-group">
                                <label class="form-label">References</label>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="references" class="form-control" type="text" name="references" value="<?php echo $assigned_skill->references; ?>" style="width: 50%">                       
                                </div>
                            </div>
                            
                            <div id="edit_skill_matrix_msg" class="form-row"> </div>
                            

                            <input id="employee_skill_id" class="form-control" type="hidden" name="employee_skill_id" value="<?php echo $assigned_skill->employee_skill_id; ?>" style="width: 50%"> 

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
    $('#skill_matrix_parent_menu').addClass('active open');
</script>



