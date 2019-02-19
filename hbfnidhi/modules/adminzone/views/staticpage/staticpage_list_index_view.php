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
									
									<?php echo form_open("adminzone/staticpages",'id="search_form" method="get" '); ?>
		<table width="100%"  border="0" cellspacing="3" cellpadding="3" >
		  
          <tr>
          	<td> <div align="right" class="breadcrumb"> Records Per Page : <?php echo display_record_per_page();?> </div></td>
			<td align="center" >Search [ Page Name ] 
            
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
				   					   
					  echo anchor("adminzone/staticpages/",'<span>Clear Search</span>'); 
					   
				 			  
				} 
				?>
              
			</td>
			<td align="right"><?php echo anchor("adminzone/staticpages/add/","<span>Add $heading_title</span>",'class="btn btn-primary" style="margin-bottom:10px;"' );?></td>
		</tr>        
		</table>
		<?php echo form_close();?>
                 <?php 
					  $att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
					  echo form_open_multipart("adminzone/staticpages/", $att);?> 
							 <table width="100%" id="dynamic-table" class="table table-striped table-bordered table-hover">
                    <thead>
                      <tr role="row">
                    
                          <th   colspan="1" rowspan="1"  tabindex="0" class=""><input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
                        <th   colspan="1" rowspan="1"  tabindex="0" class="">Page Name</th>
                      <!--  <th   rowspan="1"  tabindex="0">Image</th>-->
                         <th   colspan="1" rowspan="1"  tabindex="0">Details</th>
                        <th  colspan="1" rowspan="1"  tabindex="0">Status</th>
                        <th   colspan="1" rowspan="1"  tabindex="0">Action</th>
          
                      </tr>
                    </thead>
                    <tbody>
                      <?php 
					if(is_array($pagelist) && !empty($pagelist)){
					$Ctrl=1;
					foreach($pagelist as $key=>$val){
					
					?>
                      <tr class="odd" role="row">
                        <td>
							 <input  type="checkbox" name="arr_ids[]" value="<?php echo $val['page_id'];?>" id="check-all" class="flat">
						  </td>
                        <td><?php echo $val['page_name'];?></td>

                      <td>
                      
			    <?php echo $val['page_description'];?>
                     
                         
                         </td>
                          <td><?php echo ($val['status']==1)? "Active":"In-active";?></td>
                          <td>
							<?php
                            if($this->editPrvg===TRUE)
                            {
                            ?>
                            <?php echo anchor("adminzone/staticpages/edit/$val[page_id]/".query_string(),'Edit'); ?>
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
                </td>
            </tr>
        </table>
         <?php echo form_close();?>
        
							
							</div>
						</div>
					</div>
				</div>
			</div>





 <!-- page content -->
   <!--     <div class="right_col" role="main">
          <div class="">
            <div class="page-title">
              <div class="title_left">
                <h3><?php echo $heading_title; ?></h3>
              </div>
              </div>

            <div class="clearfix"></div>

            <div class="row">

              <div class="col-md-12 col-sm-12 col-xs-12">
                <div class="x_panel">
                  <div class="x_title">
                    <h2><?php echo $heading_title; ?> List</small></h2>
                    <ul class="nav navbar-right panel_toolbox">
                      <li>
                      <?php echo anchor("adminzone/staticpages/add/","Add Static page",'class="btn btn-primary" ' );?>
                      </li>
                      
                      
                      </li>
                    </ul>
                    <div class="clearfix"></div>
                  </div>
                  <div class="x_content">
                 <?php 
					  $att=array('class'=>'form-horizontal form-label-left','name'=>'myform');
					  echo form_open_multipart("adminzone/staticpages/", $att);?> 
                    <table id="datatable-checkbox" class="table table-striped table-bordered bulk_action">
                      <thead>
                        <tr>
                          <th>
							 <th><input class="flat" type="checkbox" onclick="$('input[name*=\'arr_ids\']').attr('checked', this.checked);" /></th>
						  </th>
                          <th>Page Name</th>
                          <th>Details</th>
                          <th>Status</th>
                          <th>Action</th>
                         
                        </tr>
                      </thead>


                      <tbody>
                         <?php
		 
		  	foreach($pagelist as $val)
			{ 
			
          ?>
                       
                        <tr>
                  
                          <td>
							 <th><input  type="checkbox" name="arr_ids[]" value="<?php echo $val['page_id'];?>" id="check-all" class="flat"></th>
						  </td>
                          <td><?php echo $val['page_name'];?></td>
                          <td><a href="javascript:void(0);"  onclick="$('#dialog_<?php echo $val['page_id'];?>').dialog({ width: 650 });">View</a>
              
			  <div id="dialog_<?php echo $val['page_id'];?>" title="Description" style="display:none;">
			    <?php echo $val['page_description'];?>
               </div>             </td>
                          <td><?php echo ($val['status']==1)? "Active":"In-active";?></td>
                          <td>
							<?php
                            if($this->editPrvg===TRUE)
                            {
                            ?>
                            <?php echo anchor("adminzone/staticpages/edit/$val[page_id]/".query_string(),'Edit'); ?>
                            <?php
                            }
                            ?>
                         </td>
                        </tr>
                       
					   <?php } ?>
                       
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
                </td>
            </tr>
        </table>
                 <?php echo form_close();?>
                  </div>
                </div>
              </div>
   
            </div>
          </div>
        </div>-->
        <!-- /page content -->


<?php $this->load->view('includes/footer'); ?>