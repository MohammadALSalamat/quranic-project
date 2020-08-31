<?php $user_info = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')))->row();?>

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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'><?= $mock->title_name ?></h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
						<?php if ($this->session->userdata('log')) { ?>
                            <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?= base_url('index.php/dashboard/' . $this->session->userdata('user_id')); ?>"><i class="fas fa-users-cog fa-lg"></i> Dashboard</a></li> 
                        <?php } ?>
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?= base_url('index.php/exam_control/view_all_mocks') ?>">exams</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><?= $mock->title_name ?></li>
                      <li class="breadcrumb-item active" aria-current="page">INF.</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#start" data-fancyscroll="data-fancyscroll" data-offset="64"><span class="indicator-arrow indicator-arrow-one" data-zanim-xs='{"from":{"opacity":0,"y":30},"to":{"opacity":1,"y":0},"ease":"Back.easeOut","duration":1,"delay":1.5}'></span></a></div>			
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->
                <div class="col-xs-10 col-xs-offset-1">
                    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
                    <?=(isset($message)) ? $message : ''; ?>
					<noscript><div class="alert alert-danger">Your browser does not support JavaScript or JavaScript is disabled! Please use JavaScript enabled browser to take this exam.</div></noscript>
                </div>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center" id="start">

        <div class="container">
			<div class="row">
				<div class="col-12">
			
<div class="fancy-tab">
  <div class="nav-bar nav-bar-center">
    <div class="nav-bar-item active"><span class="fas fa-screwdriver fs-2"></span>
      <div class="mt-1">Requirements</div>
    </div>
    <div class="nav-bar-item"><span class="fas fa-book-reader fs-2"></span>
      <div class="mt-1">Instructions</div>
    </div>
    <div class="nav-bar-item"><span class="far fa-sticky-note fs-2"></span>
      <div class="mt-1">NOTE</div>
    </div>
  </div>
  <div class="tab-contents">
    <div class="tab-content active">
      <p class="lead">
          You need <b>javascript</b> enabled browser to take this exam.
		  </p>
		  <p class="lead">
		  Use <b>latest browser</b> to have the best experience.
		</p>
    </div>
	  
	  
    <div class="tab-content">
      <p class="lead">
		  <ul class="list-group list-group-flush">
                                <li class="list-group-item">Each question has between 2 and 8 options. You have to choose one or more correct answers.</li>
                                <li class="list-group-item">There are no penalties for incorrect answers.So attempt all questions.</li>
                                <li class="list-group-item">You can review and change your answers before final submit.</li>
                                <li class="list-group-item">There is no partial marking! If any question have more than one correct answers, you have mark all correct answers </li>
                                <li class="list-group-item">Unanswered questions will be count as wrong answers.</li>
                                <li class="list-group-item">You must answer all questions before the time duration shown on the top.</li>
                                <li class="list-group-item">You can't resume the exam.</li>
                            </ul>
		</p>
    </div>
	  
	  
    <div class="tab-content">
      <p class="lead"><strong>** </strong>The value of this exam certificate is only valid under the terms and conditions of <?= $brand_name ?>.<strong> **</strong></p>
    </div>
  </div>
</div>
				
                    <?php 
                    if ($this->session->userdata('log')) { 
                        if ($mock->exam_price) {
                            if (($this->session->userdata('log')) && ($user_info->subscription_id != 0) && ($user_info->subscription_end > now())) {
                                $payment_info = 'start_exam';
                            }else{
                                $payment_info = 'payment_process'; 
                            }
                        }else{
                            $payment_info = 'start_exam';
                        }
                    ?>
                        <a href="<?=base_url('index.php/exam_control/'.$payment_info.'/'.$mock->title_id) ?>" class="btn btn-success col-xs-5"> <?php echo ($payment_info == 'payment_process')?'Pay with PayPal':'Start Exam' ?></a> 

                    <?php
                    }else{
                    ?>
                        <a href="<?=base_url('index.php/exam_control/view_exam_instructions/'.$mock->title_id);?>" class="btn btn-primary"> Login to Start </a>
                    <?php 
                    } ?>
				
				
		</div>	
		</div>	
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


<script>
$(document).ready(function() {
   $("#start-exam").removeAttr("disabled");
})    
</script>
 <!--
<script language="JavaScript"><
javascript:window.history.forward(1);></script> 
-->