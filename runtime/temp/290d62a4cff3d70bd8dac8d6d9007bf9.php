<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"E:\www\tp5\public/../application/index\view\jxsa\ys.html";i:1534831788;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>预约挂号</title>
    <link type="text/css" rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/yisheng.css" />
    <link type="text/css" href="/tp5/public/static/yuyueguahao/css/yisheng320.css" rel="stylesheet" media="screen and (max-device-width:320px)"/>
</head>
<body>
<div id="top">
    <img src="/tp5/public/static/yuyueguahao/img/医生中图标.png" />
    <div id="right">
        <?php echo $name; ?> <?php echo $ks; ?> <?php echo $zhicheng; ?><br />
        擅长：
    </div>
</div>
<div id="biaoti">
    <p><?php echo $ks; ?></p>
</div>
<div id="shijian">
    <?php if(is_array($result) || $result instanceof \think\Collection || $result instanceof \think\Paginator): $i = 0; $__LIST__ = $result;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="liexiang">
        <p class="riqi"><?php echo $vo['time']; ?></p>
        <p class="feiyong1">挂号费：</p><p class="feiyong2" style="color: red;"><?php echo $vo['feiyong']; ?></p>
        <?php if(($vo['statue']==1)): ?>
        <a href="<?php echo url('jz',['name'=>$name,'ks'=>$ks,'date'=>$vo['time'],'feiyong'=>$vo['feiyong']]); ?>">
            <div class="queding">立即预约</div>
        </a>
        <?php else: ?>
        <div class="queding" >已约满</div>
        <?php endif; ?>
    </div>
    <hr />
    <?php endforeach; endif; else: echo "" ;endif; ?>
</div>
</body>