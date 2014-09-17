
<table class="table table-bordered no-more-tables">
    <thead>
        <tr>

            <th class="text-center" style="width:22%">Employee</th>
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
                <?php
                foreach ($results[$i]['wage'] as $wage) {
                    ?>

                    <td class="v-align-middle">  
                        <button type="button" onclick="get_wages_pop_up_view(<?php echo $results[$i]['employee_code'];?>,<?php echo $wage['wage_month'];?>)"  class="btn btn-default btn-cons" value="<?php echo $wage['wage_status']; ?>"><?php echo $wage['wage_status']; ?></button>  
                   
                    </td>
                    <?php
                }
                ?>
            </tr>
        <?php }
        ?>
    </tbody>
</table>

