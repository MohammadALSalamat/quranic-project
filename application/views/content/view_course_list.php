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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'>courses Page</h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item active" aria-current="page">course</li>
                    </ol>
                  </nav>
                </div>
              </div>
            </div>
          </div>
          <div class="header-indicator-down"><a class="indicator indicator-down opacity-75" href="#all-courses" data-fancyscroll="data-fancyscroll" data-offset="64"><span class="indicator-arrow indicator-arrow-one" data-zanim-xs='{"from":{"opacity":0,"y":30},"to":{"opacity":1,"y":0},"ease":"Back.easeOut","duration":1,"delay":1.5}'></span></a></div>			
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
      <section class="text-center" id="all-courses">

        <div class="container px-3">
          <div class="row sortable" data-options='{"layoutMode":"packery"}'>
            <div class="col-12 mb-5" data-zanim-timeline="{}" data-zanim-trigger="scroll">
              <div class="overflow-hidden">
                <h3 class="font-weight-normal mb-1" data-zanim-xs='{"duration":1.5,"delay":0}'><?=isset($category_name)?$category_name:'This Is All Courses'; ?></h3>
              </div>
              <div class="overflow-hidden">
                <p class="mb-0 ls-0 text-uppercase" data-zanim-xs='{"duration":1.5,"delay":0.1}'>This is the list of courses inside our site</p>
              </div>
              <div class="overflow-hidden">
                <hr class="hr-short border-black" data-zanim-xs='{"duration":1.5,"delay":0.2}'>
              </div>
            </div>
            <div class="col-lg-10 order-1 order-lg-0">
              <div class="row sortable-container sortable-container-gutter-fix hoverdir-grid" data-zanim-timeline="{}" data-zanim-trigger="scroll">
				  
                        <?php
                        if (isset($courses) AND !empty($courses)) {  $i = 1;
                            foreach ($courses as $course) {
                                if ($course->active == 1) {
                                ?>
				  
                <div class="col-sm-6 px-2 sortable-item mb-3" data-zanim-xs='{"delay":0}'>
                  <div class="hoverdir-item position-relative rounded overflow-hidden" data-zanim-xs='{"duration":1.5,"animation":"zoom-in","delay":0}'>
					  
					  <a class="d-block" href="<?php echo base_url('index.php/course/course_summary/'.$course->course_id); ?>">
						  
                                                <?php if (file_exists("course-images/$course->course_id.png")) { ?>
                                                    <img class="img-fluid rounded" src="<?=base_url("course-images/$course->course_id.png"); ?>" alt="<?=$course->course_title;?>">
                                                <?php }else{ ?>
                                                    <img class="img-fluid rounded" src="<?=base_url('exam-images/placeholder.png'); ?>" alt="<?=$course->course_title;?>">
                                                <?php } ?>
						  
                      <div class="hoverdir-item-content">
                        <div class="h-100 d-flex flex-center p-3 hoverdir-text">
                          <div class="text-700">
                            <h2 class="text-white lh-1 fs-2"><?=$course->course_title;?><br></h2>
                            <p class="ls-0 mb-0"><?=$course->category_name.'/'.$course->sub_cat_name;?> <br><br> <?=$this->db->where('course_id', $course->course_id)->from('course_videos')->count_all_results(); ?> lessons inside it <br><br><br> <?php if ($course->course_price) {
                                                    echo '<button class="btn-outline-danger btn mr-1 mb-1" type="button">'.$currency_symbol.$course->course_price.'</button>';
                                                }else{
                                                    echo '<button class="btn-outline-success btn mr-1 mb-1" type="button">'.'free'.'</button>';
                                                } ?></p>
                          </div>
                        </div>
                      </div>
                    </a></div>
                </div>
				  
		  
				                                    <?php $i++;
                                }
                            }
                        } else {
                            echo '<h4>There is no course found!</h4>';
                        }
                        ?>  
              </div>
            </div>
			  
			  
			  
			 
            <div class="col-lg-2 order-0 order-lg-1">
              <div class="menu mb-3 flex-lg-column text-left justify-content-center sticky-kit" data-options='{"offset_top":85}'>
				  
				  <a class="btn-outline-dark btn" href="<?=base_url('index.php/course/#all-courses');?>" data-filter="*">all</a>
                    <?php if ($commercial) { ?>
				  <a class="btn-outline-danger btn" href="<?=base_url('index.php/course/courses_type/paid');?>" data-filter="*">Paid</a>
				  <a class="btn-outline-success btn" href="<?=base_url('index.php/course/courses_type/free');?>" data-filter="*">Free</a>
                    <?php } ?>
                            <?php
                            foreach ($categories as $value) {
                                $sub = $this->db->get_where('sub_categories', array('cat_id' => $value->category_id))->result();
                                if(!empty($sub)){ ?>
				  
				 <div class="dropdown">
  <button class="btn-outline-dark btn btn-block" id="dropdownMenuButton" type="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><?=$value->category_name; ?></button>
  <div class="dropdown-menu dropdown-menu-center py-0 text-center" aria-labelledby="dropdownMenuButton">
                                           <?php foreach ($sub as $sub_cat) { ?>
    <a class="dropdown-item" href="<?=base_url('index.php/course/view_course_by_category/'.$sub_cat->id); ?>"  data-filter=".<?=$sub_cat->sub_cat_name; ?>"><?=$sub_cat->sub_cat_name; ?></a>

                                            <?php } ?>	  

  </div>
</div>
				  
	
				                                <?php }else{ ?>
                                    <!-- <li><a href="#"><?=$value->category_name; ?></a></li> -->
                            <?php
                                }
                            } ?>
				</div>
			</div>
          </div>
        </div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->

