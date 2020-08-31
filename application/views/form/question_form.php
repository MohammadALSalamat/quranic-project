<!-- Dynamic Form Script-->
<script type="text/javascript">
    //Add basic 4 fields initially
  var i = 5, s;
    function add_form(val) {
      //  alert(val);
        i = 5;
        var opt = '<div class="row form-group"><div class="col col-md-3"><label class=" form-control-label"></label></div><div class="col-12 col-md-8">';
            opt += '<p class="text-primary"><i class="fa fa-warning"></i> Select correct answer/s from left redio/checkbox options.</p>';
            opt += '</div></div>';

        for (q = 1; q <= 4; q++) {
            opt += '<div class="row form-group">';
            opt += '<div class="col col-md-3">';
            opt += '<label for="options[' + q + ']" class="form-control-label">Option ' + q + ': </label>';
            opt += '</div>';
            opt += '<div class="col-12 col-md-8">';
            opt += '<div class="input-group">';
            opt += '<span class="input-group-addon">';
            if (val == 'Radio') {
                opt += '<input type="' + val + '" name="ans" onclick="put_right_ans(' + q + ')" required="required">  <span class="invisible-on-sm"> Correct Ans.</span>';
            } else if (val == 'Checkbox') {
                opt += '<input type="' + val + '" name="right_ans[' + q + ']">  <span class="invisible-on-sm"> Correct Ans.</span>';
            }
            opt += '</span>';
            if (q <= 2) {
                opt += '<input name="options[' + q + ']" class="form-control" type="text" required="required">';
            }
            if (q > 2) {
                opt += '<input name="options[' + q + ']" class="form-control" type="text">';
            }
            opt += '</div></div></div>';
        }
        opt += '<div id="add_more_field-5"></div>';
        opt += '<div class="form-group">';
        opt += '<label class="col-sm-offset-0 col-lg-2 col-xs-offset-1 col-xs-3 control-label mobile">&nbsp;</label><div class="col-lg-5 col-sm-8 col-xs-7 col-mb">';
        opt += '<button type="button" class="btn btn-info" id="add_btn" onclick="add_field()"><icon class="icon-plus"></icon> Add More Options</button>';
        opt += '</div></div>';
        document.getElementById('options').innerHTML = opt;
    }

    //Add more fields
    function add_field() {
        var type;
        if (document.getElementById('radio1').checked) {
            type = 'radio';
        } else if (document.getElementById('checkbox1').checked) {
            type = 'checkbox';
        }
        if (i <= 8) {
            var str = '<div class="form-group"><div class="col col-md-3"><label for="options[' + i + ']" class="form-control-label">Option ' + i + ': </label></div>';
            str += '<div class="col-12 col-md-8">';
            str += '<div class="input-group">';
            str += '<span class="input-group-addon">';
            if (type === 'radio') {
                str += '<input type="' + type + '" name="ans" onclick="put_right_ans(' + i + ')" required="required">  <span class="invisible-on-sm"> Correct Ans.</span>';
            } else if (type === 'checkbox') {
                str += '<input type="' + type + '" name="right_ans[' + i + ']">  <span class="invisible-on-sm"> Correct Ans.</span>';
            }    
            str += '</span>';
            str += '<input name="options[' + i + ']" class="form-control" type="text">';
            str += '</div></div></div><div id="add_more_field-' + (i + 1) + '"></div>';

            document.getElementById('add_more_field-' + i).innerHTML = str;
            i++;
        } else {
            alert('You added maximum number of options!');
        }
    }

    //Pick the righ answers and set the value to hidden field
    function put_right_ans(val) {
        var ryt = '<input type="hidden" name="right_ans[' + val + ']" value="on">';
        document.getElementById('hidden_fields').innerHTML = ryt;
    }
</script>

