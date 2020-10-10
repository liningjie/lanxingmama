<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:76:"/www/wwwroot/tlhb.wxjoi.com/public/../application/index/view/index/zfcg.html";i:1573465146;}*/ ?>
<!DOCTYPE html>
<html style="background: white;">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit" />
		<meta name="robots" content="index, follow" />
		<title><?php if($order['order_status']==0){echo '支付失败';}elseif($order['order_status']>0){echo '支付成功';}?></title>
		<meta name="description" content="" />
		<meta name="keywords" content="" />
		<meta name="author" content="order by website" />
		<script type="text/javascript" src="/assets/js/jquery.min.js"></script>
		<script src="https://cdn.bootcss.com/bootstrap/3.3.7/js/bootstrap.min.js" integrity="sha384-Tc5IQib027qvyjSMfHjOMaLkfuWVxZxUPnCJA7l2mCWNIpG9mGCD8wGNIcPD7Txa"
		 crossorigin="anonymous"></script>
		<script src="/assets/js/jquery.js" type="text/javascript" charset="utf-8"></script>
		<script src="/assets/js/swiper.min.js" type="text/javascript" charset="utf-8"></script>
		<script src="/assets/js/jquery.num.js" type="text/javascript" charset="utf-8"></script>
		<link rel="stylesheet" type="text/css" href="/assets/css/bootstrap.min.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/assets/css/dh.css" media="screen" />
		<link rel="stylesheet" type="text/css" href="/assets/css/qcys.css" />
		<link rel="stylesheet" type="text/css" href="/assets/css/swiper.min.css" />
		<link rel="stylesheet" href="https://unpkg.com/element-ui/lib/theme-chalk/index.css">
	</head>
	<body>
		<div class="row">
			<div class="col-xs-12" style="padding: 0;">
				<div class="header">
					<div class="headerb">
						<?php if($order['order_status']==0){echo '支付失败';}elseif($order['order_status']>0){echo '支付成功';}?>
					</div>
					<img class="headera" onclick="javascript:location.href='/index/index/order'" src="/assets/img/img4.png" >
				</div>
				<div class="headerdj"></div>
				
				<div class="zfcg">
				<?php if($order['order_status']!=0){echo '<img class="zfcga" src="/assets/img/img26.png" >';}?>
					
					
					<div class="zfcgb">
						订单金额：<span>￥<?php echo($order['full_price']);?></span>
					</div>
					<div class="zfcgc">
						<div>长按二维码，识别。</div>
						<div>关注公众号。<br/><br/></div>
					</div>
					<div class="zfcgd">
						<img src="/assets/img/img25.jpg" >
					</div>

					<div><a href="/index/index/me">个人中心</a></div>
				</div>
				
			</div>
		</div>
	</body>
</html>

