<?php
class Loan_process extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('loan_process_model'));  		
		$this->config->set_item('menu_highlight','other management');				
	}
	 
	public  function index()
	{
		
		$pagesize               =  (int) $this->input->get_post('pagesize');
		 		
	    $config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 		 				
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page')); 
									 						 	
	 	$res_array              =  $this->loan_process_model->get_loan_process($config['limit'],$offset);
						
	    $config['total_rows']   =  get_found_rows();
		
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
				
		$data['heading_title']  =  'Loan Process';
						
		$data['res']            =  $res_array; 
			
		
		if($this->input->post('status_action')!='')
		{
			
			$this->update_status('tbl_loan_process','loan_process_id');
			
		}		
						
		$this->load->view('loan_process/loan_process_list_index_view',$data);		
		
		
	}	
	
	
	public function post()
	{			
					
		$this->form_validation->set_rules('loan_process_title','Title','trim|required|xss_clean|max_length[150]');
		$this->form_validation->set_rules('loan_process_description','Description','trim|required|xss_clean|max_length[8500]');
	
		 $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'loan_process_description'));		
		 		
		if($this->form_validation->run()==TRUE)
		{
			$uploaded_file = "";	
				
			    if( !empty($_FILES) && $_FILES['image']['name']!='' )
				{			  
					$this->load->library('upload');	
						
					$uploaded_data =  $this->upload->my_upload('image','product');
				
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					
					}		
					
				}		
			
			$posted_data=array(				
			'loan_process_title'      	=>	$this->input->post('loan_process_title',TRUE),
			'loan_process_description' 	=> 	$this->input->post('loan_process_description'),
			'loan_process_image'		=>	$uploaded_file,
			'status'					=> 	'1',						
			'recv_date'            		=> 	$this->config->item('config.date.time')
			);			
			$this->loan_process_model->safe_insert('tbl_loan_process',$posted_data,FALSE); 			
			
			$message = $this->config->item('loan_process_post_success');			
			$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
									
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$message);
			redirect('adminzone/loan_process', ''); 
			
		}		
		$data['heading_title'] = "Post Loan Process";	
		$this->load->view('loan_process/loan_process_add_view',$data);	
		
		
	}
	
	
	public function edit()
	{	
	
	          $id 		=	(int) $this->uri->segment(4);
		      $param    =	array('where'=>"loan_process_id ='$id' ");
	    	  $res      = 	$this->loan_process_model->get_loan_process(1,0,$param);
		
			if( is_array($res) && !empty($res) )
			{	
					
				$this->form_validation->set_rules('loan_process_title','Title','trim|required|xss_clean|max_length[150]');
				$this->form_validation->set_rules('loan_process_description','Description','trim|required|xss_clean|max_length[8500]');
				
				$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'loan_process_description'));
				
				if($this->form_validation->run()==TRUE)
				{
	
					$uploaded_file = $res['loan_process_image'];
					$unlink_image = array('source_dir'=>"product",'source_file'=>$res['loan_process_image']);

					if( !empty($_FILES) && $_FILES['image']['name']!='' )
					{
						  $this->load->library('upload');
						  $uploaded_data =  $this->upload->my_upload('image','product');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	
				
					$posted_data=array(				
					'loan_process_title'       			=> 	$this->input->post('loan_process_title',TRUE),
					'loan_process_description'			=> 	$this->input->post('loan_process_description'),
					'loan_process_image'		        =>	$uploaded_file
					);					
					 $where = "loan_process_id = '".$res['loan_process_id']."'"; 				
					 $this->loan_process_model->safe_update('tbl_loan_process',$posted_data,$where,FALSE);
					 $this->session->set_userdata(array('msg_type'=>'success'));				
					 $this->session->set_flashdata('success',lang('successupdate'));	
					
					redirect('adminzone/loan_process', ''); 
				
				}		
				$data['heading_title'] = "Edit Loan Process";	
				$data['res'] = $res;	
				$this->load->view('loan_process/loan_process_edit_view',$data);	
			}else
			{
				redirect('adminzone/loan_process', ''); 
				
			}
		
	}
	
	
}
// End of controller