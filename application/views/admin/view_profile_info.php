<?php //echo "<pre>"; print_r($profile_info); exit(); ?>
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
<!-- X-Editable Scripts-->
<?php
   $this->load->view('plugin_scripts/x-editable_scripts');
?>



<div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Profile Info </h4>
                            </div>
                            <div class="card-body">
                                <ul class="nav nav-tabs" id="myTab" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link active" id="home-tab" data-toggle="tab" href="#home" role="tab" aria-controls="home" aria-selected="true">Personal info</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="profile-tab" data-toggle="tab" href="#profile" role="tab" aria-controls="profile" aria-selected="false">Change Password</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" id="contact-tab" data-toggle="tab" href="#contact" role="tab" aria-controls="contact" aria-selected="false">subscription </a>
                                    </li>
                                </ul>
                                <div class="tab-content pl-3 p-1" id="myTabContent">
                                    <div class="tab-pane fade show active" id="home" role="tabpanel" aria-labelledby="home-tab">
								                          <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Name :</label>
															  </div>
                                                                <div class="col-12 col-md-8">
																	 <a href="#" data-name="user_name" data-type="text" data-url="<?php echo base_url('index.php/admin_control/update_profile_info'); ?>" data-pk="<?= $profile_info->user_id ?>" class="data-modify-support no-style"><?= $profile_info->user_name ?></a>
															  </div>
                                                            </div>

								                          <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Phone :</label>
															  </div>
                                                                <div class="col-12 col-md-8">
																	 <a href="#" data-name="phone" data-type="text" data-url="<?php echo base_url('index.php/admin_control/update_profile_info'); ?>" data-pk="<?= $profile_info->user_id ?>" class="data-modify-support no-style"><?= $profile_info->user_phone ?></a>
															  </div>
                                                            </div>

								                          <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Email :</label>
															  </div>
                                                                <div class="col-12 col-md-8">
																	 <a href="#" data-name="email" data-type="text" data-url="<?php echo base_url('index.php/admin_control/update_profile_info'); ?>" data-pk="<?= $profile_info->user_id ?>" class="data-modify-support no-style"><?= $profile_info->user_email ?></a>
															  </div>
                                                            </div>

								                          <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Role :</label>
															  </div>
                                                                <div class="col-12 col-md-8">
																	 <p class="form-control-static"><?= $profile_info->user_role_name ?></p>
															  </div>
                                                            </div>
                       
                                                            <hr/>
                                                            <div class="col-12" align="center">
                                                                <a class="btn btn-primary modify" name="modify-support" href = "#"><i class="fa ti-pencil"></i> Modify</a>
                                                            </div>
								
                                    </div>
                                    <div class="tab-pane fade" id="profile" role="tabpanel" aria-labelledby="profile-tab">
                                              <?= form_open(base_url('index.php/admin_control/change_password'), 'role="form" class="form-horizontal"'); ?>

								                          <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Current Password :</label>
															  </div>
                                                                <div class="col-12 col-md-8">
																	 <?= form_password('old-pass', '', 'placeholder="Old Password" class="form-control" required="required"') ?>
															  </div>
                                                            </div>

								                          <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">New Password :</label>
															  </div>
                                                                <div class="col-12 col-md-8">
																	 <?= form_password('new-pass', '', 'placeholder="New Password" class="form-control" required="required"') ?>
															  </div>
                                                            </div>

								                          <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Re-type New Password :</label>
															  </div>
                                                                <div class="col-12 col-md-8">
																	 <?= form_password('re-new-pass', '', 'placeholder="Re-type New Password" class="form-control" required="required"') ?>
															  </div>
                                                            </div>

                                                            <hr/>
                                                            <div class="col-12">
                                                                    <button type="submit" class="btn btn-primary">Change Password</button>
                                                            <?= form_close() ?>
                                                            </div>
                                    </div>
                                    <div class="tab-pane fade" id="contact" role="tabpanel" aria-labelledby="contact-tab" align="center">
                                        <?php if ($profile_info->subscription_id) { ?>
                                            <?php $package = $this->db->get_where('price_table', array('price_table_id' => $profile_info->subscription_id))->row()->price_table_title; ?>
                                            <p>You are subscribed in "<?=$package; ?>" package.</p>
                                                <p>Subscription will expire on <?=date('F d, Y',$profile_info->subscription_end)?></p>                            
                                        <?php }else{ ?>
                                            <p >Currently you have not subscribed in package. </p>
                                            <a href="<?=base_url('index.php/guest/pricing') ?>" class="btn btn-info"> Subscribe Now</a>
                                        <?php } ?>
                                    </div>
                                </div>


                            </div>
                        </div>
                    </div>

</div>



