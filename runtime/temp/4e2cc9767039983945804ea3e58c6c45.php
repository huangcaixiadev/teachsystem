<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:59:"E:\www\tp5\public/../application/index\view\jxsa\neike.html";i:1535184757;}*/ ?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>预约挂号</title>

    <link type="text/css" rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/keshi.css" />

    <script type="text/javascript" src="/tp5/public/static/yuyueguahao/js/inputDate.js"></script>
    <script>
        var newDate = new Date;
        var cur_year = newDate.getFullYear();
        var cur_month = newDate.getMonth() + 1;
    </script>
</head>
<body onload="displayCalendar(cur_year,cur_month)">
<div id = "dataTextContainer">

    <form method="post" action="">
        请选择时间： <input name="dataText" id="dateText" type="text" onfocus="javascript:getCurrentDay();"/>
        <input type="button" name='tijiao'value="确定" id="sousuo"/>
        <input type="hidden" name="ks" id="submit" value="<?php echo $ks; ?>"/>
    </form>

</div>
<div id="calendarContainer"></div>
<div class="top">
    <p><?php echo $ks; ?></p>
</div>
<div class="content">
    <?php if(is_array($val) || $val instanceof \think\Collection || $val instanceof \think\Paginator): $i = 0; $__LIST__ = $val;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
    <div class="biaoxiang">
        <img src="/tp5/public/static/yuyueguahao/img/医生小图标.png"alt="医生图片"/>
        <p><?php echo $vo['name']; ?> <?php echo $vo['zhicheng']; ?></p>
        <a href="<?php echo url('ys',['name'=>$vo['name'],'zhicheng'=>$vo['zhicheng'],'ks'=>$ks]); ?>">进入预约</a>
    </div>

   <?php endforeach; endif; else: echo "" ;endif; ?>
    <div class="biaoxiang2"></div>
</div>
<script type="text/javascript" src="/tp5/public/static/lib/jquery/1.9.1/jquery.min.js"></script>
<!--Ajax提交脚本-->
<script>
    $(function () {
        //ajax方式提交当前表单数据
        $("#sousuo").on("click",function(event){

            $.ajax({
                type:"POST",
                url:"<?php echo url('data'); ?>",
                data: $("form").serialize(),
                dataType:"json",
                success:function(data){
                  if(data.status==1){
                      $(".biaoxiang").hide();
                      $(".biaoxiang2").remove();
                      var te=$("<div class='biaoxiang2'></div>");
                      $("body").append(te);
                     for(var i=0,l=data.data.length;i<l;i++){
                         for(key in data.data[i]){
                             var tem=$("<img src=\"/tp5/public/static/yuyueguahao/img/医生小图标.png\"alt=\"医生图片\"/>");
                             var tem1=$("<p></p>").text(data.data[i].name+"    "+data.data[i].zhicheng);
                             var tem2=$("<a id="+i+">确认预约</a>");
                             tem2.attr("href","<?php echo url('ys',['ks'=>$ks]); ?>?name="+data.data[i].name+"&zhicheng="+data.data[i].zhicheng);
                         }
                         $(".biaoxiang2").append(tem,tem1,tem2);
                     }

                  }else{
                      alert(data.message);
                  }
                }
            });
        })
    })
</script>
</body>
</html>
