<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.1/jquery.min.js"></script>

<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>   


                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong> Create</strong> New Course
                                                    </div>
                                                    <div class="card-body card-block">
														<?=form_open_multipart(base_url('index.php/course/save_course'), 'role="form" enctype="multipart/form-data" class="form-horizontal"'); ?>
														
														            <div class="col-xs-offset-1 col-xs-10">
                                                                    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
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
                                                                    <div class="col col-md-3"><label for="parent-category" class=" form-control-label">Select category</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                         <?php echo form_dropdown('parent-category', $option,'', 'id="parent-category" class="form-control"') ?>
                                                                    </div>
                                                                    <div class="col col-md-3"><label for="category" class=" form-control-label">Select sub-category</label></div>
                                                                    <div class="col-12 col-md-9">
                                                                    <select name="category" id="category" class="form-control">
                                                                    <option>Sub-category</option>
                                                                    </select>
                                                                    </div>
                                                                    </div>
														
														
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Course Title:</label></div>
                                                                <div class="col-12 col-md-9">
																	<?php 
                    $data = array(
                        'name'        => 'course_title',
                        'placeholder' => 'Course Title',
                        'id'          => 'course_title',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																</div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Course Introduction:</label></div>
                                                                <div class="col-12 col-md-9">
																	<?php 
                    
                    $data = array(
                        'name'        => 'course_intro',
                        'placeholder' => 'Course Introduction',
                        'id'          => 'course_intro',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																</div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Course Description:</label></div>
                                                                <div class="col-12 col-md-9">
					<?php 
                    $data = array(
                        'name'        => 'course_description',
                        'placeholder' => 'Course Description',
                        'id'          => 'course_description',
                        'value'       => '',
                        'rows'        => '3',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																</div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Course Requirement:</label></div>
                                                                <div class="col-12 col-md-9">
					<?php 
                    $data = array(
                        'name'        => 'course_requirement',
                        'placeholder' => 'Course Requirements',
                        'id'          => 'course_requirement',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																</div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Target Audience:</label></div>
                                                                <div class="col-12 col-md-9">
					<?php 
                    $data = array(
                        'name'        => 'target_audience',
                        'placeholder' => 'Target Audience',
                        'id'          => 'target_audience',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																</div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">What I get?:</label></div>
                                                                <div class="col-12 col-md-9">
					<?php 
                    $data = array(
                        'name'        => 'what_i_get',
                        'placeholder' => 'What skill user will learn from this course?',
                        'id'          => 'what_i_get',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																</div>
                                                            </div>
														
														


                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Feature Image:</label></div>
                                                                    <div class="col-12 col-md-9">
																		<?=form_upload('feature_image', '', 'id="feature_image" class="form-control-file"') ?>
																		<small class="form-text text-muted"><i class="fa fa-warning"></i> Suggested types = jpg | png, max_width = 1024px, max_height = 768px.</small>
																	</div>
                                                                </div>
														
														<div class="form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label">Price:</label></div>
                                    <div class="col-12 col-md-9 input-group">
                                        <div class="input-group-addon"><?=$currency_symbol?></div>
                                        <?php echo form_input('price', '', 'id="Course_price" placeholder="Course Price" class="form-control" required="required"') ?>
										<small class="form-text text-muted"><i class="fa fa-warning"></i> Enter 0 for free course.</small>
                                    </div>
                                    
                                </div>
										<hr>				
														
										<div class="form-group">
                                    <div class="col col-md-3"><label for="file-input" class=" form-control-label"></label></div>
                                    <div class="col-12 col-md-9 input-group">
                                        <p class="text-muted"><i class="glyphicon glyphicon-info-sign"> </i>** All fields are Required.</p>
                                    </div>
                                    
                                </div>				

           <br><hr>
            <div class="form-group">
                <div class="col-12 text-center">
                                                       <button type="reset" class="btn btn-danger btn-sm">
                                                            <i class="fa fa-ban"></i> Reset
                                                        </button>
					                                    <button type="submit" class="btn btn-primary btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> next
                                                        </button>
                 </div>
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