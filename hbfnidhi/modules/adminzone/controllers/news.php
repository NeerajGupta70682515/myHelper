<?php
class News extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('news_model'));  		
		$this->config->set_item('menu_highlight','other management');				
	}
	 
	 
	public  function index()
	{
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 
	 	$res_array               =  $this->news_model->get_news($config['limit'],$offset);
	    $config['total_rows']    =  get_found_rows();
		$data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
				
		$data['heading_title']   =   'News';
		$data['res']             =  $res_array; 
		if($this->input->post('status_action')!='')
		{
			$this->update_status('tbl_news','news_id');
		}		
		$this->load->view('news/news_list_index_view',$data);		
	}	
	
	
	public function post()
	{			
	$this->form_validation->set_rules('news_title','Title','trim|required|xss_clean|max_length[150]');
	$this->form_validation->set_rules('news_description','Description','trim|required|xss_clean|max_length[8500]');
	 $this->form_validation->set_rules('news_url', 'News URL','trim|max_length[2500]');
	
	 $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'news_description'));		
		if($this->form_validation->run()==TRUE)
		{
			$uploaded_file = "";	
			    if( !empty($_FILES) && $_FILES['image']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data =  $this->upload->my_upload('image','news');
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		
				}		
			
			$posted_data=array(				
			'news_title'      			=> $this->input->post('news_title',TRUE),
			'news_url'      			=> $this->input->post('news_url',TRUE),
			'news_description' 			=> $this->input->post('news_description'),
			'news_image'		        =>	$uploaded_file,
			'status'					=>'1',						
			'recv_date'            		=>$this->config->item('config.date.time')
			);			
			$this->news_model->safe_insert('tbl_news',$posted_data,FALSE); 			
			
			$message = $this->config->item('news_post_success');			
			$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
									
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$message);
			redirect('adminzone/news', ''); 
		}		
		$data['heading_title'] = "Post News";	
		$this->load->view('news/news_add_view',$data);	
	}
	
	
	public function edit()
	{	
		  $id = (int) $this->uri->segment(4);
		
		  $param= array('where'=>"news_id ='$id' ");	
		  $res  = $this->news_model->get_news(1,0,$param);	
		   if( is_array($res) && !empty($res) )
			{	

			  $this->form_validation->set_rules('news_title','Title','trim|required|xss_clean|max_length[150]');
			  $this->form_validation->set_rules('news_description','Description','trim|required|xss_clean|max_length[8500]');
				
			  $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'news_description'));
				
			  if($this->form_validation->run()==TRUE)
			  {
	 			  $uploaded_file = $res['news_image'];
				  $unlink_image = array('source_dir'=>"news",'source_file'=>$res['news_image']);

				  if( !empty($_FILES) && $_FILES['image']['name']!='' )
				  {
					  $this->load->library('upload');
					  $uploaded_data =  $this->upload->my_upload('image','news');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	
				
					$posted_data=array(				
					'news_title'       			=> $this->input->post('news_title',TRUE),
					'news_description'			=> $this->input->post('news_description'),
					'news_image'		        => $uploaded_file
					);					
					 $where = "news_id = '".$res['news_id']."'"; 				
					 $this->news_model->safe_update('tbl_news',$posted_data,$where,FALSE);
					 $this->session->set_userdata(array('msg_type'=>'success'));				
					 $this->session->set_flashdata('success',lang('successupdate'));	
					
					redirect('adminzone/news', ''); 
				
				}		
				$data['heading_title'] = "Edit News";	
				$data['res'] = $res;	
				$this->load->view('news/news_edit_view',$data);	
			}else
			{
				redirect('adminzone/news', ''); 
				
			}
		
	}
	
	
}
// End of controller