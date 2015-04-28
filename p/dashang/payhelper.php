<?php

/*
 *	Process for payment
 */

include_once( dirname( __FILE__ ) . '/dashhelper.php' );


function rewarding($ds_key)
{
	// get id, user_id and dashang money from DASH_URL_INFO_TABLE
	$ds_info = get_base_info_for_dash($ds_key);
	if($ds_info == null){
		echo "<h3>".__('Illegal Request!', 'dash')."</h3>";
		return;
	}

	echo "<h3>正在为您跳转到支付宝，请稍等...</h3>";
	$_POST['WIDsubject'] = "云打赏(www.dashangcloud.com)";
	// WIDout_trade_no is the id of DASH_TRANSFER_RECORDS_TABLE
	$_POST['WIDout_trade_no'] = $ds_info->id;
	if(isset($_POST['alipay'])){
		$_POST['WIDprice'] = $_POST['alipay'];
	}else{
		$_POST['WIDprice'] = $ds_info->default_money;
	}

	// new dashang history record
	$record = array('dash_id' => $ds_info->id, 'dash_money' => floatval($_POST['WIDprice']), 'referer' => $_SERVER['HTTP_REFERER']);
	new_dash_record($ds_info->user_id, $record);

	include("alipay/create_partner_trade_by_buyer/alipayapi.php");
}

function alipay_return()
{
	update_dash_record();
}

function alipay_notify()
{
	update_dash_record();
}
