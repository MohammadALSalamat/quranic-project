<?php //echo "<pre/>"; print_r($blogs); exit(); ?>
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
                             <div class="float-left"> Blog  <strong class="card-title">posts</strong></div>
            				<div class="float-right">
                            <a class="btn btn-outline-primary" href="<?php echo base_url('index.php/blog/add'); ?>"><i class="fa fa-plus-square-o"></i>&nbsp; Add Post</a></div>
							</div>							
                            <div class="card-body">
                <?php if (isset($blogs) != NULL) { ?>
								
                <table class="table table-striped">
					
                        <thead>
                            <tr>
                                <th class="col-4">Post</th>
                                <th class="col-4">Date</th>
                                <th class="col-4">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($blogs as $blog) {
                                ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                    <td class="col-4"><?= $blog->blog_title; ?>
                                        <div class="collapse" id="collapse_<?= $blog->blog_id; ?>"><br/>
                                            <p class="notice-css"><span class="text-muted">Content: </span> 
                                                <?= $blog->blog_body; ?>
                                            </p>
                                        </div>
                                    </td>
                                    <td class="col-4"><?= $blog->blog_post_date; ?></td>
                                    <td class="col-4">
                                            <a href="#collapse_<?= $blog->blog_id; ?>"  data-toggle="collapse" class="btn btn-outline-secondary btn-sm"><i class="fa ti-zoom-in"></i> View</a>
                                            <a class="btn btn-outline-secondary btn-sm" href = "<?php echo base_url('index.php/blog/edit/' . $blog->blog_id); ?>"><i class="fa ti-pencil"></i>  Modify</a>
                                            <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
                                                <a onclick="return delete_confirmation()" href = "<?php echo base_url('index.php/blog/delete/' . $blog->blog_id); ?>" class="btn btn-outline-secondary btn-sm"><i class="fa fa-trash"></i>  Delete</a>
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
                    echo 'No blogs!';
                }
                ?>				

                            </div>
                        </div>
                    </div>	


                    </div>
					</div>


