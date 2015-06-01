<?php //Template Name: About Page
get_header();
get_template_part('weblizar','breadcrumbs'); 
?>
<div class="container">
	<div class="left_sidebar">
			<div class="list-group manager-slidebar">
			  <a href="<?php echo home_url();?>/about#about_us" class="list-group-item"><?php echo __('About us','dash'); ?></a>
			  <a href="<?php echo home_url();?>/about#contact_us" class="list-group-item"><?php echo __('Contact us','dash'); ?></a>
			</div>
	</div>
	
	<div class="content_left">

		<div class="about_us">
			<h3><?php echo __('About us','dash'); ?></h3>
			<p>云打赏为用户支持打赏提供最便捷的解决方案。适用多场景打赏，无论是自己的网站（PC或WAP）、第三方博客平台、微信、微博等都支持。简化支付，同时支持微信支付和支付宝，不需要繁琐的申请审核和开发，降低门槛。</p>
			<div class="clearfix margin_top1"></div>
			<p>云打赏由深圳市红蓝网络技术有限公司提供。</p>
		</div>

		<!--
		<a href="<?php //echo home_url();?>/about#our_service" class="list-group-item"><?php //echo __('Our service','dash'); ?></a>
		<div class="clearfix margin_top2"></div>
		<div class="our_service">
			<h2><?php //echo __('Our service','dash'); ?></h2>
			<p></p>
		</div>
		-->

		<div class="clearfix margin_top3"></div>
		<div class="contact_us">
			<h3><?php echo __('Contact us','dash'); ?></h3>
			<p>如果您在使用云打赏时遇到问题，或对云打赏任何建议，请联系我们。</p>
			<div class="clearfix margin_top1"></div>
			<p><?php echo __('E-mail','dash'); ?>: dashangcloud@becktu.com</p>
		</div>

	</div>
</div><!-- end content area -->
<div class="margin_top5"></div>	
<?php get_footer(); ?>
