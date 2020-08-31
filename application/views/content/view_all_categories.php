<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
</div>

<!-- X-Editable Scripts-->
<?php
   $this->load->view('plugin_scripts/x-editable_scripts');
?>

<div class="row">
                    <div class="col-lg-12">
										
						
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                              Category  <strong class="card-title">List</strong>
                            </div>							
                            <div class="card-body">
                <table class="table table-striped">
                    <thead>
                        <tr>
                            <th class="col-2">Category Name</th>
                            <th class="col-2">Created By</th>
                            <th class="col-2">Status</th>
                            <th class="col-4">Action</th>
                        </tr>
                    </thead>
						

                    <tbody>
                    <?php $i = 1;
                    foreach ($categories as $category) { ?>
                        <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                            <td class="col-2"><a href="#" data-name="cat_name" data-type="text" data-url="<?php echo base_url('index.php/admin_control/update_category_name'); ?>" data-pk="<?=$category->category_id; ?>" class="data-modify-<?=$category->category_id; ?> no-style"><?=$category->category_name; ?></a> </td>
                            <td class="col-2"><?php echo $category->user_name; ?></td>
                            <td class="col-2"><?php echo $category->category_active == 1 ? 'Avtive':'Inactive'; ?></td>
                            <td class="col-4">
								<a class="btn btn-outline-info btn-sm modify" name="modify-<?=$category->category_id; ?>" href = "#"><i class="fa ti-pencil"></i><span class="invisible-on-md">  Modify</span></a>

                              <?php if ($category->category_active == 1) {?>  
                                    <a class="btn btn-outline-info btn-sm" href = "<?php echo base_url('index.php/admin_control/mute_category/' . $category->category_id); ?>"><i class="fa  fa-power-off"></i>  Deactivate </a>
                                <?php }else{ ?>
                                    <a class="btn btn-outline-info btn-sm" href = "<?php echo base_url('index.php/admin_control/activate_category/' . $category->category_id); ?>"><i class="fa fa-check"></i> Activate</a>
                                <?php } ?>

                                <a onclick="return delete_confirmation()" href = "<?php echo base_url('index.php/admin_control/delete_category/' . $category->category_id); ?>" class="btn btn-outline-info btn-sm "><i class="fa fa-trash"></i> Delete</a>

                            </td>
                        </tr>
                        <?php $i++;
                    } ?>
                    </tbody>
                </table>					

                            </div>
                        </div>
                    </div>	


                    </div>
					</div>
