<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends MY_Model
{

	
	public function get_package()
	{
		$condtion = "status ='1'";
		$pst_data = array(
								'condition'=>$condtion,
								'order'=>"package_id ASC",	
								'limit'=> '3',
								'debug'=>FALSE,
								'return_type'=>"array"						  
								);		
		$result = $this->findAll('tbl_package',$pst_data);
		//print_r($result);  die;
		return $result;	
	}	 
}


?>