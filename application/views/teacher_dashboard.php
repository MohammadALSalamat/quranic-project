<div class="row">
    <div class="col-lg-12">
		        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>WELCOME { <?=$this->session->userdata('user_name')?> } teacher</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li class="active"><i class="fa fa-dashboard"></i> / <?=$title; ?></li>
                        </ol>
						<?php 
            if ($message) {
                echo $message;
            }
            ?>
                    </div>
                </div>
            </div>
        </div>       
    </div>
</div><!-- /.row -->



<div class="row">
    <div class="col-lg-12">
        <div class="card-group">
			
			
            <div class="card col-md-6 no-padding ">
				<a href="<?=base_url('index.php/mocks');?>">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
					<div class="h4 mb-0">
                        <span class="count"><?=$total_exam;?></span>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Total Exams</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div></a>
            </div>
			
			
            <div class="card col-md-6 no-padding ">
				<a href="<?=base_url('index.php/exam_control/view_results');?>">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-users"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?=$exam_taken_new;?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">New Participants</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                </div></a>
            </div>
			
			
            <div class="card col-md-6 no-padding ">
				<a href="<?=base_url('index.php/exam_control/view_results');?>">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-bookmark-o"></i>
                    </div>
                    <div class="h4 mb-0">
                        <span class="count"><?=$exam_taken;?></span>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Total Participants</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                </div></a>
            </div>
			

        </div>		
		
	</div>
</div>


<hr>


<div class="row">
    <div class="col-lg-12">
        <div class="card-group">
			
			
            <div class="card col-md-6 no-padding ">
				<a href="<?=base_url('index.php/admin_control');?>">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
					<div class="mb-0">
                        <i class="fa fa-cogs"></i>
                    </div>

                    <small class="text-muted text-uppercase font-weight-bold">Profile Settings</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-2" style="width: 40%; height: 5px;"></div>
                </div></a>
            </div>
			
			
            <div class="card col-md-6 no-padding ">
				<a href="<?=base_url('index.php/admin_control/create_exam');?>">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
                    <div class="mb-0">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Create Exam</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-5" style="width: 40%; height: 5px;"></div>
                </div></a>
            </div>
			
			
            <div class="card col-md-6 no-padding ">
				<a href="<?=base_url('index.php/create_category');?>">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-sitemap"></i>
                    </div>
                    <div class="mb-0">
                        <i class="fa fa-paperclip"></i>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Create Category</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-6" style="width: 40%; height: 5px;"></div>
                </div></a>
            </div>
			

        </div>		
		
	</div>
</div>

