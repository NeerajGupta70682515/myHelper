<section class="subscribe-1">
<div class="container">
	<div class="row">
		<div class="col-xs-12 col-sm-offset-2 col-sm-8 text-center">
			<div class="row mt20 mb20">
			</div>
			<h5 class="white ac">Subscribe Our Newsletter To Get Latest News</h5>
			 <?php echo form_open('newsletter'); ?>
		   <?php //echo validation_message();?>
			 <?php echo error_message(); ?>
			<div id="custom-search-input ">
				<div class="input-group searchbox">
					<input type="email" name="email" class="form-control subscribe-input" placeholder="Enter email id Address">
					<span class="input-group-btn">
						<button class="btn btn-primary subscribe-btn-1" type="submit" data-text="Subscribe"> Subscribe </button>
					</span>
				</div>
			</div>
			
			<?php echo form_close(); ?>
		</div>
	</div>
</div>
</section>