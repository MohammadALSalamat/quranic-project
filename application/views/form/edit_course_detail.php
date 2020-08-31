<?php //echo "<pre/>"; print_r($courses); exit(); ?>
<?php  if ($message)  echo $message; ?>
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>  





                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Create <strong>New Course</strong>
                                                    </div>
                                                    <div class="card-body card-block">
														
    <?=form_open_multipart(base_url('index.php/course/update_course/'.$courses->course_id), 'role="form" class="form-horizontal"'); ?>

                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
														
            <?php $categories = $this->db->get('categories')->result();
            $option = array();
            foreach ($categories as $category) {
                if ($category->active) {
                    $option[$category->category_id] = $category->category_name;
                }
            }
            $sub_categories = $this->db->get('sub_categories')->result();
            $option2 = array();
            foreach ($sub_categories as $sub_cat) {
                if($sub_cat->cat_id == $courses->cat_id){
                    $option2[$sub_cat->id] = $sub_cat->sub_cat_name;
                }
            }
            ?>
														
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select Category :</label></div>
                                                                    <div class="col-12 col-md-8">
                                                                            <?php echo form_dropdown('parent-category', $option, $courses->cat_id, 'id="parent-category" class="form-control"') ?>
                                                                    </div>
																	</div>
														
																	<div class="row form-group">
																	<div class="col col-md-3"><label for="select" class=" form-control-label">Select Sub-Category :</label></div>
                                                                    <div class="col-12 col-md-8">
                                                                            <?php echo form_dropdown('category', $option2, $courses->id, 'id="category" class="form-control"') ?>
                                                                    </div>																	
                                                                </div>														
														
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Course Title :</label>
															</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'course_title',
                        'placeholder' => 'Course Title',
                        'id'          => 'course_title',
                        'value'       => $courses->course_title,
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>															
															</div>
                                                            </div>
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Course Introduction :</label>
															</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'course_intro',
                        'placeholder' => 'Course Introduction',
                        'id'          => 'course_intro',
                        'value'       => $courses->course_intro,
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>															
															</div>
                                                            </div>
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Course Description :</label>
															</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'course_description',
                        'placeholder' => 'Course Description',
                        'id'          => 'course_description',
                        'value'       => $courses->course_description,
                        'rows'        => '3',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>															
															</div>
                                                            </div>
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Course Requirement :</label>
															</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'course_requirement',
                        'placeholder' => 'Course Requirements',
                        'id'          => 'course_requirement',
                        'value'       => $courses->course_requirement,
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>															
															</div>
                                                            </div>
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Target Audience :</label>
															</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'target_audience',
                        'placeholder' => 'Target Audience',
                        'id'          => 'target_audience',
                        'value'       => $courses->target_audience,
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>															
															</div>
                                                            </div>
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">What I get ? :</label>
															</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'what_i_get',
                        'placeholder' => 'What skill user will learn from this course?',
                        'id'          => 'what_i_get',
                        'value'       => $courses->what_i_get,
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>															
															</div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="feature_image" class=" form-control-label">Feature Image:</label></div>
                                                                <div class="col-12 col-md-8">
																	
                    <?php if (file_exists("course-images/$courses->course_id.png")) { ?>
                        <img class="exam-thumbnail" src="<?=base_url("course-images/$courses->course_id.png"); ?>" width="300px">
                    <?php } ?>

                    <?=form_upload('feature_image', '', 'id="feature_image" class="form-control"') ?>
                    <p class="help-block"><i class="fa fa-warning"></i> Suggested types = jpg | png, max_width = 1024px, max_height = 768px.</p>																
																</div>
                                                            </div>														
														
														

									<div class="form-group">
										<div class="col col-md-3">
                                    <label class=" form-control-label">Price:</label>
											</div>
										<div class="col col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon"><?=$currency_symbol?></div>
                                        <?php echo form_input('price', $courses->course_price, 'id="Course_price" placeholder="Course Price" class="form-control" required="required"') ?>
                                    </div>
									<small class="form-text text-muted"><i class="fa fa-warning"></i> Enter 0 for free course.</small>
                                </div></div>
														
            <div class="form-group">
              <label class="col-xs-offset-3 col-sm-8 col-xs-offset-2 col-xs-8">
                  <p class="text-muted"><i class="fa fa-warning"> </i> All fields are Required.</p>
              </label>
            </div>
            <br/><hr/>
            <div class="row">
                <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                    <button type="reset" class="btn btn-outline-link">Reset</button>
                </div>
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