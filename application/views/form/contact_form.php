<?php 
if ($message) {
    echo $message;
}
?>
                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>Contact</strong> admin
                                                    </div>
                                                    <div class="card-body card-block">
														

    <?=form_open(base_url('index.php/message_control/contact'), 'role="form" class="form-horizontal"'); ?>
														
														
        <div class="row">
            <div class="col-xs-offset-1 col-xs-10">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                <?=form_hidden('name', $this->session->userdata('user_name')); ?>
                <?=form_hidden('email', $this->session->userdata('user_email')); ?>
                <?=form_hidden('token', time()); ?>
            </div>
        </div>														
														
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"> 
																<label class=" form-control-label">From :</label></div>
                                                                <div class="col-12 col-md-7">
																	
<?=form_input('name', $this->session->userdata('user_name').' < '.$this->session->userdata('user_email').' >', 'placeholder="Subject" class="form-control" required="required" disabled') ?>
																	
                                                                </div>
                                                            </div>
														
                                                           <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="email-input" class=" form-control-label">Subject :</label>
															   </div>
                                                                <div class="col-12 col-md-7">
																	 <?=form_input('subject', '', 'placeholder="Subject" class="form-control" required="required"'); ?>
															   </div>
                                                            </div>														
														
                                                          <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Message :</label>
															  </div>
                                                                <div class="col-12 col-md-7">
																	                  <?php 
                    $data = array(
                        'name'        => 'message',
                        'placeholder' => 'Your Message',
                        'value'       => '',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?=form_textarea($data) ?>
															  </div>
                                                            </div>		
														
														
				<div class="row">
                <div class="col-md-6 offset-md-3">
                    <button type="submit" class="btn btn-outline-info">Send</button>
                    <span class="col-sm-1">&nbsp;</span>
                    <a href="<?=base_url('index.php/message_control');?>" class="btn btn-outline-link">Cancel</a>
                </div>
            </div>
														
														
														
														
														
													
            <?=form_close() ?>
                                                    </div>
                                                    
                                                </div>
												</div>



<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>