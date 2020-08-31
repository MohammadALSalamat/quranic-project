<?php  // echo '<pre>';   print_r($message); exit();
function wordlimit($string, $length = 5, $ellipsis = " ...") {
   $words = explode(' ', $string);
   if (count($words) > $length) {
       return implode(' ', array_slice($words, 0, $length)) . $ellipsis; 
   } else {
       return $string;
   }
}
?>



                                            <div class="col-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        Topic : <strong><?=$message->message_subject; ?>
														<br/>
														<small> 
 <?php 
        if (($message->message_folder == 'draft')OR($message->message_folder == 'send')) {
            echo 'To: '.'<strong> '.$message->message_send_to.' </strong>'; 
        } else {
            echo 'Sender: '.$message->message_sender.'<strong> '.$message->sender_email.' </strong>'; 
        }
        ?>														
														</small>
														<div class="float-right"><a href="<?=base_url('index.php/message_control');?>"><button class="btn btn-outline-info"><i class="fa fa-envelope-o"></i> Inbox</button></a></div>
                                                    </div>
                                                    <div class="card-body card-block">
														
														
														
<?php
if (isset($message_replies) && !empty($message_replies)):
    $arraySize = sizeof($message_replies);   ?><br/>
<div class="panel-group accordion accordion-2" id="accordion">
<div class="panel panel-default">
    <a class="accordion-toggle glyphicons collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-main">
        <div class="panel-heading">
          <h4 class="panel-title">
              <?=wordlimit($message->message_body); ?>
              <span class="pull-right"><?=date("D, d M g:i a", strtotime($message->message_date)); ?></span>
          </h4>
        </div>
    </a>
    <div id="collapse-main" class="panel-collapse collapse">
        <div class="panel-body message_body">
            <?=$message->message_body; ?>
        </div>
    </div>
</div>
    <?php
    $i = 1;
    foreach ($message_replies as $reply) { 
    ?>
    <div class="panel panel-default">
        <a class="accordion-toggle glyphicons collapsed" data-toggle="collapse" data-parent="#accordion" href="#collapse-<?=$reply->message_reply_id; ?>">
            <div class="panel-heading">
              <h4 class="panel-title">
                  <?=wordlimit($reply->replied_messages); ?>
                  <span class="pull-right"><?=date("D, d M g:i a", strtotime($reply->replied_time)); ?></span>
              </h4>
            </div>
        </a>
        <div id="collapse-<?=$reply->message_reply_id; ?>" class="panel-collapse panel-bg-control <?=($i == $arraySize)?'in':'collapse'?>">
            <div class="panel-body message_body">
                <?=$reply->replied_messages; ?>
            </div>
        </div>
    </div>
   <?php 
       $i++; 
    } ?>
</div>
<?php else: ?>    
<p>
    <div class="panel-body message-display-single message_body">
        <?=$message->message_body; ?>
    </div>
</p>
<?php endif; ?>  														

														
														
														
                                                    </div>
													
                                                    <div class="card-footer" align="center">
        <a href="<?php echo base_url('index.php/message_control/reply_message/' . $message->message_id); ?>" class="btn btn-sm btn-primary"><i class="fa fa-reply"></i><span class="invisible-on-md"> Reply </span></a>
        <a onclick="return delete_confirmation()" href="<?=base_url('index.php/message_control/delete_message/'.$message->message_id); ?>" class="btn btn-sm btn-danger"><i class="fa fa-trash"></i><span class="invisible-on-md"> Delete </span></a>
        <a href="<?php echo base_url('index.php/message_control/move_message/spam/' . $message->message_id) ; ?>" class="btn btn-sm btn-secondary"><i class="fa fa-minus-circle"></i><span class="invisible-on-md"> Spam </span></a>
                                                    </div>
													
                                                </div></div>




