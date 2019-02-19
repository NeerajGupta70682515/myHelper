			 <!--==========================
    Top Bar
  ============================-->
  <section id="topbar" class="d-none d-lg-block">
    <div class="container clearfix">
      <div class="contact-info float-left">
        <i class="fa fa-phone"></i>Customer Support : 9971-337-447
      </div>
      <div class="social-links float-right">
        <button type="button" class="btn btn-info" style="margin-right:10px"><a href="http://hbfnidhi.com/login.aspx"><i class="fa fa-user"></i>Login</a></button>
		<button type="button" class="btn btn-info"><a href="http://hbfnidhi.com/Registration.aspx"><i class="fa fa-user"></i>New User</a></button>
      </div>
    </div>
  </section>


  <!--==========================
    Header
  ============================-->
  <header class="header">
  <div class="container">
     <div class="row">
	 <div class="col-lg-2">
      <div id="logo" class="pull-left">
        <h1><a href="<?php echo base_url(); ?>" class="scrollto"><img src="<?php echo theme_url();?>img/logo.png" alt=""></a></h1>
        <!-- Uncomment below if you prefer to use an image logo -->
        <!-- <a href="#body"><img src="img/logo.png" alt="" title="" /></a>-->
      </div>
	  </div><!-- #nav-menu-container -->
	  <div class="col-lg-10">
	<nav id="nav-menu-container">
        <ul class="nav-menu nav-bac">
          <li class="menu-active"><a href="<?php echo base_url(); ?>">HOME</a></li>
          <li class="menu-has-children"><a href="#">ABOUT US</a>
		     <ul>
              <li><a href="<?php echo base_url();?>pages/aboutus">Our Company</a></li>
              <li><a href="<?php echo base_url();?>our_team/">Our Team</a></li>
              <li><a href="<?php echo base_url();?>pages/shareholders">Shareholders</a></li>
            </ul>
		  </li>
          <li class="menu-has-children"><a href="#">OUR PRODUCT</a>
		  <ul>
          <?php
          		$data	=  $this->home_model->get_all_product();
				foreach($data as $prdct){
		 ?>		
				 <li><a href="<?php echo base_url("product/details")."/".$prdct['product_id'];?>"><?php echo $prdct['product_title'];?></a></li>
		 <?php		
				}
		  ?>
             <li><a href="<?php echo base_url();?>pages/lockers">Lockers</a></li>
          </ul>        
          
          </li>
          <li><a href="<?php echo base_url();?>pages/doorservices">DOORSTEPS SERVICES</a></li>
          <li><a href="<?php echo base_url();?>pages/csr">CSR</a></li>
          <li><a href="<?php echo base_url('pages/careers');?>">CAREERS</a></li>
          <li><a href="<?php echo base_url('pages/contact_us');?>">CONTACT</a></li>
		  <li><i class="fa fa-search"></i></li>
        </ul>
      </nav>
	  </div>
	  </div>
	  </div>
  </header><!-- #header -->
