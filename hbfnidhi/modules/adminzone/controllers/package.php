<?php
class Package extends Admin_Controller
{

	public function __construct()
	{	
			parent::__construct(); 				
			$this->load->model(array('package_model'));  			
			$this->config->set_item('menu_highlight','other management');	
	}
	
	
	 public  function index()
	 {
		
		 $pagesize               =  (int) $this->input->get_post('pagesize');
		 		
	     $config['limit']		 =  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		 		 				
		 $offset                 =  ( $this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;	
		
		 $base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
			
		 $res_array              =    $this->package_model->get_package($config['limit'],$offset);	
		 					
	     $total_record           =   get_found_rows();
		 
		 $config['total_rows']   =   $total_record;
		
		
		
		 $data['page_links']      =  admin_pagination($base_url,$config['total_rows'],$config['limit'],$offset);
								
		 $data['res']            =  $res_array; 
				
		if( $this->input->post('status_action')!='')
		{			
			$this->update_status('tbl_package','package_id');			
		}
				
		
				
		$data['heading_title'] = 'Manage Package';
		//$data['pagelist']      = $res_array; 			
		$this->load->view('package/view_package_list',$data);        
			
		
	    }
	   
	   
		public function display(){
		
			$res = $this->package_model->getHelpcenter_by_id($this->uri->segment(4));			
			$data['heading_title'] = 'View FAQ Information';
			$data['page_title']    = 'View FAQ Information';
			$data['pageresult']=$res;
			
			$this->load->view('common/view_helpcenter_detail',$data);
			
		}
		
		public function add()
		{			
			$data['ckeditor']      =  set_ck_config(array('textarea_id'=>'faq_answer'));				
			$data['heading_title'] = 'Add Package';			
	        $this->form_validation->set_rules('pkg_name','Package Name',"trim|required|max_length[255]|xss_clean");
			$this->form_validation->set_rules('description','Description','trim|required|required_stripped|xss_clean');
			$this->form_validation->set_rules('pkg_amount','Package Amount',"trim|required|xss_clean");
			
			if($this->form_validation->run()==TRUE)
			{
			
			      $posted_data = array(
										'package_service'		=>$this->input->post('service_title',TRUE),
										'package_name'			=>$this->input->post('pkg_name',TRUE),
										'package_price'			=>$this->input->post('pkg_amount',TRUE),
					  					'package_description'	=>$this->input->post('description',TRUE),
										'package_added_date'	=>$this->config->item('config.date.time')
									  );
				 				
			    $this->package_model->safe_insert('tbl_package',$posted_data,FALSE);					 
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('success'));			
				redirect('adminzone/package', '');
				
			
			}
			
			$this->load->view('package/view_package_add',$data);				
	   
	   }
	   
	   
	   public function edit()
	   {
	     
		    $data['ckeditor']  =  set_ck_config(array('textarea_id'=>'faq_answer'));	
					   
		    $data['heading_title'] = 'Edit FAQ';
			
			$Id = (int) $this->uri->segment(4);
			
			$res = $this->package_model->get_package(1,0,array('id'=>$Id));
			
		   if(  is_array($res) && !empty($res) )
		   { 
		     	$this->form_validation->set_rules('pkg_name','Package Name',"trim|required|max_length[255]|xss_clean");
				$this->form_validation->set_rules('description','Description','trim|required|required_stripped|xss_clean');
				$this->form_validation->set_rules('pkg_amount','Package Amount',"trim|required|xss_clean");
			
			if($this->form_validation->run()==TRUE)
			{
				$posted_data = array(
										'package_service'		=>$this->input->post('service_title',TRUE),
										'package_name'			=>$this->input->post('pkg_name',TRUE),
										'package_price'			=>$this->input->post('pkg_amount',TRUE),
					  					'package_description'	=>$this->input->post('description',TRUE),
				);
				
				$where = "package_id = '".$res['package_id']."'"; 						
				$this->package_model->safe_update('tbl_package',$posted_data,$where,FALSE);	
				$this->session->set_userdata(array('msg_type'=>'success'));
				$this->session->set_flashdata('success',lang('successupdate'));	
						
				 redirect('adminzone/package/'.query_string(), ''); 	
			}
				
			    $data['res']=$res;
			    $this->load->view('package/view_package_edit',$data);
				
		   }else
		   {
			   
			  redirect('adminzone/package', ''); 	 
			   
		   }
		   
	 }
	   
	   
	   
	   

}
//controllet end