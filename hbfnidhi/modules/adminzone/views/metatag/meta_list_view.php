<?php $this->load->view('includes/header'); ?>  
	
	<div class="main-content">
				<div class="main-content-inner">
					<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
                        <i class="ace-icon fa fa-home home-icon"></i>
						    <?php echo '<li>' .anchor('adminzone/dashbord','Home').'</li>';?> 
	<?php
	$segment=4;
	$catid    = (int) $this->uri->segment(4,0);

	if($catid )
	{
		 echo admin_category_breadcrumbs($catid,$segment);

	}else
	{
		echo '<li class="active"> Meta Tegs </li>';
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
                        
		 <?php 
	
	 echo form_open("adminzone/meta/",'id="form" method="get" ');?>
						          
		<table width="100%"  border="0" cellspacing="3" cellpadding="3" >
          <tr>
          	<td> <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div></td>
			<td>Search [ Page Name]
            
				 <input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />&nbsp;
                
				
				<a  onclick="$('#form').submit();" class="btn btn-default"><span> GO </span></a>
                
				<?php 
					  if( $this->input->get_post('keyword')!='' || $this->input->get_post('status')!='' )
				{   
				   $parentid = (int) $this->input->get_post('parent_id');
				   if($parentid > 0 )
				   {					   
					  echo anchor("adminzone/meta/",'<span>Clear Search</span>'); 
					   
				   }else
				   {
					    echo anchor("adminzone/meta/",'<span>Clear Search</span>');
					 
				   }				  
				} 
				?>               
			</td>
            
			<td align="right"><?php echo anchor("adminzone/meta/post/",'<span>Add Meta Tag</span>','class="btn btn-primary" style="margin-bottom:10px;"' );?></td>
		</tr>        
		</table>
		<?php echo form_close();?>
						
		
	<?php echo form_open("adminzone/meta/",'id="myform"');?>
		 <table id="my_data" class="table table-striped table-bordered table-hover">
            <thead>
            
              <tr role="row">
                <th><input type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
                <th>URL</th>
                <th>Page Name</th> 
                <th>Meta Details</th>
                <th>Action</th>
              </tr>
    
           </thead>
           <tbody>
              
	 <?php 
	  if( is_array($pagelist) && !empty($pagelist) ) {
			foreach($pagelist as $catKey=>$pageVal)
			{
	 ?>
                <tr class="odd" role="row">
                  <td> <input type="checkbox" name="arr_ids[]" value="<?php echo $pageVal['meta_id'];?>" /> </td>
				  <td> <?php echo base_url().$pageVal['page_url'];?> </td>
                  <td><?php echo $pageVal['page_url'];?></td>
                  <td>  
                  		<p> <strong> Tile  : </strong> <?php echo $pageVal['meta_title'];?> </p>
             			<p> <strong> Keyword  : </strong> <?php echo$pageVal['meta_keyword'];?> </p>
             			<p> <strong> Description   : </strong> <?php echo $pageVal['meta_description'];?></p>
              	  </td>
                   
                   <td> <?php echo anchor("adminzone/meta/edit/$pageVal[meta_id]/".query_string(),'Edit'); ?> </td>
                      
                 </tr>
                     
               <?php
		  		 }     
         
		 }else{
		 ?>	
			<td colspan="5" style="text-align: center">
					<strong>	No Record(s) found! </strong>
			</td>
						
		 <?php			
		 	}
		?> 		  
		<?php echo form_close();?> 
          			<tr><td colspan="8" align="right" height="30"><?php echo $page_links; ?></td></tr>
                                
            </tbody>
            
            <tr>
		
        	<td align="left" colspan="8" style="padding:2px" height="35">
            
		<input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
                    
			</td>
	</tr>
            
       </table>
    
								
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