<?php $this->load->view("top_application");?>

  <div class="banner">
  		<img src="<?php echo get_image("banner","banner50js1.jpg",1200,500);?>"  style="height:200px;" class="img-responsive">
  </div>
  
  <section id="lokers">
     <div class="container">
            <h4 class="text-center">LOCKERS</h4>
            <div class="row">
            
            <div class="col-md-8 col-md-offset-2">
                <h3 class="text-center" style="margin-bottom:20px;"><strong>To BOOK A LOCKER</strong></h3>
                <div class="divider">
                    <span></span>
                </div>
                <div class="container">
                
                <?php echo error_message();?>
                <?php echo validation_message();?>
                
                    <div class="row">
                        <div class="form-group col-md-12">
                        
                        <?php echo form_open('pages/lockers','method="post"')?>
                            <label class="control-label col-sm-3" for="name">Name:</label>
                            <div class="col-sm-9">
                                <input name="name" type="text" id="txtName" class="form-control" required="" placeholder="Enter you name" value="<?php echo set_value('name');?>">
                            </div>
                        </div>
                        <div class="form-group col-md-12">
                            <label class="control-label col-sm-3" for="Nunber">Mobile.no.:</label>
                            <div class="col-sm-9">
                                <input name="mobile" type="text" id="txtnumber" class="form-control" placeholder="Enter your phone number" value="<?php echo set_value('mobile');?>">
                            </div>
                        </div>


                    </div>
                    <div class="row">
                        <div class="form-group col-md-12">
                            <label class="control-label col-sm-3" for="Email">Email id:</label>
                            <div class="col-sm-9">
                                <input name="email" type="email" id="txtEmail" class="form-control" placeholder="Enter you mail address" value="<?php echo set_value('email');?>">
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
                    
                    <div class="form-group col-md-12">
                         <input type="submit" name="btnbutton" value="Continue" onclick="return ValidateEmail();" id="btnbutton" class="btn btn-primary " style="margin-right:6%;">
                    </div>
                    
                    <?php echo form_close();?>
                    
                <div class="row">
                    <span id="lblmsg"></span>
                </div>
                </div>

<div class="clearfix" style="margin-top:3%;"></div>

    </div>
    </div>
   
    </div>

   </section>
  
<?php $this->load->view("bottom_application");?>