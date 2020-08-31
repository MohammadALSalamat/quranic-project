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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'><?=$notice->notice_title; ?> page</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
					  <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php/noticeboard/notices');?>">noticeboard</a></li>
                      <li class="breadcrumb-item active" aria-current="page">notic</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#notic" data-fancyscroll="data-fancyscroll" data-offset="64"><span class="indicator-arrow indicator-arrow-one" data-zanim-xs='{"from":{"opacity":0,"y":30},"to":{"opacity":1,"y":0},"ease":"Back.easeOut","duration":1,"delay":1.5}'></span></a></div>			
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
			
          <div class="row mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll" align="center" id="notic">
            <div class="col">
              <div class="overflow-hidden">
                <h2 class="fs-sm-5 mb-2" data-zanim-xs='{"duration":1.5,"delay":0}'><?=$notice->notice_title; ?></h2>
              </div>
              <div class="overflow-hidden">
                <p class="text-uppercase fs--1 text-black ls-0 mb-0" data-zanim-xs='{"duration":1.5,"delay":0.1}'>By: <a class="text-700" href="#"><?=$notice->notice_created_by ?></a><span class="mx-2 text-700">|</span>Published: <a class="text-700" href="#"><?= date("F j, Y", strtotime($notice->notice_start)); ?></a></p>
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
              <p class="fs-1 pl-3 pl-md-4 border-left border-500 py-3 my-4 text-900"><?=$notice->notice_descr; ?></p>
				
			  </div> 
			</div>
			
   </div>
</section>

