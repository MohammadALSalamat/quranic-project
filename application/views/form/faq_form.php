<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Add <strong>New FAQs</strong>
                                                    </div>
                                                    <div class="card-body card-block">
    <form action="<?php echo base_url().'index.php/faq_control/add_faq'?>" method="post" id="ajax-form" role="form" class="form-horizontal">  

                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Group :</label>
																</div>
                                                                <div class="col-12 col-md-8">
						<select name="faq_grp_id" class="form-control" required="required">
                        <option value="">Select Group</option>
                        <?php  $faq_grps = $this->db->get('faq_grp')->result(); 
                            foreach ($faq_grps as $faq_grp) { ?>
                                <option value="<?=$faq_grp->faq_grp_id?>"><?=$faq_grp->faq_grp_name?></option>
                        <?php } ?>
                    </select>
																	
																</div>
                                                            </div>		

                                                                <div class="form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Question : </label></div>
                                                                <div class="col-12 col-md-8">
																	<?php echo form_input('faq_q', '', 'placeholder="FAQ Question" class="form-control" required="required"') ?>
																	</div>	
																	 </div>	

                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Answer :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?php 
                    $data = array(
                        'name'        => 'faq_ans',
                        'placeholder' => 'FAQ Answer',
                        'value'       => '',
                        'rows'        => '4',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
																</div>
                                                            </div>		
	
		
		
		
		
		
                <div class="col-12" align="center">
					<hr/>
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                    <button type="submit" name="more" value="1" class="btn btn-outline-info">Save and continue</button>
                </div>
            </form>																	
														</div></div></div>


<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>