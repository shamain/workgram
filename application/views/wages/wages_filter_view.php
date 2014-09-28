
<table class="table table-bordered no-more-tables">
    <thead>
        <tr>

            <th class="text-center" style="width:22%">Employee</th>
            <th class="text-center" style="width:22%">Employee Type</th>
            <?php foreach ($months as $month) { ?>
                <th class="text-center"><?php echo date('M', strtotime($month)); ?></th>
            <?php } ?>

        </tr>

    </thead>
    <tbody>
        <?php
        for ($i = 0; $i < count($results); $i++) {
            ?>
            <tr>
                <td> <?php echo $results[$i]['employee']; ?></td>
                <td>  
                    <?php if ($results[$i]['employee_type'] == $this->config->item('ADMIN')) {
                        ?>
                        <span class="label label-important"><?php echo 'ADMIN'; ?></span>

                    <?php } else if ($results[$i]['employee_type'] == $this->config->item('COMPANY_OWNER')) {
                        ?>

                        <span class="label label-success"><?php echo 'COMPANY OWNER'; ?></span>

                    <?php } else {
                        ?>
                        <span class="label label-info"><?php echo 'EMPLOYEE'; ?></span>
                    <?php } ?>

                </td>
                <?php
                foreach ($results[$i]['wage'] as $wage) {
                    
                    
                      $class = '';
                    if ($wage['wage_status'] == 'PAID') {
                        $class = 'btn-primary';
                         
                    } else if ($wage['wage_status'] == 'NOT PAID') {
                        $class ='btn-warning';
                       
                    } 
                    ?>  
                    <td class="v-align-middle">  
                        <button type="button" class ="btn <?php echo $class;?>" onclick="get_wages_pop_up_view(<?php echo $results[$i]['employee_code']; ?>,'<?php echo $wage['wage_month']; ?>')"   value="<?php echo $wage['wage_status']; ?>"><?php echo $wage['wage_status']; ?></button>  
                    </td>
                    <?php
                }
                ?>



            </tr>
        <?php }
        ?>

    </tbody>
</table>

