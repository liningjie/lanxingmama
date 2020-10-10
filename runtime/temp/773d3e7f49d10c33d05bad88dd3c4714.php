<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:74:"/www/wwwroot/tlhb.wxjoi.com/public/../application/index/view/index/me.html";i:1573431313;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit" />
		<meta name="robots" content="index, follow" />
		<title>个人中心</title>
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
				<div class="ime">
					<div class="imea"></div>
					<div class="imeb">
						<div class="imeb01">
							<?php if(empty($user)) {echo('<a href="/index/index/login" class="imeb01a">登录/注册</a>');}
								else{
									echo('<a href="/index/index/userdata" class="imeb01a">'.base64_decode($user["nickname"]).'</a>');
								}
							?>
							<div class="imeb01b">北京日益日新汽车服务有限公司</div>
						</div>
						<div class="imeb02" style="background: url(<?php if(empty($user)){echo('/assets/img/img8.png');}else{echo($user["head_url"]);}?>) no-repeat center center;background-size: 100% 100%;"><div class="imeb02a"></div></div>
					</div>
				</div>
				<div class="ime1">
					<div class="ime1a">
						<div class="ime1a01">
							我的订单<a href="<?php echo url('/index/index/order'); ?>" class="ime1a01a">查看全部订单<img src="/assets/img/img9.png" ></a>
						</div>
					</div>
					<div class="ime1b">
						<a class="ime1b01" href="<?php echo url('/index/index/order'); ?>">
							<img class="ime1b01b" src="/assets/img/5.png" >
							<div class="ime1b01a">
								待付款
							</div>
							<div class="ime1b01c"><?php echo $status[0]; ?></div>
						</a>
						<a class="ime1b01" href="<?php echo url('/index/index/order'); ?>">
							<img class="ime1b01b" src="/assets/img/6.png" >
							<div class="ime1b01a">
								待抽奖
							</div>
							<div class="ime1b01c"><?php echo $status[1]; ?></div>
						</a>
						<a class="ime1b01" href="<?php echo url('/index/index/order'); ?>">
							<img class="ime1b01b" src="/assets/img/7.png" >
							<div class="ime1b01a">
								待收货
							</div>
							<div class="ime1b01c"><?php echo $status[2]; ?></div>
						</a>
						<a class="ime1b01" href="<?php echo url('/index/index/order'); ?>">
							<img class="ime1b01b" src="/assets/img/8.png" >
							<div class="ime1b01a">
								已完成
							</div>
							<div class="ime1b01c"><?php echo $status[3]; ?></div>
						</a>
					</div>
				</div>
				
				<a href="<?php echo url('/index/index/userdata'); ?>" class="ime2">
					我的信息<img src="/assets/img/img9.png" >
				</a>
				<?php  if(!empty(session('openid'))){?>
				<a href="/index/index/loginout" class="ime2">
					退出登录<img src="/assets/img/img9.png" >
				</a>
				<?php }?>
				<!-- <a href="<?php echo url('/index/index/number?id=5'); ?>" class="ime2">
					全部号码<img src="/assets/img/img9.png" >
				</a>
				 -->
				
				
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
	$(document).ready(function() {

		// $('.Nfooter').load('footer.html');
		$('.ime1b01c').hide();

		for (var i = 0; i < $('.ime1b01c').length; i++) {
			// alert($('.ime1b01c').eq(i).text());
			if(Number($('.ime1b01c').eq(i).text())>0){
				if(Number($('.ime1b01c').eq(i).text())>99){
					$('.ime1b01c').eq(i).text('99+');
				}
				$('.ime1b01c').eq(i).show();
			}else{
				$('.ime1b01c').eq(i).hide();	
			}
		}
		// if($('.ime1b01c').val()>0)
		// 	{$('.ime1b01c').show();}
		// else{
		// 	$('.ime1b01c').hide();
		// }
		

	});
	var imeawidth = $('.imea').width()
	$('.imea').css({
		'height':imeawidth
	})
	var imeb02width = $('.imeb02').width()
	$('.imeb02').css({
		'height':imeb02width
	});



</script>
