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
                    <div class="col-md-5 col-sm-5 col-xs-5">
                        <form id="edit_company_form" name="edit_company_form">




                            <div class="form-group">
                                <label class="form-label">Company Code</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="company_code" class="form-control" type="text" name="company_code" value="<?php echo $company->company_code; ?>">                              
                                </div>
                            </div>
                            
                            
                            <div class="form-group">
                                <label class="form-label"> Name</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="company_name" class="form-control" type="text" name="company_name" value="<?php echo $company->company_name; ?>">                              
                                </div>
                            </div>
                            
                              <div class="form-group">
                                <label class="form-label">Email</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="company_email" class="form-control" type="text" name="company_email" value="<?php echo $company->company_email; ?>">                              
                                </div>
                            </div>
                            
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="company_address" class="form-control" type="text" name="company_address" value="<?php echo $company->company_address; ?>">                              
                                </div>
                            </div>
                            
                           <div class="form-group">
                                <label class="form-label">Contact</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="company_contact" class="form-control" type="text" name="company_contact" value="<?php echo $company->company_contact; ?>">                              
                                </div>
                            </div>
                            
                             <div class="form-group">
                                <label class="form-label">Description</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="company_description"  class="form-control" type="text" name="company_description" value="<?php echo $company->company_desc; ?>">                
                                        
                                        
                                   </div>
                            </div>
                            
                             

                        <div id="edit_company_msg" class="form-row"> </div>

                            <input type="hidden" id="company_code" name="company_code" value="<?php echo $company->company_code; ?>"/>
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





