<?php $this->load->view("top_application");?>


<div class="deilbg">

<div class="container">

<div class="row">

<div class="col-xs-12 col-sm-12 col-md-12">

	<div class="contactus">

			<h1 class="white fs80 ffb fs80"><i>Invoics</i></h1>

    </div>

</div>    

</div>

</div>

</div>
 
<div class="breadcrumb-box">

  <div class="container">

    <ul class="breadcrumb">

      <li><a href="https://www.ecoachingindia.in/home">Home</a> </li>

      <li class="active">Profile</li>

    </ul>	

  </div>

</div>
   
<div class="container">
<div class="row">
   

  

 <?php echo invoice_content($ordmaster,$orddetail,'not_shiw_print');?>

 

<div class="mt20"> <img src="<?php echo theme_url(); ?>img/print-icon.png" alt="" style="vertical-align:middle; margin-right:5px;" /> <a href="<?php echo base_url();?>cart/print_invoice" class="invoice" style="color:#000; vertical-align:middle;">Print Invoice</a></div>

 

 <?php echo form_open('payment');?>

 <div class="mt25 p10 shadow1">

        <p class="fs20  green">Make Payment</p>

        <p class="bdrB2 mt5"></p>

        <p class="b fs13 mt10">Select a payment method</p>

        <p class="fs11 verd pt5">

		<?php $result=cms_page_content("tbl_cms_pages",10); 

		  		echo $result->page_description;;

		  ?> </p>

        <div class="mt15">

          <p class="fl">

            <input name="pay_method" type="radio" id="pay_method" value="paypal" checked />

            <img src="<?php echo theme_url(); ?>img/mycrd1.png" alt="" class="vam" /></p>

          <!--p class="fl ml20">

            <input type="radio" name="pay_method" id="pay_method" value="paypal" />

            <img src="<?php echo theme_url(); ?>img/mycrd2.png" alt="" class="vam" /></p>

          <p class="fl ml20">

            <input type="radio" name="pay_method" id="pay_method" value="paypal" />

            <img src="<?php echo theme_url(); ?>img/mycrd3.png" alt="" class="vam" /></p>

          <p class="fl ml20">

            <input type="radio" name="pay_method" id="pay_method" value="paypal" />

            <img src="<?php echo theme_url(); ?>img/mycrd4.png" alt="" class="vam" /></p>

          <p class="fl ml20">

            <input type="radio" name="pay_method" id="pay_method" value="paypal" />

            <img src="<?php echo theme_url(); ?>img/mycrd5.png" alt="" class="vam" /></p -->

          <p class="cb"></p>

        </div>

      </div>

      

      <p class="mt20 mb10"><input name="input" type="submit" class="button-style2" value="Make Payment"  /></p>

      <?php echo form_close();?>

    
</div>
</div>

<script type="text/javascript">var Page=''; /*  | detail */</script> 

<?php $this->load->view("bottom_application");?>