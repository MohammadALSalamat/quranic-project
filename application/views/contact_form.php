              <?=form_open(base_url('index.php/guest/contact'), 'role="form" id="contact_form" class="contact-form"'); ?>
                        <input type="hidden" name="token" value="<?=time();?>">
				
                <input type="hidden" name="to" value="username@domain.extension" />
                <div class="form-group mb-3">
				<?=form_input('name', '', 'placeholder="Your Name " class="fs-0 form-control" id="name" required="required"') ?>
                </div>
                <div class="form-group mb-3">
                  <?=form_input('email', '', 'id="email" pattern="^[a-zA-Z0-9.!#$%&'."'".'*+/=?^_`{|}~-]+@[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?(?:\.[a-zA-Z0-9](?:[a-zA-Z0-9-]{0,61}[a-zA-Z0-9])?)*$" title="you@domain.com" placeholder="Your Email Address" type="email" class="fs-0 form-control" required="required"') ?>
                </div>
				<div class="form-group mb-3">
                  <?=form_input('subject', '', 'id="subject" placeholder="Subject" class="fs-0 form-control" required="required"') ?>
                </div>
                <div class="form-group mb-3">
					<textarea name="message" id="message" required="required" class="fs-0 form-control contact-message" rows="8" placeholder="Message"></textarea>
                </div>
                <div class="zform-feedback my-2"></div>
                <button class="btn btn-block btn-light hvr-sweep-top" type="submit">SEND</button>
              <?=form_close(); ?>