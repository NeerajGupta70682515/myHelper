<!DOCTYPE html>
<html lang="en">
<head>

<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
<meta charset="utf-8" />
<title><?php  echo $this->config->item("site_admin"); ?></title>
<script type="text/javascript" > var site_url = '<?php echo site_url();?>';</script>

<meta name="description" content="overview &amp; stats" />
<meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0" />

<!-- bootstrap & fontawesome -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/bootstrap.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/font-awesome/4.5.0/css/font-awesome.min.css" />

<!-- page specific plugin styles -->
		<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/jquery-ui.min.css" />
	
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ui.jqgrid.min.css" />
<!-- text fonts -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/fonts.googleapis.com.css" />

<!-- ace styles -->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ace.min.css" class="ace-main-stylesheet" id="main-ace-style" />

<!--[if lte IE 9]>
    <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ace-part2.min.css" class="ace-main-stylesheet" />
<![endif]-->
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ace-skins.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ace-rtl.min.css" />

<script type="text/javascript" src="<?php echo base_url(); ?>assets/adminzone/js/jquery/jquery-1.7.1.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/adminzone/js/jquery-2.1.4.min.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/adminzone/js/jquery/ui/jquery-ui-1.8.16.custom.min.js"></script>
<link type="text/css" href="<?php echo base_url(); ?>assets/adminzone/js/jquery/ui/themes/ui-lightness/jquery-ui-1.8.16.custom.css" rel="stylesheet" />

<script type="text/javascript" src="<?php echo base_url(); ?>assets/adminzone/js/jquery/tabs.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/adminzone/js/jquery/superfish/js/superfish.js"></script>
<script type="text/javascript" src="<?php echo base_url(); ?>assets/adminzone/js/common.js"></script>
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/jquery-ui.custom.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/chosen.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/bootstrap-datepicker3.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/bootstrap-timepicker.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/daterangepicker.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/bootstrap-datetimepicker.min.css" />
<link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/bootstrap-colorpicker.min.css" />

<!--[if lte IE 9]>

 
 
 
  <link rel="stylesheet" href="<?php echo base_url(); ?>assets/adminzone/css/ace-ie.min.css" />
<![endif]-->

<!-- inline styles related to this page -->

<!-- ace settings handler -->
<script src="<?php echo base_url(); ?>assets/adminzone/js/ace-extra.min.js"></script>

<!-- HTML5shiv and Respond.js for IE8 to support HTML5 elements and media queries -->

<!--[if lte IE 8]>
<script src="<?php echo base_url(); ?>assets/adminzone/js/html5shiv.min.js"></script>
<script src="<?php echo base_url(); ?>assets/adminzone/js/respond.min.js"></script>
<![endif]-->
</head>

<body class="no-skin">
<div id="navbar" class="navbar navbar-default ace-save-state">
<div class="navbar-container ace-save-state" id="navbar-container">
<button type="button" class="navbar-toggle menu-toggler pull-left" id="menu-toggler" data-target="#sidebar">
<span class="sr-only">Toggle sidebar</span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>

<span class="icon-bar"></span>
</button>

<div class="navbar-header pull-left">
<a href="<?php echo base_url();?>adminzone" class="navbar-brand">
<small>
<img src="<?php echo base_url(); ?>assets/adminzone/images/avatars/use.png" height="30" width="40" alt="Jason's Photo" />
<?php echo $this->config->item("site_admin_name"); ?>
</small>
</a>
</div>

<div class="navbar-buttons navbar-header pull-right" role="navigation">
<ul class="nav ace-nav">
<!--<li class="grey dropdown-modal">
<a data-toggle="dropdown" class="dropdown-toggle" href="#">
<i class="ace-icon fa fa-tasks"></i>
<span class="badge badge-grey">4</span>
</a>

<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
<li class="dropdown-header">
<i class="ace-icon fa fa-check"></i>
4 Tasks to complete
</li>

<li class="dropdown-content">
<ul class="dropdown-menu dropdown-navbar">
<li>
<a href="#">
<div class="clearfix">
<span class="pull-left">Software Update</span>
<span class="pull-right">65%</span>
</div>

