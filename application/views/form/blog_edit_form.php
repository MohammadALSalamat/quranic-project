<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>

                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                       Edit <strong>Post</strong>
                                                    </div>
                                                    <div class="card-body card-block">
    <form action="<?php echo base_url('index.php/blog/update/'.$blog->blog_id)?>" method="post" role="form" class="form-horizontal">  

                                                            <div class="form-group">
                                                                <div class="col col-md-3">
																	<label for="text-input" class=" form-control-label">Title :</label>
																</div>
                                                                <div class="col-12 col-md-8">
																	<?php echo form_input('blog_title', $blog->blog_title, 'placeholder="Post title" id="title" class="form-control" required="required"') ?>
																</div>
                                                            </div>		

                                                                <div class="form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Content : </label></div>
                                                                <div class="col-12 col-md-8">
                  <?php 
                    $data = array(
                        'name'        => 'blog_body',
                        'id'          => 'blog_body',
                        'value'       =>  $blog->blog_body,
                        'rows'        => '20',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>																	
																	</div>	</div>		
		
                <div class="col-12" align="center">
					<hr/>
                    <button type="submit" class="btn btn-outline-primary">Save</button>
                </div>
            </form>																	
														</div></div></div>



<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>
