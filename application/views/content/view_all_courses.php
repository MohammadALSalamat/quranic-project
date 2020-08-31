<?php //echo "<pre/>"; print_r($courses); exit(); ?>
    <?php if ($message) echo $message; ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>   


                <div class="row">
                    <div class="col-lg-12">


										
										
                                            
                    
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">Course List</strong>
                            </div>							
                            <div class="card-body">
                                <table class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>Course Title</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>
									
                                    <tbody>
                <?php
                $i = 1;
                foreach ($courses as $course) {
                ?>
                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                    <td>
                        <p class="lead"><?=$course->course_title?>
                        </p>
                        <span class="text-muted">Category: </span> <?=$course->category_name; ?>
                        &nbsp;
                        <span class="text-muted">Sub-category: </span> <?=$course->sub_cat_name; ?>
                        &nbsp;
                        <span class="text-muted">Price: </span>
                        <?= $currency_code . ' ' . $currency_symbol ?><?= $course->course_price; ?>
                        <span class="pull-right">
                            <span class="text-muted">Author: </span>
                            <?php echo $course->user_name; ?>
                        </span>
                    </td>
                    <td>
                        <div class="btn-group">
                            <a class="btn btn-outline-success btn-sm" href = "<?= base_url('index.php/course/course_detail/' . $course->course_id); ?>"><i class="fa fa-edit"></i><span class="invisible-on-md">  View Sections</span></a>
                            <a class="btn btn-outline-primary btn-sm" href = "<?= base_url('index.php/course/edit_course_detail/' . $course->course_id); ?>"><i class="fa fa-eye"></i><span class="invisible-on-md">  View Detail</span></a>
                            <a onclick="return delete_confirmation()" href = "<?php echo base_url('index.php/course/delete_course/' . $course->course_id); ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i><span class="invisible-on-md">  Delete</span></a>
                        </div>
                    </td>
                </tr>
                <?php
                $i++;
                }
                ?>										
										
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>	

										

                    </div>
					</div>



