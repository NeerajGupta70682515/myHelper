<?php $this->load->view('top_application');?>

<section class="cd-container middle-line">
	   <a href="blog" class="back-button" style="float:left">Back</a>

<?php if(is_array($blog_details) && !empty($blog_details)){
	
			foreach($blog_details as $blgdetl){
?>
		        <div class="middle">
               <div class="img-blog-detail">
                  <img src="<?php echo get_image('blog',$blgdetl['blog_image'],1200,800);?>"> 
               </div> 
            </div>

			<div class="text-blog heading-blog" style="float:left"> 
                   <h3 style="text-align: center;"><?php echo $blgdetl['blog_title'];?></h3>
					<p><?php echo $blgdetl['blog_description'];?></p>
               </div>
			   </div>
    
<?php		
			}
	}
?>

</section>

<!-- DEMO -->
        <script type="text/javascript">
            // ===== Scroll to Top ==== 
            $(window).scroll(function() {
                if ($(this).scrollTop() >= 50) {        // If page is scrolled more than 50px
                    $('#return-to-top').fadeIn(200);    // Fade in the arrow
                } else {
                    $('#return-to-top').fadeOut(200);   // Else fade out the arrow
                }
            });
            $('#return-to-top').click(function() {      // When arrow is clicked
                $('body,html').animate({
                    scrollTop : 0                       // Scroll to top of body
                }, 500);
            });
        </script>
   </script>
   
<?php $this->load->view('bottom_application');?>