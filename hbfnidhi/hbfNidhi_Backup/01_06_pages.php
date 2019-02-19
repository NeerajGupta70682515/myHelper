<?php
class Pages extends Public_Controller
{
		public function __construct() {
		
				parent::__construct(); 
				$this->load->library(array('Dmailer'));	
				$this->load->model(array('home/home_model','pages/pages_model'));				
			 	
		}
		
	    public function index()
		{
			 $friendly_url = $this->uri->segments[1];
		     $condition       = array('friendly_url'=>$friendly_url,'status'=>'1');
			 $content         =  $this->pages_model->get_cms_page( $condition );	
			 $data['content'] = $content;
			 $this->load->view('pages/cms_page_view',$data);	
		}	
	
		public function aboutus()
		{
		     $friendly_url    = $this->uri->segments[2];			 
		     $condition       = array('friendly_url'=>$friendly_url,'status'=>'1');
			 $content         =  $this->pages_model->get_cms_page( $condition );
			 $data['content'] = $content;
			 $this->load->view('pages/aboutus',$data);
		}
		
	    public function blog()
		{
			 $this->load->view('pages/blog');	
		}	
	   
	    public function contact_us()
		{
		$this->form_validation->set_rules('name','Name','trim|alpha|required|max_length[30]');
		$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[80]');
		$this->form_validation->set_rules('mobile','Mobile No','required');			
		$this->form_validation->set_rules('message','Message','trim|required|max_length[118500]');	
				if($this->form_validation->run()==TRUE)
				{			
					$posted_data=array(				
					'first_name'    => $this->input->post('name'),
					'email'         => $this->input->post('email'),
					'phone_number'	=> $this->input->post('mobile'),		
					'message'       => $this->input->post('message'),	
					'mobile'        => 'Contact Us',
					'ip_address'    => $this->input->ip_address(),
					'receive_date'  =>$this->config->item('config.date.time')
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
			 $content         =  $this->pages_model->get_cms_page( $condition );
			 $data['content'] = $content;
			 $this->load->view('pages/contact_us',$data);	
		}
	
	
	
		public function call_back()
		{
				
				$this->form_validation->set_rules('name','Name','trim|alpha|required|max_length[30]');
				$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[80]');
				$this->form_validation->set_rules('mobile','Mobile No','required');			
				
				if($this->form_validation->run()==TRUE)
				{			

					$posted_data=array(				
					'first_name'    => $this->input->post('name'),
					'email'         => $this->input->post('email'),
					'phone_number'	=> $this->input->post('mobile'),		
					'state'         => $this->input->post('state'),	
					'mobile'        => 'Schedule A Call Back',
					'receive_date'  => $this->config->item('config.date.time')
					);

					$this->pages_model->safe_insert('tbl_enquiry',$posted_data,FALSE); 

					/*---User Mail ---*/
					$mail_to      = $this->input->post('email');
					$mail_subject = 'Schedule A Call Back'; 				
					$from_email   = $this->admin_info->admin_email;
					$from_name    =  $this->config->item('site_name');				
					$body = "Dear ".$this->input->post('name').",<br /><br />	";					
					$body .= 'Thanks for Schedule A Call Back in '.$this->config->item('site_name');				
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
					$mail_subject = 'Schedule A Call Back'; 				
					$from_email   = $this->input->post('email');
					$from_name    =  $this->config->item('site_name');				
					$body = "Dear Admin,<br /><br />	";	
					$body .= "Schedule a call back  has been submitted with following info : <br /><br />	";					
					$body .= 'Name : '.$this->input->post('name').
					'<br /><br />Email : '.$this->input->post('email').
					'<br /><br />Mobile : '.$this->input->post('mobile').	
					'<br /><br />State : '.$this->input->post('state');	
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
					$this->session->set_userdata('sign','Done');
					redirect('home', ''); 

				} 
				
		     $friendly_url    = $this->uri->segments[1];			
		     $condition       = array('friendly_url'=>$friendly_url,'status'=>'1');			 
			 $content         =  $this->pages_model->get_cms_page( $condition );
			 $data['content'] = $content;
			 $this->load->view('pages/contact_us',$data);	
		}
	
		
		 public function newsletter()
	   	  {
			//die("mmm");
		    $this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[80]|callback_email_check');
			if($this->form_validation->run()==TRUE)
			{			
			$posted_data=array(				
			'subscriber_email' 	=> $this->input->post('email'),
			'subscribe_date'     =>$this->config->item('config.date.time')
			);
			$this->pages_model->safe_insert('tbl_newsletters',$posted_data,FALSE); 
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success', 'Newsletter  has been subscribed successfully.');
			redirect('/', ''); 
			} 
			else
			{
				$this->session->set_userdata(array('msg_type'=>'danger'));
				$this->session->set_flashdata('danger','Newsletter has been already subscribed.');
				redirect('/');
			}
				
    
		}
	
	
	   
	
	    public function not_found()
	    {
		  $this->load->view('default.php');
	    }
	
		public function email_check()
		{
			$email = $this->input->post('email');
			if ($this->pages_model->is_email_exits(array('subscriber_email' => $email)))
			{
				$this->form_validation->set_message('email_check', $this->config->item('exists_user_id'));
				return FALSE;
			}else
			{
				return TRUE;
			}
		}
		

}

/* End of file pages.php */