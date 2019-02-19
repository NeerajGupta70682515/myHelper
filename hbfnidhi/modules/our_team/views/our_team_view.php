<?php $this->load->view("top_application");?>

   <div class="banner">
         <img src="<?php echo base_url();?>uploaded_files/team/inner-banner.jpg" class="img-responsive">
   </div>
   
   
   <section id="team">
   
   <div class="container">
   
         <h4>OUR TEAM</h4>
   
   	<?php if(is_array($team) && !empty($team)){
		
		foreach($team as $tm){
	?>
	
    <div class="row margin-top3">
    
    	<div class="col-md-3">
        <?php if($tm['image'] == "" || empty($tm['image'])){
		
		?>
        	<img src="<?php echo base_url();?>uploaded_files/team/DefaultMale.jpg" class="img-responsive" style="height:200px; width:100%;">
        <?php	   
		}else{
		?>
        	<img src="<?php echo base_url();?>uploaded_files/team/<?php echo $tm['image'];?>" class="img-responsive" style="height:200px; width:100%;">
        <?php		
		}?>
           
   
        </div>
   	    
        <div class="col-md-9">
        	<h5 style="font-size:1.4em;"><strong><?php echo $tm['our_team_name']?></strong></h5>
            <h6 style="font-size: 1.1em; color:#034e72;"><?php echo $tm['our_team_designation']?></h6>
               <p><?php echo $tm['our_team_description']?></p>
                
                <p>Sachin heads the board at HBF Nidhi Limited and has been the key factor behind the concept</p>
                
                <div class="linkdins"><a href="#" target="_blank">in</a></div>
            </div>
        </div>
        <div class="clearfix"></div>
		<br />
	<?php
		}   
	}
	?>
    
    </div>
    </section>


<?php $this->load->view("bottom_application");?>