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
                <table class="table" id="company_table" >
                    <thead>
                        <tr>
                            <th> Code</th>
                            <th>Name</th>
                            <th>Email</th>
                            <th>address</th>
                            <th>Contact</th>
                            <th>Description</th>
                            <th>Options</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($companies as $company) {
         
                            ?> 
                            <tr  id="companies_<?php echo $company->company_code; ?>">
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $company->company_name; ?></td>
                                <td><?php echo $companyany->company_email ; ?></td>
                                <td><?php echo $companyany->company_address ; ?></td>
                                <td><?php echo $companyany->company_contact ; ?></td>
                                <td><?php echo $companyany->company_description ; ?></td>
                                
                                <td>
                                    
                                    <a href="<?php echo site_url(); ?>/company/company_controller/edit_company_view/<?php echo $company->company_code; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this company" onclick="delete_company(<?php echo $company->company_code; ?>)">
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

<!-- Modal -->
<div class="modal fade" id="add_company_modal" tabindex="-1" role="dialog" aria-labelledby="add_company_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_company_form" name="add_company_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true">×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_company_modalLabel" class="semi-bold text-white">It's a new Company</h4>
                    <p class="no-margin text-white">Include Company details here.</p>
                    <br>
                </div>
                <div class="modal-body">

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Code</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="company_code" class="form-control" type="text" name="company_code" >                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Name</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="company_name" class="form-control" type="text" name="company_name">                              
                            </div>
                        </div>
                    </div>
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Email</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="company_email" class="form-control" type="text" name="company_email">                              
                            </div>
                        </div>
                    </div>
                    

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Address</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="company_address" class="form-control" type="text" name="company_address">                              
                            </div>
                        </div>
                    </div>
                    
                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Contact</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="company_contact" class="form-control" type="text" name="company_contact">                              
                            </div>
                        </div>
                    </div>


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
                <div id="add_company_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->


