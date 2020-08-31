<?php 
    if ($this->session->userdata('time_zone')) date_default_timezone_set($this->session->userdata('time_zone')); 
    else if( ! ini_get('date.timezone') ) date_default_timezone_set('GMT');
?>
<div class="row">
    <div class="col-lg-12">
		        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>WELCOME { <?=$this->session->userdata('user_name')?> }</h1>
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
				<a href="<?=base_url('index.php/admin_control');?>">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-user"></i>
                    </div>

                    <div class="mb-0">
                        <i class="fa fa-cogs"></i>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Profile Settings</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-1" style="width: 40%; height: 5px;"></div>
                </div></a>
            </div>
			
			
            <div class="card col-md-6 no-padding ">
				<a href="<?=base_url('index.php/exam_control/view_results');?>">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-puzzle-piece"></i>
                    </div>
                    <div class="mb-0">
                        <i class="fa fa-eye"></i>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">View Result</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-4" style="width: 40%; height: 5px;"></div>
                </div></a>
            </div>
			
			
            <div class="card col-md-6 no-padding ">
				<a href="<?=base_url('index.php/exam_control/view_all_mocks');?>">
                <div class="card-body">
                    <div class="h1 text-muted text-right mb-4">
                        <i class="fa fa-rocket"></i>
                    </div>
                    <div class="mb-0">
                        <i class="fa fa-pencil"></i>
                    </div>
                    <small class="text-muted text-uppercase font-weight-bold">Take New Exam</small>
                    <div class="progress progress-xs mt-3 mb-0 bg-flat-color-3" style="width: 40%; height: 5px;"></div>
                </div></a>
            </div>
			

        </div>		
		
	</div>
</div>


<hr>

<div class="row">
    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header" align="center">
                                <strong class="card-title"><i class="fa fa-tasks"></i> Your last few results</strong>
                            </div>
                            <div class="card-body">
                <?php if (isset($results) != NULL) { ?>
                    <table cellpadding="0" cellspacing="0" border="0" class="table table-striped">
                        <thead>
                            <tr>
                                <th>Exam Title</th>
                                <th>Assessment</th>
                                <th>Score</th>
                                <th>with pratical Exam</th>
                                <th>Date</th>
                                <th class="text-center" style=" width: 10%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            foreach ($results as $result) {
                                if ($i > 5){
                                    break;
                                }
                                ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                    <td><?= $result->title_name; ?></td>
                                    <td><?= ($result->result_percent >= $result->pass_mark) ? '<span class="btn btn-success">PASS</span>' : '<span class="btn btn-danger">FAIL</span>' ?></td>
                                    <td ><?php echo $result->result_percent; ?>%</td>
                                    <td><?php echo $result->result_percent-35; ?>% .. soon ..</td>
                                    <td><?= date("D, d M", strtotime($result->exam_taken_date)); ?></td>
                                    <td class="text-center" style=" width: 17%">
                                        <div class="btn-group">
                                            <a class="btn btn-outline-info" href = "<?= base_url('index.php/exam_control/view_result_detail/' . $result->result_id); ?>"><i class="fa fa-eye"></i> View</a>
											<!-- if he can delete
                                            <a onclick="return delete_confirmation()" href = "<?= base_url('index.php/exam_control/delete_results/' . $result->result_id); ?>" class="btn btn-sm btn-default" ><i class="glyphicon glyphicon-trash"></i><span class="btn btn-outline-danger">  Delete </span></a> -->
                                        </div>
                                    </td>
                                </tr>
                                <?php 
                                $i++;
                            }
                            ?>
                        </tbody>
                    </table>
                    <?php
                } else {
                    echo 'No results!';
                }
                ?>
                            </div>
                        </div>
                    </div>
</div>