<?php 
if ($message) {
    echo $message;
}
?>

	
	                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
                                                        <strong><?=($msg_info->message_folder == 'draft')?'Edit Message':'Reply Message' ?></strong>
                                                    </div>
                                                    <div class="card-body card-block">
    <?php 
    if ($msg_info->message_folder == 'draft') {
        echo form_open(base_url('index.php/message_control/send_draft_message'), 'role="form" class="form-horizontal"');
    }else {
        echo form_open(base_url('index.php/message_control/send_reply'), 'role="form" class="form-horizontal"');
    }
    ?>														
            <div class="col-12">
                <?php echo validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>														
                                                                <div class="form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">To :</label></div>
                                                                    <div class="col-12 col-md-8">
                                                                        <?=form_hidden('message_id', $msg_info->message_id); ?>
                   <?php 
                    if ($msg_info->message_folder == 'draft') {
                        echo form_input('to',$msg_info->message_send_to, 'placeholder="To" class="form-control" required="required"'); 
                    } elseif ($msg_info->message_folder == 'send') {
                        echo form_input('to',$msg_info->message_send_to, 'placeholder="To" class="form-control" required="required" readonly'); 
                    } else {
                        echo form_input('to',$msg_info->message_sender.' ( '.$msg_info->sender_email.' )', 'placeholder="To" class="form-control" required="required" readonly'); 
                    }
                    ?>
                                                                    </div>
                                                                </div>	
														
														
                                                                <div class="form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Subject :</label></div>
                                                                    <div class="col-12 col-md-8">
                                                                        <?php 
                    if ($msg_info->message_folder == 'draft') {
                        echo form_input('subject', $msg_info->message_subject, 'placeholder="Subject" class="form-control" required="required"'); 
                    } else {
                        echo form_input('subject', 'Re: '.$msg_info->message_subject, 'placeholder="Subject" class="form-control" required="required" readonly'); 
                    }
                    ?>
                                                                    </div>
                                                                </div>	
														
                                                                <div class="form-group">
                                                                    <div class="col col-md-3"><label for="select" class=" form-control-label">Message :</label></div>
                                                                    <div class="col-12 col-md-8">
                                                                        <?php 
                    $data = array(
                        'name'        => 'reply_message',
                        'placeholder' => 'Reply Message',
                        'value'       => '',
                        'rows'        => '10',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?php echo form_textarea($data) ?>
                                                                    </div>
                                                                </div>	
														
                <div class="col-12" align="center">
            <hr/>
                    <button type="submit" class="btn btn-primary col-xs-5 col-sm-3">Send</button>
                    <span class="col-sm-1">&nbsp;</span>
                    <a href="<?=base_url('index.php/message_control');?>" class="btn btn-danger">Cancel</a>
                </div>
            <?php echo form_close() ?>														
  
													</div></div></div>
	
	

<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>