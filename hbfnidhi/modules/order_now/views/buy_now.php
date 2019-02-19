<?php $this->load->view('top_application');?>

 
  <section class="global-page-header about-us2">
                <div class="container">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="block">
                               
                            </div>
                        </div>
                    </div>
                </div>
            </section>

            <section id="main">

                <div class="container">
                    <div class="row">

                        <div class="col-xs-12 col-sm-5 col-md-5 pb10">
                           <img src="<?php echo base_url();?>buynow.jpg" class="img-responsive">
                        </div>
						<?php $a = $this->uri->segment(2);  ?>

                        <article class="col-xs-12 col-sm-7 col-md-7">
                        <?php echo form_open('order-now/'.$a,'class="form-horizontal"');?>
						  <?php echo error_message();?>
						  <?php //echo validation_message();?>
							<fieldset>

							  <!-- Form Name -->
							  <legend>Please Fill up Details</legend>

							  <!-- Text input-->
							  <div class="form-group">
								<label class="col-sm-2 control-label" for="textinput">Name</label>
								<div class="col-sm-10">
								  <input type="text" name="billing_name" value="<?php echo set_value('billing_name');?>" placeholder="Name" class="form-control">
								  <?php echo form_error('billing_name'); ?>
								</div>
							  </div>

							  <!-- Text input-->
							  <div class="form-group">
								<label class="col-sm-2 control-label" for="textinput">Email</label>
								<div class="col-sm-10">
								  <input type="text" name="billing_email" value="<?php echo set_value('billing_email');?>" placeholder="Email" class="form-control">
								  <?php echo form_error('billing_email'); ?>
								</div>
							  </div>
							  
							  
							  <!-- Text input-->
							  <div class="form-group">
								<label class="col-sm-2 control-label" for="textinput">Phone Number</label>
								<div class="col-sm-10">
								  <input type="text" name="billing_phone" value="<?php echo set_value('billing_phone');?>" placeholder="Phone Number" class="form-control">
								  <?php echo form_error('billing_phone'); ?>
								</div>
							  </div>

						  
						  <!-- Text input-->
							  <div class="form-group">
								<label class="col-sm-2 control-label" for="textinput">Address </label>
								<div class="col-sm-10">
								  <input type="text" name="billing_address" value="<?php echo set_value('billing_address');?>"  placeholder="Address" class="form-control">
								  <?php echo form_error('billing_address'); ?>
								</div>
							  </div>
							  
							  <!-- Text input-->
							  <div class="form-group">
								<label class="col-sm-2 control-label" for="textinput">City</label>
								<div class="col-sm-10">
								  <input type="text" name="billing_city" value="<?php echo set_value('billing_city');?>"  placeholder="City" class="form-control">
								  <?php echo form_error('billing_city'); ?>
								</div>
							  </div>

							  <!-- Text input-->
							  <div class="form-group">
								<label class="col-sm-2 control-label" for="textinput">State</label>
								<div class="col-sm-4">
								  <input type="text" name="billing_state" value="<?php echo set_value('billing_state');?>" placeholder="State" class="form-control">
								  <?php echo form_error('billing_state'); ?>
								</div>

								<label class="col-sm-2 control-label" for="textinput">Postcode</label>
								<div class="col-sm-4">
								  <input type="text" name="billing_zipcode" value="<?php echo set_value('billing_zipcode');?>" placeholder="Post Code" class="form-control">
								  <?php echo form_error('billing_zipcode'); ?>
								</div>
							  </div>



							  <!-- Text input-->
							  <div class="form-group">
								<label class="col-sm-2 control-label" for="textinput">Country</label>
								<div class="col-sm-10">
								  <input type="text" name="billing_country" value="<?php echo set_value('billing_country');?>" placeholder="Country" class="form-control">
								  <?php echo form_error('billing_country'); ?>
								</div>
							  </div>

							  <div class="form-group">
								<div class="col-sm-offset-2 col-sm-10">
								  <div class="pull-center">
									<!--<button type="submit" class="btn btn-default">Cancel</button>-->
									<input type="hidden" name="buy_id" value="<?php echo $a; ?>"/>
									<button type="submit" class="btn btn-primary">Submit</button>
								  </div>
								</div>
							  </div>

							</fieldset>
						  <?php echo form_close(); ?>
                        </article>
                        <!-- .content -->
                    </div>
                </div>
                <!-- .container -->
            </section>


<?php $this->load->view('bottom_application');?>