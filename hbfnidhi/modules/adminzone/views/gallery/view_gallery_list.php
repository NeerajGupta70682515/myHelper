<?php $this->load->view('includes/header'); ?>  
<div class="main-content">
		<div class="main-content-inner">
			<div class="breadcrumbs ace-save-state" id="breadcrumbs">
				<ul class="breadcrumb">
					<li>
						<i class="ace-icon fa fa-home home-icon"></i>
						<a href="<?php echo base_url();?>adminzone">Home</a>
					</li>

				
					<li class="active"><?php echo $heading_title; ?></li>
				</ul>
			</div>

			<div class="page-content">
				<div class="page-header">
					<h1>
						<?php echo $heading_title; ?>
						<small>
							<i class="ace-icon fa fa-angle-double-right"></i>
							<?php echo $heading_title; ?> List
						</small>
					</h1>
				</div>
				<div class="row">
					<div class="col-xs-12">
							
							<table width="100%"  border="0" cellspacing="3" cellpadding="3" >
								<?php 
									if(error_message() !='')
									{	
										echo error_message();
		  
									}
								?> 
							<tr>
								<td><?php error_message();?>
							
							<?php echo form_open("adminzone/gallery",'id="search_form" method="get" '); ?>
				          <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div></td>
							<td align="center" >Search [ Title ] 
								<input type="text" name="keyword" value="<?php echo $this->input->get_post('keyword');?>"  />&nbsp;
								<select name="status">
									<option value="">Status</option>
									<option value="1" <?php echo $this->input->get_post('status')==='1' ? 'selected="selected"' : '';?>>Active</option>
									<option value="0" <?php echo $this->input->get_post('status')==='0' ? 'selected="selected"' : '';?>>In-active</option>
								</select>
								<a  onclick="$('#search_form').submit();" class="btn btn-default"><span> GO </span></a>                
	
								<?php 
									if( $this->input->get_post('keyword')!='' || $this->input->get_post('status')!='' )
									{
									echo anchor("adminzone/gallery/",'<span>Clear Search</span>'); 
									} 
								?>
      
							</td>
							<td align="right"><?php echo anchor("adminzone/gallery/add/","<span>Add Gallery</span>",'class="btn btn-primary" style="margin-bottom:10px;"' );?></td>
						</tr>        
				</table>
					<?php echo form_close();?>
					<?php if(is_array($res) && !empty($res)){
						$Ctrl=1; ?>
					<?php 
					$att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
					echo form_open_multipart("adminzone/gallery/", $att);?> 
					 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
            <thead>
              <tr role="row">
            
                  <th  colspan="1" rowspan="1"  tabindex="0" class=""><input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
                <th   colspan="1" rowspan="1"  tabindex="0" class=""> Titlle</th>
				<!--<th   colspan="1" rowspan="1"  tabindex="0" class="">Banner Description</th>
                <th   rowspan="1"  tabindex="0">Image</th>-->
                 <th   colspan="1" rowspan="1"  tabindex="0">View Picture</th>
                <th  colspan="1" rowspan="1"  tabindex="0">Status</th>
                <th   colspan="1" rowspan="1"  tabindex="0">Action</th>
  
              </tr>
            </thead>
            <tbody>
              <?php 
			$atts = array(
						'width'      => '740',
						'height'     => '600',
						'scrollbars' => 'yes',
						'status'     => 'yes',
						'resizable'  => 'yes',
						'screenx'    => '0',
						'screeny'    => '0'
				 	);
			foreach($res as $key=>$val){
			
			?>
              <tr class="odd" role="row">
                <td>
					 <input  type="checkbox" name="arr_ids[]" value="<?php echo $val['gallery_id'];?>" id="check-all" class="flat">
				</td>
                <td><?php echo $val['gallery_title'];?></td>
             	<td align="center">                
			 	<?php
             		$j=1;
             		$product_path = "gallery/".$val['gallery_image'];
            	?>
             <a href="javascript:void(0);"  onclick="$('#dialog_<?php echo $j;?>').dialog({width:'auto'});">View Image </a>
             <div id="dialog_<?php echo $j;?>" title="Gallery Image" style="display:none;">
             <img src="<?php echo base_url().'uploaded_files/'.$product_path;?>"  /> </div>
             </td>                     
                  <td><?php echo ($val['status']==1)? "Active":"In-active";?></td>
                  <td>
					<?php
                    if($this->editPrvg===TRUE)
                    {
                    ?>
                    <?php echo anchor("adminzone/gallery/edit/$val[gallery_id]/".query_string(),'Edit'); ?>
                    <?php
                    }
                    ?>
                 </td>
              </tr>
              <?php
				//$j++;
				}		   
			?> 
			<tr><td colspan="5" align="right" height="30"><?php echo $page_links; ?></td></tr>     
	</tbody>
	<tr>
		<td align="left" colspan="5" style="padding:2px" height="35">
		<input name="status_action" type="submit"  value="Activate" class="button2" id="Activate" onClick="return validcheckstatus('arr_ids[]','Activate','Record','u_status_arr[]');"/>
		<input name="status_action" type="submit" class="button2" value="Deactivate" id="Deactivate"  onClick="return validcheckstatus('arr_ids[]','Deactivate','Record','u_status_arr[]');"/>
		<input name="status_action" type="submit" class="button2" id="Delete" value="Delete"  onClick="return validcheckstatus('arr_ids[]','delete','Record');"/>
	</td>
	</tr>
	</table>
	<?php
	echo form_close();
}else{
	echo "<center><strong> No record(s) found !</strong></center>" ;
}
?> 

					
					</div>
				</div>
			</div>
		</div>
	</div>

 
<?php $this->load->view('includes/footer'); ?>