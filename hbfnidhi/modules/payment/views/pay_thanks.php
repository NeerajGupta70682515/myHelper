<?php $this->load->view("top_application");?>
<div class="cb"></div>
<div class="container pt12">
  <div class="radius-5 bg-white shadow p12-16">
    <h1>Thank You</h1>
   
    <section><!--Starts-->
      <p class="mt10 ac text-center" ><img src="<?php echo theme_url(); ?>img/thank-you.jpg" width="232" height="213" alt="thank"></p>
      <p class="oswald fs30 ac"><?php echo  $this->session->flashdata('msg');?></p>
          
  
  
      <div class="cb"></div>
      <!--Ends--></section>
    <div class="cb"></div>
</div></div>
<?php $this->load->view("bottom_application");?>