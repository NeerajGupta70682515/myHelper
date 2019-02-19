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
                &nbsp;&nbsp;&nbsp;<?php echo anchor('adminzone/lockers','Back to List'); ?>
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="team-name">Name <span class="required">*</span> </label>
                
              <div class="col-md-6 col-sm-6 col-xs-12">
              <input name="locker_name" type="text"  class="form-control col-md-7 col-xs-12" value="<?php echo $pageresult['locker_name'];?>">
              </div>
            </div>
			
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Email :<span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="locker_email" id="locker_email" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo $pageresult['locker_email'];?>">
              </div>
            </div>
            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Mobile :<span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="locker_mobile" id="locker_mobile" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo $pageresult['locker_mobile'];?>">
              </div>
            </div>
			
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">City :<span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="locker_city" id="locker_city" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo $pageresult['locker_city'];?>">
              </div>
            </div>
            
            
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Message: <span class="required">*</span> </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea   name="locker_description" rows="5" cols="50" class="form-control" id="locker_desc" ><?php echo $pageresult['locker_message'];?></textarea>
                <?php
 			    echo display_ckeditor($ckeditor); ?>
              </div>
            </div>
			
            
            <div class="ln_solid"></div>
            <div class="form-group">
              <div class="col-md-6 col-sm-6 col-xs-12 col-md-offset-3">
                <input type="submit"  class="btn btn-success" value="Update" />
                <input type="hidden" name="id" value="<?php echo $pageresult['locker_id'];?>" />
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
