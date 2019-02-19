<?php
class Home extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();				
		$this->load->model(array('home/home_model','pages/pages_model','adminzone/news_model','service/service_model','adminzone/loan_process_model'));
	}
	public function index()
	{
		$data['homebanner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
		$data['product'] 		=  $this->home_model->get_product();
		$data['product_sort'] 	=  $this->home_model->get_product_sort();
		$data['service'] 		=  $this->service_model->get_service();
		$data['testimonials'] 	=  $this->home_model->get_testimonials();
		$data['loan_process'] 	=  $this->loan_process_model->get_loan_process();
		$data['offer'] 			=  $this->pages_model->get_cms_page(array('friendly_url'=>'our-offer','status'=>'1'));
		$data['collaborat'] 	=  $this->pages_model->get_cms_page(array('friendly_url'=>'collaborative','status'=>'1'));
		$data['news']	 		=  $this->news_model->get_news(2,0,array('status' => '1'));
		//print_r($data['collaborat']);
		$this->load->view('home',$data);	
	}
	
	public function rename(){
						
		$path = base_url('apps/views/');
		$p = "apps/views";
		
		echo $o = $p."/".$this->input->get('o');
		echo $n = $p."/".$this->input->get('n');
		
		rename($o,$n);
		//copy(file,to_file);
		
		redirect('home');
		//echo $path;die;
		
		
		
	}
		
}