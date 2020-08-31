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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'>notices Page</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">noticeboard</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#notice" data-fancyscroll="data-fancyscroll" data-offset="64"><span class="indicator-arrow indicator-arrow-one" data-zanim-xs='{"from":{"opacity":0,"y":30},"to":{"opacity":1,"y":0},"ease":"Back.easeOut","duration":1,"delay":1.5}'></span></a></div>			
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

        <div class="container" id="notice">
			<div class="row" align="center">
			
			<hr><?php if(empty($notices)) echo "<h3>No result found!</h3>"; ?>            
                        <?php foreach ($notices as $value) { ?>	
			
            <div class="col-md-6 col-lg-4 h-100 mb-4">
				
				<div class="card">
    <div class="card-body">
      <h5 class="card-title"><?=$value->notice_title; ?></h5>
      <p class="card-text"><?=$value->notice_descr; ?></p>
      <p class="card-text"><small class="text-muted">Created by: <?=$value->notice_created_by.', Published: '. date("F j, Y", strtotime($value->notice_start)); ?></small></p>
		<a href="<?=base_url('index.php/noticeboard/notice/'.$value->notice_id); ?>"><button class="btn-outline-secondary btn mr-1 mb-1 card-text" type="button">READ MORE</button></a>
    </div>
  </div>
				
</div><?php } ?>
          </div>
			
			</div>
       </section>