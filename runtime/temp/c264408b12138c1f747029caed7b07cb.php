<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:80:"/www/wwwroot/tlhb.wxjoi.com/public/../application/index/view/index/userdata.html";i:1570421344;}*/ ?>
<!DOCTYPE html>
<html style="background: white;">
	<head>
		<meta charset="utf-8">
		<meta name="viewport" content="width=device-width, initial-scale=1.0, minimum-scale=1.0, maximum-scale=1.0, user-scalable=no">
		<meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
		<meta name="renderer" content="webkit" />
		<meta name="robots" content="index, follow" />
		<title>信息填写</title>
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
						信息填写
					</div>
					<img class="headera" onclick="javascript:history.back(-1);" src="/assets/img/img4.png" >
				</div>
				<div class="headerdj"></div>
				
				<div class="wxsq1">
					
					<input class="wxsq1a" name="phone" type="number" value="<?php echo $user['tel']; ?>" placeholder="手机--必填" />
					<input class="wxsq1a" name="name" type="text" value="<?php echo $user['name']; ?>" placeholder="姓名--必填" />
					<input class="wxsq1a" name="address" type="text" value="<?php echo $user['address']; ?>" placeholder="收货地址--必填" />
					<input class="wxsq1a" name="ltdname" type="text" value="<?php echo $user['ltdname']; ?>" placeholder="公司名称--选填" />
										<button class="wxsq1b" type="button">保存</button>
				</div>
				
				
			</div>
		</div>
	</body>
	<script type="text/javascript">
		$('.wxsq1b').click(function(){
			var phone = $("input[name='phone']").val();
			var name = $("input[name='name']").val();
			var address = $("input[name='address']").val();
			var ltdname = $("input[name='ltdname']").val();
			if(phone.length>7 && phone.length<15 && name.length>1 && address.length>1){
				$.post("/index/index/userdata", { phone:phone,name:name,address:address,ltdname:ltdname},
				function(data){
					// console.log(data);
					// alert("Data Loaded: " + data);
					if(data=='ok'){
						alert('修改成功');
						// window.location.href=document.referrer;
						window.location.href='/index/index/index';
					}else{
						// alert('提交出错');
						alert(data);
						window.location.href='/index/index/index';
					}
				});
			}else{
				alert('请正确填写信息');
			}
			
			

		});
	</script>
</html>

