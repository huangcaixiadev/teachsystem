<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:60:"E:\www\tp5\public/../application/index\view\jxsa\forget.html";i:1535200389;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>找回密码</title>
    <link rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/zhuce.css" />
</head>
<body>
<div class="container" id="content">
    <center><h3>找回密码</h3></center>
    <form method="post">
        <input type="text" id="inputPhone" name="phone" class="form-control" placeholder="请输入手机号码" required="required" >
        <button class="button" id="huoqu">获取验证码</button>

        <input type="text" id="inputNumber" class="form-control" placeholder="请输入验证码" required="required">
        <div id="yanzhengma"></div>
        <p id="yanzheng" class="tishi"></p>


        <input type="password" id="inputPassword" name="newPassword" class="form-control" placeholder="请输入6位密码（字母、数字及符号任意的组合）" required="required">
        <div id="password1"></div>
        <p id="showPassword1" class="tishi"></p>

        <input type="password" id="reputPassword" class="form-control" placeholder="请再次输入密码" required="required">
        <div id="password2"></div>
        <p id="showPassword2" class="tishi"></p>

        <button class="btn btn-lg btn-primary btn-block" type="submit" id="zhuce" disabled="disabled">提交修改</button>
    </form>
</div>

<script src="/tp5/public/static/yuyueguahao/js/jquery-3.3.1.min.js"></script>
<script src="/tp5/public/static/yuyueguahao/js/bootstrap.min.js"></script>
<script src="/tp5/public/static/yuyueguahao/js/forget.js"></script>
<script>
    $(function(){
        var ordertime=60;   //设置再次发送验证码等待时间
        var yanzhengTimer=300;
        var timeleft=ordertime;
        var yanzhengleft=yanzhengTimer;
//按钮计时函数
        function timeCount(){
            //开启定时器
            var timer=setInterval(function(){
                timeleft-=1
                if (timeleft>0){
                    $(".button").text(timeleft+" 秒后重发");
                }
                else {
                    clearInterval(timer);
                    $(".button").text("重新发送");
                    timeleft=ordertime   //重置等待时间
                    $(".button").removeAttr("disabled");
                }
            },1000);
        }

//验证码有效期
        function timerValid(data){
            //var data=data.result;
            // console.log(data);
            //开启定时器
            var timer2=setInterval(function(){
                yanzhengleft-=1;

                //console.log(yanzhengleft);
                // console.log(data);
                //监听是否走完
                if(yanzhengleft<=0){
                    //已经走完,关闭定时器
                    clearInterval(timer2);
                    document.getElementById("yanzhengma").className="wrong";
                    if($("#yanzheng").html().length!=0){
                        $("#yanzheng").html("");

                    }
                    yanzhengleft=yanzhengTimer;
                }else{
                    if($("#inputNumber").val()==data){
                        if($("#yanzheng").html().length!="") {

                            $("#yanzheng").html("");
                        }

                        document.getElementById("yanzhengma").className="right";
                        clearInterval(timer2);
                        yanzhengleft=yanzhengTimer;
                    }else{
                        if($("#inputNumber").val().length>4){
                            document.getElementById("yanzhengma").className="wrong";

                            $("#yanzheng").html("验证码输入有误，请重新输入");
                        }
                    }
                }
            },1000);
        }
        $("#huoqu").click(function(){
            $.ajax({
                type: "POST",//提交方式为POST
                url: "index",//设置提交数据处理的脚本文件地址
                data: { 'phone': $('#inputPhone').val()},//将当前表单的数据序列化以后再提交
                dataType: 'json',//设置提交数据的类型为json
                success: function (data){
                    $(this).attr("disabled",true); //防止多次点击
                    var data=data.result;
                    timeCount();
                    timerValid(data);
                }
            });
        });
      $("#zhuce").click(function(){
          $.ajax({
              type:"POST",
              url:"modify",
              data:$("form").serialize(),
              dataType:'json',
              success:function(data){
                  if(data.status==1){
                      window.location.href="<?php echo url('denglu'); ?>";
                  }else{
                      alert(data.message);
                  }


              }
          });
      });
    });

</script>
</body>
</html>

