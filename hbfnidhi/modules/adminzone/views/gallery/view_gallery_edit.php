<?php
echo validation_message();
echo error_message(); 
$this->load->view('includes/header'); ?>  
<!-- page content -->
<div class="main-content">
	<div class="main-content-inner">
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
								<?php echo anchor('adminzone/gallery','Back to List'); ?>
								<small>
									<i class="ace-icon fa fa-angle-double-right"></i>
									<?php echo $heading_title; ?>
								</small>
							</h1>
					</div>

  
   
    <div class="row">
      <div class="col-md-10 col-sm-10 col-xs-10">
        <div class="x_panel">
          <?php validation_message();?>
          <?php error_message(); ?>
          <div class="x_content"> <br />
              <?php //echo form_open_multipart(current_url_query_string(), 'class="form-horizontal form-label-left" id="form"');?>
				<?php echo form_open_multipart(current_url_query_string(), 'class="form-horizontal form-label-left" id="form"');?> 
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Title : <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="gallery_title" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('gallery_title',$res->gallery_title);?>">
			  </div>
            </div>
           <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Gallery Image: <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
               <input type="file" name="gallery_image" id="gallery_image" class="form-control col-md-6 col-sm-6 col-xs-12" size="40"/>                 
    <?php
		 $j=1;
		 $product_path = "gallery/".$res->gallery_image;
		?>
    <a href="javascript:void(0);"  onclick="$('#dialog_<?php echo $j;?>').dialog({width:'auto'});">View Image </a>
         <div id="dialog_<?php echo $j;?>" title="Gallery Image" style="display:none;">
      <img src="<?php echo base_url().'uploaded_files/'.$product_path;?>"  /> </div>
   
    <br />
     <strong>Best Image Size :[521*297]</strong>
              </div>
            </div>
            
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="submit" name="sub" class="btn btn-success" value="Add Gallery"  />
				<input type="hidden" name="action" value="add" />
              </div>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
      </div>
    </div>
 

</div>
</div>
</div>
</div>
<!-- /page content -->

<?php $this->load->view('includes/footer'); ?>