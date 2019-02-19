<?php $this->load->view("top_application");?>

  <div class="banner">
	   	<img src="<?php echo get_image("banner","banner50js1.jpg",1200,500);?>"  style="height:200px;" class="img-responsive">
   </div>
  
  <section id="application">
  <div class="container">
        <h4>Download Forms Center</h4>
                        <form name="ctl01" method="post" action="./Application.aspx" id="ctl01">
<div>
<input type="hidden" name="__VIEWSTATE" id="__VIEWSTATE" value="/wEPDwUKLTQyNjI2MTkwNmRkhQLK0CKfMou8dN3K8UxTe0gqH8g=">
</div>

<div>

	<input type="hidden" name="__VIEWSTATEGENERATOR" id="__VIEWSTATEGENERATOR" value="569DB96F">
</div>
                            <ul class="list-inline list-unstyled">
                                
                                <li><a href="<?php echo base_url();?>uploaded_files/pdf/HBFCompanyBrochure.pdf" class="btn btn-primary" style=" height: 79px; margin-right: 14%; padding-top: 29px;" target="_blank">HBF Company Brochure</a></li>
                                <li><a href="<?php echo base_url();?>uploaded_files/pdf/HBFFixeddeposit.pdf" class="btn btn-primary" style=" height: 79px; margin-right: 14%; padding-top: 29px;" target="_blank">Fixed deposit</a></li>
                                <li><a href="<?php echo base_url();?>uploaded_files/pdf/HBFSAVINGSACCOUNT3.pdf" class="btn btn-primary" style=" height: 79px; margin-right: 14%; padding-top: 29px;" target="_blank">Savings Account 3</a></li>
                                <li><a href="<?php echo base_url();?>uploaded_files/pdf/HBFrd.pdf" class="btn btn-primary" style=" height: 79px; margin-right: 14%; padding-top: 29px;" target="_blank">Recurring Deposit</a></li>
                            </ul>
                           
                             </form>

    </div>
</section>
  
<?php $this->load->view("bottom_application");?>