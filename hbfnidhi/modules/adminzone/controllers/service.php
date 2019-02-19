<?php
class Service extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('service/service_model'));
		$this->config->set_item('menu_highlight','other management');
	}
	 
	 
	public  function index()
	{
		$pagesize				=  (int) $this->input->get_post('pagesize');
	    $config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$res_array              =  $this->service_model->get_service($config['limit'],$offset);
	    $config['total_rows']   =  get_found_rows();
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);

		$data['heading_title']  =   'Service';
		$data['res']            =  $res_array; 
		
		if($this->input->post('status_action')!='')
		{
			$this->update_status('tbl_service','service_id');
		}		
	
		$this->load->view('service/service_list_index_view',$data);		
	}	
	
		
	
	
	public function post()
	{			
	$this->form_validation->set_rules('service_title','Title','trim|required|xss_clean|max_length[100]');
	$this->form_validation->set_rules('service_description','Description','trim|required|xss_clean|max_length[8500]');
	//$this->form_validation->set_rules('product_url', 'Product URL','trim|max_length[2500]');
	$this->form_validation->set_rules('image1','Home Image',"required|file_allowed_type[image]");
	$this->form_validation->set_rules('image2','Banner Image',"required|file_allowed_type[image]");
	 $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'service_description'));		
		if($this->form_validation->run()==TRUE)
		{
			$uploaded_file = "";		
			    if( !empty($_FILES) && $_FILES['image1']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data =  $this->upload->my_upload('image1','service');
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		
				}		
			$uploaded_file1 = "";
				if( !empty($_FILES) && $_FILES['image2']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data =  $this->upload->my_upload('image2','service');
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file1 = $uploaded_data['upload_data']['file_name'];
					}		
				}		
			
			$posted_data=array(				
			'service_title'      		=> 	$this->input->post('service_title',TRUE),
			'service_description' 		=> 	$this->input->post('service_description'),
			'service_image1'	        =>	$uploaded_file,
			'service_image2'		    =>	$uploaded_file1,
			'status'					=>	'1',						
			'recv_date'            		=>	$this->config->item('config.date.time')
			);			
			$this->service_model->safe_insert('tbl_service',$posted_data,FALSE);
			
			$message = $this->config->item('product_post_success');			
			$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
									
			$this->session->set_userdata(array('msg_type'=>'Your Service is Succesfully Added.'));
			$this->session->set_flashdata('success','success');
			redirect('adminzone/service', ''); 
		}		
		$data['heading_title'] = "Post Service";	
		$this->load->view('service/service_add_view',$data);	
	}
	
	
	public function edit()
	{	
		  $id = (int) $this->uri->segment(4);
		  $param= array('where'=>"service_id ='$id' ");
		  $res  = $this->service_model->get_service(1,0,$param);	
		   if( is_array($res) && !empty($res) )
			{	
			  $this->form_validation->set_rules('service_title','Title','trim|required|xss_clean|max_length[100]');
			 // $this->form_validation->set_rules('product_url','Product URL','trim|required|xss_clean|max_length[150]');
			  $this->form_validation->set_rules('service_description','Description','trim|required|xss_clean|max_length[85000]');
				
			  $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'service_description'));		
				
			  if($this->form_validation->run()==TRUE)
				{
				  $uploaded_file = $res['service_image1'];				 
				  $unlink_image = array('source_dir'=>"service",'source_file'=>$res['service_image1']);


													
				  if( !empty($_FILES) && $_FILES['image1']['name']!='' )
					{			  
					  $this->load->library('upload');					
					  $uploaded_data =  $this->upload->my_upload('image1','service');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	

				  $uploaded_file1 = $res['service_image2'];
				  $unlink_image = array('source_dir'=>"service",'source_file'=>$res['service_image2']);
													
				  if( !empty($_FILES) && $_FILES['image2']['name']!='' )
					{			  
					  $this->load->library('upload');					
					  $uploaded_data =  $this->upload->my_upload('image2','service');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file1 = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	
				
					$posted_data=array(				
					'service_title'       			=> $this->input->post('service_title',TRUE),
					'service_description'			=> $this->input->post('service_description'),
					'service_image1'			    => $uploaded_file,
					'service_image2'				=> $uploaded_file1,
					);					
					 $where = "service_id = '".$res['service_id']."'"; 				
					 $this->service_model->safe_update('tbl_service',$posted_data,$where,FALSE);
					 $this->session->set_userdata(array('msg_type'=>'success'));				
					 $this->session->set_flashdata('success',lang('successupdate'));	
					
					redirect('adminzone/service', ''); 
				
				}		
				$data['heading_title'] = "Edit Service";	
				$data['res'] = $res;	
				$this->load->view('service/service_edit_view',$data);	
			}else
			{
				redirect('adminzone/service', ''); 
				
			}
		
	}
	
	
}
// End of controller