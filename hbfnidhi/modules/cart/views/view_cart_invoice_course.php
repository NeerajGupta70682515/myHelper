<?php $this->load->view("top_application");?>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p12-16">
    <h1>Invoice</h1>
   
    <section><!--Starts-->
      <div style="margin-top:10px; text-align:justify; padding:10px; border-radius:5px; border:solid 1px #ccc">
  
 <?php echo invoice_content1($ordmaster,$orddetail,'not_shiw_print');?>
 
<div class="mt20"> <img src="<?php echo theme_url(); ?>img/print-icon.png" alt="" style="vertical-align:middle; margin-right:5px;" /> <a href="<?php echo base_url();?>cart/print_invoice_detail" class="invoice" style="color:#000; vertical-align:middle;">Print Invoice</a></div>
 
 <?php echo form_open('payment');?>
 <div class="mt25 p10 shadow1">
        <p class="fs20  green">Make Payment</p>
        <p class="bdrB2 mt5"></p>	<?php $result=cms_page_content("tbl_cms_pages",10); ?>
        <p class="b fs13 mt10"><?php echo $result->	page_short_description;?></p>
        <p class="fs11 verd pt5">
	
		  	<?php 	echo $result->page_description;
		  ?> </p>
        <div class="mt15">
          <p class="fl">
             
           <!-- <input name="pay_method" type="radio" id="pay_method" value="paypal" checked >-->
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
      
      <p class="mt20 mb10"><input name="input" type="submit" class="btn btn-login" value="Make Payment"  /></p>
      <?php echo form_close();?>
      
      
      </div>
          
  
  
      <div class="cb"></div>
      <!--Ends--></section>
    <div class="cb"></div>
</div></div>
<script type="text/javascript">var Page=''; /*  | detail */</script> 
<?php $this->load->view("bottom_application");?>