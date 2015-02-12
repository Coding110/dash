<h3>打赏链接</h3>
<div class="gen-link-area">
	<label>默认打赏金额:</label>&nbsp;&nbsp;&nbsp;
	<input type="text" value="1" style="width:50px;"/>
	<label>元</label>
	<br>
	<div><label>在哪使用打赏链接:</label></div>
	
	<div class="link-scene-radio">&nbsp;&nbsp;&nbsp;
		<span><input type="radio" name="linkscene" value="1" id="link-scene-weixin" checked="">朋友圈/说说</span>&nbsp;
		<span><input type="radio" name="linkscene" value="2" id="link-scene-weibo">微博</span>&nbsp;
		<span><input type="radio" name="linkscene" value="3" id="link-scene-blog">博客</span>&nbsp;
	</div>
	<div>快速通道</div>
	<div class="">
		<span><input type="radio" name="blogscene" value="1" id="blog-scene-weixin" checked="">微信平台</span>&nbsp;
		<span><input type="radio" name="blogscene" value="2" id="blog-scene-qzone">QQ空间</span>&nbsp;
		<span><input type="radio" name="blogscene" value="3" id="blog-scene-sina">新浪</span>&nbsp;
		<span><input type="radio" name="blogscene" value="4" id="blog-scene-163">网易</span>&nbsp;
	</div>
	<br>
	<input type="button" href="#" value="生成链接" />
</div>
<div class="clearfix margin_top2"></div>
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
            <td><input type="button" href="#" value="快速代码" /></td>
          </tr>
          <tr>
            <th scope="row">2</th>
            <td>http://www.dashangcloud.com/sh/8b646c8d</td>
            <td>0.1</td>
            <td>微博</td>
            <td><input type="button" href="#" value="快速代码" /></td>
          </tr>
          <tr>
            <th scope="row">3</th>
            <td>http://www.dashangcloud.com/sh/9b646c8d</td>
            <td>0.01</td>
            <td>博客</td>
            <td><input type="button" href="#" value="快速代码" /></td>
          </tr>
        </tbody>
      </table>
		<div class="links-page-info">
			<div style="float:left;padding-left:20px;">每页<select class="dash-util-page-select">
				<option value="30" selected="selected">30</option>
				<option value="50">50</option>
				<option value="100">100</option>
			</select>条</div>
			<div class="dash-pagination" style="float:left;padding-left:20px;">
				<span>上一页</span>
				<span>1</span>
				<span>下一页</span>
				<span>共2条</span>
			</div>
			<div class="dash-pagination-select">&nbsp;&nbsp;&nbsp;到第<select class="jump-page-select">
				<option value="1" selected="selected">1</option>
				<option value="2">2</option>
				<option value="3">3</option>
			</select>页</div>
		</div>
    </div>
</div>
