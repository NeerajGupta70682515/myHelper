

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







</ul>	

</div>

</div>


<div class="container">
    <div class="row">
     <?php echo error_message(); ?> 
      <?php if($this->cart->total_items() > 0 ) 
			{
				
			 ?>
    
      <article class="col-sm-9 col-md-9 content">
		<div class="my-account">
		  
		  
		  <div class="bottom-padding">
			<div class="title-box">
			  <h2 class="title">Recent Orders</h2>
			</div>
			<div class="table-responsive">
            
			  <table class="table table-striped table-bordered  my-orders-table">
				<thead>
				  <tr class="first last">
					<th>S No.</th>
					<th>Products</th>
					<th>Unit Price (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
					<th>Amount (<i class="fa fa-inr" aria-hidden="true"></i>)</th>
					<th class="text-center">Delete</th>
				  </tr>
				</thead>
				<tbody>
				 <?php	   
            $i=1;
            $totweight=0;
            $shipcharge = "";
            foreach($this->cart->contents() as $items)
            {
                //trace($items);
			  $link_url=base_url()."products/detail/".$items['pid']; 			 
              $quantity_available = "";
			 
            ?>
            
 <?php echo form_open('cart/','name="cartForm_qty'.$i.'"' );?>
 
                  <tr>
					<td><label><?php echo $i;?>.</td>
					<td><a class="productviedo" href="<?php echo  $link_url;?>"><img src="<?php echo get_image('lecture',$items['img'],'80','64','AR'); ?>"alt="<?php echo $items['origname'];?>"><br /><?php echo character_limiter(strip_tags($items['origname']),20);?><span class="blue"></span>
                   
                    </a></td>
					<td><span class="price"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo display_price($items['price']);?></span></td>
                    <td><span class="price"><i class="fa fa-inr" aria-hidden="true"></i> <?php echo display_price($items['subtotal']);?></span></td>

					<td class="text-center last">
					 <a href="<?php echo base_url(); ?>cart/remove_item/<?php echo $items['rowid']; ?>"onclick="return confirm('Are you sure you want to remove this item');" class="product-remove">
					 <i class="fa fa-trash-o fs20" aria-hidden="true"></i>
				  </a>
					</td>
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
				  
				  
				</tbody>
			  </table>
                <?php echo form_open('cart/','name="cart_frm" id="cart_frm" ');?>
              <div class="text-center mt15">
          <input  class="btn login_btn" name="EmptyCart" type="submit" value="Clear Cart"onclick="return confirm('Are you sure you want to clear the cart');" >
          </div>
			</div>
		  </div>
		  
		  
		</div>
      </article><!-- .content -->
	  
	  <div id="sidebar" class="col-sm-3 col-md-3 pt16 sidebar checkout-progress">
		<aside class="widget">
		  <header>
			<h3 class="title">Order Summary</h3>
		  </header>
		  <ul class="progress-list">
			<li><strong>SubTotal (<i class="fa fa-inr" aria-hidden="true"></i>) : </strong><span class="fr"><?php echo number_format($cart_total,2);?></span></li>
            <?php $get_tax=get_db_single_row($fld='tbl_tax','tax_rate,tax_type',$Condwherw="WHERE tax_id='1'");
	   
	    ?>
			<li><strong>Tax (<i class="fa fa-inr" aria-hidden="true"></i>) : </strong><span class="fr"> <?php $total_tax_cal=(($cart_total*$get_tax['tax_rate'])/100);
			$total_tax=($total_tax_cal>0) ? $total_tax_cal : '0.00';
			echo number_format($total_tax,2);
			?></span></li>
            <?php $total_amount=$gand_total+$total_tax;?>
			<li><strong>Grand Total (<i class="fa fa-inr" aria-hidden="true"></i>) : </strong><span class="fr"><?php echo number_format($total_amount,2);?></span></li>
		  </ul>   
          <div class="text-center mt15">
           <?php if($this->session->userdata('user_id')=='')
        {
        ?>
        <a  href="#myModal" onclick="document.getElementById('myModal').style.display='Block';" data-toggle="modal" class="btn login_btn">Checkout</a>
             
        <?php
		}else
		{
		?>
        <input name="UserCheckout" type="submit" class="btn login_btn" value="Checkout" >        
        <?php
		}
		?>
         
          </div>
          
          
		</aside>
        
        <aside class="widget">
		  <header>
			<h3 class="title">Payment Options</h3>
		  </header>
		  <ul class="cardpaymt">
          <li><img src="<?php echo theme_url(); ?>img/credit-card1.jpg" alt="credit cards"></li>
		  <li><img src="<?php echo theme_url(); ?>img/secure.jpg" alt="secure"></li>
          </ul>
          
		</aside>
      </div>
      
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
    
    </div>
  </div>



<script type="text/javascript">var Page=''; /*  | detail */</script> 

<?php $this->load->view("bottom_application");?>