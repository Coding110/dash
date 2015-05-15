<h3><?php echo __('Dashang Links','dash'); ?></h3>
<div class="panel panel-default gen-link-note">
 <div class="panel-body">
如果您在其它平台发布原创内容，可以根据平台信息生成相应的代码，编辑到内容中合适的位置，以实现打赏。同时也欢迎把暂不支持的平台代码规则告诉我们。
 </div>
</div>
<div class="gen-link-area">
	<label><?php echo __('Default fee:', 'dash'); ?></label>&nbsp;
	<input class="form-control" type="text" value="1" />
	<label><?php echo __('yuan','dash'); ?></label>
	<br>
	<br>
	<label><?php echo __('Where links using:','dash'); ?>&nbsp;</label>
	<div class="btn-group" data-toggle="buttons">
		<label class="btn btn-info">
		  <input type="radio" name="options" id="option1" autocomplete="off">微信
		</label>
		<label class="btn btn-info">
		  <input type="radio" name="options" id="option3" autocomplete="off">微博
		</label>
		<label class="btn btn-info">
		  <input type="radio" name="options" id="option1" autocomplete="off">网易博客
		</label>
		<label class="btn btn-info">
		  <input type="radio" name="options" id="option2" autocomplete="off">新浪博客
		</label>
		<label class="btn btn-info">
		  <input type="radio" name="options" id="option3" autocomplete="off">QQ空间
		</label>
		<label class="btn btn-info">
		  <input type="radio" name="options" id="option2" autocomplete="off">CSDN博客
		</label>
		<label class="btn btn-info">
		  <input type="radio" name="options" id="option2" autocomplete="off">博客园
		</label>
		<label class="btn btn-info">
		  <input type="radio" name="options" id="option3" autocomplete="off">其他
		</label>

	</div>
	<br>
	<br>
	<button type="button" class="btn btn-info" data-toggle="modal" data-target="#add-site-dlg"><?php echo __('Generate link','dash'); ?></button>
</div>
<div class="clearfix margin_top2"></div>
	<textarea readonly id="code-style-1" name="code-stlye" class="code_textarea_bg"></textarea>
<div class="clearfix margin_top2"></div>
<br>
<br>
<br>
<br>
<br>
<div class="dash-links-history">
	<div class="panel panel-default">
      <div class="panel-heading">您使用过的打赏链接，可以重复使用。</div>
      <!-- Table -->
      <table class="table">
        <thead>
          <tr>
            <th>No.</th>
            <th>打赏链接</th>
            <th>打赏金额（元）</th>
            <th>场景</th>
            <th>生成博客代码</th>
          </tr>
        </thead>
        <tbody>
          <tr>
            <th scope="row">1</th>
            <td>http://www.dashangcloud.com/sh/7b646c8d</td>
            <td>1</td>
            <td>朋友圈/说说</td>
            <td><input class="btn btn-info" type="button" href="#" value="快速代码" /></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>http://www.dashangcloud.com/sh/8b646c8d</td>
            <td>0.1</td>
            <td>微博</td>
            <td><input class="btn btn-info" type="button" href="#" value="快速代码" /></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>http://www.dashangcloud.com/sh/9b646c8d</td>
            <td>0.01</td>
            <td>博客</td>
            <td><input class="btn btn-info" type="button" href="#" value="快速代码" /></td>
          </tr>
        </tbody>
      </table>
		<nav>
		  <ul class="pagination">
		    <li>
		      <a href="#" aria-label="Previous">
		        <span aria-hidden="true">&laquo;</span>
		      </a>
		    </li>
		    <li><a href="#">1</a></li>
		    <li><a href="#">2</a></li>
		    <li><a href="#">3</a></li>
		    <li><a href="#">4</a></li>
		    <li><a href="#">5</a></li>
		    <li>
		      <a href="#" aria-label="Next">
		        <span aria-hidden="true">&raquo;</span>
		      </a>
		    </li>
		  </ul>
		</nav>
    </div>
</div>
