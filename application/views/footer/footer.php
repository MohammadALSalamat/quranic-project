      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section class="bg-1100 py-6 px-3 px-lg-0">

        <div class="container">
          <div class="row">
            <div class="col-lg-4 pr-lg-4 mb-4 mb-lg-0">
        <?php $temp = $this->db->get_where('content', array('content_type' => 'about_us'))->row(); ?>
              <h5 class="text-white mb-3"><?=$temp->content_heading; ?></h5>
              <p class="text-700"><?=$temp->content_data; ?></p>
              <ul class="list-inline mb-0">
                                <?php if ($facbook_url): ?>
                                    <li class="list-inline-item mr-0"><a class="text-900 hover-color-white px-2" href="<?= $facbook_url; ?>"><span class="fab fa-facebook-f"></span></a></li>
                                <?php endif; ?>
                                <?php if ($googleplus_url): ?>
                                    <li class="list-inline-item mr-0"><a class="text-900 hover-color-white px-2" href="<?= $googleplus_url; ?>"><span class="fab fa-google-plus-g"></span></a></li>
                                <?php endif; ?>
                                <?php if ($linkedin_url): ?>
                                    <li class="list-inline-item mr-0"><a class="text-900 hover-color-white px-2" href="<?= $linkedin_url; ?>"><span class="fab fa-linkedin-in"></span></a></li>
                                <?php endif; ?>
                                <?php if ($twitter_url): ?>
				                    <li class="list-inline-item mr-0"><a class="text-900 hover-color-white px-2" href="<?= $twitter_url; ?>"><span class="fab fa-twitter"></span></a></li>
                                <?php endif; ?>
                                <?php if ($you_tube_url): ?>
				                    <li class="list-inline-item mr-0"><a class="text-900 hover-color-white px-2" href="<?= $you_tube_url; ?>"><span class="fab fa-youtube"></span></a></li>
                                <?php endif; ?>
                                <?php if ($pinterest_url): ?>
				                   <li class="list-inline-item mr-0"><a class="text-900 hover-color-white px-2" href="<?= $pinterest_url; ?>"><span class="fab fa-pinterest"></span></a></li>
                                <?php endif; ?>
                                <?php if ($flickr_url): ?>
				                    <li class="list-inline-item mr-0"><a class="text-900 hover-color-white px-2" href="<?= $flickr_url; ?>"><span class="fab fa-flickr"></span></a></li>
                                <?php endif; ?>                
				  
                
                
              </ul>
            </div>
            <div class="col-lg-8">
              <div class="row">
                <div class="col-6 col-md-3 pl-lg-4 mb-4 mb-lg-0">
					<?php if ($this->session->userdata('log')) { ?>
                  <h5 class="text-white mb-3">other pages</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="mb-1"><a class="text-700 hover-color-white" href="<?=base_url();?><?=($this->session->userdata('log'))?'index.php/dashboard/'.$this->session->userdata('user_id'):''?>"><span class="text-700 hover-color-white"><i class="fas fa-users-cog fa-lg"></i></span></a></li>
                    <li class="mb-1 <?=($this->uri->segment(1) == 'course')?'active':''; ?>"><a class="text-700 hover-color-white" href="<?=base_url('index.php/course');?>"><span class="text-700 hover-color-white">Courses</span></a></li>
                    <li class="mb-1 <?=($this->uri->segment(1) == 'exam_control')?'active':''; ?>"><a class="text-700 hover-color-white" href="<?=base_url('index.php/exam_control/view_all_mocks');?>"><span class="text-700 hover-color-white">Exams</span></a></li>

                  </ul>
					<?php } ?>
                </div>
                <div class="col-6 col-md-3 pl-4 mb-4 mb-lg-0">
                  <h5 class="text-white mb-3">Pages</h5>
                  <ul class="list-unstyled mb-0">
                    <li class="mb-1"><a class="text-700 hover-color-white <?=($this->uri->segment(1) == 'blog')?'active':''; ?>" href="<?=base_url('index.php/blog');?>">blog</a></li>
					  <?php if ($this->session->userdata('log')) { ?>
                    <li class="mb-1"><a class="text-700 hover-color-white <?=($this->uri->segment(1) == 'noticeboard')?'active':''; ?>" href="<?=base_url('index.php/noticeboard/notices');?>">noticeboard</a></li>
					  <?php } ?>
                    <li class="mb-1"><a class="text-700 hover-color-white <?=($this->uri->segment(2) == 'pricing')?'active':''; ?>" href="<?=base_url('index.php/guest/pricing');?>">pricing</a></li>
                    <li class="mb-1"><a class="text-700 hover-color-white <?=($this->uri->segment(2) == 'view_faqs')?'active':''; ?>" href="<?=base_url('index.php/guest/view_faqs');?>">FAQ</a></li>
                    <li class="mb-1"><a class="text-700 hover-color-white <?=($this->uri->segment(1) == 'view_faqs')?'active':''; ?>" href="<?=base_url('index.php/guest/what_we_use');?>">what we use</a></li>
                  </ul>
                </div>
                <div class="col-md-6 pl-md-4">
					<h5 class="text-white mb-3">contact with admin</h5>
<?php 
    if ($this->session->userdata('time_zone')) date_default_timezone_set($this->session->userdata('time_zone')); 
    else if( ! ini_get('date.timezone') ) date_default_timezone_set('GMT');

	if (!isset($no_contact_form)) 
	{
    	include 'application/views/contact_form.php';
	} 
?>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->


    </main>
    <!-- ===============================================-->
    <!--    End of Main Content-->
    <!-- ===============================================-->




    <!--===============================================-->
    <!--    Footer-->
    <!--===============================================-->


    <!-- ============================================-->
    <!-- <section> begin ============================-->
<section class="text-center bg-black py-3">
      <div class="container">
        <div class="row justify-content-between">
          <div class="col-12 col-md-auto mb-1 mb-md-0">
            <p class="mb-0">qurani dev .<span class="mx-2">|</span><span class="text-900 hover-color-white">
                M. M.</span></p>
          </div>
          <div class="col-12 col-md-auto">
            <p class="mb-0"> &copy; <?=$brand_name.', '. date('Y')?></a></p>
          </div>
        </div>
      </div>
      <!-- end of .container-->

    </section>
    <!-- <section> close ============================-->
    <!-- ============================================-->

    <a class="btn-back-to-top" href="#top" data-fancyscroll><img src="<?php echo base_url(); ?>assets/img/line-icons/upload-arrow.svg" width="8" alt=""></a>


    <!-- ===============================================-->
    <!--    JavaScripts-->
    <!-- ===============================================-->
    <script src="<?php echo base_url(); ?>assets/js/jquery.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/popper.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/bootstrap.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/plugins.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/stickyfill.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/@fortawesome/all.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/rellax.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/progressbar.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/isotope-layout/isotope.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/isotope-packery/packery-mode.pkgd.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/owl.carousel/owl.carousel.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/remodal/remodal.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/hover-dir/jquery.hoverdir.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/typed.js/typed.js"></script>
    <script src="<?php echo base_url(); ?>assets/js/theme.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/plyr/plyr.polyfilled.min.js"></script>
    <script src="<?php echo base_url(); ?>assets/lib/Gridder/jquery.gridder.min.js"></script>
    <script src="<?php echo base_url(); ?>alert/alertify.min.js"></script>
    <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyARdVcREeBK44lIWnv5-iPijKqvlSAVwbw&callback=initMap" async></script>