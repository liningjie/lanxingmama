
<?php
/**
*
* example目录下为简单的支付样例，仅能用于搭建快速体验微信支付使用
* 样例的作用仅限于指导如何使用sdk，在安全上面仅做了简单处理， 复制使用样例代码时请慎重
* 请勿直接直接使用样例对外提供服务
* 
**/
require_once "../lib/WxPay.Api.php";
require_once 'log.php';
require_once "WxPay.Config.php";

if((isset($_REQUEST["transaction_id"]) && $_REQUEST["transaction_id"] != "" 
		&& !preg_match("/^[0-9a-zA-Z]{10,64}$/i", $_REQUEST["transaction_id"], $matches))
	|| (isset($_REQUEST["out_trade_no"]) && $_REQUEST["out_trade_no"] != "" 
		&& !preg_match("/^[0-9a-zA-Z]{10,64}$/i", $_REQUEST["out_trade_no"], $matches))){
	header('HTTP/1.1 404 Not Found');
	exit();
}

//初始化日志
$logHandler= new CLogFileHandler("./logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);

function printf_info($data)
{
    foreach($data as $key=>$value){
        echo "<font color='#f00;'>$key</font> : ".htmlspecialchars($value, ENT_QUOTES)." <br/>";
    }
}


if(isset($_REQUEST["transaction_id"]) && $_REQUEST["transaction_id"] != ""){
	try {
		$transaction_id = $_REQUEST["transaction_id"];
		$input = new WxPayOrderQuery();
		$input->SetTransaction_id($transaction_id);
		$config = new WxPayConfig();
		// printf_info(WxPayApi::orderQuery($config, $input));
		echo json_encode(WxPayApi::orderQuery($config, $input),JSON_UNESCAPED_UNICODE);
	} catch(Exception $e) {
		Log::ERROR(json_encode($e));
	}
	exit();
}

if(isset($_GET["out_trade_no"]) && $_GET["out_trade_no"] != ""){
	try{
		$out_trade_no = $_GET["out_trade_no"];
		$input = new WxPayOrderQuery();
		$input->SetOut_trade_no($out_trade_no);
		$config = new WxPayConfig();
		// printf_info(WxPayApi::orderQuery($config, $input));
		// print_r(WxPayApi::orderQuery($config, $input));
		echo json_encode(WxPayApi::orderQuery($config, $input),JSON_UNESCAPED_UNICODE);
	} catch(Exception $e) {
		Log::ERROR(json_encode($e));
	}
	exit();
}
?>
