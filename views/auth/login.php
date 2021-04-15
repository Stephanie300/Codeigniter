<div class="p-3 bg-info text-white"><h1><?php echo lang('login_heading');?></h1></div>

<div class="p-3 bg-light"><p><?php echo lang('login_subheading');?></p></div>

<div id="infoMessage"><?php echo $message;?></div>

<div class="p-3">
<?php echo form_open("auth/login");?>

  <div class="form-group">
    <?php echo lang('login_identity_label', 'identity');?>
    <?php echo form_input($identity);?>
  </div>

  <div class="form-group">
    <?php echo lang('login_password_label', 'password');?>
    <?php echo form_input($password);?>
  </div>

  <div class="form-group">
    <?php echo lang('login_remember_label', 'remember');?>
    <?php echo form_checkbox('remember', '1', FALSE, 'id="remember"');?>
  </div>


  <p><?php echo form_submit('submit', lang('login_submit_btn'));?></p>

<?php echo form_close();?>

<p><a href="forgot_password"><?php echo lang('login_forgot_password');?></a></p>

<a class="btn btn-primary text-white" href="<?php echo base_url()?>register">Don't have an account? Register here</a>

</div>