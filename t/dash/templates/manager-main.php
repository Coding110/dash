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
	require("manager-profile.php");
}else{
	echo "404";
}

?>
