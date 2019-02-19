<?php $this->load->view('project_footer'); ?> 
        
  <a href="#" class="back-to-top"><i class="fa fa-chevron-up"></i></a>

  <!-- JavaScript Libraries -->
  <script src="<?php echo theme_url();?>lib/jquery/jquery.min.js"></script>
  <script src="<?php echo theme_url();?>lib/jquery/jquery-migrate.min.js"></script>
  <script src="<?php echo theme_url();?>lib/bootstrap/js/bootstrap.bundle.min.js"></script>
  <script src="<?php echo theme_url();?>lib/easing/easing.min.js"></script>
  <script src="<?php echo theme_url();?>lib/superfish/hoverIntent.js"></script>
  <script src="<?php echo theme_url();?>lib/superfish/superfish.min.js"></script>
  <script src="<?php echo theme_url();?>lib/wow/wow.min.js"></script>
  <script src="<?php echo theme_url();?>lib/owlcarousel/owl.carousel.min.js"></script>
  <script src="<?php echo theme_url();?>lib/magnific-popup/magnific-popup.min.js"></script>
  <script src="<?php echo theme_url();?>lib/sticky/sticky.js"></script>
  <script src="https://maps.googleapis.com/maps/api/js?key=AIzaSyD8HeI8o-c1NppZA-92oYlXakhDPYR7XMY"></script>
  <!-- Contact Form JavaScript File -->
  <script src="<?php echo theme_url();?>contactform/contactform.js"></script>

  <!-- Template Main Javascript File -->
  <script src="<?php echo theme_url();?>js/main.js"></script>
 <script>
            $(document).ready(function() {
              var owl = $('.owl-carousel');
              owl.owlCarousel({
                items: 4,
                loop: true,
                margin: 10,
                autoplay: true,
                autoplayTimeout: 1000,
                autoplayHoverPause: true
              });
              
            })
          </script>
</body>
</html>
