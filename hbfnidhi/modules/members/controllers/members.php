<?php
class Members extends Private_Controller
{
	private $mId;

	public function __construct()
	{
		parent::__construct(); 		
		$this->load->model(array('members/members_model','pages/pages_model','adminzone/news_model'));
		$this->load->helper(array('cart/cart'));		 
		$this->load->library(array('safe_encrypt','Dmailer','cart'));	
	}

	public function index()
	{	
		redirect('members/myaccount', '');
	}

	public function myaccount()
	{
		
		
		$data['title'] = "My Account";
		$this->load->view('view_member_myaccount',$data);
	}


	public function edit_account()
	{	
	
		$data['unq_section'] = "Myaccount";
		$data['title'] = "My Account";
		
	   $mres = $this->members_model->get_member_row( $this->session->userdata('user_id') );	
	   $is_same_bill_ship =   $this->input->post('is_same',TRUE);	  
		
		if( is_array($mres) && !empty($mres))
		{
			
				$mres_address = $this->members_model->get_member_address_book($mres['customers_id']);
				$mres_bill =	 $mres_address[0];
				$mres_ship =	 $mres_address[1];	
							
				$mres = array(	
				'customers_id'        =>$mres['customers_id'],			
				//'title'               => $mres['title'],
				'first_name'          => $mres['first_name'],
				'last_name'           => $mres['last_name'],
				'phone_number'        => $mres['phone_number'],									
				'billing_name'        => $mres_bill['name'],
				'billing_address'     => $mres_bill['address'],					
				'billing_phone'       => $mres_bill['phone'],			
				'billing_zipcode'     => $mres_bill['zipcode'],
				'billing_country'     => $mres_bill['country'],
				'billing_state'       => $mres_bill['state'],
				'billing_city'        => $mres_bill['city'],		
				'shipping_name'       => $mres_ship['name'],
				'shipping_address'    => $mres_ship['address'],					
				'shipping_phone'      => $mres_ship['phone'],			
				'shipping_zipcode'    => $mres_ship['zipcode'],
				'shipping_country'    => $mres_ship['country'],
				'shipping_state'      => $mres_ship['state'],
				'shipping_city'       => $mres_ship['city']
				);					
			
				
			
			//$this->form_validation->set_rules('title', 'Title', 'trim|required|xss_clean');
			$this->form_validation->set_rules('first_name', 'Name', 'trim|required|alpha|xss_clean');
			$this->form_validation->set_rules('phone_number', 'Phone Number', 'trim|required|xss_clean');	
						
			$this->form_validation->set_rules('billing_name', 'Billing Name','required|xss_clean|alpha');
			$this->form_validation->set_rules('billing_address', 'Billing Address','required|xss_clean');
			$this->form_validation->set_rules('billing_phone', 'Billing Phone','required|xss_clean');
			$this->form_validation->set_rules('billing_zipcode', 'Billing Post Code','required|xss_clean');
			$this->form_validation->set_rules('billing_country', 'Billing Country','required|xss_clean');
			$this->form_validation->set_rules('billing_state', 'Billing State','required|xss_clean');
			$this->form_validation->set_rules('billing_city', 'Billing City','required|xss_clean');
			
			if( $is_same_bill_ship!='Y')
			{
				$this->form_validation->set_rules('shipping_name', 'Shipping Name','required|xss_clean|alpha');
				$this->form_validation->set_rules('shipping_address', 'Shipping Address','required|xss_clean');
				$this->form_validation->set_rules('shipping_phone', 'Shipping Phone','required|xss_clean');
				$this->form_validation->set_rules('shipping_zipcode', 'Shipping Post Code','required|xss_clean');
				$this->form_validation->set_rules('shipping_country', 'Shipping Country','required|xss_clean');
				$this->form_validation->set_rules('shipping_state', 'Shipping State','required|xss_clean');
				$this->form_validation->set_rules('shipping_city', 'Shipping City','required|xss_clean');
		
			}
			
		    if ($this->form_validation->run() == TRUE)
			{
				
					
					$posted_billing_data =  array( 								
						'name'        => $this->input->post('billing_name',TRUE),
						'address'     => $this->input->post('billing_address',TRUE),
						'zipcode'     => $this->input->post('billing_zipcode',TRUE),
						'phone'       => $this->input->post('billing_phone',TRUE),
						'city'        => $this->input->post('billing_city',TRUE),	
						'state'       => $this->input->post('billing_state',TRUE),
						'country'     => $this->input->post('billing_country')
					);	
					
					/*if( $is_same_bill_ship =='Y')
				    {
							$posted_shipping_data = $posted_billing_data;
						
					}else
					{*/
						 $posted_shipping_data =  array( 									
							'name'        => $this->input->post('shipping_name',TRUE),
							'address'     => $this->input->post('shipping_address',TRUE),
							'zipcode'     => $this->input->post('shipping_zipcode',TRUE),
							'phone'       => $this->input->post('shipping_phone',TRUE),
							'city'        => $this->input->post('shipping_city',TRUE),	
							'state'       => $this->input->post('shipping_state',TRUE),
							'country'     => $this->input->post('shipping_country')
						);	
					
					//}
						
					
					$posted_user_data = array(						
						'title'               	 =>$this->input->post('title'),
						'first_name'         	 =>$this->input->post('first_name'),
						'phone_number'           =>$this->input->post('phone_number')
					);
					
				
				 $where       = "customers_id = '".$mres['customers_id']."'"; 
				 $where_bill  = "customer_id = '".$mres['customers_id']."' AND address_type='Bill' "; 
				 $where_ship  = "customer_id = '".$mres['customers_id']."' AND address_type ='Ship'  "; 
				 						
				 $this->members_model->safe_update('tbl_customers',$posted_user_data,$where,FALSE);				 
				 $this->members_model->safe_update('tbl_customers_address_book',$posted_billing_data,$where_bill,FALSE);
				 $this->members_model->safe_update('tbl_customers_address_book',$posted_shipping_data,$where_ship,FALSE);
								
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',$this->config->item('myaccount_update'));						 
				redirect('members/edit_account', '');
				
			}	
			
		}else
		{
			redirect('members', '');
			
		}
			
		$data['mres'] = $mres;		   
		$this->load->view('view_member_edit_account',$data);
		
	}
	
	
	
	

