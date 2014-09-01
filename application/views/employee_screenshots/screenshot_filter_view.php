
<ul>
    <?php

    foreach ($my_screen_shots as $my_screen_shot) {
        ?>
        <li class="mix northeast camping climbing fishing swimming" data-name="Acadia" data-area="47452.80" style="display: block; opacity: 1;">

            <div class="meta name employee">
                <div class="img_wrapper"> <img src="<?php echo base_url(); ?>uploads/screenshots/<?php echo $user_name . '/' . $my_screen_shot->worker_shot_name; ?>" alt="" /> </div>
                <div class="titles">
                    <h2><?php echo $my_screen_shot->project_name; ?></h2>
                    <p><em><?php echo $my_screen_shot->employee_fname . ' ' . $my_screen_shot->employee_lname; ?></em></p>
                </div>
            </div>
            <div class="meta project">
                <p><?php echo $my_screen_shot->task_name; ?></p>
            </div>
            <div class="meta tasks">
                <ul>
                    <li>Camping</li>
                    <li>Climbing</li>
                    <li>Fishing</li>
                    <li>Swimming</li>
                </ul>
            </div>


            <div class="meta rec">
                <div class="checkbox check-primary checkbox-circle">
                    <input id="checkbox9" type="checkbox" checked="checked" value="1">
                    <label for="checkbox9"></label>
                </div>
            </div>
        </li>
    <?php } ?>
    <!-- END LIST OF PARKS -->
</ul>
