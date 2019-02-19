<?php $this->load->view("top_application");?>

  <div class="banner">
    	<img src="<?php echo get_image("banner","banner50js1.jpg",1200,500);?>"  style="height:200px;" class="img-responsive">
  </div>
  
   
  <section id="interest-rate-chart">
  <div class="container">
        <h4>Interest Rate Chart</h4>
       <h5><strong>Savings Account:</strong></h5>
        <div class="clearfix"></div>
        <div class="table-responsive">
            <table class="table table-striped table-hover">
                <thead>
                    <tr>
                    <th>Daily Minimum Balance Required in your Account </th>
                    <th>Interest Rate on Savings Account</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>Less than or Equal to Rs. 10,000/-</td>
                        <td>@4% p.a.</td>
                    </tr>
                    <tr>
                        <td>For Rs. 10,001 and above</td>
                        <td>@6% p.a.</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <div class="clearfix"></div>
        <h5><strong>Fixed Deposit:</strong></h5>
        <div class="table-responsive">
            <table class="table table-hover table-bordered">
                <thead>
                    <tr>
                        <th>Period</th>
                        <th>Cumulative Scheme- Normal (Annual Yield)</th>
                        <th>Monthly Interest Scheme- Normal</th>
                        <th>Cumulative Scheme -Senior Citizen (Annual Yield)</th>
                        <th>Monthly Interest Scheme - Senior Citizen</th>
                    </tr>
                </thead>
                <tbody>
                    <tr>
                        <td>12 Months</td>
                        <td>07.61%</td>
                        <td>07.35%</td>
                        <td>07.88%</td>
                        <td>07.61%</td>
                    </tr>
                    <tr>
                        <td>24 Months</td>
                        <td>08.00%</td>
                        <td>07.46%</td>
                        <td>08.27%</td>
                        <td>07.72%</td>
                    </tr>
                    <tr>
                        <td>36 Months</td>
                        <td>08.40%</td>
                        <td>07.61%</td>
                        <td>08.77%</td>
                        <td>07.88%</td>
                    </tr>
                    <tr>
                        <td>60 Months</td>
                        <td>09.95%</td>
                        <td>08.25%</td>
                        <td>10.32%</td>
                        <td>08.50%</td>
                    </tr>
                </tbody>
            </table>
        </div>
        <h5><strong>Flexible Recurring Deposit:</strong></h5>
        <div class="clearfix"></div>
       <ul>
           <li>Interest Rate @ 8% p.a. </li>
           <li>Interest Rate @ 8.25% p.a. in case of RD in name of Girl Child below 15yrs of age.</li>
           <li>Interest Rate @ 8.25% p.a. in case of RD of a Senior Citizen.</li>
          
       </ul>
    </div>
</section>
  
<?php $this->load->view("bottom_application");?>