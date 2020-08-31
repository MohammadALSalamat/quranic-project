<?php //echo "<pre/>"; print_r($memberships); exit(); ?>
<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

               <div class="row">
                    <div class="col-lg-12">
										
						
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                             <div class="float-left">  Membership  <strong class="card-title">Offers</strong></div>
							 <div class="float-right">
                            <a class="btn btn-outline-secondary" data-toggle="modal" data-target="#settop"><i class="fa fa-plus-square-o"></i>&nbsp; Set top offer</a>
							 </div>
                            </div>							
                            <div class="card-body">
                <?php if (isset($memberships) != NULL) { ?>
								
                <table class="table table-striped">
					
                        <thead>
                            <tr>
                                <th style="width: 40%">Title</th>
                                <th class="text-center">Price (<?=$currency_symbol; ?>)</th>
                                <th class="text-center">Validity Period</th>
                                <th class="text-center">Top Feature</th>
                                <th class="text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($memberships as $membership) {
                                ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                    <td><?=$membership->price_table_title; ?>
                                        <div class="collapse" id="collapse_<?=$membership->price_table_id; ?>"><br/>
                                            <p class="notice-css"><span class="text-muted">Feature list: </span> 
                                            <?php foreach ($features as $feature) { $i == 0;
                                                if ($feature->parent_id == $membership->price_table_id) {
                                                    echo '<br/>'.$i.'. '.$feature->feature_item;
                                                    $i++;
                                                }
                                            } ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td class="text-center"><?=$membership->price_table_cost?></td>
                                    <td class="text-center"><?=$membership->offer_duration.' '.$membership->offer_type;?></td>
                                    <td class="text-center"><?=($membership->price_table_top)?'Yes':''; ?></td>
                                    <td class="text-center">
                                            <a href="#collapse_<?= $membership->price_table_id; ?>"  data-toggle="collapse" class="btn btn-outline-secondary btn-sm"><i class="fa ti-zoom-in"></i><span class="invisible-on-sm"> Quick View</span></a>
                                            <a class="btn btn-outline-secondary btn-sm" href = "<?php echo base_url('index.php/membership/edit/' . $membership->price_table_id); ?>"><i class="fa ti-pencil"></i><span class="invisible-on-md">  Modify</span></a>
                                            <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
                                                <a onclick="return delete_confirmation()" href = "<?php echo base_url('index.php/membership/delete/' . $membership->price_table_id); ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-trash"></i><span class="invisible-on-md">  Delete</span></a>
                                                    <?php } ?>
                                    </td>
                                </tr>
                                <?php
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'Not data available!';
                }
                ?>					
					
					
					
					

                            </div>
                        </div>
                    </div>	


                    </div>
					</div>





                <div class="modal fade" id="settop" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Set top offer</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
        <?php echo form_open(base_url() . 'index.php/membership/set_top_offer','role="form" class="form-horizontal"'); ?>
								
                                                                <div class="row form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Select Top Offer :</label></div>
                                                                    <div class="col-12 col-md-9">
																		<?php
              $option = array();
              $option[0] = 'Select membership';
              foreach ($memberships as $value) {
                      $option[$value->price_table_id] = $value->price_table_title;
                      if ($value->price_table_top) {
                          $old = $value->price_table_id;
                      }
              }
              ?>
                                                                        <?php echo form_dropdown('membership_id', $option, $old,'class="form-control"') ?>
                                                                    </div>
                                                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <?php echo form_submit('submit', 'Save', 'class="btn btn-primary"') ?>
                                <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>