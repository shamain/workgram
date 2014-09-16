
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
                      <button type="button"data-toggle="modal" data-target="#add_wages_modal"  class="btn btn-default btn-cons" value="<?php echo $wage; ?>"><?php echo $wage; ?></button>  
                   
                    
                    <?php
                }
                ?>
            </tr>
        <?php }
        ?>
    </tbody>
</table>