<div class="progress progress-mini">
<div style="width:65%" class="progress-bar"></div>
</div>
</a>
</li>

<li>
<a href="#">
<div class="clearfix">
<span class="pull-left">Hardware Upgrade</span>
<span class="pull-right">35%</span>
</div>

<div class="progress progress-mini">
<div style="width:35%" class="progress-bar progress-bar-danger"></div>
</div>
</a>
</li>

<li>
<a href="#">
<div class="clearfix">
<span class="pull-left">Unit Testing</span>
<span class="pull-right">15%</span>
</div>

<div class="progress progress-mini">
<div style="width:15%" class="progress-bar progress-bar-warning"></div>
</div>
</a>
</li>

<li>
<a href="#">
<div class="clearfix">
<span class="pull-left">Bug Fixes</span>
<span class="pull-right">90%</span>
</div>

<div class="progress progress-mini progress-striped active">
<div style="width:90%" class="progress-bar progress-bar-success"></div>
</div>
</a>
</li>
</ul>
</li>

<li class="dropdown-footer">
<a href="#">
See tasks with details
<i class="ace-icon fa fa-arrow-right"></i>
</a>
</li>
</ul>
</li>

<li class="purple dropdown-modal">
<a data-toggle="dropdown" class="dropdown-toggle" href="#">
<i class="ace-icon fa fa-bell icon-animated-bell"></i>
<span class="badge badge-important">8</span>
</a>

<ul class="dropdown-menu-right dropdown-navbar navbar-pink dropdown-menu dropdown-caret dropdown-close">
<li class="dropdown-header">
<i class="ace-icon fa fa-exclamation-triangle"></i>
8 Notifications
</li>

<li class="dropdown-content">
<ul class="dropdown-menu dropdown-navbar navbar-pink">
<li>
<a href="#">
<div class="clearfix">
<span class="pull-left">
<i class="btn btn-xs no-hover btn-pink fa fa-comment"></i>
New Comments
</span>
<span class="pull-right badge badge-info">+12</span>
</div>
</a>
</li>

<li>
<a href="#">
<i class="btn btn-xs btn-primary fa fa-user"></i>
Bob just signed up as an editor ...
</a>
</li>

<li>
<a href="#">
<div class="clearfix">
<span class="pull-left">
<i class="btn btn-xs no-hover btn-success fa fa-shopping-cart"></i>
New Orders
</span>
<span class="pull-right badge badge-success">+8</span>
</div>
</a>
</li>

<li>
<a href="#">
<div class="clearfix">
<span class="pull-left">
<i class="btn btn-xs no-hover btn-info fa fa-twitter"></i>
Followers
</span>
<span class="pull-right badge badge-info">+11</span>
</div>
</a>
</li>
</ul>
</li>

<li class="dropdown-footer">
<a href="#">
See all notifications
<i class="ace-icon fa fa-arrow-right"></i>
</a>
</li>
</ul>
</li>

<li class="green dropdown-modal">
<a data-toggle="dropdown" class="dropdown-toggle" href="#">
<i class="ace-icon fa fa-envelope icon-animated-vertical"></i>
<span class="badge badge-success">5</span>
</a>

<ul class="dropdown-menu-right dropdown-navbar dropdown-menu dropdown-caret dropdown-close">
<li class="dropdown-header">
<i class="ace-icon fa fa-envelope-o"></i>
5 Messages
</li>

<li class="dropdown-content">
<ul class="dropdown-menu dropdown-navbar">
<li>
<a href="#" class="clearfix">
<img src="<?php echo base_url(); ?>assets/adminzone/images/avatars/avatar.png" class="msg-photo" alt="Alex's Avatar" />
<span class="msg-body">
<span class="msg-title">
<span class="blue">Alex:</span>
Ciao sociis natoque penatibus et auctor ...
</span>

<span class="msg-time">
<i class="ace-icon fa fa-clock-o"></i>
<span>a moment ago</span>
</span>
</span>
</a>
</li>

