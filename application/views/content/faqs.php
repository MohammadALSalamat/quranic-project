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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'>FAQS Page</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">FAQS</li>
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
          <div class="row justify-content-center" data-zanim-timeline="{}" data-zanim-trigger="scroll">
            <div class="col-lg-7">
				
				
                    <?php  $faq_grps = $this->db->get('faq_grp')->result();
                    if (isset($faqs) AND !empty($faqs)) { 
                        foreach ($faq_grps as $faq_grp) { $i = 1;
							echo "<h3 class='text-transform-none font-weight-semi-bold list-group-item-light' align='center'>".$faq_grp->faq_grp_name."</h3>";							 
                            foreach ($faqs as $faq) { 
                                if($faq_grp->faq_grp_id == $faq->faq_grp_id){ ?>
				
				
              <div data-zanim-timeline="{}" data-zanim-trigger="scroll">
                <div class="overflow-hidden">
                  <h6 class="text-transform-none fs-0 font-weight-semi-bold" data-zanim-xs='{"duration":1.5,"delay":0}'><?=$i;?> - <?=$faq->faq_ques; ?></h6>
                </div>
                <div class="overflow-hidden">
                  <p class="mb-0" data-zanim-xs='{"duration":1.5,"delay":0.1}'><?=$faq->faq_ans; ?></p>
                </div>
                <div class="overflow-hidden">
                  <hr class="my-3" data-zanim-xs='{"duration":1.5,"delay":0.2}' />
                </div>
              </div>
			
                    <?php           $i++;
                                }
                            }
                        }

                    } else {
                        echo '<div class="panel panel-default"><div class="panel-body">No result found!</div></div>';
                    }
                    ?>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


