<?php //Template Name: Manager Page 
	get_header(); 
	require("manager-breadcrumbs.php");
?>
<div class="left_sidebar">
<?php 
	if ( is_active_sidebar( 'sidebar-mge-nav' ) )
	{ 
		dynamic_sidebar( 'sidebar-mge-nav' );
	} 
?>
</div>

<div class="content_left">
	<?php require("manager-main.php");?>
</div>

<?php get_footer(); ?>
