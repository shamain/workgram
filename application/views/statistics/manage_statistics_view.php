<script>
    function showDetails(id) {
        name = '#postdata' + id;

        $(name).dialog({
            autoOpen: true,
            title: "Action Details",
            modal: true,
            width: "auto",
        });
    }

    $(document).ready(function() {


        $("#from").datepicker({
        });

        $("#to").datepicker({
        });
    });


</script>

<?php date_default_timezone_set('Asia/Colombo'); ?>


<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <table class="table" id="statistics_table" >
                    <thead>
                        <tr>
                            <th>User</th>
                            <th>System</th>
                            <th>Action</th>
                            <th>Action Performed On</th>
                            <th>Controller</th>
                            <th>Details</th>
                            <th>Options</th>

                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($results as $data) { ?>

                            <tr id = 'siterow<?php echo $data->user_id; ?>'>
                                <td><?php echo $data->Employee_Name . ' ' . $data->last_name; ?></td>
                                <td><?php echo $data->System; ?></td>
                                <td><?php echo $data->action; ?></td>
                                <td><?php
                                    if ($data->date == 0) {
                                        echo '-';
                                    } else {
                                        echo date("Y-m-d H:i:s", $data->date);
                                    }
                                    ?></td>   
                                <td>
                                    <?php echo $data->uri; ?>  


                                </td>  

                                <td>


                                    <a onclick="showDetails(<?php echo $data->id; ?>);"><img alt="" src="http://localhost/lcs_ims_new//application_resources/images/icons/color/mag_glass.png" width="20px;" style="cursor: pointer;"></a>


                                    <div id = "postdata<?php echo $data->id; ?>" style="display: none;">
                                        <?php $post_data = json_decode($data->post_data);
                                        ?>

                                        <table class="da-table">


                                            <tr><td><b>Browser</b></td><td><b>:</b></td><td><?php echo $data->browser; ?></td></tr>
                                            <tr><td><b>IP</b></td><td><b>:</b></td><td><?php echo $data->ip; ?></td></tr>
                                            <?php
                                            if ($data->post_data != '') {

                                                foreach ($post_data as $key => $value) {
                                                    ?>

                                                    <tr>

                                                        <td><b><?php echo $key; ?></b></td>
                                                        <td><b>:</b></td>
                                                        <td><?php
                                                            if (is_array($value)) {
                                                                print_r($value);
                                                            } else {
                                                                echo $value;
                                                            };
                                                            ?></td>

                                                    </tr>


                                                    <?php
                                                }
                                            }
                                            ?>

                                        </table>
                                    </div>            






                                </td>  

                            </tr>

                        <?php } ?> 
                    </tbody>
                </table>
            </div>
        </div>git
    </div>
</div>

<div class="grid_4">
    <div class="da-panel collapsible">
        <div class="da-panel-header">
            <span class="da-panel-title">
                <img alt="" src="http://localhost/lcs_ims_new//application_resources/images/icons/black/32/list.png">
                Usage Statistics
                <span class="toolbar" style="float: right;"></span></h1>

            </span>

            <span class="da-panel-toggler"></span>
        </div>


        <div class="da-panel-content">

            <form class="da-form" action = "" method="POST" id = "stats_search">
                <div class="da-form-row">
                    <div class="da-form-item medium" style="margin-left: 11px;">
                        <br/>
                        <select id= "system_holder" name = "systems" style="width: 20%;">
                            <option value = "">Please Select</option>
                            <?php foreach ($systems as $system) { ?>
                                <option value = "<?php echo $system->System_Code; ?>" <?php if ($this->session->userdata('statistics_system') == $system->System_Code) { ?>selected="selected"<?php } ?>><?php echo $system->System; ?></option>
                            <?php } ?>
                        </select>
                        <input id="from" type="text" placeholder="From" name = "from" style="width: 10%;" value = "<?php echo $this->session->userdata('statistics_from'); ?>">
                        <input id="to" type="text"  placeholder="To" name = "to" style="width:10%;" value = "<?php echo $this->session->userdata('statistics_to'); ?>">
                        <input id="keywords" name = "keywords" type="text" value = "<?php echo $this->session->userdata('statistics_keywords'); ?>" placeholder="Please enter a keyword to search for Users and Actions" style="width:47%;">
                        <input id="search" type = "submit" value = "Search" style= "width:8%" class="da-button yellow">

                        <input name="search_type" type = "hidden" value = "1">
                    </div>
                </div>
            </form>
            <div id="da-ex-gchart-line" >
                <div id = "message" class="da-message" style="display: none;"></div>

                <?php if ($results) { ?>


                    <table id="" class="da-table">
                        <thead>
                            <tr>
                                <th>User</th>
                                <th>System</th>
                                <th>Action</th>
                                <th>Action Performed On</th>
                                <th>Controller</th>
                                <th>Details</th>
                            </tr>
                        </thead>

                        <tbody>
                            <?php foreach ($results as $data) { ?>

                                <tr id = 'siterow<?php echo $data->user_id; ?>'>
                                    <td><?php echo $data->Employee_Name . ' ' . $data->last_name; ?></td>
                                    <td><?php echo $data->System; ?></td>
                                    <td><?php echo $data->action; ?></td>
                                    <td><?php
                                        if ($data->date == 0) {
                                            echo '-';
                                        } else {
                                            echo date("Y-m-d H:i:s", $data->date);
                                        }
                                        ?></td>   
                                    <td>
                                        <?php echo $data->uri; ?>  


                                    </td>  

                                    <td>


                                        <a onclick="showDetails(<?php echo $data->id; ?>);"><img alt="" src="http://localhost/lcs_ims_new//application_resources/images/icons/color/mag_glass.png" width="20px;" style="cursor: pointer;"></a>


                                        <div id = "postdata<?php echo $data->id; ?>" style="display: none;">
                                            <?php $post_data = json_decode($data->post_data);
                                            ?>

                                            <table class="da-table">


                                                <tr><td><b>Browser</b></td><td><b>:</b></td><td><?php echo $data->browser; ?></td></tr>
                                                <tr><td><b>IP</b></td><td><b>:</b></td><td><?php echo $data->ip; ?></td></tr>
                                                <?php
                                                if ($data->post_data != '') {

                                                    foreach ($post_data as $key => $value) {
                                                        ?>

                                                        <tr>

                                                            <td><b><?php echo $key; ?></b></td>
                                                            <td><b>:</b></td>
                                                            <td><?php
                                                                if (is_array($value)) {
                                                                    print_r($value);
                                                                } else {
                                                                    echo $value;
                                                                };
                                                                ?></td>

                                                        </tr>


                                                        <?php
                                                    }
                                                }
                                                ?>

                                            </table>
                                        </div>            






                                    </td>  

                                </tr>

                            <?php } ?>
                        </tbody>
                    </table>

                <?php } else { ?>

                    <div style="text-align: center;"> 
                        <br/>                               
                        <span style="font-size: 14px;"><b>Sorry, there are no results to display.</b></span>
                    </div>
                <?php } ?>
                <div role="grid" class="dataTables_wrapper" id="da-ex-datatable-numberpaging_04_wrapper">
                    <div class="dataTables_paginate paging_full_numbers" id="da-ex-datatable-numberpaging_04_paginate">
                        <?php echo $links; ?>
                    </div>
                </div> 
            </div>                   
        </div>
    </div>
</div>
