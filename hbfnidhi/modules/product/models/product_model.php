<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Product_model extends MY_Model
 {

		 
	 public function get_product($limit='10',$offset='0',$param=array())
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
						
			$this->db->where("(product_title LIKE '%".$keyword."%' )");
				
		}
		if($orderby!='')
		{
			 $this->db->order_by($orderby);
			
		}else
		{
		  $this->db->order_by('product_id','desc');
		}
		
		$this->db->limit($limit,$offset);
		$this->db->select('SQL_CALC_FOUND_ROWS*',FALSE);
		$this->db->from(' tbl_product');
		$q=$this->db->get();
		//echo_sql();
		$result = $q->result_array();	
		$result = ($limit=='1') ? $result[0]: $result;	
		return $result;
				
	}
	
	public function getadmission()
	 {
	 	$condtion = "status ='1'  ";
		$pst_data = array(
								'condition'=>$condtion,
								'order'=>"sort_order ASC",	
								'debug'=>FALSE,
								'return_type'=>"array"						  
								);		
		$result = $this->findAll('tbl_admission',$pst_data);
		return $result;	
	
	 }
		  
	 
}
?>