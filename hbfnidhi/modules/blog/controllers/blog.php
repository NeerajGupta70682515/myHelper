<?php
class Blog extends Public_Controller
{
	public function __construct()
	{
		parent::__construct();				
		$this->load->model(array('blog/blog_model','pages/pages_model','adminzone/news_model'));
	}
	public function index()
	{
		$data['blog'] =  $this->blog_model->get_blog();
		$this->load->view('blog_listing',$data);	
	}
	
	public function blogs()
	{//die("MM");
		$this->load->view('blog');	
	}
}