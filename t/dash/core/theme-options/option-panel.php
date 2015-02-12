<?php
/**
 * Weblizar Admin Menu
 */
add_action('admin_menu', 'weblizar_admin_menu_pannel');  
function weblizar_admin_menu_pannel() {
	$page = add_theme_page( 'Weblizar', 'Theme Options', 'edit_theme_options', 'weblizar', 'weblizar_option_panal_function' ); 
 	add_action('admin_print_styles-'.$page, 'weblizar_admin_enqueue_script');
	
 } 
 /**
 * Weblizar Admin Menu CSS
 */
function weblizar_admin_enqueue_script() {		
	wp_enqueue_script('bootstrap-op', WL_TEMPLATE_DIR_URI .'/js/bootstrap.js',array('jquery'));	
	wp_enqueue_script('weblizar-tab-js', WL_TEMPLATE_DIR_URI .'/core/theme-options/js/option-js.js',array('media-upload', 'jquery-ui-sortable'));	
	
	wp_enqueue_style('thickbox');
	wp_enqueue_style('dashicons');		
	wp_enqueue_style('weblizar-option-style', WL_TEMPLATE_DIR_URI .'/core/theme-options/css/weblizar-option-style.css');
	wp_enqueue_style('op-bootstrap', WL_TEMPLATE_DIR_URI.'/css/bootstrap.css');
	wp_enqueue_style('weblizar-bootstrap-responsive', WL_TEMPLATE_DIR_URI .'/core/theme-options/css/bootstrap-responsive.css');
	wp_enqueue_style('font-awesome-op', WL_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.css');
	wp_enqueue_style('Respo-pricing-table', WL_TEMPLATE_DIR_URI .'/core/theme-options/css/pricing-table-responsive.css');
	wp_enqueue_style('pricing-table', WL_TEMPLATE_DIR_URI .'/core/theme-options/css/pricing-table.css');
}
/**
 * Weblizar Theme Option Form
 */
function weblizar_option_panal_function() { 
$theme_name = "Dash-Pro"; 
$get_theme= "Get Our Premium Theme" ;
$purchase = "http://weblizar.com/themes/guardian-premium-theme/" ;?>	
	<div class="wrap" id="weblizar_wrap" >		
		<div class="wbl-notify" id="wbl-notify">
			<div class="col-md-12">
				<div class="col-md-3">
					<h1 style="text-decoration:underline"><?php echo $theme_name; ?></h1>
					<h3 style="margin-top:30px;text-decoration:underline"><?php echo $get_theme; ?></h3>
				</div>
				
				<div class="col-md-3" style="padding-top:20px; text-align:right;">
					<a style="margin-bottom:20px" href="<?php echo $purchase; ?>" target="blank" class="btn btn-success btn-lg"><?php _e('View Dash Pro Demo','weblizar'); ?> </a>
					<a href="<?php echo $purchase; ?>" target="_blank" class="btn btn-danger btn-lg" ><?php _e('Upgrade to Dash Pro','weblizar'); ?></a>
				</div>
				<div class="col-md-3">
				<h3 style="margin-top:5px;margin-left: 40px;text-decoration:underline"><?php _e('Features','weblizar'); ?></h3>
					<ul>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('Responsive Design','weblizar'); ?> </li>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('More than 15+ Templates','weblizar'); ?> </li>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('12 types Themes Colors Scheme','weblizar'); ?>  </li>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('Patterns Background','weblizar'); ?>   </li>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('Full Width & Boxed Layout','weblizar'); ?>  </li>
					</ul>
				</div>
				<div class="col-md-3">
					
					<ul style="padding-top:20px">
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('Touch Slider','weblizar'); ?>  </li>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('Ultimate Portfolio layout with Isotope effect','weblizar'); ?> </li>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('Rich Short codes','weblizar'); ?> </li>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('Translation Ready','weblizar'); ?> </li>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('Coming Soon Mode','weblizar'); ?>  </li>
						<li style="float:none;margin-left: 40px;"> <div class="dashicons dashicons-yes"></div> <?php _e('Google Fonts','weblizar'); ?>  </li>
						
					</ul>
				</div>				
			</div>
		</div><h2><span></span></h2>
		<div id="content_wrap">			
			<div class="weblizar-header" >
				<h2><span><?php _e('Dash Theme Settings','weblizar'); ?></span></h2>			
				<div class="weblizar-submenu-links" id="weblizar-submenu-links">
					<ul>
						<li class=""> <div class="dashicons dashicons-format-chat" > </div> <a href="http://wordpress.org/support/theme/guardian/" target="_blank" title="Support Forum"><?php _e('Support Forum','weblizar'); ?></a></li>
						<li class=""> <div class="dashicons dashicons-welcome-write-blog"></div> <a href="<?php echo get_template_directory_uri() . '/changelog.txt'?>" target="_blank" title="Theme Changelog"><?php _e('View Changelog','weblizar'); ?></a></li>      
					</ul>
				</div>			
			</div>		
			<div id="content">
				<div id="options_tabs" class="ui-tabs ">
					<ul class="options_tabs ui-tabs-nav" role="tablist" id="nav">					
						<li class="active">
						<a href="#" id="general"><div class="dashicons dashicons-admin-home"></div><?php _e('Home Option','weblizar');?></a>
						<ul>
							<li class="currunt" ><a href="#" class="ui-tabs-anchor" id="general"><?php _e('General Option','weblizar');?> </a></li>
							<li><a href="#"  id="home-image"><?php _e('Slide show Option','weblizar');?></a></li>								
							<li><a href="#"  id="home-service"><?php _e('Service Option','weblizar');?></a></li>
						</ul>
						</li>					
						<li><a href="#" id="social"><div class="dashicons dashicons-twitter"></div><?php _e('Social Media','weblizar');?></a></li>
						<li><a href="#" id="footer"><div class="dashicons dashicons-media-text"></div><?php _e('Footer Option','weblizar');?></a></li>
						<li ><a href="#" id="getpro" style="background-color: #141414;color: #F8F3F3;"><div class="dashicons dashicons-cart"></div><?php _e('Get Premium','weblizar');?></a></li>
						<li ><a href="#" id="ourproduct" ><div class="dashicons dashicons-plus"></div><?php _e('More Products','weblizar');?></a></li>
					</ul>					
					<!-- Option Data saving -->
					<?php $data = get_template_directory() . '/core/theme-options/option-data.php';
					require_once $data; ?>
					<!-- Option Settings form -->
					<?php $settings = get_template_directory() . '/core/theme-options/option-settings.php';
					require_once $settings; ?>					
				</div>		
			</div>
			<div class="weblizar-header" style="margin-top:0px; border-radius: 0px 0px 6px 6px;">			
				<div class="weblizar-submenu-links" style="margin-top:15px;">
				<form method="POST">
					<input type="submit" onclick="return confirm( 'Click OK to reset theme data. Theme settings will be lost!' );" value="Restore All Defaults" name="restore_all_defaults" id="restore_all_defaults" class="button">
				<form>
				</div><!-- weblizar-submenu-links -->
			</div>
			<div class="clear"></div>
		</div>
	</div>
<?php
	// Restore all defaults
	if(isset($_POST['restore_all_defaults'])) {
		$weblizar_theme_options = save_wl_default_settings();	
		update_option('guardian_options',$weblizar_theme_options);
	}
}
?>
