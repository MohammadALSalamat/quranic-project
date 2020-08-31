<?php date_default_timezone_set($this->session->userdata['time_zone']); ?>
<div id="note">
    <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
    <?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '' ?>        
    <?=(isset($message)) ? $message : ''; ?>
</div>
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
								<div class="float-left"><h4>Messages</h4></div>
                                <div class="float-right">
								 <a class="btn btn-outline-primary" href="#compose" data-toggle="modal"><i class="fa ti-pencil"></i>&nbsp; Compose New Message </a>
								</div>
                            </div>
                            <div class="card-body">
    <?php if (isset($messages) != NULL) { ?>
								
                                <div class="default-tab">
                                    <nav>
                                        <div class="nav nav-tabs" id="nav-tab" role="tablist">
                                            <a class="nav-item nav-link active" id="nav-Inbox-tab" data-toggle="tab" href="#nav-Inbox" role="tab" aria-controls="nav-Inbox" aria-selected="true">Inbox</a>
                                            <a class="nav-item nav-link" id="nav-Send-tab" data-toggle="tab" href="#nav-Send" role="tab" aria-controls="nav-Send" aria-selected="false">Send</a>
                                            <a class="nav-item nav-link" id="nav-Drafts-tab" data-toggle="tab" href="#nav-Drafts" role="tab" aria-controls="nav-Drafts" aria-selected="false">Drafts</a>
                                             <a class="nav-item nav-link" id="nav-Spam-tab" data-toggle="tab" href="#nav-Spam" role="tab" aria-controls="nav-Spam" aria-selected="false">Spam</a>
                                             <a class="nav-item nav-link" id="nav-Trash-tab" data-toggle="tab" href="#nav-Trash" role="tab" aria-controls="nav-Trash" aria-selected="false">Trash</a>
                                        </div>
                                    </nav>
                                    <div class="tab-content pl-3 pt-2" id="nav-tabContent">
                                        <div class="tab-pane fade show active" id="nav-Inbox" role="tabpanel" aria-labelledby="nav-Inbox-tab">
                                            
											<table class="table table-striped">
                   <thead>
                       <tr>
                           <th><span><input type="checkbox"></span></th>
                           <th class="col-sm-2 mobile">Sender</th>
                           <th class="col-sm-6">Subject</th>
                           <th class="col-sm-2 invisible-on-sm">Date Time</th>
                           <th class="col-sm-2 text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if (($msg->trash == 0) && ($msg->spam == 0) && ($msg->message_folder == 'inbox') ) {
                            $j = 1;
                    ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>">
                       <td><span><input type="checkbox"></span></td>
                       <td class="col-sm-2 mobile clickableRow"><?=$msg->message_sender; ?></td>
                       <td class="col-sm-5 clickableRow"><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?>
					   <a href="<?=base_url('index.php/message_control/open_message/'.$msg->message_id); ?>">
						    <button type="button" class="btn  btn-sm btn-outline-info float-right">Show</button>
						   </a>
					   
					   </td>
                       <td class="col-sm-2  invisible-on-sm clickableRow"><?=date("D, d M g:i a", strtotime($msg->message_date)); ?></td>
                       <td class="col-sm-2 text-center">
						   <div class="btn-group">
                               <a href="<?php echo base_url('index.php/message_control/reply_message/' . $msg->message_id); ?>" class="btn btn-sm btn-outline-info"><i class="fa fa-reply"></i><span class="invisible-on-sm"> Reply</span></a>
                               <button type="button" class="btn  btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu text-center" role="menu">
                                  <li><a href="<?php echo base_url('index.php/message_control/move_message/spam/' . $msg->message_id); ?>"><i class="fa fa-minus-circle"></i><span class="invisible-on-sm"> Mark as</span> Spam </a></li>
<hr/>
								   <li><a href = "<?php echo base_url('index.php/message_control/move_message/trash/' . $msg->message_id) ; ?>"><i class="fa fa-trash"></i><span class="invisible-on-sm"> Move to</span> Trash</a></li>
                               </ul>
						   </div>
                       </td>
                   </tr>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4> Inbox is empty.</h4><td></tr>';
                    }
                   ?>
                   </tbody>
                </table>												
											
                                        </div>
                                        <div class="tab-pane fade" id="nav-Send" role="tabpanel" aria-labelledby="nav-Send-tab">
											<table class="table table-striped">
                   <thead>
                       <tr>
                           <th><span><input type="checkbox"></span></th>
                           <th class="mobile">To</th>
                           <th class="col-sm-5">Subject</th>
                           <th class="mobile">Sender</th>
                           <th class="invisible-on-sm">Date Time</th>
                           <th class="col-sm-2 text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if (($msg->trash == 0) && ($msg->spam == 0) && ($msg->message_folder == 'send') ) {
                            $j = 1;
                   ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>" href="<?=base_url('index.php/message_control/open_message/'.$msg->message_id); ?>">
                       <td><span><input type="checkbox"></span></td>
                       <td class="mobile clickableRow"><?=$msg->message_send_to; ?></td>
                       <td class="col-sm-5 clickableRow"><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></td>
                       <td class="mobile clickableRow"><?=$msg->message_sender; ?></td>
                       <td class="invisible-on-sm clickableRow"><?=date("D, d M g:i a", strtotime($msg->message_date)); ?></td>
                       <td class="col-sm-2 text-center">
                           <div class="btn-group">
                               <a href="<?php echo base_url('index.php/message_control/reply_message/' . $msg->message_id); ?>" class="btn btn-sm btn-outline-info"><i class="fa fa-reply"></i><span class="invisible-on-sm"> Reply</span></a>
                               <button type="button" class="btn  btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu text-center" role="menu">
                                  <li><a href="<?php echo base_url('index.php/message_control/move_message/spam/' . $msg->message_id) ; ?>"><i class="fa fa-minus-circle"></i><span class="invisible-on-sm"> Mark as</span> Spam </a></li>
                                  <hr/>
                                  <li><a href = "<?php echo base_url('index.php/message_control/move_message/trash/' . $msg->message_id) ; ?>"><i class="fa fa-trash"></i><span class="invisible-on-sm"> Move to</span> Trash</a></li>
                               </ul>
                           </div>
                       </td>
                   </tr>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4> Send directory is empty.</h4><td></tr>';
                    }
                   ?>
                   </tbody>
                </table>											
											
                                        </div>
                                        <div class="tab-pane fade" id="nav-Drafts" role="tabpanel" aria-labelledby="nav-Drafts-tab">
											<table class="table table-striped">
                   <thead>
                       <tr>
                           <th><span><input type="checkbox"></span></th>
                           <th class="mobile">To</th>
                           <th class="col-sm-5">Subject</th>
                           <th class="mobile">Sender</th>
                           <th class="invisible-on-sm">Date Time</th>
                           <th class="col-sm-2 text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if (($msg->trash == 0) && ($msg->spam == 0) && ($msg->message_folder == 'draft') ) {
                            $j = 1;
                    ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>" href="<?=base_url('index.php/message_control/open_message/'.$msg->message_id); ?>">
                       <td><span><input type="checkbox"></span></td>
                       <td class="mobile clickableRow"><?=$msg->message_send_to; ?></td>
                       <td class="col-sm-5 clickableRow"><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></td>
                       <td class="mobile clickableRow"><?=$msg->message_sender; ?></td>
                       <td class="invisible-on-sm clickableRow"><?=date("D, d M g:i a", strtotime($msg->message_date)); ?></td>
                       <td class="col-sm-2 text-center">
                               <a href="<?php echo base_url('index.php/message_control/reply_message/' . $msg->message_id); ?>" class="btn btn-sm btn-outline-info"><i class="fa ti-pencil"></i><span class="invisible-on-sm"> Edit</span></a>
							   
                               <a onclick="return delete_confirmation()" href = "<?php echo base_url('index.php/message_control/delete_message/' . $msg->message_id); ?>" class="btn btn-sm btn-outline-danger"><i class="fa fa-trash"></i><span class="invisible-on-sm"> Delete</span></a>
                       </td>
                   </tr>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4> No Draft.</h4><td></tr>';
                    }
                   ?>
                   </tbody>
                </table>											
                                        </div>
											
											
                                        <div class="tab-pane fade" id="nav-Spam" role="tabpanel" aria-labelledby="nav-Spam-tab">
											<table class="table table-striped">

                   <thead>
                       <tr>
                           <th><span><input type="checkbox"></span></th>
                           <th class="col-sm-2 mobile">Sender</th>
                           <th class="col-sm-6">Subject</th>
                           <th class="col-sm-2 invisible-on-sm">Directory</th>
                           <th class="col-sm-2 text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if (($msg->trash == 0) && ($msg->spam == 1)) {
                            $j = 1;
                   ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>" href="<?=base_url('index.php/message_control/open_message/'.$msg->message_id); ?>">
                       <td><span><input type="checkbox"></span></td>
                       <td class="col-sm-2 mobile clickableRow"><?=$msg->message_sender; ?></td>
                       <td class="col-sm-5 clickableRow"><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></td>
                       <td class="col-sm-2  invisible-on-sm clickableRow"><?=$msg->message_folder; ?></td>
                       <td class="col-sm-2 text-center">
                           <div class="btn-group">
                               <a href="<?php echo base_url('index.php/message_control/move_message/unspam/' . $msg->message_id) ; ?>" class="btn btn-sm btn-outline-info"><i class="fa fa-reply"></i><span class="invisible-on-sm"> Inbox</span></a>
                               <button type="button" class="btn  btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu text-center" role="menu">
                                  <li><a href="<?php echo base_url('index.php/message_control/move_message/unspam/' . $msg->message_id) ; ?>"><i class="fa fa-inbox"></i><span class="invisible-on-sm"> Not Spam</span></a></li>
                                  <hr/>
                                  <li><a onclick="return delete_confirmation()" href = "<?php echo base_url('index.php/message_control/delete_message/' . $msg->message_id); ?>"><i class="fa fa-trash"></i><span class="invisible-on-md">  Delete forever</span></a></li>
                               </ul>
                           </div>
                       </td>
                   </tr>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4>  No Spam.</h4> <td></tr>';
                    }
                    ?>
                   </tbody>
                </table>												
                                        </div>
											
											
                                        <div class="tab-pane fade" id="nav-Trash" role="tabpanel" aria-labelledby="nav-Trash-tab">
											<table class="table table-striped">

                   <thead>
                       <tr>
                           <th><span><input type="checkbox"></span></th>
                           <th class="col-sm-2 mobile">Sender</th>
                           <th class="col-sm-6">Subject</th>
                           <th class="col-sm-2 invisible-on-sm">Directory</th>
                           <th class="col-sm-2 text-center">Action</th>
                       </tr>
                   </thead>
                   <tbody>
                   <?php
                    $i = 1; 
                    $j = 0;
                    foreach ($messages as $msg) {
                        if ($msg->trash == 1) {
                            $j = 1;
                   ?>
                   <tr class="<?=($i & 1) ? 'even' : 'odd'; echo($msg->message_read == 0) ? ' bold-text ' : ' '; ?>" href="<?=base_url('index.php/message_control/open_message/'.$msg->message_id); ?>">
                       <td><span><input type="checkbox"></span></td>
                       <td class="col-sm-2 mobile clickableRow"><?=$msg->message_sender; ?></td>
                       <td class="col-sm-5 clickableRow"><?=$msg->message_subject; echo($msg->numOfReply != 0) ? ' ('.++$msg->numOfReply.')' : ''; ?></td>
                       <td class="col-sm-2  invisible-on-sm clickableRow"><?=$msg->message_folder; ?></td>
                       <td class="col-sm-2 text-center">
                           <div class="btn-group">
                               <a href="<?php echo base_url('index.php/message_control/move_message/untrash/' . $msg->message_id); ?>" class="btn btn-sm btn-outline-info"><i class="fa fa-reply"></i><span class="invisible-on-sm"> Inbox</span></a>
                               <button type="button" class="btn  btn-sm btn-outline-info dropdown-toggle" data-toggle="dropdown">
                                <span class="caret"></span>
                               </button>
                               <ul class="dropdown-menu text-center" role="menu">
                                  <li><a href="<?php echo base_url('index.php/message_control/move_message/untrash/' . $msg->message_id) ; ?>"><i class="fa fa-inbox"></i><span class="invisible-on-sm"> Move to</span> Inbox </a></li>
                                  <hr/>
                                  <li><a onclick="return delete_confirmation()" href = "<?php echo base_url('index.php/message_control/delete_message/' . $msg->message_id); ?>"><i class="fa fa-trash"></i><span class="invisible-on-md">  Delete forever</span></a></li>
                               </ul>
                           </div>
                       </td>
                   </tr>
                   <?php
                        }
                        $i++;                       
                    }
                    if ($j == 0) {
                        echo '<tr><td colspan="5"><h4>  Trash is empty!</h4> <td></tr>';
                    }
                    ?>
                   </tbody>
                </table>												
                                        </div>
	
                                    </div>

                                </div>
								
								
    <?php
    } else {
        echo '<h4> No Message!</h4> ';
    }
    ?>								
								
								
                            </div>
                        </div>
                    </div>
					</div>



