<h3><?php echo __('Dashang Links','dash'); ?></h3>
<div class="panel panel-default gen-link-note">
 <div class="panel-body">
如果您在其它平台发布原创内容，可以根据平台信息生成相应的代码，编辑到内容中合适的位置，以实现打赏。同时也欢迎把暂不支持的平台代码规则告诉我们。
 </div>
</div>
<div class="gen-link-area">
	<label><?php echo __('Default fee:', 'dash'); ?></label>&nbsp;
	<input class="form-control" type="text" id="ds-default-fee"  value="1" />
	<label><?php echo __('yuan','dash'); ?></label>
	<br>
	<br>
	<button type="button" id="generating-link" class="btn btn-info" data-toggle="modal" data-target="#add-site-dlg"><?php echo __('Generate link','dash'); ?></button>
</div>
<div class="clearfix margin_top2"></div>
	<textarea readonly id="link-style-1" name="link-stlye" class="code_textarea_bg"></textarea>
<div class="clearfix margin_top2"></div>
<br>
<br>
<br>
<br>
<br>

<div class="dash-links-history">
	<div class="panel panel-default">
      <div class="panel-heading"><?php echo __('The used dashang links can reuse.', 'dash'); ?></div>
		<?php
		if(function_exists('get_links_by_type')){
			$tno = 1;
			$http_prefix = "http://www.dashangcloud.com/sh/";
			$ds_links = get_links_by_type(get_current_user_id(), "post");
		}
		?>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th><?php echo __('Dashang links', 'dash'); ?></th>
            <th><?php echo __('Dashang fee (yuan)', 'dash'); ?></th>
          </tr>
        </thead>
        <tbody>
			<?php
				if(isset($ds_links)){
					foreach($ds_links as $link){
			?>
          <tr>
            <th scope="row"><?php echo $tno++; ?></th>
            <td><?php echo $http_prefix.$link->dash_key; ?></td>
            <td><?php echo $link->default_money; ?></td>
          </tr>
			<?php
					}
				}
			?>
        </tbody>
      </table>
    </div>
</div>

<div class="clearfix margin_top2"></div>
<div class="link-demos-area">
	<h4><?php echo __('Link demos', 'dash'); ?></h4>
	<p>
		<ol>
			<li><a target="_blank" href="http://blog.163.com/hua_zhixing/blog/static/248751003201542064210557">云打赏在博客中使用演示之网易博客</a></li>
			<li><a target="_blank" href="http://blog.sina.com.cn/s/blog_62d959450102w0y5.html">云打赏在博客中使用演示之新浪博客</a></li>
			<li><a target="_blank" href="http://user.qzone.qq.com/1485084328/blog/1432076878">云打赏在博客中使用演示之QQ空间日志</a></li>
			<li><a target="_blank" href="http://blog.csdn.net/hua_zhixing/article/details/45865629">云打赏在博客中使用演示之CSDN博客</a></li>
			<li><a target="_blank" href="http://www.cnblogs.com/huazhixing/articles/4518730.html">云打赏在博客中使用演示之博客园</a></li>
			<li><a target="_blank" href="http://huazhixing.lofter.com/post/1cbbdf6f_704567e">云打赏在博客中使用演示之网易LOFTER</a></li>
			<li><a target="_blank" href="http://26503409.blog.hexun.com/99868745_d.html">云打赏在博客中使用演示之和讯博客</a></li>
		</ol>
	</p>
</div>

