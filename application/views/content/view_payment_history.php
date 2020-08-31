               <div class="row">
                    <div class="col-lg-12">


										
										
                                            
                    
							<div class="col-lg-12">
                        <div class="card">
						 <div class="card-header">
                                <strong class="card-title">Payment history</strong>
                            </div>							
                            <div class="card-body">
                                <table class="table table-striped">
            <thead>
                <tr>
                    <th>Sl.</th>
                    <th>Payment Date</th>
                    <th>PayerID</th>
                    <th>Gateway Reference</th>
                    <th>Pay Amount</th>
                    <th>Currency</th>
                    <th>Reference</th>
                    <th>Student Name</th>
                </tr>
            </thead>
            <tbody>
            <?php $i = 1;
            foreach ($payments as $payment) { ?>
                <tr class="<?=($i & 1) ? 'even' : 'odd'; ?>">
                    <td><?=$i;?></td>
                    <td><?=$payment->pay_date;?></td>
                    <td><?=$payment->payer_id;?></td>
                    <td><?=$payment->gateway_reference;?></td>
                    <td><?=$payment->pay_amount;?></td>
                    <td><?=$payment->currency_code;?></td>
                    <td><?=$payment->payment_reference;?></td>
                    <td><?=$payment->user_name;?></td>
                </tr>
            <?php $i++;
            } ?>
            </tbody>
        </table>
                            </div>
                        </div>
                    </div>	

										

                    </div>
					</div>

