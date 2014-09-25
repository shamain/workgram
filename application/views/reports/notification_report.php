<!--
   Name: W.B.M.C. Fernando
   ID  : IT08003416
-->
<div class="grid simple">
    <div class="grid-body no-border invoice-body"> <br>
        <div class="pull-right">
            <h2><?php echo $heading; ?></h2>
        </div>
        <div class="clearfix"></div>
        <br>
        <br>
        <h3>Notifications</h3>
        
        <table class="table">
            <thead>
                <tr> 
                    <th>ID</th>
                    <th>Message</th>
                    <th>Description</th>                    
                    <th>Type</th>
                    <th>Added Date</th> 
                     

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($notifications as $notification) {
                    ?> 
                    <tr  id="notification_<?php echo $notification->notification_id; ?>">

                        <td><?php echo $notification->notification_id; ?></td>
                        <td style="word-break:break-all ;"><?php echo $notification->notification_msg; ?></td>
                        <td style="word-break:break-all ;"><?php echo $notification->notification_area_url; ?></td>
                        <td><?php echo $notification->system; ?></td>


                        <td><?php echo date('d M Y H:i:s',strtotime($notification->notification_added_date)) . ' GMT'; ?></td>
                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    </div>

        <div class="clearfix"></div>
        <br>
        <br>
        <h3>Notified Employees</h3>
        
        <table class="table">
            <thead>
                <tr> 
                    <th>ID</th>
                    <th>Employee Name</th>                    
                    <th>Message</th>
                    <th>Is Seen</th> 
                     

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($notified_users as $notified_user) {
                    ?> 
                    <tr  id="notified_user_<?php echo $notified_user->notified_users_id; ?>">

                        <td><?php echo $notified_user->notified_users_id; ?></td>
                        <td><?php echo $notified_user->employee_fname . "" . $notified_user->employee_lname; ?></td>
                        <td style="word-break:break-all ;"><?php echo $notified_user->notification_msg; ?></td>
                        <td><?php
                            if ($notified_user->notified_user_is_seen == 'n') {
                                echo 'NO';
                            } else {
                                echo 'YES';
                            }
                            ?> 
                        </td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
        
    
</div>
