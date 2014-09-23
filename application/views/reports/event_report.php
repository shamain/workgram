<div class="grid simple">
    <div class="grid-body no-border invoice-body"> <br>
        <div class="pull-right">
            <h2><?php echo $heading; ?></h2>
        </div>
        <div class="clearfix"></div>
        <br>
        <br>
        <br>
        <table class="table">
            <thead>
                <tr> 
                    <th>Title</th>
                    <th>Description</th>                    
                    <th>Type</th>
                    <th>Start Date</th> 
                    <th>End Date</th> 

                </tr>
            </thead>
            <tbody>

                <?php
                foreach ($events as $event) {
                    ?> 
                    <tr  id="event_<?php echo $event->event_id; ?>">


                        <td style="word-break:break-all ;"><?php echo $event->event_title; ?></td>
                        <td style="word-break:break-all ;"><?php echo $event->event_description; ?></td>
                        <td><?php echo $event->event_type; ?></td>
                        <td><?php echo date('d M Y H:i:s',strtotime($event->start_date)); ?></td>
                        <td><?php echo date('d M Y H:i:s',strtotime($event->end_date)); ?></td>

                    </tr>
                <?php } ?>
            </tbody>
        </table>
    </div>
</div>