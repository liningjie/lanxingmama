<?php 
/**
*
* example目录下为简单的支付样例，仅能用于搭建快速体验微信支付使用
* 样例的作用仅限于指导如何使用sdk，在安全上面仅做了简单处理， 复制使用样例代码时请慎重
* 请勿直接直接使用样例对外提供服务
* 
**/

require_once "../lib/WxPay.Api.php";
require_once "WxPay.JsApiPay.php";
require_once "WxPay.Config.php";
require_once 'log.php';

//初始化日志
$logHandler= new CLogFileHandler("./logs/".date('Y-m-d').'.log');
$log = Log::Init($logHandler, 15);


$data=$_GET;
// echo($data['order']);
//①、获取用户openid
try{


	$tools = new JsApiPay();
	$openId = $tools->GetOpenid();

	//②、统一下单
	$input = new WxPayUnifiedOrder();
	$input->SetBody($data['title']);
	$input->SetAttach($data['title']);
	$input->SetOut_trade_no($data['order']);//订单号
	$input->SetTotal_fee(intval($data['price']*100));//钱
	// $input->SetTotal_fee(1);//钱
	$input->SetTime_start(date("YmdHis"));//開始时间
	$input->SetTime_expire(date("YmdHis", time() + 600));//超时
	$input->SetGoods_tag($data['title']);//设置商品标签
	// $input->SetNotify_url("http://paysdk.weixin.qq.com/notify.php");//设置通知URL
	$input->SetNotify_url("http://csd.wxjoi.com/index/index/pay");
	$input->SetTrade_type("JSAPI");//设置交易类型
	$input->SetOpenid($openId);
	$config = new WxPayConfig();
	$order = WxPayApi::unifiedOrder($config, $input);
	// echo '<font color="#f00"><b>统一下单支付单信息</b></font><br/>';
	// printf_info($order);
	$jsApiParameters = $tools->GetJsApiParameters($order);

	//获取共享收货地址js函数参数
	$editAddress = $tools->GetEditAddressParameters();
} catch(Exception $e) {
	Log::ERROR(json_encode($e));
}
//③、在支持成功回调通知中处理成功之后的事宜，见 notify.php
/**
 * 注意：
 * 1、当你的回调地址不可访问的时候，回调通知会失败，可以通过查询订单来确认支付是否成功
 * 2、jsapi支付时需要填入用户openid，WxPay.JsApiPay.php中有获取openid流程 （文档可以参考微信公众平台“网页授权接口”，
 * 参考http://mp.weixin.qq.com/wiki/17/c0f37d5704f0b64713d5d2c37b468d75.html）
 */
?>


<!DOCTYPE html>
<html>
<head>
  	 <script src=https://cdn.staticfile.org/jquery/2.1.4/jquery.min.js></script>
	<title><?php echo($data['title']);echo($data['price']*100);?>-微信支付</title>
</head>
<body>

<script type="text/javascript">


// $(document).ready(function(){

// 	alert(1);
// });

	//调用微信JS api 支付
	function jsApiCall()
	{
		WeixinJSBridge.invoke(
			'getBrandWCPayRequest',
			<?php echo $jsApiParameters; ?>,
			function(res){
				WeixinJSBridge.log(res.err_msg);
				// alert(res.err_code+res.err_desc+res.err_msg);//状态ma
				//cancel 重复提交已经支付的
				if (res.err_msg == 'get_brand_wcpay_request:ok') {
					// alert('支付成功');
					
					$.post("/index/index/pay", { order: "<?php echo($data['order']);?>",status:1,},
					function(data){
						
						if(data=='ok'){
							
							window.location.href = "/index/index/zfcg?order="+<?php echo($data['order']);?>;
						}else{
							alert('status:'+data);
							// window.location.href = "/index/index/order";
							window.location.href = "/index/index/zfcg?order="+<?php echo($data['order']);?>;
						}
						alert(type(data));
						window.location.href = "/index/index/zfcg?order="+<?php echo($data['order']);?>;
					});
					// window.location.href = "/index/index/me/";


				}else{
					alert('支付失败');
					// alert('err_code'+res.err_code);//状态ma
					// alert('res.err_desc'+res.err_desc);//状态ma
					// alert('res.err_msg'+res.err_msg);//状态ma
					window.location.href = "/index/index/order";
					// window.location.href = "/index/index/zfcg?order="+<?php echo($data['order']);?>;
				}

			}
		);
	}

	function callpay()
	{
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', jsApiCall, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', jsApiCall); 
		        document.attachEvent('onWeixinJSBridgeReady', jsApiCall);
		    }
		}else{
		    jsApiCall();
		}
	}
	</script>


	<script type="text/javascript">

	$(document).ready(function(){
	// alert('页面加载完毕');
	callpay();
})

// window.onload = function(){
// 	alert('2页面加载完毕');
// }
	//获取共享地址
	function editAddress()
	{
		WeixinJSBridge.invoke(
			'editAddress',
			<?php echo $editAddress; ?>,
			function(res){
				var value1 = res.proviceFirstStageName;
				var value2 = res.addressCitySecondStageName;
				var value3 = res.addressCountiesThirdStageName;
				var value4 = res.addressDetailInfo;
				var tel = res.telNumber;
				
				// alert(value1 + value2 + value3 + value4 + ":" + tel);
			}
		);
	}
	
	window.onload = function(){
		
		if (typeof WeixinJSBridge == "undefined"){
		    if( document.addEventListener ){
		        document.addEventListener('WeixinJSBridgeReady', editAddress, false);
		    }else if (document.attachEvent){
		        document.attachEvent('WeixinJSBridgeReady', editAddress); 
		        document.attachEvent('onWeixinJSBridgeReady', editAddress);
		    }
		}else{
			editAddress();
		}
	};
	
	</script>






</body>
</html>
