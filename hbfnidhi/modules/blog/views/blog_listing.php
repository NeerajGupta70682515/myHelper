<?php $this->load->view('top_application');?>
<section id="cd-timeline" class="cd-container clearfix">
 
   		<?php 
		$i = 1;
		foreach($blog as $b){ ?>
        	<?php if($i%2!='0'){ ?>
            <div class="cd-timeline-block">
                <div class="cd-timeline-img cd-picture">
                </div> 
                <div class="cd-timeline-content cd-left">
                    <div class="img-blog">
                      <img src="<?php echo base_url(); ?>uploaded_files/blog/<?php echo $b['blog_image']; ?>"> 
                   </div> 
                   <div class="text-blog">
                       <h3><?php echo $b['blog_title']; ?></h3>
                       <?php echo $b['blog_description']; ?>
                   </div>
                </div> 
            <?php } else { ?>    
                
                
                <div class="cd-timeline-content cd-right">
                    <div class="img-blog">
                      <img src="<?php echo base_url(); ?>uploaded_files/blog/<?php echo $b['blog_image']; ?>"> 
                   </div> 
                   <div class="text-blog">
                       <h3><?php echo $b['blog_title']; ?></h3>
                       <?php echo $b['blog_description']; ?>
                   </div>
                </div>
            </div>
            
            <?php } ?>

		<?php $i++;  } ?>
        

        

        </section>
            
<?php $this->load->view('bottom_application');?>


