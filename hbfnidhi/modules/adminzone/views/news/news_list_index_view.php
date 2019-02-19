<?php $this->load->view('includes/header'); ?>  

	
	<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
                        <i class="ace-icon fa fa-home home-icon"></i>
						    <?php echo '<li>' .anchor('adminzone/dashbord','Home').'</li>'; 
	$segment=4;	
	$catid    = (int) $this->uri->segment(4,0);		
	
	if($catid )
	{
		 echo admin_category_breadcrumbs($catid,$segment);
		 
	}else
	{
		echo '<li class="active"> News </li>';
	}   
    ?>

						</ul>

					</div>

					<div class="page-content">
					

					
			
					
						<div class="page-header">
							<h1>


								<?php echo $heading_title; ?>

							</h1>
						</div>

						<div class="row">
							<div class="col-xs-12">
								
						<?php error_message();?>
<?php echo form_open("adminzone/news/index/",'id="search_form" method="get" '); ?>
						          
		<table width="100%"  border="0" cellspacing="3" cellpadding="3" >
		  
          <tr>
          	<td><div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div></td>
			<td align="center" >Search [ Quest Name ] 
            
				<input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />&nbsp;
                
				<!--<select name="status">
                
					<option value="">Status</option>
					<option value="1" <?php echo $this->input->get_post('status')==='1' ? 'selected="selected"' : '';?>>Active</option>
					<option value="0" <?php echo $this->input->get_post('status')==='0' ? 'selected="selected"' : '';?>>In-active</option>
                    
				</select>-->
                
				<a  onclick="$('#search_form').submit();" class="btn btn-default"><span> GO </span></a>                
			
				<?php 
				if( $this->input->get_post('keyword')!='' || $this->input->get_post('status')!='' )
				{   
				   $parentid = (int) $this->input->get_post('parent_id');
				   if($parentid > 0 )
				   {					   
					  echo anchor("adminzone/news/",'<span>Clear Search</span>'); 
					   
				   }else
				   {
					    echo anchor("adminzone/news/",'<span>Clear Search</span>');
					 
				   }				  
				} 
				?>
               
			</td>
			<td align="right"><?php 
			
				
				echo anchor("adminzone/news/post/","<span>Add News</span>",'class="btn btn-primary" style="margin-bottom:10px;"' );?></td>
		</tr>        
		</table>
		<?php echo form_close();?>
						
		
	<?php echo form_open("adminzone/news/",'id="data_form"');?>
							 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr role="row">
                    
                          <th><input type="checkbox"  name="checkall" id="checkall"  onClick="check_uncheck_checkbox(this.checked);"/></th>
                     
                          <th>Heading</th>
                          <th>View Detail</th>
						  <th>Image</th> 
                        <th>Status</th>
                        <th>Action</th>
                     
                      </tr>
                      
                      
                      
                    </thead>
                    <tbody>
                    			<?php 
						
						//print_r(pagelist);
						if(is_array($res) && ! empty($res))
		{
			foreach($res as $catKey=>$pageVal)
			{ 
				
				
				
			?> 
                      <tr class="odd" role="row">
                        <td>
							<input type="checkbox" name="arr_ids[]" value="<?php echo  $pageVal['news_id'];?>" />
                      
						  </td>
						   <td><?php echo $pageVal['news_title'];?></td>
						   <td><?php echo $pageVal['news_description'];?></td>
                     
                       
						  
						
                      <td>
                      <img src="<?php echo base_url(); ?>uploaded_files/news/<?php echo $pageVal['news_image'];?>" alt="" title="" height="100" width="100" />
                      </td>
                     
                      
                        <td><?php echo ($pageVal['status']==1)? "Active":"In-active";?></td>
                        <td><?php echo anchor("adminzone/news/edit/$pageVal[news_id]/".query_string(),'Edit'); ?>
                            </td>
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                            
                          
						 
  
                      </tr>
                      <?php }?>
                      
                      <tr><td colspan="6" align="right" height="30"><?php echo $page_links; ?></td></tr>   
                      <?php 
								}else{
			?>
			  <tr><td colspan="6" align="right" height="30"><strong><center><strong> No record(s) found !</strong></center></strong></td></tr>   
			<?php 
		}
								 ?>
                   
                    </tbody>
                  </table>
                            
                            <?php 	
						if(is_array($res) && ! empty($res))
		{?>
                             <table class="list" width="100%">
            <tr>
                <td align="left"  style="padding:2px" height="35">
                    <?php
                    if($this->activatePrvg===TRUE)
                    {
                    ?>
                      <input name="status_action" type="submit" value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
                    <?php
                    }
                    if($this->deactivatePrvg===TRUE)
                    {
                    ?>
                    <input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate" onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
                    <?php
                    }
                    if($this->deletePrvg===TRUE)
                    {
                    ?>
                    <input name="status_action" type="submit" class="button2" id="Delete" value="Delete" onclick="return validcheckstatus('arr_ids[]','delete','Record');"/>
                    <?php
                    }
                    
                     if($this->orderstatusPrvg===TRUE)
                    {
                    ?>
                    <input name="update_order" type="submit" class="button2" id="Update" value="Update" />
                    <?php
                    }
                    ?>
                </td>
            </tr>
        </table>
        
        <?php }?>
         <?php echo form_close();?>
        
								
							</div>
						</div>
					</div>
				</div>
			</div>  
 
  
 


<?php $this->load->view('includes/footer'); ?>
           <script type="text/javascript">
          
function check_uncheck_checkbox(isChecked) {
	if(isChecked) {
		$('input[name="arr_ids[]"]').each(function() { 
			this.checked = isChecked; 
		});
	}else{
		$('input[name="arr_ids[]"]').each(function() { 
			this.checked = isChecked; 
		});
	}
}
	</script> 	 