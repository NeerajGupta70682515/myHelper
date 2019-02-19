<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class utils_model extends MY_Model
 {
	  
		
	public function fetch_category()
	{
		$data=array('status'=>'1','parent_id'=>'0');
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get_where('tbl_categories',$data);
		$res = $query->result_array();
		return $res;
	}
	
	public function get_child_category($id)
	{
		$data=array('status'=>'1','parent_id'=>$id);
		$this->db->order_by("sort_order", "asc");
		$query = $this->db->get_where('tbl_categories',$data);
		$res = $query->result_array();
		return $res;
	}
	
	public function get_service_list($id)
	{
		$data=array('status'=>'1','category_id'=>$id);
		$this->db->order_by("service_id", "asc");
		$query = $this->db->get_where('tbl_services',$data);
		$res = $query->result_array();
		
		return $res;
	}
	 
}