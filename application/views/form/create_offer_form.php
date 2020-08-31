<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>


                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       New <strong>Offers</strong>
                                                    </div>
                                                    <div class="card-body card-block">
                <?php echo form_open(base_url() . 'index.php/membership/save', 'role="form" class="form-horizontal"'); ?>

                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">* Membership Type :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?php echo form_input('membership_type', set_value('membership_type'), 'placeholder="Membership title" id="membership_type" class="form-control" required="required"') ?>
																</div>
                                                            </div>	
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">* Validity Period :</label>
																</div>
                                                                <div class="col-12 col-md-4">
																	<?php echo form_input('validity_period', set_value('validity_period'), 'placeholder="Validity period" id="validity_period" class="form-control" required="required"') ?>
																</div>
                                                                <div class="col-12 col-md-4">
                      <?php
                      $option = array(
                        'months' => 'Month',
                        'years' => 'Year',
                        'days' => 'Day');
                      ?>
                      <?php echo form_dropdown('validity_type', $option, '','class="form-control"') ?>
																</div>																
                                                            </div>															
														
														
                                <div class="form-group">
									<div class="col col-md-3">
                                    <label class=" form-control-label">* Price :</label>
										</div>
									<div class="col-12 col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon"><?=$currency_symbol?></div>
                                         <?php echo form_input('price', '', 'id="price" placeholder="Price" class="form-control" required="required"') ?>
                                    </div>
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
                            'placeholder' => 'feature 1',
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
																	<label for="textarea-input" class=" form-control-label">* Feature 2 :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	
                      <?php 
                        $data = array(
                            'name'        => 'feature[]',
                            'placeholder' => 'feature 2',
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
																	<label for="textarea-input" class=" form-control-label">* Feature 3 :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	
                      <?php 
                        $data = array(
                            'name'        => 'feature[]',
                            'placeholder' => 'feature 3',
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
    
