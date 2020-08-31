<?php if ($message) echo $message; ?>
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?> 




                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                      <?php echo 'course title : <strong>'.$course_title; ?></strong>
                                                    </div>
                                                    <div class="card-body card-block">

        <div class="row">
            <div class="col-12">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>
        </div>
														
														
    <?=form_open_multipart(base_url('index.php/course/add_content'), 'id="upload-form" role="form" class="form-horizontal"'); ?>
            <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
            <input type="hidden" name="course_title" value="<?php echo $course_title; ?>">
            <input type="hidden" name="section" value="<?php echo $section_id; ?>">
            <?php
            $option = array();
            $option[''] = 'Select Section';
            foreach ($sections as $section) {
                $option[$section->section_id] = $section->section_name.': '.$section->section_title;
            }
            ?>
														
														<?php if (!isset($section_id) || $section_id == '') { ?>
                                                                  <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select section:</label></div>
                                                                    <div class="col-12 col-md-8">
                                                                        <?php echo form_dropdown('section', $option,'', 'id="section" class="form-control" required') ?>
                                                                    </div>
                                                                </div>
														<?php } ?>
														
														        <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Title :</label>
																	</div>
                                                                <div class="col-12 col-md-8">
																	<?php 
                                                                      $data = array(
                                                                      'name'        => 'video_title',
                                                                      'placeholder' => 'Title',
                                                                      'value'       => '',
                                                                      'rows'        => '2',
                                                                      'class'       => 'form-control textarea-wysihtml5',
                                                                      'required' => 'required',
                                                                      ); ?>
                                                                      <?php echo form_textarea($data) ?>
																	</div>
                                                                     </div>
														
														        <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="upload-media-file" class=" form-control-label">Content Type :</label>
																	</div>
                                                                <div class="col-12 col-md-8">
																	<div id="media-choose"><a href="#" class="btn btn-outline-secondary" id='upload-media-file'>Choose</a></div>
																	            <div id="media-option"></div>
																	            <div id="media-field"></div>
																	</div>
                                                                     </div>	
														
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label class=" form-control-label">Free:</label></div>
                                                                    <div class="col col-md-9">
                                                                        <div class="form-check">
                                                                            <div class="checkbox">
																				
                      <?php 
                    $data = array(
                        'name'        => 'free',
                        'id'          => 'free',
                        'value'       => 'free',
                        // 'checked'     => TRUE,
                        'style'       => 'margin:10px',
                        ); ?>
                    <?php echo form_checkbox($data); ?> free
                                                                            </div>

                                                                        </div>
                                                                    </div>
                                                                </div>
														
														
				 <div class="form-group">
                <div class="col-12">
                    <div id="progressBar" style="display:none;"><img src="<?=base_url('assets/progress.gif')?>" /></div>
                </div>
            </div>
														
													
                <div class="col-12" align="center">
                    <button type="submit" onclick="$('#progressBar').show();" class="btn btn-outline-primary"> <i class="fa fa-check-square-o"></i> Save and Add More</button>
                    <button type="submit" onclick="$('#progressBar').show();" class="btn btn-outline-info" name="done" value="done"><i class="fa fa-arrow-circle-right"></i> Save and Done</button>
                </div>

            <?=form_close();?>
														

                                                </div></div></div>





<!-- Dynamic media file upload Script-->
<script type="text/javascript">
$('#upload-media-file').click(function(){
    var type = '<div class="form-group">'
                +'<div class="col-12">'
                        +'<input type="radio" value="file" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>File </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="external_link" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>External link </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="video" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Video </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="youtube" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>YouTube </span>'
                +'</div>'
            +'</div>';
    $('#media-choose').hide();
    $('#media-option').append(type);
})

//Add media fields
function add_media_field(val) {
    var field = '<div class="form-group">'
                +'<div class="col-12"><input type="hidden" name="media_type" value="'+val+'">';
    if (val == 'video') {
            var types = 'mp4 | webm | ogg | flv | avi';
    };

    switch(val){
        case 'external_link':
        case 'youtube':
            field += '<input type="text" class="form-control" name="media">';
            break;
        case 'file':
            field += '<input type="file" id="media" name="media" style="margin-top:8px;">';
            break;
        case 'video':
            field += '<input type="file" id="media" name="media" style="margin-top:8px;">';
            field += '<p class="help-block"><i class="fa fa-warning"></i> Allowed types = '+ types +'.</p>';
            break;
    }
    field +='</div></div>';

    $('#media-option').hide();
    $('#media-field').append(field);
}
</script>
<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>
