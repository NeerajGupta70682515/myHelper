<?php
class Blog extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('blog_model'));  		
		$this->config->set_item('menu_highlight','other management');				
	}
	 
	public  function index()
	{
	
		$pagesize 				=  (int) $this->input->get_post('pagesize');
		 		
	    $config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 		 				
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
									 						 	
	 	$res_array              =  $this->blog_model->get_blog($config['limit'],$offset);
						
	    $config['total_rows']   =  get_found_rows();
		
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
				
		$data['heading_title']  =   'Blog';
						
		$data['res']            =  $res_array; 
			
		
		if($this->input->post('status_action')!='')
		{
			
			$this->update_status('tbl_blog','blog_id');
			
		}		
						
		$this->load->view('blog/blog_list_index_view',$data);		
		
		
	}	
	
	
	public function post()
	{			
					
		$this->form_validation->set_rules('blog_title','Title','trim|required|xss_clean|max_length[150]');
		$this->form_validation->set_rules('blog_description','Description','trim|required|xss_clean|max_length[8500]');
	
		 $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'blog_description'));		
		 		
		if($this->form_validation->run()==TRUE)
		{
			$uploaded_file = "";	
				
			    if( !empty($_FILES) && $_FILES['image']['name']!='' )
				{			  
					$this->load->library('upload');	
						
					$uploaded_data =  $this->upload->my_upload('image','blog');
				
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					
					}		
					
				}		
			
			$posted_data=array(				
			'blog_title'      			=> $this->input->post('blog_title',TRUE),
			'blog_description' 			=> $this->input->post('blog_description'),
			'blog_image'		        =>	$uploaded_file,
			'status'					=>'1',						
			'recv_date'            		=>$this->config->item('config.date.time')
			);			
			$this->blog_model->safe_insert('tbl_blog',$posted_data,FALSE); 			
			
			$message = $this->config->item('blog_post_success');			
			$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
									
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$message);
			redirect('adminzone/blog', ''); 
			
		}		
		$data['heading_title'] = "Post blog";	
		$this->load->view('blog/blog_add_view',$data);	
		
		
	}
	
	
	public function edit()
	{	
	
	          $id = (int) $this->uri->segment(4);		
		      $param     = array('where'=>"blog_id ='$id' ");	
	    	  $res       = $this->blog_model->get_blog(1,0,$param);	
		
			if( is_array($res) && !empty($res) )
			{	
					
				$this->form_validation->set_rules('blog_title','Title','trim|required|xss_clean|max_length[150]');
				$this->form_validation->set_rules('blog_description','Description','trim|required|xss_clean|max_length[8500]');
				
				$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'blog_description'));		
				
				if($this->form_validation->run()==TRUE)
				{					
					
					$uploaded_file = $res['blog_image'];
					$unlink_image = array('source_dir'=>"blog",'source_file'=>$res['blog_image']);

					if( !empty($_FILES) && $_FILES['image']['name']!='' )
					{			  
						  $this->load->library('upload');
						  $uploaded_data =  $this->upload->my_upload('image','blog');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	
				
					$posted_data=array(				
					'blog_title'       			=> $this->input->post('blog_title',TRUE),
					'blog_description'			=> $this->input->post('blog_description'),
					'blog_image'		        =>	$uploaded_file
					);					
					 $where = "blog_id = '".$res['blog_id']."'"; 				
					 $this->blog_model->safe_update('tbl_blog',$posted_data,$where,FALSE);
					 $this->session->set_userdata(array('msg_type'=>'success'));				
					 $this->session->set_flashdata('success',lang('successupdate'));	
					
					redirect('adminzone/blog', ''); 
				
				}		
				$data['heading_title'] = "Edit blog";	
				$data['res'] = $res;	
				$this->load->view('blog/blog_edit_view',$data);	
			}else
			{
				redirect('adminzone/blog', ''); 
				
			}
		
	}
	
	
}
// End of controller