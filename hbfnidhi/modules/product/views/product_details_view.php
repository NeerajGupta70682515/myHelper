<?php $this->load->view('top_application');?>

  <!--==========================
    Intro Section
  ============================-->
  <div class="banner">
  
  
  <?php if($res['product_image'] != '' && !empty($res['product_image'])){?>
        <img src="<?php echo get_image("product",$res['product_image'],500,500);?>" style="height:200px;"  class="img-responsive">
        <h2><?php echo $res['product_title'];?></h2>
  
  <?php } else{?>
  	   <img src="<?php echo get_image("banner","banner50js1.jpg",1200,500);?>"  style="height:200px;" class="img-responsive">
        <h2><?php echo $res['product_title'];?></h2>
   <?php } ?>
   </div>
  
  <!-- #intro -->


  <!--==========================
    Saving Accounting
  ============================-->
  
  
   <section id="saving-account">
   <div class="container">
       <div class="row">
           <div class="col-md-8">
               
              <h2>
			    <?php if(is_array($res) && !empty($res)){
				
				}?>
			   
                </h2>
                              
                <?php if(is_array($res) && !empty($res)){
							
				?>
                    <p align="justify"><img src="<?php echo get_image("product",$res['product_image1'],150,150); ?>" style="float:left;margin-right:10px;"> 
                    <?php echo $res['product_description']; ?>
                    </p>
                <?php
					}	
		 	    ?>
               
           </div>
           
           <div class="col-md-4" >
              
            <?php /*Starting Enquiry Form*/ ?>
			<div style="background-color:#dfdbff; padding:10px; border-radius:10px;">				
		        <center> <h4>Enquiry Form </h4></center>
               <span id="success" style="color:green; font-weight:bold;"></span>
               <br />
                
                Name : <input type="text"  name="name" class="form-control" id="name"/>
                <span style="color:red; font-size:12px;" id="errName"></span>
                              Mobile : <input type="text" name="mobile" id="mobile" class="form-control"/>
                <span id="errMobile" style="color:red; font-size:12px;"></span>
              
                Email : <input type="text" name="email" id="email" class="form-control"/>
                <span id="errEmail" style="color:red; font-size:12px;"></span>
                
                City :	 <input type="text" name="city" id="city" class="form-control"/>
				<span id="errCity" style="color:red; font-size:12px;"></span>
                <br />
                <button name="submit" id="btn_enquiry" onClick="enquiry()" class="btn btn-info">Submit</button>
  
            </div>
            
           <?php /*Ending Enquiry Form*/ ?>
              	
              
          <a href="<?php echo base_url('pages/application_form');?>" class="btn btn-primary" style=" height: 61px; margin-right: 14%; margin-top: 2%; padding-top: 18px; position: relative; vertical-align: middle; ">Download Application Form</a>
            <br />
          <div class="col-md-12">
           <br />&nbsp;
          <iframe width="100%" height="200" src="https://www.youtube.com/embed/Hh5Bhxu37So" frameborder="0" allowfullscreen=""></iframe>
          </div>
          </div>
          </div>
          <div class="clearfix"></div>
          </div>
    </div>
    </section>

  <!--==========================
    Footer
  ============================-->
  
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
			   	alert("Hi, "+ cn + " Successfully Enquiry.");
				document.getElementById('success').innerHTML = "Hi, "+ cn + " Successfully Send Enquiry.";
				document.getElementById('name').value = "";
				document.getElementById('mobile').value = "";
				document.getElementById('city').value = "";
				document.getElementById('email').value = "";
		    }
		});
		
		}

	}

</script>

<?php $this->load->view('bottom_application');?>