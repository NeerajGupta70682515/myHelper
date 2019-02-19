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
      About Section
    ============================-->
    <section class="wow section2">
      <div class="container about">
        <div class="row">
         <ul class="navbar">
         <?php if(is_array($product) && !empty($product))
            {
             foreach($product as $p)
              {?>
                <li>
                    <a href="product/details/<?php echo $p['product_id'];?>">
                      <img src="<?php echo get_image('product',$p['product_image'],'132','99 ','R'); ?>" alt="">
                    </a>
                </li>

          
           <?php } } ?>
         </ul>
        </div>

      </div>
    </section><!-- #about -->

    <!--==========================
      Services Section
    ============================-->
  <section id="products">
      <div class="container">
        <div class="section-header">
          <h2>OUR PRODUCTS</h2>
        </div>

        <div class="row">
         <div class="owl-carousel clients-carousel">
          <?php if(is_array($product_sort) && !empty($product_sort))
            {
             foreach($product_sort as $ps)
              {?>
          <div class="col-lg-12">
            <div class="box">
              <div class="icon">
                <img src="<?php echo get_image('product',$ps['product_image1'],'400','375 ','R'); ?>" style="max-width:100%" alt=""></div>
              <a href="product/details/<?php echo $ps['product_id'];?>"><h4 class="title" style="color:black;"><?php echo char_limiter(strip_tags($ps['product_title']),20);?></h4>
              <p class="description" style="color:black;"><?php echo char_limiter(strip_tags($ps['product_description']),150);?></p></a>
            </div>
          </div>
          <?php } } ?>
      </div>

        </div>

      </div>
    </section>
     <section id="services">
      <div class="container">
        <div class="section-header">
          <h2> PLAN YOUR FINANCES</h2>
        </div>

	     <div class="row">

		<?php if(is_array($service) && !empty($service)){
				foreach($service as $ser){
		?>
        <div class="col-lg-4 col-md-4 col-sm-12">
           	<div class="box">
           		<div class="ico"><img src="<?php echo base_url();?>uploaded_files/service/<?php echo $ser['service_image1']; ?>"></div>
              <h4 class="title"><a href="#"><?php echo $ser['service_title']; ?></a></h4>
              <p class="description" ><?php echo character_limiter($ser['service_description'],150);?></p>
			  <button class="btn btn-info bttn"><a href="<?php echo base_url('pages/intrest_chart'); ?>">Read More</a></button>
         	</div>
         </div>
        
        <?php			
			}			
		}
		?>
         
        
          </div>
       </div>
    </section>
    <!-- #services -->
    
    
    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">

        <div class="section-header">
          <h2>SIMPLE LOAN PROCESS</h2>
         
        </div>

        <div class="owl-carousel clients-carousel">
        
        <?php if(is_array($loan_process) && !empty($loan_process)){
			$count = 0;
			foreach($loan_process as $lp){
				$count++;
		?>		  
		 <div class="col-lg-12">
         	
            
            <?php if($count == 0){ ?>
            <div class="circle-icon">
				 <i class="fa fa-file-text-o" aria-hidden="true"></i>
            </div>
            <?php } ?>
         		
       		<?php if($count == 1){?>
            <div class="circle-icon">
				 <i class="fa fa-edit" aria-hidden="true"></i>
            </div>
            <?php } ?>
            
			<?php if($count == 2){ ?>
            <div class="circle-icon">
				 <i class="fa fa-check-circle-o" aria-hidden="true"></i>
            </div>
            <?php } ?>
            
			<?php if($count == 3){ $count = 0;?>
            <div class="circle-icon">
				 <i class="fa fa-inr" aria-hidden="true"></i>
            </div>
            <?php } ?>
       		
            <div class="circle-para">
       			<h2><?php echo $lp['loan_process_title'];?></h2>
       			<p><a href="<?php echo base_url('pages/loan_detail')?>/<?php echo $lp['loan_process_id']; ?>" style="color:black;"><?php echo character_limiter($lp['loan_process_description'],100);?></a></p>
       		</div>
            
      	</div>
		<?php			  
			}}
		?>
       
        </div>
        
       <div class="row line">
        <nav class="nav-pager">
        <ul>
        <li><span>1</span></li>
        <li><span>2</span></li>
        <li><span>3</span></li>
        <li><span>4</span></li>
      </ul>
      </nav>
      </div>
      </div>
    </section><!-- #clients -->

   

    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Testimonials</h2>
       
        </div>
        <div class="owl-carousel testimonials-carousel">
            <?php if(is_array($testimonials) && !empty($testimonials))
            {
             foreach($testimonials as $t)
              {?>
            <div class="testimonial-item">
       <div class="image">
         <img src="<?php echo get_image('testimonials',$t['testimonials_image'],'400','375 ','R'); ?>" class="testimonial-img" alt="">
       </div>
       <div class="heading">
        <h3>Saul Goodman</h3>
              <h4>Ceo &amp; Founder</h4>
              <p>
                Proin iaculis purus consequat sem cure digni ssim donec porttitora entum suscipit rhoncus.
              </p>
        </div>
              </div>
            <?php } }?>

        </div>

      </div>
    </section>
    <!-- #testimonials -->

   <section id="contact" class="wow fadeInUp">

  <iframe src="https://www.google.com/maps/embed?pb=!1m23!1m12!1m3!1d4165.977450540974!2d77.3173018624359!3d28.595111388810352!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!4m8!3e6!4m5!1s0x390ce4f0fb252dab%3A0x5540ec78e53e6d5b!2sC-16%2C+Sector+6%2C+Noida%2C+Uttar+Pradesh+110096!3m2!1d28.595032!2d77.318578!4m0!5e0!3m2!1sen!2sin!4v1492175439292" style="border:0" allowfullscreen="" width="100%" height="300px" frameborder="0"></iframe>

                          
	</section>	

<?php $this->load->view('bottom_application');?>