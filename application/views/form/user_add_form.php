<?=validation_errors('<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">', '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span></button> </div>'); ?>
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>


                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong>New</strong> user
                                                    </div>
                                                    <div class="card-body card-block">
														<?php echo form_open(base_url() . 'index.php/user_control/add_user', 'role="form" class="form-horizontal"'); ?>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="user_name" class=" form-control-label">User Name: *</label></div>
                                                                <div class="col-12 col-md-9"><?php echo form_input('user_name', '', 'placeholder="User Name" class="form-control" required="required"') ?><span class="help-block">Please enter name and surname</span></div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Email: *</label></div>
                                                                <div class="col-12 col-md-9"><?php echo form_input('user_email', '', 'pattern="^[a-zA-Z0-9.!#$%&'."'".'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="Email address" class="form-control" required="required"') ?><span class="help-block">Please enter user email</span></div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="hf-email" class=" form-control-label">Phone:</label></div>
                                                                <div class="col-12 col-md-9"><?php echo form_input('user_phone', '', 'pattern="^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$" title="Enter Valid Phone Number" min="8" max="15" placeholder="Phone Number" class="form-control"') ?><span class="help-block">Please enter user Phone NO.</span></div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Password: *</label></div>
                                                                <div class="col-12 col-md-9"><?php echo form_password('user_pass', '', 'placeholder="Password" class="form-control" required="required"') ?><span class="help-block">Please enter password  (Minimum 6 character)</span></div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="hf-password" class=" form-control-label">Confirm Pass.: *</label></div>
                                                                <div class="col-12 col-md-9"><?php echo form_password('user_passcf', '', 'placeholder="Confirm Password" class="form-control" required="required"') ?><span class="help-block">Please renter password</span></div>
                                                            </div>
				<?php
                  $option = array();
                  $option[0] = 'User Type';
                  foreach ($user_role as $value) {
                      if ($value->user_role_id > $this->session->userdata('user_role_id')) {
                          $option[$value->user_role_id] = $value->user_role_name;
                      }
                  }
                  ?>
														         <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                                                    <div class="col-6 col-md-3">
                                                                        <?php echo form_dropdown('user_role', $option,'','class="form-control"') ?>
                                                                    </div>
                                                                </div>
														<div class="card-footer" align="center">
                                                        <button type="submit" class="btn btn-primary btn-sm"> Submit</button>
                                                        <button type="reset" class="btn btn-danger btn-sm">Reset</button>
                                                    </div>
														
                                                        <?php echo form_close() ?>
                                                    </div>
                                                    
                                                </div>
												</div>

