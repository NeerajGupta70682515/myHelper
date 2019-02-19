<?php $this->load->view("top_application");?>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p15">
    <h1>Change Password</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> <a href="<?php echo base_url();?>members/myaccount">My Account</a> Change Password</p>
    
    <div class="mt10 rel"><!--Login-Section-Stars--><?php $this->load->view("members/myaccount_left");?><div class="w68 fr">
        <!--Right-Part-Starts-->
        <div class="aj pb15">
        <?php echo form_open('members/change_password'); ?>
 <?php echo validation_message();?>
  <?php echo error_message(); ?>
          <fieldset class="radius-5 bg2 shadow2 p15 mt20">
            <legend>Update Your Password</legend>
            <div class="p5 fs13">
              <div class="fl w22 pt4"><b class="red">*</b>
                <label for="old_password">Old Password :</label>
              </div>
              <div class="fl w50 ml10">
                <input type="password" autocomplete="off" name="old_password" id="old_password" class="w80 txtbox">
              </div>
              <div class="cb pb10"></div>
              <div class="fl w22 pt4"><b class="red">*</b>
                <label for="new_password">New Password :</label>
              </div>
              <div class="fl w50 ml10">
                <input type="password" autocomplete="off" name="new_password" id="new_password" class="w80 txtbox">
              </div>
              <div class="cb pb10"></div>
              <div class="fl w22 pt4"><b class="red">*</b>
                <label for="confirm_password">Confirm Password :</label>
              </div>
              <div class="fl w50 ml10">
                <input type="password" autocomplete="off" name="confirm_password" id="confirm_password" class="w80 txtbox">
              </div>
              <div class="cb pb10"></div>
              <p class="fl w24">&nbsp;</p>
              <div class="fl ml10">
                <input name="update" type="submit" class="button-style" value="Update" >
                <input name="reset" type="reset" class="button-style2" value="Reset">
              </div>
            </div>
          </fieldset>
          <?php echo form_close();?>
        </div>
        <div class="cb"></div>
        <!--Right-Part-Ends-->
      </div>
      <div class="cb"></div>
          
    <!--Login-Section-Ends--></div>
        
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
</div>

<?php $this->load->view("bottom_application");?>