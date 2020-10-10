<?php if (!defined('THINK_PATH')) exit(); /*a:4:{s:74:"/www/wwwroot/tlhb.wxjoi.com/public/../application/admin/view/pro/edit.html";i:1569158137;s:70:"/www/wwwroot/tlhb.wxjoi.com/application/admin/view/layout/default.html";i:1562338656;s:67:"/www/wwwroot/tlhb.wxjoi.com/application/admin/view/common/meta.html";i:1562338656;s:69:"/www/wwwroot/tlhb.wxjoi.com/application/admin/view/common/script.html";i:1562338656;}*/ ?>
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
                                <form id="edit-form" class="form-horizontal" role="form" data-toggle="validator" method="POST" action="">

    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Userid'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-userid" data-rule="required" class="form-control" name="row[userid]" type="text" value="<?php echo htmlentities($row['userid']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Title'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-title" data-rule="required" class="form-control" name="row[title]" type="text" value="<?php echo htmlentities($row['title']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Topstatus'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($topstatusList) || $topstatusList instanceof \think\Collection || $topstatusList instanceof \think\Paginator): if( count($topstatusList)==0 ) : echo "" ;else: foreach($topstatusList as $key=>$vo): ?>
            <label for="row[topstatus]-<?php echo $key; ?>"><input id="row[topstatus]-<?php echo $key; ?>" name="row[topstatus]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['topstatus'])?$row['topstatus']:explode(',',$row['topstatus']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Number_url'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-number_url" class="form-control" name="row[number_url]" type="text" value="<?php echo htmlentities($row['number_url']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Description'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-description" class="form-control" name="row[description]" type="text" value="<?php echo htmlentities($row['description']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Keyword'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-keyword" class="form-control" name="row[keyword]" type="text" value="<?php echo htmlentities($row['keyword']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Content'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <textarea id="c-content" data-rule="required" class="form-control editor" rows="5" name="row[content]" cols="50"><?php echo htmlentities($row['content']); ?></textarea>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Image'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-image" data-rule="required" class="form-control" size="50" name="row[image]" type="text" value="<?php echo htmlentities($row['image']); ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-image" class="btn btn-danger plupload" data-input-id="c-image" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="false" data-preview-id="p-image"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-image" class="btn btn-primary fachoose" data-input-id="c-image" data-mimetype="image/*" data-multiple="false"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-image"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-image"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Images'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <div class="input-group">
                <input id="c-images" data-rule="required" class="form-control" size="50" name="row[images]" type="text" value="<?php echo htmlentities($row['images']); ?>">
                <div class="input-group-addon no-border no-padding">
                    <span><button type="button" id="plupload-images" class="btn btn-danger plupload" data-input-id="c-images" data-mimetype="image/gif,image/jpeg,image/png,image/jpg,image/bmp" data-multiple="true" data-preview-id="p-images"><i class="fa fa-upload"></i> <?php echo __('Upload'); ?></button></span>
                    <span><button type="button" id="fachoose-images" class="btn btn-primary fachoose" data-input-id="c-images" data-mimetype="image/*" data-multiple="true"><i class="fa fa-list"></i> <?php echo __('Choose'); ?></button></span>
                </div>
                <span class="msg-box n-right" for="c-images"></span>
            </div>
            <ul class="row list-inline plupload-preview" id="p-images"></ul>
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($statusList) || $statusList instanceof \think\Collection || $statusList instanceof \think\Paginator): if( count($statusList)==0 ) : echo "" ;else: foreach($statusList as $key=>$vo): ?>
            <label for="row[status]-<?php echo $key; ?>"><input id="row[status]-<?php echo $key; ?>" name="row[status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['status'])?$row['status']:explode(',',$row['status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Click'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-click" data-rule="required" class="form-control" name="row[click]" type="number" value="<?php echo htmlentities($row['click']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Lotterytime'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-lotterytime" class="form-control datetimepicker" data-date-format="YYYY-MM-DD HH:mm:ss" data-use-current="true" name="row[lotterytime]" type="text" value="<?php echo $row['lotterytime']?datetime($row['lotterytime']):''; ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price1" data-rule="required" class="form-control" step="0.01" name="row[price1]" type="number" value="<?php echo htmlentities($row['price1']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Full_price1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-full_price1" data-rule="required" class="form-control" step="0.01" name="row[full_price1]" type="number" value="<?php echo htmlentities($row['full_price1']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Number1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-number1" data-rule="required" class="form-control" name="row[number1]" type="number" value="<?php echo htmlentities($row['number1']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Have_only1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-have_only1" data-rule="required" class="form-control" name="row[have_only1]" type="number" value="<?php echo htmlentities($row['have_only1']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Jieshao1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-jieshao1" class="form-control" name="row[jieshao1]" type="text" value="<?php echo htmlentities($row['jieshao1']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Kaijiang1'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-kaijiang1" class="form-control" name="row[kaijiang1]" type="text" value="<?php echo htmlentities($row['kaijiang1']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Yijia1status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($yijia1statusList) || $yijia1statusList instanceof \think\Collection || $yijia1statusList instanceof \think\Paginator): if( count($yijia1statusList)==0 ) : echo "" ;else: foreach($yijia1statusList as $key=>$vo): ?>
            <label for="row[yijia1status]-<?php echo $key; ?>"><input id="row[yijia1status]-<?php echo $key; ?>" name="row[yijia1status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['yijia1status'])?$row['yijia1status']:explode(',',$row['yijia1status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price2" class="form-control" step="0.01" name="row[price2]" type="number" value="<?php echo htmlentities($row['price2']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Full_price2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-full_price2" class="form-control" step="0.01" name="row[full_price2]" type="number" value="<?php echo htmlentities($row['full_price2']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Number2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-number2" class="form-control" name="row[number2]" type="number" value="<?php echo htmlentities($row['number2']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Have_only2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-have_only2" class="form-control" name="row[have_only2]" type="number" value="<?php echo htmlentities($row['have_only2']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Jieshao2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-jieshao2" class="form-control" name="row[jieshao2]" type="text" value="<?php echo htmlentities($row['jieshao2']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Kaijiang2'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-kaijiang2" class="form-control" name="row[kaijiang2]" type="text" value="<?php echo htmlentities($row['kaijiang2']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Yijia2status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($yijia2statusList) || $yijia2statusList instanceof \think\Collection || $yijia2statusList instanceof \think\Paginator): if( count($yijia2statusList)==0 ) : echo "" ;else: foreach($yijia2statusList as $key=>$vo): ?>
            <label for="row[yijia2status]-<?php echo $key; ?>"><input id="row[yijia2status]-<?php echo $key; ?>" name="row[yijia2status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['yijia2status'])?$row['yijia2status']:explode(',',$row['yijia2status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price3'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price3" class="form-control" step="0.01" name="row[price3]" type="number" value="<?php echo htmlentities($row['price3']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Full_price3'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-full_price3" class="form-control" step="0.01" name="row[full_price3]" type="number" value="<?php echo htmlentities($row['full_price3']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Number3'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-number3" class="form-control" name="row[number3]" type="number" value="<?php echo htmlentities($row['number3']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Have_only3'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-have_only3" class="form-control" name="row[have_only3]" type="number" value="<?php echo htmlentities($row['have_only3']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Jieshao3'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-jieshao3" class="form-control" name="row[jieshao3]" type="text" value="<?php echo htmlentities($row['jieshao3']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Kaijiang3'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-kaijiang3" class="form-control" name="row[kaijiang3]" type="text" value="<?php echo htmlentities($row['kaijiang3']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Yijia3status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($yijia3statusList) || $yijia3statusList instanceof \think\Collection || $yijia3statusList instanceof \think\Paginator): if( count($yijia3statusList)==0 ) : echo "" ;else: foreach($yijia3statusList as $key=>$vo): ?>
            <label for="row[yijia3status]-<?php echo $key; ?>"><input id="row[yijia3status]-<?php echo $key; ?>" name="row[yijia3status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['yijia3status'])?$row['yijia3status']:explode(',',$row['yijia3status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price4'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price4" class="form-control" step="0.01" name="row[price4]" type="number" value="<?php echo htmlentities($row['price4']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Full_price4'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-full_price4" class="form-control" step="0.01" name="row[full_price4]" type="number" value="<?php echo htmlentities($row['full_price4']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Number4'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-number4" class="form-control" name="row[number4]" type="number" value="<?php echo htmlentities($row['number4']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Have_only4'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-have_only4" class="form-control" name="row[have_only4]" type="number" value="<?php echo htmlentities($row['have_only4']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Jieshao4'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-jieshao4" class="form-control" name="row[jieshao4]" type="text" value="<?php echo htmlentities($row['jieshao4']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Kaijiang4'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-kaijiang4" class="form-control" name="row[kaijiang4]" type="text" value="<?php echo htmlentities($row['kaijiang4']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Yijia4status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($yijia4statusList) || $yijia4statusList instanceof \think\Collection || $yijia4statusList instanceof \think\Paginator): if( count($yijia4statusList)==0 ) : echo "" ;else: foreach($yijia4statusList as $key=>$vo): ?>
            <label for="row[yijia4status]-<?php echo $key; ?>"><input id="row[yijia4status]-<?php echo $key; ?>" name="row[yijia4status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['yijia4status'])?$row['yijia4status']:explode(',',$row['yijia4status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price5'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price5" class="form-control" step="0.01" name="row[price5]" type="number" value="<?php echo htmlentities($row['price5']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Full_price5'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-full_price5" class="form-control" step="0.01" name="row[full_price5]" type="number" value="<?php echo htmlentities($row['full_price5']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Number5'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-number5" class="form-control" name="row[number5]" type="number" value="<?php echo htmlentities($row['number5']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Have_only5'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-have_only5" class="form-control" name="row[have_only5]" type="number" value="<?php echo htmlentities($row['have_only5']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Jieshao5'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-jieshao5" class="form-control" name="row[jieshao5]" type="text" value="<?php echo htmlentities($row['jieshao5']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Kaijiang5'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-kaijiang5" class="form-control" name="row[kaijiang5]" type="text" value="<?php echo htmlentities($row['kaijiang5']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Yijia5status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($yijia5statusList) || $yijia5statusList instanceof \think\Collection || $yijia5statusList instanceof \think\Paginator): if( count($yijia5statusList)==0 ) : echo "" ;else: foreach($yijia5statusList as $key=>$vo): ?>
            <label for="row[yijia5status]-<?php echo $key; ?>"><input id="row[yijia5status]-<?php echo $key; ?>" name="row[yijia5status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['yijia5status'])?$row['yijia5status']:explode(',',$row['yijia5status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Price6'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-price6" class="form-control" step="0.01" name="row[price6]" type="number" value="<?php echo htmlentities($row['price6']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Full_price6'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-full_price6" class="form-control" step="0.01" name="row[full_price6]" type="number" value="<?php echo htmlentities($row['full_price6']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Number6'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-number6" class="form-control" name="row[number6]" type="number" value="<?php echo htmlentities($row['number6']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Have_only6'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-have_only6" class="form-control" name="row[have_only6]" type="number" value="<?php echo htmlentities($row['have_only6']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Jieshao6'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-jieshao6" class="form-control" name="row[jieshao6]" type="text" value="<?php echo htmlentities($row['jieshao6']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Kaijiang6'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            <input id="c-kaijiang6" class="form-control" name="row[kaijiang6]" type="text" value="<?php echo htmlentities($row['kaijiang6']); ?>">
        </div>
    </div>
    <div class="form-group">
        <label class="control-label col-xs-12 col-sm-2"><?php echo __('Yijia6status'); ?>:</label>
        <div class="col-xs-12 col-sm-8">
            
            <div class="radio">
            <?php if(is_array($yijia6statusList) || $yijia6statusList instanceof \think\Collection || $yijia6statusList instanceof \think\Paginator): if( count($yijia6statusList)==0 ) : echo "" ;else: foreach($yijia6statusList as $key=>$vo): ?>
            <label for="row[yijia6status]-<?php echo $key; ?>"><input id="row[yijia6status]-<?php echo $key; ?>" name="row[yijia6status]" type="radio" value="<?php echo $key; ?>" <?php if(in_array(($key), is_array($row['yijia6status'])?$row['yijia6status']:explode(',',$row['yijia6status']))): ?>checked<?php endif; ?> /> <?php echo $vo; ?></label> 
            <?php endforeach; endif; else: echo "" ;endif; ?>
            </div>

        </div>
    </div>
    <div class="form-group layer-footer">
        <label class="control-label col-xs-12 col-sm-2"></label>
        <div class="col-xs-12 col-sm-8">
            <button type="submit" class="btn btn-success btn-embossed disabled"><?php echo __('OK'); ?></button>
            <button type="reset" class="btn btn-default btn-embossed"><?php echo __('Reset'); ?></button>
        </div>
    </div>
</form>

                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script src="/assets/js/require<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js" data-main="/assets/js/require-backend<?php echo \think\Config::get('app_debug')?'':'.min'; ?>.js?v=<?php echo $site['version']; ?>"></script>
    </body>
</html>