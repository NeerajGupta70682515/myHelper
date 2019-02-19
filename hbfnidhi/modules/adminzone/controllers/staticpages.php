<?php
class Staticpages extends Admin_Controller {

	public function __construct()
	{		
		parent::__construct(); 			  
		$this->load->model(array('pages/pages_model'));  		
		$this->config->set_item('menu_highlight','other management');		
	}

	public  function index()
	{
		$pagesize               =  (int) $this->input->get_post('pagesize');

	    $config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');

		$offset                 = ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;

		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));

		$res_array              =  $this->pages_model->get_all_cms_page($offset,$config['limit']);

		$total_record        	=  $this->pages_model->total_rec_found;

		if($this->input->post('status_action')!=''){

            $this->update_status('tbl_cms_pages','page_id');

        }

		$data['page_links']     =  admin_pagination("$base_url",$total_record,"",$offset);		

		$data['heading_title']  = 'Manage Static Pages';

		$data['pagelist']       = $res_array; 					

		$this->load->view('staticpage/staticpage_list_index_view',$data); 	

	}



	public function pagedatadisplay()

	{

		$id = (int) $this->uri->segment(4);

		$res = $this->pages_model->getStaticpage_by_id($id); 

		

		$data['heading_title'] = 'Static Pages';

		$data['page_title']    = 'View Page Information';

		$data['pageresult']    =$res;		

		$this->load->view('staticpage/statispage_detail_view',$data);

	}

	//**********************Add Pages
	public function add()
	{
	        $config['upload_path']          = './uploaded_files/pages_image';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
			$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'page_desc'));		
			$data['heading_title'] = 'Add Pages';	
			
  			$this->form_validation->set_rules('page_name', 'Page Name','trim|max_length[2500]');
		    $this->form_validation->set_rules('friendly_url', 'Friendly url','trim|max_length[2500]');

			$this->form_validation->set_rules('page_description', 'Description','required|max_length[118500]');				

			$this->form_validation->set_rules('page_image','Pages Image',"file_allowed_type[image]");
   	         if ($this->form_validation->run() == TRUE)
            	{
 	          	  $uploaded_file = "";
                    if( !empty($_FILES) && $_FILES['page_image']['name']!='' )
                      {			  
                         $this->load->library('upload');	
                         $uploaded_data =  $this->upload->my_upload('page_image','pages_image');

					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						echo $uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		
				}
				
				$posted_data = array(
				'page_name'=>$this->input->post('page_name',TRUE),
				'friendly_url'=>$this->input->post('friendly_url',TRUE),

				'page_description'=>$this->input->post('page_description',TRUE),

				'image'=>$uploaded_file,

				'page_updated_date'=>$this->config->item('config.date.time')

				 );

										

				$this->pages_model->safe_insert('tbl_cms_pages',$posted_data,FALSE);					 

				$this->session->set_userdata(array('msg_type'=>'success'));

				$this->session->set_flashdata('success',lang('success'));			

				redirect('adminzone/staticpages', '');
			}		 

		$data['heading_title']  = 'Add Static Pages';
		$data['page_title']     = 'Add Information';
		$this->load->view('staticpage/staticpage_add_view',$data);
	}
	
	
	
public function edit()
	{
    	    $config['upload_path']          = './uploaded_files/pages_image';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
         	$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'page_desc'));					
            $page_id = (int) $this->uri->segment(4);
            $res = $this->pages_model->get_cms_page(array('page_id'=>$page_id));

		if( is_array( $res ) )
		{ 	
			$this->form_validation->set_rules('page_name', 'Page Name','trim|max_length[2500]');
		    $this->form_validation->set_rules('friendly_url', 'Friendly url','trim|max_length[2500]'); 
			$this->form_validation->set_rules('page_description', 'Description','required|max_length[118500]');				
			$this->form_validation->set_rules('page_image','Pages Image',"file_allowed_type[image]");  				              if ($this->form_validation->run() == TRUE)
                  {
                   $uploaded_file = "";
			  if( !empty($_FILES) && $_FILES['page_image']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data =  $this->upload->my_upload('page_image','pages_image');
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		

				}
				
				if($uploaded_file!='')
                  {
                	$posted_data = array(

				    'page_name'=>$this->input->post('page_name',TRUE),
				    'page_description'=>$this->input->post('page_description',TRUE),
				    'friendly_url'=>$this->input->post('friendly_url',TRUE),
  				    'page_updated_date'=>$this->config->item('config.date.time'),
  				    'image'=>$uploaded_file
				   );
				   
				   }else{
                    
						$posted_data = array(
                     	'page_name'=>$this->input->post('page_name',TRUE),
						'friendly_url'=>$this->input->post('friendly_url',TRUE),
						'page_description'=>$this->input->post('page_description',TRUE),
						'page_updated_date'=>$this->config->item('config.date.time')
                  );

				}
						$where = "page_id = '".$res['page_id']."'";
						$this->pages_model->safe_update('tbl_cms_pages',$posted_data,$where,FALSE);	
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success',lang('successupdate'));				
						redirect('adminzone/staticpages/'.query_string(), ''); 					
				}		 
		$data['heading_title']  = 'Edit Static Pages';
		$data['page_title']     = 'Edit Information';
		$data['pageresult']     = $res;		
		$this->load->view('staticpage/statispage_edit_view',$data);
		}
		else
		{
			redirect('adminzone/staticpages','');
		}
     }
}
// End of controller