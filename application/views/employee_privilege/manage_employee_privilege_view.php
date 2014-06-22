<div class="page-title">	
    <h3><?php echo $heading.'- '. ucfirst($employee_detail->employee_fname) ?><span class="semi-bold"><?php echo ucfirst($employee_detail->employee_lname); ?></h3>		
</div>

<?php

foreach ($employees as $employee) {
                            ?> 
    <div class="modal-footer">         
      <button type="button" class="btn btn-default" data-dismiss="modal">ADMIN</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">EMPLOYEE</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">COMPANY_OWNER</button>
      <button type="button" class="btn btn-default" data-dismiss="modal">ALL</button>
    </div>  
      

      

          