<li>
<a href="#" class="clearfix">
<img src="<?php echo base_url(); ?>assets/adminzone/images/avatars/avatar3.png" class="msg-photo" alt="Susan's Avatar" />
<span class="msg-body">
<span class="msg-title">
<span class="blue">Susan:</span>
Vestibulum id ligula porta felis euismod ...
</span>

<span class="msg-time">
<i class="ace-icon fa fa-clock-o"></i>
<span>20 minutes ago</span>
</span>
</span>
</a>
</li>

<li>
<a href="#" class="clearfix">
<img src="<?php echo base_url(); ?>assets/adminzone/images/avatars/avatar4.png" class="msg-photo" alt="Bob's Avatar" />
<span class="msg-body">
<span class="msg-title">
<span class="blue">Bob:</span>
Nullam quis risus eget urna mollis ornare ...
</span>

<span class="msg-time">
<i class="ace-icon fa fa-clock-o"></i>
<span>3:15 pm</span>
</span>
</span>
</a>
</li>

<li>
<a href="#" class="clearfix">
<img src="<?php echo base_url(); ?>assets/adminzone/images/avatars/avatar2.png" class="msg-photo" alt="Kate's Avatar" />
<span class="msg-body">
<span class="msg-title">
<span class="blue">Kate:</span>
Ciao sociis natoque eget urna mollis ornare ...
</span>

<span class="msg-time">
<i class="ace-icon fa fa-clock-o"></i>
<span>1:33 pm</span>
</span>
</span>
</a>
</li>

<li>
<a href="#" class="clearfix">
<img src="<?php echo base_url(); ?>assets/adminzone/images/avatars/avatar5.png" class="msg-photo" alt="Fred's Avatar" />
<span class="msg-body">
<span class="msg-title">
<span class="blue">Fred:</span>
Vestibulum id penatibus et auctor  ...
</span>

<span class="msg-time">
<i class="ace-icon fa fa-clock-o"></i>
<span>10:09 am</span>
</span>
</span>
</a>
</li>
</ul>
</li>

<li class="dropdown-footer">
<a href="inbox.html">
See all messages
<i class="ace-icon fa fa-arrow-right"></i>
</a>
</li>
</ul>
</li>-->

<li class="light-blue dropdown-modal">
<a data-toggle="dropdown" href="#" class="dropdown-toggle">
<img class="nav-user-photo" src="<?php echo base_url(); ?>assets/adminzone/images/avatars/user.jpg" alt="Jason's Photo" />
<span class="user-info">
<small>Welcome,</small>
Admin
</span>

<i class="ace-icon fa fa-caret-down"></i>
</a>

<ul class="user-menu dropdown-menu-right dropdown-menu dropdown-yellow dropdown-caret dropdown-close">
<li>
<a href="<?php echo base_url();?>adminzone/setting">
<i class="ace-icon fa fa-cog"></i>
Settings
</a>
</li>

<!--<li>
<a href="profile.html">
<i class="ace-icon fa fa-user"></i>
Profile
</a>
</li>-->

<li class="divider"></li>

<li>
<a href="<?php echo base_url();?>adminzone/logout">
<i class="ace-icon fa fa-power-off"></i>
Logout
</a>
</li>
</ul>
</li>
</ul>
</div>
</div><!-- /.navbar-container -->
</div>

<div class="main-container ace-save-state" id="main-container">
<script type="text/javascript">
try{ace.settings.loadState('main-container')}catch(e){}
</script>

<div id="sidebar" class="sidebar                  responsive                    ace-save-state">
<script type="text/javascript">
try{ace.settings.loadState('sidebar')}catch(e){}
</script>
<!--/.sidebar-shortcuts-->

<?php $this->load->view('includes/leftmenu'); ?>

<!-- /.nav-list -->


<div class="sidebar-toggle sidebar-collapse" id="sidebar-collapse">
<i id="sidebar-toggle-icon" class="ace-icon fa fa-angle-double-left ace-save-state" data-icon1="ace-icon fa fa-angle-double-left" data-icon2="ace-icon fa fa-angle-double-right"></i>
</div>
</div>