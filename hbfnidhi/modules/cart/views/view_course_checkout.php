
<?php $this->load->view("top_application");?>

<?php

 $values_posted_back=(is_array($this->input->post())) ? TRUE : FALSE; 

 $is_same = $values_posted_back === TRUE ? $this->input->post('is_same') : ''; 
$productId  = (int) $this->uri->segment(3);
?>

<div class="deilbg">

<div class="container">

<div class="row">

<div class="deve">

<h2 class="white ffb pt20 "><i>Check Out</i></h2>

</div>


</div>

</div>

</div>

<div class="breadcrumb-box">

<div class="container">

<ul class="breadcrumb">

<li><a href="https://www.ecoachingindia.in/">Home</a></li>

<li class="active">Cart</li>



<li> <span class="pr2 fs14" style="color:#7f7f7f;">Checkout</span></li>



</ul>	

</div>

</div>

<section id="main">
<div class="container">
<div class="row">
	<div class="col-xs-12 col-sm-12 col-md-12">
      
      <?php echo form_open('cart/course_checkout/'.$productId); ?>
     
    <div class="main-login1 main-center ">
     <?php echo validation_message();?>
    	<div class="form-group">    
<label for="name" class="cols-sm-2 control-label">User Name:</label>
<div class="cols-sm-10">
<div class="input-group">
<span class="input-group-addon perpol"><i class="fa fa-user fa" aria-hidden="true"></i></span>
<input type="text" class="form-control"  name="first_name" id="Name" value="<?php echo set_value('first_name',$mres['first_name']); ?>" >

</div>
</div>
</div>

		<div class="form-group">
<label for="email" class="cols-sm-2 control-label">Email:</label>
<div class="cols-sm-10">
<div class="input-group">
<span class="input-group-addon perpol"><i class="fa fa-envelope fa" aria-hidden="true"></i></span>
<input name="email" id="email" type="text" class="form-control" value="<?php echo set_value('email',$mres['email']); ?>">
</div>
</div>
</div>

		<div class="form-group">
<label for="email" class="cols-sm-2 control-label">Phone:</label>
<div class="cols-sm-10">
<div class="input-group">
<span class="input-group-addon perpol"><i class="glyphicon glyphicon-phone" aria-hidden="true"></i></span>
<input name="phone_number" id="phone_number" type="text" class="form-control"  value="<?php echo set_value('phone_number',$mres['phone_number']); ?>">
</div>
</div>
</div>

<div class="form-group">
<label for="email" class="cols-sm-2 control-label">Verification Code</label>

<div class="form-group">
<div class="col-xs-12 col-sm-8 col-md-8 pl0 pr0">
<input type="text" class="form-control"name="verification_code" value="" id="verification_code" placeholder="Enter this code" >


</div>

<div class="col-xs-12 col-sm-4 col-md-4">
<img src="<?php echo site_url('captcha/normal'); ?>" class="vam bdr pt7" alt=""  id="captchaimage"/>

<a href="javascript:viod(0);" title="Change Verification Code" >
<img src="<?php echo theme_url(); ?>img/refresh.png"  alt="Refresh"  onclick="document.getElementById('captchaimage').src='<?php echo site_url('captcha/normal'); ?>/<?php echo uniqid(time()); ?>'+Math.random(); document.getElementById('verification_code').focus();" class="ml10 vam"></a>
</div>



</div>

</div>

<div class="clearfix"></div>




  
        <div class="form-group">   
    	
        <input name="reg" type="submit" class="btn login_btn" value="Proceed">
       
    	 <input name="reset" type="reset" class="btn Login_fb" value="Reset">
        </div>
    </div>
</div>
	
 
 </div>
</div>
</section>



<script type="text/javascript">var Page=''; /*  | detail */</script> 

<?php $this->load->view("bottom_application");?>