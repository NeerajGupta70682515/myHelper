<?php $this->load->view('top_application'); ?>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p15">
    <h1>Register</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> Register</p>
    <div class="aj mt10">
    
     <?php echo validation_message();?>
<?php error_message(); ?>
 <?php echo form_open('users/register'); ?>
<div class="w50 fl">

<fieldset class="radius-5 p10">
<legend class="legend">Login Information</legend>
<div class="p5 fs13">

<div class="mt10  p10 ml10">
      <p class="fl  w22">
        <label for="Name">Email ID <span class="star">*</span></label>
      </p>
      <p class="fl w70">
        <input name="user_name" type="text" class="txtbox w97" value="<?php echo set_value('user_name');?>"/>
      </p>
      <p class="cb"></p>
      <?php //echo form_error('user_name');?>
      <p class="fl  w22 mt15">
        <label for="phone_number">Password <span class="star">*</span></label>
      </p>
      <p class="fl mt8 w70">
        <input name="password" type="password" class="txtbox w97" />
      </p>
      <p class="cb"></p>
      <?php //echo form_error('password');?>
       <p class="fl  w22 mt15">
        <label for="phone_number">Confirm Password <span class="star">*</span></label>
      </p>
      <p class="fl mt8 w70">
        <input name="confirm_password" type="password" class="txtbox w97" />
      </p>
      <p class="cb"></p>
      <?php //echo form_error('confirm_password');?>
    </div>

</div>
</fieldset>

<fieldset class="radius-5 p10 mt20">
<legend class="legend">Personal Information</legend>
<div class="p5 fs13">

<div class="mt10  p10 ml10">
      <p class="fl  w22">
        <label for="Name">Name <span class="star">*</span></label>
      </p>
      <p class="fl w70">
        <input name="first_name" type="text" class="txtbox w97" value="<?php echo set_value('first_name'); ?>"/>
      </p>
      <p class="cb"></p>
      <?php //echo form_error('first_name');?>
      <p class="fl  w22 mt15">
        <label for="phone_number">Phone <span class="star">*</span></label>
      </p>
      <p class="fl mt8 w70">
        <input name="phone_number" type="text" class="txtbox w97" value="<?php echo set_value('phone_number'); ?>"  />
      </p>
      <p class="cb"></p>
       <?php //echo form_error('phone_number');?>
    </div>

</div>
</fieldset>

<fieldset class="radius-5 p10 mt20">
<legend class="legend">Billing Information</legend>
<div class=" p5 fs13">
	<div class="p2">
          <p class="fl w22 mt4"><label for="billing_name">Billing Name <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="billing_name" class="txtbox w97" value="<?php echo set_value('billing_name'); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_name');?>
        </div>
        <div class="p2">
        <p class="fl  w22 mt4">
          <label for="shipping_country">Phone No <span class="star">*</span></label>
        </p>
        <p class="fl w70">
             <input type="text" name="billing_phone" class="txtbox w97" value="<?php echo set_value('billing_phone'); ?>">
        </p>
        <p class="cb"></p>
        <?php //echo form_error('billing_phone');?>
      </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_address">Address <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <textarea name="billing_address" rows="3" class="txtbox w97"><?php echo set_value('billing_address'); ?></textarea>
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_address');?>
        </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_country">Country <span class="star">*</span></label></p>
          <p class="fl w70">
            <?php echo CountrySelectBox(array('name'=>'billing_country','format'=>'class="txtbox w99"','current_selected_val'=>set_value('billing_country') )); ?>
          </p>
          
          <p class="cb"></p>
          <?php //echo form_error('billing_country');?>
        </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_state">State <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="billing_state" type="text" class="txtbox w97" value="<?php echo set_value('billing_state');?>">
          </p>
          <p class="cb"></p>
           <?php //echo form_error('billing_state');?>
        </div>
        <div class="p2">
          <p class="fl w22 mt4"><label for="billing_city">City <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="billing_city" type="text" class="txtbox w97" value="<?php echo set_value('billing_city');?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_city');?>
        </div>
        <div class="p2">
          <p class="fl w22 mt4"><label for="billing_zipcode">Post code <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="billing_zipcode" class="txtbox w97" value="<?php echo set_value('billing_zipcode');?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('billing_zipcode');?>
        </div>
    </div>
</fieldset>

<?php
 $values_posted_back=(is_array($this->input->post())) ? TRUE : FALSE; 
 $is_same = $values_posted_back === TRUE ? $this->input->post('is_same') : ''; 
