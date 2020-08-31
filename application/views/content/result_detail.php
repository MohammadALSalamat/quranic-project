<div id="note">
    <?php 
    if ($message) {
        echo $message;    
    }
    ?>
</div>

<link href="<?php echo base_url('assets/css/print-result.css') ?>" rel="stylesheet">


							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
							 <div class="float-left"> 
							 Certificate :  <strong class="card-title"><?=$brand_name?></strong>
							 </div>
                              
							 <div class="float-right">
							 <button class="btn btn-outline-info" id='btn-print' value='Print' onclick="printDiv('#invoice-box-id');"><i class="fa fa-print"></i> PRINT</button>
							 </div>
                            </div>							
                            <div class="card-body">
    <div class="row">
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                    <h3 align="center">Exam Detail</h3>
								<hr class="a1" />
								
                                                                <div class="row" align="center">
                                                                    <div class="col col-md-3">
																		<h4>Title :</h4>
																	</div>
                                                                    <div class="col-12 col-md-9">
																		<h4><?=$results->title_name?></h4>
																	</div>
                                                                </div>
								<hr class="a1" />
                                                                <div class="row" align="center" style="top: 12px;">
                                                                    <div class="col col-md-3">
																		<h4>Total Question :</h4>
																	</div>
                                                                    <div class="col-12 col-md-9">
																		<h4><?=$results->question_answered?></h4>
																	</div>
                                                                </div>
								<hr class="a1" />
                                                                <div class="row" align="center" style="top: 12px;">
                                                                    <div class="col col-md-3">
																		<h4>Passing Score :</h4>
																	</div>
                                                                    <div class="col-12 col-md-9">
																		<h4><?=$results->pass_mark?>%</h4>
																	</div>
                                                                </div>

								
                            </div>
                        </div>
                    </div>
		
		
                    <div class="col-lg-6">
                        <div class="card">
                            <div class="card-body">

                    <h3 align="center">Student Detail</h3>
								<hr class="a1" />
								
                                                                <div class="row" align="center">
                                                                    <div class="col col-md-3">
																		<h4>Name :</h4>
																	</div>
                                                                    <div class="col-12 col-md-9">
																		<h4><?=$results->user_name?></h4>
																	</div>
                                                                </div>
								<hr class="a1" />
                                                                <div class="row" align="center" style="top: 12px;">
                                                                    <div class="col col-md-3">
																		<h4>Email :</h4>
																	</div>
                                                                    <div class="col-12 col-md-9">
																		<h4><?=$results->user_email?></h4>
																	</div>
                                                                </div>
								<hr class="a1" />
                                                                <div class="row" align="center" style="top: 12px;">
                                                                    <div class="col col-md-3">
																		<h4>Phone :</h4>
																	</div>
                                                                    <div class="col-12 col-md-9">
																		<h4><?=$results->user_phone?></h4>
																	</div>
                                                                </div>

								
                            </div>
                        </div>
                    </div>			


    </div>
								
								<hr class="a2" />
						<div class="col-12">
                                                                <div class="row border-wrapper">
                                                                    <div class="col-6" align="right">
																		<h2>Result :</h2>
																	</div>
                                                                    <div class="col-6" align="left">
																		 <?=($results->result_percent >= $results->pass_mark) ? '<h2>PASS</h2>' : '<h2>FAIL</h2>' ?>
																	</div>
                                                                </div>
							<hr class="a2" />
								</div>
      <div class="col-12">
			<hr class="a3" />
			
			<p class="muted" align="center"><?=$results->user_name?>'s Score (<?=$results->result_percent?>%)</p>

                                <div class="progress mb-2">
                                    <div class="progress-bar bg-<?=($results->result_percent >= $results->pass_mark)?'success':'danger'?> progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?=$results->result_percent?>%" aria-valuenow="<?=$results->result_percent?>" aria-valuemin="0" aria-valuemax="100"><?=$results->result_percent?>%</div>
                                </div>
			
<hr class="a1" />
        </div>
			
        <div class="col-12">
			
			<p class="muted" align="center">Passing Score (<?=$results->pass_mark?>%)</p>
			
								
                                <div class="progress mb-2">
                                    <div class="progress-bar bg-success progress-bar-striped progress-bar-animated" role="progressbar" style="width: <?=$results->pass_mark?>%" aria-valuenow="<?=$results->pass_mark?>" aria-valuemin="0" aria-valuemax="100"><?=$results->pass_mark?>%</div>
                                </div>				
