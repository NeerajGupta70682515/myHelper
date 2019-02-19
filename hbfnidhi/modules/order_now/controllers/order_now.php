<?php
class order_now extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();				
		$this->form_validation->set_error_delimiters("<div class='required'>","</div>");
		$this->load->model(array('home/home_model','pages/pages_model','adminzone/news_model'));
	}
	public function index()
	{
		
		    $uid = $this->uri->segment(2);
		
			$this->form_validation->set_rules('billing_name', 'Name','required|xss_clean|alpha');
			$this->form_validation->set_rules('billing_phone', 'Phone','required|xss_clean');
		    $this->form_validation->set_rules('billing_email','Email','trim|required|valid_email|max_length[80]');
			$this->form_validation->set_rules('billing_address', 'Address','required|xss_clean');
			$this->form_validation->set_rules('billing_country', 'Country','required|xss_clean');
			$this->form_validation->set_rules('billing_state', 'State','required|xss_clean');
			$this->form_validation->set_rules('billing_city', 'City','required|xss_clean');
			$this->form_validation->set_rules('billing_zipcode', 'Post Code','required|xss_clean');
			if ($this->form_validation->run() == TRUE)
				{			
					$invoice_number    = "inv_".get_auto_increment('tbl_order');	
					$byid = $this->input->post('buy_id');
					
					$sel = "select * from tbl_services Where status ='1' and  	service_id='$byid'"; 
					$pack_qry = $this->db->query($sel);
					$list_pack = $pack_qry->result_array();
					$pack_amt = $list_pack[0]['fee'];	

							  $data_order = array(
								
								'invoice_number'      => $invoice_number,					
								'first_name'          => $this->input->post('billing_name'),
								'email'               => $this->input->post('billing_email'),					
								'billing_name'        => $this->input->post('billing_name'),
								'billing_address'     => $this->input->post('billing_address'),					
								'billing_phone'       => $this->input->post('billing_phone'),					
								'billing_zipcode'     => $this->input->post('billing_zipcode'),
								'billing_country'     => $this->input->post('billing_country'),
								'billing_state'       => $this->input->post('billing_state'),
								'billing_city'        => $this->input->post('billing_city'),					
								'total_amount'        => $pack_amt,
								'order_status'       => 'Pending',
								'order_received_date' => $this->config->item('config.date.time'),
								'payment_method'    =>   '',
								'payment_status'   => 'Unpaid'
							);
					
				$orderId = $this->home_model->safe_insert('tbl_order',$data_order,FALSE);		
				$this->session->set_userdata( array('working_order_id'=>$orderId) );				
				
				if($orderId!="")
				{
					//print_r($list_pack); die;
						$data = array(
							'orders_id'      => $orderId,							
							'products_id'    => $list_pack[0]['service_id'],
							'product_name'   => $list_pack[0]['service_title'],
							'product_code'   => $list_pack[0]['service_title'],
							'product_price'  => $list_pack[0]['fee'],						
						);
						
				 $this->home_model->safe_insert('tbl_orders_products',$data,FALSE);
					
				}
				
			redirect('payment'); 
		 }
		
		$this->load->view('buy_now');	
	}
}