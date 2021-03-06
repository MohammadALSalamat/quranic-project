<div class="modal fade modal-compose-mail" id="compose" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" data-backdrop="static">  
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
            <h5 class="modal-title" id="compose">New Message</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
            </div>
            <?php echo form_open(base_url('index.php/message_control/send_message'), 'role="form" class="form-horizontal"'); ?>
            <?=form_hidden('token', time()); ?>
            <div class="modal-body">
                <?php echo validation_errors('<div class="alert alert-error">', '</div>'); ?>
                <div class="form-group">
                   <?php echo form_input('from', 'From: '.$this->session->userdata['brand_name'].' <'.$this->session->userdata['support_email'].'>', 'placeholder="From" class="form-control" required="required" disabled') ?>
                </div>
                <div class="form-group">
                   <?php echo form_input('to', '', 'pattern="^[a-zA-Z0-9.!#$%&' . "'" . '*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="To" type="email" class="form-control" required="required"') ?>
                </div>
                <div class="form-group">
                   <?php echo form_input('subject', '', 'placeholder="Subject" class="form-control" required="required"') ?>
                </div>
                <div class="form-group modal-compose-mail-body">
                   <textarea name="message" placeholder="Your Message" class="form-control textarea-wysihtml5" rows="10" maxlength="250" required="required"></textarea>
                </div>
            </div>
            <div class="modal-footer">
                <button type="submit" class="btn btn-primary pull-left"><i class="fa fa-envelope-o"></i> Send</button>
                <button type="submit" name="save" value="save" class="btn btn-info"><i class="fa fa-save"></i> Save as draft</button>
                <button type="button" class="btn btn-outline-danger" data-dismiss="modal">Cancel</button>
            </div>
            <?php echo form_close() ?>
        </div><!-- /.modal-content -->
    </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>