<?php $this->load->view("top_application");?>

  <div class="banner">
  
  
  <?php if($content['image'] != '' && !empty($content['image'])){?>
                        <img src="<?php echo get_image("pages_image",$content['image'],500,500);?>" style="height:200px;"  class="img-responsive">
  <?php } else{?>
  
   <img src="<?php echo get_image("banner","banner50js1.jpg",1200,500);?>"  style="height:200px;" class="img-responsive">
   <?php } ?>
   </div>
  
  <section id="aboutus">
     <div class="container">
	    <div class="row">
		   <div class="col-lg-12">
    			
                <?php echo $content['page_description']; ?>                   
 	
           </div>
		</div>
        
              
        
        			<div class="row">
                        <div class="col-sm-6 col-md-6 col-xs-12">

                            <h4>Enquiry</h4>
                            <div class="divider">
                               <span id="success" style="color:green; font-weight:bold;"></span>
                            </div>
                            <div class="row">
                                <div class="form-horizontal" role="form" id="frmMail">
                                    <div class="form-group forms">
                                        <label for="name" class="col-sm-2 control-label">Name:</label>
                                        <div class="col-sm-10">
                                            <input id="name" class="form-control" name="name" placeholder="First &amp; Last Name" type="text">
                                            <span style="color:red; font-size:12px;" id="errName"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="email" class="col-sm-2 control-label">Email:</label>
                                        <div class="col-sm-10">
                                            <input id="email" class="form-control" name="email" placeholder="example@domain.com" type="text">
                                            <span id="errEmail" style="color:red; font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="human" class="col-sm-2 control-label">Contact:</label>
                                        <div class="col-sm-10">
                                            <input id="mobile" class="form-control" name="mobile" placeholder="Contact" type="text">
                                            <span id="errMobile" style="color:red; font-size:12px;"></span>
                                        </div>
                                    </div>
                                    <div class="form-group">
                                        <label for="human" class="col-sm-2 control-label">Address:</label>
                                        <div class="col-sm-10">
                                            <input id="city" class="form-control" name="city" placeholder="Address" type="text">
                                           <span id="errCity" style="color:red; font-size:12px;"></span>
                                        </div>
                                    </div>


                                    <div class="form-group">
                                        <div class="col-sm-10 col-sm-offset-2">
                                           <button name="submit" id="btn_enquiry" onClick="enquiry()" class="btn btn-info">Submit</button>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group" id="pnlMsg">
                                    <div class="fps-alert" id="pnlMessageCon"></div>
                                </div>
                            </div>
                        </div>
						<div class="col-sm-6 col-md-6 col-xs-12">
                            <iframe width="100%" height="275px" src="https://www.youtube.com/embed/rLnyQpHUPyQ" frameborder="0" allowfullscreen="allowfullscreen"></iframe>
                    </div>
					</div>
        </div>
        
        
        
        
	 </div>
  </section>
  
  
  <script type="text/JavaScript">
	function enquiry(){
		
		var name = document.getElementById('name').value;
		var email = document.getElementById('email').value;
		var mobile = document.getElementById('mobile').value;
		var city = document.getElementById('city').value;
		
		var cn = '';
		var cmob = '';
		var cc = '';
		var ce = '';
		
		if(name.trim().length == 0 || name.trim().length >= 50){
			document.getElementById('errName').innerHTML = "<b style='color:black;'>*</b>  Please Fill the Name Maximum at Least 30 Character.<br>";
		}else{
			var letters = /^[A-Za-z\s]+$/g;
		    if(name.match(letters))
		    {
		      document.getElementById('errName').innerHTML = "";
			  cn = name.trim();		      
		    }
		    else{
		      document.getElementById('errName').innerHTML = "<b style='color:black;'>*</b>  Please Input Alphabet Characters Only in Name Field.<br>";
			}
		}
		
		
		
		
		if(email.trim().length == 0){
			document.getElementById('errEmail').innerHTML = "<b style='color:black;'>*</b>  Please Fill the Email Box.<br>";
		}else{

			var emailfilter = /^\w+[\+\.\w-]*@([\w-]+\.)*\w+[\w-]*\.([a-z]{2,4}|\d+)$/i;
			var returnval=emailfilter.test(email);
			if(returnval == false){
				document.getElementById('errEmail').innerHTML = "<b style='color:black;'>*</b>  Please Enter a Valid Email ID.<br>";	
			}else{
			document.getElementById('errEmail').innerHTML = "";
			ce = email.trim();
			}
		}
				
		
		
		if(mobile.trim().length == 0 || mobile.trim().length < 10 || mobile.trim().length > 10){
			document.getElementById('errMobile').innerHTML = "<b style='color:black;'>*</b>  Mobile Number at Least 10 Digit.<br>";
		}else{
			if(isNaN(mobile.trim())){
				document.getElementById('errMobile').innerHTML = "<b style='color:black;'>*</b>  Please Fill only Number in the Mobile Box.<br>";
			}else{
			document.getElementById('errMobile').innerHTML = "";
			cmob = mobile.trim();
			}
		}
		
		
		
		if(city.trim().length == 0 || city.trim().length >= 50){
			document.getElementById('errCity').innerHTML = "<b style='color:black;'>*</b>  Please Fill the City Maximum at Least 30 Character.<br>";
		}else{
			var letters = /^[A-Za-z\s]+$/g;
		    if(city.match(letters))
		    {
		      document.getElementById('errCity').innerHTML = "";		      
			  cc = city.trim();
		    }
		    else{
		      document.getElementById('errCity').innerHTML = "<b style='color:black;'>*</b>  Please Input Alphabet Characters Only in City Field.<br>";	
			}
		}
		
		
		
		if(cn != '' && cmob != '' && cc != '' && ce != ''){
				
			var formData = new FormData();
			formData.append('name',cn);	
			formData.append('mobile',cmob);	
			formData.append('email',ce);	
			formData.append('city',cc);
				
		$.ajax({
		    type	: "POST",
		    url		: "<?php echo base_url('product/enquiry');?>",
		    data	: formData,
		    processData	: false,
		    contentType	: false,
		    success		: function (data){
			   	
				document.getElementById('success').innerHTML = "Hi, "+ cn + " Successfully Send Your Enquiry.";
				document.getElementById('name').value = "";
				document.getElementById('mobile').value = "";
				document.getElementById('city').value = "";
				document.getElementById('email').value = "";
		    }
		});
		
		}

	}

</script>
  
  
  
  
  
<?php $this->load->view("bottom_application");?>