<?php $this->load->view('includes/header'); ?>
 	<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
							<li>
								<i class="ace-icon fa fa-home home-icon"></i>
								<a href="<?php echo base_url();?>adminzone">Dashboard</a>
							</li>

							<li>
								<a href="<?php echo base_url();?>adminzone/setting"><?php echo $heading_title; ?></a>
							</li>
							<li class="active">Update <?php echo $heading_title; ?></li>
						</ul><!-- /.breadcrumb -->
					</div>

					<div class="page-content">
						

						<div class="page-header">
							<h1>
							<?php echo $heading_title; ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									Update <?php echo $heading_title; ?>
								</small>
							</h1>
						</div><!-- /.page-header -->

						<div class="row">
							<div class="col-xs-12">
							
        <?php echo error_message(); ?>
             <?php echo validation_message(); ?>
             
             

  <?php echo form_open('adminzone/social_profile_setting/edit/', 'class="form-horizontal "role="form"');?>  
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Facebook : </label>

										<div class="col-sm-9">
											<input type="text" name="facebook"  size="80" value="<?php echo set_value('facebook',$social_info['facebook']); ?>">
            <?php echo form_error('facebook');?>
										</div>
									</div>
										
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Google+  : </label>

										<div class="col-sm-9">
											<input type="text" name="google"  size="80" value="<?php echo set_value('google',$social_info['google']); ?>">
            <?php echo form_error('google');?>
										</div>
									</div>	
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Instagram :</label>

										<div class="col-sm-9">
											 <input type="text" name="instagram"  size="80" value="<?php echo set_value('instagram',$social_info['instagram']); ?>">
            <?php echo form_error('instagram');?>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">linkedIn :</label>

										<div class="col-sm-9">
											 <input type="text" name="linkedIn"  size="80" value="<?php echo set_value('linkedIn',$social_info['linkedIn']); ?>">
            <?php echo form_error('linkedIn');?>
										</div>
									</div>
								
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Twitter : </label>

										<div class="col-sm-9">
											  <input type="text" name="twitter"  size="80" value="<?php echo set_value('twitter',$social_info['twitter']); ?>">
            <?php echo form_error('twitter');?>
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Youtube : </label>

										<div class="col-sm-9">
											<input type="text" name="youtube"  size="80" value="<?php echo set_value('youtube',$social_info['youtube']); ?>">
            <?php echo form_error('youtube');?>
										</div>
									</div>
								
								
	

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
										 <input type="hidden" name="social_id" value="<?php echo $social_info['social_id']; ?>" />
											<button class="btn btn-info"type="submit" value="Update Info">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Update
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
										</div>
									</div>

									<div class="hr hr-24"></div>

					<?php echo form_close(); ?>

								<div class="hr hr-18 dotted hr-double"></div>

							</div>
						</div>
					</div>
				</div>
			</div>
<?php $this->load->view('includes/footer'); ?>