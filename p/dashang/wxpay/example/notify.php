<?php
ini_set('date.timezone','Asia/Shanghai');
//error_reporting(E_ERROR);

require_once "../lib/WxPay.Api.php";
require_once '../lib/WxPay.Notify.php';
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("../logs/".date('Y-m-d').'.log');
//var_dump($logHandler);
$log = Log::Init($logHandler, 15);

class PayNotifyCallBack extends WxPayNotify
{
	//查询订单
	public function Queryorder($transaction_id)
	{
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$result = WxPayApi::orderQuery($input);
		Log::DEBUG("query:" . json_encode($result));
		if(array_key_exists("return_code", $result)
			&& array_key_exists("result_code", $result)
			&& $result["return_code"] == "SUCCESS"
			&& $result["result_code"] == "SUCCESS")
		{
			return true;
		}
		return false;
	}
	
	//重写回调处理函数
	public function NotifyProcess($data, &$msg)
	{
		Log::DEBUG("call back:" . json_encode($data));
		
		if(!array_key_exists("transaction_id", $data)){
			$msg = "输入参数不正确";
			dslog("ERROR", "wxpay invalid argument. data: ".json_encode($data));
			return false;
		}
		//查询订单，判断订单真实性
		if(!$this->Queryorder($data["transaction_id"])){
			$msg = "订单查询失败";
			dslog("ERROR", "wxpay order query failed, data: ".json_encode($data));
			return false;
		}

		// There has checked return code and result code in Queryorder 
		$out_trade_no = $data['attach'];
		$pay_trade_no = $data['transaction_id'];
		$pay_user = $data['mch_id'];
		$pay_status = DS_PAY_SUCCESS;
		update_dash_record_when_return($out_trade_no, $pay_trade_no, $pay_user, $pay_status);
		dslog("INFO", "wxpay notify process success, trade no: $out_trade_no, fee: ".$data["total_fee"]);
		return true;
	}
}

