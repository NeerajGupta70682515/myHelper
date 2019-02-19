<?php
class Lockers extends  Admin_Controller{

	public function __construct()
	{		
		parent::__construct(); 			
		$this->load->model(array('adminzone/lockers_model'));
		$this->config->set_item('menu_highlight','other management');
	}
                     

	public  function index()
	{
		
		$pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 
	 	$res_array               =  $this->lockers_model->get_lockers($config['limit'],$offset);
	    $config['total_rows']    =  get_found_rows();
		$data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
				
		$data['heading_title']   =   'Lockers';
		$data['res']             =  $res_array; 
		if($this->input->post('status_action')!='')
		{
			$this->update_status('tbl_lockers','locker_id');
		}		
		$this->load->view('lockers/view_lockers_list',$data);		
	}
	
	
	
	
	public function add(){		
		
		$this->form_validation->set_rules('locker_name','Name','trim|required|max_length[50]|alpha');
		$this->form_validation->set_rules('locker_email','Email','trim|required|max_length[50]');
		$this->form_validation->set_rules('locker_mobile','Mobile','trim|required|max_length[11]|min_length[10]|numeric');
		$this->form_validation->set_rules('locker_city','City','trim|required|max_length[80]|alpha');
		$this->form_validation->set_rules('locker_description','Message','trim|required|max_length[118500]');
	
		if($this->form_validation->run() == TRUE){
			
			$posted_data = array(
				'locker_name' 		=>	$this->input->post('locker_name'),
				'locker_email' 		=>	$this->input->post('locker_email'),
				'locker_city' 		=>	$this->input->post('locker_city'),
				'locker_mobile' 	=>	$this->input->post('locker_mobile'),
				'locker_message' 	=>	$this->input->post('locker_description'),
				'status'			=>	'1',
				'date'				=>	$this->config->item('config.date.time')
			);
			
			$this->lockers_model->safe_insert('tbl_lockers',$posted_data,FALSE);
			$this->session->set_userdata(array('msg_type' => 'success'));
			$this->session->set_flashdata(array('success',lang('success')));
			redirect('adminzone/lockers','');
		}
		
		$data['ckeditor']  		=  set_ck_config(array('textarea_id'=>'locker_desc'));	
		$data['heading_title'] 	= "Add Locker";
		$this->load->view('lockers/view_lockers_add',$data);
		
		
	}
	
	
	public function edit(){
		
		$id = (int)$this->uri->segment(4);
		$condition= array('where'=>"locker_id ='$id' ");
		$res	= $this->lockers_model->get_lockers(1,0,$condition);
		$data['pageresult'] = $res;
	
		$this->form_validation->set_rules('locker_name','Name','trim|required|max_length[50]|alpha');
		$this->form_validation->set_rules('locker_email','Email','trim|required|max_length[50]');
		$this->form_validation->set_rules('locker_mobile','Mobile','trim|required|max_length[11]|min_length[10]|numeric');
		$this->form_validation->set_rules('locker_city','City','trim|required|max_length[80]|alpha');
		$this->form_validation->set_rules('locker_description','Message','trim|required|max_length[118500]');
	
		if($this->form_validation->run() == TRUE){
			
			$posted_data = array(
				'locker_name' 		=>	$this->input->post('locker_name'),
				'locker_email' 		=>	$this->input->post('locker_email'),
				'locker_city' 		=>	$this->input->post('locker_city'),
				'locker_mobile' 	=>	$this->input->post('locker_mobile'),
				'locker_message' 	=>	$this->input->post('locker_description'),
			);

			$where = "locker_id = '".$this->input->post('id')."'";
			$this->lockers_model->safe_update('tbl_lockers',$posted_data,$where);
			$this->session->set_userdata(array('msg_type'=>'success'));				
			$this->session->set_flashdata('success',lang('successupdate'));	
			redirect('adminzone/lockers','');
					
		}
	
		$data['heading_title'] = "Edit Locker";
		$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'locker_desc'));	
	
		$this->load->view('lockers/view_lockers_edit',$data);
			
	}
	
	
	
	public function send_reply()
	{
		$rid =  (int) $this->uri->segment(4);
		$this->db->select("*,CONCAT_WS(' ',first_name,last_name) AS name",FALSE);
		$res_data =  $this->db->get_where('tbl_enquiry', array('id' =>$rid))->row();	
	    $this->load->library('email');
	   
		if( is_object( $res_data ) )
		{ 
			$this->form_validation->set_rules('subject', 'Subject', 'required|xss_clean');	
			$this->form_validation->set_rules('message', 'Message', 'required|xss_clean');
			
			if ($this->form_validation->run() == TRUE)
			{			
				/* Reply  mail to user */
				
						
				$mail_to      = $res_data->email;
				$mail_subject = $this->input->post('subject'); 				
				$from_email   = $this->admin_info->admin_email;
				$from_name    =  $this->config->item('site_name');				
				$body = "Dear ".$res_data->name.",<br /><br />	";					
				$body .= $this->input->post('message');				
				 $body .= "<br /> <br />						   
									Thanks and Regards,<br />						   
									".$this->config->item('site_name')." Team ";		
							
				$this->email->from($from_email,$from_name);
				$this->email->to($mail_to);			
				$this->email->subject($mail_subject);				
				$this->email->message($body);
				$this->email->set_mailtype('html');
				$this->email->send();
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('admin_mail_msg'));
									
				redirect('adminzone/enquiry/send_reply/'.$res_data->id, '');
				
				/* End reply mail to user */				
		}
		$data['heading_title'] = "Send Reply";
		$this->load->view('enquiry/view_send_enq_reply',$data);
		
	}else
	{
		redirect('adminzone/enquiry/','');
		
	}
	
	
 }
	
	
	
		
}
// End of controller