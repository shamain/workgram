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

                    <th class="text-center" >Employee</th>
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