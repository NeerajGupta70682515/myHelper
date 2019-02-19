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
                                            <input name="name" type="text" id="txtName" class="form-control" placeholder="Enter your name" value="		<?php echo set_value('name');?>">
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
           		</div>
            </div>
        </div>
      </div>
   </div>
</section>