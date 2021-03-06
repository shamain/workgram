<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="col-md-11">
        <div class="span12">
            <div class="grid simple ">
                <div class="grid-title">
                    <h4>Advance <span class="semi-bold">Options</span></h4>
                    <div class="tools"> <a href="javascript:;" class="collapse"></a>  <a href="javascript:;" class="reload"></a>  </div>
                </div>
                <div class="grid-body ">
                    <table class="table  table-hover" id="company_table" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Name</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Contact No</th>
                                <th>Description</th>
                                <th>Options</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($companies as $company) {
                                ?> 
                                <tr  id="company_<?php echo $company->company_code; ?>">
                                    <td><?php echo++$i; ?></td>
                                    <td><?php echo $company->company_name; ?></td>
                                    <td><?php echo $company->company_email; ?></td>
                                    <td><?php echo $company->company_address; ?></td>
                                    <td><?php echo $company->company_contact; ?></td>
                                    <td><?php echo $company->company_desc; ?></td>

                                    <td>
                                        <?php
                                        $perm = Access_controll_service::check_access('EDIT_COMPANY');
                                        if ($perm) {
                                            ?>
                                            <a href="<?php echo site_url(); ?>/company/company_controller/edit_company_view/<?php echo $company->company_code; ?>">
                                                <span class="label label-info">Edit</span>
                                            </a>
                                            <?php
                                        }
                                        $perm = Access_controll_service::check_access('DELETE_COMPANY');
                                        if ($perm) {
                                            ?>
                                            <a style="cursor: pointer;"   title="Delete this company" onclick="delete_company(<?php echo $company->company_code; ?>)">
                                                <span class="label label-important">Delete</span>
                                            </a>
                                            <?php
                                        }
                                        ?>
                                    </td>
                                </tr>
                            <?php } ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-1">
        <div class="invoice-button-action-set">
            <p>
                <button class="btn btn-primary" type="button" id="company_print_btn"><i class="fa fa-print"></i></button>
            </p>
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
                                <label class="form-label">Company Name</label>
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
                                <label class="form-label">Contact Number</label>
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

<script type="text/javascript">
                                                $('#company_parent_menu').addClass('active open');
</script>
