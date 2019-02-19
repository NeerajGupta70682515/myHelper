<?php
class Home extends Public_Controller
{

	public function  __construct()
	{
		parent::__construct();				
		$this->load->model(array('home/home_model','courses/course_model','category/category_model'));
		$this->load->helper(array('category/category','courses/course'));	
	}
	
	public function index()
	{		
			if($this->input->post('action')=='callback')
			{ 		
					$this->form_validation->set_rules('first_name','First Name','trim|alpha|required|max_length[30]');
					$this->form_validation->set_rules('email','Email','trim|required|valid_email|max_length[80]');
					$this->form_validation->set_rules('mobile','Mobile','trim|required|max_length[20]');	
					$this->form_validation->set_rules('address','Address','trim|max_length[255]');			
					$this->form_validation->set_rules('message','Message','trim|required|max_length[8500]');		
					//$this->form_validation->set_rules('verification_code','Verification code','trim|required|valid_captcha_code');
					
					if($this->form_validation->run()==TRUE)
					{			
					  				
						$posted_data=array(				
						'first_name'    => $this->input->post('first_name'),
						'email'         => $this->input->post('email'),
						'mobile'		=> $this->input->post('mobile'),	
						'address'  		=> $this->input->post('address'),	
						'message'       => $this->input->post('message'),				
						'receive_date'     =>$this->config->item('config.date.time')
						);
						
						$this->home_model->safe_insert('tbl_callback',$posted_data,FALSE);
						
						/*---User Mail ---*/
						$mail_to      = $this->input->post('email');
						$mail_subject = 'Contact Us'; 				
						$from_email   = $this->admin_info->admin_email;
						$from_name    =  $this->config->item('site_name');				
						$body = "Dear ".$this->input->post('first_name').",<br /><br />	";					
						$body .= 'Thanks for Enquiry in '.$this->config->item('site_name');				
						$body .= "<br /> <br />						   
											Thanks and Regards,<br />						   
											".$this->config->item('site_name')." Team ";		
						/*$this->email->from($from_email,$from_name);
						$this->email->to($mail_to);			
						$this->email->subject($mail_subject);				
						$this->email->message($body);
						$this->email->set_mailtype('html');
						$this->email->send();
						/*---End USER Mail ---*/
						
						/*---Admin Mail ---
						$mail_to      = $this->admin_info->admin_email;
						$mail_subject = 'Contact Us'; 				
						$from_email   = $this->input->post('email');
						$from_name    =  $this->config->item('site_name');				
						$body = "Dear Admin,<br /><br />	";	
						$body .= "Enquiry  has been submitted with following info : <br /><br />	";					
						$body .= 'Name : '.$this->input->post('first_name');
						$body .= '<br /><br />Phone : '.$this->input->post('phone_number');	
						$body .= '<br /><br />Mobile : '.$this->input->post('mobile');	
						$body .= '<br /><br />Email : '.$this->input->post('email');	
						$body .= '<br /><br />Message : '.$this->input->post('message');	
						$body .= "<br /> <br />						   
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
						$this->session->set_flashdata('success', 'Thank you callback request'); 
						redirect('home', ''); 
				
					}
					else
					 {
					 	$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success', 'Plese Enter Valid Details'); 
						redirect('home', ''); 
				
					 } 
			
				}
			$cat_limit = 6;
			$slider =  $this->home_model->get_slider();
			$gallery =  $this->home_model->get_gallery();
			$video =  $this->home_model->get_video();
			$aboutus =  $this->home_model->get_aboutus();
			
			//$fetch_config         =  $this->home_model->get_cms_page();
			//$fetch_config1         =  $this->home_model->get_cms_page1();
			$news =  $this->home_model->get_news();
			//$client =  $this->home_model->get_client();
			//$testimonial =  $this->home_model->get_testimonial();

			$condtion_array = array(
		'field' =>"*,( SELECT COUNT(category_id) FROM tbl_categories AS b
		WHERE b.parent_id=a.category_id ) AS total_subcategories",
		'condition'=>"AND parent_id = '0' AND status='1' ",
        'condition'=>"AND parent_id = '0'",
		'condition'=>"AND parent_id = '0' ",
		'limit'=>$cat_limit,
		'offset'=>0,
		'debug'=>FALSE
		);	
		
		$cat_res  = $this->category_model->getcategory($condtion_array);
		$data['total_cat_found']	=  $this->category_model->total_rec_found;

			$data['slider'] = $slider;
			$data['gallery'] = $gallery;
			$data['video'] = $video;
			$data['aboutus'] = $aboutus;
			
			//$data['fetch_config'] = $fetch_config;
			//$data['fetch_config1'] = $fetch_config1;
			$data['news']	=$news;
			//$data['client'] = $client;
			//$data['testimonial'] = $testimonial;

		    $this->load->view('home',$data);
	}
	
}