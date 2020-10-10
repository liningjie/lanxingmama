<?php if (!defined('THINK_PATH')) exit(); /*a:2:{s:77:"/www/wwwroot/tlhb.wxjoi.com/public/../application/index/view/index/index.html";i:1573465728;s:68:"/www/wwwroot/tlhb.wxjoi.com/application/index/view/index/footer.html";i:1568794932;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit" />
		<meta name="robots" content="index, follow" />
		<title>首页</title>
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
				<div class="itop">
					<img class="itop01" src="/assets/img/img10.png" >
					<div class="itop02">
						<img src="/assets/img/img11.png" >
						<div class="itop02a"></div>
					</div>
					<div class="itop03">
						<img src="<?php echo($toppro['image']); ?>" >
					</div>
					<a href="<?php echo url('/index/index/xqy'); ?>?id=<?php echo $toppro['id']; ?>">
						<div class="index2a" style="padding: .24rem;width: 92%;margin: 0 auto;background: white;margin-bottom: .37rem;box-shadow: 0px 0px 12px 0px rgba(0, 0, 0, 0.2);">
							<div class="index2a01">
								<img class="index2a01a" src="<?php echo(explode(',',$toppro['images'])[0]); ?>" >
							</div>
							<div class="index2a02">
								<div class="index2a02a"><?php echo $toppro['title']; ?></div>
								<div class="index2a02b">
									<div class="index2a02b01">
										<div class="index2a02b01a"></div>
										<div class="index2a02b01b" style="width: calc(100% - <?php echo $toppro['percent']; ?>%);"></div>
									</div>
									<div class="index2a02b03">
										<img class="index2a02b02" src="/assets/img/img3.png" >
										<?php echo $toppro['percent']; ?>%
									</div>
								</div>
								<div class="index2a02c"><?php echo $toppro['order_num']; ?>人支持</div>
								<div class="index2a02d">&nbsp;<span><?php echo $toppro['keyword']; ?><!-- <?php 
									//支持金额以最大的价格
									 for ($i=6; $i > 1; $i--) { 
									if( $toppro['full_price'.$i]>0)
									{
										echo($toppro['full_price'.$i]);
										break;
									}
								 }?> --></span><button type="button">点击参与</button></div>
							</div>
						</div>
					</a>
				</div>
				<div class="index1">
					项目<!-- 年底搞事.敬请期待 -->
				</div>
				<div class="index2">
					
					<?php 
					foreach($pro as $key=>$val){?>
					<a class="indexdd" href="<?php echo url('/index/index/xqy'); ?>?id=<?php echo $val['id']; ?>">
						<div class="index2a">
							<div class="index2a01">
								<img class="index2a01a" src="<?php echo(explode(',',$val['images'])[0]); ?>" >
							</div>
							<div class="index2a02">
								<div class="index2a02a"><?php echo $val['title']; ?></div>
								<div class="index2a02b">
									<div class="index2a02b01">
										<div class="index2a02b01a"></div>
										<div class="index2a02b01b" style="width: calc(100% - <?php echo $val['percent']; ?>%);"></div>
									</div>
									<div class="index2a02b03">
										<img class="index2a02b02" src="/assets/img/img3.png" >
										<?php echo $val['percent']; ?>%
									</div>
								</div>
								<div class="index2a02c"><?php echo $val['order_num']; ?>人支持</div>
								<div class="index2a02d"><span><?php echo $val['keyword']; ?> <!-- <?php 
									//支持金额以最大的价格
									 for ($i=6; $i > 1; $i--) { 
									if( $val['full_price'.$i]>0)
									{
										echo($val['full_price'.$i]);
										break;
									}
								 }?> --></span><button type="button">点击参与</button></div>
							</div>
						</div>
					</a>
					<?php }?>

					
				</div>
				
				
				<div class="Nfooter">
					<div class="footerdj"></div>
<div class="footer">
	<a href="index.html" class="footera">
		<img class="footera1 dib" src="/assets/img/1.png" >
		<img class="footera3" src="/assets/img/2.png" >
		<div class="footera2 cgr50">
			众筹
		</div>
	</a>
	<a href="<?php echo url('index/index/me'); ?>" class="footera">
		<img class="footera1" src="/assets/img/3.png" >
		<img class="footera3 dib" src="/assets/img/4.png" >
		<div class="footera2">
			我的
		</div>
	</a>
</div>

				</div>
			</div>
		</div>
	</body>
</html>

