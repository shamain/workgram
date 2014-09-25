
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Attendance Report</title>


        <style type="text/css">

            body{
                font-family:Arial, Helvetica, sans-serif;
                font-family:Arial, Helvetica, sans-serif;
                font-size:12px;
            }

            table.da-table
            {
                width:100%;
                margin:0;
                clear:both;
                font-family:Arial, Helvetica, sans-serif;
                font-size:12px;
                border-top:1px solid #cacaca;
                border-left:1px solid #cacaca;
                border-bottom:1px solid #cacaca;
                border-right:1px solid #cacaca;

                -moz-box-shadow:inset 1px 0 0 0 #f8f8f8;
                -webkit-box-shadow:inset 1px 0 0 0 #f8f8f8;
                -khtml-box-shadow:inset 1px 0 0 0 #f8f8f8;
                box-shadow:inset 1px 0 0 0 #f8f8f8;
            }

            table.da-table tr td, 
            table.da-table tr th
            {
                vertical-align:middle;
            }

            table.da-table thead tr
            {
                background:#eeeeee url(../../images/default-header.png) repeat-x left top;
            }

            table.da-table tr th
            {
                padding:11px 20px;
                border-bottom:1px solid #cacaca;
                border-right:1px solid #cacaca;

                -moz-box-shadow:inset 1px 0 0 0 #f8f8f8;
                -webkit-box-shadow:inset 1px 0 0 0 #f8f8f8;
                -khtml-box-shadow:inset 1px 0 0 0 #f8f8f8;
                box-shadow:inset 1px 0 0 0 #f8f8f8;
            }

            table.da-table thead tr
            {	
                -moz-box-shadow:inset 0 1px 0 0 #ffffff;
                -webkit-box-shadow:inset 0 1px 0 0 #ffffff;
                -khtml-box-shadow:inset 0 1px 0 0 #ffffff;
                box-shadow:inset 0 1px 0 0 #ffffff;
            }

            table.da-table tr th:last-child
            {
                border-right:none;
            }

            table.da-table tr td
            {
                border-bottom:1px solid #dcdcdc;
                border-right:1px solid #e0e0e0;
                padding:7px 20px;
            }

            table.da-table tr td:last-child
            {
                border-right:none;
            }

            table.da-table tr:last-child td
            {
                border-bottom:none;
            }

            table.da-table tr td.da-icon-column
            {
                text-align: center;
                width:80px;
            }

            table.da-table tr td.da-icon-column img
            {
                margin:0 2px;
            }

            table.da-table tr.odd
            {
                background-color:#f4f4f4;
            }

            table.da-table tr.even
            {
                background-color:#fcfcfc;
            }

            table.da-table.da-detail-view tbody th
            {
                width:120px;
                background:url(../../images/default-header.png) repeat-x left bottom;
            }

            table.da-table.da-detail-view tbody tr:last-child th
            {
                border-bottom:0;
            }

            table.da-table.da-detail-view .null
            {
                color:#F2618C;
            }

            .bottom-line{
                clear:both;
                display:block;
                border-bottom:1px solid #f1f1f1;
                height:1px;
                margin:20px 0;
                width:100%;
            }
            .double_line{
                font-weight:bold;
                border-bottom:1px #cccccc double;
                line-height:25px;
                display:block;
            }

            .print_btn{
                border:1px solid #ffffff;
            }


            .da-button
            {
                display:inline-block;
                border:none;
                outline:none;

                font:12px/17px 'Helvetica Neue', Arial, Helvetica, sans-serif;

                padding:4px 12px;
                margin:0;
                width:auto;

                cursor:pointer;
                text-decoration:none;

                zoom:1;
                overflow:hidden;
                *overflow:visible;

                color:#ffffff;
                border:1px solid;
                text-shadow:1px 1px rgba(0, 0, 0, 0.35);

                -webkit-border-radius:2px;
                -o-border-radius:2px;
                -moz-border-radius:2px;
                border-radius:2px;

                -webkit-appearance:none;
                -webkit-box-shadow:0 1px 1px rgba(0, 0, 0, 0.15), inset 0 1px 1px rgba(255, 255, 255, 0.35);
                -o-box-shadow:0 1px 1px rgba(0, 0, 0, 0.15), inset 0 1px 1px rgba(255, 255, 255, 0.35);
                -moz-box-shadow:0 1px 1px rgba(0, 0, 0, 0.15), inset 0 1px 1px rgba(255, 255, 255, 0.35);
                box-shadow:0 1px 1px rgba(0, 0, 0, 0.15), inset 0 1px 1px rgba(255, 255, 255, 0.35);

                -webkit-tap-highlight-color:rgba(0, 0, 0, 0);
            }

            .da-button.blue
            {
                background-color:rgb(97,164,228);
                background-image: linear-gradient(bottom, rgb(97,164,228) 0%, rgb(120,180,236) 100%);
                background-image: -o-linear-gradient(bottom, rgb(97,164,228) 0%, rgb(120,180,236) 100%);
                background-image: -moz-linear-gradient(bottom, rgb(97,164,228) 0%, rgb(120,180,236) 100%);
                background-image: -webkit-linear-gradient(bottom, rgb(97,164,228) 0%, rgb(120,180,236) 100%);
                background-image: -ms-linear-gradient(bottom, rgb(97,164,228) 0%, rgb(120,180,236) 100%);

                background-image: -webkit-gradient(
                    linear,
                    left bottom,
                    left top,
                    color-stop(0, rgb(97,164,228)),
                    color-stop(1, rgb(120,180,236))
                    );

                border-color:#21629c;
            }
            table.da-table1 {	width:100%;
                              margin:0;
                              clear:both;
                              font-family:Arial, Helvetica, sans-serif;
                              font-size:12px;
                              border-top:1px solid #cacaca;
                              border-left:1px solid #cacaca;
                              border-bottom:1px solid #cacaca;
                              border-right:1px solid #cacaca;

                              -moz-box-shadow:inset 1px 0 0 0 #f8f8f8;
                              -webkit-box-shadow:inset 1px 0 0 0 #f8f8f8;
                              -khtml-box-shadow:inset 1px 0 0 0 #f8f8f8;
                              box-shadow:inset 1px 0 0 0 #f8f8f8;
            }
        </style>

    </head>


    <body style="background-color:#FFF">

        <div class="grid simple">
            <div class="grid-body no-border invoice-body "> <br>
                    <div class="pull-right">
                        <h2><?php echo $title; ?></h2>
                    </div>
                    <div class="clearfix"></div>

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

                                    <td class="v-align-middle" style="width:9px;height:0;background-color:<?php echo $colour; ?>">
<!--                                            <div style="padding:1px;top:9px;right:9px;;font-size:smaller;color:#545454;width: 21px;">
                                                <div style=""></div>
                                            </div>-->
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
        <div class="bottom-line"></div>

    </body>
</html>
