<?php //echo "<pre/>"; print_r($courses);print_r($sections);print_r($video); exit(); ?>
<style type="text/css">
    .list-group-item{
        cursor: move;
    }
    .ui-sortable-helper{
        padding: 10px 15px;
        height: 40px !important;
    }
    .ui-sortable-placeholder{
        height: 40px !important;
    }
    ul.inner-sortlist{
        list-style: none;
        padding-left: 0;
    }
    .inner-sortlist li{
        display: inline-block;
    }
</style>

    <?php 
    if ($message) 
        echo $message; 

    if ($this->session->flashdata('message')) {
        echo $this->session->flashdata('message');
    }
    ?>
    <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>


                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <div class="float-left"> Course Title: <strong><?=$courses->course_title; ?></strong></div>
									<?php 
            if ($courses->user_id == $this->session->userdata['user_id']) {
            ?>					<div class="float-right">
                            <a class="btn btn-outline-secondary" href="<?=base_url('index.php/course/add_section/'.$courses->course_id); ?>"><i class="fa fa-plus-square-o"></i>&nbsp; Add Section</a>
                            <a class="btn btn-outline-primary" href="<?=base_url('index.php/course/add_content/'.$courses->course_id); ?>"><i class="fa fa-plus-square-o"></i>&nbsp; Add Content</a></div>
								<?php 
            } ?>
                                                    </div>
                                                    <div class="card-body card-block">


        <ul id="sortlist" class="list-group">
        <?php foreach ($sections as $section) { ?>
        <li id="ID_<?=$section->section_id;?>" class="ui-state-default list-group-item">
            <ul class="inner-sortlist">
                <li style="width: 60%;"><a id="section_title-<?=$section->section_id;?>" ><?=$section->section_name.': '.$section->section_title; ?>
                </a></li>
                <li> 
                    <?=$this->db->where('course_id', $courses->course_id)->where('section_id', $section->section_id)->from('course_videos')->count_all_results(); ?> videos
                </li>                                
                <li class="pull-right">
                    <div class="btn-group pull-right">
                        <a href="<?= base_url('index.php/course/section_detail/' . $section->section_id); ?>"  class="btn btn-outline-success "><i class="fa fa-folder-open"></i><span class="invisible-on-sm"> View</span></a>
                        <a class="btn btn-outline-primary update"  data-update="<?=$section->section_id;?>" href="#update_section" data-toggle="modal" data-target="#edit"><i class="fa fa-edit"></i><span class="invisible-on-md">  Modify</span></a>
                        <a onclick="return delete_confirmation()" href = "<?=base_url('index.php/course/delete_section/' . $section->section_id); ?>" class="btn btn-outline-danger"><i class="fa fa-trash"></i><span class="invisible-on-md">  Delete</span></a>
                    </div>
                </li>                                
            </ul>
        </li>
        <?php
        }
        ?>
        </ul>

                                                </div>
												
                                                    <div class="card-footer" align="center">
														<p>
                                                        <i class="fa fa-warning"></i> You can reorder the view by dragging the list.
															</p>
														<button id="button" class="btn btn-outline-info btn-sm">
                                                            <i class="fa fa-dot-circle-o"></i> Update orders
                                                        </button>
                                                    </div>
												
												
												</div></div>
														
														
				


                <div class="modal fade" id="edit" tabindex="-1" role="dialog" aria-labelledby="edit" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="edit">Update Section</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
                                        <?php echo form_open(base_url() . 'index.php/course/update_section','role="form" class="form-horizontal"'); ?>
          <input type="hidden" name="section_id" id="update_section_id" value="">
          <input type="hidden" name="course_id" value="<?=$courses->course_id;?>">
								
                                                             <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Section Name :</label></div>
                                                                <div class="col-12 col-md-9">
																	<?php echo form_input('section_name', '', 'id="update_section_name" placeholder="Section name" class="form-control" required="required"') ?>
																	</div>
                                                            </div>

                                                             <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Section Title :</label></div>
                                                                <div class="col-12 col-md-9">
																	<?php echo form_input('section_title', '', 'id="update_section_title" placeholder="Section title" class="form-control" required="required"') ?>
																	</div>
                                                            </div>								

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <?php echo form_submit('submit', 'Save', 'class="btn btn-primary"') ?>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>



							






<!-- script for take the old value. -->
<script type="text/javascript">


//--------- SAVE THE ORDER
$('#button').click(function(event){
    //alert('me');
       var order = $("#sortlist").sortable("serialize");
       $('#message').html('Saving changes..');
       $.post("<?=base_url();?>index.php/course/save_order",order,function(theResponse){
         $('#message').html(theResponse);
         });
       event.preventDefault();
});

//------------------------------ COOKIE SESSION SAVES

$('.update').click(function() {
    var id = $(this).attr('data-update'); // Get the id
    var str = $.trim($('#section_title-'+id).html()); //Get the old value and trimed it
    var value = str.split(": ");

    $('#update_section_name').val(value[0]); // Set the old value intu the field
    $('#update_section_title').val(value[1]); // Set the old value intu the field
    $('#update_section_id').val(id); // Set section_id that will be updated
});
</script>