<?=($this->session->flashdata('message')) ? $this->session->flashdata('message') : '';?>  

            <div class="col-12">
                <?=validation_errors('<div class="alert alert-danger">', '</div>'); ?>
            </div>

                                            <div class="col-lg-12">
                                                <div class="card">
                                                    <div class="card-header">
														<div class="float-left">Exam : <strong><?=$exam->title_name; ?></strong></div>
                                                       <div class="float-right"><?='Question No: '.$question_no; ?></div>
                                                    </div>
                                                    <div class="card-body card-block">
    <?=form_open_multipart(base_url('index.php/admin_control/add_question/'.$exam->title_id), 'role="form" class="form-horizontal"'); ?>

                                                            <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="textarea-input" class=" form-control-label">Question : </label>
																</div>
                                                                <div class="col-12 col-md-8">
																	
					<?php 
                    $data = array(
                        'name'        => 'question',
                        'placeholder' => 'Question Title',
                        'value'       => '',
                        'rows'        => '2',
                        'class'       => 'form-control textarea-wysihtml5',
                        'required' => 'required',
                    ); ?>
                    <?=form_textarea($data) ?>
																
																</div>
                                                            </div>	
														
														        <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label for="upload-media-file" class=" form-control-label">Upload Media File :</label>
																	</div>
                                                                <div class="col-12 col-md-8">
																	<div id="media-choose"><a href="#" class="btn btn-outline-secondary" id='upload-media-file'>Choose</a></div>
																	            <div id="media-option"></div>
																	            <div id="media-field"></div>
																	</div>
                                                                     </div>	
														
														        <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label class=" form-control-label">Answer Type :</label>
																	</div>
                                                                <div class="col-12 col-md-8">
																	<label class="radio-inline">
                        <input type="radio" id="radio1" name="ans_type" required="required" value="Radio" onclick="add_form(this.value)"> <span>Radio </span>&nbsp;&nbsp;&nbsp;&nbsp;
                    </label>
                    <label class="radio-inline">
                        <input type="radio" id="checkbox1" name="ans_type" required="required" value="Checkbox" onclick="add_form(this.value)"> <span>Check Box</span>
                    </label>
																	</div>
                                                                     </div>	
														

																	<div id="options"> </div>

														
														        <div class="row form-group">
                                                                <div class="col col-md-3">
																	<label class=" form-control-label"></label>
																	</div>
                                                                <div class="col-12 col-md-8">
																	<div id="progressBar" style="display:none;"><br/><img src="<?=base_url('assets/images/progress.gif')?>" /></div>
																	</div>
                                                                     </div>																
														
                <div class="col-12" align="center">
					<hr/>
                    <button type="submit" onclick="$('#progressBar').show();" class="btn btn-primary"> <i class="fa fa-plus-square"></i> Save and Add More</button>
                    <button type="submit" onclick="$('#progressBar').show();" class="btn btn-info" name="done" value="done"><i class="fa fa-check-square-o"></i> Save and Done</button>
                </div>
            </form>
													
                                                </div></div></div>


<?php include 'application/views/plugin_scripts/bootstrap-wysihtml5.php';?>

<!-- Dynamic media file upload Script-->
<script type="text/javascript">
$('#upload-media-file').click(function(){
    var type = '<div class="form-group">'
                +'<div class="col-12">'
                        +'<input type="radio" value="youtube" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>YouTube </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="video" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Video </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="image" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Image </span>&nbsp;&nbsp;&nbsp;&nbsp;'
                        +'<input type="radio" value="audio" name="media_type" required="required" onclick="add_media_field(this.value)"> <span>Audio </span>'
                +'</div>'
            +'</div>';
    $('#media-choose').hide();
    $('#media-option').append(type);
})

//Add media fields
function add_media_field(val) {
    var field = '<div class="form-group">'
                +'<div class="col-12"><input type="hidden" name="media_type" value="'+val+'">';
    if (val == 'video') {
            var types = 'mp4 | webm | ogg';
    }else if (val == 'audio') {
            var types = 'ogg | mp3 | wav';        
    }else if (val == 'image') {
            var types = 'gif | jpg | png';
    };

    switch(val){
        case 'youtube':
            field += '<input type="text" class="form-control" name="media">';
            break;
        case 'video':
        case 'image':
        case 'audio':
            field += '<input type="file" id="media" name="media" style="margin-top:8px;">';
            field += '<p class="help-block"><i class="fa fa-warning"></i> Allowed types = '+ types +'.</p>';
            break;
    }
    field +='</div></div>';

    $('#media-option').hide();
    $('#media-field').append(field);
}
</script>
