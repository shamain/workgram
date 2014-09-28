
<?php
//formating the graph data 

$emp_names = array();
$colours = array();


foreach ($all_multi_array as $row) {
    //only get the months where there are values

    if (($row['emp_name'] != '')) {

        $emp_names[] = "'" . $row['emp_name'] . "'";
    }
}

$emp_names_string = implode(',', $emp_names);
//$colours_string = implode(',', $colours);
?>



<script src="<?php echo base_url(); ?>application_resources/plugins/jquery-sparkline/jquery-sparkline.js"></script>
<script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.min.js"></script>
<script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.animator.min.js"></script>
<script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.resize.min.js" type="text/javascript"></script>
<script src="<?php echo base_url(); ?>application_resources/plugins/jquery-flot/jquery.flot.orderBars.js"></script>


<!--Chart-->
<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>
<div class="row">
    <div class="col-md-12">
        <div class="grid simple">
            <div class="grid-body no-border">
                <h4>Find out the skills of other <span class="semi-bold"> employees</span></h4>
                <p></p>
                <br>
                <div id="stacked-ordered-chart" style="height:250px"></div>
            </div>
        </div>
    </div>
</div>



<!--My Skills table-->

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-body ">
                <input type="hidden" value="<?php echo $this->session->userdata('EMPLOYEE_CODE'); ?>" id="skill_matrix_print_user"/>
                <table class="table table-hover" id="my_skill_table" >
                    <thead>
                        <tr>  
                            <th>ID</th>                    
                            <th>Skill</th>
                            <th>Expert Level</th> 
                            <th>References</th> 
                            <th>Actions</th> 
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $i = 0;
                        foreach ($assigned_skills as $assigned_skill) {
                            ?> 
                            <tr  id="skill_matrix_<?php echo $assigned_skill->employee_skill_id; ?>">
                                <td><?php echo++$i; ?></td>
                                <td><?php echo $assigned_skill->skill_name; ?>



                                <td valign="middle">
                                    <?php echo $assigned_skill->expert_level; ?> 
                                    <?php
                                    if ($assigned_skill->expert_level == 100) {
                                        ?>
                                        <div class="progress">
                                            <div class="progress-bar progress-bar-success animate-progress-bar" data-percentage="<?php echo $assigned_skill->expert_level; ?>%" style="width: 79%;"></div>

                                        </div>
                                        <?php
                                    } else if ($assigned_skill->expert_level == 0) {
                                        ?>
                                        <div class="progress">
                                            <div data-percentage="<?php echo $assigned_skill->expert_level; ?>%" id="" class="progress-bar progress-bar-danger animate-progress-bar"></div>
                                        </div>
                                        <?php
                                    } else {
                                        ?>
                                        <div class="progress">
                                            <div data-percentage="<?php echo $assigned_skill->expert_level; ?>%" id="" class="progress-bar progress-bar-warning animate-progress-bar"></div>
                                        </div>
                                    <?php } ?>
                                </td>
                                <td>
                                    <a href="<?php echo $assigned_skill->reference; ?>" target="_blank"><?php echo $assigned_skill->reference; ?></a> 
                                </td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/skill_matrix/skill_matrix_controller/edit_skill_matrix_view/<?php echo $assigned_skill->employee_skill_id; ?>">
                                        <span class="label label-info">Edit</span>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Skill" onclick="delete_employee_skill(<?php echo $assigned_skill->employee_skill_id; ?>)">
                                        <span class="label label-important">Delete</span>
                                    </a>

                                </td>
                            </tr>
                        <?php } ?>    
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!--Add new Skill Form-->

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a>  <a href="javascript:;" class="reload"></a></div>
            </div>
            <div class="grid-body ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form id="add_employee_skill_form" name="add_employee_skill_form">
                            <div class="form-group">
                                <label class="form-label">Skill Category</label>
                                <span style="color: red">*</span>                       

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="skill_cat_code" id="skill_cat_code" class="select2 form-control" style="width: 30%" >
                                        <option value="">-- Select Skill Category --</option>
                                        <?php foreach ($skill_categories as $skill_category) {
                                            ?> 
                                            <option value="<?php echo $skill_category->skill_cat_code; ?>"><?php echo $skill_category->skill_cat_name; ?></option>
                                        <?php } ?>
                                    </select>                            
                                </div>
                            </div>

                            <div class="form-group">

                                <label class="form-label">Skill</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <select name="skill_code" id="skill_code" class="select2 form-control" style="width: 30%" >
                                        <option value="">-- Select Skills --</option>

                                    </select>   
                                </div>
                            </div>



                            <div class="form-group">

                                <label class="form-label">Expert Level</label>
                                <span style="color: red">*</span>


                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <div class="slider sucess">
                                        <input type="text" class="slider-element form-control" value="" data-slider-min="1" data-slider-max="70" data-slider-step="1" data-slider-value="50" data-slider-orientation="horizontal" data-slider-selection="after" data-slider-tooltip="hide">
                                    </div>
                                </div>

                            </div>

                            <div class="form-group">
                                <label class="form-label">References</label>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="reference" class="form-control" type="text" name="reference" style="width: 50%">                              
                                </div>
                            </div>

                            <div id="add_emp_skill_msg" class="form-row"> </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary btn-cons" type="submit">
                                    <i class="icon-ok"></i>
                                    Save
                                </button>
                                <a href="<?php echo site_url(); ?>/skill_matrix/skill_matrix_controller/manage_skill_matrix" class="btn btn-white btn-cons" type="button">Cancel</a>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<script>

