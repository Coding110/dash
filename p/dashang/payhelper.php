<?php

/*
 *	Process for payment
 */

include_once( dirname( __FILE__ ) . '/dashdata.php' );


function rewarding()
{
	echo "<h3>正在为您跳转到支付宝，请稍等...</h3>";
	$_POST['WIDout_trade_no'] = "100001";
	$_POST['WIDsubject'] = "云打赏(www.dashangcloud.com)";
	if(isset($_POST['alipay'])){
		$_POST['WIDprice'] = $_POST['alipay'];
	}else{
		$_POST['WIDprice'] = 10;
	}
	include("alipay/create_partner_trade_by_buyer/alipayapi.php");
}

function alipay_return()
{
}

function alipay_notify()
{
}
