<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>
<!--Add new Category Form-->

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Wages</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <div class="row">
                    <div class="col-md-8 col-sm-8 col-xs-8">
                        <form id="add_employee_skill_form" name="add_wages_category_form">


                            <div class="form-group">
                                <label class="form-label">Wages Category</label>
                                <span style="color: red">*</span>                       

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="wages_category_code" id="wages_category_code" class="select2 form-control"  >
                                  add wages category combobox     
                                    </select>                            
                                </div>
                            </div>
                    
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Basic Category</label>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="wages_basic_category" class="form-control" type="text" name="wages_basic_category">                              
                            </div>
                        </div>
                    </div>
                  <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Allowance</label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="wages_allowance" class="form-control" type="text" name="wages_allowance">                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Overtime Rate</label>
                               
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="wages_overtimerate" class="form-control" type="text" name="wages_overtimerate">                              
                            </div>
                        </div>
                    </div>
                     <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Bonus</label>
                                
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="wages_bonus" class="form-control" type="text" name="wages_bonus">                              
                            </div>
                        </div>
                    </div>

                </div>
                <div id="add_wages_category_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Submit</button>
                   

                </div>
            </form>
        </div>

    </div>
</div>
