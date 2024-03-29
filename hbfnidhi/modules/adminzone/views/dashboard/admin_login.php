<!DOCTYPE html>
<html lang="en">
	<head>
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
		<meta charset="utf-8" />
		<title><?php echo $this->config->item("site_admin"); ?></title>
        <script type="text/javascript" > var site_url = '<?php echo site_url();?>';</script>
		<meta name="description" content="User login page" />
		<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

		<!-- bootstrap & fontawesome -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/bootstrap.min.css" />
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/font-awesome/4.5.0/css/font-awesome.min.css" />

		<!-- text fonts -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/fonts.googleapis.com.css" />

		<!-- ace styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ace.min.css" />

		<!--[if lte IE 9]>
			<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ace-part2.min.css" />
		<![endif]-->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ace-rtl.min.css" />

		<!--[if lte IE 9]>
		  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ace-ie.min.css" />
		<![endif]-->

		<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

		<!--[if lte IE 8]>
		<script src="<?php echo base_url(); ?>assets/adminzone/js/html5shiv.min.js"></script>
		<script src="<?php echo base_url(); ?>assets/adminzone/js/respond.min.js"></script>
		<![endif]-->
	</head>

	<body class="login-layout light-login">
		<div class="main-container">
			<div class="main-content">
				<div class="row">
					<div class="col-sm-10 col-sm-offset-1">
						<div class="login-container">
							<div class="center">
								<h1>
									<a href="<?php echo base_url(); ?>adminzone/"><img src="<?php echo theme_url();?>img/logo.png" width="130px" alt=""/> Admin Login</a>

									
					
								</h1>
							</div>

							<div class="space-6"></div>

							<div class="position-relative">
								<div id="login-box" class="login-box visible widget-box no-border">
									<div class="widget-body">
										<div class="widget-main">
											<h4 class="header blue lighter bigger">
												<i class="ace-icon fa fa-coffee green"></i>
												Please Enter Your Information
											</h4>

											<div class="space-6"><?php  echo error_message();?></div>

				<?php echo form_open('adminzone/auth'); ?>
                <fieldset>
                <label class="block clearfix">
                
                    <span class="block input-icon input-icon-right">
                        <input type="text" name="username" value="" class="form-control" placeholder="Username" />
                        <i class="ace-icon fa fa-user"></i>
                    </span>
                    <div class="help-block col-xs-12 col-sm-reset inline"><?php echo form_error('username');?></div>
                    
                </label>
                
                
                <label class="block clearfix">
                    <span class="block input-icon input-icon-right">
                       <input type="password" name="password" value="" class="form-control" placeholder="Password" />
                        <i class="ace-icon fa fa-lock"></i>
                         <div class="help-block col-xs-12 col-sm-reset inline"><?php echo form_error('password');?></div>
                    </span>
                </label>
                
                
                <div class="space"></div>
                
                <div class="clearfix">
                    <label class="inline">
                        <input type="checkbox" class="ace" />
                        <span class="lbl"> Remember Me</span>
                    </label>
                    
                 <input type="hidden" value="login" name="action"> 
                 <input type="submit" name="sss" value="Login"  class="width-35 pull-right btn btn-sm btn-primary" />
           </div>
                
                <div class="space-4"></div>
                </fieldset>
                
                
                <?php echo form_close(); ?>


										</div><!-- /.widget-main -->

									
									</div><!-- /.widget-body -->
								</div><!-- /.login-box -->

						

						
							</div><!-- /.position-relative -->

							<!-- <div class="navbar-fixed-top align-right">
								<br />
								&nbsp;
								<a id="btn-login-light" href="#">Dark</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-blur" href="#">Blur</a>
								&nbsp;
								<span class="blue">/</span>
								&nbsp;
								<a id="btn-login-light" href="#">Light</a>
								&nbsp; &nbsp; &nbsp;
							</div>-->
						</div>
					</div><!-- /.col -->
				</div><!-- /.row -->
			</div><!-- /.main-content -->
		</div><!-- /.main-container -->

		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?php echo base_url(); ?>assets/adminzone/js/jquery-2.1.4.min.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="<?php echo base_url(); ?>assets/adminzone/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?php echo base_url(); ?>assets/adminzone/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>

		<!-- inline scripts related to this page -->
		<script type="text/javascript">
			jQuery(function($) {
			 $(document).on('click', '.toolbar a[data-target]', function(e) {
				e.preventDefault();
				var target = $(this).data('target');
				$('.widget-box.visible').removeClass('visible');//hide others
				$(target).addClass('visible');//show target
			 });
			});
			
			
			
			//you don't need this, just used for changing background
			
			 
			});
		</script>
	</body>
</html>
