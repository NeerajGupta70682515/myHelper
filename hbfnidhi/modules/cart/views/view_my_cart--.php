
<?php

 $this->load->view("top_application");


 ?>
<script language="javascript">
function update_single_cart_qty()
{
	
}
</script>
   <div class="deilbg">
<div class="container">
<div class="row">
<div class="deve">
<h2 class="white ffb pt20 "><i><?php echo char_limiter($title,45);?></i></h2>
</div>


</div>
</div>
</div>

<div class="breadcrumb-box">
<div class="container">
<ul class="breadcrumb">
<li><a href="<?php echo base_url();?>">Home</a></li>
<li class="active">Cart</li>

<li> <?php	

echo '<span class="pr2 fs14"style="color:#7f7f7f;">' .$title.'</span>';    
?></li>

</ul>	
</div>
</div>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p12-16">
  
 
    
    
  
    <section><!--Starts-->
       <?php echo error_message(); ?> 
      <?php if($this->cart->total_items() > 0 ) 
			{
				//trace($shipping_res);
				//trace($shipping_methods);
			 ?>
     
      <div class="mt10"><!--Cart-Starts-->
      
      <div class="w70 shadow2 p10 fl">
     <table class="mt10 bdrAll w100" style="border:1px #000;">
        <tr class="b bgB black">
          <td width="45" class="w12 al"> S. No. </td>
          <td width="63" class="w45 al">Products</td>
          <td width="94" class="w12 ac">Unit Price (<span class="WebRupee fs12 ">Rs</span>) </td>
          
          <td width="89" class="w12 ac">Amount (<span class="WebRupee fs12 ">Rs</span>)</td>
          <td width="40" class="w8 al">Delete</td>
          </tr>

<?php	   
            $i=1;
            $totweight=0;
            $shipcharge = "";
            foreach($this->cart->contents() as $items)
            {
                //trace($items);
			  $link_url=base_url()."products/detail/".$items['pid']; 			 
              $quantity_available = "";
			  //print_r($items);die;
			 
            ?>
            
 <?php echo form_open('cart/','name="cartForm_qty'.$i.'"' );?>
<tr>
<td><label><?php echo $i;?>.</label></td>


<td><p class="fs15 black verd"><a href="<?php echo  $link_url;?>"><img src="<?php echo get_image('products',$items['img'],'80','64','AR'); ?>" alt="<?php echo $items['origname'];?>" class="fl mr8 bdr"><?php echo character_limiter(strip_tags($items['origname']),20);?><span class="blue"></span></a></p>

</td>
<td class="ac"><?php echo display_price($items['price']);?></td>

<td class="ac"><?php echo display_price($items['subtotal']);?></td>
<td class="ac"><a href="<?php echo base_url(); ?>cart/remove_item/<?php echo $items['rowid']; ?>" onclick="return confirm('Are you sure you want to remove this item');"><img src="<?php echo theme_url(); ?>img/del-icon.png" alt=""></a></td>
</tr>
<input type="hidden" name="prd_id" value="<?php echo $items['rowid']; ?>" />
<?php echo form_close();?>
       <?php
			 $i++;
            }
				
			$cart_total      = $this->cart->total();
			$discount_amount = $this->session->userdata('discount_amount');
			//$shipping_total  = array_key_exists('shipment_rate',$shipping_res) ?  $shipping_res['shipment_rate'] : '';
			$discount_total  = $discount_amount;
			$gand_total      = ($cart_total-$discount_total);
			
            ?> 
        
        
           </table>
           
            <?php echo form_open('cart/','name="cart_frm" id="cart_frm" ');?>
          
            
		<div class="cb"></div>
<?php echo form_error('shipping_method');?>
		<div class="p5 ac mb10 mt15">
		  
		
		  <input style="text-decoration:none; background:#CCC; padding:20px;" name="EmptyCart" type="submit" class="button-style mr10" value="Clear Cart" onclick="return confirm('Are you sure you want to clear the cart');">
        
  </div>
      </div>
      <div class="w26 mt10 fr"><!--Right-Starts-->
      <div class="p15 radius-5 shadow1"><!--Order-Summary-Starts-->
      <h3>Order Summary</h3>
      <div class="bgW mt10 radius-5">
      <p class="bdrBtm p10"><strong>Sub Total (<span class="WebRupee fs12 ">Rs</span>) : </strong><?php echo number_format($cart_total,2);?></p>
      
      
       <?php $get_tax=get_db_single_row($fld='tbl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
	   
	    ?>
      <p class="mt10 bdrBtm p10"><strong>Tax (<span class="WebRupee fs12 ">Rs</span>) <!--(<?php echo $get_tax['tax_rate'];?>%)-->:</strong> 	     <?php $total_tax_cal=(($cart_total*$get_tax['tax_rate'])/100);
			$total_tax=($total_tax_cal>0) ? $total_tax_cal : '0.00';
			echo number_format($total_tax,2);
			?></p>
            
            <?php $total_amount=$gand_total+$total_tax;?>
            
      <p class="mt10 bdrBtm p10"><strong>Grand Total (<span class="WebRupee fs12 ">Rs</span>) : </strong><?php echo number_format($total_amount,2);?></p>
      </div>
        <p class="mt10 mb10 ar">
        
        
        <?php if($this->session->userdata('user_id')=='')
        {
        ?> 
        <a style="text-decoration:none; background:#CCC; padding:20px;" href="#myModal" onclick="document.getElementById('myModal').style.display='Block';" data-toggle="modal" class="button-style2 mr10">Checkout</a>
           
        <?php
		}else
		{
		?>
        <input name="UserCheckout" type="submit" class="button-style mr10" value="Checkout" >        
        <?php
		}
		?>
     
        </p>
      <!--Order-Summary-Ends--></div>
      <div class="mt10 shadow1 radius-10 p10">
      <h2>Payment Options</h2>
      <p class="mt10 ac"><img src="<?php echo theme_url(); ?>img/credit-card1.jpg" width="197" height="32" alt="credit cards"></p>
      <p class="mt20 ac"><img src="<?php echo theme_url(); ?>img/secure.jpg" width="99" height="58" alt="secure"></p>
      </div>
      <div class="cb"></div>
      <!--Right-Ends--></div>
      <div class="cb"></div>
 
        <!--Cart-Ends--></div>
        
        <?php echo form_close();?> 

  <?php 
  }else
  {
	   ?>              
      <div class="mt10 p10 fs13 radius-5">
      <table class="lht-16 w100">
        <tr>
          <td class="ac"><strong>Your Cart is empty</strong></td>         
        </tr>       
      </table>
    </div>

<?php
}
?>
        
      <div class="cb"></div>
      <!--Ends--></section>
    <div class="cb"></div>
</div></div>
<script type="text/javascript">var Page=''; /*  | detail */</script> 
<?php $this->load->view("bottom_application");?>