<!-- script for take the old value. -->
<script type="text/javascript">
$('.update').click(function() {
    var id = $(this).attr('data-update'); // Get the id
    var value = $.trim($('#question_title-'+id).html()); //Get the old value and trimed it
    $('#input').val(value); // Set the old value intu the field
    $('#ques_id').val(id); // Set ques_id that will be updated
});
</script>

                <div class="modal fade" id="update_ques" tabindex="-1" role="dialog" aria-labelledby="mediumModalLabel" aria-hidden="true">
                    <div class="modal-dialog modal-lg" role="document">
                        <div class="modal-content">
                            <div class="modal-header">
                                <h5 class="modal-title" id="mediumModalLabel">Question Update Form</h5>
                                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                            <div class="modal-body">
        <?php echo form_open(base_url() . 'index.php/admin_control/update_question','role="form" class="form-horizontal"'); ?>
            <input type="hidden" name="ques_id" id="ques_id" value="">
            <input type="hidden" name="exam_id" value="<?=$mock_title->title_id; ?>">
                                                              <div class="row form-group">
                                                                <div class="col col-md-3"><label for="textarea-input" class=" form-control-label">Question :</label></div>
                                                                <div class="col-12 col-md-8">
																	
                <?php 
                $data = array(
                    'name'        => 'question',
                    'id'          => 'input',
                    'value'       => '',
                    'rows'        => '3',
                    'class'       => 'form-control',
                    'required' => 'required',
                ); ?>
               <?php echo form_textarea($data) ?>																	
																  </div>
																  </div>
          <p class="col-sm-offset-3 col-xs-offset-1"><i class="glyphicon glyphicon-warning-sign text-warning"></i><span class="text-muted"> Must be at least 8 characters in length.</span></p>
                                                                 </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Cancel</button>
                                <?php echo form_submit('submit', 'Save', 'class="btn btn-primary"') ?>
                                  <?php echo form_close() ?>
                            </div>
                        </div>
                    </div>
                </div>


