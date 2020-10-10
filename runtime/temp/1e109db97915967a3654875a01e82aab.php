<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:78:"/www/wwwroot/tlhb.wxjoi.com/public/../application/index/view/index/submit.html";i:1570327331;}*/ ?>
<!DOCTYPE html>
<html style="background: white;">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit" />
		<meta name="robots" content="index, follow" />
		<title>订单信息填写</title>
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
						订单信息填写
					</div>
					<img class="headera" onclick="javascript:history.back(-1);" src="/assets/img/img4.png" >
				</div>
				<div class="headerdj"></div>
				<div class="wddd2" style="margin-bottom:0;">
					<div class="wddd2a">
						<!-- <div class="wddd2aa">
							下单时间：<?php echo(date('Y-m-d H:i:s',$pro['createtime']))?><div class="wddd2aaa">交易成功</div>
						</div> -->
					</div>
					<div class="wddd2bd">
						<div class="wddd2b">
							<div class="wddd2ba"><a href="<?php echo url('/index/index/xqy'); ?>?id=<?php echo $pro['id']; ?>"><img src="<?php echo(explode(',',$pro['images'])[0]); ?>"></a></div>
							<div class="wddd2bb">
								<div class="wddd2bba"><?php echo $pro['title']; ?></div>
								<div class="wddd2bbb"><?php echo $jieshao; ?></div>
								<div class="wddd2bbc">单价：￥<?php echo $pro['price'.$duan]; ?> &nbsp;&nbsp;  实付：￥<?php echo $full_price; ?> <span class="wddd2bbca"><?php echo $number; ?>件</span></div>
							</div>
						</div>
					</div>
				</div>
				<div class="wxsq1">
					<!-- <p>单价:<?php echo $pro['price'.$duan]; ?> * 数量: <?php echo $number; ?>  总价=<?php echo $full_price; ?>元</p>
					<p><?php echo $pro['jieshao'.$duan]; ?></p> -->
					
					<input class="wxsq1a" name="phone" type="number" value="<?php echo $user['tel']; ?>" placeholder="手机--必填" />
					<input class="wxsq1a" name="name" type="text" value="<?php echo $user['name']; ?>" placeholder="姓名--必填" />
					<input class="wxsq1a" name="address" type="text" value="<?php echo $user['address']; ?>" placeholder="收货地址--必填" />
					<input class="wxsq1a" name="ltdname" type="text" value="<?php echo $user['ltdname']; ?>" placeholder="公司名称--选填" />
					<button class="wxsq1b" type="button">提交</button>
				</div>
				
				
			</div>
		</div>
	</body>
	<script type="text/javascript">
		$('.wxsq1b').click(function(){
			var phone = $("input[name='phone']").val();
			var ltdname = $("input[name='ltdname']").val();
			var name = $("input[name='name']").val();
			var address = $("input[name='address']").val();

			if(phone.length>7 && phone.length<15 && name.length>1){
					// alert("id"+"<?php echo $id; ?>"+"pay"+1+"phone"+phone+"ltdname"+ltdname+"name"+name+"address"+address)
				$.post("/index/index/submit", {"duan":"<?php echo $duan; ?>", "number":"<?php echo $number; ?>","id":"<?php echo $id; ?>","pay":1,"phone":phone,"ltdname":ltdname,"name":name,"address":address},
					function(data){
							// alert('jQuery版本：' + $.fn.jquery);
					
					// // console.log(data);
					// alert("Data"+ data);
					if(data.length==16){
						// window.location.href = "/index/index/pay?order="+data;
						window.location.href = "/pay/wxpay.php?order="+data+"&price=<?php echo $full_price; ?>&title=<?php echo $pro['title']; ?>";
					}else{
						alert("Data Loaded: " + data);
					}
				});
			
				
			}else{
				alert('请填写正确的信息:'+phone+ltdname);
			}
			
			

			// $.post("/index/index/submit", { duan: duan, number:number,id:<?php echo $id; ?>,pay:1,phone:phone,ltdname:ltdname},
			// function(data){
			// 	alert("Data Loaded: " + data);
			// });

		});
	</script>
</html>

