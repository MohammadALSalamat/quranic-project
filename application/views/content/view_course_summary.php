<?php 
if ($this->session->userdata('Time_zone')) {
    date_default_timezone_set ($this->session->userdata('Time_zone'));
}

$user_info = $this->db->get_where('users', array('user_id' => $this->session->userdata('user_id')))->row();?>
<?php $purchased = $this->db->where('user_id', $this->session->userdata('user_id'))->where('pur_ref_id', $course->course_id)->get('puchase_history')->row();?>

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
                <h1 class="display-3 text-white font-weight-extra-light ls-1" data-zanim-xs='{"duration":2,"delay":0}'><?=$course->course_title?></h1>
              </div>
              <div class="overflow-hidden">
                <div class="d-flex justify-content-center" data-zanim-xs='{"duration":2,"delay":0.1}'>
                  <nav aria-label="breadcrumb">
                    <ol class="breadcrumb text-uppercase ls-1">
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php');?>">Home</a></li>
                      <li class="breadcrumb-item"><a class="text-400 hover-color-white" href="<?=base_url('index.php/course');?>">course</a></li>
                      <li class="breadcrumb-item active" aria-current="page"><?=$course->course_title?></li>
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



      <!-- ============================================-->
      <!-- <section> begin ============================-->
      <section>

        <div class="container">
          <div class="row">
			  
                <div class="col-xs-10 col-xs-offset-1">
                    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
                    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
                    <?=(isset($message)) ? $message : ''; ?>
                </div>
			  
			  
            <div class="col-12">
              <div class="owl-carousel owl-carousel-theme owl-theme owl-dots-inner owl-theme-white mb-4" data-options='{"margin":0,"nav":true,"autoplay":true,"loop":true,"dots":true,"items":1,"autoplaySpeed":800,"smartSpeed":600,"responsive":{"0":{"nav":false},"992":{"nav":true}}}'>
				  <?php if (file_exists("course-images/$course->course_id.png")) { ?>
                        <img class="rounded" src="<?=base_url("course-images/$course->course_id.png"); ?>" alt="<?=$course->course_title?>">
                    <?php }else{ ?>
                        <img class="rounded" src="<?=base_url('course-images/placeholder.png'); ?>" alt="<?=$course->course_title?>">
                    <?php } ?>
				  </div>
            </div>
            <div class="col-lg pr-lg-5 mb-4 mb-lg-0">
              <h3 class="font-weight-normal text-base"><i class="fas fa-book"></i>  <?=$course->course_title?></h3>
				<p><b>intro : </b></p>
              <p><?=$course->course_intro; ?></p>
				<p><b>description : </b></p>
				<p><?=$course->course_description; ?></p>
				<hr>
				                    
                        <p class="mb-2 fs-0 text-transform-none text-base lh-0 font-weight-medium text-900">Course requirement</p>
                        <p><?=$course->course_requirement; ?></p>
				<br>
                        <p class="mb-2 fs-0 text-transform-none text-base lh-0 font-weight-medium text-900">What am I going to get from this course?</p>
                        <p><?=$course->what_i_get; ?></p>
				<br>
                        <p class="mb-2 fs-0 text-transform-none text-base lh-0 font-weight-medium text-900">What is the target audience?</p>
                        <p><?=$course->target_audience; ?></p>
                    
              <div class="vertical-line"></div>
            </div>
            <div class="col-lg-auto pl-lg-5">
              <h5 class="font-weight-normal mb-1">Informations</h5>
              <table class="table table-borderless mb-0">
                <tr>
                  <td class="py-1 pl-0 text-dark"><i class="fas fa-th-list"></i>  category :</td>
                  <td class="py-1 text-600"><?=$course->category_name.' / '.$course->sub_cat_name; ?></td>
                </tr>
                <tr>
                  <td class="py-1 pl-0 text-dark"><i class="fas fa-chalkboard-teacher"></i>  Instructor : </td>
                  <td class="py-1 text-600"><?=$course->user_name?></td>
                </tr>
                <tr>
                  <td class="py-1 pl-0 text-dark"><i class="far fa-bookmark"></i>  title :</td>
                  <td class="py-1 text-600"><?=$course->course_title?></td>
                </tr>
                <tr>
                  <td class="py-1 pl-0 text-dark"><i class="fas fa-money-check-alt"></i>  course price :</td>
                  <td class="py-1 text-600"><?php if ($course->course_price) {
                                    echo $currency_symbol.$course->course_price;                     
                                }else{
                                    echo "Free";
                                } ?></td>
                </tr>
                <tr>
                  <td class="py-1 pl-0 text-dark"><i class="far fa-share-square"></i>  share :</td>
                  <td class="py-1 text-600"><div class="fb-share-button" 
                        data-href="<?=base_url('index.php/course/course_summary/'.$course->course_id)?>" 
                        data-layout="button_count" data-size="large" >
                    </div></td>
                </tr>
              </table>
				
				                           <?php 
                            if ($this->session->userdata('log')) { 
                                if ($course->course_price && (!$user_info->subscription_id && ($user_info->subscription_end < now()))){
                            ?>
				<div class="col-12">
<hr>
                                <a href="<?=base_url('index.php/course/enroll/'.$course->course_id) ?>" class="btn btn-success">Pay with PayPal</a> 
										</div>
				<hr>
                            <?php
                                }
                            }else{
                            ?>
								<div class="col-12">
<hr>
                                <a href="<?=base_url('index.php/course/enroll/'.$course->course_id);?>" class="btn btn-primary"> Enroll Now </a>
										</div>
				<hr>
                            <?php 
                            } ?>

            </div>
          </div>
          <div class="row">
            <div class="col-12">
              <hr class="mt-5 mb-4">
              <h4 class="font-weight-normal mb-3" align="center">LESSONS</h4>
            </div>            
			  
			  
                          <?php $i = 1; 
                            $sections = $this->db->get_where('course_sections', array('course_id'=>$course->course_id))->result();
                            foreach ($sections as $value) { $j = 1;  ?>
                        <div class="col-12">
                        <hr class="mt-3 mb-2">
                          <h4 class="font-weight-normal mb-3"><b> <?=$value->section_name?> : </b> <?=' '.$value->section_title;?> </h4>
                        </div>                            
			                <?php 
                                $videos = $this->db->where('section_id', $value->section_id)->order_by('orderList', 'asc')
                                    ->get('course_videos')
                                    ->result();
                                if ($videos) {
                                foreach ($videos as $video) { 
                                    $date = @date_create($video->created_at);
                            ?>			  
			  
                                                  <?php 
                                                    if (
                                                        ($video->preview_type == 'free') || 
                                                        (!$course->course_price) || 
                                                        $purchased || 
                                                        (
                                                            ($this->session->userdata('log')) && 
                                                            ($user_info->subscription_id) && 
                                                            ($user_info->subscription_end > now())
                                                        )
                                                        ) 
                                                    { 
                                                        if($video->content_type == 'external_link')
                                                        { ?>
			  
			 <div class="col-sm-10 col-lg-4 mb-4 mb-lg-0">
              <div class="card border border-light h-100">
				  <p class="mb-0 text-600" align="center">LESSON : <?=$i.' of '.$j;?></p>
              <div class="rounded overflow-hidden">
				  <div class="mt-2 mb-3" align="center"> <i class="card-img-top fas fa-unlink fa-10x"></i> </div>
                </div>
                <div class="card-body bg-light">
                  <h4 class="card-title mb-2 fs-0 text-transform-none text-base lh-0 font-weight-medium text-900" align="center"><a href="<?=$video->youtube_link; ?>" target="_blank"><?=$video->video_title; ?></a></h4>
                  
                  <p class="mb-0 text-700"> <?='Type: ';?> <?php $splits = explode('.', $video->video_link);?> <?=end($splits)?:str_replace('_', ' ', $video->content_type); ?> <?=' , Added: '.date_format($date, 'M d, Y' ); ?>,<i class="fas fa-money-check-alt"></i>  <?php if (($video->preview_type == 'free') || ($video->preview_type == 'Free') || !$course->course_price) { ?>  Free <?php } ?> </p>
                </div>
              </div>
				 </div>			  
                  

                                                        <?php }else if($video->content_type == 'youtube'){ ?>
			  
			 <div class="col-sm-10 col-lg-4 mb-4 mb-lg-0">
              <div class="card border border-light h-90">
				  <p class="mb-0 text-600" align="center">LESSON : <?=$i.' of '.$j;?></p>
              <div class="rounded overflow-hidden">
           <div class="player" data-plyr-provider="youtube" data-plyr-embed-id="<?=$video->youtube_link; ?>"></div>
                </div>
                <div class="card-body bg-light">
                  <h4 class="card-title mb-2 fs-0 text-transform-none text-base lh-0 font-weight-medium text-900" align="center"><?=$video->video_title; ?></h4>
                  
                  <p class="mb-0 text-700"> <?='Type: ';?> <?php $splits = explode('.', $video->video_link);?> <?=end($splits)?:str_replace('_', ' ', $video->content_type); ?> <?=' , Added: '.date_format($date, 'M d, Y' ); ?>, <?php if (($video->preview_type == 'free') || ($video->preview_type == 'Free') || !$course->course_price) { ?> <i class="fas fa-money-check-alt"></i>   Free <?php } ?> </p>
                </div>
              </div>
				 </div>
                                                           <?php }else if($video->content_type == 'file')
                                                            { 
                                                            ?>

			 <div class="col-sm-10 col-lg-4 mb-4 mb-lg-0">
              <div class="card border border-light h-90">
				  <p class="mb-0 text-600" align="center">LESSON : <?=$i.' of '.$j;?></p>
              <div class="rounded overflow-hidden">
           <div class="mt-2 mb-3" align="center"> <i class="fas fa-file-download fa-10x"></i> </div>
                </div>
                <div class="card-body bg-light">
                  <h4 class="card-title mb-2 fs-0 text-transform-none text-base lh-0 font-weight-medium text-900" align="center"><a href="<?=base_url('course_videos/'.$video->course_id.'/'.$video->video_link); ?>" download><?=$video->video_title; ?></a></h4>
                  
                  <p class="mb-0 text-700"> <?='Type: ';?> <?php $splits = explode('.', $video->video_link);?> <?=end($splits)?:str_replace('_', ' ', $video->content_type); ?> <?=' , Added: '.date_format($date, 'M d, Y' ); ?>, <?php if (($video->preview_type == 'free') || ($video->preview_type == 'Free') || !$course->course_price) { ?> <i class="fas fa-money-check-alt"></i>   Free <?php } ?>,Size: <?=number_format($video->file_size/1000000, 2) .'MB';?></p>
                </div>
              </div>
				 </div>
                                                        <?php }else{ ?>
			  
			 <div class="col-sm-10 col-lg-4 mb-4 mb-lg-0">
              <div class="card border border-light h-90">
				  <p class="mb-0 text-600" align="center">LESSON : <?=$i.' of '.$j;?></p>
              <div class="rounded overflow-hidden">
                <video controls>
                 <source src="<?=base_url('course_videos/'.$video->course_id.'/'.$video->video_link); ?>" type="video/mp4">
                   </video>
                </div>
                <div class="card-body bg-light">
                  <h4 class="card-title mb-2 fs-0 text-transform-none text-base lh-0 font-weight-medium text-900" align="center"><?=$video->video_title; ?></h4>
                  
                  <p class="mb-0 text-700"> <?='Type: ';?> <?php $splits = explode('.', $video->video_link);?> <?=end($splits)?:str_replace('_', ' ', $video->content_type); ?> <?=' , Added: '.date_format($date, 'M d, Y' ); ?>, <?php if (($video->preview_type == 'free') || ($video->preview_type == 'Free') || !$course->course_price) { ?> <i class="fas fa-money-check-alt"></i>   Free <?php } ?></p>
                </div>
              </div>
				 </div>			  


                                                        <?php } ?>

                                                    <?php 
                                                    }else{ ?>
                                                            <i class="glyphicon glyphicon-expand"></i>
                                                            <?=$video->video_title; ?>

                                                            <span class="help-block small"><?='Type: ';?> <?php $splits = explode('.', $video->video_link);?> <?=end($splits)?:str_replace('_', ' ', $video->content_type); ?> <?=' | Added: '.date_format($date, 'M d, Y' ); ?> </span>
                                                    <?php } ?>				 
            
			  
			                               <?php $j++; }
                             $i++; 
                             }else{ ?>
			  
			  <div class="col-sm-12 col-lg-12" align="center">
			  <p>** sorry there is <b>NO</b> video added yet **</p>
				  </div>
                               
                            <?php }
                            }
                            $exams = $this->db->where('course_id',$course->course_id)->get('exam_title')->result();
                            if ($exams) { $k = 1; ?>

          </div>
			
          <div class="row">
            <div class="col-12">
              <hr class="mt-4 mb-4">
              <h4 class="font-weight-normal mb-3" align="center">Associated Exams</h4>
			 <hr class="mt-4 mb-4">
            </div> 
<div class="card-deck col-12">
	
	    <?php 
        foreach ($exams as $exam) { ?>
	
<div class="col-sm-6 col-lg-3 mb-5 mb-lg-3">
	<div class="card">
    <div class="card-img-top mt-2 mb-2" align="center">
		<p>Exam No. <?=$k;?></p>
		<i class="card-img-top far fa-question-circle fa-5x"></i>
	  </div>
	  
    <div class="card-body">
		
		<?php if ($exam->public || $purchased || (($this->session->userdata('log')) && ($user_info->subscription_id) && ($user_info->subscription_end > now()))) { ?>
		
      <h5 class="card-title" align="center"><?=$exam->title_name; ?></h5>
		
      <div class="card-text" align="center">
		  
		  
<!-- Button trigger modal -->
<button type="button" class="btn btn-primary" data-toggle="modal" data-target="#START<?=$k;?>">START</button>

<!-- Modal -->
<div class="modal fade" id="START<?=$k;?>" tabindex="-1" role="dialog" aria-labelledby="START<?=$k;?>" aria-hidden="true">
  <div class="modal-dialog modal-dialog-centered" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="START<?=$k;?>"><?=$exam->title_name; ?></h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
		  <p class="py-1 pl-0 text-dark">You'll start this exam</p>
		  <h3><b><?=$exam->title_name; ?></b></h3>
		  <h5 class="py-1 pl-0 text-dark"> NO. <b>.. <?=$k;?> ..</b> In this course</h5>	
		</div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
       <a href="<?=base_url('index.php/exam_control/view_exam_summery/'.$exam->title_id)?>"><button type="button" class="btn btn-primary">visit exam page<?php }else{ 
        echo $exam->title_name;
        } ?></button></a>
      </div>
    </div>
  </div>
</div>		  

		
		</div>
		
       <?php if ($exam->exam_price == 0) { ?>  
		<p class="card-text" align="center"><small class="text-muted">Free</small></p>
		<?php }else{ ?>
			<p class="card-text" align="center"><small class="text-muted">You need to pay it</small></p>
		<?} ?>
				
		
    </div>
	  
  </div>
	</div>
	
                          <?php $k++; 
                                }
                            } ?>	
