<h3><?php echo __('Dashang Codes','dash'); ?></h3>
<div class="panel panel-default gen-code-note">
 <div class="panel-body">
如果您是网站所有者，以提供原创内容，可以将下面生成的代码加入到网站合适的位置，以实现打赏。
 </div>
</div>
<div class="gen-code-area">

	<?php
		// generate code for page
		if(empty($_POST['site']) || empty($_POST['fee'])){
			//echo "page open first";
			$cur_site = 'www.dashangcloud.com';
			$cur_fee = 9.9;
			$dskey = generate_dash_key(1,$cur_site,$cur_fee);
		}else{
			$cur_site = $_POST['site'];
			$cur_fee = $_POST['fee'];
			$dskey = generate_dash_key(get_current_user_id(),$cur_site,$cur_fee);
		}
		if(function_exists('generate_dash_key') && !empty($dskey)){
			$s16 = get_dash_code($dskey, 4, $cur_fee);
			$s32 = get_dash_code($dskey, 3, $cur_fee);
			$s64 = get_dash_code($dskey, 2, $cur_fee);
		}else{
			// tip site install error
		}
	?>

	<div>
	<form action="/manager" method="POST">
		<label><?php echo __('Dashang Site:','dash'); ?></label>
		<select name="site" id="ds-site-id" class="ds-select">
			<?php //list dashang site from db. 
				if(function_exists('get_sites_by_user_id')){
					$dash_sites = get_sites_by_user_id(get_current_user_id());
					if(count($dash_sites) > 0){
						$default_site = $dash_sites[0];
					}
					
					foreach($dash_sites as $site)
					{
						if(!empty($cur_site) && $site == $cur_site){
							echo "<option value=\"".$site."\" selected>".$site."</option>";
						}else{
							echo "<option value=\"".$site."\">".$site."</option>";
						}
					}
				}else{
					//echo "<option value=\"\">Can't find function</option>";
				}
			?>
		</select>
		<button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-site-dlg"><?php echo __('Add Site','dash'); ?></button>
		&nbsp;&nbsp;&nbsp;<br><br>
		<label><?php echo __('Default fee:', 'dash'); ?></label>
		<input name="fee" class="form-control" id="ds-default-fee" type="text" value="<?php echo $cur_fee; ?>" />
		<label><?php echo __('yuan','dash'); ?></label>
		&nbsp;&nbsp;<br><br>
		<button type="submit" class="btn btn-info" id="generating-code"><?php echo __('Generate code','dash'); ?></button>
	</div>
	</form>
	
	<br>
	<div class="clearfix margin_top2"></div>
	<div class="ds-small-code">
	<div class="ds-small-sample"><h5>1.<?php echo __("Style", 'dash');?>1:</h5>
	<div class="ds-small-sample-id">
	<?php if(isset($s16) && !empty($s16)){ echo $s16;} ?>
	</div>
	</div>
	<br>
	<textarea readonly id="code-style-1" name="code-stlye" class="code_textarea_bg"><?php if(isset($s16) && !empty($s16)){ echo $s16;} ?></textarea>
	</div>
	<br>
	<div class="clearfix margin_top"></div>
	<div class="ds-middle-code">
	<div class="ds-middle-sample"><h5>2.<?php echo __("Style", 'dash');?>2:</h5>
	<div id="ds-middle-sample-id">
	<?php if(isset($s32) && !empty($s32)){ echo $s32;} ?>
	</div>
	</div>
	<br>
	<textarea readonly id="code-style-2" name="code-stlye" class="code_textarea_bg"><?php if(isset($s32) && !empty($s32)){ echo $s32;} ?></textarea>

	</div>
	<br>
	<div class="clearfix margin_top"></div>
	<div class="ds-large-code">
	<div class="ds-large-sample"><h5>3.<?php echo __("Style", 'dash');?>3:</h5>
	<div id="ds-large-sample-id">
	<?php if(isset($s64) && !empty($s64)){ echo $s64;} ?>
	</div>
	</div>
	<br>
	<textarea readonly id="code-style-3" name="code-stlye" class="code_textarea_bg"><?php if(isset($s64) && !empty($s64)){ echo $s64;} ?></textarea>
	</div>
	<br>
</div>

<div class="hidden-codes">

<!-- modal dialog -->
<div class="modal fade" id="add-site-dlg">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
        <h4 class="modal-title"><?php echo __('Add site for fee', 'dash'); ?></h4>
      </div>
      <div class="modal-body">
		<label><?php echo __('Input site:','dash'); ?></label>
		<input id="new-dash-site" class="form-control" type="text" placeholder="www.example.com" />
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-default" data-dismiss="modal"><?php echo __('Close', 'dash'); ?></button>
        <button type="button" class="btn btn-primary" id="add-site-ok" data-dismiss="modal">&nbsp;<?php echo __('OK', 'dash'); ?>&nbsp;</button>
      </div>
    </div><!-- /.modal-content -->
  </div><!-- /.modal-dialog -->
</div><!-- /.modal -->


</div>
