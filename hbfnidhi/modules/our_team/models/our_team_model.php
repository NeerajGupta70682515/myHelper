<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Our_team_model extends MY_Model
{
	
	public  function get_our_team($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{			
			$result =  $this->db->get_where('tbl_our_team',$page)->row_array();

			if( is_array($result) && !empty($result) )
			{
	
				return $result;
			}
			
		}	
			
	}
	

	public function get_all_our_team($offset='0',$limit='10')
	{
		
		$keyword = $this->db->escape_str($this->input->get_post('keyword'));
		
		$condtion = ($keyword!='') ? "status !='2' AND our_team_name LIKE '%".$keyword."%'" :
		"status !='2' ";
		
		$fetch_config = array(
							  'condition'=>$condtion,
							  'order'=>"sort_order ASC",
							  //'limit'=>$limit,
							 // 'start'=>$offset,
							  'debug'=>FALSE,
							  'return_type'=>"array"
							  );		
		$result = $this->findAll('tbl_our_team',$fetch_config);
		return $result;	
	
	}
	
		
}