
<!--Chart-->
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>
<div class="row">
    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-body no-border">
                <h4>Find out the skills of other <span class="semi-bold"> employees</span></h4>
                <p></p>
                <br>
                <div id="my_skill_matrix_chart" style="height:250px"></div>
            </div>
        </div>
    </div>
</div>

<!--My Skills table-->

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-body ">
                <table class="table" id="my_skill_table" >
                    <thead>
                        <tr>  
                            <th>ID</th>                    
                            <th>Skill</th>
                            <th>Expert Level</th> 
                            <th>References</th> 
                            <th>Actions</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($assigned_skills as $assigned_skill) {
                            ?> 
                            <tr  id="skills_<?php echo $assigned_skill->employee_skill_id; ?>">
                                <td><?php echo++$i; ?></td>
                                <td><?php echo $assigned_skill->skill_name; ?>

                                <td>
                                    <?php echo $assigned_skill->expert_level; ?> 

                                </td>
                                <td>
                                    <?php echo $assigned_skill->reference; ?> 
                                </td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/skill/skill_controller/edit_skill_view/<?php echo $assigned_skill->employee_skill_id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Skill" onclick="delete_employee_skill(<?php echo $assigned_skill->employee_skill_id; ?>)">
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

<!--Add new Skill Form-->

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
                        <form id="add_employee_skill_form" name="add_employee_skill_form">


                            <div class="form-group">
                                <label class="form-label">Skill Category</label>
                                <span style="color: red">*</span>                       

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="skill_cat_code" id="skill_cat_code" class="select2 form-control" style="width: 30%" >
                                        <?php foreach ($skill_categories as $skill_category) {
                                            ?> 
                                            <option value="<?php echo $skill_category->skill_cat_code; ?>"><?php echo $skill_category->skill_cat_name; ?></option>
                                        <?php } ?>
                                    </select>                            
                                </div>
                            </div>

                            <div class="form-group">

                                <label class="form-label">Skill</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <!--<input id="skill_code" class="form-control" type="text" name="skill_code" >-->  
                                    <select name="skill_code" id="skill_code" class="select2 form-control" style="width: 30%" >

                                        <?php foreach ($skills as $skill) {
                                            ?> 

                                            <option value="<?php echo $skill->skill_code; ?>"><?php echo $skill->skill_name; ?></option>
                                        <?php } ?>
       <!--<input id="skill_code" class="form-control" type="text" name="skill_code" >-->  
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
                                    <input id="reference" class="form-control" type="text" name="reference" style="width: 50%">                              
                                </div>
                            </div>

                            <div id="add_emp_skill_msg" class="form-row"> </div>

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





<script>

                                            $(document).ready(function() {

                                                $('.slider-element').slider();
                                            });

</script>