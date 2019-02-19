<?php
class Product extends Public_Controller
{

	public function __construct()
	{
		parent::__construct(); 
		$this->load->model(array('product/product_model','home/home_model','adminzone/news_model'));
		$this->load->model(array('pages/pages_model'));
	    $this->form_validation->set_error_delimiters("<div class='required'>","</div>");
		
	}

	public function index()
	{
		 
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 
		 $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('per_page');
		  
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		 	
		 $page_segment           = find_paging_segment();
		 
		 						
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
				
		$param = array('status'=>'1');	
		$res_array              	= $this->product_model->get_product($config['limit'],$offset,$param);		
		$config['total_rows']		= get_found_rows();	
	    $data['page_links']      	= pagination_refresh($base_url,$config['total_rows'],$config['limit'],$page_segment);				
		$data['title'] 				= 'Product';
		$data['news']	 		=  $this->news_model->get_news(2,0,array('status' => '1'));
		$data['res'] = $res_array; 	
		
		
		 $condition       = array('friendly_url'=>'product','status'=>'1');			 
		 $content         =  $this->pages_model->get_cms_page( $condition );				 
		 $data['content'] = $content;
		
				
		$this->load->view('product/product_details_view',$data);
		
	}		

	
	public function details()
	{

		$data['homebanner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
		$id = (int) $this->uri->segment(3);		
		$param     = array('status'=>'1','where'=>"product_id ='$id' ");	
		$res       = $this->product_model->get_product(1,0,$param);	
		$data['news']	 		=  $this->news_model->get_news(2,0,array('status' => '1'));
		
		if(is_array($res) && !empty($res))
		{			
			$data['title'] = 'Products';
		    $data['res'] = $res;
			
		    $this->load->view('product/product_details_view',$data);
	
			
		}else
		{
			redirect('product', ''); 
			
		}
		
	}
	
	
}


/* End of file pages.php */

?>
