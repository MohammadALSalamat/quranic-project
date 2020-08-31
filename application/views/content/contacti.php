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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'>contact us</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">contact</li>
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
      <section>

        <div class="container">
          <div class="row justify-content-center">
            <div class="col-lg-6 mb-5 mb-lg-0 d-flex flex-column justify-content-between">
              <div class="row">
                <div class="col-12">
                  <h5 class="mb-3">Connect With Us</h5>
                </div>
                <div class="col-auto mb-2 mb-sm-0" style="width: 190px">
                  <div class="row">
                    <div class="col-1"><span class="fas fa-location-arrow text-700"></span></div>
                    <div class="col px-2">
                      <p class="mb-1 text-700"><strong>Reign Studio</strong></p>
                      <p class="mb-0 text-600"><?=$address;?></p>
						
                    </div>
                  </div>
                </div>
                <div class="col-auto" style="width: 205px">
                  <div class="row mb-2 mb-sm-1">
                    <div class="col-1"><span class="fas fa-phone mr-2 text-700"> </span></div>
                    <div class="col px-2"><a class="text-600" href="tel:<?=$support_phone;?>"><?=$support_phone;?></a><br /></div>
                  </div>
                  <div class="row">
                    <div class="col-1"><span class="fas fa-envelope mr-2 text-700"></span></div>
                    <div class="col px-2"><a class="text-600" href="mailto:info@qurani.com">info@qurani.com</a></div>
                  </div>
                </div>
              </div>
              <div class="col-md-12 col-sm-12">
                    <iframe width="100%" height="350" frameborder="0" scrolling="no" marginheight="0" marginwidth="0" src="https://maps.google.it/maps?q=<?=urlencode($address)?>&output=embed"></iframe>
                <div class="marker-content py-3">
                  <p><?php $address = str_replace(',','<br/>',$address); ?></p>
                </div>
              </div>
            </div>
            <div class="col-lg-6">
              <h5 class="mb-3">Feel free to drop us a line!</h5>
				
				
				
              <?=form_open(base_url('index.php/guest/contact'), 'role="form" id="contact_form" class="contact-form"'); ?>
                        <input type="hidden" name="token" value="<?=time();?>">
				
                <input type="hidden" name="to" value="username@domain.extension" />
                <div class="form-group mb-3">
				<?=form_input('name', '', 'placeholder="Your Name " class="fs-0 form-control" id="name" required="required"') ?>
                </div>
                <div class="form-group mb-3">
                  <?=form_input('email', '', 'id="email" pattern="^[a-zA-Z0-9.!#$%&'."'".'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="Your Email Address" type="email" class="fs-0 form-control" required="required"') ?>
                </div>
				<div class="form-group mb-3">
                  <?=form_input('subject', '', 'id="subject" placeholder="Subject" class="fs-0 form-control" required="required"') ?>
                </div>
                <div class="form-group mb-3">
					<textarea name="message" id="message" required="required" class="fs-0 form-control contact-message" rows="8" placeholder="Message"></textarea>
                </div>
                <div class="zform-feedback my-2"></div>
                <button class="btn btn-block btn-dark hvr-sweep-top" type="submit">SEND</button>
              <?=form_close(); ?>
				
				
				
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->
