
<!--Chart-->
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>
<div class="col-md-9">
    <div class="grid simple">
        <div class="grid-title no-border">
            <h4>Skill Matrix</h4>
            <div class="tools"> 
                <a href="javascript:;" class="collapse"></a> 
                <a href="#grid-config" data-toggle="modal" class="config"></a>
                <a href="javascript:;" class="reload"></a> 
                <a href="javascript:;" class="remove"></a> 
            </div>
        </div>
        <div class="grid-body no-border">


            <br>
            <div id="placeholder-bar-chart" style="height: 250px; padding: 0px; position: relative;">
                <canvas class="base" width="457" height="250"></canvas>
                <canvas class="overlay" width="457" height="250" style="position: absolute; left: 0px; top: 0px;"></canvas>
                <div class="tickLabels" style="font-size:smaller">
                    <div class="xAxis x1Axis" style="color:#545454">
                        <div class="tickLabel" style="position:absolute;text-align:center;left:42px;top:234px;width:65px">Jan</div>
                        <div class="tickLabel" style="position:absolute;text-align:center;left:127px;top:234px;width:65px">Feb</div>
                        <div class="tickLabel" style="position:absolute;text-align:center;left:207px;top:234px;width:65px">Mar</div>
                        <div class="tickLabel" style="position:absolute;text-align:center;left:292px;top:234px;width:65px">Apr</div>
                        <div class="tickLabel" style="position:absolute;text-align:center;left:374px;top:234px;width:65px">May</div> 
                    </div>
                    <div class="yAxis y1Axis" style="color:#545454">
                        <div class="tickLabel" style="position:absolute;text-align:right;top:217px;right:439px;width:18px">0</div>
                        <div class="tickLabel" style="position:absolute;text-align:right;top:173px;right:439px;width:18px">25</div>
                        <div class="tickLabel" style="position:absolute;text-align:right;top:129px;right:439px;width:18px">50</div>
                        <div class="tickLabel" style="position:absolute;text-align:right;top:84px;right:439px;width:18px">75</div>
                        <div class="tickLabel" style="position:absolute;text-align:right;top:40px;right:439px;width:18px">100</div>
                        <div class="tickLabel" style="position:absolute;text-align:right;top:-4px;right:439px;width:18px">125</div>

                    </div>

                </div>
                <div class="legend">
                    <div style="position: absolute; width: 58px; height: 80px; top: 9px; right: 9px; opacity: 0.85; background-color: rgb(255, 255, 255);"> </div>
                    <table style="position:absolute;top:9px;right:9px;;font-size:smaller;color:#545454">
                        <tbody>
                            <tr>
                                <td class="legendColorBox"><div style="border:1px solid #ccc;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid rgba(243, 89, 88, 0.7);overflow:hidden"></div>

                                    </div>
                                </td>
                                <td class="legendLabel">Product 1</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid rgba(251, 176, 94, 0.7);overflow:hidden">

                                        </div>

                                    </div>
                                </td>
                                <td class="legendLabel">Product 2</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid rgba(10, 166, 153, 0.7);overflow:hidden">

                                        </div>

                                    </div>
                                </td>
                                <td class="legendLabel">Product 3</td>
                            </tr>
                            <tr>
                                <td class="legendColorBox">
                                    <div style="border:1px solid #ccc;padding:1px">
                                        <div style="width:4px;height:0;border:5px solid rgba(0, 144, 217, 0.7);overflow:hidden"></div>

                                    </div>
                                </td>
                                <td class="legendLabel">Product 4</td>
                            </tr>
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!--My Skills table-->
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">       
                <div class="tools"> <a href="javascript:;" class="collapse"></a> 
                    <a href="#grid-config" data-toggle="modal" class="config"></a> 
                    <a href="javascript:;" class="reload"></a> 
                    <a href="javascript:;" class="remove"></a> 
                </div>
            </div>
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
                                <td><?php echo ++$i; ?></td>
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
