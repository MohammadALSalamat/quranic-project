<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>
<?php $grp = $this->db->where('faq_grp_id',$faq_grp_id)->get('faq_grp')->row();
?>


                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Update <strong>Group Name</strong>
                                                    </div>
                                                    <div class="card-body card-block">
    <form action="<?php echo base_url().'index.php/faq_control/update_faq_grp/'.$grp->faq_grp_id; ?>" method="post" role="form" class="form-horizontal">  

                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Group Title :</label>
																</div>
                                                                <div class="col-12 col-md-8">
                    <?php echo form_input('faq_grp_name', $grp->faq_grp_name, 'placeholder="FAQ Group Name" class="form-control" required="required"') ?>
																</div>
                                                            </div>		
		
		
		
                <div class="col-12" align="center">
					<hr/>
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </div>
            </form>																	
														</div></div></div>
