<?php        
/*	*Theme Name	: Dash
	*Text Domain: dash
	*Theme Core Functions and Codes
*/
	/**Includes required resources here**/
	define('WL_TEMPLATE_DIR_URI', get_template_directory_uri());
	define('WL_TEMPLATE_DIR', get_template_directory());
	define('WL_TEMPLATE_DIR_CORE' , WL_TEMPLATE_DIR . '/core');
	define('gr_td' , 'weblizar');
	
	require( WL_TEMPLATE_DIR_CORE . '/menu/default_menu_walker.php' ); // for Default Menus
	require( WL_TEMPLATE_DIR_CORE . '/menu/weblizar_nav_walker.php' ); // for Custom Menus	
	require( WL_TEMPLATE_DIR_CORE . '/comment-function.php' );	
	require( WL_TEMPLATE_DIR_CORE . '/customs/flickr-widget.php' );	
	//Sane Defaults
	function weblizar_default_settings()
{	//$ImageUrl = WL_TEMPLATE_DIR_URI ."/images/slide-1.jpg";
	//$ImageUrl2 = WL_TEMPLATE_DIR_URI ."/images/slide-2.jpg";
	//$ImageUrl3 = WL_TEMPLATE_DIR_URI ."/images/slide-3.jpg";
	$ImageUrl = WL_TEMPLATE_DIR_URI ."/images/s4-2.jpg";
	$ImageUrl0 = WL_TEMPLATE_DIR_URI ."/images/s5-1.jpg";
	//$ImageUrl = "";
	//$ImageUrl0 = "";
	//$ImageUrl2 = "";
	//$ImageUrl3 = "";
	return $theme_options=array(
			//Logo and Fevicon header			
			'upload_image_logo'=>'/static/ds-logo-1.2.png',
			'height'=>'50',
			'width'=>'50',
			'text_title'=>'on',
			'upload_image_favicon'=>'/static/ds-logo-1.2-64.png',
			'custom_css'=>'on',
			'_frontpage' => 'on',
			'blog_title' =>'Our Latest Blog',
			
			'slide_image' => $ImageUrl,
			'slide_title' => '云打赏',
			'slide_desc' => '一行代码让您的网站支持打赏，一个链接让您在任何地方支持打赏，享受原创的价值！',
			'slide_btn_text' => 'More',
			'slide_btn_link' => '#',
			
			'slide_image_0' => $ImageUrl0,
			'slide_title_0' => '云打赏',
			'slide_desc_0' => '支付宝与微信支付让您的读者轻松支付，我们让您收取打赏更简单。',
			'slide_btn_text_0' => 'More',
			'slide_btn_link_0' => '#',
			
			'slide_image_1' => $ImageUrl2,
			'slide_title_1' => '支付',
			'slide_desc_1' => '支付宝与微信支付让您的读者轻松支付，我们让您收取打赏更简单。',
			'slide_btn_text_1' => 'More',
			'slide_btn_link_1' => '#',
			
			'slide_image_2' => $ImageUrl3,
			'slide_title_2' => '保护原创',
			'slide_desc_2' => '推动互联网文明发展，其实每个人都在努力。',
			'slide_btn_text_2' => 'More',
			'slide_btn_link_2' => '#',
			
			//Service
			'home_service_title'=>'打赏方式',
			'home_service_description'=>'支持多种方式接入打赏功能，适应更多场景。',
			
			'service_1_title'=>"网站",
			'service_1_icons'=>"fa fa-laptop",
			'service_1_text'=>"如果您拥有自己的网站，一行代码就可以让您的网站实现打赏，让您的原创为您带来价值。",
			'service_1_link'=>"/manager/?nav=code",
			
			'service_2_title'=>"WAP",
			'service_2_icons'=>"fa fa-weixin",
			'service_2_text'=>"微博/微信的分享网页、WAP网站，一行代码或一个链接可以实现打赏，让赞同您的人有所为。",
			'service_2_link'=>"/manager/?nav=code",
			
			'service_3_title'=>"博客",
			'service_3_icons'=>"fa fa-pencil-square-o",
			'service_3_text'=>"如果您依然混迹各种博客里，一个图文链接依然可以让粉丝们打赏您的佳作。",
			'service_3_link'=>"/manager/?nav=link",
			
			'service_4_title'=>"支付",
			'service_4_icons'=>"fa fa-mobile",
			'service_4_text'=>"支持支付宝和微信支付，支付从来都很简单，就看您在我心中有多重要。",
			'service_4_link'=>"/manager/?nav=profile",
			
			
			//call out
			'call_out_text' =>'Yepp! This is just a design for your awesome website and i am sure you gona love',			
			'call_out_link'=>'#',
			'call_out_button_text'=>'Purchase Now!',
			'call_out_button_target'=>'on',
			
			
			//Social media links
			'contact_email'=>'',
			'contact_phone_no'=>'',
			'header_section_social_media_enbled'=>'off',
			'footer_section_social_media_enbled'=>'on',
			
			'twitter_link' => "https://twitter.com/",
			'facebook_link' => "https://facebook.com",
			'linkedin_link' => "http://linkedin.com/",
			'google_plus' => "https://plus.google.com/",
			'flicker_link' => "https://www.flickr.com/",
			'youtube_link' => "https://www.youtube.com/",
			'rss_link' => "https://www.rss.com/",
			
			'header_section_login_enbled'=>'on',
			
			//footer customization 
			'footer_customizations' => 'Copyright @ 2015 <a href="http://www.dashangcloud.com">云打赏</a>（<a href="http://www.dashangcloud.com">Dashang Cloud</a>）京ICP备14053565号-2',
			'developed_by_text' => '',
			'developed_by_weblizar_text' => '',
			'developed_by_link' => 'http://www.becktu.com/',
			
			'terms_of_use_text' =>'Terms of Use',
			'terms_of_use_link' =>'#',
			
			'Privacy_policy_text' =>'Privacy Policy',
			'Privacy_policy_link' =>'#',
		);
		return apply_filters( 'guardian_options', $wl_theme_options );
}
	function weblizar_get_options() {
    // Options API
    return wp_parse_args( 
        get_option( 'guardian_options', array() ), 
        weblizar_default_settings() 
    );    
	}
	require( WL_TEMPLATE_DIR . '/core/theme-options/option-panel.php' ); // for Options Panel	
	/*After Theme Setup*/
	add_action( 'after_setup_theme', 'wl_setup' ); 	
	function wl_setup()
	{	
		global $content_width;
		//content width
		if ( ! isset( $content_width ) ) $content_width = 630; //px
	
		// Load text domain for translation-ready
		load_theme_textdomain( 'dash', WL_TEMPLATE_DIR_CORE . '/lang' );	
		add_theme_support( 'title-tag' );
		add_theme_support( 'post-thumbnails' ); //supports featured image
		// This theme uses wp_nav_menu() in one location.
		register_nav_menu( 'primary', __( 'Primary Menu', 'dash' ) );
		// theme support 	
		add_theme_support( 'automatic-feed-links'); 
		$args = array('default-color' => 'fff',);
		add_theme_support( 'custom-background', $args);
		$args_h = array(		
		'uploads'       => true,
		);
		add_theme_support( 'custom-header', $args_h );
		add_editor_style( 'custom-editor-style.css' );
		require_once('guardian-default-settings.php');
			
		
	/*==================
	* Crop image for blog
	* ==================*/	
		//About-Us Post Thumb
		add_image_size('about_post_thumb',1140, 380,true);
		//Blogs thumbs
		add_image_size('home_post_thumb',360,180,true);	
		add_image_size('wl_page_thumb',730,350,true);
		add_image_size('wl_pageff_thumb',1170,350,true);
		add_image_size('small_thumbs',1170,520,true); //2-Column
		add_image_size('recent_blog_img',64,64,true);
	
	}
	if ( ! function_exists( 'wl_render_title' ) ) :
	function wl_render_title() {
?>
	<meta content="云打赏, 打赏" name="keywords">
	<meta content="一行代码让您的网站支持打赏，一个链接让您在任何地方实现打赏，让我们一起保护原创！" name="description">
<?php
	}
	add_action( 'wp_head', 'wl_render_title' );
