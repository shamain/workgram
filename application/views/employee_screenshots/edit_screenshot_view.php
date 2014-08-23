

<div class="modal fade" id="add_inquiry_modal" tabindex="-1" role="dialog" aria-labelledby="add_inquiry_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_inquiry_form" name="add_inquiry_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-users fa-4x"></i>
                    <h4 id="add_inquiry_modalLabel" class="semi-bold text-white">Add Inquiry</h4>
                    <!--<p class="no-margin text-white">Choose a Skill category and make this a child of it.</p>-->
                    <br>
                </div>
                
<!--                <div class="modal-body">
                    
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
                    </div>-->
                
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Inquiry Name</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="inquiry_name" class="form-control" type="text" name="inquiry_name">                              
                            </div>
                        </div>
                    </div>
                </div>
       <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <textarea id="company_description" class="form-control" type="text" name="company_description">    </textarea>                          
                            </div>
                        </div>
                    </div>
                </div>
        
                <div id="add_inquiry_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>

    </div>

</div>

