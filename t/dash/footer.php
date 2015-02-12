
<div class="clearfix"></div>
<div class="footer1">
	<div class="container">			
		<div class="clearfix divider_dashed1"></div>
		<?php
		if ( is_active_sidebar( 'footer-widget-area-ext' ) )
		{ 
			dynamic_sidebar( 'footer-widget-area-ext' );
		} else 
		{  ?>
		<div class="one_fourth animate" data-anim-type="fadeInUp">
			<div class="siteinfo">			
				<h4 class="lmb"><?php _e('About Doshang Cloud',gr_td); ?></h4>				
				<p><?php _e('All the Lorem Ipsum generators on the Internet tend to repeat predefined an chunks as necessary, making this the first true generator on the Internet.
					All the Lorem Ipsum generators on the Internet tend to repeat predefined Lorem Ipsum as their default model text, and a search for web sites.',gr_td); ?></p>
				<br />							
			</div>
		</div><!-- end site info -->	
		<div class="one_fourth animate" data-anim-type="fadeInUp">
			<div class="qlinks">		
				<h4 class="lmb"><?php _e('Custom Menu',gr_td); ?></h4>			
				<ul>
					<li><a href="#"><?php _e('Home',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Blog',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Service',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Portfolio',gr_td); ?></a></li>
					<li><a href="#"><?php _e('About-us',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Team',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Contact -Us',gr_td); ?></a></li>
					<li><a href="/wp-login.php"><?php _e('Login',gr_td); ?></a></li>
				</ul>			
			</div>
		</div><!-- end links -->
		
		<div class="one_fourth animate" data-anim-type="fadeInUp">
			<div class="qlinks">		
				<h4 class="lmb"><?php _e('Recent Posts',gr_td); ?></h4>			
				<ul>
					<li><a href="#"><?php _e('Awsome Slidershows',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Features and Typography',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Different &amp; Unique Pages',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Single and Portfolios',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Recent Blogs or News',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Post with Image',gr_td); ?></a></li>
					<li><a href="#"><?php _e('Layered PSD Files',gr_td); ?></a></li>
				</ul>			
			</div>
		</div><!-- end links -->		
			
		<!--
		<div class="one_fourth last animate" data-anim-type="fadeInUp">		
			<h4><?php //_e('Flickr Photos',gr_td); ?></h4>			
			<div id="flickr_badge_wrapper">
				<script type="text/javascript" src="http://www.flickr.com/badge_code_v2.gne?count=9&amp;display=latest&amp;size=s&amp;layout=h&amp;source=user&amp;user=121500546@N06"></script>     
			</div>			
		</div>--><!-- end flickr -->
		<?php } ?>		
	</div>
</div><!-- end footer -->

<div class="clearfix"></div>
<div class="copyright_info">
		<div class="container">
			<div class="clearfix divider_dashed10"></div>
			<?php $wl_theme_options = weblizar_get_options(); ?>
			<div class="one_third">
			<!--
			<a href="<?php echo esc_url( __( 'http://wordpress.org/', gr_td ) ); ?>"><?php printf( __( 'Proudly powered by %s', gr_td ), 'WordPress' ); ?></a>
			-->
			</div>
			<div class="one_third animate" data-anim-type="fadeInRight">
			
			<?php 
				if($wl_theme_options['footer_customizations']!= '') { echo $wl_theme_options['footer_customizations']; } 
				
				if($wl_theme_options['developed_by_text']!='') { echo  "  ". $wl_theme_options['developed_by_text']; }
				
				if($wl_theme_options['developed_by_weblizar_text']!='') {	?> 
				|<a rel="nofollow" href="<?php if($wl_theme_options['developed_by_link']!='') { echo  esc_url($wl_theme_options['developed_by_link']); } ?>"><?php echo $wl_theme_options['developed_by_weblizar_text']; ?></a>
			<?php } ?>					
				<!-- stat code -->
				<script type="text/javascript">var cnzz_protocol = (("https:" == document.location.protocol) ? " https://" : " http://");document.write(unescape("%3Cspan id='cnzz_stat_icon_1254307564'%3E%3C/span%3E%3Cscript src='" + cnzz_protocol + "s11.cnzz.com/z_stat.php%3Fid%3D1254307564%26show%3Dpic' type='text/javascript'%3E%3C/script%3E"));</script>
			</div>	
			<?php if($wl_theme_options['footer_section_social_media_enbled'] == "on") { ?>
			<div class="one_third last">			
			</div>	
			<?php } ?>
		</div>
	</div><!-- end copyright info -->
	<a href="#" class="scrollup">Scroll</a><!-- end scroll to top of the page-->	
</div> <!-- end of header wrapper div -->
<?php wp_footer(); ?>	
	<?php if(isset($wl_theme_options['custom_css'])) { ?> 
	<style type="text/css"><?php echo $wl_theme_options['custom_css']; ?></style>
	<?php } ?>
</body>
</html>
