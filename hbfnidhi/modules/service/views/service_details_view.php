<?php $this->load->view('top_application');?>

  <!--==========================
    Intro Section
  ============================-->
  <div class="banner">
  
  
  <?php if($res['product_image'] != '' && !empty($res['product_image'])){?>
                        <img src="<?php echo get_image("product",$res['product_image'],500,500);?>" style="height:200px;"  class="img-responsive">
  <?php } else{?>
  
   <img src="<?php echo get_image("banner","banner50js1.jpg",1200,500);?>"  style="height:200px;" class="img-responsive">
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
					echo $res['product_title']; 
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
           
           <div class="col-md-4">
               <iframe src="#" width="100%" height="200"></iframe>
               <a href="forms_pdf/HBFSAVINGSACCOUNT3.pdf" class="btn btn-primary" style=" float: right; height: 61px; margin-right: 14%; margin-top: 2%; padding-top: 18px; position: relative; vertical-align: middle; ">Download Saving Form</a>
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

<?php $this->load->view('bottom_application');?>