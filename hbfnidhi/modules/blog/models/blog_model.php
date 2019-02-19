<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class blog_model extends MY_Model
{
	public function get_blog()
	{
		$condtion = "status ='1'";
		$pst_data = array(
								'condition'=>$condtion,
								'order'=> "blog_id ASC",
								'limit'=> '6',	
								'debug'=>FALSE,
								'return_type'=>"array"						  
								);		
		$result = $this->findAll('tbl_blog',$pst_data);
		//print_r($result);  die;
		return $result;	
	}
	
}


?>