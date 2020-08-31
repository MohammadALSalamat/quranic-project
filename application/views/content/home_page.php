      <!-- ============================================-->
      <!-- Preloader ==================================-->
      <div class="preloader" id="preloader">
          <div class="preloader-wrapper big active">
              <div class="spinner-layer spinner-white-only">
                  <div class="circle-clipper left">
                      <div class="circle"></div>
                  </div>
                  <div class="gap-patch">
                      <div class="circle"></div>
                  </div>
                  <div class="circle-clipper right">
                      <div class="circle"></div>
                  </div>
              </div>
          </div>
      </div>
      <!-- ============================================-->
      <!-- End of Preloader ===========================-->
      <section class="overflow-hidden py-0" id="top" data-zanim-timeline="{}" data-zanim-trigger="scroll">

          <div class="bg-holder overlay parallax" data-rellax-percentage="0.5">
          </div>
          <!--/.bg-holder-->

          <div class="header-overlay"></div>
          <div class="container">
              <div class="d-flex align-items-center vh-100">
                  <div class="header-text">
                      <div class="col-xs-10 col-xs-offset-1 " style="margin-top: -90px;">
                          <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                          <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>
                          <?=(isset($message)) ? $message : ''; ?>
                      </div>
                      <?php $i = 0;
            $sliders = $this->db->where('content_type', 'slider_text')->get('content')->result();
            foreach ($sliders as $slider) ?>
                      <?php $a = 0;
			$sliders2 = $this->db->where('content_type', 'slider_text2')->get('content')->result();
            foreach ($sliders2 as $slider2) ?>
                      <?php $b = 0;
			$sliders3 = $this->db->where('content_type', 'slider_text3')->get('content')->result();
            foreach ($sliders3 as $slider3) ?>



                      <div class="overflow-hidden <?=($i==1)?'active':'';?>">
                          <h1 class="display-3 text-white fs-5 fs-md-5" data-zanim-xs='{"duration":2,"delay":0}'><br
                                  class="d-block d-sm-none"> <span class="typed-text"></span>
                      </div>
                      <div class="overflow-hidden">
                          <p class="text-uppercase text-400 ls-2 mt-2" data-zanim-xs='{"duration":2,"delay":0.1}'>
                              <?=$slider->content_data;?> <br class="d-none d-sm-block"><?=$slider2->content_data;?> <br
                                  class="d-none d-sm-block"><?=$slider3->content_data;?></p>
                      </div>

                      <?php if (!$this->session->userdata('log')): ?>
                      <div
                          data-zanim-xs='{"from":{"opacity":0,"y":30},"to":{"opacity":1,"y":0},"duration":1.5,"delay":0.5}'>

                          <?php if ($student_can_register): ?>


                          <a class="btn-light btn mr-1 mb-1 hvr-sweep-top mt-5 px-4" href="#"
                              data-remodal-target="REGISTER">REGISTER</a>
                          <div class="remodal rounded-soft" data-remodal-id="REGISTER">
                              <button class="remodal-close" data-remodal-action="close"></button>
                              <h4>REGISTER</h4>
                              <div class="card card-signin my-5">
                                  <div class="card-body">
                                      <?php echo form_open(base_url('index.php/login_control/register') ,'role="form" class="form-signin"'); ?>
                                      <?=form_hidden('token', time()); ?>
                                      <div class="form-label-group">
                                          <?php echo form_input('user_name', '', 'placeholder="Your Name " class="form-control" required="required"') ?>
                                      </div>
                                      <br>
                                      <div class="form-label-group">
                                          <?php echo form_input('user_email', '', 'pattern="^[a-zA-Z0-9.!#$%&'."'".'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="example@example.com" placeholder="Email address" class="form-control" required="required autofocus"', 'type="email"') ?>
                                      </div>
                                      <br>
                                      <div class="form-label-group">
                                          <?php echo form_password('user_pass', '', 'placeholder="Your Password (Minimum 6) " class="form-control" required="required"') ?>
                                      </div>
                                      <br>
                                      <div class="form-label-group">
                                          <?php echo form_password('user_passcf', '', 'placeholder="Confirm Password " class="form-control" required="required"') ?>
                                      </div>
                                      <br>
                                      <div id="checkconfirm"></div>
                                      <?php echo form_submit('submit', 'Register', 'class="btn-dark btn btn-block"') ?>
                                      <?php echo form_close() ?>
                                  </div>
                                  <p class="text-muted">... * All fields are required ...</p>

                              </div>
                              <br>
                              <button class="btn-info btn mr-1 mb-1 hvr-sweep-top"
                                  data-remodal-target="login">login</button>
                              <button class="btn-danger btn mr-1 mb-1 hvr-sweep-top"
                                  data-remodal-action="cancel">Cancel</button>

                          </div>

                          <?php endif; ?>

                          <a class="btn-info btn mr-1 mb-1 hvr-sweep-top mt-5 px-4" href="#"
                              data-remodal-target="login">LOGIN</a>


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
                              <button class="btn-primary btn mr-1 mb-1 hvr-sweep-top"
                                  data-remodal-target="forgot">Forgot Password?</button>
                              <button class="btn-dark btn mr-1 mb-1 hvr-sweep-top"
                                  data-remodal-target="REGISTER">REGISTER</button>
                              <button class="btn-danger btn mr-1 mb-1 hvr-sweep-top"
                                  data-remodal-action="cancel">Cancel</button>
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
                                      <button class="btn-primary btn mr-1 mb-1 hvr-sweep-top"
                                          type="submit">recovery</button>
                                      <?=form_close() ?>
                                  </div>
                              </div>
                              <br>
                              <button class="btn-info btn mr-1 mb-1 hvr-sweep-top"
                                  data-remodal-target="login">login</button>
                              <button class="btn-dark btn mr-1 mb-1 hvr-sweep-top"
                                  data-remodal-target="REGISTER">REGISTER</button>
                              <button class="btn-danger btn mr-1 mb-1 hvr-sweep-top"
                                  data-remodal-action="cancel">Cancel</button>
                          </div>
                          <?php endif; ?>


                      </div>
                  </div>
              </div>
              <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#about-us"
                      data-fancyscroll="data-fancyscroll" data-offset="64"><span
                          class="indicator-arrow indicator-arrow-one"
                          data-zanim-xs='{"from":{"opacity":0,"y":30},"to":{"opacity":1,"y":0},"ease":"Back.easeOut","duration":1,"delay":1.5}'></span></a>
              </div>
          </div>
      </section>

      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="pt-3 pt-lg-5 pb-6 pb-lg-8 text-center" id="about-us">

          <div class="container">
              <div class="row mb-4" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="col">
                      <div class="overflow-hidden">
                          <?php $temp = $this->db->get_where('content', array('content_type' => 'about_us'))->row(); ?>
                          <h2 class="fs-sm-5 mb-2" data-zanim-xs='{"duration":1.5,"delay":0}'>
                              <?=$temp->content_heading; ?></h2>
                      </div>
                      <div class="overflow-hidden">
                          <p class="text-uppercase fs--1 text-black ls-0 mb-0"
                              data-zanim-xs='{"duration":1.5,"delay":0.1}'>The best amongst you is the one who learns
                              the Qur'an and teaches it</p>
                      </div>
                      <div class="overflow-hidden">
                          <hr class="hr-short border-black" data-zanim-xs='{"duration":1.5,"delay":0.2}' />
                      </div>
                  </div>
              </div>
              <div class="row align-items-center">
                  <div class="col-md-4 text-md-right">
                      <h5 class="ls-1 mb-3">MUAAZ ALOSMAN</h5>
                      <p class="mb-0">Matric Number : 1614137
                          <br> Kulliyyah of Information and Communication Technology
                      </p>
                  </div>
                  <div class="col-md-4 px-lg-4 my-4 my-md-0"><i class="fas fa-book-reader fa-10x"></i></div>
                  <div class="col-md-4 text-md-left">
                      <h5 class="ls-1 mb-3">MOHAMMAD ALSLAMAT</h5>
                      <p class="mb-0">Matric Number : 1615103
                          <br> Kulliyyah of Information and Communication Technology
                      </p>
                  </div>
              </div>
              <div class="overflow-hidden">
                  <hr class="hr-short border-black" data-zanim-xs='{"duration":1.5,"delay":0.2}' />
              </div>
          </div>
          <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="text-center pb-0">

          <?php $courses = $this->db->order_by('course_id', 'DESC')->limit('4')->get('courses')->result(); ?>

          <div class="container-fluid">
              <div class="row justify-content-center" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                  <div class="col-12 mb-4">
                      <div class="overflow-hidden">
                          <h2 class="fs-md-5 mb-2" data-zanim-xs='{"duration":"1.5","delay":0}'>Courses</h2>
                      </div>
                      <div class="overflow-hidden">
                          <p class="fs--1 text-uppercase text-black ls-0 mb-0"
                              data-zanim-xs='{"duration":"1.5","delay":0.1}'>Latest Courses Added</p>
                      </div>
                      <div class="overflow-hidden">
                          <hr class="hr-short border-black" data-zanim-xs='{"duration":"1.5","delay":0.2}' />
                      </div>
                  </div>
              </div>
              <div class="sortable" data-options='{"layoutMode":"packery"}'>
                  <div class="row sortable-container sortable-container-gutter-fix hoverdir-grid"
                      data-zanim-timeline="{}" data-zanim-trigger="scroll">

                      <?php
                                if (isset($courses) AND !empty($courses)) {  $i = 1;
                                    foreach ($courses as $course) {
                                        if ($course->active == 1) {
                                        ?>

                      <div class="col-sm-6 col-lg-4 px-2 sortable-item mb-3"
                          data-zanim-xs='{"animation":"zoom-in","delay":0.1}'>

                          <div class="hoverdir-item position-relative rounded overflow-hidden"
                              data-zanim-xs='{"duration":1.5,"animation":"zoom-in","delay":0}'><a class="d-block"
                                  href="<?php echo base_url('index.php/course/course_summary/'.$course->course_id); ?>">

                                  <?php if (file_exists("course-images/$course->course_id.png")) { ?>

                                  <img class="img-fluid rounded"
                                      src="<?=base_url("course-images/$course->course_id.png"); ?>"
                                      alt="<?=$course->course_title;?>" />

                                  <?php }else{ ?>

                                  <img class="img-fluid rounded" src="<?=base_url('exam-images/placeholder.png'); ?>"
                                      alt="<?=$course->course_title;?>" />

                                  <?php } ?>

                                  <div class="hoverdir-item-content">
                                      <div class="h-100 d-flex flex-center p-3 hoverdir-text">
                                          <div class="text-700">
                                              <h3 class="text-white lh-1 fs-2"><?=$course->course_title;?></h3>
                                              <p class="ls-0 mb-0">
                                                  <?=$this->db->where('course_id', $course->course_id)->from('course_videos')->count_all_results(); ?>
                                                  lessons
                                                  <br><?php if ($course->course_price) {
                                                            echo '<p>'.$currency_symbol.$course->course_price.'</p>'; }else{  echo '<br><p> Free ' ;  } ?>
                                              </p>
                                          </div>
                                      </div>
                                  </div>
                              </a></div>
                      </div>

                      <?php $i++;
                                        }
                                    }
                                } else {
                                    echo '<p>We are sorry there is No course available Now.</p>';
                                }
                                ?>
                  </div>
              </div>
          </div>
          <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>

          <div class="container">
              <div class="row">
                  <div class="col mb-4 text-center" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                      <div class="overflow-hidden">
                          <h2 class="fs-md-5" data-zanim-xs='{"duration":"1.5","delay":0}'>how to use <img
                                  style="background: #000000;border-radius: 10px;" src="<?=base_url();?>logo.png"
                                  width="180px" height="55px"></h2>
                      </div>
                      <div class="overflow-hidden">
                          <p class="fs--1 text-uppercase text-black ls-0 mb-0"
                              data-zanim-xs='{"duration":"1.5","delay":0.1}'>"The best amongst you is the one who learns
                              the Qur'an and teaches it." </p>
                      </div>
                      <div class="overflow-hidden">
                          <hr class="hr-short border-black" data-zanim-xs='{"duration":"1.5","delay":0.2}' />
                      </div>
                  </div>
              </div>
              <div class="row justify-content-center">
                  <div class="col-lg-9 px-5">
                      <div class="media process-item border-dashed-left border-600 pb-5" data-zanim-timeline="{}"
                          data-zanim-trigger="scroll">
                          <div class="process-icon-circle"><i class="fas fa-home fa-lg"></i></div>
                          <div class="media-body ml-4 ml-sm-5">
                              <h5 class="ls-1"><span class="bg-white pr-3">analysis &amp; planning</span></h5>
                              <p class="mb-0"
                                  data-zanim-xs='{"from":{"opacity":0},"to":{"opacity":1},"duration":1,"delay":0.2}'>At
                                  first, we will analyze the product and planning then convert to a full specification
                                  document that explains exactly what we will deliver to you. This process will include
                                  the technical & functional requirements captured along with your branding and styling
                                  guidelines.</p>
                          </div>
                      </div>
                      <div class="media process-item border-dashed-left border-600 border-md-left-0 border-md-dashed-right pb-5"
                          data-zanim-timeline="{}" data-zanim-trigger="scroll">
                          <div class="media-body position-relative ml-4 ml-sm-5 ml-md-0 mr-md-5">
                              <h5 class="text-md-right"> <span class="bg-white pl-md-3">Design &amp;
                                      Development</span><span class="process-devider border-right-0 l-0"></span></h5>
                              <p class="mb-0 text-md-right"
                                  data-zanim-xs='{"from":{"opacity":0},"to":{"opacity":1},"duration":1,"delay":0.3}'>
                                  This is the main production phase where we build the functionalities of your product.
                                  Once created, your product must pass through our quality assurance phase before you
                                  are finally presented with the finished deliverable.</p>
                          </div>
                          <div class="process-icon-circle"><i class="fas fa-home fa-lg"></i></div>
                      </div>
                      <div class="media process-item border-dashed-left border-600 pb-5" data-zanim-timeline="{}"
                          data-zanim-trigger="scroll">
                          <div class="process-icon-circle"><i class="fas fa-home fa-lg"></i></div>
                          <div class="media-body position-relative ml-4 ml-sm-5"><span
                                  class="process-devider border-left-0 r-0"></span>
                              <h5 class="ls-1"> <span class="bg-white pr-3">Testing &amp; Fixing</span></h5>
                              <p class="mb-0"
                                  data-zanim-xs='{"from":{"opacity":0},"to":{"opacity":1},"duration":1,"delay":0.4}'>
                                  After building your product, we will review your product with our talented testing
                                  team. In these steps, we will test your product with different data set and
                                  conditions. Also, this phase is essential for fixing design and development issues.
                              </p>
                          </div>
                      </div>
                      <div class="media process-item" data-zanim-timeline="{}" data-zanim-trigger="scroll">
                          <div class="media-body position-relative ml-4 ml-sm-5 ml-md-0 mr-md-5">
                              <h5 class="text-md-right"> <span class="bg-white pl-md-3">LAUNCH &amp; GROW</span><span
                                      class="process-devider border-right-0 l-0"></span></h5>
                              <p class="mb-0 text-md-right"
                                  data-zanim-xs='{"from":{"opacity":0},"to":{"opacity":1},"duration":1,"delay":0.5}'>The
                                  final step is where we launch your product to the production server. Here we consider
                                  components such as cloud architecture, performance, and cybersecurity if that is
                                  within that scope of your project. At this point, you are officially live!</p>
                          </div>
                          <div class="process-icon-circle"><i class="fas fa-home fa-lg"></i></div>
                      </div>
                  </div>
              </div>
          </div>
          <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>

          <div class="container">
              <div class="row">

              </div>
          </div>
          <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->
