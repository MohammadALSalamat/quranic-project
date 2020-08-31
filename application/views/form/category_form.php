<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>   
<!-- block -->

                                           <div class="col-lg-12">
                                               <div class="card">
                                                    <div class="card-header">
                                                       Create <strong>Category</strong>
                                                    </div>
                                                    <div class="card-body card-block">
													
<?=form_open(base_url('index.php/admin_control/create_category'), 'role="form" class="form-horizontal"'); ?>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Create Category:</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?php echo form_input('cat_name', '', 'placeholder="Category Name" class="form-control" required="required"') ?>
																</div>
                                                            </div>														
														
                <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-success">Save</button>
            </div>
            <?=form_close() ?>				
            <div class="col-12">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div> 	
												   </div></div></div>

