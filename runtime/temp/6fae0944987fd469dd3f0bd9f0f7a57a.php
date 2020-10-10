<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:77:"/www/wwwroot/tlhb.wxjoi.com/public/../application/index/view/index/order.html";i:1569718488;}*/ ?>
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
					<img class="headera" onclick="javascript:location.href='/index/index/me'" src="/assets/img/img4.png">
				</div>
				<div class="headerdj"></div>

				<div class="wddd1">
					<div class="wddd1a">
						<div status="all" class="wddd1aa wddd1aay">全部</div>
						<div status="0" class="wddd1aa">待付款</div>
						<div status="1" class="wddd1aa">待抽奖</div>
						<div status="2" class="wddd1aa">待收货</div>
						<div status="3" class="wddd1aa">已完成</div>
					</div>
				</div>



				<?php foreach($order as $key=>$val){?>
				<div class="wddd2 status<?php echo $val['order_status']; ?>" status="<?php echo $val['order_status']; ?>">
					<div class="wddd2a">
						<div class="wddd2aa">
							下单时间：<?php echo(date('Y-m-d H:i:s',$val['createtime']))?><div class="wddd2aaa"><?php 
								switch ($val['order_status']) {
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
							<div class="wddd2ba"><a href="<?php echo url('/index/index/xqy'); ?>?id=<?php echo $val['proid']; ?>"><img src="<?php echo(explode(',',$val['images'])[0]); ?>"></a></div>
							<div class="wddd2bb">
								<div class="wddd2bba"><?php echo $val['title']; ?></div>
								<div class="wddd2bbb"><?php echo $val['jieshao']; ?></div>
								<div class="wddd2bbc">实付：￥<?php echo $val['full_price']; ?> <span class="wddd2bbca">共<?php echo $val['number']; ?>件商品</span></div>
							</div>
						</div>
					</div>
					<div class="wddd2c">

						<?php if($val['order_status'] != 0): ?>
						<a href="<?php echo url('/index/index/haoma'); ?>?order=<?php echo $val['order_no']; ?>"><div class="wddd2ca" >
							查看号码
						</div></a>
						<?php endif; if($val['order_status']==0){ if( (time()-$val['createtime'])<600){?>
								
								<a href="/pay/wxpay.php?order=<?php echo $val['order_no']; ?>&price=<?php echo $val['full_price']; ?>&title=<?php echo $val['title']; ?>"><div class="wddd2cb">
									付款
								</div></a>
							<?php }else{ echo '订单已超时';}}?>
						<!-- <a href="/pay/wxpay.php?order=<?php echo $val['order_no']; ?>&price=<?php echo $val['full_price']; ?>&title=<?php echo $val['title']; ?>"><div class="wddd2cb">
							付款
						</div></a> -->
						

						<?php if(($val['order_status'] == 2) OR ($val['order_status'] == 1)): ?>
						<div class="wddd2cb">
							确认收货
						</div>
						<?php endif; ?>
						<div class="yuansu"></div>

					</div>
				</div>
				<?php }?>

				<div class="Nfooter">
					
						<div class="footerdj"></div>
						<div class="footer">
							<a href="index.html" class="footera">
								<img class="footera1 " src="/assets/img/1.png" >
								<img class="footera3 dib" src="/assets/img/2.png" >
								<div class="footera2 ">
									众筹
								</div>
							</a>
							<a href="<?php echo url('index/index/me'); ?>" class="footera">
								<img class="footera1 dib" src="/assets/img/3.png" >
								<img class="footera3 " src="/assets/img/4.png" >
								<div class="footera2 cgr50">
									我的
								</div>
							</a>
						</div>
						
				</div>

				

			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
// $('.wddd1aa').click(function(){
// 	// var id = $('.wddd1aa').index(this)
// 	// alert(id);
// 	$('.wddd1aay').removeClass('wddd1aay');
// 	$(this).addClass('wddd1aay');
// 	var status = $(this).attr('status');
// 	// alert(status);
// 	if(status=='all'){
// 		$('.wddd2').show();
// 	}else{
// 		$('.wddd2').hide();
// 		$('.status'+status).show();
// 		// $('.wddd2').attr('status')
// 	}
	
// });



 $('.wddd1aa').click(function(){
  $('.wddd2').css({
   'display':'none'
  })
  	$('.wddd1aay').removeClass('wddd1aay');
	$(this).addClass('wddd1aay');

  var id = $(this).attr('status')
  for(var i = 0 ; i<$('.wddd2').length;i++){
   if(id == $('.wddd2').eq(i).attr('status')){
    $('.wddd2').eq(i).css({
     'display':'block'
    })
   }
  }
  if(id=='all'){
		$('.wddd2').css({
     'display':'block'
    })
	}
  
 });

</script>