endif;

	// Read more tag to formatting in blog page 
	function weblizar_content_more($more)
	{  global $post;							
	   return '<a href="'.get_permalink().'">read more...</a>';
	}   
	add_filter( 'the_content_more_link', 'weblizar_content_more' );
	
	
	// Replaces the excerpt "more" text by a link
	function new_excerpt_more($more) {
       global $post;
	return '';
	}
	add_filter('excerpt_more', 'new_excerpt_more');
	
	/*
	* Weblizar widget area
	*/
	add_action( 'widgets_init', 'weblizar_widgets_init');
	
	function weblizar_widgets_init() {
	register_widget('wl_flickr_widget');
	/*sidebar*/
	register_sidebar( array(
			'name' => __( 'Sidebar', 'dash' ),
			'id' => 'sidebar-primary',
			'description' => __( 'The primary widget area', 'dash' ),
			'before_widget' => '<div class="sidebar_widget">',
			'after_widget' => '</div><div class="clearfix margin_top3"></div>',
			'before_title' => '<div class="sidebar_title"><h4>',
			'after_title' => '</h4></div>'
		) );
	/* manager sidebar*/
	register_sidebar( array(
			'name' => __( 'Manger-nav', 'dash' ),
			'id' => 'sidebar-mge-nav',
			'description' => __( 'Manager navigation area', 'dash' ),
			'before_widget' => '<div class="sidebar-mge-nav">',
			'after_widget' => '</div><div class="clearfix margin_top"></div>',
			'before_title' => '<div class="sidebar_title"><h4>',
			'after_title' => '</h4></div>'
		) );
	/** footer widget area **/
	register_sidebar( array(
			'name' => __( 'Footer Widget Area', 'dash' ),
			'id' => 'footer-widget-area-ext',
			'description' => __( 'footer widget area', 'dash' ),
			'before_widget' => '<div class="one_fourth animate fadeInUp" data-anim-type="fadeInUp"><div class="qlinks">',
			'after_widget' => '</div></div>',
			'before_title' => '<h4 class="lmb">',
			'after_title' => '</h4>',
		) );             
	}
	
	/*==================
	* Dash theme css and js
	* ==================*/
	function weblizar_scripts()
	{	
		// Google fonts 	
		//wp_enqueue_style('OpenSans', '//fonts.googleapis.com/css?family=Open+Sans:300,300italic,400,400italic,600,600italic,700,700italic,800,800italic');
		//wp_enqueue_style('Raleway', '//fonts.googleapis.com/css?family=Raleway:100,200,300,400,500,600,700,800,900');		
		wp_enqueue_style('font-awesome', WL_TEMPLATE_DIR_URI . '/css/font-awesome/css/font-awesome.css');
		wp_enqueue_style('responsive-leyouts', WL_TEMPLATE_DIR_URI . '/css/responsive-leyouts.css');
		wp_enqueue_style('mainmenu-bootstrap', WL_TEMPLATE_DIR_URI . '/css/bootstrap.css');		
		wp_enqueue_style('mainmenu-menu', WL_TEMPLATE_DIR_URI . '/css/menu.css');
		wp_enqueue_style('mainmenu-sticky', WL_TEMPLATE_DIR_URI . '/css/sticky.css');
		wp_enqueue_style('reset', WL_TEMPLATE_DIR_URI . '/css/reset.css');		
		// carousel Slider
		wp_enqueue_style('carousel-style', WL_TEMPLATE_DIR_URI . '/css/carousel.css');		
		// Js
		wp_enqueue_script('bootstrap-js', WL_TEMPLATE_DIR_URI .'/js/bootstrap.js',array('jquery'));	
		if ( is_singular() ) wp_enqueue_script( "comment-reply" ); 	
	}
	add_action('wp_enqueue_scripts', 'weblizar_scripts');
	
	//code for image resize for according to image layout
	add_filter( 'intermediate_image_sizes', 'weblizar_image_presets');
	function weblizar_image_presets($sizes){
		$type = get_post_type($_REQUEST['post_id']);	
		foreach($sizes as $key => $value){
			if($type=='post' && $value != 'home_post_thumb' && $value != 'small_thumbs' && $value != 'recent_blog_img' )
			{ unset($sizes[$key]);  }
			elseif($type=='page' && $value != 'about_post_thumb' && $value != 'wl_page_thumb' && $value != 'wl_pageff_thumb')
			{ unset($sizes[$key]);  }
		}
		return $sizes;	 
	}
	
	/*==================
	* Add Class Gravtar
	* ==================*/
	add_filter('get_avatar','weblizar_gravatar_class');

	function weblizar_gravatar_class($class) {
    $class = str_replace("class='avatar", "class='author_detail_img", $class);
    return $class;
	}
	
	
	/*===================================================================================
	* Paginated Posts
	* =================================================================================*/
	function weblizar_link_pages($args = '') {
        $defaults = array(
                'before' => '' . __('Pages:','dash'), 'after' => '',
                'link_before' => '', 'link_after' => '',
                'next_or_number' => 'number', 'nextpagelink' => __('Next page','dash'),
                'previouspagelink' => __('Previous page','dash'), 'pagelink' => '%',
                'echo' => 1
        );

        $r = wp_parse_args( $args, $defaults );
        $r = apply_filters( 'wp_link_pages_args', $r );
        extract( $r, EXTR_SKIP );

        global $page, $numpages, $multipage, $more, $pagenow;
        $output = '';
        if ( $multipage ) {
                if ( 'number' == $next_or_number ) {
                        $output .= $before;
                        for ( $i = 1; $i < ($numpages+1); $i = $i + 1 ) {
                                $j = str_replace('%',$i,$pagelink);
                                $output .= ' ';
                                if ( ($i != $page) || ((!$more) && ($page==1)) ) {
                                        $output .= _wp_link_page($i);
                                } elseif ( $i == $page ) {
                                    $output .= '<a class="active" href="#">';
                                }
                                $output .= $link_before . $j . $link_after;
                                if ( ($i != $page) || ( $i == $page ) || ((!$more) && ($page==1)) )
                                        $output .= '</a>';
                        }
                        $output .= $after;
                } else {
                        if ( $more ) {
                                $output .= $before;
                                $i = $page - 1;
                                if ( $i && $more ) {
                                        $output .= _wp_link_page($i);
                                        $output .= $link_before. $previouspagelink . $link_after . '</a>';
                                }
                                $i = $page + 1;
                                if ( $i <= $numpages && $more ) {
                                        $output .= _wp_link_page($i);
                                        $output .= $link_before. $nextpagelink . $link_after . '</a>';
                                }
                                $output .= $after;
                        }
                }
        }

        if ( $echo )
                echo $output;

        return $output;
	}
	/****--- Navigation for Author, Category , Tag , Archive ---***/	
	function weblizar_navigation() { ?>
	<nav id="wblizar_nav"> 
		<span class=""><?php posts_nav_link(' -- ', 'Newer Posts', 'Older Posts'); ?></span> 
	</nav><?php
	}	
	
	/****--- Navigation for Single ---***/
	function weblizar_navigation_posts(){ ?>	
	<nav id="wblizar_nav">
		<span class="nav-previous"><?php previous_post_link('&laquo; %link'); ?></span>
		<span class="nav-next"><?php next_post_link('%link &raquo;'); ?></span> 
	</nav><?php 
	}
	/* Breadcrumbs  */
	function weblizar_breadcrumbs() {
    $delimiter = '';
    $home = 'Home'; // text for the 'Home' link
    $before = ''; // tag before the current crumb
    $after = ''; // tag after the current crumb
    echo '<div class="pagenation">';
    global $post;
    //$homeLink = home_url();
    //echo '<a href="' . $homeLink . '">' . $home . '</a> <i>/</i>' . $delimiter . ' ';
    if (is_category()) {
        global $wp_query;
        $cat_obj = $wp_query->get_queried_object();
        $thisCat = $cat_obj->term_id;
        $thisCat = get_category($thisCat);
        $parentCat = get_category($thisCat->parent);
        if ($thisCat->parent != 0)
            echo(get_category_parents($parentCat, TRUE, ' ' . $delimiter . ' '));
        echo $before . 'Archive by category "' . single_cat_title('', false) . '"' . $after;
    } elseif (is_day()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <i>/</i> ' . $delimiter . ' ';
        echo '<a href="' . get_month_link(get_the_time('Y'), get_the_time('m')) . '">' . get_the_time('F') . '</a> <i>/</i> ' . $delimiter . ' ';
        echo $before . get_the_time('d') . $after;
    } elseif (is_month()) {
        echo '<a href="' . get_year_link(get_the_time('Y')) . '">' . get_the_time('Y') . '</a> <i>/</i>' . $delimiter . ' ';
        echo $before . get_the_time('F') . $after;
    } elseif (is_year()) {
        echo $before . get_the_time('Y') . $after;
    } elseif (is_single() && !is_attachment()) {
        if (get_post_type() != 'post') {
            $post_type = get_post_type_object(get_post_type());
            $slug = $post_type->rewrite;
            echo '<a href="' . $homeLink . '/' . $slug['slug'] . '/">' . $post_type->labels->singular_name . '</a> <i>/</i> ' . $delimiter . ' ';
            echo $before . get_the_title() . $after;
        } else {
            $cat = get_the_category();
            $cat = $cat[0];
            //echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
            echo $before . get_the_title() . $after;
        }
    } elseif (!is_single() && !is_page() && get_post_type() != 'post') {
        $post_type = get_post_type_object(get_post_type());
		$count_posts = wp_count_posts()->publish;
		if($count_posts != '') {
        echo $before . $post_type->labels->singular_name . $after;
		}
    } elseif (is_attachment()) {
        $parent = get_post($post->post_parent);
        $cat = get_the_category($parent->ID);
        $cat = $cat[0];
        echo get_category_parents($cat, TRUE, ' ' . $delimiter . ' ');
        echo '<a href="' . get_permalink($parent) . '">' . $parent->post_title . '</a> <i>/</i> ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_page() && !$post->post_parent) {
        echo $before . get_the_title() . $after;
    } elseif (is_page() && $post->post_parent) {
        $parent_id = $post->post_parent;
        $breadcrumbs = array();
        while ($parent_id) {
            $page = get_page($parent_id);
            $breadcrumbs[] = '<a href="' . get_permalink($page->ID) . '">' . get_the_title($page->ID) . '</a> <i>/</i>';
            $parent_id = $page->post_parent;
        }
        $breadcrumbs = array_reverse($breadcrumbs);
        foreach ($breadcrumbs as $crumb)
            echo $crumb . ' ' . $delimiter . ' ';
        echo $before . get_the_title() . $after;
    } elseif (is_search()) {
        echo $before . 'Search results for "' . get_search_query() . '"' . $after;
    } elseif (is_tag()) {
        echo $before . 'Posts tagged "' . single_tag_title('', false) . '"' . $after;
    } elseif (is_author()) {
        global $author;
        $userdata = get_userdata($author);
        echo $before . 'Articles posted by ' . $userdata->display_name . $after;
    } elseif (is_404()) {
        echo $before . 'Error 404' . $after;
    }
    if (get_query_var('paged')) {
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ' (';
        //echo __('Page', 'dash') . ' ' . get_query_var('paged');
        if (is_category() || is_day() || is_month() || is_year() || is_search() || is_tag() || is_author())
            echo ')';
    }
    echo '</div>';
	}
	
	
	//PAGINATION
		function weblizar_pagination($pages = '', $range = 2)
{  
     $showitems = ($range * 2)+1;  

     global $paged;
     if(empty($paged)) $paged = 1;

     if($pages == '')
     {
         global $wp_query;
         $pages = $wp_query->max_num_pages;
         if(!$pages)
         {
             $pages = 1;
         }
     }   

     if(1 != $pages)
     {
         echo "<div class='pagination'>";
         if($paged > 2 && $paged > $range+1 && $showitems < $pages) echo "<a href='".get_pagenum_link(1)."'>&lt; Previous</a>";
         if($paged > 1 && $showitems < $pages) echo "<a href='".get_pagenum_link($paged - 1)."'>&lt; Previous;</a>";

         for ($i=1; $i <= $pages; $i++)
         {
             if (1 != $pages &&( !($i >= $paged+$range+1 || $i <= $paged-$range-1) || $pages <= $showitems ))
             {
                echo ($paged == $i)? "<a class='current'>".$i."</a>":"<a href='".get_pagenum_link($i)."'>".$i."</a>";
             }
         }

         if ($paged < $pages && $showitems < $pages) echo "<a href='".get_pagenum_link($paged + 1)."'>Next ></a>";  
         if ($paged < $pages-1 &&  $paged+$range-1 < $pages && $showitems < $pages) echo "<a  href='".get_pagenum_link($pages)."'>Next ></a>";
         echo "</div>";
     }
}

add_filter('show_admin_bar', '__return_false');
?>
