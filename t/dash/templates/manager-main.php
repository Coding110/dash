<?php

$nav = "code";
if(isset($_REQUEST['nav'])){
	$nav = $_REQUEST['nav'];
}

if($nav == "code"){
	// 生成代码
	require("manager-codes.php");
}else if($nav == "link"){
	// 生成链接
	require("manager-links.php");
}else if($nav == "profile"){
	// 用户基本信息和支付帐号
	if(!is_user_logged_in()){ 
		//auth_redirect();
		wp_redirect( wp_login_url("http://".$_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"]) ); exit; 
	}else{
		require("manager-profile.php");
	}
}else{
	echo "404";
}

?>
