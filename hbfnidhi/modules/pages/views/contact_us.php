<?php $this->load->view('top_application');?>

   <div class="banner">
        <img src="<?php echo base_url();?>uploaded_files/team/inner-banner.jpg" class="img-responsive">
   </div>
  <section id="contact-inner">
  <div class="container">
                <div class="row">
				   <div class="col-sm-6 col-md-6 col-xs-12">
                            <h3>Enquiry Form</h3>
                            <div class="divider">
                                <span></span>
                            </div>
                            
                            
                            <div class="container">
                            
                           <?php echo validation_message();?>
						   <?php echo error_message(); ?>  
                            
                            <?php echo form_open("pages/contact_us",'method="post"'); ?>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-sm-3" for="name">Name:</label>
                                        <div class="col-sm-9">
                                            <input name="name" type="text" id="txtName" class="form-control" placeholder="Enter your name" value="<?php echo set_value('name');?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-sm-3" for="Nunber">Mobile no.:</label>
                                        <div class="col-sm-9">
                                            <input name="mobile" type="text" id="txtnumber" class="form-control" placeholder="Enter your phone number" value="<?php echo set_value('mobile');?>">
                                        </div>
                                    </div>


                                </div>
                                <div class="row">
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-sm-3" for="Email">Email id:</label>
                                        <div class="col-sm-9">
                                            <input name="email" type="text" id="txtEmail" class="form-control" placeholder="Enter your mail address" value="<?php echo set_value('email');?>">
                                        </div>
                                    </div>
                                    <div class="form-group col-md-12">
                                        <label class="control-label col-sm-3" for="City">City:</label>
                                        <div class="col-sm-9">
                                            <input name="city" type="text" id="txtCity" class="form-control" placeholder="Enter your City" value="<?php echo set_value('city');?>">
                                        </div>
                                    </div>
<div class="form-group col-md-12">
                                        <label class="control-label col-sm-3" for="City">Message:</label>
                                        <div class="col-sm-9">
                                            <textarea name="message" id="txtmsg" class="form-control" placeholder="Type your message" value="<?php echo set_value('message');?>"></textarea>
                                        </div>
                                    </div>

                                </div>
                                <div class="row  pull-rit">
                                    <input type="submit" name="btnbutton" value="Continue" onclick="return ValidateEmail();" id="btnbutton" class="btn btn-primary pull-right" style="margin-right:6%;">
                                </div>
                                
                                <?php echo form_close();?>
                                
                                 <div class="row">
                              <span id="lblmsg"></span>
                                     </div>
                            </div>
                            <br>


                        </div>
                        <div class="col-sm-6 col-md-6 col-xs-12">
                            <div class="col-sm-6 col-md-6 col-xs-12" style="padding-left:5%">

                                <h3>Our Address</h3>
                                <div class="divider">
                                    <span></span>
                                </div>
                                <p>
                                    <strong>HBF NIDHI LTD.</strong><br>
                                    <strong>Add:</strong> C - 16, Sector - 6, Noida, UP (India) <br>
                                    <strong>Pin Code:</strong> 201301 <br>
                                    <strong>Email:</strong> Info@hbfnidhi.com<br>
                                    <strong>Contact:</strong> 0120-4752255

                                </p>
                            </div>

                            <div class="clearfix"></div>


                        </div>

                        <div class="col-sm-12 col-md-12 col-xs-12">
                            <h3>Location</h3>
                            <div class="divider">
                                <span></span>
                            </div>
                            <div class="row">
                                <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d4165.977450540974!2d77.3173018624359!3d28.595111388810352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m5!1s0x390ce4f0fb252dab%3A0x5540ec78e53e6d5b!2sC-16%2C+Sector+6%2C+Noida%2C+Uttar+Pradesh+110096!3m2!1d28.595032!2d77.318578!4m0!5e0!3m2!1sen!2sin!4v1492175439292" style="border:0" allowfullscreen="" width="100%" height="300px" frameborder="0"></iframe>

                            </div>
                            <br>


                        </div>
                    </div>
                </div>

            </div>
        </section>
        

<?php $this->load->view('bottom_application');?>