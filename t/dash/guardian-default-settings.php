<?php
$wl_theme_options = weblizar_get_options();
// General Settings
function reset_general_setting()
{	
	$wl_theme_options = get_option('guardian_options');
	
	$wl_theme_options['upload_image_logo']="";
	$wl_theme_options['height']=55;
	$wl_theme_options['width']=150;
	$wl_theme_options['upload_image_favicon']="";
	$wl_theme_options['text_title']="on";			
	$wl_theme_options['custom_css']="";
	$wl_theme_options['blog_title']="Our Latest Blog";	
	
	update_option('guardian_options',$wl_theme_options);
}
function reset_slider_setting(){

	$ImageUrl = WL_TEMPLATE_DIR_URI ."/images/slide-1.jpg";
	$ImageUrl2 = WL_TEMPLATE_DIR_URI ."/images/slide-2.jpg";
	$ImageUrl3 = WL_TEMPLATE_DIR_URI ."/images/slide-3.jpg";

	$wl_theme_options = get_option('guardian_options');
	
	$wl_theme_options['slide_image']= $ImageUrl;
	$wl_theme_options['slide_title']= 'Responsive Theme';
	$wl_theme_options['slide_desc']= 'Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet';
	$wl_theme_options['slide_btn_text']='Read More';
	$wl_theme_options['slide_btn_link']= '#';
		
	$wl_theme_options['slide_image_1']=$ImageUrl2;
	$wl_theme_options['slide_title_1']= 'Custom Layout';
	$wl_theme_options['slide_desc_1']= 'Lorem ipsum dolr sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet';
	$wl_theme_options['slide_btn_text_1']= 'Read More';
	$wl_theme_options['slide_btn_link_1']='#';
		
	$wl_theme_options['slide_image_2']= $ImageUrl3;
	$wl_theme_options['slide_title_2']= 'Touch Slider';
	$wl_theme_options['slide_desc_2']= 'Lorem ipsum dolor sit amet, consectetur adipiscing metus elit. Quisque rutrum pellentesque imperdiet';
	$wl_theme_options['slide_btn_text_2']= 'Read More';
	$wl_theme_options['slide_btn_link_2']= '#';
	
	update_option('guardian_options', $wl_theme_options);
	}

// service
function reset_service_setting()
{
	$wl_theme_options = get_option('guardian_options');
	
	$wl_theme_options['home_service_title'] = 'Our Services';
	$wl_theme_options['home_service_description'] = 'Lorem Ipsum is simply dummy text of the printing and typesetting industry.';
	
	$wl_theme_options['service_1_title'] = "Idea";
	$wl_theme_options['service_1_icons'] = "fa fa-google";
	$wl_theme_options['service_1_text'] = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
	$wl_theme_options['service_1_link'] = "#";
	
	$wl_theme_options['service_2_title'] = "Records";
	$wl_theme_options['service_2_icons'] = "fa fa-database";
	$wl_theme_options['service_2_text'] = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
	$wl_theme_options['service_2_link'] = "#";
	
	$wl_theme_options['service_3_title'] = "WordPress";
	$wl_theme_options['service_3_icons'] = "fa fa-wordpress";
	$wl_theme_options['service_3_text'] = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
	$wl_theme_options['service_3_link'] = "#";
	
	$wl_theme_options['service_4_title'] = "Responsive";
	$wl_theme_options['service_4_icons'] = "fa fa-laptop";
	$wl_theme_options['service_4_text'] = "There are many variations of passages of Lorem Ipsum available, but the majority have suffered alteration in.";
	$wl_theme_options['service_4_link'] = "#";

	update_option('guardian_options', $wl_theme_options);
}



/*
* social Settings
*/
function reset_social_setting()
{	
	$wl_theme_options = get_option('guardian_options');
	
	$wl_theme_options['contact_email']="guardian@gmail.com";
	$wl_theme_options['contact_phone_no']="1 4488 8000 4500";
	
	$wl_theme_options['footer_section_social_media_enbled']="on";
	$wl_theme_options['header_section_social_media_enbled']="on";	
	
	$wl_theme_options['twitter_link']="https://twitter.com/";
	$wl_theme_options['facebook_link']="https://facebook.com/";
	$wl_theme_options['linkedin_link']="https://linkedin.com/";
	$wl_theme_options['google_plus']="https://plus.google.com/";
	$wl_theme_options['youtube_link']="https://youtube.com/";
	$wl_theme_options['rss_link']="https://www.rss.com/";
	$wl_theme_options['flicker_link']="https://www.flickr.com/";
	
	update_option('guardian_options', $wl_theme_options);
}

/*
* footer customizations Settings
*/
function reset_footer_customizations_setting()
{	$wl_theme_options = get_option('guardian_options');
	$wl_theme_options['footer_customizations']="Copyright @ 2014 Guardian.";
	$wl_theme_options['developed_by_text']=" Developed By";
	$wl_theme_options['developed_by_weblizar_text']="Weblizar";
	$wl_theme_options['developed_by_link']="http://weblizar.com/";
	
	$wl_theme_options['terms_of_use_text']='Terms of Use';
	$wl_theme_options['terms_of_use_link']='#';			

	$wl_theme_options['Privacy_policy_text']='Privacy Policy';
	$wl_theme_options['Privacy_policy_link']='#';
	
	update_option('guardian_options', $wl_theme_options);
}
?>