</div>
			  
			  
			  
			</div> 
			
			
			
			
			
			
			
          <div class="row">
            <div class="col-12">
              <hr class="mt-6 mb-4">
              <h4 class="font-weight-normal mb-3" align="center">Related courses</h4>
							  <hr>
            </div> 
 <div class="card-group col-12">
	                       <?php 
                            $related_courses = $this->db->get_where('courses', array('category_id'=>$course->id))->result();
                            foreach ($related_courses as $value) { 
                                if ($value->course_id != $course->course_id) { ?>
	 
	 <div class="col-sm-6 col-lg-3 mb-5 mb-lg-3">
  <div class="card">
    <div class="card-img-top">
		
<?php if (file_exists("course-images/$value->course_id.png")) { ?>
	  <div class="card-img-top"><img class="img-fluid" src="<?=base_url("course-images/$value->course_id.png"); ?>" alt="<?=$value->course_title;?>"/></div>
      <?php }else{ ?>
	   <div class="card-img-top"><img class="img-fluid" src="<?=base_url('course-images/placeholder.png'); ?>" alt="<?=$value->course_title;?>"/></div>
       <?php } ?>
		
	  </div>
    <div class="card-body">
      <h5 class="card-title" align="center"><?=$value->course_title;?></h5>
      <p class="card-text" align="center"><a class="btn btn-outline-dark btn-sm hvr-sweep-top mt-2" href="<?=base_url('index.php/course/course_summary/'.$value->course_id); ?>">Visit course</a></p>
    </div>
  </div>
	 </div>
	 <?php   }
                            } ?>
	 