<?php
$v = 0;
foreach ($skill_cat_array as $skill_cat) {
    ?>
                                            var <?php echo 'v' . $v; ?> = [
                                                [1325376000000, 140],
                                                [1328054400000, 70],
                                                [1330560000000, 100],
                                                [1333238400000, 60],
                                                [1335830400000, 35]
                                            ];
    <?php
    ++$v;
}
?>
//                                        var v1 = [
//                                            [1325376000000, 80],
//                                            [1328054400000, 60],
//                                            [1330560000000, 30],
//                                            [1333238400000, 35],
//                                            [1335830400000, 30]
//                                        ];
//
//                                        var v2 = [
//                                            [1325376000000, 80],
//                                            [1328054400000, 40],
//                                            [1330560000000, 30],
//                                            [1333238400000, 20],
//                                            [1335830400000, 10]
//                                        ];
//
//                                        var v3 = [
//                                            [1325376000000, 15],
//                                            [1328054400000, 10],
//                                            [1330560000000, 15],
//                                            [1333238400000, 20],
//                                            [1335830400000, 15]
//                                        ];
                                        // ORDERED & STACKED  
                                        var data2 = new Array();
<?php
$v = 0;
foreach ($skill_cat_array as $skill_cat) {
    ?>

                                            var temp = {
                                                label: "<?php echo $skill_cat['cat_string']; ?>",
                                                data: <?php echo 'v' . $v; ?>,
                                                bars: {
                                                    show: true,
                                                    barWidth: 12 * 24 * 60 * 60 * 300 * 2,
                                                    fill: true,
                                                    lineWidth: 0,
                                                    order: 0,
                                                    fillColor: "<?php echo $skill_cat['colour']; ?>"
                                                },
                                                color: "<?php echo $skill_cat['colour']; ?>"
                                            };

                                            data2.push(temp);


    <?php
    ++$v;
}
?>

                                        $.plot($('#stacked-ordered-chart'), data2, {
                                            grid: {
                                                hoverable: true,
                                                clickable: false,
                                                borderWidth: 1,
                                                borderColor: '#f0f0f0',
                                                labelMargin: 8

                                            },
                                            xaxis: {
                                                min: (new Date(2011, 11, 15)).getTime(),
                                                max: (new Date(2012, 04, 18)).getTime(),
                                                mode: "time",
                                                timeformat: "%b",
                                                tickSize: [1, "month"],
                                                monthNames: [<?php echo $emp_names_string; ?>],
                                                tickLength: 0, // hide gridlines
                                                axisLabel: 'Employees',
                                                axisLabelUseCanvas: true,
                                                axisLabelFontSizePixels: 12,
                                                axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
                                                axisLabelPadding: 5
                                            },
                                            stack: true
                                        });



</script>


<script>
    $('#skill_parent_menu').addClass('active open');

    $(document).ready(function() {

        $('.slider-element').slider();
    });

</script>

