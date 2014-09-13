
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
                    <li><?php echo $my_screen_shot->worker_date; ?></li>
                </ul>
            </div>


            <div class="meta rec">
                <div class="checkbox check-primary checkbox-circle">
                    <input id="<?php echo $my_screen_shot->worker_id . 'chk'; ?>"  type="checkbox" class="sc_chk_box">
                    <label for="<?php echo $my_screen_shot->worker_id . 'chk'; ?>"></label>
                </div>
                <input type="hidden" value="0" name="chk_boxes[]">
                <input type="hidden" value="<?php echo $my_screen_shot->worker_id; ?>" >
            </div>
        </li>
    <?php } ?>
    <!-- END LIST OF PARKS -->
</ul>
