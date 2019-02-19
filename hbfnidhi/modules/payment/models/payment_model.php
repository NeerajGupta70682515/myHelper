<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class payment_model extends MY_Model {
	
	public function get_payment()
	{
		
		$query=$this->db->get('tbl_payment_setting');
		$result  =$query->result_array();
		if($result)
		{
			return $result[0];
		}
		else{
			return false;
		}
	}
	
	
	
	
	
   public function get_order_master($oid)
	{
						
		$condtion = "order_status ='Pending' AND order_id='$oid'  ";
		$fetch_config = array(
								'condition'=>$condtion,
								'debug'=>FALSE,
								'return_type'=>"array"							  
								);		
		$result = $this->find('tbl_order',$fetch_config);
		//print_r($result);  die;
		//echo count($result); die;
		return $result;	
	}
	 
	
	public function get_order_detail($oid)
	{
						
		$condtion = "order_status ='Pending' AND order_id='$oid'  ";
		$fetch_config = array(
								'condition'=>$condtion,
								'debug'=>FALSE,
								'return_type'=>"array"							  
								);		
		$result = $this->find('tbl_order',$fetch_config);
		//print_r($result);  die;
		//echo count($result); die;
		return $result;	
	}
	
}
/* End of file member_model.php */
/* Location: ./application/modules/cart/models/cart_model.php */