<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>   


                                           <div class="col-lg-12">
                                               <div class="card">
                                                    <div class="card-header">
                                                       Create <strong>Sub-category </strong>
                                                    </div>
                                                    <div class="card-body card-block">
													
<?=form_open(base_url('index.php/admin_control/create_subcategory'), 'role="form" class="form-horizontal"'); ?>
														
<?php
            $option = array();
            $option[''] = 'Select Category';
            foreach ($categories as $category) {
                if ($category->active) {
                    $option[$category->category_id] = $category->category_name;
                }
            }
            ?>														
                     
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select</label></div>
                                                                    <div class="col-12 col-md-8">
                                                                        <?php echo form_dropdown('category', $option, '', 'id="category" class="form-control"') ?>
                                                                    </div>
                                                                </div>														
														
														<div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Create Sub-category:</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?php echo form_input('sub_cat_name', '', 'id="sub_cat_name" placeholder="Sub-category Name" class="form-control" required="required"') ?>
																</div>
                                                            </div>														
												<hr/>		
                <div class="col-12" align="center">
                    <button type="submit" class="btn btn-outline-success">Save</button>
            </div>
            <?=form_close() ?>				
            <div class="col-12">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div> 	
												   </div></div></div>


