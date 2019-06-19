<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"E:\www\tp5\public/../application/index\view\jxsa\zhuce.html";i:1535102122;}*/ ?>
<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>注册页面</title>
    <link rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/bootstrap.min.css"/>
    <script src="/tp5/public/static/yuyueguahao/js/util.js"></script>
    
    <link rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/zhuce.css" />
  </head>
  <body>
    <div class="container" id="content">
    	<img src="/tp5/public/static/yuyueguahao/img/tubiao.png" class="img-responsive" alt="商标图片" />
    	<center>感谢您对口罩服务的支持</center>
      <form action="" method="post">
      <input type="text"  id="inputName" class="form-control" name="name" placeholder="请输入用户名" autofocus required ="required">
      <div id="userName"></div>
      <p id="showName" class="tishi"></p>
      <input type="number" name="phone" id="inputPhone" class="form-control" placeholder="请输入手机号码" required ="required"/><button class="button" id="huoqu" disabled="disabled">获取验证码</button>
      <div id="phoneNumber"></div>
      <p id="userphone" class="tishi"></p>
      <input type="text"  id="inputNumber" name="verify" class="form-control" placeholder="请输入验证码" required ="required">
        <div id="yanzhengma"></div>
      <p id="yanzheng" class="tishi"></p>
      <input type="password" id="inputPassword" class="form-control" placeholder="请输入6位密码（字母、数字及符号任意的组合）" required ="required">
      <img src="/tp5/public/static/yuyueguahao/img/hide.png" alt="隐藏密码"  id="hidePassword"/>
      <div id="password1"></div>
      <p id="showPassword1" class="tishi"></p>
      <input type="password" id="reputPassword" class="form-control" placeholder="请再次输入密码" required="required">
      <div id="password2"></div>
      <p id="showPassword2" class="tishi"></p>
      <label class="checkbox">
          <input type="checkbox" value="remember-me" id="tongyi" checked = "checked">同意条款及声明
      </label>
    <button class="btn btn-lg btn-primary btn-block" type="submit" id="zhuce" disabled="disabled">注册</button>
      </form>
    </div>
    <script src="/tp5/public/static/yuyueguahao/js/validation.js"></script>
    <script src="/tp5/public/static/yuyueguahao/js/jquery-3.3.1.min.js"></script>
	  <script src="/tp5/public/static/yuyueguahao/js/bootstrap.min.js"></script>
  </body>

</html>
