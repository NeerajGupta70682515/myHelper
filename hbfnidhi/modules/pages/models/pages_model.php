<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Pages_model extends MY_Model
{
	
	public  function get_cms_page($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{			
			$result =  $this->db->get_where('tbl_cms_pages',$page)->row_array();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
			
		}	
			
	}	
	
	
	
	
	public function get_all_cms_page($offset='0',$limit='10')
	{
		
		$keyword = $this->db->escape_str($this->input->get_post('keyword'));
		
		$condtion = ($keyword!='') ? "status !='2' AND page_name LIKE '%".$keyword."%'" :
		"status !='2' ";
		
		$fetch_config = array(
							  'condition'=>$condtion,
							  'order'=>"page_name DESC",
							  //'limit'=>$limit,
							 // 'start'=>$offset,							 
							  'debug'=>FALSE,
							  'return_type'=>"array"							  
							  );		
		$result = $this->findAll('tbl_cms_pages',$fetch_config);
		return $result;	
	
	}
	
	
	
	
	public function get_admin_detail()
	{
		$q=$this->db->get('tbl_admin');
	$query=	$q->result_array();
		$q=$query[0];	
		return $q;
		
	}
	
	public function is_email_exits($data)
	{
		$this->db->select('subscriber_id');
		$this->db->from('tbl_newsletters');
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
	
		
}