<?php $this->load->view('includes/header'); ?>  
<div class="main-content">
	<div class="main-content-inner">
		<div class="breadcrumbs ace-save-state" id="breadcrumbs">
		<ul class="breadcrumb">
        <i class="ace-icon fa fa-home home-icon"></i>
			<?php echo '<li>' .anchor('adminzone/dashbord','Home').'</li>'; 
			echo '<li class="active">'. $heading_title .'</li>';  
		?>		
		</ul>
		
		</div>

		<div class="page-content">
		
		
		<div class="page-header">
         <h1>
            <?php echo anchor('adminzone/service','Back to List'); ?>
            <small>
                <i class="ace-icon fa fa-angle-double-right"></i>
                <?php echo $heading_title; ?>
            </small>
        </h1>
		</div>

			<div class="row">
			<div class="col-xs-12">
			<?php echo validation_message('alert');?>
			<?php echo error_message(); ?>  
			<?php echo form_open_multipart(current_url_query_string(),'class="form-horizontal "');?>  

			<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Title : </label>
			
			<div class="col-sm-6">
			<input type="f" name="service_title" class="form-control" value="<?php echo set_value('service_title',$res['service_title']);?>" />
			</div>
			</div>
		
					
			<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Home image : </label>
			<div class="col-sm-6">
			<input type="file" name="image1" class="form-control"  />
			</div>
			</div>

			

			<div class="form-group">
			<label class="col-sm-3 control-label no-padding-right" for="form-field-1">Banner : </label>
			<div class="col-sm-6">
			<input type="file" name="image2" class="form-control"  />
			</div>
			</div>
			
		<div class="form-group">
	     <label class="col-sm-3 control-label no-padding-right" for="form-field-1">Description :</label>
				<div class="col-sm-6">
					<textarea name="service_description" id="service_description" rows="5" cols="50" class="col-xs-10 col-sm-5" ><?php echo set_value('service_description',$res['service_description']);?></textarea>
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


