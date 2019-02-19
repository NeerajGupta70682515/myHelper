<?php
class Pages extends Public_Controller
{
		public function __construct() {
		
				parent::__construct(); 
				$this->load->library(array('Dmailer'));	
				$this->load->model(array('home/home_model','pages/pages_model','adminzone/news_model','adminzone/lockers_model','adminzone/blog_model','adminzone/gallery_model','adminzone/loan_process_model'));
			 	
		}
		
	    public function index()
		{
			 $friendly_url 		= $this->uri->segments[1];
		     $condition       	= array('friendly_url'=>$friendly_url,'status'=>'1');
			 $content         	=  $this->pages_model->get_cms_page( $condition );	
			 $data['content'] 	= $content;
			 $data['news']	 	=  $this->news_model->get_news(2,0,array('status' => '1'));
			 $data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			 $this->load->view('pages/cms_page_view',$data);	
		}	
	
		public function aboutus()
		{
		     $friendly_url    	= $this->uri->segments[2];			 
		     $condition       	= array('friendly_url'=>$friendly_url,'status'=>'1');
			 $content         	=  $this->pages_model->get_cms_page( $condition );
			 $data['content'] 	= $content;
			 $data['news']	 	=  $this->news_model->get_news(2,0,array('status' => '1'));
			 $data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			 $this->load->view('pages/aboutus',$data);
		}
		
	    public function shareholders()
		{
			$friendly_url    	= $this->uri->segments[2];
		    $condition       	= array('friendly_url'=>$friendly_url,'status'=>'1');
			$content         	=  $this->pages_model->get_cms_page( $condition );
			$data['content'] 	= $content;
			$data['news']	 	=  $this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			$this->load->view('pages/shareholders',$data);	
		}
		
		
		public function doorservices()
		{
			$friendly_url    	= $this->uri->segments[2];			 
		    $condition       	= array('friendly_url'=>$friendly_url,'status'=>'1');
			$content         	=  $this->pages_model->get_cms_page( $condition );
			$data['content'] 	= $content;
			$data['news']	 	=  $this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			$this->load->view('pages/doorservices',$data);	
		}
		
		
		public function csr()
		{
			$friendly_url    	= $this->uri->segments[2];			 
		    $condition       	= array('friendly_url'=>$friendly_url,'status'=>'1');
			$content         	=  $this->pages_model->get_cms_page( $condition );
			$data['content'] 	= $content;
			$data['news']	 	=  $this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			$this->load->view('pages/csr',$data);	
		}
		
		
		public function careers()
		{
			$friendly_url    	= $this->uri->segments[2];			 
		    $condition       	= array('friendly_url'=>$friendly_url,'status'=>'1');
			$content         	=  $this->pages_model->get_cms_page( $condition );
			$data['content'] 	= $content;
			$data['news']	 	=  $this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			$this->load->view('pages/careers',$data);	
		}
		
		
		public function lockers()
		{
		     $this->form_validation->set_rules('name','Name','trim|alpha|required|max_length[52]');
 		     $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[80]');
			 $this->form_validation->set_rules('city','City','trim|alpha|required|max_length[100]');
			 $this->form_validation->set_rules('mobile','Mobile No','required|numeric|max_length[10]|min_length[10]');			
			 $this->form_validation->set_rules('message','Message','trim|required|max_length[118500]');	
			 
			 if($this->form_validation->run() == TRUE){
				
				$posted_data = array(
					'locker_name'		=> $this->input->post('name'),
					'locker_email'		=> $this->input->post('email'),
					'locker_mobile'		=> $this->input->post('mobile'),
					'locker_city'		=> $this->input->post('city'),
					'locker_message'	=> $this->input->post('message'),
					'status'			=> '1',
					'date'				=> $this->config->item('config.date.time')

				);
				 
				 $this->lockers_model->safe_insert('tbl_lockers',$posted_data);
				 $this->session->set_userdata(array('msg_type'=>'success'));
				 $this->session->set_flashdata('success', 'Your Locker Details has been send successfully.We will get back to you soon.');
				 redirect('pages/lockers','');
				 
			  }
			  
			 $data['news']	 	=  $this->news_model->get_news(2,0,array('status' => '1'));
			 $data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			 $this->load->view('pages/lockers',$data);
		}
		
		
		
		public function faqs()
		{
		     //$friendly_url    	= $this->uri->segments[2];			 
		     //$condition       	= array('friendly_url'=>$friendly_url,'status'=>'1');
			 //$content         	=  $this->pages_model->get_cms_page( $condition );
			 //$data['content'] 	= $content;
			 $data['news']	 	=  $this->news_model->get_news(2,0,array('status' => '1'));
			 $data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			 $this->load->view('pages/faqs',$data);
		}
		
		
		
		public function intrest_chart(){

			$data['news']	 		=  $this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			$this->load->view('pages/intrest_chart',$data);		
		
		}
		
		
		public function application_form(){

			$data['news']	 		=  $this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			$this->load->view('pages/application_form',$data);		
		
		}
		
			
	   
