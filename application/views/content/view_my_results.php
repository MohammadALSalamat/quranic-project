<div id="note">
    <?php 
        date_default_timezone_set($this->session->userdata['time_zone']);
    if ($message) {
        echo $message;    
    }
    ?>
</div>

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
                                <th>Exam Title</th>
                                <th>Assessment</th>
                                <th>Score</th>
                                <th>with pratical Exam</th>
                                <th>Date</th>
                                <th class="text-center" style=" width: 17%">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            <?php 
                            $i = 1;
                            foreach ($results as $result) {
                            ?>
                                <tr class="<?= ($i & 1) ? 'even' : 'odd'; ?>">
                                    <td><?= $result->title_name; ?></td>
                                    <td><?= ($result->result_percent >= $result->pass_mark) ? '<span class="btn btn-info">PASS</span>' : '<span class="btn btn-danger">FAIL</span>' ?></td>
                                    <td><?php echo $result->result_percent; ?>%</td>
                                    <td><?php echo $result->result_percent-35; ?>% .. soon ..</td>
                                    <td><?= date("D, d M", strtotime($result->exam_taken_date)); ?></td>
                                    <td class="text-center" style=" width: 17%">
                                            <a class="btn btn-outline-info btn-xs" href = "<?= base_url('index.php/exam_control/view_exam_detail/' . $result->result_id); ?>"><i class="fa fa-info"></i> Details</a>
                                            <a class="btn btn-outline-success btn-xs" href = "<?= base_url('index.php/exam_control/view_result_detail/' . $result->result_id); ?>"><i class="fa fa-file"></i> Certificate</a>
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
								
