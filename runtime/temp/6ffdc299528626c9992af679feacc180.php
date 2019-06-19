<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:56:"E:\www\tp5\public/../application/index\view\jxsa\jz.html";i:1535184920;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>预约信息</title>
    <link type="text/css" rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/jiuzhen.css" />
</head>
<body>
<p id="top">预约信息</p>
<p class="yuyue">预约科室：</p><p class="yuyuexiang" id="keshi"><?php echo $sj['ks']; ?><br /><hr />
<p class="yuyue">预约医生：</p><p class="yuyuexiang" id="yisheng"><?php echo $sj['name']; ?><br /><hr />
<p class="yuyue">预约时间：</p><p class="yuyuexiang" id="shijian"><?php echo str_ireplace('+',' ',$sj['date']); ?></p><br /><hr />
<p class="yuyue">挂号费用：</p><p class="yuyuexiang" id="feiyong"><?php echo $sj['feiyong']; ?></p><br /><hr />
<form method="post" action="">
<div>
    <p class="yuyue">就诊人</p>
    <input type="text" placeholder="请点击添加就诊人" id="yuyueren" name="user"/>
    <!--<input type="submit" value="选择就诊人" id="xuanze" />-->
</div><hr />
<div>
    <p class="yuyue">证件号</p>
    <input type="text" placeholder="就诊人身份证号" id="zhengjianhao" name="card"/>
</div><hr />
<p style="color: red;margin: 0px;"><small>请查看以上预约信息，无误请点击确认预约</small></p>
<!--<a href="<?php echo url('denglu'); ?>">-->
<input type="button" value="确认预约" id="queren" />
<!--</a>-->
</form>
<script type="text/javascript" src="/tp5/public/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script>
    $(function(){
        //ajax方式提交当前表单数据
        $("#queren").on("click", function(event){
            $.ajax({
                type: "POST",
                url: "<?php echo url('bc'); ?>",
                data: $("form").serialize(),
                dataType: "json",
                success: function(data){
                    if (data.status == 1) {
                       // alert(data.message);
                        window.location.href="<?php echo url('denglu'); ?>";
                    } else {
                        alert(data.message);

                    }
                }
            });

        })



    })
</script>
</body>
</html>