</div>
			
			</div> 
			
			
			</div>
        <!-- end of .container-->

      </section>
      <!-- <section> close ============================-->
      <!-- ============================================-->














<section id="exam_summery">
    <div class="container">
        <div class="box">
            <div class="row">


                    <!--
                    <p>
                        <img src="<?=base_url('course-images/CPkGq6G.png')?>"/>
                        <img src="<?=base_url('course-images/CPkGq6G.png')?>"/>
                        <img src="<?=base_url('course-images/CPkGq6G.png')?>"/>
                        <img src="<?=base_url('course-images/CPkGq6G.png')?>"/>
                        <img src="<?=base_url('course-images/CPkGq6G.png')?>"/>
                        <?=$course->course_count_reviews;?> Reviews
                    </p><hr/>
                    -->

                    


					
					
				
				
				
				
                                <li= class="chap-title"><b>  </b></li>

                        </ul>
                            

                </div>
                <div class="col-md-2">
                    <div class="pb-t">
                        <div class="pb-p">
                            <span class="pb-pr ">
                                
                            </span>
                        </div> 
                        <div class="pb-ta">

                            


                        </div>
                    </div>

                    <div class="big-gap"></div>
                    
                    

                    <div style="background-color: #eee;">

                </div>

            </div>
        </div> 
    </div>
