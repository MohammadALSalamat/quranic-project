<script type="text/javascript">
var i = 6;
//Add more fields
function add_field() {
    var str = '<div class="row form-group"><div class="col col-md-3"><label  for="section_' + i + '" class="form-control-label">Section Title ' + i + ' : </label></div>';
    str += '<div class="col-12 col-md-8">';
    str += '<textarea name="section[]" placeholder="Section Title ' + i + '" class="form-control textarea-wysihtml5" row="2"></textarea>';
    str += '</div></div><div id="add_more_field-' + (i + 1) + '"></div>';

    document.getElementById('add_more_field-' + i).innerHTML = str;
    i++;
}
    
</script>


<div class="col-12">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>


                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Add <strong>Sections</strong>
                                                    </div>
                                                    <div class="card-body card-block">

    <form action="<?php echo base_url().'index.php/course/save_sections'?>" method="post" id="ajax-form" role="form" class="form-horizontal">  
        <input type="hidden" name="course_id" value="<?php echo $course_id; ?>">
        <input type="hidden" name="course_title" value="<?php echo $course_title; ?>">														
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Section Title 1 : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																	
																	<?php 
                    $data = array(
                        'name'        => 'section[]',
                        'placeholder' => 'Section Title 1',
                        'id'          => 'section_1',
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
																	<label for="textarea-input" class=" form-control-label">Section Title 2 :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'section[]',
                        'placeholder' => 'Section Title 2',
                        'id'          => 'section_2',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																
																</div>
                                                            </div>														
		
		
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Section Title 3 :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'section[]',
                        'placeholder' => 'Section Title 3',
                        'id'          => 'section_3',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																
																</div>
                                                            </div>														
		
		
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Section Title 4 :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'section[]',
                        'placeholder' => 'Section Title 4',
                        'id'          => 'section_4',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																
																</div>
                                                            </div>														
		
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Section Title 5 :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	
                  <?php 
                    $data = array(
                        'name'        => 'section[]',
                        'placeholder' => 'Section Title 5',
                        'id'          => 'section_5',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																
																</div>
                                                            </div>
		
		
            <div id="add_more_field-6"></div>
		
            <div class="row form-group">
				<div class="col col-md-3">
                <label for="section_5" class="form-control-label"></label>
					</div>
                <div class="col-12 col-md-8">
                    <button type="button" class="btn btn-outline-info" id="add_btn" onclick="add_field()"><icon class="icon-plus"></icon> Add More</button>
                </div>
            </div>
		
		<hr/>

		
		<div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </div>
            </form>		
		

                                                </div></div></div>



<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>