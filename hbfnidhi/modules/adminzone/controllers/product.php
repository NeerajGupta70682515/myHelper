<?php
class Product extends Admin_Controller
{
	public function __construct()
	{		
		parent::__construct(); 				
		$this->load->model(array('product/product_model'));  		
		$this->config->set_item('menu_highlight','other management');				
	}
	 
	 
	public  function index()
	{
		 $pagesize               =  (int) $this->input->get_post('pagesize');
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		 
	 	$res_array               =  $this->product_model->get_product($config['limit'],$offset);
	    $config['total_rows']    =  get_found_rows();
		$data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
				
		$data['heading_title']   =   'Product';
		$data['res']             =  $res_array; 
		if($this->input->post('status_action')!='')
		{
			$this->update_status('tbl_product','product_id');
		}		
		$this->load->view('product/product_list_index_view',$data);		
	}	
	
	
	public function post()
	{			
	$this->form_validation->set_rules('product_title','Title','trim|required|xss_clean|max_length[150]');
	$this->form_validation->set_rules('product_description','Description','trim|required|xss_clean|max_length[8500]');
	//$this->form_validation->set_rules('product_url', 'Product URL','trim|max_length[2500]');
	$this->form_validation->set_rules('image','Image',"required|file_allowed_type[image]");
	$this->form_validation->set_rules('image1','Image',"required|file_allowed_type[image]");
	 $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'product_description'));		
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
			$uploaded_file1 = "";
				if( !empty($_FILES) && $_FILES['image1']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data =  $this->upload->my_upload('image1','product');
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file1 = $uploaded_data['upload_data']['file_name'];
					}		
				}		
			
			$posted_data=array(				
			'product_title'      		=> $this->input->post('product_title',TRUE),
			'product_url'      			=> $this->input->post('product_url',TRUE),
			'product_description' 		=> $this->input->post('product_description'),
			'product_image'		        =>	$uploaded_file,
			'product_image1'		    =>	$uploaded_file1,
			'status'					=>'1',						
			'recv_date'            		=>$this->config->item('config.date.time')
			);			
			$this->product_model->safe_insert('tbl_product',$posted_data,FALSE); 			
			
			$message = $this->config->item('product_post_success');			
			$message = str_replace('<site_name>',$this->config->item('site_name'),$message);
									
			$this->session->set_userdata(array('msg_type'=>'success'));
			$this->session->set_flashdata('success',$message);
			redirect('adminzone/product', ''); 
		}		
		$data['heading_title'] = "Post Product";	
		$this->load->view('product/product_add_view',$data);	
	}
	
	
	public function edit()
	{	
		  $id = (int) $this->uri->segment(4);
		  $param= array('where'=>"product_id ='$id' ");
		  $res  = $this->product_model->get_product(1,0,$param);	
		   if( is_array($res) && !empty($res) )
			{	
			  $this->form_validation->set_rules('product_title','Title','trim|required|xss_clean|max_length[150]');
			 // $this->form_validation->set_rules('product_url','Product URL','trim|required|xss_clean|max_length[150]');
			  $this->form_validation->set_rules('product_description','Description','trim|required|xss_clean|max_length[85000]');
				
			  $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'product_description'));		
				
			  if($this->form_validation->run()==TRUE)
				{
				  $uploaded_file = $res['product_image'];				 
				  $unlink_image = array('source_dir'=>"product",'source_file'=>$res['product_image']);


													
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

				    $uploaded_file1 = $res['product_image1'];				 
				  $unlink_image = array('source_dir'=>"product",'source_file'=>$res['product_image1']);
													
				  if( !empty($_FILES) && $_FILES['image1']['name']!='' )
					{			  
					  $this->load->library('upload');					
					  $uploaded_data =  $this->upload->my_upload('image1','product');
						
						if( is_array($uploaded_data)  && !empty($uploaded_data) )
						{ 								
						   $uploaded_file1 = $uploaded_data['upload_data']['file_name'];
						   removeImage($unlink_image);	
						}
					
				    }	
				
					$posted_data=array(				
					'product_title'       			=> $this->input->post('product_title',TRUE),
					'product_url'       			=> $this->input->post('product_url',TRUE),
					'product_description'			=> $this->input->post('product_description'),
					'product_image'		        	=> $uploaded_file,
					'product_image1'		        => $uploaded_file1,
					);					
					 $where = "product_id = '".$res['product_id']."'"; 				
					 $this->product_model->safe_update('tbl_product',$posted_data,$where,FALSE);
					 $this->session->set_userdata(array('msg_type'=>'success'));				
					 $this->session->set_flashdata('success',lang('successupdate'));	
					
					redirect('adminzone/product', ''); 
				
				}		
				$data['heading_title'] = "Edit Product";	
				$data['res'] = $res;	
				$this->load->view('product/product_edit_view',$data);	
			}else
			{
				redirect('adminzone/product', ''); 
				
			}
		
	}
	
	
}
// End of controller