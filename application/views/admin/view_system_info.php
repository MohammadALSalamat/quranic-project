<?php     //echo "<pre/>"; print_r($sys_set); exit();
$str = '[';
foreach ($currencies as $value) {
    $str .= "{value:" . $value->currency_id . ",text:'" . $value->currency_name . " (" . $value->currency_symbol . ")'},";
}
$str = substr($str, 0, -1);
$str .= "]";
?>
    <?=validation_errors('<div class="col-12 alert alert-danger">', '</div>'); ?>
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
                                <h4>System Info </h4>
                            </div>
                            <div class="card-body">
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-Basic-tab" data-toggle="tab" href="#nav-Basic" role="tab" aria-controls="nav-Basic" aria-selected="true">Basic Info</a>
                                            <a class="nav-item nav-link" id="nav-Content-tab" data-toggle="tab" href="#nav-Content" role="tab" aria-controls="nav-Content" aria-selected="false">Content</a>
                                            <a class="nav-item nav-link" id="nav-Social-tab" data-toggle="tab" href="#nav-Social" role="tab" aria-controls="nav-Social" aria-selected="false">Social Profiles</a>
                                            <a class="nav-item nav-link" id="nav-PayPal-tab" data-toggle="tab" href="#nav-PayPal" role="tab" aria-controls="nav-PayPal" aria-selected="false">PayPal Settings</a>
										</div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
										
										
                                        <div class="tab-pane fade show active" id="nav-Basic" role="tabpanel" aria-labelledby="nav-Basic-tab">
                                            
                        <?=form_open_multipart(base_url('index.php/admin/system_control/view_settings'), 'role="form" class="form-horizontal"'); ?>

                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Brand Name :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('brand_name', $sys_set->brand_name, 'placeholder="Brand Name" class="form-control" required="required"') ?>
																</div>
                                                            </div>
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Brand Tagline :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('brand_tagline', $sys_set->brand_tagline, 'placeholder="Brand Tagline" class="form-control"') ?>
																</div>
                                                            </div>											
											
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Address :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('address', $sys_set->address, 'placeholder="Address" class="form-control"') ?>
																</div>
                                                            </div>
									
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Timezone :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<select name="local_time_zone" class="form-control" required="required">
																	<option value=''>Select Timezone</option>
																	<?php  foreach ($time_zone as $value) { ?>
																	<option value="<?=$value->timezone_name?>" <?=($sys_set->local_time_zone == $value->timezone_name)?'selected':''?>>
																		<?=$value->timezone_name?>
																		</option>
																	<?php } ?>
																	</select>
																	
																</div>
                                                            </div>		
											
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Support Email :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('support_email', $sys_set->support_email, 'placeholder="Support Email" class="form-control"') ?>
																</div>
                                                            </div>	
											
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Support Phone :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('support_phone', $sys_set->support_phone, 'placeholder="Support Phone" class="form-control"') ?>
																</div>
                                                            </div>
											
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Bussiness Type :</label>
																</div>
                                                                <div class="col-12 col-md-8">
							    <select name="bussiness_type" class="form-control" required="required">
                                    <option value="1" <?=($sys_set->commercial == 1)?'selected':''?> >Commercial</option>
                                    <option value="0" <?=($sys_set->commercial == 0)?'selected':''?> >Non-commercial</option>
                                </select>
																</div>
                                                            </div>
											
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Student Can Register :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                                <select name="student_can_register" class="form-control" required="required">
                                    <option value="1" <?=($sys_set->student_can_register == 1)?'selected':''?>>Yes</option>
                                    <option value="0" <?=($sys_set->student_can_register == 0)?'selected':''?>>No</option>
                                </select>
																</div>
                                                            </div>
											
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Upload Logo :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_upload('logo', '', 'id="logo" class="form-control"') ?>
																	<small class="form-text text-muted"> Allowed only: jpg | jpeg | png. Standard: 200px X 78px</small>
																</div>
																</div>
																
																 <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Logo :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                                <?php if(file_exists ('logo.png')): ?>
                                    <img src="<?=base_url('logo.png');?>" alt="LOGO" style="max-height: 200px; max-width: 200px; background: #000000" >
                                <?php else: ?>
                                    <img src="http://placehold.it/100?text=LOGO">
                                <?php endif; ?>
																</div>																
                                                            </div>

											
											<br/><br/><br/>
                            <div class="col-12" align="center">
                                <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Save</button>
                            </div>
                        <?=form_close() ?>											
											
                                        </div>
										
										
										
                                        <div class="tab-pane fade" id="nav-Content" role="tabpanel" aria-labelledby="nav-Content-tab">

                        <?=form_open(base_url('index.php/admin/system_control/update_content'), 'role="form" class="form-horizontal"'); ?>
                        <?php $sys_content = $this->db->get('content')->result(); 
                            // echo "<pre/>"; print_r($sys_content); 
                            foreach ($sys_content as $value) { ?>
                                <?php 
                                if ($value->content_type == 'about_us') { ?>

											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">About Us :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('about_title', $value->content_heading, 'placeholder="About Us Title" class="form-control" required="required"') ?>
                                            <br/>
                                            <?php 
                                            $data = array(
                                                'name'        => 'about_content',
                                                'placeholder' => 'About Us Content',
                                                'value'       => $value->content_data,
                                                'rows'        => '10',
                                                'class'       => 'form-control textarea-wysihtml5',
                                                'required' => 'required',
                                            ); ?>
                                            <?=form_textarea($data) ?>
																</div>
                                                            </div>
											
											
											
											
                                <?php }
                                if ($value->content_type == 'price_table_msg') { ?>

											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Price Table Message :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('price_tbl_title', $value->content_heading, 'placeholder="Ptice Table Title" class="form-control" required="required"') ?>
                                            <br/>
                                            <?php 
                                            $data = array(
                                                'name'        => 'price_tbl_content',
                                                'placeholder' => 'Price Table Message',
                                                'value'       => $value->content_data,
                                                'rows'        => '5',
                                                'class'       => 'form-control textarea-wysihtml5',
                                                'required' => 'required',
                                            ); ?>
                                            <?=form_textarea($data) ?>
																</div>
                                                            </div>

                                <?php }
                                if ($value->content_type == 'slider_text') { ?>

											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Slider Text :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('slider_text_title[]', $value->content_heading, 'placeholder="Slider Text Heading" class="form-control" required="required"') ?>
                                            <br/>
                                            <?php 
                                            $data = array(
                                                'name'        => 'slider_text[]',
                                                'placeholder' => 'Slider Text',
                                                'value'       => $value->content_data,
                                                'rows'        => '2',
                                                'class'       => 'form-control textarea-wysihtml5'
                                            ); ?>
                                            <?=form_textarea($data) ?>
																</div>
                                                            </div>
											<?php }
                                if ($value->content_type == 'slider_text2') { ?>

											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Slider Text2 :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('slider_text2_title[]', $value->content_heading, 'placeholder="Slider Text 2 Heading" class="form-control" required="required"') ?>
                                            <br/>
                                            <?php 
                                            $data = array(
                                                'name'        => 'slider_text2[]',
                                                'placeholder' => 'Slider Text2',
                                                'value'       => $value->content_data,
                                                'rows'        => '2',
                                                'class'       => 'form-control textarea-wysihtml5'
                                            ); ?>
                                            <?=form_textarea($data) ?>
																</div>
                                                            </div>
											<?php }
                                if ($value->content_type == 'slider_text3') { ?>

											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Slider Text3 :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?=form_input('slider_text3_title[]', $value->content_heading, 'placeholder="Slider Text Heading" class="form-control" required="required"') ?>
                                            <br/>
                                            <?php 
                                            $data = array(
                                                'name'        => 'slider_text3[]',
                                                'placeholder' => 'Slider Text3',
                                                'value'       => $value->content_data,
                                                'rows'        => '2',
                                                'class'       => 'form-control textarea-wysihtml5'
                                            ); ?>
                                            <?=form_textarea($data) ?>
																</div>
                                                            </div>																				
											
											
	
                                <?php }
                            } ?><br/><br/><br/>
                        <div class="row">
                            <div class="col-xs-offset-1 col-xs-11 col-sm-offset-2 col-md-8">
                                <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Save</button>
                            </div>
                        </div>
                        <?=form_close() ?>											
											
                                        </div>
                                        <div class="tab-pane fade" id="nav-Social" role="tabpanel" aria-labelledby="nav-Social-tab">
											
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">YouTube :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                                <a href="#" data-name="youtube" data-type="textarea" data-rows="2" data-url="<?=base_url('index.php/admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->you_tube_url ?></a>
                                        <a href="<?= $sys_set->you_tube_url ?>" target="_blank" class="btn btn-outline-info btn-xs vitis-url float-right"><i class="fa ti-youtube"></i> Visit the link </a>
																</div>
                                                            </div>
											
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Facebook :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                                <a href="#" data-name="facebook" data-type="textarea" data-rows="2" data-url="<?=base_url('index.php/admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->facbook_url ?></a>
                                        <a href="<?= $sys_set->facbook_url ?>" target="_blank" class="btn btn-outline-info btn-xs vitis-url float-right"><i class="fa fa-facebook"></i> Visit the link </a>
																</div>
                                                            </div>

											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Google+ :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                                <a href="#" data-name="googleplus" data-type="textarea" data-rows="2" data-url="<?=base_url('index.php/admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->googleplus_url ?></a>
                                        <a href="<?= $sys_set->googleplus_url ?>" target="_blank" class="btn btn-outline-info btn-xs vitis-url float-right"><i class="fa fa-google-plus"></i> Visit the link </a>
																</div>
                                                            </div>
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Twitter :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                                <a href="#" data-name="twitter" data-type="textarea" data-rows="2" data-url="<?=base_url('index.php/admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->twitter_url ?></a>
                                        <a href="<?= $sys_set->twitter_url ?>" target="_blank" class="btn btn-outline-info btn-xs vitis-url float-right"><i class="fa ti-twitter"></i> Visit the link </a>
																</div>
                                                            </div>
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Linkedin :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                                <a href="#" data-name="linkedin" data-type="textarea" data-rows="2" data-url="<?=base_url('index.php/admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->linkedin_url ?></a>
                                        <a href="<?= $sys_set->linkedin_url ?>" target="_blank" class="btn btn-outline-info btn-xs vitis-url float-right"><i class="fa ti-linkedin"></i> Visit the link </a>
																</div>
                                                            </div>
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Pinterest :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                               <a href="#" data-name="pinterest" data-type="textarea" data-rows="2" data-url="<?=base_url('index.php/admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->pinterest_url ?></a>
                                        <a href="<?= $sys_set->pinterest_url ?>" target="_blank" class="btn btn-outline-info btn-xs vitis-url float-right"><i class="fa ti-pinterest"></i> Visit the link </a>
																</div>
                                                            </div>
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Flickr :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                               <a href="#" data-name="flickr" data-type="textarea" data-rows="2" data-url="<?=base_url('index.php/admin/system_control/update_system_info'); ?>" data-pk="<?= $sys_set->brand_id ?>" class="data-modify-social no-style"><?= $sys_set->flickr_url ?></a>
                                        <a href="<?= $sys_set->flickr_url ?>" target="_blank" class="btn btn-outline-info btn-xs vitis-url float-right"><i class="fa ti-flickr"></i> Visit the link </a>
																</div>
                                                            </div>
											

                        <hr/>
                        <?php if ($this->session->userdata['user_role_id'] == 1) { ?>
                            <div class="col-12" align="center">
                                <a class="btn btn-info modify" id="rev-link" name="modify-social" href = "#"><i class="fa ti-pencil"></i> Modify</a>
                            </div>
                        <?php } ?>											
                                        </div>
										
                                        <div class="tab-pane fade" id="nav-PayPal" role="tabpanel" aria-labelledby="nav-PayPal-tab">

											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">PayPal Status :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                               <a href="#" data-name="pp_sandbox" data-type="select" data-source="[{value:0,text:'Live'},{value:1,text:'Sandbox'}]" data-value="<?= (@$payment_set->sandbox) ? '1' : '0'; ?>" data-url="<?=base_url('index.php/admin/system_control/update_paypal_info'); ?>" data-pk="<?=($payment_set->id) ? $payment_set->id : 1; ?>" class="data-modify-pp no-style"><?= (@$payment_set->sandbox) ? 'Sandbox' : 'Live'; ?></a>
																</div>
                                                            </div>
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Currency :</label>
																	<small><em>( USD, EUR, etc. )</em></small>
																</div>
                                                                <div class="col-12 col-md-8">
                               <a href="#" data-name="pp_currency" data-type="select" data-url="<?=base_url('index.php/admin/system_control/update_paypal_info'); ?>" data-pk="<?=($payment_set->id) ? $payment_set->id : 1; ?>" data-source="<?= $str; ?>" data-value="<?= @$payment_set->currency_id; ?>" class="data-modify-pp no-style"><?= @$payment_set->currency_name . ' (' . @$payment_set->currency_symbol . ')' ?></a>
																</div>
                                                            </div>
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">PayPal API Username :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                               <a href="#" data-name="pp_user" data-type="textarea" data-rows="2"  data-url="<?=base_url('index.php/admin/system_control/update_paypal_info'); ?>" data-pk="<?=($payment_set->id) ? $payment_set->id : 1; ?>" class="data-modify-pp no-style"><?= @$payment_set->api_username ?></a>
																</div>
                                                            </div>
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">PayPal API Password :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                               <a href="#" data-name="pp_pass" data-type="text" data-url="<?=base_url('index.php/admin/system_control/update_paypal_info'); ?>" data-pk="<?=($payment_set->id) ? $payment_set->id : 1; ?>" class="data-modify-pp no-style"><?= @$payment_set->api_pass ?></a>
																</div>
                                                            </div>
											
                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Paypal API Signature :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                               <a href="#" data-name="pp_sign" data-type="textarea" data-rows="3"  data-url="<?=base_url('index.php/admin/system_control/update_paypal_info'); ?>" data-pk="<?=($payment_set->id) ? $payment_set->id : 1; ?>" class="data-modify-pp no-style"><?= @$payment_set->api_signature ?></a>
																</div>
                                                            </div>

                        <hr/>
                        <?php if ($this->session->userdata['user_role_id'] == 1) { ?>
                            <div class="col-12" align="center">
                                <a class="btn btn-info modify" name="modify-pp" href = "#"><i class="fa ti-pencil"></i> Modify</a>
                            </div>
                        <?php } ?> 											
                                        </div>
									
									</div>

                                </div>
                            </div>
                        </div>
                    </div>
					</div>

											

<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>
