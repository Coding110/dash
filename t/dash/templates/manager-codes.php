<h3><?php echo __('Dashang Codes','dash'); ?></h3>
<div class="panel panel-default gen-code-note">
 <div class="panel-body">
如果您是网站所有者，可以将下面生成的代码加入到网站合适的位置，以实现打赏。
 </div>
</div>
<div class="gen-code-area">
	<div>
		<label><?php echo __('Dashang Site:','dash'); ?></label>
		<select name="ds_site" id="ds-site-id" class="ds-select">
			<?php //list dashang site from db. 
				if(function_exists('get_sites_by_user_id')){
					$dash_sites = get_sites_by_user_id(get_current_user_id());
					foreach($dash_sites as $site)
					{
						echo "<option value=\"".$site."\">".$site."</option>";
					}
				}
			?>
		</select>
		<button type="button" class="btn btn-default" data-toggle="modal" data-target="#add-site-dlg"><?php echo __('Add Site','dash'); ?></button>
		&nbsp;&nbsp;&nbsp;<br><br>
		<label><?php echo __('Default fee:', 'dash'); ?></label>
		<input class="form-control" type="text" value="1" />
		<label><?php echo __('yuan','dash'); ?></label>
		&nbsp;&nbsp;<br><br>
		<button type="button" class="btn btn-default" id="generating-code"><?php echo __('Generate code','dash'); ?></button>
	</div>
	
	<br>
	<div class="clearfix margin_top2"></div>
	<div class="ds-small-code">
	<div class="ds-small-sample"><h5>1.<?php echo __("Style", 'dash');?>1:</h5>
	<div name="dashmain" id="dash-main-id-aabbdd" class="dash-main-4 aabbdd-1"></div>
    <script type="text/javascript" charset="utf-8" src="http://www.dashangcloud.com/static/ds.js"></script>
	</div>
	<br>
	<textarea id="code-style-1" name="code-stlye" class="code_textarea_bg"><div name="dashmain" id="dash-main-id-aabbdd" class="dash-main-4 aabbdd-1"></div><script type="text/javascript" charset="utf-8" src="http://www.dashangcloud.com/static/ds.js"></script></textarea>
	</div>
	<br>
	<div class="clearfix margin_top"></div>
	<div class="ds-middle-code">
	<div class="ds-middle-sample"><h5>2.<?php echo __("Style", 'dash');?>2:</h5>
	<div name="dashmain" id="dash-main-id-aabbcc" class="dash-main-3 aabbcc-10"></div>
    <script type="text/javascript" charset="utf-8" src="http://www.dashangcloud.com/static/ds.js"></script>
	</div>
	<br>
	<textarea id="code-style-2" name="code-stlye" class="code_textarea_bg"><div name="dashmain" id="dash-main-id-aabbdd" class="dash-main-3 aabbdd-10"></div><script type="text/javascript" charset="utf-8" src="http://www.dashangcloud.com/static/ds.js"></script></textarea>
	</div>
	<br>
	<div class="clearfix margin_top"></div>
	<div class="ds-large-code">
	<div class="ds-large-sample"><h5>3.<?php echo __("Style", 'dash');?>3:</h5>
	<div name="dashmain" id="dash-main-id-aabbee" class="dash-main-2 aabbee-100"></div>
    <script type="text/javascript" charset="utf-8" src="http://www.dashangcloud.com/static/ds.js"></script>
	</div>
	<br>
	<textarea id="code-style-3" name="code-stlye" class="code_textarea_bg"><div name="dashmain" id="dash-main-id-aabbdd" class="dash-main-2 aabbdd-100"></div><script type="text/javascript" charset="utf-8" src="http://www.dashangcloud.com/static/ds.js"></script></textarea>
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