<hr class="a3" />
        </div>
						
				
								
								
								
								
    <div class="col-12" style="height: 200px; top: 20px">
		<div class="row">
        <div class="col-6">
			<div class="row" align="center">
                                                                    <div class="col-12">
																		<h2><?=$brand_name?> Signature :</h2>
																	</div>
				<p class="col-12">.</p>
                                                                    <div class="col-12">
																		<h2 class="col-12" style="font-family: 'Satisfy', cursive;"><?=$brand_name?></h2>
																	</div>
           </div>
        </div>
        <div class="col-6">
			<div class="row" align="center">
                                                                    <div class="col-12">
																		<h2><?=$results->user_name?> Signature :</h2>
																	</div>
				<p class="col-12">.</p>
                                                                    <div class="col-12">
																		<h2 style="font-family: 'Satisfy', cursive;"><?=$results->user_name?></h2>
																	</div>
           </div>			
        </div>
			</div>
				<hr class="a3" />

    </div>
								
								
								
								
								<div class="col-12" align="center">
								
								<div class="fancy-border" id="invoice-box-id">
									<h1 align="center">بسم الله الرحمن الرحيم</h1>
									<br>
									<h3 align="center">خيركم من تعلم القرآن وعلمه</h3>
									
							<div style="color: aliceblue;">
									
								<div class="row border-wrapper">
                                                                    <div class="col-6" align="right">
																		<h2>Result :</h2>
																	</div>
                                                                    <div class="col-6" align="left">
																		 <?=($results->result_percent >= $results->pass_mark) ? '<h2>PASS</h2>' : '<h2>FAIL</h2>' ?>
																	</div>
                                                                </div>
								
									</div>
									<div class="col-12">
                        <div class="card">
                            <div class="card-body">
								
                                                                <div class="row" align="center">
                                                                    <div class="col col-md-3">
																		<h4>Exam Title :</h4>
																	</div>
                                                                    <div class="col-12 col-md-9">
																		<h4><?=$results->title_name?></h4>
																	</div>
                                                                </div>
								<hr class="a1" />

                                                                <div class="row" align="center" style="top: 12px;">
                                                                    <div class="col col-md-3">
																		<h4>Passing Score :</h4>
																	</div>
                                                                    <div class="col-12 col-md-9">
																		<h4><?=$results->pass_mark?>%</h4>
																	</div>
                                                                </div>
								<hr class="a1" />

                                                                <div class="row" align="center" style="top: 12px;">
                                                                    <div class="col col-md-3">
																		<h4><?=$results->user_name?>'s Score :</h4>
																	</div>
                                                                    <div class="col-12 col-md-9">
																		<h4><?=$results->result_percent?>%</h4>
																	</div>
                                                                </div>
								
                            </div>
                        </div>	</div>								
									
											<div class="row" style="position: absolute; bottom: 30px;">
        <div class="col-6">
			<div class="row" align="center">
                                                                    <div class="col-12">
																		<h2 style="color: aliceblue"><?=$brand_name?> Signature :</h2><br>
																	</div>
                                                                    <div class="col-12">
																		<h2 class="col-12" style="font-family: 'Satisfy', cursive;"><?=$brand_name?></h2>
																	</div>
           </div>
        </div>
        <div class="col-6">
			<div class="row" align="center">
                                                                    <div class="col-12">
																		<h2 style="color: aliceblue"><?=$results->user_name?> Signature :</h2><br>
																	</div>
                                                                    <div class="col-12">
																		<h2 style="font-family: 'Satisfy', cursive;"><?=$results->user_name?></h2>
																	</div>
           </div>			
        </div>
			</div>
									
									</div>
								
								</div>								
								
								
								
								
								
				<br/>		
		
                     </div>	
<div class="card-footer" align="center">
    <p><strong>Note: </strong>This certificate is only valid under the terms and conditions of <?=$brand_name?>.</p>
</div>								
                      </div>
                        </div>



<script>
function printDiv(elem)
{
   renderMe($('<div/>').append($(elem).clone()).html());
}
</script>

<script>
function renderMe(data) {
    var mywindow = window.open('', 'invoice-box', 'height=1000,width=1000');
    mywindow.document.write('<html><head><title>invoice-box</title>');
    mywindow.document.write('<link rel="stylesheet" href="<?php echo base_url('assets/css/print-result.css') ?>" type="text/css" />');
    mywindow.document.write('</head><body >');
    mywindow.document.write(data);
    mywindow.document.write('</body></html>');


    setTimeout(function () {
    mywindow.print();
    mywindow.close();
    }, 1000)
    return true;
}
</script>
