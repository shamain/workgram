

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

                            <fieldset class = "adminList"><legend>Upload Images</legend>

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
                          

                                
                                <input class="button def" type="reset" value="Clear"/>     

                            </fieldset>

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
                            <button class="btn btn-primary start" disabled style="display:none;">
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


