<?php //echo "<pre/>"; print_r($notices); exit(); ?>
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>


                <div class="row">
                    <div class="col-lg-12">


										
										
                                            
                    
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
							 <div class="float-left"><strong class="card-title">Noticeboard</strong></div>
                                <div class="float-right">
							 <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                    <a class="btn btn-outline-info" href="<?php echo base_url('index.php/noticeboard/add'); ?>"><i class="fa fa-plus-square-o"></i>&nbsp; Add Notice </a>
                <?php } ?>
							 
							 </div>
                            </div>							
                            <div class="card-body">
                                
                <?php if (isset($notices) != NULL) { ?>
                    <table class="table table-striped">
                        <thead>
                            <tr>
                                <th style="width: 50%">Notice</th>
                                <th class="col-sm-1 mobile">Starts</th>
                                <th>Ends</th>
                                <th>Status</th>
                                <th class="col-sm-3 text-center">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($notices as $notice) {
                                ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                    <td><?= $notice->notice_title; ?>
                                        <div class="collapse" id="collapse_<?= $notice->notice_id; ?>"><br/>
                                            <p class="notice-css"><span class="text-muted">Description: </span> 
                                                <?= $notice->notice_descr; ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td class="col-xs-1 mobile"><?= $notice->notice_start; ?></td>
                                    <td><?= $notice->notice_end; ?></td>
                                    <td><?= ($notice->notice_status)?'Active':'Inactive'; ?></td>
                                    <td class="col-xs-3 text-center">
                                        <div class="btn-group">
                                            <a href="#collapse_<?= $notice->notice_id; ?>"  data-toggle="collapse" class="btn btn-outline-info btn-sm"><i class="fa fa-arrows-alt"></i><span class="invisible-on-sm"> View</span></a>
                                            <a class="btn btn-outline-info btn-sm" href = "<?php echo base_url('index.php/noticeboard/edit/' . $notice->notice_id); ?>"><i class="fa ti-pencil"></i><span class="invisible-on-md">  Modify</span></a>
                                            <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
                                                <a onclick="return delete_confirmation()" href = "<?php echo base_url('index.php/noticeboard/delete/' . $notice->notice_id); ?>" class="btn btn-outline-info btn-sm"><i class="fa fa-trash"></i><span class="invisible-on-md">  Delete</span></a>
                                                    <?php } ?>
                                        </div>
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
                    echo 'No notice!';
                }
                ?>
                            </div>
                        </div>
                    </div>	

										

                    </div>
					</div>

