<?php $this->load->view('includes/header'); ?>  
  
         
          
			<div class="main-content">
				<div class="main-content-inner">
				
				<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
						    <?php echo '<li>' .anchor('adminzone/dashbord','Home').'</li>'; 
	$segment=4;	
	$catid    = (int) $this->uri->segment(4,0);		
	
	if($catid )
	{
		 echo admin_category_breadcrumbs($catid,$segment);
		 
	}else
	{
		echo '<li class="active"> Add Loan Process Details</li>';
	}   
    ?>

						</ul>

					</div>

					<div class="page-content">
					

						<div class="page-header">
							<h1>
							<?php echo $heading_title;?>
								
							</h1>
							
							
						</div>

						<div class="row">
							<div class="col-xs-12">
	<?php echo validation_message('alert');?>
    <?php //echo error_message(); ?>  
    
	<?php echo form_open_multipart("adminzone/loan_process/post/",'class="form-horizontal "');?>  
															            
								
								<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Loan Process Heading : </label>

						<div class="col-sm-6">
	<input type="f" name="loan_process_title" class="form-control" value="<?php echo set_value('loan_process_title');?>" />
	
						</div>
					</div>
									
				                	<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Image : </label>

						<div class="col-sm-6">
	<input type="file" name="image" class="form-control"  />
	
						</div>
					</div>
                           
	                                <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Description :</label>

										<div class="col-sm-6">
									
											<textarea name="loan_process_description" id="loan_process_description" rows="5" cols="50" class="col-xs-10 col-sm-5" ><?php echo set_value('loan_process_description');?></textarea>
											<?php  echo display_ckeditor($ckeditor); ?>
										</div>
									</div>
								
									<div class="clearfix form-actions">
										<div class="col-md-offset-3 col-md-9">
											<button class="btn btn-info" type="submit">
												<i class="ace-icon fa fa-check bigger-110"></i>
												Submit
											</button>

											&nbsp; &nbsp; &nbsp;
											<button class="btn" type="reset">
												<i class="ace-icon fa fa-undo bigger-110"></i>
												Reset
											</button>
											<a href="javascript:void(0);" onclick="history.back();" class="btn btn-danger"><i class="fa fa-times" aria-hidden="true"></i> Cancel</a>  
										</div>
									</div>
                                   
                                    <input type="hidden" name="action" value="addcategory" />
                    
		
									<div class="hr hr-24"></div>

					<?php echo form_close(); ?>

								<div class="hr hr-18 dotted hr-double"></div>

							</div>
						</div>
					</div>
				</div>
			</div>
 
<?php $this->load->view('includes/footer'); ?>