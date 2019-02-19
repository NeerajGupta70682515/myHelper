<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Chunao_model extends MY_Model
 {
	 public function get_all_chunao()
	 {		
	
		$q=$this->db->get('tbl_chunao_category');
	
		$result = $q->result_array();	
			
		return $result;
	}
	public function get_chunao_byId($data)
	 {		
	
		$q=$this->db->get_where('tbl_chunao_category',$data);
	
		$result = $q->result_array();	
			
		return $result[0];
	}
}
?>