?>

    <p class="mt20 fs11">
          <label><input name="is_same" id="is_same" type="checkbox" value="Y" class="bgnone bdrnone" onclick="return Check_Bill_Ship(this.form);" <?php echo $is_same=='Y' ? ' checked="checked"' : '';?> /> Check this if Shipping address   is same as Billing address.</label></p>
<fieldset class="radius-5 p10 mt20">
<legend class="legend">Shipping Information</legend>
<div class=" p5 fs13">
	<div class="p2">
          <p class="fl w22 mt4">
            <label for="billing_name">Shipping Name<span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="shipping_name"  id="shipping_name" class="txtbox w97" value="<?php echo set_value('shipping_name',$this->input->post('shipping_name')); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_name');?>
        </div>
        <div class="p2">
        <p class="fl  w22 mt4">
          <label for="shipping_country">Phone No <span class="star">*</span></label>
        </p>
        <p class="fl w70">
             <input type="text" name="shipping_phone" id="shipping_phone" class="txtbox w97" value="<?php echo set_value('shipping_phone',$this->input->post('shipping_phone')); ?>">
        </p>
        <p class="cb"></p>
        <?php //echo form_error('shipping_phone');?>
      </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_address">Address <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <textarea name="shipping_address" id="shipping_address" rows="3" class="txtbox w97"><?php echo set_value('shipping_address',$this->input->post('shipping_address'));?></textarea>
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_address');?>
        </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_country">Country <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <?php echo CountrySelectBox(array('name'=>'shipping_country','format'=>'class="txtbox w99"','current_selected_val'=>set_value('shipping_country',$this->input->post('shipping_country')) )); ?><?php //echo form_error('shipping_country');?>
          </p>
          <p class="cb"></p>
        </div>
        <div class="p2">
          <p class="fl  w22 mt4"><label for="billing_state">State <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="shipping_state" id="shipping_state" type="text" class="txtbox w97" value="<?php echo set_value('shipping_state',$this->input->post('shipping_state')); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_state');?>
        </div>
        <div class="p2">
          <p class="fl w22 mt4"><label for="billing_city">City <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input name="shipping_city" id="shipping_city" type="text" class="txtbox w97" value="<?php echo set_value('shipping_city',$this->input->post('shipping_city')); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_city');?>
        </div>
        <div class="p2">
          <p class="fl w22 mt4"><label for="billing_zipcode">Post code <span class="star">*</span></label></p>
                
          <p class="fl w70">
            <input type="text" name="shipping_zipcode" id="shipping_zipcode" class="txtbox w97" value="<?php echo set_value('shipping_zipcode',$this->input->post('shipping_zipcode')); ?>">
          </p>
          <p class="cb"></p>
          <?php //echo form_error('shipping_zipcode');?>
        </div>
    </div>
</fieldset>

<div class="mt10 fs11"><label><input type="checkbox" name="terms_conditions" class="txtbox mr10" id="terms_conditions">Please click here to accpet <a href="<?php echo base_url();?>pages/terms_conditions" target="_blank" class="red">Terms &amp; Conditions</a></label>
 <?php //echo form_error('terms_conditions');?>
</div>

<p class="mt10 bdr p10 radius-5"> Verification Code <span class="star">*</span>
          <input name="verification_code" id="verification_code" type="text" style="width:140px;" class="txtbox" placeholder="Enter this code"> 
          <img src="<?php echo site_url('captcha/normal'); ?>" class="vam bdr" alt=""  id="captchaimage"/><a href="javascript:viod(0);" title="Change Verification Code"  ><img src="<?php echo theme_url(); ?>images/refresh.png"  alt="Refresh"  onclick="document.getElementById('captchaimage').src='<?php echo site_url('captcha/normal'); ?>/<?php echo uniqid(time()); ?>'+Math.random(); document.getElementById('verification_code').focus();" class="ml10 vam"></a><?php //echo form_error('verification_code');?>
 </p>
</div>

<div class="w45 fr mb10">
<p class="fr mt50 mr50" style="margin-bottom:170px;"><img src="<?php echo theme_url(); ?>images/register-icon.jpg" width="221" height="226" alt="edit"></p>
<div class="cb"></div>

</div><div class="cb"></div>
<div class="mt10">
        <input name="submit" type="submit" class="button-style2" value="Submit" >
        <input name="reset" type="reset" class="button-style" value="Reset">
      </div>
<div class="cb"></div>
<?php echo form_close();?>
</div>
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
     <?php $this->view('footer_banner.php')?>
</div>
<script type="text/javascript">var Page='inner';</script> 
<?php $this->load->view('bottom_application'); ?>