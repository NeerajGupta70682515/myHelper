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

						<div class="nav-search" id="nav-search">
							<form class="form-search">
								<span class="input-icon">
									<input type="text" placeholder="Search ..." class="nav-search-input" id="nav-search-input" autocomplete="off" />
									<i class="ace-icon fa fa-search nav-search-icon"></i>
								</span>
							</form>
						</div><!-- /.nav-search -->
					</div>

					<div class="page-content">
						<div class="ace-settings-container" id="ace-settings-container">
							<div class="btn btn-app btn-xs btn-warning ace-settings-btn" id="ace-settings-btn">
								<i class="ace-icon fa fa-cog bigger-130"></i>
							</div>

							<div class="ace-settings-box clearfix" id="ace-settings-box">
								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<div class="pull-left">
											<select id="skin-colorpicker" class="hide">
												<option data-skin="no-skin" value="#438EB9">#438EB9</option>
												<option data-skin="skin-1" value="#222A2D">#222A2D</option>
												<option data-skin="skin-2" value="#C6487E">#C6487E</option>
												<option data-skin="skin-3" value="#D0D0D0">#D0D0D0</option>
											</select>
										</div>
										<span>&nbsp; Choose Skin</span>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-navbar" autocomplete="off" />
										<label class="lbl" for="ace-settings-navbar"> Fixed Navbar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-sidebar" autocomplete="off" />
										<label class="lbl" for="ace-settings-sidebar"> Fixed Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-breadcrumbs" autocomplete="off" />
										<label class="lbl" for="ace-settings-breadcrumbs"> Fixed Breadcrumbs</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-rtl" autocomplete="off" />
										<label class="lbl" for="ace-settings-rtl"> Right To Left (rtl)</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2 ace-save-state" id="ace-settings-add-container" autocomplete="off" />
										<label class="lbl" for="ace-settings-add-container">
											Inside
											<b>.container</b>
										</label>
									</div>
								</div><!-- /.pull-left -->

								<div class="pull-left width-50">
									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-hover" autocomplete="off" />
										<label class="lbl" for="ace-settings-hover"> Submenu on Hover</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-compact" autocomplete="off" />
										<label class="lbl" for="ace-settings-compact"> Compact Sidebar</label>
									</div>

									<div class="ace-settings-item">
										<input type="checkbox" class="ace ace-checkbox-2" id="ace-settings-highlight" autocomplete="off" />
										<label class="lbl" for="ace-settings-highlight"> Alt. Active Item</label>
									</div>
								</div><!-- /.pull-left -->
							</div><!-- /.ace-settings-box -->
						</div><!-- /.ace-settings-container -->

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
             

  <?php echo form_open('adminzone/setting/edit/', 'class="form-horizontal "role="form"');?>  
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Old Password : </label>

										<div class="col-sm-9">
											<input  type="password" name="old_pass" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
										
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">New Password  : </label>

										<div class="col-sm-9">
											<input type="password" name="new_pass" class="col-xs-10 col-sm-5" required />
										</div>
									</div>	
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Confirm Password :</label>

										<div class="col-sm-9">
											<input  type="password" name="confirm_password" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
								
								<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Email : </label>

										<div class="col-sm-9">
											<input type="text" name="admin_email" value="<?php echo set_value('admin_email',$admin_info->admin_email);?>" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
									
									<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Phone Number : </label>

										<div class="col-sm-9">
											<input type="text" name="admin_phone" value="<?php echo set_value('admin_phone',$admin_info->phone);?>" class="col-xs-10 col-sm-5" required />
										</div>
									</div>
								
								
	<div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1"> Address : </label>

										<div class="col-sm-9">
											<textarea name="address" rows="5" cols="50" id="page_desc"  class="col-xs-10 col-sm-5" required ><?php echo set_value('address',$admin_info->address);?></textarea>
										</div>
									</div>
							

									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
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