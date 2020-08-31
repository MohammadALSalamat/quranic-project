<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       add <strong>feature</strong>
                                                    </div>
                                                    <div class="card-body card-block">
                <?php echo form_open(base_url() . 'index.php/membership/save_features', 'role="form" class="form-horizontal"'); ?>
                  <?php
                  $option = array();
                  $option[0] = 'Select membership';
                  foreach ($memberships as $value) {
                          $option[$value->price_table_id] = $value->price_table_title;
                  }
                  ?>
														
                                                                <div class="form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                                                    <div class="col-12 col-md-8">
                                                                        <?php echo form_dropdown('membership_id', $option,'','class="form-control"') ?>
                                                                    </div>
                                                                </div>	
														
                                                             <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">* Feature 1 :</label>
																 </div>
                                                                <div class="col-12 col-md-8">
																	
                      <?php 
                        $data = array(
                            'name'        => 'feature[]',
                            'placeholder' => 'new feature 1',
                            'id'          => 'feature_1',
                            'value'       => '',
                            'rows'        => '2',
                            'class'       => 'form-control textarea-wysihtml5',
                            'required' => 'required',
                        ); ?>
                        <?php echo form_textarea($data) ?>																 
																 </div>
                                                            </div>		
														
														
                                                             <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Feature 2 :</label>
																 </div>
                                                                <div class="col-12 col-md-8">
																	
                     <?php 
                        $data = array(
                            'name'        => 'feature[]',
                            'placeholder' => 'new feature 2',
                            'id'          => 'feature_2',
                            'value'       => '',
                            'rows'        => '2',
                            'class'       => 'form-control textarea-wysihtml5',
                        ); ?>
                        <?php echo form_textarea($data) ?>																 
																 </div>
                                                            </div>	
														
                                                             <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Feature 3 :</label>
																 </div>
                                                                <div class="col-12 col-md-8">
																	
                     <?php 
                        $data = array(
                            'name'        => 'feature[]',
                            'placeholder' => 'new feature 3',
                            'id'          => 'feature_3',
                            'value'       => '',
                            'rows'        => '2',
                            'class'       => 'form-control textarea-wysihtml5',
                        ); ?>
                        <?php echo form_textarea($data) ?>																 
																 </div>
                                                            </div>														
														
                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">* Required</label>
																</div>
                                                                <div class="col-12 col-md-8">
															* Required fields.
																</div>
                                                            </div>														
														
														
                <div class="col-12" align="center">
					<hr/>
                    <button type="submit" class="btn btn-outline-primary">Save</button>&nbsp;
                    <button type="reset" class="btn btn-outline-secondary">Reset</button>
                </div>
                <?php echo form_close() ?>													
													</div></div></div>


<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>
    
