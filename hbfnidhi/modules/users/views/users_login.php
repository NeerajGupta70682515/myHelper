<?php $this->load->view('top_application'); ?>
<?php $ref=$this->input->get_post('ref');?>
<!--body start-->
<div class="container pt12">
  <div class="radius-5 bg-white shadow p15">
    <h1>Login</h1>
    <p class="tree mt5"><img src="<?php echo theme_url(); ?>images/youarehere.png" alt="" class="vat mr5"> <a href="<?php echo base_url();?>">Home</a> Login</p>
    
    <div class="aj mt10">
      <div class="fl mt10 w50 shadow1 p15 radius-10">
       <?php echo validation_message();?>
      <?php echo error_message(); ?><br /><br />
        <p class="p10  radius-5 b fs12">Already a member? Please log in below : </p>
        <?php echo form_open('users/login');?>
        
        <div class="mt15">
        
          <p class="ttu fs14 mt10 w20 mr5 fl">Email <span class="star">*</span></p>
          <p class="mt5 fl w60">
            <input type="text" name="user_name" id="user_name" class="w100 txtbox" value="<?php if(get_cookie('userName')!=""){ echo get_cookie('userName'); } ?>">
          </p>
          <div class="cb"></div>
          <?php //echo form_error('user_name');?>
          <p class="ttu fs14 mt10 w20 mr5 fl">
            <label for="password">Password <span class="star">*</span></label>
          </p>
          <p class="mt5 fl w60">
            <input type="password" name="password" id="password" class="w100 txtbox" value="<?php if(get_cookie('pwd')!=""){ echo get_cookie('pwd'); } ?>" >
          </p>
          <div class="cb"></div>
          <?php //echo form_error('password');?>
          <p class="ttu fs14 mt10 w20 mr5 fl">&nbsp;</p>
          <p class="fs11 mt5">
            <input type="checkbox" name="remember" id="remember" class="vam" value="Y"  <?php if(get_cookie('userName')!=""){ ?> checked="checked" <?php } ?> >
            Remember me on this computer</p>
          <div class="cb"></div>
          <p class="ttu fs14 mt10 w20 mr5 fl">&nbsp;</p>
          <p class="mt5">
            <input type="submit" name="submit" value="Login Now!"  class="button-style1" >
            <input type="hidden" name="action" value="Add">
            <input type="hidden" name="ref" value="<?php echo $ref;?>" />
            <span class="pl15 red"><a href="<?php echo base_url();?>users/forgotten_password" class="forgot">Password Help?</a></span></p>
          <div class="cb"></div>
          <div class="p5 mt15 shadow2 bgB white radius-10">
            <p class="mt5 ml13 fs18">Not Registered Yet?
              <input type="button" name="register"value="Register Here" class="button-style2 fr mr10" onclick="window.open('<?php echo base_url();?>users/register','_parent');" >
            </p>
            <div class="cb"></div>
          </div>
        </div>
        
        
        <?php echo form_close();?>
        
      </div>
      <div class="fl mt10 ml30 w40">
        <div class="mt10 radius-5 shadow1 white p15">
          <p class="red al gochihand fs30 b bdr-b2 pb5">Benefits of <span class="ttu blue">Registration</span></p>
          <?php $result=cms_page_content("tbl_cms_pages",9); 
		  		echo $result->page_description;;
		  ?>
        </div>
      </div>
      <p class="ac mt10"><img src="<?php echo theme_url(); ?>images/login-img.jpg" alt=""></p>
      <div class="cb"></div>
    </div>
    <div class="cb"></div>
  </div>
  <div class="cb"></div>
   <?php $this->view('footer_banner.php')?>
</div>

<!--body end-->
<script type="text/javascript">var Page='inner';</script> 
<?php $this->load->view('bottom_application'); ?>