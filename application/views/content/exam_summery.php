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
<?php $user_info = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')))->row();?>

<div class="row">
                <div class="col-xs-10 col-xs-offset-1">
                    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
                    <?=(isset($message)) ? $message : ''; ?>
                </div>
</div>


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center" data-zanim-timeline="{}" data-zanim-trigger="scroll">
		  
        <div class="container" id="start">
          <div class="row mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div class="col">
              <div class="overflow-hidden">
                <h2 class="fs-sm-5 mb-2" data-zanim-xs='{"duration":1.5,"delay":0}'>اللهم لاسهل إلا ماجعلته سهلا</h2>
              </div>
              <div class="overflow-hidden">
                <p class="text-uppercase fs--1 text-black ls-0 mb-0" data-zanim-xs='{"duration":1.5,"delay":0.1}'>The best amongst you is the one who learns the Qur'an and teaches it</p>
              </div>
              <div class="overflow-hidden">
                <hr class="hr-short border-black" data-zanim-xs='{"duration":1.5,"delay":0.2}' />
              </div>
            </div>
          </div>
		  </div>		  
		  
		  
		  <hr>
<div class="container">
<div class="row">	
		<div class="col-12">	
			<div class="row">
				
				
			<div class="col-md-6">

			<table class="table mb-0">
  <thead>
    <tr>
<h4>Exam Summery</h4>
    </tr>
  </thead>
  <tbody>
                                        <tr>
                                            <th>Title:</th>
                                            <td><?= $mock->title_name ?></td>
                                        </tr>
                                        <tr>
                                            <th>Category:</th>
                                            <td><?=$mock->category_name.'/'.$mock->sub_cat_name;?></td>
                                        </tr>
                                        <tr>
                                            <th>Price:</th>
                                            <td><?=($mock->exam_price)?$currency_code.' '.$currency_symbol.$mock->exam_price:'Free' ?></td>
                                        </tr>
	                                         <tr>
                                            <th>share:</th>
                                            <td><div class="fb-share-button" 
        data-href="<?=base_url('index.php/exam_control/view_exam_summery/'.$mock->title_id)?>" 
        data-layout="button_count" data-size="large" >
    </div></td>
                                        </tr>
	      
	  
  </tbody>
          </table>
				
			</div>
			
			
			<div class="col-md-6">

			<table class="table mb-0">
  <thead>
    <tr>
<h4>Exam INF.</h4>
    </tr>
  </thead>
  <tbody>
                                        <tr>
                                            <th>Total Questions:</th>
                                            <td>
                                                <?=($mock->random_ques_no != 0) ? $mock->random_ques_no : $this->db->where('exam_id', $mock->title_id)->get('questions')->num_rows();?>
                                            </td>
                                        </tr>
                                        <tr>
                                            <th>Passing Score:</th>
                                            <td><?= $mock->pass_mark ?>%</td>
                                        </tr>
                                        <tr>
                                            <th>Duration:</th>
                                            <td><?=$mock->time_duration ?> <span class="text-muted"> hours</span></td>
                                        </tr>
                                        <tr>
                                            <th>notes:</th>
                                            <td><button class="btn-outline-info btn mr-1 mb-1" type="button" data-toggle="modal" data-target="#note">* NOTES</button></td>
                                        </tr>	  
  </tbody>
          </table>
				
			</div>


        </div>
			</div>
</div>	
</div>
		  <hr>
		  
		  
		  
		  
		  
<div class="container">
<div class="row">	
	<div class="col-12">

	                    <?php 
                    if ($this->session->userdata('log')) { 
                        if ($mock->exam_price) {
                            if (($this->session->userdata('log')) && ($user_info->subscription_id != 0) && ($user_info->subscription_end > now())) {
                                $payment_info = 'view_exam_instructions';
                            }else{
                                $payment_info = 'payment_process'; 
                            }
                        }else{
                            $payment_info = 'view_exam_instructions';
                        }
                    ?>
                        <a href="<?=base_url('index.php/exam_control/'.$payment_info.'/'.$mock->title_id) ?>" class="btn-outline-success btn mr-1 mb-1"> <?php echo ($payment_info == 'payment_process')?'Pay with PayPal':'Start Exam' ?></a> 

                    <?php
                    }else{
                    ?>
                        <a href="<?=base_url('index.php/exam_control/view_exam_instructions/'.$mock->title_id);?>" class="btn btn-primary"> Login to Start </a>
                    <?php 
                    } ?>
	</div>
</div>	
</div>
		  
      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


<div class="modal fade" id="note" tabindex="-1" role="dialog" aria-labelledby="note" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="note">** NOTES **</h5>
        <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span class="font-weight-light" aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
 <div class="col-12">
<div class="row">
    <div class="col-12">
                    <h3>Syllabus :</h3>
	</div>
	<div class="col-12">
                    <h4><?= $mock->syllabus; ?></h4>
	</div>
                </div>
		  </div>
<hr class="hr-short border-black">
 <div class="col-12">
<div class="row">
                    <p><strong>Note: </strong>The value of this exam certificate is only valid under the terms and conditions of <?= $brand_name ?>.</p>

	
                </div>
		  </div>
      </div>
      <div class="modal-footer">
        <button class="btn btn-secondary btn-sm" type="button" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>

