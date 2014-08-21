<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>
<!--Add new Category Form-->
<div class="col-md-8 ">
<div class="row-fluid">
    <div class="span6">
        <div class="grid simple ">
            <div class="grid-title">
                <h4> Wages Category</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <div class="row">
                    <div class="col-md-10 col-sm-10 col-xs-10">
                        <form id="add_employee_wages_category_form" name="add_wages_category_form">

                       <div class="row form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Wages Category</label>
                               
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="category_name" class="form-control" type="text" name="category_name"> 
                            </div>
                        </div>
                    </div>
                     
                    <div class="row form-row">
                           <div class="col-md-4">
                            <div class="form-group">
                             
                                <label class="form-label">Basic Salary</label>
                               
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="basic_salary" class="form-control" type="text" name="basic_salary">                              
                            </div>
                        </div>
                    </div>
                 
                    <div class="row form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Overtime Rate</label>
                               
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="ot_rate" class="form-control" type="text" name="ot_rate">                              
                            </div>
                        </div>
                    </div>
                      <div class="row form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Allowance</label>
                                
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="allowance" class="form-control" type="text" name="allowance">                              
                            </div>
                        </div>
                    </div>
                     <div class="row form-row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label class="form-label">Bonus</label>
                                
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="input-with-icon  right">                                       
                                <i class=""></i>
                                <input id="bonus" class="form-control" type="text" name="bonus">                              
                            </div>
                        </div>
                    </div>

                
               
                    <div id="add_wages_category_msg" class="form-row"> </div>

                           
                            <div class="modal-footer">

                                <button class="btn btn-primary btn-cons" type="submit">
                                    <i class="icon-ok"></i>
                                    Submit
                                </button>
                                  
                              

                            </div>

                </div>
            </form>
          </div>
        </div>

    </div>
</div>
</div>
    </div>

<!--wages Category table-->
<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <table class="table" id="wages_category_table" >
                    <thead>
                        <tr>                          
                            <th>Wages Category</th>                    
                            <th>Basic Salary</th>                           
                            <th>Overtime Rate</th>
                            <th>Allowance</th>
                            <th>Bonus</th>
                             <th>Options</th>
                            

                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        foreach ($wages_categories as $wages_category) {
                            ?> 
                            <tr  id="wages_category_<?php echo $wages_category->wages_category_id; ?>">

                                <td><?php echo++$i; ?></td>
                                <td><?php echo $wages_category->category_name ; ?></td>
                                <td><?php echo $wages_category->basic_salary; ?></td>
                                 <td><?php echo $wages_category->ot_rate ; ?></td>
                                <td><?php echo $wages_category->allowance; ?></td>
                                 <td><?php echo $wages_category->bonus; ?></td>
                                
                                
                                   <td>

                                    <a href="<?php echo site_url(); ?>/wages_category/wages_category_controller/edit_wages_category_view/<?php echo $wages_category->wages_category_id; ?>">
                                        <i class="fa fa-pencil"></i>
                                    </a>
                                    <a style="cursor: pointer;"   title="Delete this wages_category" onclick="delete_wages_category(<?php echo $wages_category->wages_category_id; ?>)">
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

<script type="text/javascript">
    $('#wages_category_parent_menu').addClass('active open');
</script>


