<?php //Template Name: Manager Page 
	$nav = "code";
	if(isset($_REQUEST['nav'])){
		$nav = $_REQUEST['nav'];
	}
	// check if user login when profile
	if(!is_user_logged_in() and $nav == "profile" ){ 
		//auth_redirect();
		wp_redirect( wp_login_url("http://".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]) ); exit; 
	}else{
		//$current_user = wp_get_current_user(); 
		get_header(); 
		require("manager-breadcrumbs.php");
	}
?>

<div class="left_sidebar">
		<div class="list-group manager-slidebar">
		  <a href="<?php echo home_url();?>/manager/?nav=code" class="list-group-item">打赏代码</a>
		  <a href="<?php echo home_url();?>/manager/?nav=link" class="list-group-item">打赏链接</a>
		  <a href="<?php echo home_url();?>/manager/?nav=profile" class="list-group-item">收赏帐号</a>
		</div>
</div>

<div class="content_left">
	<?php require("manager-main.php");?>
</div>

<?php get_footer(); ?>