	    public function contact_us()
		{
			$this->form_validation->set_rules('name','Name','trim|alpha|required|max_length[52]');
			$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[80]');
			$this->form_validation->set_rules('city','City','trim|alpha|required|max_length[100]');
			$this->form_validation->set_rules('mobile','Mobile No','required|numeric|max_length[10]|min_length[10]');			
			$this->form_validation->set_rules('message','Message','trim|required|max_length[118500]');	
				
				if($this->form_validation->run()==TRUE)
				{			
					$posted_data=array(				
						'name'    => $this->input->post('name'),
						'email'         => $this->input->post('email'),
						'city'			=> $this->input->post('city'),
						'message'       => $this->input->post('message'),
						'mobile'        => $this->input->post('mobile'),						
						'ip_address'    => $this->input->ip_address(),
						'receive_date'  => $this->config->item('config.date.time')
					);

					$this->pages_model->safe_insert('tbl_enquiry',$posted_data,FALSE); 

					/*---User Mail ---*/
					$mail_to      = $this->input->post('email');
					$mail_subject = 'Contact Us'; 				
					$from_email   = $this->admin_info->admin_email;
					$from_name    =  $this->config->item('site_name');				
					$body = "Dear ".$this->input->post('name').",<br /><br />	";					
					$body .= 'Thanks for Enquiry in '.$this->config->item('site_name');				
					$body .= "<br /> <br />						   
										Thanks and Regards,<br />						   
										".$this->config->item('site_name')." Team ";		
					$this->email->from($from_email,$from_name);
					$this->email->to($mail_to);			
					$this->email->subject($mail_subject);				
					$this->email->message($body);
					$this->email->set_mailtype('html');
					$this->email->send();
					/*---End USER Mail ---*/

					/*---Admin Mail ---*/
					$mail_to      = $this->admin_info->admin_email;
					$mail_subject = 'Contact Us'; 				
					$from_email   = $this->input->post('email');
					$from_name    =  $this->config->item('site_name');				
					$body = "Dear Admin,<br /><br />	";	
					$body .= "Enquiry  has been submitted with following info : <br /><br />	";					
					$body .= 'Name : '.$this->input->post('name').
					'<br /><br />Email : '.$this->input->post('email').
					'<br /><br />Subject : '.$this->input->post('subject').	
					'<br /><br />Message : '.$this->input->post('message');	
					"<br /> <br />						   
										Thanks and Regards,<br />						   
										".$this->config->item('site_name')." Team ";

					$this->email->from($from_email,$from_name);
					$this->email->to($mail_to);			
					$this->email->subject($mail_subject);				
					$this->email->message($body);
					$this->email->set_mailtype('html');
					$this->email->send();
					/*---End Admin Mail ---*/


					$this->session->set_userdata(array('msg_type'=>'success'));
					$this->session->set_flashdata('success', 'Your message has been send successfully.We will get back to you soon.');
					redirect('contact-us', ''); 

				} 
				
		     $friendly_url    = $this->uri->segments[1];			
		     $condition       = array('friendly_url'=>$friendly_url,'status'=>'1');			 
			 $content         = $this->pages_model->get_cms_page( $condition );
			 $data['content'] = $content;
			 $data['news']	 		=  $this->news_model->get_news(2,0,array('status' => '1'));
			 $data['banner'] 	=  $this->home_model->get_homebanner(array('status'=>'1'));
			 $this->load->view('pages/contact_us',$data);	
		}
	
		
		
		public function blog(){
			
			$blog_id = (int) $this->uri->segment(3);
			
			$data['news']	 	=  	$this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  	$this->home_model->get_homebanner(array('status'=>'1'));
			
			
			if($blog_id != ''){
				
				$data['blog_details']		=	$this->blog_model->get_blog_by_id($blog_id);
				$this->load->view('pages/blog_detail',$data);
				
			}else{
			
				$data['blog']		=	$this->blog_model->get_blog();	
				$this->load->view('pages/blog',$data);
			}
		
		}
		
		
		
		public function gallery(){
		
			$data['news']	 	=  	$this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  	$this->home_model->get_homebanner(array('status'=>'1'));
			
			$data['gallery']    =  $this->gallery_model->get_all_gallery();

			
			
			$this->load->view('pages/gallery',$data);
			
		}
		
		
		
		public function loan_detail(){
		
			$loan_id = (int)  $this->uri->segment(3);
			$data['news']	 	=  	$this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  	$this->home_model->get_homebanner(array('status'=>'1'));
			
			$data['loan_detail'] 	=  $this->loan_process_model->get_loan_process_by_id($loan_id);			
			
			$this->load->view('pages/loan_detail',$data);
			
		}



		public function knowledge_detail(){
		
			$know_id = (int)  $this->uri->segment(3);
			$data['news']	 	=  	$this->news_model->get_news(2,0,array('status' => '1'));
			$data['banner'] 	=  	$this->home_model->get_homebanner(array('status'=>'1'));
			
			$data['know_detail'] 	=  $this->news_model->get_news_by_id($know_id);
			
			$this->load->view('pages/knowledge_detail',$data);
			
		}
		
}

/* End of file pages.php */