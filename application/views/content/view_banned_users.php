<?=validation_errors('<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">', '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span></button> </div>'); ?>
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>





                <div class="row">
                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>User List</h4>
                            </div>
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
											
                                            <a class="nav-item nav-link active" id="nav-inactive-tab" data-toggle="tab" href="#nav-inactive" role="tab" aria-controls="nav-inactive" aria-selected="true">Inactive</a>
											
                                            <a class="nav-item nav-link" id="nav-banned-tab" data-toggle="tab" href="#nav-banned" role="tab" aria-controls="nav-banned" aria-selected="false">Banned</a>
											
											
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
										<?php 
                                        if (isset($users) != NULL) { 
                                          ?>
										
										
										
                                        <div class="tab-pane fade show active" id="nav-inactive" role="tabpanel" aria-labelledby="nav-inactive-tab">
                                            
                    
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">inactive user</strong>
                            </div>							
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-2">Name</th>
                                            <th class="col-3">Phone Number</th>
                                            <th class="col-3">Email</th>
                                            <th class="col-2">Role</th>
                                            <th class="col-4">Action</th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
                                       <?php
                                    $i = 1;
                                    foreach ($users as $user) {
                                        if (($user->active == 0) && ($user->user_role_id > $this->session->userdata['user_role_id'])) {
                                            ?>
                                            <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                                <td><?= $user->user_name; ?></td>
                                                <td><?= $user->user_phone; ?></td>
                                                <td><?= $user->user_email; ?></td>
                                                <td><?= $user->user_role_name; ?></td>
                                                <td>
                                                    <a onclick="return are_you_sure()" href = "<?php echo base_url('index.php/user_control/activate_user_account/' . $user->user_id); ?>">
														<button type="button" class="btn btn-outline-success d-lg-none"><i class="fa-minus-circle"></i></button><button type="button" class="btn btn-outline-success d-none d-lg-block">Activate</button></a>
														
                                                </td>
                                            </tr>
                                            <?php
                                            $i++;
                                        }
                                    }
                                    ?>								
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>	
                                        </div>

										
										
										
                                        <div class="tab-pane fade" id="nav-banned" role="tabpanel" aria-labelledby="nav-banned-tab">
                                            
                    
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">banned user</strong>
                            </div>							
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th class="col-2">Name</th>
                                            <th class="col-3">Phone Number</th>
                                            <th class="col-3">Email</th>
                                            <th class="col-2">Role</th>
                                            <th class="col-4">Action</th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
								<?php
                                $i = 1;
                                foreach ($users as $user) {
                                    if (($user->banned == 1) && ($user->user_role_id > $this->session->userdata['user_role_id'])) {
                                        ?>
                                            <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                                <td><?= $user->user_name; ?></td>
                                                <td><?= $user->user_phone; ?></td>
                                                <td><?= $user->user_email; ?></td>
                                                <td><?= $user->user_role_name; ?></td>
                                                <td>
                                                    <a onclick="return are_you_sure()" href = "<?php echo base_url('index.php/user_control/unban_user_account/' . $user->user_id); ?>">
														<button type="button" class="btn btn-outline-success d-lg-none"><i class="fa fa-ban"></i></button><button type="button" class="btn btn-outline-success d-none d-lg-block">Unban</button>  
														
													</a>
                                                </td>
                                            </tr>
                                <?php
                                $i++;
                                    }
                                }
                                ?>
										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>	
                                        </div>

										
										
					<?php
                    } else {
                        echo 'You have no mocks!';
                    }
                    ?>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
					</div>



<?php $this->load->view('plugin_scripts/are_you_sure'); ?>
 