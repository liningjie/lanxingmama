<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:75:"/www/wwwroot/tlhb.wxjoi.com/public/../application/index/view/index/xqy.html";i:1573469502;}*/ ?>
<!DOCTYPE html>
<html>
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit" />
		<meta name="robots" content="index, follow" />
		<title></title>
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
						详情
					</div>
					<img class="headera" onclick="javascript:location.href='/index/index/index'" src="/assets/img/img4.png">
				</div>
				<div class="headerdj">

				</div>
				<div class="swiper-container sptup">
					<div class="swiper-wrapper">
						<?php $imgs=explode(',',$pro['images']);
							foreach($imgs as $key=>$val){
								echo('<div class="swiper-slide"><img src="'.$val.'" ></div>');
							}
							 ?>


					</div>
					<!-- Add Pagination -->
					<div class="swiper-pagination"></div>
				</div>
				<div class="xqy1">
					<?php echo $pro['title']; ?>
				</div>
				<div class="xqy2" style="color: #ff0000;">
					<span></span>双11活动
				<!-- 	<?php 
					//支持金额以最大的价格
					 for ($i=6; $i > 1; $i--) { 
					if( $pro['full_price'.$i]>0)
					{
						echo($pro['full_price'.$i]);
						break;
					}
				 }?> -->
				</div>
				<div class="xqy2aa">
					<div class="xqy2aaa">

					</div>
				</div>
				<div class="xqy3">
					<div class="index2a02b01">
						<div class="index2a02b01a"></div>
						
						<div class="index2a02b01b" style="width: calc(100% - <?php echo $pro['percent']; ?>%);"></div>

					</div>
					<div class="index2a02b03">
						<img class="index2a02b02" src="/assets/img/img3.png">
						 <?php echo $pro['percent']; ?>% 
						<!--3/5-->
					</div>
				</div>
				<div class="xqy4">
					<div class="xqy4a">
						<div class="xqy4a01"><span class="xqy4a01a"><?php echo $pro['order_num']; ?></span>次</div>
						<div class="xqy4a02"><img src="/assets/img/img15.png">众筹人数</div>
					</div>
					<div class="xqy4a">
						<div class="xqy4a01" style="color:red;"><span class="xqy4a01a" style="color:red;"><?php echo $beitou; ?></span>人</div>
						<div class="xqy4a02" style="color:red;"><img src="/assets/img/img16.png">倍投人数</div>
					</div>
					<div class="xqy4a">
						<!-- <div class="xqy4a01"><span class="xqy4a01a">

								<?php $time_cha=$pro['lotterytime']-time();

								if($time_cha>0){
									$tian =intval($time_cha/(60*60*24));
									if($tian>1){echo($tian."</span>天</div>");}
									else{echo(gmstrftime('%H时:%M分:%S秒', $time_cha)."</span></div>");}
									
								 }else{
								 	echo "</span>活动结束</div>";
								 }
								 ?>

						<div class="xqy4a02"><img src="/assets/img/img17.png">剩余时间</div> -->


						
					</div>
				</div>
				<div class="nxqy1">
					送货方式：送货上门，包邮到家。
				</div>
				<div class="xqy5">
					<div class="xqy5a">
						图片详情
					</div>
					<?php echo $pro['content']; ?>
				</div>
				<div class="zffooterdj"></div>

				<?php  if($time_cha>0 && $isover==0) {?>
				<div class="zffooter">参与众筹</div>
				<?php }?>
				<div class="xiadan">
					<div class="xiadana">
						<div class="xiadana02">
							<div class="xiadana02d">
								<div class="xiadana02d01"><img src="<?php echo(explode(',',$pro['images'])[0]); ?>"></div>
								<div class="xiadana02d02">
									<div class="xiadana02d02a">￥<?php echo $pro['price1']; ?></div>
									<div class="xiadana02d02b">介绍：<?php echo $pro['jieshao1']; ?></div>
								</div>
								<img class="xiadana02d03" src="/assets/img/img6.png">
							</div>
							<div class="xiadana02b">
								规格
							</div>
							<div class="xiadana02c">
								<?php 
								$he=0;
								for($i=1;$i<7;$i++){
									if($pro['price'.$i]>0){

										echo('<div data="'.$pro['jieshao'.$i].'" price="'.$pro['price'.$i]. '" duan="'.$i.'" class="xiadana02c01');
										if($he==0)echo(' xiadana02c01dj');
										echo('">'.$pro["price".$i].'元支持</div>');
										$he++;
									}else{
										break;
									}
								}
							?>


							</div>
							<div class="xiadana02b">
								数量
							</div>
							
							<div style="float:right;color:red;">剩余<?php echo $shengyu; ?>份</div>
							
							<div class="xiadana02a qcfd">
								<div class="xiadana02a02 jianjian">-</div><input class="xiadana02a01" type="number" value="0" />
								<div class="xiadana02a02 jiajia">+</div>
							</div>

						</div>
						<div class="xiadana01">
							立即支付
						</div>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	var duan = 1;
	$('.xiadana02c01').click(function() {
		$('.xiadana02c01dj').removeClass('xiadana02c01dj');
		$(this).addClass('xiadana02c01dj');
		var jieshao = '介绍：' + $(this).attr('data');
		var price = '￥' + $(this).attr('price');
		duan = $(this).attr('duan');


		$('.xiadana02d02b').text(jieshao);
		$('.xiadana02d02a').text(price);
		// alert($(this).attr('price'));
	});

	$('.jiajia').click(function() {
		var number = $('.xiadana02a01').val();
		number=number*1+1
		$('.xiadana02a01').val(number);
	})
	$('.jianjian').click(function() {
		var number = $('.xiadana02a01').val();
		if(number==1){
			
		}else{
			number=number*1-1
		}
		$('.xiadana02a01').val(number);
	})
	$('.xiadana01').click(function() {
		var price1 = $('.xiadana02d02a').text();
		var price = price1.substring(1, price1.length); //单价

		var number = $('.xiadana02a01').val(); //数量
		if(number<1){
			alert('请输入购买数量(可加倍购买)');
			return 0;
		}

		window.location.href = "/index/index/submit?id=<?php echo $pro['id']; ?>&duan=" + duan + "&number=" + number;
		// $.post("/index/index/submit", { duan: duan, number:number },
		// function(data){
		// 	alert("Data Loaded: " + data);
		// });

	});
	// $(document).ready(function() {
	// 	$('.iheader').load('header.html');
	// });




	var swiper = new Swiper('.swiper-container', {
		pagination: {
			el: '.swiper-pagination',
			dynamicBullets: true,
		},
		autoplay: true,
	});
	$('.zffooter').click(function() {
		$('.xiadan').css({
			'height': '100%'
		})
	})
	$('.xiadana02d03').click(function() {
		$('.xiadan').css({
			'height': '0'
		})
	})
	$(".xiadan").click(function() {
		$('.xiadan').css({
			'height': '0'
		})
	})
	$('.xiadana').click(function() {
		event.stopPropagation();
	})
	// var index2a02b01Width = $('.index2a02b01').width()
	// $('.index2a02b01b').css({
	// 	'width': '20%'
	// })
	// var index2a02b01aWidth = $('.index2a02b01b').width()
	// $('.index2a02b01a').css({
	// 	'width':index2a02b01Width-index2a02b01aWidth
	// })
</script>
