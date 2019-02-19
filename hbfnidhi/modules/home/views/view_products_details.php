<?php $this->load->view('top_application');?>

  <!--==========================
    Intro Section
  ============================-->
  <section id="intro">
    <div id="intro-carousel" class="owl-carousel" >
      <?php if($homebanner!=''){
                for($i=0; $i<count($homebanner); $i++){
              ?>
      <div class="item" style="background-image: url('<?php echo base_url();?>uploaded_files/banner/<?php echo $homebanner[$i]->banner_image; ?>');"></div>
      <?php } } ?>
    </div>
	
  </section>
  
  <!-- #intro -->


  <!--==========================
    Saving Accounting
  ============================-->
  
  
   <section id="saving-account">
   <div class="container">
       <div class="row">
           <div class="col-md-8">
               
               <?php if(is_array($res) && !empty($res)){
						foreach($res as $prdt){
				?>
						<?php echo $prdt['product_title']; ?>
                <?php
				}}?>
			   
               
               
               <?php if(is_array($res) && !empty($res)){
						foreach($res as $prdt){							
							
				?>
                		<p><img src="<?php echo get_image("product",$prdt['product_image1'],150,150); ?>" style="float:left;margin-right:10px;"> 
                        <?php echo $prdt['product_description']; ?>
                        </p>
                <?php
							
														
						}				   	
				   }	   
			   
			   ?>
               
           </div>
           
           <div class="col-md-4">
               <iframe src="form.aspx"></iframe>
               <a href="forms_pdf/HBFSAVINGSACCOUNT3.pdf" class="btn btn-primary" style=" float: right; height: 61px; margin-right: 14%; margin-top: 2%; padding-top: 18px; position: relative; vertical-align: middle; ">Download Saving Form</a>
               <br/>
               <br/>
               <iframe width="100%" height="200" src="https://www.youtube.com/embed/Hh5Bhxu37So" frameborder="0" allowfullscreen=""></iframe>
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