	public function change_password()
	{		 
					  
			$this->form_validation->set_rules('old_password', 'Old Password', 'trim|required');
			$this->form_validation->set_rules('new_password', 'New Password', 'trim|required|valid_password');
			$this->form_validation->set_rules('confirm_password', 'Confirm Password', 'trim|required|matches[new_password]');
			
			
			if ($this->form_validation->run() == TRUE)
			{
				
				    $password_old   =  $this->safe_encrypt->encode($this->input->post('old_password',TRUE));	
				    $mres           =  $this->members_model->get_member_row($this->userId," AND password='$password_old' ");
					
					if( is_array($mres) && !empty($mres) )
					{						
						$password = $this->safe_encrypt->encode($this->input->post('new_password',TRUE));				
						$data = array('password'=>$password);			
						$where = "customers_id=".$this->session->userdata('user_id')." ";
						$this->members_model->safe_update('tbl_customers',$data,$where,FALSE);					
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success',$this->config->item('myaccount_password_changed'));	
				
						
					}else
					{						
						$this->session->set_userdata(array('msg_type'=>'warning'));
						$this->session->set_flashdata('warning',$this->config->item('myaccount_password_not_match'));
						
					}
					
					
				 redirect('members/change_password','');
				 
			}
		
		/* End  member change password  */  	  
		
		$data['unq_section'] = "Myaccount";
		$data['heading_title'] = "Account Settings";
		$this->load->view('members/view_member_change_password',$data);	
	} 


	public function wishlist()
	{	
	    $config['per_page']		=   $this->config->item('per_page');
		$offset                 =   $this->uri->segment(3,0);	
		$limit				    =	$config['per_page'];	
		$next				    = 	$offset+$limit;			
					
		$res_array                      = $this->members_model->get_wislists($offset,$config['per_page']);	
		$config['total_rows']	        = $this->members_model->total_rec_found;					
		$more_paging['start_tag']       ='<div class="mt10 b" style="text-align:center">';
		$more_paging['text']            ='View More';
		$more_paging['end_tag']         ='</div>';		
		$more_paging['more_container']  = 'more_data';		
		$data['more_link']           =    more_paging("members/wishlist/$next",$config['total_rows'],$limit,$next,$more_paging);
		
		$data['res']                 = 	$res_array;	
		$data['title']               = "My Wish List";	
		$data['unq_section']         = "Myaccount";	 
		$this->load->view('members/view_member_wishlists',$data);			
		
	}

   public function remove_wislist($wishlists_id)
   {
	    if( $wishlists_id!='' )
		{
			$where = array('wishlists_id'=>$wishlists_id,'customer_id'=>$this->userId);
			$this->members_model->safe_delete('tbl_wishlists', $where,FALSE);			
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$this->config->item('wish_list_delete'));		
			redirect('members/wishlist','');
		}	
		
	   
   }


	public function orders_history()
	{
		$this->load->model(array('order/order_model'));
		
	    $config['per_page']		=   $this->config->item('per_page');
		$offset                 =   $this->uri->segment(3,0);	
		$limit				    =	$config['per_page'];	
		$next				    = 	$offset+$limit;			
		
		$data['unq_section'] = "Myaccount";  
		  	
		$condtion = "AND customers_id = '$this->userId' ";		   
		$res_array   = $this->order_model->get_orders($offset,$config['per_page'],$condtion);			
			   
		$config['total_rows']	        = $this->order_model->total_rec_found;					
		$more_paging['start_tag']       ='<div class="mt10 b" style="text-align:center">';
		$more_paging['text']            ='View More';
		$more_paging['end_tag']         ='</div>';		
		$more_paging['more_container']  = 'more_data';		
		$data['more_link']           =    more_paging("members/orders_history/$next",$config['total_rows'],$limit,$next,$more_paging);
		
		$data['res']                 = 	$res_array;		 
		
		$this->load->view('view_member_orders',$data);
		
	}	
	
	
	public function print_invoice()
	{
		    $this->load->model(array('order/order_model'));
			$ordId              = (int) $this->uri->segment(3);
			$order_res          = $this->order_model->get_order_master( $ordId );
			$order_details_res  = $this->order_model->get_order_detail($order_res['order_id']);			
			$data['orddetail']  = $order_details_res;
			$data['ordmaster']  = $order_res;			
			$this->load->view('view_invoice_print',$data);
	}
	
	
	
}
/* End of file member.php */
/* Location: .application/modules/member/member.php */