<?php
class Slide_banner extends Admin_Controller
{

	public function __construct()
	{
		     parent::__construct(); 				
			$this->load->model(array('slide_banner_model'));  			
			$this->config->set_item('menu_highlight','other management');	
	}

	public  function index($page = NULL)
	{		
		$pagesize               =  (int) $this->input->get_post('pagesize');		
		$config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');			
		$offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
				
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));				
		$res_array              =  $this->slide_banner_model->get_banner($offset,$config['limit']);			
		$config['base_url']     =  base_url().'adminzone/banners/pages/'; 		
		$config['total_rows']	=  $this->slide_banner_model->total_rec_found;	
		$data['page_links']     =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);				
		$data['heading_title'] = 'Slide Banners Lists';
		$data['res'] = $res_array; 		
		
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('tbl_slide_banners','banner_id');			
		}
			
		$this->load->view('slide_banner/view_slide_banner_list',$data);	
			
	} 

	

	public function add()
	{		  
		$data['heading_title'] = 'Add Banner';	
		
		 $this->form_validation->set_rules('banner_title','Banner Title',"trim|required|max_length[100]");	
		 $this->form_validation->set_rules('image1','Image',"required|file_allowed_type[image]");
		 		
		if($this->form_validation->run()==TRUE)
		{
			 $uploaded_file = "";	
				
			    if( !empty($_FILES) && $_FILES['image1']['name']!='' )
				{			  
					$this->load->library('upload');	
						
					$uploaded_data =  $this->upload->my_upload('image1','banner');
				
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					
					}		
					
				}
				$posted_data = array(
				'banner_title'=>$this->input->post('banner_title'),
				'banner_added_date'=>$this->config->item('config.date.time'),
				'banner_image'=>$uploaded_file				
				);
								
		    $this->slide_banner_model->safe_insert('tbl_slide_banners',$posted_data,FALSE);									
			$this->session->set_userdata(array('msg_type'=>'success'));			
			$this->session->set_flashdata('success',lang('success'));			
			redirect('adminzone/slide_banner', '');
			
						
		}
		
		$this->load->view('slide_banner/view_slide_banner_add',$data);		  
			   
	}

	public function edit()
	{
		$Id = (int) $this->uri->segment(4);		   
		$data['heading_title'] = 'Update Slide Banner';			
		$rowdata=$this->slide_banner_model->get_banner_by_id($Id);
				 
		if( is_object($rowdata) )
		{
				
			$this->form_validation->set_rules('banner_title','Banner Title',"trim|required|max_length[100]");		 
			$this->form_validation->set_rules('image1','Image',"file_allowed_type[image]");
			
		 
				if($this->form_validation->run()==TRUE)
				{
					 					 
					$uploaded_file = $rowdata->banner_image;				 
					$unlink_image = array('source_dir'=>"banner",'source_file'=>$rowdata->banner_image);
													
					if( !empty($_FILES) && $_FILES['image1']['name']!='' )
					{			  
						  $this->load->library('upload');					
						  $uploaded_data =  $this->upload->my_upload('image1','banner');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	
					
					$posted_data = array(
					'banner_title'=>$this->input->post('banner_title'),
					//'sub_title'=>$this->input->post('banner_description'),
					'banner_image'=>$uploaded_file				
					);
					
					$where = "banner_id = '".$rowdata->banner_id."'"; 				
					$this->slide_banner_model->safe_update('tbl_slide_banners',$posted_data,$where,FALSE);						
					$this->session->set_userdata(array('msg_type'=>'success'));				
				    $this->session->set_flashdata('success',lang('successupdate'));	
					redirect('adminzone/slide_banner/'.query_string(), ''); 
					 
				}
				$data['res']=$rowdata;
				$this->load->view('slide_banner/view_slide_banner_edit',$data);
				
			
		}else
		{
			redirect('adminzone/slide_banner', ''); 	 
		}
		
	}
	
}
// End of controller