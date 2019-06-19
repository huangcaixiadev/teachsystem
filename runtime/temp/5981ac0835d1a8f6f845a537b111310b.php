<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\www\tp5\public/../application/index\view\jxsa\denglu.html";i:1535189023;}*/ ?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>登录</title>
    <link rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/bootstrap.min.css" />
    <link rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/denglu.css" />
</head>
<body>
	<img src="/tp5/public/static/yuyueguahao/img/tubiao.png" alt="图标" id="tubiao" class="center-block img-circle"/>
    <div class="container">
        <form action="" method="post">
    	<input type="text" class="inputMsg" id="userName" name='name' placeholder="请输入用户名或手机号" required="required"/>
    	<input type="password" class="inputMsg" id="mima" name='password' placeholder="请输入密码" required="required"/>

                <div class="yanzhengma">
                    <input name="verify" class="shuru" type="text" placeholder="验证码" onblur="if(this.value==''){this.value='验证码:'}" onclick="if(this.value=='验证码:'){this.value='';}" value="">
                    <img id="verify_img" src="<?php echo captcha_src(); ?>" class="tupian">
                    <a id="kanbuq" href="javascript:refreshVerify();"><small>换一张</small></a>
                </div>

    	<p id="xianshi"></p>
        <button type="button" class="btn btn-primary btn-lg btn-block" id="denglu">登陆</button>
        </form>

    	<p class="forget"><a href="<?php echo url('forget'); ?>">忘记密码?</a></p>
    	<p class="zhuce"><a href="<?php echo url('register'); ?>">注册一个账号</a></p>
    </div>
    <script src="/tp5/public/static/yuyueguahao/js/denglu.js"></script>
    <script src="/tp5/public/static/yuyueguahao/js/util.js"></script>
    <script src="/tp5/public/static/yuyueguahao/js/jquery-3.3.1.min.js"></script>
	<script src="/tp5/public/static/yuyueguahao/js/bootstrap.min.js"></script>
    <script>
        function refreshVerify(){
            var ts = Date.parse(new Date())/1000;
            $("#verify_img").attr("src","<?php echo captcha_src(); ?>?id="+ts); //刷新验证码
        }
    </script>
</body>
</html>