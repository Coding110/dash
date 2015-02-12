<?php
get_header();
$wl_theme_options = weblizar_get_options();
if ($wl_theme_options['_frontpage']=="on" && is_front_page() && 'posts' == get_option( 'show_on_front' )): get_template_part( 'frontpage' );
else: 
get_template_part('weblizar','breadcrumbs'); ?>
<div class="container">
	<div class="content_left">
	<?php if ( have_posts()): 
	while ( have_posts() ): the_post(); 
		get_template_part('loop');
	endwhile;
	endif;
	weblizar_pagination() ; ?><!-- /# end pagination -->
	</div><!-- end content left side -->
<?php get_sidebar(); ?>
</div><!-- end content area -->
<?php endif;
get_footer(); ?>