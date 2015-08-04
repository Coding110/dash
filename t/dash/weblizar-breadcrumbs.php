<div class="page_title2">
	<div class="container">
		<div class="two_third">    
			<!--<div class="title"><h1><?php //the_title(); ?></h1></div>-->       
			<?php weblizar_breadcrumbs(); ?>
		</div>
		<?php if(!is_page()) :?>
		<div class="one_third last">    
			<!--
			<div class="site-search-area">        
				<form method="post" id="site-searchform" action="<?php echo esc_url( home_url( '/' ) ); ?>">
					<div>
						<input class="input-text" name="s" id="s" value="Enter Search Blog..." onFocus="if (this.value == 'Enter Search Blog...') {this.value = '';}" onBlur="if (this.value == '') {this.value = 'Enter Search Blog...';}" type="text" />
						<input id="searchsubmit" value="Search" type="submit" />
					</div>        
				</form>
			</div>--><!-- end site search -->        
		</div>
		<?php endif; ?>
	</div>
</div><!-- end page title -->
<div class="clearfix"></div>
