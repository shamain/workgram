
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
<div class="row">
    <div class="row-fluid">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-body ">
                    <table class="table" id="my_skill_table" >
                        <thead>
                            <tr>  
                                <th>ID</th>      
                                <th>Skill Category</th>                  
                                <th>Skill</th>
                                <th>Expert Level</th> 
                                <th></th> 
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($skills as $skill) {
                                ?> 
                                <tr  id="skills_<?php echo $skill->skill_code; ?>">
                                    <td><?php echo++$i; ?></td>
                                    <td><?php echo $skill->skill_cat_name; ?>
                                       
                                    <td>
                                        <?php echo $skill->skill_name; ?> 

                                    </td>
                                    <td></td>
                                    <td>
                                        <a href="<?php echo site_url(); ?>/skill/skill_controller/edit_skill_view/<?php echo $skill->skill_code; ?>">
                                            <i class="fa fa-pencil"></i>
                                        </a>
                                        <a style="cursor: pointer;"   title="Delete this Skill" onclick="delete_employee_skill(<?php echo $skill->skill_code; ?>)">
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
                    <div class="col-md-4 col-sm-4 col-xs-4">
                        <form id="add_employee_skill_form" name="add_employee_skill_form">


                            <div class="form-group">
                                <label class="form-label">Skill Category</label>
                                <span style="color: red">*</span>                       

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

                            <div class="form-group">

                                <label class="form-label">Skill</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <!--<input id="skill_code" class="form-control" type="text" name="skill_code" >-->  
                                    <select name="skill_code" id="skill_code" class="select2 form-control"  >
                              
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
                                    <div class="slider primary col-md-8">
                                        <div class="slider slider-horizontal" style="width: 210px;">
                                            <div class="slider-track">
                                                <div class="slider-selection"></div>
                                                <div class="slider-handle round"></div>
                                                <div class="slider-handle round hide" style="left: 100%;"></div>
                                                    
                                            
                                            <input type="text" class="slider-element form-control" value="" data-slider-value="60" data-slider-step="1" data-slider-max="70" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="hide">
                                        </div>
                                    </div>


                                </div>
                            </div>

                                <br><br><br>

                            <div class="form-group">
                                <label class="form-label">References</label>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="link" class="form-control" type="text" name="link" >                              
                                </div>
                            </div>

                            <div id="add_emp_skill_msg" class="form-row"> </div>
                            <div class="form-actions">
                                <div class="pull-right">
                                    <button class="btn btn-primary btn-cons" type="submit">
                                        <i class="icon-ok"></i>
                                        Save
                                    </button>
                                    <button class="btn btn-white btn-cons" type="button">Clear</button>
                                </div>
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



