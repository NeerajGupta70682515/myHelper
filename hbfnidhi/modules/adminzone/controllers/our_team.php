<?php
class Our_team extends Admin_Controller {

	public function __construct()
	{		
		parent::__construct(); 			  
		$this->load->model(array('our_team/our_team_model'));
		$this->config->set_item('menu_highlight','other management');
	}

	public  function index()
	{

		$pagesize               =  (int) $this->input->get_post('pagesize');
	    $config['limit']		=  ( $pagesize > 0 ) ? $pagesize : $this->config->item('pagesize');
		$offset                 =  ($this->input->get_post('per_page') > 0 ) ? $this->input->get_post('per_page') : 0;
		$base_url               =  current_url_query_string(array('filter'=>'result'),array('per_page'));
		$res_array              =  $this->our_team_model->get_all_our_team($offset,$config['limit']);


		if($this->input->post('status_action')!=''){

            $this->update_status('tbl_our_team','our_team_id');
        }

		if( $this->input->post('update_order')!='')
		{			
			$this->update_displayOrder('tbl_our_team','sort_order','our_team_id');			
		}

		//$data['page_links']     =  admin_pagination("$base_url",$total_record,"",$offset);
		$data['heading_title']  = 'Our Team';
		$data['teamlist']       = $res_array;

		$this->load->view('our_team/our_team_list_index_view',$data);
	}



	public function pagedatadisplay()

	{

		$id = (int) $this->uri->segment(4);

		$res = $this->our_team_model->getStaticpage_by_id($id); 

		

		$data['heading_title'] = 'Static Pages';

		$data['page_title']    = 'View Page Information';

		$data['pageresult']    =$res;		

		$this->load->view('staticpage/statispage_detail_view',$data);

	}

	//**********************Add Pages
	public function add()
	{
	        $config['upload_path']          = './uploaded_files/team';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
			$data['ckeditor']  				=  set_ck_config(array('textarea_id'=>'team_desc'));		
			$data['heading_title'] 			= 'Add Our Team';	
			
  			$this->form_validation->set_rules('team_name', 'Team Name','trim|required|max_length[52]');
		    $this->form_validation->set_rules('team_designation', 'Designation','trim|required|max_length[100]');
			$this->form_validation->set_rules('team_description', 'Description','required|max_length[118500]');				
			$this->form_validation->set_rules('team_image','Image',"file_allowed_type[image]");

   	        if ($this->form_validation->run() == TRUE)
            	{
 	          	  $uploaded_file = "";
                    if( !empty($_FILES) && $_FILES['team_image']['name']!='' )
                      {			  
                         $this->load->library('upload');	
                         $uploaded_data =  $this->upload->my_upload('team_image','team');

					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						echo $uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		
				}
				
				$posted_data = array(
						'our_team_name'			=>	$this->input->post('team_name',TRUE),
						'our_team_designation'	=>	$this->input->post('team_designation',TRUE),
						'our_team_description'	=>	$this->input->post('team_description',TRUE),
						'image'					=>	$uploaded_file,
						'status'				=>	'1',
						'date'					=>	$this->config->item('config.date.time')
				 );
										

				$this->our_team_model->safe_insert('tbl_our_team',$posted_data,FALSE);					 

				$this->session->set_userdata(array('msg_type'=>'success'));

				$this->session->set_flashdata('success',lang('success'));			

				redirect('adminzone/our_team', '');
			}		 

		$data['heading_title']  = 'Add Our Team';
		$data['page_title']     = 'Add Team Information';
		$this->load->view('our_team/our_team_add_view',$data);
	}
	
	
	
public function edit()
	{
    	    $config['upload_path']          = './uploaded_files/team_image';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 100;
            $config['max_width']            = 1024;
            $config['max_height']           = 768;
            $this->load->library('upload', $config);
         	$data['ckeditor']  =  set_ck_config(array('textarea_id'=>'team_desc'));					
            $team_id = (int) $this->uri->segment(4);
            $res = $this->our_team_model->get_our_team(array('our_team_id'=>$team_id));

		if( is_array( $res ) )
		{ 	
			$this->form_validation->set_rules('team_name', 'Name','trim|required|max_length[52]');
		    $this->form_validation->set_rules('team_designation', 'Designation','trim|required|max_length[100]'); 
			$this->form_validation->set_rules('team_description', 'Description','required|max_length[118500]');				
			$this->form_validation->set_rules('team_image','Image',"file_allowed_type[image]");  				              
			
			if ($this->form_validation->run() == TRUE)
                  {
                   $uploaded_file = "";
			  if( !empty($_FILES) && $_FILES['team_image']['name']!='' )
				{			  
					$this->load->library('upload');	
					$uploaded_data =  $this->upload->my_upload('team_image','team');
					if( is_array($uploaded_data)  && !empty($uploaded_data) )
					{ 								
						$uploaded_file = $uploaded_data['upload_data']['file_name'];
					}		

				}
				
				if($uploaded_file!='')
                 {
                	$posted_data = array(
				    	'our_team_name'			=>	$this->input->post('team_name',TRUE),
						'our_team_designation'	=>	$this->input->post('team_designation',TRUE),
						'our_team_description'	=>	$this->input->post('team_description',TRUE),
						'image'					=>	$uploaded_file,
						'date'					=>	$this->config->item('config.date.time')
				   );
				   
				   }else{
                    
					  $posted_data = array(
                     	'our_team_name'			=>	$this->input->post('team_name',TRUE),
						'our_team_designation'	=>	$this->input->post('team_designation',TRUE),
						'our_team_description'	=>	$this->input->post('team_description',TRUE),
						'date'					=>	$this->config->item('config.date.time')
                  );

				}
						$where = "our_team_id = '".$res['our_team_id']."'";
						$this->our_team_model->safe_update('tbl_our_team',$posted_data,$where,FALSE);	
						$this->session->set_userdata(array('msg_type'=>'success'));
						$this->session->set_flashdata('success',lang('successupdate'));				
						redirect('adminzone/our_team/'.query_string(), ''); 					
				}		 
		$data['heading_title']  = 'Edit Our Team';
		$data['page_title']     = 'Edit Team Information';
		$data['pageresult']     = $res;
		$this->load->view('our_team/our_team_edit_view',$data);
		}
		else
		{
			redirect('adminzone/our_team','');
		}
     }
}
// End of controller