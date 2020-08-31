    <nav class="navbar navbar-expand-lg navbar-dark navbar-theme fixed-top p-0">
      <div class="container px-3">
                      <a class="navbar-brand font-weight-normal ls-1" href="<?=base_url('index.php');?>">
                        <?php if (file_exists('./logo.png')) { ?>
                            <img src="<?=base_url();?>logo.png" width="200px" height="55px">
                        <?php }else{
                            echo ($brand_name)?$brand_name:'qurani';
                        } ?>
                        </a>
        <button class="navbar-toggler collapsed" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation"><span class="navbar-toggler-icon"></span></button>
        <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav ml-auto">
			<li class="nav-item <?=($this->uri->segment(1) == '')?'active':''; ?>"><a class="nav-link" href="<?=base_url('index.php');?>"><span class="nav-link-text"><i class="fas fa-home fa-lg"></i></span></a></li>
			  <?php if ($this->session->userdata('log')) { ?>
			  
			<li class="nav-item"><a class="nav-link" href="<?=base_url();?><?=($this->session->userdata('log'))?'index.php/dashboard/'.$this->session->userdata('user_id'):''?>"><span class="nav-link-text"><i class="fas fa-users-cog fa-lg"></i></span></a></li>
			  
			<li class="nav-item <?=($this->uri->segment(1) == 'course')?'active':''; ?>"><a class="nav-link" href="<?=base_url('index.php/course');?>"><span class="nav-link-text">Courses</span></a></li>
			<li class="nav-item <?=($this->uri->segment(1) == 'exam_control')?'active':''; ?>"><a class="nav-link" href="<?=base_url('index.php/exam_control/view_all_mocks');?>"><span class="nav-link-text">Exams</span></a></li>
			  <?php } ?>
			 <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink2" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="nav-link-text">pages</span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink4">
				  <a class="dropdown-item <?=($this->uri->segment(1) == 'blog')?'active':''; ?>" href="<?=base_url('index.php/blog');?>">blog</a>
				  <?php if ($this->session->userdata('log')) { ?>
				  <a class="dropdown-item <?=($this->uri->segment(1) == 'noticeboard')?'active':''; ?>" href="<?=base_url('index.php/noticeboard/notices');?>">noticeboard</a>
				  <?php } ?>
				  <a class="dropdown-item <?=($this->uri->segment(2) == 'pricing')?'active':''; ?>" href="<?=base_url('index.php/guest/pricing');?>">pricing</a>
				  </div>
            </li>
			  
			  <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink3" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="nav-link-text">other</span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink4">
				  <a class="dropdown-item <?=($this->uri->segment(2) == 'view_faqs')?'active':''; ?>" href="<?=base_url('index.php/guest/view_faqs');?>">FAQ</a>
				  <a class="dropdown-item <?=($this->uri->segment(1) == 'view_faqs')?'active':''; ?>" href="<?=base_url('index.php/guest/what_we_use');?>">what we use</a>
				  </div>
            </li>

			<li class="nav-item <?=($this->uri->segment(1) == 'contact')?'active':''; ?>"><a class="nav-link" href="<?=base_url('index.php/guest/contacti');?>"><span class="nav-link-text">contact</span></a></li>
			  <?php if ($this->session->userdata('log')) { ?>
			<li class="nav-item"><a class="nav-link" href="<?=base_url('index.php/login_control/logout'); ?>"><span class="nav-link-text"><i class="fas fa-power-off fa-lg"></i></span></a></li>
			                          <?php } ?>

			  <?php if ( ! $this->session->userdata('log')) { ?>
			 <li class="nav-item dropdown dropdown-on-hover"><a class="nav-link dropdown-toggle" id="navbarDropdownMenuLink4" href="#" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"> <span class="nav-link-text">login</span></a>
              <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdownMenuLink4">
				  <a class="dropdown-item" href="<?=base_url('index.php/login_control');?>">As a student</a>
				  <a class="dropdown-item" href="<?=base_url('index.php/admin');?>">As an admin</a>
				  </div>
            </li>
			  <?php } ?>

          </ul>
        </div>
      </div>
    </nav>
    <?php   //   echo "<pre/>"; print_r($this->uri->segment(1)); exit();    ?>
