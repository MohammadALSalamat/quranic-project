<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?> 

            <div class="col-12">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>	

                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Create <strong>Exam</strong>
                                                    </div>
                                                    <div class="card-body card-block">

        <?=form_open_multipart(base_url('index.php/admin_control/create_exam'), 'role="form" class="form-horizontal"'); ?>
													
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Exam Title : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																	
					<?php 
                    $data = array(
                        'name'        => 'mock_title',
                        'placeholder' => 'Exam Title',
                        'id'          => 'mock_title',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																
																</div>
                                                            </div>														
            <?php
            $option = array();
            $option[''] = 'Select Category';
            foreach ($categories as $category) {
                if ($category->active) {
                    $option[$category->category_id] = $category->category_name;
                }
            }
            ?>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Select Category : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<?php echo form_dropdown('parent-category', $option,'', 'id="parent-category" class="form-control"') ?>
																</div>															
                                                            </div>					
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Select Sub-Category : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<select name="category" id="category" class="form-control">
                        <option>Sub-category</option>
                    </select>
																	
																</div>																
                                                            </div>	
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Associated Course : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<select name="course_id" class="form-control">
                        <option value="">None</option>
                        <?php $courses = $this->db->get('courses')->result();
                        foreach ($courses as $course) { ?>
                            <option value="<?=$course->course_id;?>"><?=$course->course_title;?></option>
                        <?php } ?>
                    </select>
																	
																</div>																
                                                            </div>		
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Syllabus : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<?php 
                    $data = array(
                        'name'        => 'mock_syllabus',
                        'id'          => 'syllabus',
                        'placeholder' => 'Syllabus ',
                        'value'       => '',
                        'rows'        => '3',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required'
                    ); ?>
                    <?php echo form_textarea($data) ?>
																	
																</div>																
                                                            </div>		
														
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Feature Image : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<?=form_upload('feature_image', '', 'id="feature_image" class="form-control"') ?>
                    <p class="help-block"><i class="fa fa-exclamation-circle"></i> Suggested types = jpg | png, max_width = 1024px, max_height = 768px.</p>
																</div>																
                                                            </div>																												
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Passing Score : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<div class="input-group">
                                                              <?php echo form_input('passing_score', '', 'id="passing_score" placeholder="Passing Score" class="form-control" required="required"') ?>
                                                                                <span class="input-group-addon"> % </span>
                                                                                </div> 
																</div>																
                                                            </div>																												
														
														
														
            <?php if ($commercial) { ?>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Price : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<div class="input-group">
                      <?php echo form_input('price', '', 'id="exam_price" placeholder="Exam Price" class="form-control"') ?>
                      <span class="input-group-addon"> <?=$currency_symbol?> </span>
                    </div><p class="help-block"><i class="fa fa-exclamation-circle"></i> Enter 0 for free exam.</p>
																</div>																
                                                            </div>																												
            <?php } ?>

														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Public : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<select name="public" class="form-control">
                        <option value="1">Yes</option>
                        <option value="0">No</option>
                    </select> <p class="help-block info"><i class="fa fa-exclamation-circle"></i> If No, This exam will not available on exam page but can be linked with any course.</p>
																</div>																
                                                            </div>																												
														
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Time Duration : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<div class="input-group">
                      <?php echo form_input('duration', '', 'id="timepicker1" placeholder="hh:mm:ss" class="form-control" required="required"') ?>
                      <span class="input-group-addon"> <i class="fa fa-clock-o"></i> </span>
                    </div>
																</div>																
                                                            </div>																												
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Total Random Questions : </label>
																</div>
                                                                <div class="col-12 col-md-8">
															<?php echo form_input('random_ques', '', 'id="random_ques" placeholder="Numbers only" class="form-control" required="required"') ?>
														<p class="help-block info"><i class="fa fa-exclamation-circle"></i> Number of question have to answer. Enter 0 to disable randomization.</p>
																</div>																
                                                            </div>																												

            <div class="form-group" align="center">
              <label class="col-12">
                  <p class="text-muted"><i class="fa fa-exclamation"> </i> All fields are Required.</p>
              </label>
            </div>														
														
		<hr/>

		
		<div class="col-12" align="center">
                    <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Next</button>
                    <button type="reset" class="btn btn-warning col-xs-offset-1">Reset</button>
                </div>
            <?=form_close(); ?>		
		

                                                </div></div></div>




<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>

<script>
$('select#parent-category').change(function() {

    var category = $(this).val();
    var link = '<?php echo base_url()?>'+'index.php/admin_control/get_subcategories_ajax/'+category;
    $.ajax({
        data: category,
        url: link
    }).done(function(subcategories) {

        console.log(subcategories);
        $('#category').html(subcategories);
    });
});
</script>