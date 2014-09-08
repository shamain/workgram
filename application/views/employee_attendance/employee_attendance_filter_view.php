<div class="row" id="search_result_table">
    <div class="col-md-1">
        <div class="invoice-button-action-set">
            <p>
                <button class="btn btn-primary" type="button"><i class="fa fa-print"></i></button>
            </p>
        </div>
    </div>
    <div class="col-md-11 scroller" >
        <div>
            <table class="table table-bordered no-more-tables">
                <thead>
                    <tr>

                        <th class="text-center" style="width:22%">Employee</th>
                        <?php foreach ($dates as $date) { ?>
                        <th class="text-center" style="width:22%"><?php echo date('j',strtotime($date)); ?></th>
                            <?php } ?>

                    </tr>

                </thead>
                <tbody>

                </tbody>
            </table>
        </div>
    </div>
</div>


