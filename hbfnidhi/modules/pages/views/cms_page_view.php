<?php $this->load->view("top_application");?>

<!-- COMPANY OVERVIEW -->
<section class="about-bg">
	<div class="container">
		<h2 style="color:#fff"><b><?php echo $content['page_name'];?></b></h2>
	</div>
</section>


<section>
<div class="container">
	<div class="row">
	<?php if($content['image']!=""){?>
		<div class="col-md-6 animate fadeInRight">
			<div class="image-widget">
				<img src="<?php echo base_url();?>uploaded_files/pages_image/<?php echo $content['image'];?>" class="img-shadow" alt="">
			</div>
		</div>
		
		
		<div class="col-md-6 animate fadeInLeft mb10">
			<div class="height-10"></div>
			<?php echo $content['page_description'];?>
		</div>
	<?php } else { ?>
		<div class="col-md-12 animate fadeInLeft mb10">
			<div class="height-10"></div>
			<?php echo $content['page_description'];?>
		</div>
	<?php } ?>
	</div>
</div>
</section>





<?php $this->load->view('newsletter-subscribe');?>

<?php $this->load->view("bottom_application");?>