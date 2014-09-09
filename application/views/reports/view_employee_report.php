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
                    <th>Full Name</th>
                    <th>Email</th>                    
                    <th>Type</th>
                    <th>Contact No</th> 
                    <th>Contract</th> 

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($employees as $employee) {
                    ?> 
                    <tr  id="employee_<?php echo $employee->employee_code; ?>">


                        <td><?php echo $employee->employee_fname . ' ' . $employee->employee_lname; ?></td>
                        <td><?php echo $employee->employee_email; ?></td>
                        <td>  
                            <?php if ($employee->employee_type == $this->config->item('ADMIN')) {
                                ?>
                                <span class="label label-important"><?php echo 'ADMIN'; ?></span>

                            <?php } else if ($employee->employee_type == $this->config->item('COMPANY_OWNER')) {
                                ?>

                                <span class="label label-success"><?php echo 'COMPANY OWNER'; ?></span>

                            <?php } else {
                                ?>
                                <span class="label label-info"><?php echo 'EMPLOYEE'; ?></span>
                            <?php } ?>

                        </td>


                        <td><?php echo $employee->employee_contact; ?>  </td>

                        <td>  <?php if ($employee->employee_contract == $this->config->item('FULL_TIME')) {
                                ?>
                                <span class="label label-success"><?php echo 'FULL TIME'; ?></span>

                            <?php } else if ($employee->employee_contract == $this->config->item('PART_TIME')) {
                                ?>   
                                <span class="label label-warning"><?php echo 'PART TIME'; ?></span>
                            <?php } ?>
                        </td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>

