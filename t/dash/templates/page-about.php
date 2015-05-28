<?php //Template Name: About Page
get_header();
get_template_part('weblizar','breadcrumbs'); 
?>
<div class="container">
	<div class="left_sidebar">
			<div class="list-group manager-slidebar">
			  <a href="<?php echo home_url();?>/about#about_us" class="list-group-item"><?php echo __('About us','dash'); ?></a>
			  <a href="<?php echo home_url();?>/about#our_service" class="list-group-item"><?php echo __('Our service','dash'); ?></a>
			  <a href="<?php echo home_url();?>/about#contact_us" class="list-group-item"><?php echo __('Contact us','dash'); ?></a>
			</div>
	</div>
	
	<div class="content_left">

		<div class="about_us">
			<h2><?php echo __('About us','dash'); ?></h2>
			<p></p>
		</div>

		<div class="clearfix margin_top2"></div>
		<div class="our_service">
			<h2><?php echo __('Our service','dash'); ?></h2>
			<p></p>
		</div>

		<div class="clearfix margin_top2"></div>
		<div class="contact_us">
			<h2><?php echo __('Contact us','dash'); ?></h2>
			<p><?php echo __('E-mail','dash'); ?>: dashangcloud@becktu.com</p>
		</div>

	</div>
</div><!-- end content area -->
<div class="margin_top5"></div>	
<?php get_footer(); ?>
