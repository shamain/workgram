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
                    <table class="table  table-hover" id="screenshot_inquiry_table" >
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Inquiry name</th>
                                <th>Description</th>
                                
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 0;
                            foreach ($inquiries as $inquiry) {
                                ?> 
                                <tr  id="inquiry_<?php echo $inquiry->inquiry_id; ?>">
                                    <td><?php echo++$i; ?></td>
                                    <td><?php echo $company->inquiry_name; ?></td>
                                    <td><?php echo $company->description; ?></td>
                                    

                                    
                                </tr>
                            <?php } ?>    
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
<!--    <div class="col-md-1">
        <div class="invoice-button-action-set">
            <p>
                <button class="btn btn-primary" type="button" id="company_print_btn"><i class="fa fa-print"></i></button>
            </p>
        </div>
    </div>-->
</div>

<script type="text/javascript">
                                        $('#screenshot_inquiry_parent_menu').addClass('active open');
</script>