

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
                        <form  id="fileupload"  action="<?php echo site_url() . '/project/fileupload' ?>" method="POST" enctype="multipart/form-data">


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
                                            <input type="text" id="project_logo" name="project_logo" style="visibility: hidden" value="project_default_logo.png"/>
                                        </div>
                                        <div id="sta"><span id="status" ></span></div>



                                    </div>
                                </div>
                            </div>



                            <div >
                                <div class="form-group">
                                    <label class="form-label">Upload Images</label>
                                    <br>

                                    <div class="right  no-padding" > 
                                        <div class="span7">
                                            <!-- The fileinput-button span is used to style the file input field as button -->
                                            <span class="btn btn-success fileinput-button">
                                                <i class="glyphicon glyphicon-plus"></i>
                                                <span>Add files...</span>
                                                <input id="fileupload" type="file" multiple="" name="files[]">
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
                                    <label><em>Attach project materials.</em></label>
                                    <br>
                                    <!-- The table listing the files available for upload/download -->
                                    <table role="presentation" class="table table-striped"><tbody class="files"></tbody></table>

                                </div>
                            </div>



                            <div id="add_project_msg" class="form-row"> </div>
                            <div class="modal-footer">
                                <button class="btn btn-primary btn-cons" type="submit">
                                    Save
                                </button>

                                <a href="<?php echo site_url(); ?>/project/project_controller/manage_projects" class="btn btn-white btn-cons" type="button">Cancel</a>

                            </div>

                        </form>

                        <!-- The template to display files available for upload -->
                        <script id="template-upload" type="text/x-tmpl">
                            {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-upload fade">
                            <td>
                            <span class="preview"></span>
                            </td>
                            <td>
                            <p class="name">{%=file.name%}</p>
                            <strong class="error text-danger"></strong>
                            </td>
                            <td>
                            <p class="size">Processing...</p>
                            <div class="progress progress-striped active" role="progressbar" aria-valuemin="0" aria-valuemax="100" aria-valuenow="0"><div class="progress-bar progress-bar-success" style="width:0%;"></div></div>
                            </td>
                            <td>
                            {% if (!i && !o.options.autoUpload) { %}
                            <button class="btn btn-primary start" disabled>
                            <i class="glyphicon glyphicon-upload"></i>
                            <span>Start</span>
                            </button>
                            {% } %}
                            {% if (!i) { %}
                            <button class="btn btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel</span>
                            </button>
                            {% } %}
                            </td>
                            </tr>
                            {% } %}
                        </script>
                        <!-- The template to display files available for download -->
                        <script id="template-download" type="text/x-tmpl">
                            {% for (var i=0, file; file=o.files[i]; i++) { %}
                            <tr class="template-download fade" style="display:none">
                            <td>
                            <span class="preview">
                            {% if (file.thumbnailUrl) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" data-gallery><img src="{%=file.thumbnailUrl%}"></a>
                            {% } %}
                            </span>
                            </td>
                            <td>
                            <p class="name">
                            {% if (file.url) { %}
                            <a href="{%=file.url%}" title="{%=file.name%}" download="{%=file.name%}" {%=file.thumbnailUrl?'data-gallery':''%}>{%=file.name%}</a>
                            {% } else { %}
                            <span>{%=file.name%}</span>
                            {% } %}
                            </p>
                            {% if (file.error) { %}
                            <div><span class="label label-danger">Error</span> {%=file.error%}</div>
                            {% } %}
                            </td>
                            <td>
                            <span class="size">{%=o.formatFileSize(file.size)%}</span>
                            </td>
                            <td>
                            {% if (file.deleteUrl) { %}
                            <button class="btn btn-danger delete" data-type="{%=file.deleteType%}" data-url="{%=file.deleteUrl%}"{% if (file.deleteWithCredentials) { %} data-xhr-fields='{"withCredentials":true}'{% } %}>
                            <i class="glyphicon glyphicon-trash"></i>
                            <span>Delete</span>
                            </button>
                            <input type="checkbox" name="delete" value="1" class="toggle">
                            {% } else { %}
                            <button class="btn btn-warning cancel">
                            <i class="glyphicon glyphicon-ban-circle"></i>
                            <span>Cancel</span>
                            </button>
                            {% } %}
                            </td>
                            </tr>
                            {% } %}
                        </script>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<script type="text/javascript">
    $('#project_parent_menu').addClass('active open');
</script>


