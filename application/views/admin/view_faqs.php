<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>



                <div class="row">
					<div class="col-lg-12">
                        <div class="card">
							<div class="card-header">
								<div class="float-left"><strong>FAQs</strong></div>
                              <div class="float-right">
								<?php if ($this->session->userdata['user_role_id'] < 4) { ?>
                    <a class="btn btn-outline-info" href="#addGrp" data-toggle="modal"><i class="fa fa-plus-square-o"></i>&nbsp; New Group </a>
                    <a class="btn btn-outline-info" href="<?=base_url('index.php/faq_control/faq_form'); ?>"><i class="fa fa-plus-square-o"></i>&nbsp; New FAQ </a>
                <?php } ?>
								</div>
                                </div>

						
							<div class="row">
                    <div class="col-xs-6 col-sm-6" style="top: 25px;">
                          <?php 
                $faq_grps = $this->db->get('faq_grp')->result(); 
                    if (isset($faqs) != NULL) { 
                        foreach ($faq_grps as $faq_grp) { $i = 1;
														 ?>							
                        <div class="card">
                            <div class="card-header" align="center">
								<? echo "<strong>".$faq_grp->faq_grp_name."</strong>"; ?>
                            </div>
							
                            <div class="card-body card-block">
								
								<table class="table table-striped">
                                <thead>
                                    <tr>
                                        <th>Question</th>
                                        <th class="col-sm-1 mobile">Update</th>
                                        <th class="col-sm-3 text-center">Action</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $i = 1;
                                    foreach ($faqs as $faq) { 
                                        if($faq_grp->faq_grp_id == $faq->faq_grp_id){ ?>
                                            <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                                <td>
                                                    <a href="#" data-name="faq_title" data-type="text" data-url="<?=base_url('index.php/faq_control/update_faq'); ?>" data-pk="<?= $faq->faq_id; ?>" class="data-modify-<?= $faq->faq_id; ?> no-style"><?= $faq->faq_ques; ?></a>
                                                    <div class="collapse" id="collapse_<?= $faq->faq_id; ?>">
                                                        <p class=""><br/><span class="text-muted">Answer: </span> 
                                                            <?= $faq->faq_ans; ?>
                                                        </p>
                                                    </div>
                                                </td>
                                                <td class="col-xs-1 mobile"><?= $faq->faq_last_update; ?></td>
                                                <td class="col-xs-3 text-center">
                                                    <div class="btn-group">
                                                        <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
                                                            <a href="#collapse_<?= $faq->faq_id; ?>"  data-toggle="collapse" class="btn btn-outline-info btn-xs"><i class="fa fa-arrows-alt"></i><span class="invisible-on-sm"> View</span></a>
                                                            <a class="btn btn-outline-info btn-xs" href = "<?=base_url('index.php/faq_control/update_faq/'.$faq->faq_id); ?>"><i class="fa ti-pencil"></i><span class="invisible-on-md">  Modify</span></a>
                                                            <a onclick="return delete_confirmation()" href = "<?=base_url('index.php/faq_control/delete_faq/' . $faq->faq_id); ?>" class="btn btn-outline-info btn-xs"><i class="fa fa-trash"></i><span class="invisible-on-md">  Delete</span></a>
                                                        <?php } ?>
                                                    </div>
                                                </td>
                                            </tr>
                                        <?php $i++;
                                        }
                                    }
                                    ?>
                                </tbody>
                            </table>
                            </div>
                        </div>
<?php
                    }
                } else {
                    echo 'No FAQ!';
                }
                ?>							
                    </div>	
							
                    <div class="col-xs-6 col-sm-6" style="top: 25px;" align="center">
                        <div class="card">
                            <div class="card-header">
                                <strong class="card-title">Groups</strong>
                            </div>
                            <div class="card-body">
                  <table class="table table-striped">
					  
                    <thead>
                        <tr>
                            <th>Group Name</th>
                            <th class="col-sm-3 text-center">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $i = 1;
                        foreach ($faq_grps as $faq_grp) { ?>
                            <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                <td><?= $faq_grp->faq_grp_name; ?></td>
                                <td class="col-xs-3 text-center">
                                    <div class="btn-group">
                                        <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
                                            <a class="btn btn-outline-info btn-xs" href = "<?=base_url('index.php/faq_control/update_faq_grp/'.$faq_grp->faq_grp_id); ?>"><i class="fa ti-pencil"></i><span class="invisible-on-md">  Modify</span></a>
                                            <a onclick="return delete_confirmation()" href = "<?=base_url('index.php/faq_control/delete_faq_grp/' . $faq_grp->faq_grp_id); ?>" class="btn btn-outline-info btn-xs"><i class="fa fa-trash"></i><span class="invisible-on-md">  Delete</span></a>
                                        <?php } ?>
                                    </div>
                                </td>
                            </tr>
                        <?php $i++;
                        }
                        ?>
                    </tbody>
                </table>					  
								
                            </div>
                        </div>							
							
					 </div></div>
						</div>
					</div></div>




<!-- Question Update Modal -->
<div class="modal fade" id="addGrp" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="TRUE"> 
	                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Create New Group</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
								
								
        <?=form_open(base_url('index.php/faq_control/add_grp'),'role="form" class="form-horizontal"'); ?>

                                                              <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Group Name :</label></div>
                                                                <div class="col-12 col-md-8">
																<?=form_input('faq_grp_name', '', 'id="update_video_title" placeholder="Group Name" class="form-control" required="required"') ?>
																  </div>
																  </div>
								
								
                                </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <?php echo form_submit('submit', 'Save', 'class="btn btn-primary"') ?>
                                  <?php echo form_close() ?>
                            </div>
                        </div>
                    </div></div>
	

