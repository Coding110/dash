<?php

/*
 *	Process for payment
 */

include_once( dirname( __FILE__ ) . '/dashhelper.php' );


// get_browser function can parse user-agent string

function rewarding($ds_key)
{
	// get id, user_id and dashang money from DASH_URL_INFO_TABLE
	$ds_info = get_base_info_for_dash($ds_key);
	if($ds_info == null){
		echo "<h3>".__('Illegal Request!', 'dash')."</h3>";
		return;
	}
	
	detect_device();
	//return;

	echo "<h3>正在为您跳转到支付宝，请稍等...</h3>";
	$_POST['WIDsubject'] = "云打赏(www.dashangcloud.com)";
	// WIDout_trade_no is the id of DASH_TRANSFER_RECORDS_TABLE
	$_POST['WIDseller_email'] = "dashangcloud@163.com";
	//订单描述
	$_POST['WIDbody'] = "您正在使用云打赏(www.dashangcloud.com)，请务必确认您打赏的对象是原创的和合法的。";
    //商品展示地址
	$_POST['WIDshow_url'] = "http://www.dashangcloud.com/";
	if(isset($_POST['alipay'])){
		//$_POST['WIDprice'] = $_POST['alipay'];
		$_POST['WIDtotal_fee'] = $_POST['alipay'];
	}else{
		//$_POST['WIDprice'] = $ds_info->default_money;
		$_POST['WIDtotal_fee'] = $ds_info->default_money;
	}

	// new dashang history record
	$record = array(
				'dash_id' => $ds_info->id, 
				'pay_type' => "alipay", 
				'dash_money' => floatval($_POST['WIDtotal_fee']), 
				'referer' => $_SERVER['HTTP_REFERER']
			);
	$dsid = new_dash_record($ds_info->user_id, $record);
	$_POST['WIDout_trade_no'] = $dsid;
	//echo $dsid;

	include("alipay/create_direct_pay_by_user/alipayapi.php");
	//include("alipay/alipay_wap_create_direct_pay_by_user/alipayapi.php");
}

function alipay_return()
{
	// return page after payment.
	require_once("alipay/create_direct_pay_by_user/alipay.config.php");
	require_once("alipay/create_direct_pay_by_user/lib/alipay_notify.class.php");
	//require_once("alipay/alipay_wap_create_direct_pay_by_user/alipay.config.php");
	//require_once("alipay/alipay_wap_create_direct_pay_by_user/lib/alipay_notify.class.php");

	$alipayNotify = new AlipayNotify($alipay_config);
	$verify_result = $alipayNotify->verifyReturn();
	if($verify_result) {//验证成功
		//商户订单号
		$out_trade_no = $_GET['out_trade_no'];
	
		//支付宝交易号
		$trade_no = $_GET['trade_no'];
	
		//交易状态
		$trade_status = $_GET['trade_status'];
	
	    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
			update_dash_record($out_trade_no, $trade_no, DS_PAY_SUCCESS);
	    }
	    else {
	      //echo "trade_status=".$_GET['trade_status'];
	    }
		dslog('INFO', "alipay notify, trade no: $out_trade_no, pay trade no: $trade_no, trade status: $trade_status");
		//echo "验证成功<br />";
	}
	else {
		dslog('ERROR', "verify failed of alipay return.");
	    //echo "验证失败";
	}
	header('Location: http://www.dashangcloud.com/');

}

function alipay_notify()
{
	require_once("alipay/create_direct_pay_by_user/alipay.config.php");
	require_once("alipay/create_direct_pay_by_user/lib/alipay_notify.class.php");
	//require_once("alipay/alipay_wap_create_direct_pay_by_user/alipay.config.php");
	//require_once("alipay/alipay_wap_create_direct_pay_by_user/lib/alipay_notify.class.php");
	
	// compute notify verify
	$alipayNotify = new AlipayNotify($alipay_config);
	$verify_result = $alipayNotify->verifyNotify();
	
	if($verify_result) {// verify success
		
		//商户订单号
		$out_trade_no = $_POST['out_trade_no'];
	
		//支付宝交易号
		$trade_no = $_POST['trade_no'];
	
		//交易状态
		$trade_status = $_POST['trade_status'];
	
		// 还不知道这两个状态是否有影响，暂且认为都支付成功
	    if($trade_status == 'TRADE_FINISHED') {
			update_dash_record($out_trade_no, $trade_no, DS_PAY_SUCCESS);
	    }
	    else if ($trade_status == 'TRADE_SUCCESS') {
			update_dash_record($out_trade_no, $trade_no, DS_PAY_SUCCESS);
	    }
	        
		dslog('INFO', "alipay notify, trade no: $out_trade_no, pay trade no: $trade_no, trade status: $trade_status");
		echo "success";		//请不要修改或删除
	}
	else {
		dslog('ERROR', "verify failed of alipay notify.");
	    echo "fail";
	}
}

/*
 *	detect if the device is iphone, Android phone, pad or PC? And wap, web, weixin, weibo?
 *	
 */
function detect_device()
{
	$ua = $_SERVER['HTTP_USER_AGENT'];
	//error_log("[user agent] ".$ua);
}
