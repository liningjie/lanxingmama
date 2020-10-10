<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/tlhb.wxjoi.com/public/../application/index/view/index/haoma.html";i:1568871257;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit" />
		<meta name="robots" content="index, follow" />
		<title>我的订单</title>
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
						我的订单
					</div>
					<img class="headera" onclick="javascript:history.back(-1);" src="/assets/img/img4.png">
				</div>
				<div class="headerdj"></div>

				
				<div class="wddd2" style="margin-top: .2rem;">
					<div class="wddd2a">
						<div class="wddd2aa">
							下单时间：<?php echo(date('Y-m-d H:i:s',$order['createtime']))?><div class="wddd2aaa"><?php 
								switch ($order['order_status']) {
									case '0':
										echo('待付款');
										break;
									case '1':
										echo('待抽奖');
										break;
									case '2':
										echo('待收货');
										break;
									case '3':
										echo('已完成');
										break;
								}
								?></div>
						</div>
					</div>
					<div class="wddd2bd">
						<div class="wddd2b">
							<div class="wddd2ba"><img src="<?php echo(explode(',',$order['images'])[0]); ?>"></div>
							<div class="wddd2bb">
								<div class="wddd2bba"><?php echo $pro['title']; ?></div>
								<div class="wddd2bbb"><?php echo $order['jieshao']; ?></div>
							    <div class="wddd2bbc"><span class="wddd2bbca">单价:￥<?php echo $order['price']; ?></span>  实付:￥<?php echo $order['full_price']; ?> <span class="wddd2bbca">数量<?php echo $order['number']; ?></span></div>
							</div>
						</div>
					</div>
					<div class="wddd2c" style="text-align: left;">

						<?php foreach($ticket as $key=>$val){
						echo('<div class="wddd2cc">'.$val["ticket"].'</div>');
						}?>
						
					</div>
				</div>

			</div>
		</div>
	</body>
</html>
<script type="text/javascript">

</script>
