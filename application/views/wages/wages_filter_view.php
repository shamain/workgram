
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

<!-- Modal -->
<div class="modal fade" id="add_employee_payment_modal" tabindex="-1" role="dialog" aria-labelledby="add_employee_payment_modalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <form id="add_employee_payment_form" name="add_employee_payment_form">
                <div class="modal-header tiles green">
                    <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
                    <br>
                    <i class="fa fa-desktop fa-4x"></i>
                    <h4 id="add_employee_modalLabel" class="semi-bold text-white">
                      
                            <div class="form-group">
                                <label class="form-label">Employee Code:</label>
                               <span style="color: red">*</span>
                            </div>
                        
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_code" class="form-control" type="text" name="employee_code" value="<?php echo $employee->employee_fname . ' ' . $employee->employee_lname; ?>" style="width: 50%"> 
                            </div>
                          <div class="form-group">
                                <label class="form-label">Year:</label>
                               <span style="color: red">*</span>
                            </div>
                        
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="year_month" class="form-control" type="text" name="year_month" value="<?php echo $employee_payment->year_month ?>" style="width: 50%"> 
                            </div>
               
                    <br>
                </div>
<!--                <div class="modal-body">

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Total Working Hours</label>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="employee_no" class="form-control" type="text" name="employee_no">                              
                            </div>
                        </div>
                    </div>-->

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Basic Salary</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="basic_salary" class="form-control" type="text" name="basic_salary" value="<?php echo $wages_category->basic_salary ?>">                              
                            </div>
                        </div>
                    </div>

                    <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Bonus</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="bonus" class="form-control" type="text" name="bonus" value="<?php echo $wages_category->bonus ?>">                              
                            </div>
                        </div>
                    </div>

               

                       <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Allowance</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="bonus" class="form-control" type="text" name="bonus" value="<?php echo $wages_category->bonus ?>">                              
                            </div>
                        </div>
                    </div>

                     <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">OT Rate</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="ot_rate" class="form-control" type="text" name="ot_rate" value="<?php echo $wages_category->ot_rate?>">                              
                            </div>
                        </div>
                    </div>
                    
                     <div class="row form-row">
                        <div class="col-md-5">
                            <div class="form-group">
                                <label class="form-label">Ot Rate</label>
                                <span style="color: red">*</span>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="ot_rate" class="form-control" type="text" name="ot_rate" value="<?php echo $wages_category->ot_rate?>">                              
                            </div>
                        </div>
                    </div>



                </div>



                <div id="add_employee_msg" class="form-row"> </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary">Save</button>

                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                </div>

            </form>
        </div>
        <!-- /.modal-content -->
    </div>
    <!-- /.modal-dialog -->
</div>
<!-- /.modal -->