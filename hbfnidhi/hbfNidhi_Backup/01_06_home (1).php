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
	<!--<a class="left " href="#theCarousel" data-slide="prev"><i class="fa fa-chevron-left"></i></a>
    <a class="right" href="#theCarousel" data-slide="next"><i class="fa fa-chevron-right"></i></a>-->

  </section><!-- #intro -->



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
              <p class="description" style="color:black;"><?php echo char_limiter(strip_tags($ps['product_description']),90);?></p></a>
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
          <h2> Our Services</h2>
        </div>

        <div class="row">

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="box">
              <div class="icon"><i class="fa fa-star"></i></div>
              <h4 class="title"><a href="">Lorem Ipsum</a></h4>
              <p class="description">Voluptatum deleniti atque corrupti quos dolores et quas molestias excepturi sint occaecati cupiditate non provident etiro rabeta lingo.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="box">
              <div class="icon"><i class="fa fa-umbrella"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat tarad limino ata nodera clas.</p>
            </div>
          </div>

          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="box" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-diamond"></i></div>
              <h4 class="title"><a href="">Dolor Sitema</a></h4>
              <p class="description">Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur trinige zareta lobur trade.</p>
            </div>
          </div>
      </div>
        <div class="row">
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="box" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-star"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>
          <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="box" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-umbrella"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>
       <div class="col-lg-4 col-md-4 col-sm-12">
            <div class="box" data-wow-delay="0.2s">
              <div class="icon"><i class="fa fa-diamond"></i></div>
              <h4 class="title"><a href="">Magni Dolores</a></h4>
              <p class="description">Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum rideta zanox satirente madera</p>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #services -->

    <!--==========================
      Clients Section
    ============================-->
    <section id="clients" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>SIMPLE LOAN PROCESS</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>

        <div class="owl-carousel clients-carousel">
      <div class="col-lg-12">
           <div class="circle-icon">
         <i class="fa fa-edit" aria-hidden="true"></i>
       </div>
       <div class="circle-para">
       <h2>CHOOSE LOAN AMOUNT</h2>
       <p>CHOOSE YOUR LOAN AMOUNT AND TERMS TO USE LOAN</p>
       </div>
      </div>
                <div class="col-lg-12">
           <div class="circle-icon">
         <i class="fa fa-file-text-o" aria-hidden="true"></i>
       </div>
       <div class="circle-para">
       <h2>CHOOSE LOAN AMOUNT</h2>
       <p>CHOOSE YOUR LOAN AMOUNT AND TERMS TO USE LOAN</p>
       </div>
      </div>
                <div class="col-lg-12">
           <div class="circle-icon">
         <i class="fa fa-check-circle-o" aria-hidden="true"></i>
       </div>
       <div class="circle-para">
       <h2>CHOOSE LOAN AMOUNT</h2>
       <p>CHOOSE YOUR LOAN AMOUNT AND TERMS TO USE LOAN</p>
       </div>
      </div>
              <div class="col-lg-12">
           <div class="circle-icon">
         <i class="fa fa-inr" aria-hidden="true"></i>
       </div>
       <div class="circle-para">
       <h2>CHOOSE LOAN AMOUNT</h2>
       <p>CHOOSE YOUR LOAN AMOUNT AND TERMS TO USE LOAN</p>
       </div>
      </div>
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
      Our Portfolio Section
    ============================-->
    <!--<section id="portfolio" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Portfolio</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>
      </div>

      <div class="container-fluid">
        <div class="row no-gutters">

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/1.jpg" class="portfolio-popup">
                <img src="img/portfolio/1.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 1</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/2.jpg" class="portfolio-popup">
                <img src="img/portfolio/2.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 2</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/3.jpg" class="portfolio-popup">
                <img src="img/portfolio/3.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 3</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/4.jpg" class="portfolio-popup">
                <img src="img/portfolio/4.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 4</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/5.jpg" class="portfolio-popup">
                <img src="img/portfolio/5.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 5</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/6.jpg" class="portfolio-popup">
                <img src="img/portfolio/6.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 6</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/7.jpg" class="portfolio-popup">
                <img src="img/portfolio/7.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 7</h2></div>
                </div>
              </a>
            </div>
          </div>

          <div class="col-lg-3 col-md-4">
            <div class="portfolio-item wow fadeInUp">
              <a href="img/portfolio/8.jpg" class="portfolio-popup">
                <img src="img/portfolio/8.jpg" alt="">
                <div class="portfolio-overlay">
                  <div class="portfolio-info"><h2 class="wow fadeInUp">Portfolio Item 8</h2></div>
                </div>
              </a>
            </div>
          </div>

        </div>

      </div>
    </section><!-- #portfolio -->

    <!--==========================
      Testimonials Section
    ============================-->
    <section id="testimonials" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Testimonials</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
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
    </section><!-- #testimonials -->

    <!--==========================
      Call To Action Section
    ============================-->
    <!--<section id="call-to-action" class="wow fadeInUp">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 text-center text-lg-left">
            <h3 class="cta-title">Call To Action</h3>
            <p class="cta-text"> Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum.</p>
          </div>
          <div class="col-lg-3 cta-btn-container text-center">
            <a class="cta-btn align-middle" href="#">Call To Action</a>
          </div>
        </div>

      </div>
    </section><!-- #call-to-action -->

    <!--==========================
      Our Team Section
    ============================-->
    <!--<section id="team" class="wow fadeInUp">
      <div class="container">
        <div class="section-header">
          <h2>Our Team</h2>
        </div>
        <div class="row">
          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-1.jpg" alt=""></div>
              <div class="details">
                <h4>Walter White</h4>
                <span>Chief Executive Officer</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-2.jpg" alt=""></div>
              <div class="details">
                <h4>Sarah Jhinson</h4>
                <span>Product Manager</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-3.jpg" alt=""></div>
              <div class="details">
                <h4>William Anderson</h4>
                <span>CTO</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>

          <div class="col-lg-3 col-md-6">
            <div class="member">
              <div class="pic"><img src="img/team-4.jpg" alt=""></div>
              <div class="details">
                <h4>Amanda Jepson</h4>
                <span>Accountant</span>
                <div class="social">
                  <a href=""><i class="fa fa-twitter"></i></a>
                  <a href=""><i class="fa fa-facebook"></i></a>
                  <a href=""><i class="fa fa-google-plus"></i></a>
                  <a href=""><i class="fa fa-linkedin"></i></a>
                </div>
              </div>
            </div>
          </div>
        </div>

      </div>
    </section><!-- #team -->

    <!--==========================
      Contact Section
    ============================-->
    <!--<section id="contact" class="wow fadeInUp">
  <div id="google-map" data-latitude="40.713732" data-longitude="-74.0092704"></div>
      <!--<div class="container">
        <div class="section-header">
          <h2>Contact Us</h2>
          <p>Sed tamen tempor magna labore dolore dolor sint tempor duis magna elit veniam aliqua esse amet veniam enim export quid quid veniam aliqua eram noster malis nulla duis fugiat culpa esse aute nulla ipsum velit export irure minim illum fore</p>
        </div>

        <div class="row contact-info">

          <div class="col-md-4">
            <div class="contact-address">
              <i class="ion-ios-location-outline"></i>
              <h3>Address</h3>
              <address>A108 Adam Street, NY 535022, USA</address>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-phone">
              <i class="ion-ios-telephone-outline"></i>
              <h3>Phone Number</h3>
              <p><a href="tel:+155895548855">+1 5589 55488 55</a></p>
            </div>
          </div>

          <div class="col-md-4">
            <div class="contact-email">
              <i class="ion-ios-email-outline"></i>
              <h3>Email</h3>
              <p><a href="mailto:info@example.com">info@example.com</a></p>
            </div>
          </div>

        </div>
      </div>

      

      <div class="container">
        <div class="form">
          <div id="sendmessage">Your message has been sent. Thank you!</div>
          <div id="errormessage"></div>
          <form action="" method="post" role="form" class="contactForm">
            <div class="form-row">
              <div class="form-group col-md-6">
                <input type="text" name="name" class="form-control" id="name" placeholder="Your Name" data-rule="minlen:4" data-msg="Please enter at least 4 chars" />
                <div class="validation"></div>
              </div>
              <div class="form-group col-md-6">
                <input type="email" class="form-control" name="email" id="email" placeholder="Your Email" data-rule="email" data-msg="Please enter a valid email" />
                <div class="validation"></div>
              </div>
            </div>
            <div class="form-group">
              <input type="text" class="form-control" name="subject" id="subject" placeholder="Subject" data-rule="minlen:4" data-msg="Please enter at least 8 chars of subject" />
              <div class="validation"></div>
            </div>
            <div class="form-group">
              <textarea class="form-control" name="message" rows="5" data-rule="required" data-msg="Please write something for us" placeholder="Message"></textarea>
              <div class="validation"></div>
            </div>
            <div class="text-center"><button type="submit">Send Message</button></div>
          </form>
        </div>

      </div>-->
   

<?php $this->load->view('bottom_application');?>