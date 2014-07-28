
<!--Chart-->
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>
<div class="row">
    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-body no-border">
                <h4>Ordered Bar <span class="semi-bold"> Charts</span></h4>
                <p>Bar charts are powered by flot plugin, here is ordered stack bar chart with a legend in it. Everything in this chart is customizable</p>
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
                                <th>Design</th>      
                                <th>Development</th>                  
                                <th>Marketing</th>
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


    <!--Add new Skill Form-->
    <div class="modal fade" id="add_new_skill" tabindex="-1" role="dialog" aria-labelledby="add_new_skill_modalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header tiles green">


                    <i class="fa fa-users fa-4x"></i>
                    <h4 id="add_new_skill_modalLabel" class="semi-bold text-white">Add new Skill</h4>

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
                                <label class="form-label">Skill</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <select name="skill_code" id="skill_code" class="select2 form-control"  >
                                    <?php foreach ($skills as $skills) {
                                        ?> 
                                        <option value="<?php echo $skills->skill_code; ?>"><?php echo $skills->skill_name; ?></option>
                                    <?php } ?>
                                </select>                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Expert Level</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="row">
                            <div class="slider primary col-md-8">
                                <div class="slider slider-horizontal" style="width: 210px;">
                                    <div class="slider-track">
                                        <div class="slider-selection" style="left: 85.5072463768116%; width: 14.492753623188406%;"></div>
                                        <div class="slider-handle round" style="left: 85.5072463768116%;"></div>
                                        <div class="slider-handle round hide" style="left: 100%;"></div>

                                    </div>
                                    <div class="tooltip top hide" style="top: -36px; left: 163.56521739130437px;">
                                        <div class="tooltip-arrow"></div>
                                        <div class="tooltip-inner">60</div>

                                    </div>
                                    <input type="text" class="slider-element form-control" value="" data-slider-min="1" data-slider-max="70" data-slider-step="1" data-slider-value="60" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="hide">
                                </div>
                            </div>
                        </div>   
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">References</label>
                                <span style="color: red">*</span>
                                <div class="controls">
                                    <input type="text" class="form-control" id="link">
                                </div>
                            </div>
                        </div>
                    </div>

                </div>
            </div>
            <div id="add_skill_msg" class="form-row"> </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary">Add</button>
                <button type="button" class="btn btn-default" data-dismiss="modal">Clear</button>

            </div>
        </div>
    </div>
</div>
