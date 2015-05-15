<h3><?php echo __('Basic setting', 'dash'); ?></h3>
<div class="dash-profile-area">

	<!-- User info -->
	<div class="page-header">
		<h4><?php echo __('Your profile', 'dash'); ?></h4>
	</div>

    <table class="table dash-table">
      <tbody>
        <tr>
          <td><?php echo __('Name', 'dash'); ?>:</td>
          <td><?php echo wp_get_current_user()->user_login; ?></td>
        </tr>
        <tr>
          <td><?php echo __('Email', 'dash'); ?>:</td>
      	  <td><?php echo get_userdata(get_current_user_id())->user_email; ?></td>
        </tr>
      </tbody>
    </table>

	<!-- account info -->
	<div class="page-header">
		<h4><?php echo __('Your alipay account for dashang', 'dash'); ?></h4>
		<label>(<?php echo __('Only support alipay account now.', 'dash'); ?>)</label>
	</div>

	<?php
		// get account info ???
		if(function_exists('get_dash_acount_info')){
			$account_info = get_dash_acount_info(get_current_user_id());
		}

		if(isset($account_info) and !empty($account_info)){
	?>
	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modify-account-dlg"><?php echo __('Modify account', 'dash'); ?></button>
	<br><br>
	<?php }else{ ?>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#modify-account-dlg"><?php echo __('Add account', 'dash'); ?></button>
		<br><br>
		<h5><?php echo __('Your have not set alipay account for dashang.', 'dash'); ?></h5>
	<?php } ?>

    <table class="table dash-table" style="visibility:<?php if(!isset($account_info) or empty($account_info)){ echo "hidden";} ?>">
      <tbody>
        <tr>
          <td><?php echo __('Account name', 'dash'); ?>:</td>
          <td id="tb-account-name"><span><?php if(isset($account_info) and !empty($account_info)){ echo $account_info->account;} ?></span></td>
        </tr>
        <tr>
          <td><?php echo __('Real name', 'dash'); ?>:</td>
          <td id="tb-real-name"><span><?php if(isset($account_info) and !empty($account_info)){ echo $account_info->account_name;} ?></span></td>
        </tr>
        <tr>
          <td><?php echo __('Phone no', 'dash'); ?>:</td>
          <td id="tb-phone-no"><span><?php if(isset($account_info) and !empty($account_info)){ echo $account_info->phone_no;} ?></span></td>
        </tr>
      </tbody>
    </table>
	<div class="clearfix margin_top5"></div>
</div>


<!-- modal dialog -->
<div class="modal fade" id="modify-account-dlg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo __('Modify your account info', 'dash'); ?></h4>
      </div>
      <div class="modal-body">
		<label class="lb-info"><?php echo __('Account name','dash'); ?>:</label>
		<input id="account-name" class="form-control modify-account-input" type="text" value="<?php if(isset($account_info) and !empty($account_info)){ echo $account_info->account;} ?>" />
		&nbsp;<span class="label label-danger" id="account-name-error"></span><br><br>
		<label class="lb-info"><?php echo __('Real name','dash'); ?>:</label>
		<input id="account-real-name" class="form-control" type="text" value="<?php if(isset($account_info) and !empty($account_info)){ echo $account_info->account_name;} ?>" />
		&nbsp;<span class="label label-danger" id="real-name-error"></span><br><br>
		<label class="lb-info"><?php echo __('Phone No','dash'); ?>:</label>
		<input id="account-phone-no" class="form-control" type="text" value="<?php if(isset($account_info) and !empty($account_info)){ echo $account_info->phone_no;} ?>" />
		&nbsp;<span class="label label-danger" id="phone-no-error"></span><br>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close', 'dash'); ?></button>
        <button type="button" class="btn btn-primary" id="modify-account-ok">&nbsp;<?php echo __('OK', 'dash'); ?>&nbsp;</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->
