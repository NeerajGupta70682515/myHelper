<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home_model extends MY_Model
{

	public  function get_homebanner($page=array())
	{		
		if( is_array($page) && !empty($page) )
		{			
			$result =  $this->db->get_where('tbl_slide_banners',$page)->result();

			if( is_array($result) && !empty($result) )
			{
				return $result;
			}
			
		}	
			
	}
	
	
	
	public function get_product($limit = '4')
	{
		$condtion = "status ='1'";
		$pst_data = array(
						'condition'=>$condtion,
						'order'=>"product_id ASC",	
						'limit'=>$limit,
						'debug'=>FALSE,
						'return_type'=>"array"						  
					);		
		$result = $this->findAll('tbl_product',$pst_data);
		//print_r($result);  die;
		return $result;	
	}

	public function get_all_product()
	{
		$condtion = "status ='1'";
		$pst_data = array(
						'condition'=>$condtion,
						'order'=>"product_id ASC",	
						'debug'=>FALSE,
						'return_type'=>"array"						  
					);		
		$result = $this->findAll('tbl_product',$pst_data);
		//print_r($result);  die;
		return $result;	
	}
	
	public function get_product_sort()
	{
		$condtion = "status ='1'";
		$pst_data = array(
								'condition'=>$condtion,
								'order'=>"product_id ASC",	
								'debug'=>FALSE,
								'return_type'=>"array"						  
								);		
		$result = $this->findAll('tbl_product',$pst_data);
		//print_r($result);  die;
		return $result;	
	}
	
	public function get_testimonials()
	{
		$condtion = "status ='1' AND testimonials_image !='' ";
		$pst_data = array(
								'condition'=>$condtion,
								'order'=>"testimonials_id DESC",	
								'debug'=>FALSE,
								'return_type'=>"array"						  
								);		
		$result = $this->findAll('tbl_testimonials',$pst_data);
		//print_r($result);  die;
		return $result;	
	}
	
	
	
	public function get_our_solution()
	{
		$condtion = "status ='1' AND featured_product='1' AND fee !=''";
		$pst_data = array(
								'condition'=>$condtion,
								'order'=> "service_id ASC",	
								'debug'=>FALSE,
								'return_type'=>"array"						  
								);		
		$result = $this->findAll('tbl_services',$pst_data);
		//echo "<pre>"; print_r($result);  die;
		return $result;	
	}
	
	
	public function get_blog()
	{
		$condtion = "status ='1'";
		$pst_data = array(
								'condition'=>$condtion,
								'order'=> "blog_id ASC",	
								'debug'=>FALSE,
								'return_type'=>"array"						  
								);		
		$result = $this->findAll('tbl_blog',$pst_data);
		//print_r($result);  die;
		return $result;	
	}
	
	
}


?>