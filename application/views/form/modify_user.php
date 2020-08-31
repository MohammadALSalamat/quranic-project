<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
</div>


                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong> Modify</strong> user
                                                    </div>
                                                    <div class="card-body card-block">

          <?=form_open(base_url('index.php/user_control/modify_user/'.$data_id), 'role="form" class="form-horizontal"'); ?>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">* User Name :</label></div>
                                                                <div class="col-12 col-md-9">
                  <?php echo form_input('user_name', $user->user_name, 'placeholder="User Name" class="form-control" required="required"') ?>
																</div>
                                                            </div>
														
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">* Email:</label></div>
                                                                <div class="col-12 col-md-9">
                  <?php echo form_input('user_email', $user->user_email, 'pattern="^[a-zA-Z0-9.!#$%&'."'".'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="Email address" class="form-control" required="required"') ?>
																</div>
                                                            </div>
														
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Phone :</label></div>
                                                                <div class="col-12 col-md-9">
                  <?php echo form_input('user_phone', $user->user_phone, 'pattern="^(\(?\+?[0-9]*\)?)?[0-9_\- \(\)]*$" title="Enter Valid Phone Number" min="8" max="15" placeholder="Phone Number" class="form-control"') ?>
																</div>
                                                            </div>
														
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">* Role :</label></div>
                                                                <div class="col-12 col-md-9">
																	
																	<select name="user_role" class="form-control">
                    <?php foreach ($user_role as $value) {
                        if ($value->user_role_id > $this->session->userdata('user_role_id')) { ?>
                        <option value="<?=$value->user_role_id;?>" <?=($user->user_role_id == $value->user_role_id)?'selected':'';?> ><?=$value->user_role_name;?></option>
                    <?php } } ?>
                </select>

																</div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3"><label for="text-input" class=" form-control-label">Required :</label></div>
                                                                <div class="col-12 col-md-9">
																		<p class="text-muted">* Required fields.</p>

																</div>
                                                            </div>	
																
																
            <div class="col-12" align="center">
                <button type="submit" class="btn btn-primary">Save</button>&nbsp;
                <button type="reset" class="btn btn-outline-primary">Reset</button>
            </div>
          <?php echo form_close() ?>
														
                                                </div></div></div>

