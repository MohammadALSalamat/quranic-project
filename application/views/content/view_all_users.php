<?=validation_errors('<div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">', '  <button type="button" class="close" data-dismiss="alert" aria-label="Close">
 <span aria-hidden="true">&times;</span></button> </div>'); ?>
<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>


<?php
$str = '[';
foreach ($user_role as $value) {
    if ($value->user_role_id != 1) {
        $str .= "{value:".$value->user_role_id.",text:'".$value->user_role_name." '},";
    }
}
$str = substr($str, 0, -1);
$str .= "]";
?>

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
											
                                            <a class="nav-item nav-link active" id="nav-all-tab" data-toggle="tab" href="#nav-all" role="tab" aria-controls="nav-all" aria-selected="true">All</a>
											
                                            <a class="nav-item nav-link" id="nav-Student-tab" data-toggle="tab" href="#nav-Student" role="tab" aria-controls="nav-Student" aria-selected="false">Student</a>
											
                                            <a class="nav-item nav-link" id="nav-Teacher-tab" data-toggle="tab" href="#nav-Teacher" role="tab" aria-controls="nav-Teacher" aria-selected="false">Teacher</a>
											
											<?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                                             <a class="nav-item nav-link" id="nav-Moderator-tab" data-toggle="tab" href="#nav-Moderator" role="tab" aria-controls="nav-Moderator" aria-selected="false">Moderator</a>
											<?php }?>
											
											<?php if ($this->session->userdata['user_role_id'] < 2) { ?>
                                             <a class="nav-item nav-link" id="nav-Admin-tab" data-toggle="tab" href="#nav-Admin" role="tab" aria-controls="nav-Admin" aria-selected="false">Admin</a>
											<?php }?>
											
                                        </div>
                                    </nav>
									<?php if (isset($users) != NULL) { ?>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
										
										
                                        <div class="tab-pane fade show active" id="nav-all" role="tabpanel" aria-labelledby="nav-all-tab">
                    
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">ALL USERS</strong>
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
               if (($user->active == 1) && ($user->banned == 0) && ($user->user_role_id > $this->session->userdata['user_role_id'])) {
            ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td>
                        <?=$user->user_name; ?>
                    </td>
                    <td>
                        <?=$user->user_phone; ?>
                    </td>
                    <td>
                        <?=$user->user_email; ?>  
                    </td>
                    <td>
                        <?=$user->user_role_name; ?>
                    </td>
                    <td>
						<div class="btn-group" role="group">
                        <a href = "<?=base_url('index.php/user_control/modify_user/' .$user->user_id);?>"><button type="button" class="btn btn-outline-primary d-lg-none"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-outline-primary d-none d-lg-block">Modify</button></a>
							
                        <a onclick="return ban_confirmation('<?=$user->user_name?>')" href = "<?=base_url('index.php/user_control/ban_user_account/' . $user->user_id); ?>"><button type="button" class="btn btn-outline-danger d-lg-none"><i class="fa fa-ban"></i></button><button type="button" class="btn btn-outline-danger d-none d-lg-block">Ban</button></a>
						
                       <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href = "<?php echo base_url('index.php/user_control/deactivate_user_account/' . $user->user_id); ?>" ><button type="button" class="btn btn-outline-secondary d-lg-none"><i class="fa-minus-circle"></i></button><button type="button" class="btn btn-outline-secondary d-none d-lg-block">Deactivate</button></a>
							</div>
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
                    </div>	                                        </div>
										
										
                                        <div class="tab-pane fade" id="nav-Student" role="tabpanel" aria-labelledby="nav-Student-tab">
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">Students user</strong>
                            </div>							
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
									
                                    <tbody>											
											
            <?php
            $i = 1;
            foreach ($users as $user) {
               if (($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 5)) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td>
                        <?=$user->user_name; ?>
                    </td>
                    <td>
                        <?=$user->user_phone; ?>
                    </td>
                    <td>
                        <?=$user->user_email; ?>
                    </td>
                    <td>
                        <?=$user->user_role_name; ?>
                    </td>
                    <td>
                    <div class="btn-group" role="group">
                        <a href = "<?=base_url('index.php/user_control/modify_user/' .$user->user_id);?>"><button type="button" class="btn btn-outline-primary d-lg-none"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-outline-primary d-none d-lg-block">Modify</button></a>
							
                        <a onclick="return ban_confirmation('<?=$user->user_name?>')" href = "<?=base_url('index.php/user_control/ban_user_account/' . $user->user_id); ?>"><button type="button" class="btn btn-outline-danger d-lg-none"><i class="fa fa-ban"></i></button><button type="button" class="btn btn-outline-danger d-none d-lg-block">Ban</button></a>
						
                       <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href = "<?php echo base_url('index.php/user_control/deactivate_user_account/' . $user->user_id); ?>" ><button type="button" class="btn btn-outline-secondary d-lg-none"><i class="fa-minus-circle"></i></button><button type="button" class="btn btn-outline-secondary d-none d-lg-block">Deactivate</button></a>
							</div>
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
										
										
                                        <div class="tab-pane fade" id="nav-Teacher" role="tabpanel" aria-labelledby="nav-Teacher-tab">
                                            
                    
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">Teachers user</strong>
                            </div>							
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
									
            <?php
            $i = 1;
            foreach ($users as $user) {
               if (($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 4)) { ?>

										
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td>
                        <?=$user->user_name; ?>
                    </td>
                    <td>
                        <?=$user->user_phone; ?>
                    </td>
                    <td>
                        <?=$user->user_email; ?>
                    </td>
                    <td>
                        <?=$user->user_role_name; ?>
                    </td>
                    <td>
                    <div class="btn-group" role="group">
                        <a href = "<?=base_url('index.php/user_control/modify_user/' .$user->user_id);?>"><button type="button" class="btn btn-outline-primary d-lg-none"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-outline-primary d-none d-lg-block">Modify</button></a>
							
                        <a onclick="return ban_confirmation('<?=$user->user_name?>')" href = "<?=base_url('index.php/user_control/ban_user_account/' . $user->user_id); ?>"><button type="button" class="btn btn-outline-danger d-lg-none"><i class="fa fa-ban"></i></button><button type="button" class="btn btn-outline-danger d-none d-lg-block">Ban</button></a>
						
                       <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href = "<?php echo base_url('index.php/user_control/deactivate_user_account/' . $user->user_id); ?>" ><button type="button" class="btn btn-outline-secondary d-lg-none"><i class="fa-minus-circle"></i></button><button type="button" class="btn btn-outline-secondary d-none d-lg-block">Deactivate</button></a>
							</div>
                    </td>
                </tr>
										
										
                <?php $i++;
                }
            }?>										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>	
                                        </div>
										
        <?php
        if ($this->session->userdata['user_role_id'] < 3) {
        ?>										
                     <div class="tab-pane fade" id="nav-Moderator" role="tabpanel" aria-labelledby="nav-Moderator-tab">
											
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">Moderator users</strong>
                            </div>							
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
									
                                    <tbody>											
											
            <?php
            $i = 1;
            foreach ($users as $user) {
               if (($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 3)) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td>
                        <?=$user->user_name; ?>
                    </td>
                    <td>
                        <?=$user->user_phone; ?>
                    </td>
                    <td>
                        <?=$user->user_email; ?>
                    </td>
                    <td>
                        <?=$user->user_role_name; ?>
                    </td>
                    <td>
                    <div class="btn-group" role="group">
                        <a href = "<?=base_url('index.php/user_control/modify_user/' .$user->user_id);?>"><button type="button" class="btn btn-outline-primary d-lg-none"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-outline-primary d-none d-lg-block">Modify</button></a>
							
                        <a onclick="return ban_confirmation('<?=$user->user_name?>')" href = "<?=base_url('index.php/user_control/ban_user_account/' . $user->user_id); ?>"><button type="button" class="btn btn-outline-danger d-lg-none"><i class="fa fa-ban"></i></button><button type="button" class="btn btn-outline-danger d-none d-lg-block">Ban</button></a>
						
                       <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href = "<?php echo base_url('index.php/user_control/deactivate_user_account/' . $user->user_id); ?>" ><button type="button" class="btn btn-outline-secondary d-lg-none"><i class="fa-minus-circle"></i></button><button type="button" class="btn btn-outline-secondary d-none d-lg-block">Deactivate</button></a>
							</div>
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
										<?php } ?>
										
										 <?php if ($this->session->userdata['user_role_id'] < 2) { ?>
                                        <div class="tab-pane fade" id="nav-Admin" role="tabpanel" aria-labelledby="nav-Admin-tab">
											
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">admins user</strong>
                            </div>
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th scope="col">Name</th>
                                            <th scope="col">Phone Number</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Action</th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
            <?php
            $i = 1;
            foreach ($users as $user) {
               if (($user->active == 1) && ($user->banned == 0) && ($user->user_role_id == 2)) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td>
                        <?=$user->user_name; ?>
                    </td>
                    <td>
                        <?=$user->user_phone; ?>
                    </td>
                    <td>
                        <?=$user->user_email; ?>
                    </td>
                    <td>
                        <?=$user->user_role_name; ?>
                    </td>
                    <td>
                    <div class="btn-group" role="group">
                        <a href = "<?=base_url('index.php/user_control/modify_user/' .$user->user_id);?>"><button type="button" class="btn btn-outline-primary d-lg-none"><i class="fa fa-edit"></i></button><button type="button" class="btn btn-outline-primary d-none d-lg-block">Modify</button></a>
							
                        <a onclick="return ban_confirmation('<?=$user->user_name?>')" href = "<?=base_url('index.php/user_control/ban_user_account/' . $user->user_id); ?>"><button type="button" class="btn btn-outline-danger d-lg-none"><i class="fa fa-ban"></i></button><button type="button" class="btn btn-outline-danger d-none d-lg-block">Ban</button></a>
						
                       <a onclick="return deactivate_confirmation('<?=$user->user_name?>')" href = "<?php echo base_url('index.php/user_control/deactivate_user_account/' . $user->user_id); ?>" ><button type="button" class="btn btn-outline-secondary d-lg-none"><i class="fa-minus-circle"></i></button><button type="button" class="btn btn-outline-secondary d-none d-lg-block">Deactivate</button></a>
							</div>
                    </td>
                </tr>
                <?php
                $i++;
                }
            }?>
            </tbody>											
                                </table>
                            </div>
                        </div>
                    </div>												
                                        </div>
										  <?php } ?>
										
										
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





<?php $this->load->view('plugin_scripts/user_ban_confirmation'); ?>
