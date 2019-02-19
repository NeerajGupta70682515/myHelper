<?php
class Our_team extends Public_Controller
{
		public function __construct() {
		
				parent::__construct();
				$this->load->model(array('our_team/our_team_model','home/home_model','adminzone/news_model'));
			
		}
	
		
	    public function index()
		{
		 
			 $team	         	=  $this->our_team_model->get_all_our_team();
			 $data['team'] 		=  $team;
			 $data['news']	 		=  $this->news_model->get_news(2,0,array('status' => '1'));
			 $this->load->view('our_team/our_team_view',$data);
		}

}

/* End of file our_team.php */