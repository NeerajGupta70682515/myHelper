<?php $this->load->view("top_application");?>
<?php
 $values_posted_back=(is_array($this->input->post())) ? TRUE : FALSE; 
 $is_same = $values_posted_back === TRUE ? $this->input->post('is_same') : ''; 
?>

<div class="container pt12">
  <div class="radius-5 bg-white shadow p15">
    <h1>Edit My Account</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a><a href="<?php echo base_url();?>members/myaccount"> My Account</a> Edit My Account</p>
    
    <div class="mt10 rel"><!--Login-Section-Stars--><?php $this->load->view("members/myaccount_left");?><div class="w68 fr">
        <!--Right-Part-Starts-->
        <?php echo form_open('members/edit_account'); ?>
        <div class="aj pb15">
        <?php echo validation_message();?>
  		<?php echo error_message(); ?>
          <fieldset class="radius-5 bg2 shadow2  p15 mt20">
            <legend>Personal Information</legend>
            <div class="p5 fs13">

<div class="mt10  p10 ml10">
      <p class="fl  w22">
        <label for="Name">Name <span class="star">*</span></label>
      </p>
      <p class="fl w70">
        <input name="first_name" id="Name" type="text" class="txtbox w97" value="<?php echo set_value('first_name',$mres['first_name']); ?>"/>
      </p>
      <p class="cb"></p>
      <?php //echo form_error('first_name');?>
      <p class="fl  w22 mt15">
        <label for="phone_number">Phone <span class="star">*</span></label>
      </p>
      <p class="fl mt8 w70">
        <input name="phone_number" id="phone_number" type="text" class="txtbox w97" value="<?php echo set_value('phone_number',$mres['phone_number']); ?>" />
      </p>
      <p class="cb"></p>
      <?php //echo form_error('phone_number');?>
    </div>

</div>
          </fieldset>
          <fieldset class="radius-5 bg2 shadow2 p15 mt20">
            <legend><a name="edit" id="edit"></a>Billing Details</legend>
            <div class=" p5 fs13">
	<div class="p2">
          <p class="fl w22 mt4"><label for="billing_name">Billing Name <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="billing_name" id="billing_name" class="txtbox w97" value="<?php echo set_value('billing_name',$mres['billing_name']); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_name');?>
        </div>
        <div class="p2">
        <p class="fl  w22 mt4">
          <label for="shipping_country">Phone No <span class="star">*</span></label>
        </p>
        <p class="fl w70">
             <input type="text" name="billing_phone" id="phone_no" class="txtbox w97" value="<?php echo set_value('billing_phone',$mres['billing_phone']);?>" >
        </p>
        <p class="cb"></p>
        <?php //echo form_error('billing_phone');?>
      </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_address">Address <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <textarea name="billing_address" id="billing_address" rows="3" class="txtbox w97"><?php echo set_value('billing_address',$mres['billing_address']);?></textarea>
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_address');?>
        </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_country">Country <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <?php echo CountrySelectBox(array('name'=>'billing_country','format'=>'class="txtbox w99"" ','current_selected_val'=>set_value('billing_country',$mres['billing_country']) )); ?>
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_country');?>
        </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_state">State <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="billing_state" id="billing_state" type="text" class="txtbox w97" value="<?php echo set_value('billing_state',$mres['billing_state']);?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_state');?>
        </div>
        <div class="p2">
          <p class="fl w22 mt4"><label for="billing_city">City <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="billing_city" id="billing_city" type="text" class="txtbox w97" value="<?php echo set_value('billing_city',$mres['billing_city']);?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_city');?>
        </div>
        <div class="p2">
          <p class="fl w22 mt4"><label for="billing_zipcode">Post code <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="billing_zipcode" id="billing_zipcode" class="txtbox w97" value="<?php echo set_value('billing_zipcode',$mres['billing_zipcode']);?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_zipcode');?>
        </div>
    </div>
          </fieldset>
          <fieldset class="radius-5 bg2 shadow2  p15 mt20">
            <legend><a id="shipping"></a>Shipping Details</legend>
            <p class="fs11 pb5 mt10">
              <input type="checkbox" name="is_same" id="is_same" class="vam" value="Y" onclick="return Check_Bill_Ship(this.form);" <?php echo $is_same=='Y' ? ' checked="checked"' : '';?>> Check if shipping address is same as billing address</p>
            <div class=" p5 fs13">
	<div class="p2">
          <p class="fl w22 mt4"><label for="billing_name">Billing Name <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="shipping_name" id="shipping_name" class="txtbox w97" value="<?php echo set_value('shipping_name',$mres['shipping_name']); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_name');?>
        </div>
        <div class="p2">
        <p class="fl  w22 mt4">
          <label for="shipping_country">Phone No <span class="star">*</span></label>
        </p>
        <p class="fl w70">
             <input type="text" name="shipping_phone" id="shipping_phone" class="txtbox w97" value="<?php echo set_value('shipping_phone',$mres['shipping_phone']); ?>">
        </p>
        <p class="cb"></p>
        <?php //echo form_error('shipping_phone');?>
      </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_address">Address <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <textarea name="shipping_address" id="shipping_address" rows="3" class="txtbox w97"><?php echo set_value('shipping_address',$mres['shipping_address']);?></textarea>
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_address');?>
        </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_country">Country <span class="star">*</span></label></p>
               
          <p class="fl w70">
            <?php echo CountrySelectBox(array('name'=>'shipping_country','format'=>'class="txtbox w99"','current_selected_val'=>set_value('shipping_country',$mres['shipping_country']) )); ?>
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_country');?>
        </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_state">State <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="shipping_state" id="shipping_state" type="text" class="txtbox w97" value="<?php echo set_value('shipping_state',$mres['shipping_state']); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_state');?>
        </div>
        <div class="p2">
          <p class="fl w22 mt4"><label for="billing_city">City <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="shipping_city" id="shipping_city" type="text" class="txtbox w97" value="<?php echo set_value('shipping_city',$mres['shipping_city']); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_city');?>
        </div>
        <div class="p2">
          <p class="fl w22 mt4"><label for="billing_zipcode">Post code <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="shipping_zipcode" id="shipping_zipcode" class="txtbox w97" value="<?php echo set_value('shipping_zipcode',$mres['shipping_zipcode']); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_zipcode');?>
        </div>
    </div>
            <div class="cb pb10"></div>
            <p class="fl w22">&nbsp;</p>
            <div class="fl ml10">
              <input name="reg" type="submit" class="button-style" value="Submit"  >
              <input name="reset" type="reset" class="button-style2" value="Reset">
            </div>
          </fieldset>
          
          
        </div>
        <?php echo form_close();?>
        <div class="cb"></div>
        <!--Right-Part-Ends-->
      </div>
      <div class="cb"></div>
          
    <!--Login-Section-Ends--></div>
        
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
</div>
<script type="text/javascript">var Page='inner';</script>
<?php $this->load->view("bottom_application");?>