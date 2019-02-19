<?php $this->load->view('includes/header'); ?>  


             
              
          
			<div class="main-content">
				<div class="main-content-inner">
				
							<div class="breadcrumbs ace-save-state" id="breadcrumbs">
						<ul class="breadcrumb">
	
						<li class="active"> Edit Faq's </li>
	
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
    <?php echo error_message(); ?>  
    
	<?php echo form_open_multipart(current_url_query_string(),'class="form-horizontal "');?>  
							

								
						           <?php 
			$sel = "select * from tbl_services where status ='1'"; 
			$serv_qry = $this->db->query($sel);
			$list_serv = $serv_qry->result_array();
							//	print_r($list_serv);
								
		?>						
		<div class="form-group">
		
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Select Service : </label>

			<div class="col-sm-6">
									
				<select class="form-control" name="service_title">
				<?php 
					if(is_array($list_serv) && !empty($list_serv)){
					foreach($list_serv as $ser){
					?>
					<option value="<?php echo $ser['service_title']; ?>" <?php if($ser['service_title']==$res['faq_service']){?> selected="selected" <?php } ?>><?php echo $ser['service_title']; ?></option>
				<?php } }?>
				</select>					
			
		</div>
		</div>
									
				                	<div class="form-group">
						<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Question : </label>

						<div class="col-sm-6">

	<input type="text" name="faq_question" placeholder="Enter Your Question" class="form-control" value="<?php echo set_value('faq_question',$res['faq_question']);?>"onkeypress="return alpha(event)" maxlength="70" required />
						</div>
					</div>
                           
	                                <div class="form-group">
										<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Answer :</label>

										<div class="col-sm-6">
											<textarea name="faq_answer" id="faq_answer" rows="5" cols="50" class="col-xs-10 col-sm-5" ><?php echo set_value('faq_answer',$res['faq_answer']);?></textarea>
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

							</div><!-- /.col -->
						</div><!-- /.row -->
					</div><!-- /.page-content -->
				</div>
			</div>







<?php $this->load->view('includes/footer'); ?>