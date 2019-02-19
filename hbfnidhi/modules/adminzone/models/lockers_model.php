<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Lockers_model extends MY_Model
{

	public function __construct()
	{
		parent::__construct();
	}

	public function get_lockers($limit='10',$offset='0',$param=array())
	{
		
		$status			    =   @$param['status'];
		$orderby		    =   @$param['orderby'];	
		$where		        =   @$param['where'];	
		
		$keyword = $this->db->escape_str($this->input->get_post('keyword',TRUE));
			
	    if($status!='')
		{
			$this->db->where("status","$status");
		}
		
	    if($where!='')
		{
			$this->db->where($where);
		}
		
		
		if($keyword!='')
		{
						
			$this->db->where("(locker_name LIKE '%".$keyword."%' )");
				
		}
		if($orderby!='')
		{
			 $this->db->order_by($orderby);
			
		}else
		{
		  $this->db->order_by('locker_id','desc');
		}
		
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from(' tbl_lockers');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
	}
	


	public function get_one_locker($id){
		
		$fetch_config = array(
			'locker_id' 	=> $id,
			
		
		);
		
		$result = $this->find('tbl_lockers',$fetch_config);
		return $result;
	}	
}
// model end here