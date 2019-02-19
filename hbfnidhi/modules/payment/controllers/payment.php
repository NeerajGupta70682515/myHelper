<?php
class Payment extends Public_Controller
{
	
		public function __construct()
		{
		
		  parent::__construct();  			
		  $this->load->helper(array('payment/paypal','cart/cart','file'));
		  $this->load->model(array('payment/payment_model','pages/pages_model','adminzone/news_model'));
		  $this->load->library(array('Dmailer'));		
		
		}
		
	    public function index()
		{
		
			$working_order_id =  $this->session->userdata('working_order_id'); 
			$order_res = $this->payment_model->get_order_master($working_order_id);

			payuForm($order_res);
				
		}
	
	 
	   public function order_success() //order_success
	   {
		   
		   $q=$this->session->userdata('working_order_id');
	   	  
		 $ordId = $this->uri->segment(4);
		 //$payment_method = $this->uri->segment(3);	
		 	 $payment_method = "PayUMoney";
		 $data  = array('payment_method'=>$payment_method,'payment_status'=>'Paid');			 	 
		 $where = "order_id = '$q' ";
		 		 
		   $this->payment_model->safe_update('tbl_order',$data,$where,FALSE);		
		 //echo_sql();
			$ordmaster = $this->payment_model->get_order_master( $this->session->userdata('working_order_id') );
			$orddetail = $this->payment_model->get_order_detail( $this->session->userdata('working_order_id'));	 
					
		     if( is_array( $ordmaster )  && !empty( $ordmaster ) ) 
			 {
				 
				 $emailid =  $this->session->userdata('username');
				 //die();
				 
			       /***** Send Invoice mail */
				    ob_start();				
					$mail_subject =$this->config->item('site_name')." Order overview";
					$from_email   = $this->admin_info->admin_email;
					$from_name    = $this->config->item('site_name');
					$mail_to      = $emailid;									
					$body         = invoice_content($ordmaster,$orddetail);					
					$msg          = ob_get_contents();
					
					$msg .="Video Link: <a href='https://www.ecoachingindia.in/products/detail/2'>Watch Video Here</a>";
					
					$mail_conf =  array(
					'subject'=>$this->config->item('site_name')." Order overview",
					'to_email'=>$mail_to,
					'from_email'=>$from_email,
					'from_name'=> $this->config->item('site_name'),
					'body_part'=>$msg);							
					$this->dmailer->mail_notify($mail_conf);	
					
					$this->dmailer->mail_notify($mail_conf);
					
								
				
				  /******* End Invoice  mail */		 
			 }
		 
		 $this->session->unset_userdata(array('working_order_id' =>0));
		 $this->session->set_flashdata('msg', $this->config->item('payment_success'));		
	     //redirect('payment/thanks/'.$ordId, '');
		 
		 $this->load->view('payment/pay_thanks');
	   
	 }
	 
	 
	  public function order_cancle()
	  {	 
	   
	     $ordId = $this->uri->segment(4);
		 $payment_method = "PayUMoney";		 
		 $data  = array('payment_method'=>$payment_method,'order_status'=>'Canceled');			 	 
		 $where = "MD5(order_id) = '$ordId' ";
		 $this->payment_model->safe_update('tbl_order',$data,$where,FALSE);			 
		 $this->session->unset_userdata(array('working_order_id' =>0));
		 $this->session->set_flashdata('msg', $this->config->item('payment_failed'));		 
	     redirect('payment/thanks/'.$ordId, '');
	   
	 }
	 
	
   
   public function thanks()
   {	   	
	 
	  $this->load->view('payment/pay_thanks');
	  
	 
   }
   
   
   

}
/* End of file member.php */
/* Location: .application/modules/products/controllers/cart.php */
