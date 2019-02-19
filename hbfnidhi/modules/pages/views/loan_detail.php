<?php $this->load->view('top_application');?>

<section class="cd-container middle-line">
	   <a href="<?php echo base_url();?>" class="back-button" style="float:left">Back</a>

<?php if(is_array($loan_detail) && !empty($loan_detail)){
	
			foreach($loan_detail as $loandetl){
?>
		        <div class="middle">
               <div class="img-blog-detail">
                  <img src="<?php echo get_image('product',$loandetl['loan_process_image'],1200,800);?>"> 
               </div> 
            </div>

			<div class="text-blog heading-blog" style="float:left"> 
                   <h3 style="text-align: center;"><?php echo $loandetl['loan_process_title'];?></h3>
					<p><?php echo $loandetl['loan_process_description'];?></p>
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