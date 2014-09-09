<div class="grid simple">
    <div class="grid-body no-border invoice-body"> <br>
        <div class="pull-right">
            <h2><?php echo $title; ?></h2>
        </div>
        <div class="clearfix"></div>
        <br>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr> 
                    <th>#</th>
                    <th>Name</th>                    
                    <th>Email</th>
                    <th>Address</th> 
                    <th>Contact No</th> 
                    <th>Description</th> 
                </tr>
            </thead>
            <tbody>

                <?php
                $i = 0;
                foreach ($companies as $company) {
                    ?> 
                    <tr  id="company_<?php echo $company->company_code; ?>">
                        <td><?php echo ++$i; ?></td>
                        <td><?php echo $company->company_name; ?></td>
                        <td><?php echo $company->company_email; ?></td>
                        <td><?php echo $company->company_address; ?></td>
                        <td><?php echo $company->company_contact; ?></td>
                        <td><?php echo $company->company_desc; ?></td>

                    </tr>
                <?php } ?>    
            </tbody>
        </table>
    </div>
</div>