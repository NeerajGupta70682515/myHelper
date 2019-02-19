<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Loan_process_model extends MY_Model
 {

		 
	 public function get_loan_process($limit='10',$offset='0',$param=array())
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
						
			$this->db->where("(loan_process_title LIKE '%".$keyword."%' )");
				
		}
		if($orderby!='')
		{
			 $this->db->order_by($orderby);
			
		}else
		{
		  $this->db->order_by('loan_process_id','desc');
		}
		
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from(' tbl_loan_process');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
				
	}
		  
	
	
	
	 public function get_loan_process_by_id($id)
	 {		
		$this->db->where("status != '2' AND loan_process_id='$id'");
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from(' tbl_loan_process');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();
		return $result;
				
	}
	 
}
?>