<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Channel_model extends MY_Model
 {
	 public function get_all_channel()
	 {		
	
		$q=$this->db->get('tbl_channel_category');
	
		$result = $q->result_array();	
			
		return $result;
	}
	public function get_channel_byId($data)
	 {		
	
		$q=$this->db->get_where('tbl_channel_category',$data);
	
		$result = $q->result_array();	
			
		return $result[0];
	}
}
?>