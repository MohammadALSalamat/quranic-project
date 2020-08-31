<?php include 'application/views/plugin_scripts/datepicker.php';?>
<?php date_default_timezone_set($this->session->userdata['time_zone']); ?>

<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>


                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Add <strong>Notice</strong>
                                                    </div>
                                                    <div class="card-body card-block">
    <form action="<?php echo base_url().'index.php/noticeboard/save'?>" method="post" id="ajax-form" role="form" class="form-horizontal">  

                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Title :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                    <?php echo form_input('notice_title', set_value('notice_title'), 'placeholder="Notice title" id="title" class="form-control" required="required"') ?>
																</div>
                                                            </div>		

                                                                <div class="form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Description : </label></div>
                                                                <div class="col-12 col-md-8">
                  <?php 
                    $data = array(
                        'name'        => 'notice_descr',
                        'placeholder' => 'Description',
                        'id'          => 'Description',
                        'value'       => '',
                        'rows'        => '4',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>																	
																	</div>	</div>	

                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Date Range :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<div class="input-group">
														<div class="input-group-addon"><i class="fa fa-calendar"></i></div>
                                                        <input type="text" name="daterange" id="daterange" class="form-control"/>
																		</div>
																</div>
                                                            </div>		

                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Status :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                    <select name="notice_status" id="status" class="form-control">
                    <option value="1">Active</option>
                    <option value="0">Inactive</option>
                </select>
																</div>
                                                            </div>		
		
		
		
		
		
                <div class="col-12" align="center">
					<hr/>
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </div>
            </form>																	
														</div></div></div>


<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>

<script type="text/javascript" charset="utf-8">
    $(document).ready(function() {
        $('#daterange').daterangepicker({
            timePicker: false, 
            timePickerIncrement: 30, 
            format: 'YYYY-MM-DD' 
        });
    });
</script>
