<?php $this->load->view("top_application");?>

  <div class="banner">  
  <?php if(is_array($banner) != '' && !empty($banner)){?>
		<img src="<?php echo get_image("banner",$banner[0]->banner_image,500,500);?>" style="height:200px;"  class="img-responsive">        
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
	 </div>
  </section>
  
<?php $this->load->view("bottom_application");?>