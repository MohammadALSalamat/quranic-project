<?php 
    if ($this->session->userdata('time_zone')) date_default_timezone_set($this->session->userdata('time_zone')); 
    else if( ! ini_get('date.timezone') ) date_default_timezone_set('GMT');
?>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center overflow-hidden py-0" id="top" data-zanim-timeline="{}" data-zanim-trigger="scroll">

        <div class="bg-holder overlay parallax" style="	background-color: #020036;" id="backgro">
        </div>
        <!--/.bg-holder-->

        <div class="container-fluid">
          <div class="header-overlay"></div>
          <div class="position-relative pt-10 pb-8">
            <div class="header-text">
              <div class="overflow-hidden">
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'>post page</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php/blog');?>">blog</a></li>
						<li class="breadcrumb-item active" aria-current="page"><?=$post->blog_title; ?></li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#blog" data-fancyscroll="data-fancyscroll" data-offset="64"><span class="indicator-arrow indicator-arrow-one" data-zanim-xs='{"from":{"opacity":0,"y":30},"to":{"opacity":1,"y":0},"ease":"Back.easeOut","duration":1,"delay":1.5}'></span></a></div>			
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>

        <div class="container">
			                <div class="col-xs-10 col-xs-offset-1">
                    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
                    <?=(isset($message)) ? $message : ''; ?>
                </div>
			
          <div class="row mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll" align="center" id="blog">
            <div class="col">
              <div class="overflow-hidden">
                <h2 class="fs-sm-5 mb-2" data-zanim-xs='{"duration":1.5,"delay":0}'><?=$post->blog_title; ?></h2>
              </div>
              <div class="overflow-hidden">
                <p class="text-uppercase fs--1 text-black ls-0 mb-0" data-zanim-xs='{"duration":1.5,"delay":0.1}'>By: <a class="text-700" href="#!"><?=$post->user_name ?></a><span class="mx-2 text-700">|</span><a class="text-700" href="#!"><?= date("F j, Y", strtotime($post->blog_post_date)); ?></a></p>
              </div>
              <div class="overflow-hidden">
                <hr class="hr-short border-black" data-zanim-xs='{"duration":1.5,"delay":0.2}' />
              </div>
            </div>
          </div>		
			     <div class="col-lg-10">
                    <?=validation_errors('<div class="alert alert-danger">', '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button></div>'); ?>
                    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
                </div>

          <div class="row">
            <div class="col-lg-10 mb-7 mb-lg-0">
              <p class="fs-1 pl-3 pl-md-4 border-left border-500 py-3 my-4 text-700"><?=$post->blog_body; ?></p>
				
			  </div> 
			</div>
			
              <div class="row">
                <div class="col-12">
                  <h4 class="text-base border-bottom pb-2 my-4 font-weight-normal"><?=count($post_comments)?> Comments</h4>
					<?php if ($this->session->userdata('log')) { ?>
					<p class="text-muted"></p>
					<?php }else{ ?>
					<p class="text-muted"> ** login to write a comment**</p>
					<?php } ?>
					<?php foreach ($post_comments as $value) { ?>
                  <div class="media mb-4"> <i class="fas fa-user-circle fa-5x mr-3"></i>
                    <div class="media-body">
                      <p class="mb-1 font-weight-bold text-900"><?=$value->user_name;?></p>
						<p class="mb-1 text-700"><?=$value->comment_body;?></p>
						<span class="fs--1 pl-1 text-600"> Posted: <?=date('D, d M Y', strtotime($value->comment_date));?></span>
                    </div>
                  </div>
					
					<?php } ?>
					
                </div>
              </div>

<?php if ($this->session->userdata('log')) { ?>
			<hr/>
			<div class="row">
			      <div class="col-12">
                  <?=form_open('blog/comment');?>
					  <input type="hidden" name="blog_id" value="<?=$post->blog_id;?>">
                    <h4 class="font-weight-normal mb-3 text-base">Leave a comment</h4>
					  <hr/>
                    <div class="row no-gutters">
						
                      <div class="col-12" align="center">
                        <div class="form-group">
                          <textarea name="blog_comment" class="form-control" rows="2" placeholder="Your Comment"></textarea>
                        </div>
                        <button class="btn btn-dark hvr-sweep-top" type="submit">Post</button>
                      </div>
                    </div>
                  <?=form_close(); ?>
                </div>
				</div>
			
			
			<?php } ?>
    </div>
</section>


