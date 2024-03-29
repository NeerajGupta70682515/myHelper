<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends MY_Model
{

	/**
	* Get account by id
	*
	* @access public
	* @param string $account_id
	* @return object account object
	*/
	public function create_user()
	{
	
		  $password = $this->safe_encrypt->encode($this->input->post('password',TRUE));
		  $is_same_bill_ship =   $this->input->post('is_same',TRUE);
		  
				$register_array = array
				( 					
					'user_name'        => $this->input->post('user_name',TRUE),
					'password'         => $password,
					//'title'            => $this->input->post('title',TRUE),
					'first_name'       => $this->input->post('first_name',TRUE),
					'last_name'        => $this->input->post('last_name',TRUE),
					'phone_number'     => $this->input->post('phone_number',TRUE),	
					'actkey'           =>md5($this->input->post('user_name',TRUE)),
					'account_created_date'=>$this->config->item('config.date.time'),
					'current_login'    =>$this->config->item('config.date.time'),
					'status'=>'1',
					'is_verified'=>'1',									
					'ip_address'  =>$this->input->ip_address()
					
				);
				
			  $insId =  $this->safe_insert('tbl_customers',$register_array,FALSE);
			   
			   
			if( $insId > 0 )
			
			{
					$billing_array = array
					( 	
					    'customer_id'  =>$insId,				
						'name'        => $this->input->post('billing_name',TRUE),
						'address'     => $this->input->post('billing_address',TRUE),
						'zipcode'     => $this->input->post('billing_zipcode',TRUE),
						'phone'       => $this->input->post('billing_phone',TRUE),
						'city'        => $this->input->post('billing_city',TRUE),	
						'state'       => $this->input->post('billing_state',TRUE),
						'country'     => $this->input->post('billing_country'),
						'reciv_date'  => $this->config->item('config.date.time'),
						'address_type' =>'Bill',
						'default_status'=>'Y'
					);	
					
					$bill_Id =  $this->safe_insert('tbl_customers_address_book',$billing_array,FALSE);
					
					if( $bill_Id > 0 )
					{
						
						 /*if( $is_same_bill_ship =='Y')
						 {							 
							 
							$shipping_array = array
							( 	
							'customer_id'  =>$insId,				
							'name'        => $this->input->post('billing_name',TRUE),
							'address'     => $this->input->post('billing_address',TRUE),
							'zipcode'     => $this->input->post('billing_zipcode',TRUE),
							'phone'       => $this->input->post('billing_phone',TRUE),
							'city'        => $this->input->post('billing_city',TRUE),	
							'state'       => $this->input->post('billing_state',TRUE),
							'country'     => $this->input->post('billing_country'),
							'reciv_date'  => $this->config->item('config.date.time'),
							'address_type' =>'Ship',
							'default_status'=>'Y'
							);
					
							 
						 }else
						 {*/
								 $shipping_array =  array
								 ( 	
									'customer_id'  =>$insId,				
									'name'        => $this->input->post('shipping_name',TRUE),
									'address'     => $this->input->post('shipping_address',TRUE),
									'zipcode'     => $this->input->post('shipping_zipcode',TRUE),
									'phone'       => $this->input->post('shipping_phone',TRUE),
									'city'        => $this->input->post('shipping_city',TRUE),	
									'state'       => $this->input->post('shipping_state',TRUE),
									'country'     => $this->input->post('shipping_country'),
									'reciv_date'  => $this->config->item('config.date.time'),
									'address_type' =>'Ship',
									'default_status'=>'Y'
								 );	
							
						// }							
						
						$this->safe_insert('tbl_customers_address_book',$shipping_array,FALSE);
				
					}
					
				 return  $insId ;
		           
			}		
		 
	}


	public function is_email_exits($data)
	{
		$this->db->select('customers_id');
		$this->db->from('tbl_customers');
		$this->db->where($data);	
		$this->db->where('status !=', '2');
		
		$query = $this->db->get();
		if ($query->num_rows() == 1)
		{
			return TRUE;
			
		}else
		{
			return FALSE;
	
		}
		
	}	

	public function logout()
	{
		$data = array(
		'user_id' => 0,
		'email' => 0,
		'name'=>0,
		'user_photo'=>0,
		'logged_in' => FALSE
		);		
		$this->session->sess_destroy();
		$this->session->unset_userdata($data);
	}


	
}
/* End of file users_model.php */
/* Location: ./application/modules/users/models/users_model.php */