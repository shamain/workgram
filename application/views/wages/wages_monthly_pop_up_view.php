<div class="modal-content">
    <form id="add_wages_form" name="add_wages_form">
        <div class="modal-header tiles green">
            <button type="button" class="close" data-dismiss="modal" aria-hidden="true" >×</button>
            <br>
            <i class="fa fa-desktop fa-4x"></i>
            <h4 id="wages_pop_upLabel" class="semi-bold text-white">
                    
                </h4>


            <br>
        </div>
        <div class="modal-body">
            <div class="row form-row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="form-label">Employee Name</label>
                        <span style="color: red">*</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-with-icon  right">                                       
                        <i class=""></i>
                        <input id="employee_name" class="form-control" type="text" name="employee_name" value="<?php echo $employee->employee_fname . ' ' . $employee->employee_lname; ?> ">                              
                    </div>
                </div>
            </div>
          
             <div class="row form-row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="form-label">Year </label>
                        <span style="color: red">*</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-with-icon  right">                                       
                        <i class=""></i>
                        <input id="year" class="form-control" type="text" name="year" value="<?php echo date('M Y',  strtotime($year));?>  ">                              
                    </div>
                </div>
            </div>
            <div class="row form-row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="form-label">Employee worked Hours</label>
                          <span style="color: red">*</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-with-icon  right">                                       
                        <i class=""></i>
                        <input id="worked_hours" class="form-control" type="text" name="worked_hours" value="<?php echo $worked_hours; ?> ">                              
                    
                    
                </div>
            </div>
                 </div>

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
                        <input id="basic_salary" class="form-control" type="text" name="basic_salary" value="<?php if(!empty($wages_detail)){ echo $wages_detail->basic_salary; } ?> ">                              
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
                        <input id="ot_rate" class="form-control" type="text" name="ot_rate" value="<?php if(!empty($wages_detail)){ echo $wages_detail->ot_rate; } ?> ">                            
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
                        <input id="allowance" class="form-control" type="text" name="allowance" value="<?php if(!empty($wages_detail)){ echo $wages_detail->allowance; } ?> ">                              
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
                        <input id="bonus" class="form-control" type="text" name="bonus" value="<?php if(!empty($wages_detail)){ echo $wages_detail->bonus; } ?> ">                              
                    </div>
                </div>
            </div>

            <div class="row form-row">
                <div class="col-md-5">
                    <div class="form-group">
                        <label class="form-label">Total Amount</label>
                        <span style="color: red">*</span>
                    </div>
                </div>
                <div class="col-md-6">
                    <div class="input-with-icon  right">                                       
                        <i class=""></i>
                        <input id="amount" class="form-control" type="text" name="amount" value="<?php if(!empty($payment_detail)){ echo $payment_detail->amount; }?> " >                              
                    </div>
                </div>
            </div>
        </div>



        <div id="add_wages_msg" class="form-row"> </div>
        <input type="hidden" id="employee_code" name="employee_code" />
       
        <div class="modal-footer">
           

            <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

        </div>

    </form>
</div>