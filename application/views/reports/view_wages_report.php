
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Wages Report</title>


        <style type="text/css">

            body{
                font-family:Arial, Helvetica, sans-serif;
                font-family:Arial, Helvetica, sans-serif;
                font-size:12px;
            }



            table.table tr td, 
            table.table tr th
            {
                vertical-align:middle;
            }



            table.table tr th
            {
                padding:11px 20px;
                border-bottom:1px solid #cacaca;
                border-right:1px solid #cacaca;

                -moz-box-shadow:inset 1px 0 0 0 #f8f8f8;
                -webkit-box-shadow:inset 1px 0 0 0 #f8f8f8;
                -khtml-box-shadow:inset 1px 0 0 0 #f8f8f8;
                box-shadow:inset 1px 0 0 0 #f8f8f8;
            }

            table.table thead tr
            {	
                -moz-box-shadow:inset 0 1px 0 0 #ffffff;
                -webkit-box-shadow:inset 0 1px 0 0 #ffffff;
                -khtml-box-shadow:inset 0 1px 0 0 #ffffff;
                box-shadow:inset 0 1px 0 0 #ffffff;
            }

            table.table tr th:last-child
            {
                border-right:none;
            }

            table.table tr td
            {
                border-bottom:1px solid #dcdcdc;
                border-right:1px solid #e0e0e0;
                padding:7px 20px;
            }

            table.table tr td:last-child
            {
                border-right:none;
            }

            table.table tr:last-child td
            {
                border-bottom:none;
            }



            table.table tr.odd
            {
                background-color:#f4f4f4;
            }

            table.table tr.even
            {
                background-color:#fcfcfc;
            }


            table.table tbody tr:last-child th
            {
                border-bottom:0;
            }

            table.table.da-detail-view .null
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


        </style>


    </head>


    <body style="background-color:#FFF">

        <div class="grid simple">
            <div class="grid-body no-border invoice-body "> <br>
                    <div class="pull-right">
                        <h2><?php echo $title . ' of ' . $year; ?></h2>
                    </div>
                    <div class="clearfix"></div>

                    <table class="table">
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
                                            <?php echo $wage['wage_status']; ?>

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

