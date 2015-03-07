<!doctype html>
<!--[if IE 7 ]>    <html lang="en-gb" class="isie ie7 oldie no-js"> <![endif]-->
<!--[if IE 8 ]>    <html lang="en-gb" class="isie ie8 oldie no-js"> <![endif]-->
<!--[if IE 9 ]>    <html lang="en-gb" class="isie ie9 no-js"> <![endif]-->
<!--[if (gt IE 9)|!(IE)]><!--> <html lang="en-gb" class="no-js"> <!--<![endif]-->
<html <?php language_attributes(); ?>>
<head>
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">  
    <meta http-equiv="Content-Type" content="<?php bloginfo('html_type'); ?>" charset="<?php bloginfo('charset'); ?>" /> 
	<?php $wl_theme_options = weblizar_get_options(); ?>
	<?php if($wl_theme_options['upload_image_favicon']!=''){ ?>
	<link rel="shortcut icon" href="<?php  echo $wl_theme_options['upload_image_favicon']; ?>" /> 
	<?php } ?>
	<link rel="stylesheet" href="<?php echo get_stylesheet_uri(); ?>" type="text/css" media="screen" />
	<?php wp_head(); ?> 
	<script type="text/javascript" src="/wp-content/themes/dash/js/dash.js"></script>
	<link rel="stylesheet" href="/wp-content/themes/dash/css/dash.css" type="text/css" />
</head>

<body <?php body_class(); ?>>
<div>
<header id="header">
	<!-- Top header bar -->
	<div id="topHeader">
		<div class="wrapper">         
			<div class="top_nav">
				<div class="container">					
					<div class="right">	<!--<img src="<?php //header_image(); ?>" height="<?php //echo get_custom_header()->height; ?>" width="<?php //echo get_custom_header()->width; ?>" alt="" />	-->			
						<ul> <?php if($wl_theme_options['contact_email']!=''){ ?>           	
							<li><a href="mailto:<?php echo esc_url($wl_theme_options['contact_email']); ?>"><i class="fa fa-envelope"></i> <?php echo $wl_theme_options['contact_email']; ?></a></li> <?php } ?>
							<?php if($wl_theme_options['contact_phone_no']!=''){ ?> 
							<li><i class="fa fa-phone"></i> + <?php echo $wl_theme_options['contact_phone_no']; ?></li>
							<?php } ?>
							<?php if($wl_theme_options['header_section_social_media_enbled'] =='on'){ 
								if($wl_theme_options['facebook_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['facebook_link']); ?>"><i class="fa fa-facebook"></i></a></li>
								<?php }  if($wl_theme_options['twitter_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['twitter_link']); ?>"><i class="fa fa-twitter"></i></a></li>
								<?php }  if($wl_theme_options['google_plus']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['google_plus']); ?>"><i class="fa fa-google-plus"></i></a></li>
								<?php }  if($wl_theme_options['linkedin_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['linkedin_link']); ?>"><i class="fa fa-linkedin"></i></a></li>
								<?php }  if($wl_theme_options['flicker_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['flicker_link']); ?>"><i class="fa fa-flickr"></i></a></li>
								<?php }  if($wl_theme_options['youtube_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['youtube_link']); ?>"><i class="fa fa-youtube"></i></a></li>
								<?php }  if($wl_theme_options['rss_link']!=''){  ?>
								<li><a href="<?php echo esc_url($wl_theme_options['rss_link']); ?>"><i class="fa fa-rss"></i></a></li>
								<?php } 
							}	?>
							<?php if($wl_theme_options['header_section_login_enbled'] =='on'){ 
								if(is_user_logged_in()){ 
									$current_user = wp_get_current_user(); 
								?>
									<li><a href="#"><?php echo $current_user->user_login; ?></a></li>
									<li><a href="<?php wp_logout(); ?>">退出</a></li>
								<?php }else{ ?>
									<li><a href="<?php echo wp_login_url("http://".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]); ?>">登录</a></li>
									<li><a href="<?php echo wp_registration_url(); ?>">注册</a></li>
							<?php } 
							}	?>
							</ul>					
					</div><!-- end right social links -->			
				</div>
			</div>            
		</div>    
	</div><!-- end top navigation --> 
	
	<div id="trueHeader">    
		<div class="wrapper">    
			<div class="container">    
				<!-- Logo -->
				<div class="logo">
					<a href="<?php echo home_url( '/' ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home" id="logo" >
						<?php 
						if($wl_theme_options['text_title'] == "on")
						{ echo get_bloginfo('name'); }
						else if($wl_theme_options['upload_image_logo']!='') 
						{ ?>
						<img src="<?php echo $wl_theme_options['upload_image_logo']; ?>" style="height:<?php if($wl_theme_options['height']!='') { echo $wl_theme_options['height']; }  else { "50"; } ?>px; width:<?php if($wl_theme_options['width']!='') { echo $wl_theme_options['width']; }  else { "180"; } ?>px;" />
						<?php } else { ?> 
							<?php bloginfo( 'title' ); ?>
						<?php } ?>
					</a>
				</div>
				<!-- Menu -->
				<div class="menu_main">				
					<div class="navbar yamm navbar">
					<div class="container">
							<div class="navbar-header">
								<div class="navbar-toggle .navbar-collapse .pull-right " data-toggle="collapse" data-target="#navbar-collapse-1"  > <span>Menu</span>
									<button type="button" ><i class="fa fa-bars"></i></button>
								</div>
							</div>
							<!-- /Navigation  menus -->
						<div id="navbar-collapse-1" class="navbar-collapse collapse pull-right">  
						<?php
								wp_nav_menu( array(  
										'theme_location' => 'primary',
										'container'  => '',
										'menu_class' => 'nav navbar-nav',
										'fallback_cb' => 'weblizar_fallback_page_menu',
										'walker' => new weblizar_nav_walker()
										)
									);	
								?>	
						</div>		
					 </div>
					 </div>			 
				</div><!-- end menu -->				
			</div>			
		</div>    
	</div>    
</header>
<div class="clearfix"></div>
