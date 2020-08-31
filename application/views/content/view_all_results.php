<div id="note"> <?php if ($message) echo $message; 
        date_default_timezone_set($this->session->userdata['time_zone']);
?> </div>

							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">Results</strong>
                            </div>							
                            <div class="card-body">
                <?php if (isset($results) != NULL) { ?>
                                <table class="table table-striped">
                        <thead>
                            <tr>
                                <td class="hidden">1</td>
                                <th>Name of Student</th>
                                <th>Exam</th>
                                <th>Assessment</th>
                                <th>Score</th>
                                <th>with pratical Exam</th>
                                <th>Date</th>
                                <th class="text-center" style=" width: 25%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php
                            $i = 1;
                            foreach ($results as $result) {
                                ?>
                                <?php if (($result->exam_title_user_id == $this->session->userdata('user_id')) OR ($this->session->userdata('user_role_id') <= 3)) { ?>
                                    <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                        <td class="hidden">1</td>
                                        <td><?= $result->user_name; ?></td>
                                        <td><?= $result->title_name; ?></td>
                                        <td><?= ($result->result_percent >= $result->pass_mark) ? '<span class="btn btn-success">PASS</span>' : '<span class="btn btn-danger">FAIL</span>' ?></td>
                                        <td><?php echo $result->result_percent; ?>%</td>
                                        <td><?php echo $result->result_percent-35; ?>% ..soon..</td>
                                        <td><?= date("D, d M", strtotime($result->exam_taken_date)); ?></td>
										
                                        <td class="text-center" style=" width: 25%">
                                                <a class="btn btn-outline-info btn-xs" href = "<?= base_url('index.php/exam_control/view_exam_detail/' . $result->result_id); ?>"><i class="fa fa-info"></i> Details</a>
                                                <a class="btn btn-outline-success btn-xs" href = "<?= base_url('index.php/exam_control/view_result_detail/' . $result->result_id); ?>"><i class="fa fa-file"></i> Certificate</a>
                                                <?php if ($this->session->userdata['user_role_id'] < 3) { ?>
                                                <a onclick="return delete_confirmation()" href = "<?= base_url('index.php/exam_control/delete_results/' . $result->result_id); ?>" class="btn btn-xs btn-outline-danger" ><i class="fa fa-trash"></i><span class="invisible-on-md">  Delete </span></a>
                                                <?php } ?>
                                        </td>
                                    </tr>
                                    <?php
                                    $i++;
                                }
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
