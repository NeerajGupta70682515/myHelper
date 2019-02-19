<?php $this->load->view("top_application");?>

				<div class="container" style="padding:80px 0 120px;">
            	<div class="modal-dialog">
					<div class="modal-content">
						<div class="modal-header">
							<h3 class="modal-title text-center" id="lineModalLabel">Reset password?</h3>
						</div>
						<div class="modal-body">
							
							<?php echo form_open('users/forgotten_password/');?>
                            <?php echo error_message(); ?>
				              <div class="form-group">
				                <input name="email" type="text" class="form-control" id="exampleInputEmail1" placeholder="Enter email" required="">
				              </div>
				              <button type="submit" class="btn btn-primary forgot-password-3 center-block" data-text="RESET">RESET</button>
								<input type="hidden" name="forgotme" value="yes" />
				            <?php echo  form_close(); ?>

						</div>
					</div>
				  </div>
				</div>

<?php $this->load->view("bottom_application");?>