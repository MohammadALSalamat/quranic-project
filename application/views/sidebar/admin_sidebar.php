<!-- \ css class control -->
<?php
if (isset($class)) {
    $active = floor($class/10); //The numeric value to round
}
?>
<!-- \ Sidebar -->

    <!-- Left Panel -->

    <aside id="left-panel" class="left-panel">
        <nav class="navbar navbar-expand-sm navbar-default">

            <div class="navbar-header">
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#main-menu" aria-controls="main-menu" aria-expanded="false" aria-label="Toggle navigation">
                    <i class="fa fa-bars"></i>
                </button>
                <a class="navbar-brand" href="<?php echo base_url('index.php'); ?>">
					<?php if (file_exists('./logo.png')) { ?>
                            <img src="<?=base_url();?>logo.png" width="150px" height="35px">
                        <?php }else{
                            echo ($brand_name)?$brand_name:'qurani';
                        } ?></a>
                <a class="navbar-brand hidden" href="<?php echo base_url('index.php'); ?>"><i class="menu-icon fa fa-home"></i></a>
            </div>

            <div id="main-menu" class="main-menu collapse navbar-collapse">
                <ul class="nav navbar-nav">
                    <li class="active">
                        <a href="<?=base_url('index.php/dashboard/'.$this->session->userdata('user_id')); ?>"> <i class="menu-icon fa fa-dashboard"></i>Dashboard </a>
                    </li>
					
					    <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
					
                    <h3 class="menu-title">Users</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle <?=($active==1)?"active":'';?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon ti-user"> </i> User Control</a>
                        <ul class="sub-menu children dropdown-menu">
							
                            <li><i class="menu-icon fa fa-users"></i><a href="<?=base_url('index.php/user_control');?>" class="<?=($class==11)?"current":'';?>">View Users</a></li>
                            <li><i class="menu-icon fa fa-user-plus"></i><a href="<?=base_url('index.php/user_control/add_user');?>" class="<?=($class==12)?"current":'';?>">Add New User</a></li>
                            <li><i class="menu-icon fa fa-user"></i><a href="<?=base_url('index.php/user_control/view_banned_users');?>" class="<?=($class==13)?"current":'';?>">Banned / Inactive Users</a></li>
                            
                        </ul>
                    </li>

     <?php } ?>
					
					    <?php if ($this->session->userdata['user_role_id'] <= 4) { ?>

                    <h3 class="menu-title">Courses</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle <?=($active==9)?"active":'';?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-book"></i> Course Control</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-book"></i><a href="<?=base_url('index.php/course/view_all_courses');?>" class="<?=($class==91)?"current":'';?>">View Courses</a></li>
                            <li><i class="menu-icon fa fa-book"></i><a href="<?=base_url('index.php/course/create_course');?>" class="<?=($class==92)?"current":'';?>">Create Course</a></li>
                        </ul>
                    </li>
		<?php } ?>			
					
					
					    <?php if ($this->session->userdata['user_role_id'] <= 4) { ?>
					
                    <h3 class="menu-title">Exams</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle <?=($active==2)?"active":'';?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-bullseye"></i> Exam Control</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-bullseye"></i><a href="<?=base_url('index.php/mocks');?>" class="<?=($class==21)?"current":'';?>">View Exams</a></li>
                            <li><i class="menu-icon fa fa-bullseye"></i><a href="<?=base_url('index.php/admin_control/create_exam');?>" class="<?=($class==22)?"current":'';?>">Create Exam</a></li>
							<li><i class="menu-icon fa fa-bullseye"></i><a href="<?=base_url('index.php/exam_control/view_results');?>" class="<?=($class==25)?"current":'';?>">View Results</a></li>
                        </ul>
                    </li>
					   <?php } else { ?>
                    <li>
                        <a href="<?=base_url('index.php/exam_control/view_results');?>" class="<?=($active==2)?"active":'';?>"><i class="menu-icon fa fa-puzzle-piece"></i> View Results</a>
                    </li>
    <?php } ?>
					
				
   		
					     <?php if ($this->session->userdata['user_role_id'] <= 4) { ?>

                    <h3 class="menu-title">Categories / Sub-Categories</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle <?=($active==6)?"active":'';?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-code-fork"></i> Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-code-fork"></i><a href="<?=base_url('index.php/admin_control/view_categories');?>" class="<?=($class==61)?"current":'';?>">View Categories</a></li>
                            <li><i class="menu-icon fa fa-code-fork"></i><a href="<?=base_url('index.php/create_category');?>" class="<?=($class==62)?"current":'';?>">Create New Category</a></li>
                        </ul>
                    </li>
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle <?=($active==6)?"active":'';?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-code-fork"></i> Sub-Categories</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-code-fork"></i><a href="<?=base_url('index.php/admin_control/view_subcategories');?>" class="<?=($class==63)?"current":'';?>">View Sub-Categories</a></li>
                            <li><i class="menu-icon fa fa-code-fork"></i><a href="<?=base_url('index.php/admin_control/subcategory_form');?>" class="<?=($class==64)?"current":'';?>">Create Sub-Category</a></li>
                        </ul>
                    </li>
					
		<?php } ?>		
						
				
					    <?php if ($commercial) { ?>
                        <?php if ($this->session->userdata['user_role_id'] <= 2) { ?>

                    <h3 class="menu-title">Membership</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle <?=($active==8)?"active":'';?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-list"></i> Membership Control</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-list"></i><a href="<?=base_url('index.php/membership');?>" class="<?=($class==81)?"current":'';?>">View Membership</a></li>
                            <li><i class="menu-icon fa fa-list"></i><a href="<?=base_url('index.php/membership/add');?>" class="<?=($class==82)?"current":'';?>">Create Offer</a></li>
                            <li><i class="menu-icon fa fa-list"></i><a href="<?=base_url('index.php/membership/add_feature');?>" class="<?=($class==83)?"current":'';?>">Add New Feature</a></li>
                        </ul>
                    </li>
		    <?php } ?>
            <?php } ?>	
					

					
					    <?php if ($this->session->userdata['user_role_id'] <= 4) { ?>

                    <h3 class="menu-title">Blog</h3><!-- /.menu-title -->

                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle <?=($active==7)?"active":'';?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="menu-icon fa fa-comment"></i> Blog Control</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-comment"></i><a href="<?=base_url('index.php/blog/view_all');?>" class="<?=($class==71)?"current":'';?>">View Posts</a></li>
                            <li><i class="menu-icon fa fa-comment"></i><a href="<?=base_url('index.php/blog/add');?>" class="<?=($class==72)?"current":'';?>">Add Post</a></li>
                        </ul>
                    </li>
		<?php } ?>	
					
					
					
					 <?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
					
                    <h3 class="menu-title">Admin Area</h3><!-- /.menu-title -->
                    <li class="menu-item-has-children dropdown">
                        <a href="#" class="dropdown-toggle <?=($active==3)?"active":'';?>" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <i class="menu-icon fa fa-cogs"></i> Admin Area</a>
                        <ul class="sub-menu children dropdown-menu">
                            <li><i class="menu-icon fa fa-cogs"></i><a href="<?=base_url('index.php/admin_control');?>" class="<?=($class==31)?"current":'';?>">Profile Settings</a></li>
							
							<?php if ($this->session->userdata['user_role_id'] <= 2) { ?>
                            <li><i class="menu-icon fa fa-cogs"></i><a href="<?=base_url('index.php/admin/system_control/view_settings');?>" class="<?=($class==32)?"current":'';?>">System Settings</a></li>
                            <li><i class="menu-icon fa fa-cogs"></i><a href="<?=base_url('index.php/noticeboard'); ?>" class="<?=($class==34)?"current":'';?>"> Noticeboard</a></li>
                            <li><i class="menu-icon fa fa-cogs"></i><a href="<?=base_url('index.php/message_control'); ?>" class="<?=($class==36)?"current":'';?>"> Inbox</a></li>
                            <li><i class="menu-icon fa fa-cogs"></i><a href="<?=base_url('index.php/admin_control/view_payment_history'); ?>" class="<?=($class==35)?"current":'';?>"> Payment History</a></li>
							<?php }?>
							<li><i class="menu-icon fa fa-cogs"></i><a href="<?=base_url('index.php/faq_control');?>" class="<?=($class==33)?"current":'';?>">FAQ</a></li>
                        </ul>
                    </li>
					
                        <?php } else { ?>
                            <li><a href="<?=base_url('index.php/admin_control');?>" class="<?=($active==3)?"active":'';?>"><i class="menu-icon fa fa-cogs"> </i> Profile Settings</a></li>
                        <?php } ?>
                        <?php if ($this->session->userdata['user_role_id'] > 2) { ?>
                            <li><a class="<?=($active==4)?"active":'';?>" href="<?=base_url('index.php/message_control/contact_form');?>" class="<?=($class==42)?"current":'';?>"><i class="menu-icon fa fa-envelope-o"></i> Contact Admin</a></li>
                        <?php }?>					
					<li>
						<a href="<?=base_url('index.php/login_control/logout'); ?>"><i class="menu-icon fa fa-power-off"></i> Logout</a>
                    </li>
					
                </ul>
            </div><!-- /.navbar-collapse -->
        </nav>

    </aside><!-- /#left-panel -->

    <!-- Left Panel -->

