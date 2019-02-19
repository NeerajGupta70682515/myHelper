<?php $this->load->view('top_application');?>

<section id="cd-timeline" class="cd-container">

        
<?php
		if(is_array($blog) && !empty($blog)){
	
			$count = 0;
			foreach($blog as $blg){
?>
		
<?php
			 	$timestamp = strtotime($blg['recv_date']);
			 	$N_date = date('d/m/Y',$timestamp);
				
				if($count == 0){
					$count++;
?>
		 <div class="cd-timeline-block">
        	<div class="date-list">
              <a href="<?php echo base_url('pages/blog');?>/<?php echo $blg['blog_id'];?>" class="d-one"><?php echo $N_date;?></a>            
            </div> 
			
             <div class="cd-timeline-content cd-left">
               <div class="img-blog">
                  	<img src="<?php echo get_image('blog',$blg['blog_image'],800,500);?>"> 
               </div> 
               <div class="text-blog">
                   <h3><a href="<?php echo base_url('pages/blog');?>/<?php echo $blg['blog_id'];?>"><?php echo $blg['blog_title'];?></a></h3>
                   <p><?php echo character_limiter($blg['blog_description'],300);?></p>
               </div>
            </div>   
      
<?php		

				}else{
					$count = 0;
?>
			<div class="date-list">
                <a href="<?php echo base_url('pages/blog');?>/<?php echo $blg['blog_id'];?>" class="d-two"><?php echo $N_date;?></a>
            </div> 
            
            <div class="cd-timeline-content cd-right">
               <div class="img-blog">
					<img src="<?php echo get_image('blog',$blg['blog_image'],800,500);?>"> 
               </div> 
               <div class="text-blog">
                   <h3><a href="<?php echo base_url('pages/blog');?>/<?php echo $blg['blog_id'];?>"><?php echo $blg['blog_title'];?></a></h3>
                   <p><?php echo character_limiter($blg['blog_description'],300);?></p>
               </div>
            </div>
			</div>      
            <br/>

<?php					
				}
?>

<?php 			
				
			}
?>

<?php
		}
		
?>   
        
  </section>
  
<?php $this->load->view('bottom_application');?>