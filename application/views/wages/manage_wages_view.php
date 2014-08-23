<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>




<div class="row-fluid">
  
        <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Company</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu">
                <li class="active" data-filter="all" data-dimension="company_code"><a href="#">All</a></li>
                <?php
                foreach ($companies as $company) {
                    ?>
                      <li class="active" data-filter="company_name" data-dimension="company_code"></li>
                <?php }
                ?>
            </ul>
        </div>
      </div>
    

 