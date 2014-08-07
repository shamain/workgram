<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery-ui-1.8.20.custom.min.js"></script>
<script src="<?php echo base_url(); ?>application_resources/jupload/js/vendor/jquery.ui.widget.js"></script>
<script src="<?php echo base_url(); ?>application_resources/jupload/js/tmpl.min.js"></script>
<script src="<?php echo base_url(); ?>application_resources/jupload/js/load-image.min.js"></script>
<script src="<?php echo base_url(); ?>application_resources/jupload/js/canvas-to-blob.min.js"></script>
<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.blueimp-gallery.min.js"></script>
<!-- The Iframe Transport is required for browsers without support for XHR file uploads -->
<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.iframe-transport.js"></script>
<!-- The basic File Upload plugin -->
<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload.js"></script>
<!-- The File Upload processing plugin -->
<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-process.js"></script>
<!-- The File Upload image preview & resize plugin -->
<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-image.js"></script>
<!-- The File Upload audio preview plugin -->
<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-audio.js"></script>
<!-- The File Upload video preview plugin -->
<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-video.js"></script>
<!-- The File Upload validation plugin -->
<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-validate.js"></script>
<!-- The File Upload user interface plugin -->
<script src="<?php echo base_url(); ?>application_resources/jupload/js/jquery.fileupload-ui.js"></script>
<!-- The main application script -->
<script src="<?php echo base_url(); ?>application_resources/jupload/js/main.js"></script>

<!-- jQuery UI styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>application_resources/jupload/css/jquery-ui-1.8.21.custom.css" id="theme" />
<!-- jQuery Image Gallery styles -->

<!-- CSS to style the file input field as button and adjust the jQuery UI progress bars -->
<link rel="stylesheet" href="<?php echo base_url(); ?>application_resources/jupload/css/jquery.fileupload-jquery-ui.css" />

<div class="page-title">	
    <h3><?php echo $heading; ?></h3>		
</div>

