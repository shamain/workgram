<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div id="work_snap_filters" class="pull-left">
        <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Employee</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu">
                <li class="active" data-filter="all" data-dimension="region"><a href="#">All</a></li>
                <?php
                foreach ($employees as $employee) {
                    ?>
                    <li data-filter = "alaska" data-dimension = "region"><a href = "#"><?php echo ucfirst($employee->employee_fname . ' ' . $employee->employee_lname); ?></a></li>
                <?php }
                ?>
            </ul>
        </div>
        <div class="btn-group"> <a href="#" data-toggle="dropdown" class="btn dropdown-toggle btn-demo-space"> <span class="anim150">Project</span> <span class="caret"></span> </a>
            <ul class="dropdown-menu">
                <li class="active" data-filter="all" data-dimension="recreation"><a href="#">All</a></li>
                <li data-filter="camping" data-dimension="recreation"><a href="#">Camping</a></li>

            </ul>
        </div>
    </div>

    <div class="pull-right">
        <div class="btn-group" data-toggle="buttons-radio">
            <button id="ToList" class="btn btn-primary active" type="button">
                <i class="fa fa-th-list"></i>
            </button>
            <button id="ToGrid" class="btn btn-primary" type="button">
                <i class="fa fa-th-large"></i>
            </button>
        </div>
    </div>
    <div class="clearfix"></div>

    <div id="Parks" class="just list">
        <div class="list_header">
            <div id="sortByName" class="meta name active desc">
                Employee
                <span class="sort anim150 asc" data-order="desc" data-sort="data-name"></span>
                <span class="sort anim150 desc active" data-order="asc" data-sort="data-name"></span>

                <div class="meta task">
                    Task
                </div>
                <div class="meta project">
                    Project
                </div>
                <div class="meta date">
                    Date
                </div>

            </div>


        </div>
        <ul>
		<li class="mix northeast camping climbing fishing swimming" data-name="Acadia" data-area="47452.80">
          <div class="meta name">
            <div class="img_wrapper"> <img src="<?php echo base_url(); ?>application_resources/img/others/acadia.jpg" alt="" /> </div>
            <div class="titles">
              <h2>Acadia</h2>
              <p><em>Maine</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Northeast</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Climbing</li>
              <li>Fishing</li>
              <li>Swimming</li>
            </ul>
          </div>
          <div class="meta area">
            <p>47,452.80</p>
          </div>
        </li>
        <li class="mix intermountain camping climbing" data-name="Arches" data-area="76678.98">
          <div class="meta name">
            <div class="img_wrapper"> <img src="<?php echo base_url(); ?>application_resources/img/others/arches.jpg" onload="" alt="" /> </div>
            <div class="titles">
              <h2>Arches</h2>
              <p><em>Utah</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Intermountain</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Climbing</li>
            </ul>
          </div>
          <div class="meta area">
            <p>76,678.98</p>
          </div>
        </li>
        <li class="mix pacific_west camping fishing" data-name="Crater Lake" data-area="183224.05">
          <div class="meta name">
            <div class="img_wrapper"> <img src="assets/img/others/crater.jpg" onload="" alt=""/> </div>
            <div class="titles">
              <h2>Crater Lake</h2>
              <p><em>Oregon</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Pacific West</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Fishing</li>
            </ul>
          </div>
          <div class="meta area">
            <p>183,224.05</p>
          </div>
        </li>
        <li class="mix alaska camping climbing fishing" data-name="Denali" data-area="4740911.37">
          <div class="meta name">
            <div class="img_wrapper"> <img src="assets/img/others/denali.jpg" onload="" alt=""/> </div>
            <div class="titles">
              <h2>Denali</h2>
              <p><em>Alaska</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Alaska</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Climbing</li>
              <li>Fishing</li>
            </ul>
          </div>
          <div class="meta area">
            <p>4,740,911.37</p>
          </div>
        </li>
        <li class="mix alaska camping fishing" data-name="Glacier Bay" data-area="3223383.66">
          <div class="meta name">
            <div class="img_wrapper"> <img src="assets/img/others/glacier.jpg" onload="" alt=""/> </div>
            <div class="titles">
              <h2>Glacier Bay</h2>
              <p><em>Alaska</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Alaska</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Fishing</li>
            </ul>
          </div>
          <div class="meta area">
            <p>3,223,383.66</p>
          </div>
        </li>
        <li class="mix intermountain camping fishing" data-name="Grand Canyon" data-area="1217261.75">
          <div class="meta name">
            <div class="img_wrapper"> <img src="assets/img/others/grand.jpg" onload="" alt=""/> </div>
            <div class="titles">
              <h2>Grand Canyon</h2>
              <p><em>Arizona</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Intermountain</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Fishing</li>
            </ul>
          </div>
          <div class="meta area">
            <p>1,217,261.75</p>
          </div>
        </li>
        <li class="mix southeast camping fishing" data-name="Great Smoky Mountains" data-area="522418.90">
          <div class="meta name">
            <div class="img_wrapper"> <img src="assets/img/others/great.jpg" onload="" alt=""/> </div>
            <div class="titles">
              <h2>Great Smoky Mountains</h2>
              <p><em>Tennessee, North Carolina</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Southeast</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Fishing</li>
            </ul>
          </div>
          <div class="meta area">
            <p>522,418.90</p>
          </div>
        </li>
        <li class="mix pacific_West camping swimming" data-name="Haleakala" data-area="33264.62">
          <div class="meta name">
            <div class="img_wrapper"> <img src="assets/img/others/haleakala.jpg" onload="" alt=""/> </div>
            <div class="titles">
              <h2>Haleakala</h2>
              <p><em>Hawaii</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Pacific West</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Swimming</li>
            </ul>
          </div>
          <div class="meta area">
            <p>33,264.62</p>
          </div>
        </li>
        <li class="mix intermountain camping climbing fishing swimming" data-name="Yellowstone" data-area="2219790.71">
          <div class="meta name">
            <div class="img_wrapper"> <img src="assets/img/others/yellowstone.jpg" onload="" alt=""/> </div>
            <div class="titles">
              <h2>Yellowstone</h2>
              <p><em>Wyoming, Montana, Idaho</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Intermountain</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Climbing</li>
              <li>Fishing</li>
              <li>Swimming</li>
            </ul>
          </div>
          <div class="meta area">
            <p>2,219,790.71</p>
          </div>
        </li>
        <li class="mix intermountain camping climbing fishing" data-name="Intermountain" data-area="146597.40">
          <div class="meta name">
            <div class="img_wrapper"> <img src="assets/img/others/zion.jpg" onload="" alt=""/> </div>
            <div class="titles">
              <h2>Zion</h2>
              <p><em>Utah</em></p>
            </div>
          </div>
          <div class="meta region">
            <p>Intermountain</p>
          </div>
          <div class="meta rec">
            <ul>
              <li>Camping</li>
              <li>Climbing</li>
              <li>Fishing</li>
            </ul>
          </div>
          <div class="meta area">
            <p>146,597.40</p>
          </div>
        </li>
        <!-- END LIST OF PARKS -->
		</ul>


    </div>
</div>


































</div>