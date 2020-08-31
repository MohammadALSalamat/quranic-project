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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'>Blog Page</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Blog</li>
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
                <div class="col-xs-10 col-xs-offset-1">
                    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
                    <?=(isset($message)) ? $message : ''; ?>
                </div>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>

        <div class="container" id="blog">
			
                    <div class="block-search" align="center">
                        <?=form_open(base_url('index.php/blog/find'), 'method="GET" role="form" class="form-horizontal"'); ?>
                            <input name="keyword" type="search" class="form-control" placeholder="Search..." />
                        <?=form_close(); ?>
                    </div>
			<hr>
			<div class="row">
				
                        <?php if(empty($blogs)) echo "<h3>there is no blog!</h3>"; ?>            
                        <?php foreach ($blogs as $value) { ?>			  
			  
            <div class="col-md-6 col-lg-4 h-100 mb-4">
				<div class="p-3 border rounded-top" align="center"><h5 class="text-base text-transform-none font-weight-medium lh-1"><a class="text-black" href="<?=base_url('index.php/blog/post/'.$value->blog_id); ?>"><?=$value->blog_title; ?></a></h5></div>
				
              <div class="p-3 border rounded-bottom border-top-0" align="center">
                <p><?=$value->blog_body; ?></p><a class="text-dark font-weight-semi-bold" href="<?=base_url('index.php/blog/post/'.$value->blog_id); ?>">Read more<span class="fas fa-angle-right ml-1 text-900" data-fa-transform="down-2"></span></a>
                <hr />
                <div class="row justify-content-between align-items-center">
                  <div class="col pr-0">
                    <div class="media"><span class="rounded-circle far fa-address-card fa-2x"></span>
                      <div class="media-body ml-2">
                        <h5 class="mb-0 ls-0" align="left"><?=$value->user_name?></h5>
                        <p class="mb-0" align="left"><?=' date: '. date("F j, Y", strtotime($value->blog_post_date)); ?></p>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
				<?php } ?>

          </div>
          <div class="row">
            <div class="col-12 text-center"><a class="btn btn-sm btn-outline-dark hvr-sweep-top mt-5" href="#!">Load More</a></div>
          </div>
			                    <div class="text-center">
                         <?=$this->pagination->create_links(); ?>
                    </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->



