<?php $this->load->view('top_application');?>

<section id="gallery">
    <div class="container">
    
	  <h2>Gallery</h2>
     <div class="row gallery">
       
<?php if(is_array($gallery) && !empty($gallery)){
	
		foreach($gallery as $glry){
?>
		 <div class="col-md-4">
		    <div class="gallery-img">
			   <img src="<?php echo get_image('gallery',$glry['gallery_image'],1000,500);?>" alt="" data-toggle="modal" data-bigimage="<?php echo get_image('gallery',$glry['gallery_image'],1000,500);?>" data-target="#myModal" class="img-fluid">
		    </div>
		 </div>
<?php	
				
		}
	}?>

  
	  
	    
		
	   </div>
	   <div class="modal fade" id="myModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">

      
      <div class="modal-body">

       <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>        

                <img src="" alt="" id="image" class="img-fluid">

        
        
      </div>

    </div>
  </div>
</div> 
	</div>
  </section>
 
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
		  <script>
		    $(document).ready(function() {

// Gets the video src from the data-src on each button
var $imageSrc;  
$('.gallery img').click(function() {
    $imageSrc = $(this).data('bigimage');
});
console.log($imageSrc);
  
  
  
// when the modal is opened autoplay it  
$('#myModal').on('shown.bs.modal', function (e) {
    
// set the video src to autoplay and not to show related video. Youtube related video is like a box of chocolates... you never know what you're gonna get

$("#image").attr('src', $imageSrc ); 
})
  
  
// reset the modal image
$('#myModal').on('hide.bs.modal', function (e) {
    // a poor man's stop video
    $("#image").attr('src',''); 
}) 
    
    


  
  
// document ready  
});

</script>

<?php $this->load->view('bottom_application');?>