<?php

/*
 *	Process for payment
 */

include_once( dirname( __FILE__ ) . '/dashhelper.php' );
include_once( dirname( __FILE__ ) . '/UserAgentParser.php' );


// get_browser function can parse user-agent string

function rewarding($ds_key)
{
	// get id, user_id and dashang money from DASH_URL_INFO_TABLE
	$ds_info = get_base_info_for_dash($ds_key);
	if($ds_info == null){
		echo "<h3>".__('Illegal Request!', 'dash')."</h3>";
		return;
	}
	
	$dev = detect_device();

	$_POST['WIDsubject'] = "云打赏(www.dashangcloud.com)";
	// WIDout_trade_no is the id of DASH_TRANSFER_RECORDS_TABLE
	$_POST['WIDseller_email'] = "dashangcloud@163.com";
	//订单描述
	$_POST['WIDbody'] = "您正在使用云打赏(www.dashangcloud.com)，请务必确认您打赏的对象是原创的和合法的。";
    //商品展示地址
	$_POST['WIDshow_url'] = "http://www.dashangcloud.com/";
	if(isset($_POST['fee'])){
		$_POST['WIDtotal_fee'] = $_POST['fee'];
	}else{
		$_POST['WIDtotal_fee'] = $ds_info->default_money;
	}
	if(isset($_POST['method'])){
		$pay_type = $_POST['method'];
	}else{
		$pay_type = "alipay";
	}

	// new dashang history record
	$record = array(
				'dash_id' => $ds_info->id, 
				'pay_type' => $pay_type, 
				'dash_money' => floatval($_POST['WIDtotal_fee']), 
				'referer' => $_SERVER['HTTP_REFERER'],
				'user_agent' => $dev['ua']
			);
	$dsid = new_dash_record($ds_info->user_id, $record);
	$_POST['WIDout_trade_no'] = $dsid;
	dslog('INFO', "new pay request, trade no: $dsid, fee: ".$_POST['WIDtotal_fee']);

	/*
	 *  Weixin client of windows does not support http POST
	 */
	if($pay_type == "wxpay"){
		// weixin pay	
		if(0){
		//if(isset($dev["sub"]) && $dev["sub"] == "weixin"){
			// Call weixin js api
			echo "Call weixin js api if possible";
		}else{
			$current_dir = getcwd();
			$plugin_dir = plugin_dir_path(__FILE__);
			$wxpay_dir = $plugin_dir."/wxpay/example/";
			chdir($wxpay_dir);
			include("native.php");
			chdir($current_dir);
		}
	}else{
		// alipay	
		if(isset($dev["sub"]) && $dev["sub"] == "weixin"){
			// if user select alipay on Weixin, jump to wxpay and tip to him/her
			// and call weixin js api if possible later
			$current_dir = getcwd();
			$plugin_dir = plugin_dir_path(__FILE__);
			$wxpay_dir = $plugin_dir."/wxpay/example/";
			chdir($wxpay_dir);
			include("native.php");
			chdir($current_dir);
		}else{
			echo "<h3>正在为您跳转到支付宝，请稍等...</h3>";
			echo "<div style=\"visibility: hidden;\"";
			include("alipay/create_direct_pay_by_user/alipayapi.php");
			echo "</div>";
		}
	}

	// for test
	return ;

}

function alipay_return()
{
	// return page after payment.
	require_once("alipay/create_direct_pay_by_user/alipay.config.php");
	require_once("alipay/create_direct_pay_by_user/lib/alipay_notify.class.php");

	$alipayNotify = new AlipayNotify($alipay_config);
	$verify_result = $alipayNotify->verifyReturn();
	if($verify_result) {//验证成功
		//商户订单号
		$out_trade_no = $_GET['out_trade_no'];
	
		//支付宝交易号
		$trade_no = $_GET['trade_no'];
	
		//交易状态
		$trade_status = $_GET['trade_status'];

		$buyer_email = $_GET['buyer_email'];
	
	    if($_GET['trade_status'] == 'TRADE_FINISHED' || $_GET['trade_status'] == 'TRADE_SUCCESS') {
			update_dash_record_when_return($out_trade_no, $trade_no, $buyer_email, DS_PAY_SUCCESS);
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

		$buyer_email = $_GET['buyer_email'];
	
		// 还不知道这两个状态是否有影响，暂且认为都支付成功
	    if($trade_status == 'TRADE_FINISHED') {
			update_dash_record_when_notify($out_trade_no, $trade_no, DS_PAY_SUCCESS);
	    }
	    else if ($trade_status == 'TRADE_SUCCESS') {
			update_dash_record_when_notify($out_trade_no, $trade_no, DS_PAY_SUCCESS);
	    }else{
			dslog('INFO', "alipay notify, trade no: $out_trade_no, pay trade no: $trade_no, trade status: $trade_status");
		}
		dslog('INFO', "alipay notify, trade no: $out_trade_no, pay trade no: $trade_no, trade status: $trade_status, buyer email: $buyer_email");
		echo "success";		//请不要修改或删除
	}
	else {
		dslog('ERROR', "verify failed of alipay notify.");
	    echo "fail";
	}
}

function wxpay_notify()
{
	$current_dir = getcwd();
	$plugin_dir = plugin_dir_path(__FILE__);
	$wxpay_dir = $plugin_dir."/wxpay/example/";
	chdir($wxpay_dir);

	include_once("notify.php");
	Log::DEBUG("begin notify");
	$notify = new PayNotifyCallBack(); // update in the class
	$notify->Handle(false);

	chdir($current_dir);
}

/*
 *	detect if the device is iphone, Android phone, pad or PC? And wap, web, weixin, weibo?
 *	
 */
function detect_device()
{
	/*
	 * ua => User Agent
	 * $dev = array("main" => "", "sub" => "", "ua" => "");
	 */
	$ua = $_SERVER['HTTP_USER_AGENT'];
	$dev = check_user_agent($ua);
	$dev["ua"] = $ua;
	return $dev;
}
