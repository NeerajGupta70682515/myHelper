<?php $this->load->view('includes/header'); ?>
<!-- page content -->

<div class="right_col" role="main">
  <div class="">
   <div class="page-title">
      <div class="breadcrumbs ace-save-state" id="breadcrumbs">
            <ul class="breadcrumb">
                <li>
                    <i class="ace-icon fa fa-home home-icon"></i>
                    <a href="<?php echo base_url();?>adminzone">Home</a>
                </li>

            
                <li class="active"><?php echo $heading_title; ?></li>
            </ul>
        </div>
		        

		<div class="page-header">
            <h1>
                &nbsp;&nbsp;&nbsp;<?php echo anchor('adminzone/meta','Back to List'); ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?php echo $heading_title; ?>
                </small>
            </h1>
        </div>
       </div>        
      
     
      
    </div>
    <div class="row">
      <div class="col-md-10 col-sm-10 col-xs-10">
        <div class="x_panel">
          <?php validation_message();?>
          <?php error_message(); ?>
          <div class="x_content"> <br />
  
            <?php echo form_open_multipart(current_url_query_string(), 'class="form-horizontal form-label-left" id="form"');?>
            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="page_url">URL : <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="page_url" id="page_url" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('page_url'),$res['page_url'];?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="title">Title : <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="meta_title" id="meta_title" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('meta_title'),$res['meta_title'];?>" />
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="keywords">Keywords : <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="meta_keyword" id="meta_keyword" rows="10" cols="10" class="form-control col-md-7 col-xs-12" ><?php echo set_value('meta_keyword'),$res['meta_keyword'];?></textarea>
                <?php echo display_ckeditor($ckeditor1); ?>
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="description">Description : <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <textarea name="meta_description" id="meta_description" rows="10" cols="10" class="form-control col-md-7 col-xs-12"><?php echo set_value('meta_description'),$res['meta_description'];?></textarea>
                <?php echo display_ckeditor($ckeditor2); ?>
              </div>
            </div>
                  
           
                     
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="submit" class="btn btn-success" value="Submit"  />
              </div>
            </div>
            <?php echo form_close(); ?> </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- /page content -->
<?php $this->load->view('includes/footer'); ?>
