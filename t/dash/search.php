<?php get_header(); ?>
<div class="page_title2">
<div class="container">

    <div class="two_third">    
    	<div class="title">
		<h1><?php printf( __( 'Search Results for: %s', gr_td ), '<span>' . get_search_query() . '</span>'  ); ?></h1>
		</div>       
        <?php weblizar_breadcrumbs(); ?>
    </div>    
    <div class="one_third last">    
    	<div class="site-search-area">        
    	<form method="post" id="site-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
        <div>
        <input class="input-text" name="s" id="s" value="Enter Search Blog..." onFocus="if (this.value == 'Enter Search Blog...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Enter Search Blog...';}" type="text" />
        <input id="searchsubmit" value="Search" type="submit" />
        </div>        
        </form>
		</div><!-- end site search -->        
    </div>    
</div>
</div><!-- end page title -->
<div class="clearfix"></div>		
<div class="container">	
	<div class="content_left">	
	<?php 
	if ( have_posts()): 
	while ( have_posts() ): the_post();
	get_template_part('post','content'); ?>		
	<?php endwhile;	 
	weblizar_navigation(); 
	else :
	get_template_part('nocontent');
	endif;?>	
	<div class="clearfix mar_top2"></div>
	</div>
	<?php get_sidebar(); ?>
</div>
<?php get_footer(); ?>	