</section><!--/#pricing-->

<div class="modal fade" id="videoModal" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true" >
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header" style="padding-bottom: 5px;">
                <button type="button" id="modalClose" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
                <h4  class="modal-title" id="myModalLabel">
                    <span id="modalVideotitle"></span>
                </h4>
            </div>
            <div class="modal-body " style="padding: 0px;">
                <div class="embed-responsive embed-responsive-16by9">
                    <video class="videoPlayer embed-responsive-item" height="" controls autoplay src="" type="video/x-flv"/></video>
                </div>
            </div>
            <br/>
            <?php if(false){?>
            <div class="" style=" text-align: center;">
            <div class="btn-group" role="group">
                <button type="button" id="prevSec" class="btn btn-default"> <i class="glyphicon glyphicon-fast-backward"  data-toggle="tooltip" data-placement="top" title="Previous Section "></i> </button>
                <button type="button" id="prevVideo" class="btn btn-default"> <i class="glyphicon glyphicon-step-backward"  data-toggle="tooltip" data-placement="top" title="Previous Video "></i> </button>
                <button type="button" id="nextVideo" class="btn btn-default"> <i class="glyphicon glyphicon-step-forward"  data-toggle="tooltip" data-placement="top" title="Next Video "></i> </button>
                <button type="button" id="nextSec" class="btn btn-default"> <i class="glyphicon glyphicon-fast-forward"  data-toggle="tooltip" data-placement="top" title="Next Section "></i> </button>
            </div>
            </div>
            <?php } ?>
            <br/>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(function() {
        $(this).bind("contextmenu", function(e) {
            e.preventDefault();
        });
    });    
</script>