<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:76:"/www/wwwroot/tlhb.wxjoi.com/public/../application/admin/view/pro/number.html";i:1573458785;s:70:"/www/wwwroot/tlhb.wxjoi.com/application/admin/view/layout/default.html";i:1562338656;s:67:"/www/wwwroot/tlhb.wxjoi.com/application/admin/view/common/meta.html";i:1562338656;s:69:"/www/wwwroot/tlhb.wxjoi.com/application/admin/view/common/script.html";i:1562338656;}*/ ?>
<!DOCTYPE html>
<html lang="<?php echo $config['language']; ?>">
    <head>
        <meta charset="utf-8">
<title><?php echo (isset($title) && ($title !== '')?$title:''); ?></title>
<meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no">
<meta name="renderer" content="webkit">

<link rel="shortcut icon" href="/assets/img/favicon.ico" />
<!-- Loading Bootstrap -->
<link href="/assets/css/backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.css?v=<?php echo \think\Config::get('site.version'); ?>" rel="stylesheet">

<!-- HTML5 shim, for IE6-8 support of HTML5 elements. All other JS at the end of file. -->
<!--[if lt IE 9]>
  <script src="/assets/js/html5shiv.js"></script>
  <script src="/assets/js/respond.min.js"></script>
<![endif]-->
<script type="text/javascript">
    var require = {
        config:  <?php echo json_encode($config); ?>
    };
</script>
    </head>

    <body class="inside-header inside-aside <?php echo defined('IS_DIALOG') && IS_DIALOG ? 'is-dialog' : ''; ?>">
        <div id="main" role="main">
            <div class="tab-content tab-addtabs">
                <div id="content">
                    <div class="row">
                        <div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
                            <section class="content-header hide">
                                <h1>
                                    <?php echo __('Dashboard'); ?>
                                    <small><?php echo __('Control panel'); ?></small>
                                </h1>
                            </section>
                            <?php if(!IS_DIALOG && !$config['fastadmin']['multiplenav']): ?>
                            <!-- RIBBON -->
                            <div id="ribbon">
                                <ol class="breadcrumb pull-left">
                                    <li><a href="dashboard" class="addtabsit"><i class="fa fa-dashboard"></i> <?php echo __('Dashboard'); ?></a></li>
                                </ol>
                                <ol class="breadcrumb pull-right">
                                    <?php foreach($breadcrumb as $vo): ?>
                                    <li><a href="javascript:;" data-url="<?php echo $vo['url']; ?>"><?php echo $vo['title']; ?></a></li>
                                    <?php endforeach; ?>
                                </ol>
                            </div>
                            <!-- END RIBBON -->
                            <?php endif; ?>
                            <div class="content">
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
				<div class="nchoujiang">
					<div class="nchoujiang02">
						北京日益日新汽车技术服务有限公司
					</div>
					<img class="nchoujiang01" src="/assets/img/img18.jpg" >
					<div class="nchoujiang03">

					<?php for($i=1 ; $i<=6;$i++){

				       if($pro['price'.$i]>0&& $pro['price'.$i]<5000){



				       		if($duan!=0){
								if($duan == $i){  
								 	echo('<a class="nchoujiang03a nchoujiang03a1" href="javascript:;">'.intval($pro['price'.$i]).'元支持<a>');

								}
							       else{ 
							       	echo('<a class="nchoujiang03a nchoujiang03a2" href="/admin/pro/number?id='.$id.'&duan='.$i.'">'.intval($pro['price'.$i]).'元支持<a>');
						       	}
				       		} else{ 
							       	echo('<a class="nchoujiang03a nchoujiang03a2" href="/admin/pro/number?id='.$id.'&duan='.$i.'">'.intval($pro['price'.$i]).'元支持<a>');
						       	}
							 
				       }
				    }?>


					<!-- 	<a class="nchoujiang03a nchoujiang03a1" href="javascript:;">1元<a>
						<a class="nchoujiang03a nchoujiang03a2" href="#">18元</a> -->
					</div>
					<div class="cjxc01">
						<img class="cjxc01img" src="/assets/img/img23.png" >
						<div class="cjxc01b">
							<?php foreach($all as $key=>$val){?>
							<div class="cjxc01a"><?php echo $val['ticket']; ?></div>
							<?php }?>
						</div>
					</div>
					<div class="nzffooter"><img class="kaishi" style="display:none;" src="/assets/img/img19.png" ><img style="display: none;" class="stop" src="/assets/img/img20.png" ></div>
				</div>
			</div>
		</div>
	</body>
</html>
<script type="text/javascript">
	var intervalId, timeoutId;
	var i = 0
	var heightw = '-' + $('.cjxc01b').css('height')


	function choujiang() {
		console.log(11)
		i++
		$('.cjxc01b').css({
			'top': '-' + 292 * i + 'px'
		})

		var topw = $('.cjxc01b').css('top')
		if (heightw == topw) {
			$('.cjxc01b').css({
				'top': '-' + 0 + 'px'
			})
			i = 0

		}
	}
	$('.stop').click(function() {
		var kj="<?php echo $kj; ?>";
		if(kj.length==10){
			 $('.cjxc01a').eq(i).text(kj);

		}
		clearInterval(intervalId);
		$('.kaishi').css({
			'display': 'inline-block'
		})
		$('.stop').css({
			'display': 'none'
		})
		// var duan = ;
		var number = $('.cjxc01a').eq(i).text();
		if(kj.length==10){
			 number = kj;
		}
		// console.log(i,number);

		$.post("/admin/pro/number", {
				number: number,
				id: <?php echo $id; ?>
			},
			function(data) {
				// alert(data); // John
				if (data == number) {
					alert('中奖号:' + data);
				} else {

					alert('异常'+number);
					alert(data);
				}
				// console.log(data.time); //  2pm
			});

	})
	$('.kaishi').click(function() {
		i = 0
		intervalId = setInterval(choujiang, 1);
		$('.kaishi').css({
			'display': 'none'
		})
		$('.stop').css({
			'display': 'inline-block'
		})
	})



	$(document).ready(function(){ 
	　var ykj= "<?php echo $ykj; ?>";
	// alert(ykj);
		if(ykj.length==10){
			$('.cjxc01a').eq(0).text(ykj);
			
			$('.kaishi').hide();
			// alert("已经开奖:"+ykj);
		}else{
			$('.kaishi').show();
		}
	}); 


	// $('#duan').change(function() {
	// 	var duan = $(this).val();
	// 	if (duan > 0) {
	// 		window.location.replace("/admin/pro/number?id=<?php echo $id; ?>&duan=" + duan);
	// 	}
	// });
</script>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>