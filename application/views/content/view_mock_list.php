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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'>Exams Page</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">Exams</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#all-exam" data-fancyscroll="data-fancyscroll" data-offset="64"><span class="indicator-arrow indicator-arrow-one" data-zanim-xs='{"from":{"opacity":0,"y":30},"to":{"opacity":1,"y":0},"ease":"Back.easeOut","duration":1,"delay":1.5}'></span></a></div>			
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
      <section class="text-center pb-6" id="all-exam">
              <div class="overflow-hidden">
                <h3 class="font-weight-normal mb-1" data-zanim-xs='{"duration":1.5,"delay":0}'><?=isset($category_name)?$category_name:'All'; ?> Exams</h3>
              </div>
              <div class="overflow-hidden">
                <hr class="hr-short border-black" data-zanim-xs='{"duration":1.5,"delay":0.2}'>
              </div>		  
        <div class="container px-3">
          <div class="sortable" data-options='{"layoutMode":"packery"}'>
			  
			  
            <div class="menu mb-3 justify-content-center">

                    	<?php if ($commercial) { ?>			
              <div class="item" data-filter="*"><a href="<?=base_url('index.php/exam_control/view_all_mocks') ?>" class="btn-outline-dark btn">All</a></div>
              <div class="item" data-filter="*"><a href="<?=base_url('index.php/exam_control/mocks_type/paid') ?>" class="btn-outline-danger btn">Paid</a></div>
			  <div class="item" data-filter="*"><a class="btn-outline-success btn" href="<?=base_url('index.php/exam_control/mocks_type/free');?>">Free</a></div>
				 <?php } ?>

				
            </div>

            <div class="row sortable-container sortable-container-gutter-fix hoverdir-grid" data-zanim-timeline="{}" data-zanim-trigger="scroll">
	                <?php 
	                    if (isset($mocks) AND !empty($mocks)) {  $i = 1;
	                        foreach ($mocks as $mock) {
	                            if (($mock->exam_active == 1) && ($mock->public == 1)) {
	                                $hr = (int) substr($mock->time_duration, 0, 2); // returns hr 
	                                $minutes =substr($mock->time_duration, -5, 5); // returns minutes 
	                ?>				
				
              <div class="col-sm-6 col-lg-4 px-2 sortable-item mb-3" data-zanim-xs='{"delay":0}'>
                <div class="hoverdir-item position-relative rounded overflow-hidden" data-zanim-xs='{"duration":1.5,"animation":"zoom-in","delay":0}'><a class="d-block" href="<?=base_url('index.php/exam_control/view_exam_summery/'.$mock->title_id); ?>" data-lightbox="work">
					
					<?php if (file_exists("exam-images/$mock->title_id.png")) { ?>
	                                                <img class="img-fluid rounded" src="<?=base_url("exam-images/$mock->title_id.png"); ?>" alt="<?=$mock->title_name;?>">
	                                            <?php }else{ ?>
	                                                <img class="img-fluid rounded" src="<?=base_url('exam-images/placeholder.png'); ?>" alt="<?=$mock->title_name;?>">
	                                            <?php } ?>
					
                    <div class="hoverdir-item-content">
                      <div class="h-100 d-flex flex-center p-3 hoverdir-text">
                        <div class="text-700">
                          <h2 class="text-white lh-1 fs-2"><?=$mock->title_name;?></h2>
                          <p class="ls-0 mb-0"><?=$mock->category_name.'/'.$mock->sub_cat_name;?> <br><br>
						<time><?=($mock->random_ques_no != 0) ? $mock->random_ques_no : $this->db->where('exam_id', $mock->title_id)->get('questions')->num_rows();?> questions</time>
							<br><?=($hr)?$mock->time_duration.' hours':$minutes.' minutes';?> <br><br><br> <?php if ($mock->exam_price) {
                                                echo '<button class="btn-outline-danger btn mr-1 mb-1" type="button">'.$currency_symbol.$mock->exam_price.'</button>';
                                            }else{
                                                echo '<button class="btn-outline-success btn mr-1 mb-1" type="button">'.'free'.'</button>';
                                            } ?><br> </p>
                        </div>
                      </div>
                    </div>
                  </a>
  <div class="fb-share-button" 
    data-href="<?=base_url('index.php/exam_control/view_exam_summery/'.$mock->title_id)?>" 
    data-layout="button_count">
  </div>					

				  </div>
				      
              </div>
				
				
	                <?php           $i++;
	                            }
	                        }
	                    } else {
	                        echo '<h4>There is No exam found!</h4>';
	                    }
	                    ?>				
				
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


