
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<!--edit wages Category Form-->
<!--<div class="col-md-8 ">-->
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
                        <form id="edit_wages_category_form" name="edit_wages_category_form">

                       <div class=" form-row">
                       
                            <div class="form-group">
                                <label class="form-label">Wages Category</label>
                               <span style="color: red">*</span>
                            </div>
                        
                       
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="category_name" class="form-control" type="text" name="category_name" value="<?php echo $wages_category->category_name; ?>" style="width: 50%"> 
                            </div>
                        
                    </div>
                     
                    <div class=" form-row">
                          
                            <div class="form-group">
                             
                                <label class="form-label">Basic Salary</label>
                               <span style="color: red">*</span>
                            </div>
                        
                       
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="basic_salary" class="form-control" type="text" name="basic_salary" value="<?php echo $wages_category->basic_salary; ?>" style="width: 50%">                              
                            </div>
                       
                    </div>
                 
                    <div class=" form-row">
                        
                            <div class="form-group">
                                <label class="form-label">Overtime Rate</label>
                               <span style="color: red">*</span>
                            </div>
                       
                       
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="ot_rate" class="form-control" type="text" name="ot_rate" value="<?php echo $wages_category->ot_rate; ?>" style="width: 50%">                              
                            </div>
                        
                    </div>
                      <div class=" form-row">
                       
                            <div class="form-group">
                                <label class="form-label">Allowance</label>
                                <span style="color: red">*</span>
                            </div>
                       
                       
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="allowance" class="form-control" type="text" name="allowance" value="<?php echo $wages_category->allowance; ?>" style="width: 50%">                              
                            </div>
                       
                    </div>
                     <div class=" form-row">
                        
                            <div class="form-group">
                                <label class="form-label">Bonus</label>
                                <span style="color: red">*</span>
                            </div>
                      
                       
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="bonus" class="form-control" type="text" name="bonus" value="<?php echo $wages_category->bonus; ?>" style="width: 50%">                              
                            </div>
                        
                    </div>

                
               
                 
                       <div id="edit_wages_category_msg" class="form-row"> </div>

                            <input type="hidden" id="wages_category_id" name="wages_category_id" value="<?php echo $wages_category->wages_category_id; ?>"/>
                            <div class="modal-footer">

                                <button class="btn btn-primary btn-cons" type="submit">
                                    <i class="icon-ok"></i>
                                    Save
                                </button>

                                <a href="<?php echo site_url(); ?>/wages_category/wages_category_controller/manage_wages_category" class="btn btn-white btn-cons" type="button">Cancel</a>

                            </div>
                </div>
            </form>
          </div>
        </div>

    </div>
</div>
</div>
<!--    </div>-->


<script type="text/javascript">
    $('#wages_parent_menu').addClass('active open');
</script>