<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a>  <a href="javascript:;" class="reload"></a>  </div>
            </div>
            <div class="grid-body ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form id="edit_event_form" name="edit_event_form">

                            <div class="row form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Event Title</label>
                                        <span style="color: red">*</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-with-icon  right">                                       
                                        <i class=""></i>
                                        <input id="event_title" class="form-control" type="text" name="event_title" value="<?php echo $event->event_title; ?>" style="width: 50%">                              
                                        <input id="event_id" class="form-control" type="hidden" name="event_id" value="<?php echo $event->event_id; ?>" >                              
                                    </div>
                                </div>
                            </div>

                            <div class="row form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Event Description</label>
                                        <span style="color: red">*</span>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class="input-with-icon  right">                                       
                                        <i class=""></i>
                                        <input id="event_description" class="form-control" type="text" name="event_description" value="<?php echo $event->event_description; ?>" style="width: 50%">                              
                                                 
                                    </div>
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">Start Date</label>
                                        <span style="color: red">*</span>
                                    </div>
                                </div>
                                <div class="input-with-icon  right input-append primary date  no-padding" id="project_start_date_edit_dpicker">                                       
                                    <i class=""></i>

                                    <input class="form-control" type="text" id="start_date" name="start_date" readonly="true" value="<?php echo date("Y-m-d"); ?>">
                                    <span class="add-on">
                                        <span class="arrow"></span>
                                        <i class="fa fa-th"></i>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="row form-row">
                                <div class="col-md-5">
                                    <div class="form-group">
                                        <label class="form-label">End Date</label>
                                        <span style="color: red">*</span>
                                    </div>
                                </div>
                                <div class="input-with-icon  right input-append primary date  no-padding" id="project_end_date_edit_dpicker">                                       
                                    <i class=""></i>

                                    <input class="form-control" type="text" id="end_date" name="end_date" readonly="true" value="<?php echo $event->end_date; ?>">
                                    <span class="add-on">
                                        <span class="arrow"></span>
                                        <i class="fa fa-th"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="modal-footer">
                                <button class="btn btn-primary btn-cons" type="submit">
                                    <i class="icon-ok"></i>
                                    Save
                                </button>
                                <button class="btn btn-white btn-cons" type="button" onclick="parent.location='<?php echo site_url(); ?>/event/event_controller/manage_event/'">Cancel</button>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>