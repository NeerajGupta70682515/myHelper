<div class="w30 bg2 mb10 mr10 shadow1 fl">
        <!--Left-Part-Starts-->
        <?php $mem_info=get_db_single_row('tbl_customers',$fields="phone_number",$condition="WHERE 1 AND customers_id='".$this->session->userdata('user_id')."'");?>
        
        <div class="p10">
          <p class="mt10 fs13 b verd"><?php echo  $this->fname;?></p>
          <p class="mt5 tahoma fs11 black lh16px">Ph: <?php echo $mem_info['phone_number'];?><br>
            <span class="red"><a href="<?php echo base_url();?>users/logout">[ Logout! ]</a></span></p>
          <p class="mt8"><span class="blue">Last Login :</span> <?php echo getDateFormat($this->last_login,9);?></p>
        </div>
        <p class="ac"><img src="<?php echo theme_url(); ?>images/sep.gif" width="284" height="28" alt="sep"></p>
        <div class="p10">
          <ul class="list7">
            <li> <a href="<?php echo base_url();?>members/edit_account" class="edit-account">Edit Account <span>Edit Your Account</span></a></li>
            <li><a href="<?php echo base_url();?>members/change_password" class="change-password">Change Password <span>Change Your Password</span></a></li>
            <li><a href="<?php echo base_url();?>members/orders_history" class="order-history">Order History <span>View Your Order History</span></a></li>
            <li><a href="<?php echo base_url();?>members/wishlist"  class="wishlist">My Favourite LIst <span>Favourite Products List</span></a></li>
            <li><a href="<?php echo base_url();?>users/logout" class="logout">Log Out <span>Close Your Session</span></a></li>
          </ul>
        </div>
        <div class="cb"></div>
        <!--Left-Part-Ends-->
      </div>