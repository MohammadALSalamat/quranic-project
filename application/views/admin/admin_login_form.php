      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center overflow-hidden py-0" id="top" data-zanim-timeline="{}" data-zanim-trigger="scroll">

        <div class="bg-holder overlay parallax" style="	background-color: #020036;" id="backgro">
        </div>

        <div class="container-fluid">
          <div class="header-overlay"></div>
          <div class="position-relative pt-10 pb-8">
            <div class="header-text">
              <div class="overflow-hidden">
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'>ADMIN LOGIN PAGE</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">ADMIN LOGIN</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#LOGIN" data-fancyscroll="data-fancyscroll" data-offset="64"><span class="indicator-arrow indicator-arrow-one" data-zanim-xs='{"from":{"opacity":0,"y":30},"to":{"opacity":1,"y":0},"ease":"Back.easeOut","duration":1,"delay":1.5}'></span></a></div>			
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>

        <div class="container">
			
			
          <div class="row mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll" align="center" id="LOGIN">
            <div class="col">
              <div class="overflow-hidden">
                <h2 class="fs-sm-5 mb-2" data-zanim-xs='{"duration":1.5,"delay":0}'>ADMIN LOGIN</h2>
              </div>
              <div class="overflow-hidden">
                <p class="text-uppercase fs--1 text-black ls-0 mb-0" data-zanim-xs='{"duration":1.5,"delay":0.1}'>The best amongst you is the one who learns the Qur'an and teaches it</p>
              </div>
              <div class="overflow-hidden">
                <hr class="hr-short border-black" data-zanim-xs='{"duration":1.5,"delay":0.2}' />
              </div>
            </div>
          </div>		
			     <div class="col-lg-10">
                    <?=validation_errors('<div class="alert alert-danger">', '<button class="close" type="button" data-dismiss="alert" aria-label="Close"><span class="font-weight-light" aria-hidden="true">×</span></button></div>'); ?>
                    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
                    <?=(isset($message)) ? $message : ''; ?>
                </div>
          <div class="row">
			  
            <div class="col-lg-7">
              <div class="mb-6">
				  
                        <?php echo form_open(base_url('index.php/admin'), 'role="form"'); ?>
                        <?php
                        $option = array();
                        $option[0] = 'Select Admin Role';
                        foreach ($user_role as $value) {
                            if ($value->user_role_id < 5) {
                                $option[$value->user_role_id] = $value->user_role_name;
                            }
                        }
                        ?>
				  
				              <div class="form-group">
								<?php echo form_dropdown('user_role', $option, '', 'class="custom-select mb-3"') ?>
                            </div>
				  <h6 class="text-muted" align="center">login with your admin email and password after choicing the role</h6>
                            <div class="form-group">
								<?=form_input('user_email', '', 'id="user_email" type="email" pattern="^[a-zA-Z0-9.!#$%&'."'".'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="Email address" class="form-control" required="required"') ?>
                           </div>
				  
                            <div class="form-group">
								<?=form_password('user_pass', '', 'id="user_pass" placeholder="Password" class="form-control" required="required"') ?>
                            </div>

                            <div class="col-lg-12" align="center">
                                    <button type="submit" class="btn-outline-info btn mr-1 mb-1">LOGIN</button>
                            </div>
                        <?=form_close() ?>				  
				  
				  
              </div>
            </div>
			  
            <div class="col-lg-5 pl-lg-7">
			 <div class="media mb-3">
				  <i class="far fa-question-circle fa-4x mr-3 rounded"></i>
                <div class="media-body">
					<p class="text-600 mb-0">Forgot your Password?  <a href="<?=base_url('index.php/login_control/password_recovery_form'); ?>">  recovery</a></p>
                <button class="btn-primary btn mr-1 mb-1 hvr-sweep-top" data-remodal-target="forgot">recovery</button>
					</div>
				</div>
					<br>
				 <div class="media mb-3">
				  <i class="fas fa-user fa-4x mr-3 rounded"></i>
					<div class="media-body">
                  <p class="text-600 mb-0">STUDENT LOGIN <a href="<?=base_url('index.php/login_control'); ?>"> Login</a></p>
					<button class="btn-info btn mr-1 mb-1 hvr-sweep-top" data-remodal-target="login">LOGIN</button>
                </div>
              </div>
				
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->






				  
	<div class="remodal rounded-soft" data-remodal-id="login">
      <button class="remodal-close" data-remodal-action="close"></button>
      <h4>LOGIN</h4>
        <div class="card card-signin my-5">
          <div class="card-body">
 <?php echo form_open(base_url('index.php/login_control') ,'role="form" class="form-signin"'); ?>
              <div class="form-label-group">
                <?php echo form_input('user_email', '', 'placeholder="Email address" class="form-control" required=" required autofocus" type="email"') ?>
              </div>
<br>
              <div class="form-label-group">
                <?php echo form_password('user_pass', '', 'placeholder="Password" class="form-control" required="required" type="password"') ?>
              </div>
<br>
               <?php echo form_submit('submit', 'LOGIN', 'class="btn-info btn btn-block"') ?>
<?php echo form_close() ?>				  
          </div>
        </div>
<br>
      <button class="btn-danger btn mr-1 mb-1 hvr-sweep-top" data-remodal-action="cancel">Cancel</button>
    </div>		
				  
				  
	    <div class="remodal rounded-soft" data-remodal-id="forgot">
      <button class="remodal-close" data-remodal-action="close"></button>
      <h4>Password recovery</h4>
        <div class="card card-signin my-5">
          <div class="card-body">
 <?=form_open(base_url('index.php/login_control/forgot_password'), 'role="form" class="form-signin"'); ?>
              <div class="form-label-group">
                            <?=form_input('email', '', 'pattern="^[a-zA-Z0-9.!#$%&'."'".'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="Put your email address" class="form-control" required="required autofocus"', 'type="email"') ?>				  
              </div>
<br>
              <button class="btn-primary btn mr-1 mb-1 hvr-sweep-top" type="submit">recovery</button>
                        <?=form_close() ?>
          </div>
        </div>
<br>
      <button class="btn-info btn mr-1 mb-1 hvr-sweep-top" data-remodal-target="login">login</button>
      <button class="btn-danger btn mr-1 mb-1 hvr-sweep-top" data-remodal-action="cancel">Cancel</button>
    </div>	

