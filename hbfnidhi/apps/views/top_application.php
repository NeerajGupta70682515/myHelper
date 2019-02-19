<!DOCTYPE html>
<html lang="en" class="no-js">
<meta http-equiv="content-type" content="text/html;charset=UTF-8" />
<head>
	 <meta charset="utf-8">
	 <meta http-equiv="Content-Type" content="text/html; charset=utf-8">
		<?php 
		$meta_rec = getMeta();
	if( array_key_exists('dynamic_meta',$meta_rec) && @is_array($meta_array) && !empty($meta_array) )
		{
    if(  array_key_exists('meta_title',$meta_array) && $meta_array['meta_title']!='')
		{
			echo '<title>'.$meta_array['meta_title'].'</title>';
		}

		if( array_key_exists('meta_description',$meta_array) && $meta_array['meta_description']!='')
		{
			echo '<meta name="description" content="'.$meta_array['meta_description'].'" />';
		}

		if( array_key_exists('meta_keyword',$meta_array) && $meta_array['meta_keyword']!='')
		{
		   echo '<meta  name="keywords" content="'.$meta_array['meta_keyword'].'" />';
		}

		}
        else
		{	
		?>
		<title><?php echo $meta_rec['meta_title'];?> </title>
		<meta name="description" content="<?php echo $meta_rec['meta_description'];?>" />
		<meta  name="keywords" content="<?php echo $meta_rec['meta_keyword'];?>" />
		<?php
		}
		?>
        <meta name="author" content="">
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0">
        <meta name="format-detection" content="telephone=no">
        <!-- Favicons -->
  <link href="<?php echo theme_url();?>img/logo.png" rel="icon">
  
  <link href="<?php echo theme_url();?>img/apple-touch-icon.png" rel="apple-touch-icon">

  <!-- Google Fonts -->
  <link href="https://fonts.googleapis.com/css?family=Open+Sans:300,300i,400,400i,700,700i|Raleway:300,400,500,700,800|Montserrat:300,400,700" rel="stylesheet">

  <!-- Bootstrap CSS File -->
  <link href="<?php echo theme_url();?>lib/bootstrap/css/bootstrap.min.css" rel="stylesheet">

  <!-- Libraries CSS Files -->
  <link href="<?php echo theme_url();?>lib/font-awesome/css/font-awesome.min.css" rel="stylesheet">
  <link href="<?php echo theme_url();?>lib/animate/animate.min.css" rel="stylesheet">
  <link href="<?php echo theme_url();?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">
  <link href="<?php echo theme_url();?>lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
  <link href="<?php echo theme_url();?>lib/magnific-popup/magnific-popup.css" rel="stylesheet">
  <link href="<?php echo theme_url();?>lib/ionicons/css/ionicons.min.css" rel="stylesheet">

  <!-- Main Stylesheet File -->
  <link href="<?php echo theme_url();?>css/style.css" rel="stylesheet">
  <link href="<?php echo theme_url();?>css/custom.css" rel="stylesheet">


  <!-- =======================================================
    Theme Name: Reveal
    Theme URL: https://bootstrapmade.com/reveal-bootstrap-corporate-template/
    Author: BootstrapMade.com
    License: https://bootstrapmade.com/license/
  ======================================================= -->
</head>
<body id="body">
<?php
  $this->load->view('project_header'); 
?>