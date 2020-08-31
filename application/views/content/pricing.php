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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'>Subscribe Page</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">pricing</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
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
      <section class="text-center">
		  
                <?php $temp = $this->db->get_where('content', array('content_type' => 'price_table_msg'))->row(); ?>

        <div class="container">
          <div class="row" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div class="col mb-6">
              <div class="overflow-hidden">
                <h3 class="font-weight-normal mb-1" data-zanim-xs='{"duration":1.5,"delay":0}'><?=$temp->content_heading; ?></h3>
              </div>
              <div class="overflow-hidden">
                <p class="mb-0 ls-0 text-uppercase" data-zanim-xs='{"duration":1.5,"delay":0.1}'><?=$temp->content_data; ?></p>
              </div>
              <div class="overflow-hidden">
                <hr class="hr-short border-black" data-zanim-xs='{"duration":1.5,"delay":0.2}' />
              </div>
            </div>
          </div>
          <div class="row" data-zanim-timeline="{}" data-zanim-trigger="scroll">
			  
                <?php $count = count($memberships);
                foreach ($memberships as $offer) { ?>
			  
            <div class="col-sm-6 col-lg-3 mb-4 mb-lg-0">
              <div class="border <?=($offer->price_table_top)?'border-black':'border-200'; ?> rounded p-4 mx-auto" style="max-width: 300px;">
                <div class="text-center"><i class="fas fa-money-check-alt fa-5x"></i></div>
                <h5 class="mt-3"><?=$offer->price_table_title; ?></h5>
                <h2 class="font-weight-bold fs-5"><span class="text-base"><?=$currency_symbol.$offer->price_table_cost; ?></span><small class="fs-0 text-lowercase">/ m</small></h2>
                <hr />
                <ul class="list-unstyled">
					
                                <?php foreach ($features as $feature) { 
                                    if ($feature->parent_id == $offer->price_table_id) {
                                        echo '<li class="py-2">'.$feature->feature_item.'</li>';
                                    }
                                 } ?>
					
					<?php if($offer->price_table_top){ ?>
                  <? echo "<li class='py-2 text-400'> RECOMMENDED </li>";
                      } else {
                       echo "<li class='py-2 text-400'> .... </li>";?>
					<?php } ?>
                  <li class="py-2 text-400">Security &amp; Safe</li>
                  <li class="py-2 text-400">24/7 Support</li>
				  
				  </ul><a class="btn btn-sm <?=($offer->price_table_top)?'btn-dark':'btn-outline-secondary'; ?> mt-5 btn-block hvr-sweep-top" href="<?=base_url('index.php/membership/payment_process/'.$offer->price_table_id);?>">get started</a>
              </div>
            </div>
			                  <?php } ?>

          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

