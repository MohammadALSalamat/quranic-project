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
                                                       Edit <strong>Notice</strong>
                                                    </div>
                                                    <div class="card-body card-block">
    <form action="<?php echo base_url('index.php/noticeboard/update/'.$notice->notice_id)?>" method="post" role="form" class="form-horizontal">  

                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Title :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                    <?php echo form_input('notice_title', $notice->notice_title, 'placeholder="Notice title" id="title" class="form-control" required="required"') ?>
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
                        'value'       =>  $notice->notice_descr,
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
                                                        <input type="text" name="daterange" id="daterange" class="form-control" value="<?php echo $notice->notice_start.' - '.$notice->notice_end;?>" />
																		</div>
																</div>
                                                            </div>		

                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="status" class=" form-control-label">Status :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<select name="notice_status" id="status" class="form-control">
                    <option value="1" <?php if($notice->notice_status) echo 'selected'; ?> >Active</option>
                    <option value="0" <?php if(!$notice->notice_status) echo 'selected'; ?> >Inactive</option>
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
