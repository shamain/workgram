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
                        <?php foreach ($dates as $date) { ?>
                            <th class="text-center" style="width:22%"><?php echo date('j', strtotime($date)); ?></th>
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
                            foreach ($results[$i]['atn'] as $atn) {
                                $colour = '';
                                if ($atn == $this->config->item('ABSENT')) {
                                    $colour = $this->config->item('ABSENT_C');
                                } else if ($atn == $this->config->item('HALF_DAY')) {
                                    $colour = $this->config->item('HALF_DAY_C');
                                } else if ($atn == $this->config->item('FULL_DAY')) {
                                    $colour = $this->config->item('FULL_DAY_C');
                                }
                                ?>
                              
                                <td class="v-align-middle">
                                    <div style="padding:1px;top:9px;right:9px;;font-size:smaller;color:#545454;width: 21px;">
                                        <div style="width:9px;height:0;border:10px solid <?php echo $colour; ?>;overflow:hidden"></div>
                                    </div>
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


