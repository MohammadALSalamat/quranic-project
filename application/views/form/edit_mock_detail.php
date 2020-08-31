<?php //echo "<pre/>"; print_r($mock); exit(); ?>
<?php  if ($message)  echo $message; ?>
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>   

            <div class="col-12">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>

                                           <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Update <strong>Exam</strong>
                                                    </div>
                                                    <div class="card-body card-block">

    <?=form_open_multipart(base_url('index.php/admin_control/update_exam/'.$mock->title_id), 'role="form" class="form-horizontal"'); ?>
													
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
                        'value'       => $mock->title_name,
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																
																</div>
                                                            </div>	
														
            <?php $categories = $this->db->get('categories')->result();
            $option = array();
            foreach ($categories as $category) {
                $option[$category->category_id] = $category->category_name;
            }
            $sub_categories = $this->db->get('sub_categories')->result();
            $option2 = array();
            foreach ($sub_categories as $sub_cat) {
                if($sub_cat->cat_id == $mock->cat_id){
                    $option2[$sub_cat->id] = $sub_cat->sub_cat_name;
                }
            }
            ?>
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Select Category : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<?php echo form_dropdown('parent-category', $option, $mock->cat_id, 'id="parent-category" class="form-control"') ?>
																</div>															
                                                            </div>					
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Select Sub-Category : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<?php echo form_dropdown('category', $option2, $mock->id, 'id="category" class="form-control"') ?>
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
                            <option value="<?=$course->course_id;?>" <?=($course->course_id == $mock->course_id)?'selected':'';?>><?=$course->course_title;?></option>
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
                        'value'       => $mock->syllabus,
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
																 <?php if (file_exists("exam-images/$mock->title_id.png")) { ?>
                        <img class="exam-thumbnail" src="<?=base_url("exam-images/$mock->title_id.png"); ?>" style="width: 400px" alt="...">
                    <?php } ?>
																</div>																
                                                            </div>																												
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label"> </label>
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
                                                              <?php echo form_input('passing_score', $mock->pass_mark, 'id="passing_score" placeholder="Passing Score" class="form-control" required="required"') ?>
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
                      <?php echo form_input('price', $mock->exam_price, 'id="exam_price" placeholder="Exam Price" class="form-control"') ?>
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
                        <option value="1" <?=(1 == $mock->public)?'selected':'';?> >Yes</option>
                        <option value="0" <?=(0 == $mock->public)?'selected':'';?> >No</option>
                    </select> <p class="help-block info"><i class="fa fa-exclamation-circle"></i> If No, This exam will not available on exam page but can be linked with any course.</p>
																</div>																
                                                            </div>																												
														
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Time Duration : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																<div class="input-group">
                      <?php echo form_input('duration', $mock->time_duration, 'id="timepicker1" placeholder="hh:mm:ss" class="form-control" required="required"') ?>
                      <span class="input-group-addon"> <i class="fa fa-clock-o"></i> </span>
                    </div>
																</div>																
                                                            </div>																												
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Total Random Questions : </label>
																</div>
                                                                <div class="col-12 col-md-8">
															<?php echo form_input('random_ques', $mock->random_ques_no, 'id="random_ques" placeholder="Numbers only" class="form-control" required="required"') ?>
														<p class="help-block info"><i class="fa fa-exclamation-circle"></i> Number of question have to answer. Enter 0 to disable randomization.
																	<br><i class="fa fa-exclamation-circle"></i>  Total available questions <?=$ques_count;?></p>
																</div>																
                                                            </div>																												

            <div class="form-group" align="center">
              <label class="col-12">
                  <p class="text-muted"><i class="fa fa-exclamation"> </i> All fields are Required.</p>
              </label>
            </div>														
														
		<hr/>

		
		<div class="col-12" align="center">
                    <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Update</button>
                    <button type="reset" class="btn btn-warning col-xs-offset-1">Reset</button>
                </div>
            <?=form_close(); ?>		
		

                                                </div></div></div>




<?php include('application/views/plugin_scripts/bootstrap-wysihtml5.php');?>

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