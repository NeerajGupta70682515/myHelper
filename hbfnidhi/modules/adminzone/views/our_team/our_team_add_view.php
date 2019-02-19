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
                &nbsp;&nbsp;&nbsp;<?php echo anchor('adminzone/our_team','Back to List'); ?>
                <small>
                    <i class="ace-icon fa fa-angle-double-right"></i>
                    <?php echo $heading_title; ?>
                </small>
            </h1>
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
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="first-name">Team Name : <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="team_name" id="team_name" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('team_name');?>" />
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12" for="last-name">Designation : <span class="required">*</span> </label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="text" name="team_designation" id="team_designation" size="40" class="form-control col-md-7 col-xs-12" value="<?php echo set_value('team_designation');?>">
              </div>
            </div>
            <div class="form-group">
              <label class="control-label col-md-3 col-sm-3 col-xs-12">Description: <span class="required">*</span> </label>
              <div class="col-md-9 col-sm-9 col-xs-12">
                <textarea name="team_description" rows="5" cols="50" id="team_desc" ><?php echo set_value('team_description');?>
</textarea>
                <?php echo display_ckeditor($ckeditor); ?> </div>
            </div>
            <div class="form-group">
              <label for="middle-name" class="control-label col-md-3 col-sm-3 col-xs-12">Image :<span class="required">*</span></label>
              <div class="col-md-6 col-sm-6 col-xs-12">
                <input type="file" name="team_image" />
                <br />
                <?=$this->config->item('news.best.image.view');?>
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
