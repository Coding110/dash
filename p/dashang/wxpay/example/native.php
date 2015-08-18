<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once "WxPay.NativePay.php";
require_once "log.php";

//模式一
/**
 * 流程：
 * 1、组装包含支付信息的url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、确定支付之后，微信服务器会回调预先配置的回调地址，在【微信开放平台-微信支付-支付配置】中进行配置
 * 4、在接到回调通知之后，用户进行统一下单支付，并返回支付信息以完成支付（见：native_notify.php）
 * 5、支付完成之后，微信服务器会通知支付成功
 * 6、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$notify = new NativePay();
#$url1 = $notify->GetPrePayUrl("123456789");
#$url1 = $notify->GetPrePayUrl($_POST['WIDout_trade_no']);

//模式二
/**
 * 流程：
 * 1、调用统一下单，取得code_url，生成二维码
 * 2、用户扫描二维码，进行支付
 * 3、支付完成之后，微信服务器会通知支付成功
 * 4、在支付成功通知中需要查单确认是否真正支付成功（见：notify.php）
 */
$input = new WxPayUnifiedOrder();
$input->SetBody("云打赏 body");
$input->SetAttach("云打赏 attach");
$input->SetOut_trade_no(WxPayConfig::MCHID.date("YmdHis"));
$input->SetTotal_fee($_POST['WIDtotal_fee']);
$input->SetTime_start(date("YmdHis"));
$input->SetTime_expire(date("YmdHis", time() + 600));
$input->SetGoods_tag("打赏");
$input->SetNotify_url("http://".DS_HOST."/sh/wxpay/notify");
$input->SetTrade_type("NATIVE");
$input->SetProduct_id($_POST['WIDout_trade_no']);
$result = $notify->GetPayUrl($input);
$url2 = $result["code_url"];
#$url2 = "#";
?>

<html>
<head>
    <meta http-equiv="content-type" content="text/html;charset=utf-8"/>
    <meta name="viewport" content="width=device-width, initial-scale=1" /> 
    <title>云打赏——微信支付</title>
	<link rel="shortcut icon" href="/static/ds-logo-1.2-64.png" /> 
</head>
<body>
	<div style="width:100%;margin-top:20px;" align="center">

	<div style="width:200px;">
		<div style="width:200px;font-size:20px;font-weight: bolder;">云打赏——微信支付</div><br/>
		<img alt="微信扫码支付" src="http://paysdk.weixin.qq.com/example/qrcode.php?data=<?php echo urlencode($url2);?>" style="width:150px;height:150px;"/>
	</div>

	<br/>
	<div style="width:100%">
	<div style="margin-top:10px;">使用微信扫码，或长按二维码，点击“识别图中二维码”。</div>
	<div style="margin-top:10px;">打赏时请务必确认收款方为“深圳市红蓝网络技术有限公司”，以免上当受骗给您带来损失。</div>
	<!--<div style="margin-top:10px;">正在打赏的<a target="_blank" href="#">原文地址</a>。</div>-->
	<div style="margin-top:10px;color:red;">注：因手机微信不支持支付宝，可能会被转到微信支付。</div>
	</div>

	</div>
	
</body>
</html>
