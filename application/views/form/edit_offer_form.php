<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Modify <strong>Offers</strong>
                                                    </div>
                                                    <div class="card-body card-block">
              <?php echo form_open(base_url() . 'index.php/membership/update', 'role="form" class="form-horizontal"'); ?>
                <input type="hidden" name="membership_id" value="<?=$offer->price_table_id;?>">

                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Membership Type :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?php echo form_input('membership_type', $offer->price_table_title, 'id="title" class="form-control" required="required"') ?></div>
                                                            </div>
														
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Validity Period :</label>
																</div>
                                                                <div class="col-12 col-md-4">
																	<?php echo form_input('validity_period', $offer->offer_duration, 'placeholder="Validity period" id="validity_period" class="form-control" required="required"') ?>
																</div>
                                                                <div class="col-12 col-md-4">
                      <?php
                      $option = array(
                        'months' => 'Month',
                        'years' => 'Year',
                        'days' => 'Day');
                      ?>
                      <?php echo form_dropdown('validity_type', $option, $offer->offer_type,'class="form-control"') ?>
																</div>																
                                                            </div>		
														
                                <div class="form-group">
									<div class="col col-md-3">
                                    <label class=" form-control-label">Price :</label>
										</div>
									<div class="col-12 col-md-8">
                                    <div class="input-group">
                                        <div class="input-group-addon"><?=$currency_symbol?></div>
                                        <?php echo form_input('price', $offer->price_table_cost, 'id="price" class="form-control"') ?>
                                    </div>
										</div>
                                </div>	
														
                <?php $i = 0; foreach ($features as $value) { $i++; ?>
                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Feature <?=$i ?> :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                      <?php 
                        $data = array(
                            'name'        => 'feature['.$value->feature_id.']',
                            'id'          => 'feature_1',
                            'value'       => $value->feature_item,
                            'rows'        => '2',
                            'class'       => 'form-control textarea-wysihtml5'
                        ); ?>
                        <?php echo form_textarea($data) ?>																	
																</div>
                                                            </div>
														<?php } ?>
														
		

		
		<div class="col-12" align="center">
			<hr/>
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </div>
		
            <?php echo form_close() ?>	
		

                                                </div></div></div>


<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>
    
