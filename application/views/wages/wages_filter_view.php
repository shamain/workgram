<div class="row" id="search_result_table">
    <div class="col-md-1">
        <div class="invoice-button-action-set">
            <p>
                <button class="btn btn-primary" type="button"><i class="fa fa-print"></i></button>
            </p>
        </div>
    </div>
    <div class="col-md-11 scroller" >
        <div>
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
                                   <?php echo $wage; ?>
                                </td>
                                <?php
                            }
                            ?>
                        </tr>
                    <?php }
                    ?>
                </tbody>
            </table>
        </div>
    </div>
</div>


