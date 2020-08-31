<style type="text/css">
    .data-red{
        color: red;
    }
    .data-green{
        color: green;
    }
    ul{
        list-style: none;
    }

</style>

<?php if ($message) echo $message;
   // echo "<pre/>"; print_r($results);
    $tmp = (array) json_decode($results->result_json);
?>
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                              Result Details :  <strong class="card-title"><?=$results->title_name;?></strong>
                            </div>							
                            <div class="card-body">

        <ul>
        <?php foreach ($tmp as $key => $value) { 
            $question = $this->db->where('ques_id', $key)->get('questions')->row(); ?>
            <li><strong>Q: <?=$question->question;?></strong>
                <ul class="list-group" style="margin-top: 12px;"><strong>Answers: </strong>
                    <?php $answers = $this->db->where('ques_id', $key)->get('answers')->result();
                    $temp_ans = explode(',', $value);
                    foreach ($answers as $val) { ?>
					
                        <li class="list-group-item" >
							<input type="<?=$question->option_type;?>" disabled="disabled" <?=(in_array($val->ans_id, $temp_ans))?'checked':''?>/> 
							<span style="margin-left: 10px;"><?=$val->answer;?></span> 
							<?php if ($this->session->userdata['user_role_id'] <= 3) { ?>
                        <?php if($val->right_ans == 1){ ?>
                            <span class="badge float-right data-green"><i class="fa fa-check"></i></span>
                        <?php } 
							else echo '<span class="badge float-right data-red"><i class="fa fa-times"></i></span>'; ?>
<?php }?>
                        </li>
                    <?php } ?>
                </ul>
            </li>
			<hr/>
        <?php } ?>
        </ul>								
								
                            </div>
                        </div>
                    </div>	
