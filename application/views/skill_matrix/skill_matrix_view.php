
<?php
//formating the graph data 

//$skill_cats = array();
//$colours = array();
//
//
//foreach ($all_multi_array as $row) {
//    //only get the months where there are values
//    if (($row['cats'] != 0)) {
//
//        $skill_cats[] = "'" . $row['cats'] . "'";
//        $colours[] = $row['colour'];
//    }
//}
//
//$skill_cat_string = implode(',', $skill_cats);
//$colours_string = implode(',', $colours);
?>




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
                <div id="my_skill_matrix_chart" style="height:250px"></div>
            </div>
        </div>
    </div>
</div>



<!--My Skills table-->

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-body ">
                <table class="table" id="my_skill_table" >
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
                                <td><?php echo ++$i; ?></td>
                                <td><?php echo $assigned_skill->skill_name; ?>

                                <td>
                                    <?php echo $assigned_skill->expert_level; ?> 

                                </td>
                                <td>
                                    <?php echo $assigned_skill->reference; ?> 
                                </td>
                                <td>
                                    <a href="<?php echo site_url(); ?>/skill/skill_controller/edit_skill_view/<?php echo $assigned_skill->employee_skill_id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this Skill" onclick="delete_employee_skill(<?php echo $assigned_skill->employee_skill_id; ?>)">
                                        <i class="fa fa-times"></i>
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
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
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
                                        <?php foreach ($skills as $skill) {
                                            ?> 
                                            <option value="<?php echo $skill->skill_code; ?>"><?php echo $skill->skill_name; ?></option>
                                        <?php } ?>
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

    $(document).ready(function() {

        $('.slider-element').slider();
    });

</script>

<script type="text/javascript">
//skill chart
//$(document).ready(function() {
    var d1_1 = [
        [1325376000000, 120],
        [1328054400000, 70],
        [1330560000000, 100],
        [1333238400000, 60],
        [1335830400000, 35]
    ];

    var d1_2 = [
        [1325376000000, 80],
        [1328054400000, 60],
        [1330560000000, 30],
        [1333238400000, 35],
        [1335830400000, 30]
    ];

    var d1_3 = [
        [1325376000000, 80],
        [1328054400000, 40],
        [1330560000000, 30],
        [1333238400000, 20],
        [1335830400000, 10]
    ];

    var d1_4 = [
        [1325376000000, 15],
        [1328054400000, 10],
        [1330560000000, 15],
        [1333238400000, 20],
        [1335830400000, 15]
    ];

    var data1 = [
        {
            label: "Product 1",
            data: d1_1,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 0,
                order: 1,
                fillColor: "rgba(243, 89, 88, 0.7)"
            },
            color: "rgba(243, 89, 88, 0.7)"
        },
        {
            label: "Product 2",
            data: d1_2,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 0,
                order: 2,
                fillColor: "rgba(251, 176, 94, 0.7)"
            },
            color: "rgba(251, 176, 94, 0.7)"
        },
        {
            label: "Product 3",
            data: d1_3,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 0,
                order: 3,
                fillColor: "rgba(10, 166, 153, 0.7)"
            },
            color: "rgba(10, 166, 153, 0.7)"
        },
        {
            label: "Product 4",
            data: d1_4,
            bars: {
                show: true,
                barWidth: 12 * 24 * 60 * 60 * 300,
                fill: true,
                lineWidth: 0,
                order: 4,
                fillColor: "rgba(0, 144, 217, 0.7)"
            },
            color: "rgba(0, 144, 217, 0.7)"
        },
    ];

    $.plot($("#my_skill_matrix_chart"), data1, {
        xaxis: {
            min: (new Date(2011, 11, 15)).getTime(),
            max: (new Date(2012, 04, 18)).getTime(),
            mode: "time",
            timeformat: "%b",
            tickSize: [1, "month"],
            monthNames: ["Jan", "Feb", "Mar", "Apr", "May", "Jun", "Jul", "Aug", "Sep", "Oct", "Nov", "Dec"],
            tickLength: 0, // hide gridlines
            axisLabel: 'Month',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 5,
        },
        yaxis: {
            axisLabel: 'Value',
            axisLabelUseCanvas: true,
            axisLabelFontSizePixels: 12,
            axisLabelFontFamily: 'Verdana, Arial, Helvetica, Tahoma, sans-serif',
            axisLabelPadding: 5
        },
        grid: {
            hoverable: true,
            clickable: true,
            borderWidth: 1,
            borderColor: '#f0f0f0',
            labelMargin: 8,
        },
        series: {
            shadowSize: 1
        }
    });

</script>