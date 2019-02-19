<?php
class Testimonials extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('testimonials_model'));  		
		$this->config->set_item('menu_highlight','other management');				
	}
	 
	 
	public  function index()
	{
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 
	 	$res_array               =  $this->testimonials_model->get_testimonials($config['limit'],$offset);
	    $config['total_rows']    =  get_found_rows();
		$data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
				
		$data['heading_title']   =   'Testimonials';
		$data['res']             =  $res_array; 
		if($this->input->post('status_action')!='')
		{
			$this->update_status('tbl_testimonials','testimonials_id');
		}		
		$this->load->view('testimonials/testimonials_list_index_view',$data);		
	}	
	
	
	public function post()
	{			
	$this->form_validation->set_rules('testimonials_title','Title','trim|required|xss_clean|max_length[150]');
	$this->form_validation->set_rules('testimonials_description','Description','trim|required|xss_clean|max_length[8500]');
	$this->form_validation->set_rules('testimonials_address', 'Testimonials Address','trim|max_length[2500]');
	$this->form_validation->set_rules('image','Image',"required|file_allowed_type[image]");
	 $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'testimonials_description'));		
		if($this->form_validation->run()==TRUE)
		{
			$uploaded_file = "";		
			    if( !empty($_FILES) && $_FILES['image']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data =  $this->upload->my_upload('image','testimonials');
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		
				}	
			
			$posted_data=array(				
			'testimonials_title'      		=> $this->input->post('testimonials_title',TRUE),
			'testimonials_address'      		=> $this->input->post('testimonials_address',TRUE),
			'testimonials_description' 		=> $this->input->post('testimonials_description'),
			'testimonials_image'		    =>	$uploaded_file,
			'status'						=>'1',						
			'recv_date'            			=>$this->config->item('config.date.time')
			);			
			$this->testimonials_model->safe_insert('tbl_testimonials',$posted_data,FALSE); 			
			
			$message = $this->config->item('testimonials_post_success');			
			$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
									
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$message);
			redirect('adminzone/testimonials', ''); 
		}		
		$data['heading_title'] = "Post Testimonials";	
		$this->load->view('testimonials/testimonials_add_view',$data);	
	}
	
	
	public function edit()
	{	
		  $id = (int) $this->uri->segment(4);		
		  $param= array('where'=>"testimonials_id ='$id' ");	
		  $res  = $this->testimonials_model->get_testimonials(1,0,$param);	
		   if( is_array($res) && !empty($res) )
			{	
			  $this->form_validation->set_rules('testimonials_title','Title','trim|required|xss_clean|max_length[150]');
			 $this->form_validation->set_rules('testimonials_address','Testimonials Address','trim|required|xss_clean|max_length[150]');
			  $this->form_validation->set_rules('testimonials_description','Description','trim|required|xss_clean|max_length[85000]');
				
			  $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'testimonials_description'));		
				
			  if($this->form_validation->run()==TRUE)
				{
				  $uploaded_file = $res['testimonials_image'];				 
				  $unlink_image = array('source_dir'=>"testimonials",'source_file'=>$res['testimonials_image']);


													
				  if( !empty($_FILES) && $_FILES['image']['name']!='' )
					{			  
					  $this->load->library('upload');					
					  $uploaded_data =  $this->upload->my_upload('image','testimonials');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	

				   
					$posted_data=array(				
					'testimonials_title'       			=> $this->input->post('testimonials_title',TRUE),
					'testimonials_address'       		=> $this->input->post('testimonials_address',TRUE),
					'testimonials_description'			=> $this->input->post('testimonials_description'),
					'testimonials_image'		        => $uploaded_file,
					
					);					
					 $where = "testimonials_id = '".$res['testimonials_id']."'"; 				
					 $this->testimonials_model->safe_update('tbl_testimonials',$posted_data,$where,FALSE);
					 $this->session->set_userdata(array('msg_type'=>'success'));				
					 $this->session->set_flashdata('success',lang('successupdate'));	
					
					redirect('adminzone/testimonials', ''); 
				
				}		
				$data['heading_title'] = "Edit Testimonials";	
				$data['res'] = $res;	
				$this->load->view('testimonials/testimonials_edit_view',$data);	
			}else
			{
				redirect('adminzone/testimonials', ''); 
				
			}
		
	}
	
	
}
// End of controller