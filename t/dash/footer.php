
<div class="clearfix"></div>
<div class="copyright_info">
		<div class="container">
			<div class="clearfix divider_dashed10"></div>
			<?php $wl_theme_options = weblizar_get_options(); ?>
			<div class="one_third">
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
