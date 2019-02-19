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
                <?php error_message();?>									
                <?php echo form_open("adminzone/our_team",'id="search_form" method="get" '); ?>
                
		<table width="100%"  border="0" cellspacing="3" cellpadding="3" >
		  
          <tr>
          	<td> <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div></td>
			<td align="center" >Search [ Team Name ] 
            
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
						echo anchor("adminzone/our_team/",'<span>Clear Search</span>'); 
					} 
				?>              
			</td>
            
			<td align="right"><?php echo anchor("adminzone/our_team/add/","<span>Add $heading_title</span>",'class="btn btn-primary" style="margin-bottom:10px;"' );?></td>
		</tr>        
		</table>
		<?php echo form_close();?>
                 <?php 
					  $att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
					  echo form_open_multipart("adminzone/our_team/", $att);?> 
							 <table id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr role="row">
                    
                        <th   colspan="1" rowspan="1"  tabindex="0" class=""><input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
                        <th   colspan="1" rowspan="1"  tabindex="0" class="">Team</th>
                      	<th   colspan="1" rowspan="1"  tabindex="0">Team Description</th>
                        <th   colspan="1" rowspan="1"  tabindex="0">Image</th>
                        <th   colspan="1" rowspan="1"  tabindex="0">Display Order</th>
                        <th  colspan="1" rowspan="1"  tabindex="0">Status</th>
                        <th   colspan="1" rowspan="1"  tabindex="0">Action</th>
          
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
					if(is_array($teamlist) && !empty($teamlist)){
					$Ctrl=1;
					foreach($teamlist as $key => $val){
						$displayorder       = ($val['sort_order']!='') ? $val['sort_order']: "0";	
					?>
                      <tr class="odd" role="row">
                        <td>
							 <input  type="checkbox" name="arr_ids[]" value="<?php echo $val['our_team_id'];?>" id="check-all" class="flat">
						  </td>
                        <td>
                        	<b>Name        : </b><?php echo $val['our_team_name'];?><br />
                           	<b>Designation : </b><?php echo $val['our_team_designation'];?>
                        </td>

                      <td> <?php echo $val['our_team_description'];?> </td>
                      
                      <td>  <img src="<?php echo get_image('team',$val['image'],100,100);?>" class="img-responsive"/>  </td>
                      
                      <td align="center"> <input type="text" name="ord[<?php echo $val['our_team_id'];?>]" value="<?php echo $displayorder;?>" size="2" /></td>
                      
                      <td><?php echo ($val['status']==1)? "Active":"In-active";?></td>
                      
                      <td>
							<?php
                            if($this->editPrvg===TRUE)
                            {
                            ?>
                            <?php echo anchor("adminzone/our_team/edit/$val[our_team_id]/".query_string(),'Edit'); ?>
                            <?php
                            }
                            ?>
                      </td>
                      
  
                      </tr>
                      <?php }
								}else{
						?>
						
					<tr class="odd" role="row">
                        <td colspan="5" style="text-align: center">
								<strong>	No data found !</strong>
						</td>
                    </tr>
						
					<?php 
						}
					?>
                    </tbody>
                  </table>
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
                    ?>
                     <input name="update_order" type="submit"  value="Update Order" class="button2" />
                </td>
            </tr>
        </table>
         <?php echo form_close();?>
        
							
							</div>
						</div>
					</div>
				</div>
			</div>



<?php $this->load->view('includes/footer'); ?>