<!DOCTYPE html>
<html>
    <head>
		
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <title><?=$brand_name?></title>
	<meta name="description" content="qurani Dashboard page">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="author" content="qurani">
        
        <!--Header-->
        <?php echo $header; ?>
        <!--Page Specific Header-->
        <?php if (isset($extra_head)) echo $extra_head; ?>
    </head>
    <body>
		
		
                    <!--Sidebar-->
                    <?php echo (isset($sidebar)) ? $sidebar : ''; ?>		

   <!-- Right Panel -->

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <header id="header" class="header">

            <div class="header-menu">

                <div class="col-sm-7">
                    <a id="menuToggle" class="menutoggle pull-left"><i class="fa fa fa-tasks"></i></a>
                    <div class="header-left">
						
                      <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
					
					<?  $unread_messages = $this->db->where('message_read', 0)->from('messages')->count_all_results(); 
					    $unread_messages = $this->db->where('message_read', 0)->from('messages')->count_all_results();
   					    $total_exams = $this->db->select('*')->from('exam_title')->count_all_results();
      				    $total_courses = $this->db->select('*')->from('courses')->count_all_results();
      				    $total_students = $this->db->where('user_role_id',5)->from('users')->count_all_results();
					?>						
						
						
						
                        <button class="search-trigger"><i class="fa fa-search"></i></button>
                        <div class="form-inline">
                            <form class="search-form">
                                <input class="form-control mr-sm-2" type="text" placeholder="Search ...(soon)" aria-label="Search">
                                <button class="search-close" type="submit"><i class="fa fa-close"></i></button>
                            </form>
                        </div>

						
                        <div class="dropdown for-Students">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="Students" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-users"></i>
                                <span class="count bg-danger"><?= $total_students; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="Students">
                                <a class="dropdown-item media" href="<?= base_url('index.php/user_control'); ?>">
                                <p class="red">There is <?= $total_students; ?> students</p>
                            </a>
                            </div>
                        </div>


                        <div class="dropdown for-message">
                            <button class="btn btn-secondary dropdown-toggle" type="button"
                                id="message"
                                data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="ti-email"></i>
                                <span class="count bg-primary"><?= $unread_messages; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="message">
								<a href="<?= base_url('index.php/message_control'); ?>">
                                <p class="red">You have <?= $unread_messages; ?> Mails unread</p>
									</a>
                            </div>
                        </div>
						
						
						
                        <div class="dropdown for-courses">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="courses" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-book"></i>
                                <span class="count bg-info"><?= $total_courses; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="courses">
                                <a class="dropdown-item media" href="<?= base_url('index.php/exam_control/view_results'); ?>">
                                <p class="red">There is <?= $total_courses; ?> courses</p>
                            </a>
                            </div>
                        </div>
						
						
						
                        <div class="dropdown for-Exams">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="Exams" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                <i class="fa fa-bullseye"></i>
                                <span class="count bg-dark"><?= $total_exams; ?></span>
                            </button>
                            <div class="dropdown-menu" aria-labelledby="Exams">
                                <a class="dropdown-item media" href="<?= base_url('index.php/mocks'); ?>">
                                <p class="red">There is <?= $total_exams; ?> Exams</p>
                            </a>
                            </div>
                        </div>
						<?php }?>
	
                    </div>
                </div>


				
<?php echo (isset($top_navi)) ? $top_navi : ''; ?>				
            </div>

        </header><!-- /header -->
        <!-- Header-->

        <div class="content mt-3">
<!-- if you need
            <div class="col-sm-12">
				<?=validation_errors('<div class="alert alert-danger alert-dismissible fade show" role="alert">', '</div>'); ?>
                <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
                <?=(isset($message)) ? $message : ''; ?>
            </div>		
		-->
		
            <div class="col-sm-12 col-lg-12">
                <!--Content-->
                <?php echo (isset($content)) ? $content : ''; ?>
            </div><!-- /#page-wrapper -->
            <hr/>
            </div>
		
		
		
		
		<div id="wrapper">

            <div id="page-wrapper">
                <div class="note">
                <?php if ($commercial) {
                    if(!$this->db->where('id',1)->get('paypal_settings')->row()->api_username){ ?>
                    <div class="alert alert-danger">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
                        Please setup the PayPal API from system setting.
                    </div>
                <?php }
                    if(!$this->db->get('price_table')->result()){ ?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
                        Please create an offer for membership.
                    </div>
                <?php }
                } ?>
                <?php if(!$this->db->get('categories')->result()){?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
                        Please create categories and sub-categories before create exams or courses.
                    </div>
                <?php }else if (!$this->db->get('sub_categories')->result()) { ?>
                    <div class="alert alert-info">
                        <button type="button" class="close" data-dismiss="alert" aria-hidden="TRUE">&times;</button>
                        Please create sub-categories before create exams or courses.
                    </div>
                <?php } ?>
                </div>
				
				


			
			
            
            <!-- Modal Start -->
            <?php if (isset($modal)) echo $modal; ?>

            <!--Footer-->
            <?php echo $footer; ?>
       </div><!-- /#wrapper -->
       
        <!--Page Specific Footer-->
       <?php if (isset($extra_footer)) echo $extra_footer; ?>
    </body>
</html>