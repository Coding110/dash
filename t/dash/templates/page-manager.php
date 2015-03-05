<?php //Template Name: Manager Page 
	get_header(); 
	require("manager-breadcrumbs.php");
?>
<div class="left_sidebar">
<?php 
	// check if user login
	if(!is_user_logged_in()){ 
		echo "Not login";
	}else{
		$current_user = wp_get_current_user(); 
		echo "login, ".$current_user->user_login;;
	}
?>

<div class="list-group" style="width:40%;min-width:120px;text-align:center;">
  <a href="<?php echo home_url();?>/manager/?nav=code" class="list-group-item">生成打赏代码</a>
  <a href="<?php echo home_url();?>/manager/?nav=link" class="list-group-item">生成打赏链接</a>
  <a href="<?php echo home_url();?>/manager/?nav=profile" class="list-group-item">基本设置</a>
</div>
</div>

<div class="content_left">
	<?php require("manager-main.php");?>
</div>

<?php get_footer(); ?>