<div class="row-fluid">
    <div class="span12">
        <div class="grid simple ">
            <div class="grid-title">
                <h4>Advance <span class="semi-bold">Options</span></h4>
                <div class="tools"> <a href="javascript:;" class="collapse"></a> <a href="#grid-config" data-toggle="modal" class="config"></a> <a href="javascript:;" class="reload"></a> <a href="javascript:;" class="remove"></a> </div>
            </div>
            <div class="grid-body ">
                <div class="row">
                    <div class="col-md-12 col-sm-12 col-xs-12">
                        <form id="add_project_form" name="add_project_form">


                            <div class="form-group">
                                <label class="form-label">Title</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="project_name" class="form-control" type="text" name="project_name" style="width: 50%">    
                                </div>
                            </div>


                            <div class="form-group">
                                <label class="form-label">Vendor</label>
                                <span style="color: red">*</span>

                                <div class="input-with-icon  right">                                       
                                    <i class=""></i>
                                    <input id="project_vendor" class="form-control" type="text" name="project_vendor" style="width: 50%">                              
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Start Date</label>
                                <span style="color: red">*</span><br>

                                <div class="input-with-icon  right input-append primary date  no-padding" id="project_start_date_edit_dpicker">                                       
                                    <i class=""></i>

                                    <input class="form-control" type="text" id="project_start_date" name="project_start_date" readonly="true" value="<?php echo date("Y-m-d"); ?>">
                                    <span class="add-on">
                                        <span class="arrow"></span>
                                        <i class="fa fa-th"></i>
                                    </span>
                                </div>
                            </div>

                            <div class="form-group">
                                <label class="form-label">Dead Line</label>
                                <br>

                                <div class="input-with-icon  right input-append primary date  no-padding" id="project_end_date_edit_dpicker">                                       
                                    <i class=""></i>

                                    <input class="form-control" type="text" id="project_end_date" name="project_end_date" readonly="true">
                                    <span class="add-on">
                                        <span class="arrow"></span>
                                        <i class="fa fa-th"></i>
                                    </span>
                                </div>
                            </div>
                            <div class="form-group">
                                <label class="form-label">Description</label>
                                <span style="color: red">*</span>

                                <div class="right">                                       
                                    <i class=""></i>
                                    <textarea id="project_description" class="form-control" type="text" name="project_description" rows="20">    </textarea>                          
                                </div>
                            </div>

                            <script src="<?php echo base_url(); ?>application_resources/plugins/jquery-1.8.3.min.js" type="text/javascript"></script>
                            <script src="<?php echo base_url(); ?>application_resources/file_upload_plugin/ajaxupload.3.5.js" type="text/javascript"></script>
                            <script type="text/javascript">

                                $(function() {
                                    var btnUpload = $('#upload');
                                    var status = $('#status');
                                    new AjaxUpload(btnUpload, {
                                        action: '<?PHP echo site_url(); ?>/project/project_controller/upload_project_logo',
                                        name: 'uploadfile',
                                        onSubmit: function(file, ext) {
                                            if (!(ext && /^(jpg|png|jpeg|gif)$/.test(ext))) {
                                                // extension is not allowed 
                                                status.text('Only JPG, PNG or GIF files are allowed');
                                                return false;
                                            }
                                            //status.text('Uploading...Please wait');
                                            $("#files").html("<i id='animate-icon' class='fa fa-spinner fa fa-2x fa-spin'></i>");

                                        },
                                        onComplete: function(file, response) {
                                            //On completion clear the status
                                            //status.text('');
                                            $("#files").html("");
                                            $("#sta").html("");
                                            //Add uploaded file to list
                                            if (response != "error") {

                                                $('#files').html("");
                                                $('<div></div>').appendTo('#files').html('<img src="<?PHP echo base_url(); ?>uploads/project_logo/' + response + '" width="100px" height="100px" /><br />');
                                                picFileName = response;
                                                document.getElementById('project_logo').value = response;
                                            } else {
                                                $('<div></div>').appendTo('#files').text(file).addClass('error');
                                            }
                                        }
                                    });

                                });

                            </script>

                            <div class="row form-row">
                                <div class="col-md-2">
                                    <div class="form-group">
                                        <div id="files" class="project-logo">
                                            <img src="<?php echo base_url(); ?>uploads/project_logo/project_default_logo.png" width="100px" height="100px" />
                                        </div>
                                    </div>
                                </div>
                                <div class="col-md-6">
                                    <div class=" right">                                       
                                        <i class=""></i>

                                        <div id="upload">
                                            <button class="btn btn-default btn-sm btn-small" type="button" id="browse">
                                                <i class="fa fa-camera"></i>
                                            </button>
                                            <label class="form-label">upload project logo</label>
                                            <input type="text" id="project_logo" name="project_logo" style="visibility: hidden" value="<?php echo base_url(); ?>uploads/project_logo/project_default_logo.png"/>
                                        </div>
                                        <div id="sta"><span id="status" ></span></div>



                                    </div>
                                </div>
                            </div>

                            <div class="row form-row">
                                <legend>Upload Images</legend>

                                <br/>
                                <div class="row fileupload-buttonbar">
                                    <div class="span7">
                                        <!-- The fileinput-button span is used to style the file input field as button -->
                                        <span class="btn btn-success fileinput-button">
                                            <i class="icon-plus icon-white"></i>
                                            <span>Add files...</span>
                                            <input type="file" name="files[]" multiple>
                                        </span>
                                        <button type="submit" class="btn btn-primary start" id="start_upload" >
                                            <i class="icon-upload icon-white"></i>
                                            <span>Start upload</span>
                                        </button>
                                        <button type="reset" class="btn btn-warning cancel">
                                            <i class="icon-ban-circle icon-white"></i>
                                            <span>Cancel upload</span>
                                        </button>


                                    </div>
                                    <!-- The global progress information -->
                                    <div class="span5 fileupload-progress fade">
                                        <!-- The global progress bar -->
                                        <div class="progress progress-success progress-striped active">
                                            <div class="bar" style="width:0%;"></div>
                                        </div>
                                        <!-- The extended global progress information -->
                                        <div class="progress-extended">&nbsp;</div>
                                    </div>
                                </div>
                                <!-- The loading indicator is shown during file processing -->
                                <label><em></>Please upload images in either jpg,jpeg,png or gif formats only.</em></label>
                                <br>
                                <!-- The table listing the files available for upload/download -->
                                <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>

                            </div>



                            <div id="add_project_msg" class="form-row"> </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Save</button>
                                <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>

                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#project_parent_menu').addClass('active open');
</script>


