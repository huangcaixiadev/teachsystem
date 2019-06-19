<?php if (!defined('THINK_PATH')) exit(); /*a:1:{s:64:"E:\www\tp5\public/../application/index\view\jxsa\keshi_list.html";i:1535198365;}*/ ?>
<!DOCTYPE html>
<html>
<link>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0"/>
    <title>人民医院普通挂号</title>
    <link type="text/css" rel="stylesheet" href="/tp5/public/static/yuyueguahao/css/putongguahao.css">

</head>
<body>
<div class="biaoti">
    <form name="form1" method="post" >
        <input type="text"  name="keshi" placeholder="请输入科室或医生名称" id="shuru"/>
        <input name="search" type="button" value="搜索" id="search" />
    </form>

</div>

<?php if(is_array($keshiList) || $keshiList instanceof \think\Collection || $keshiList instanceof \think\Paginator): $i = 0; $__LIST__ = $keshiList;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): $mod = ($i % 2 );++$i;?>
<div class="biaoxiang">
    <img src="/tp5/public/static/yuyueguahao/img/科室.png" alt="科室图片"/>
    <a href="<?php echo url('neike',['ks'=>$vo['name']]); ?>">
        <p><?php echo $vo['name']; ?></p>
    </a>
</div>

<?php endforeach; endif; else: echo "" ;endif; ?>



<script type="text/javascript" src="/tp5/public/static/lib/jquery/1.9.1/jquery.min.js"></script>
<!--Ajax提交脚本-->
<script>
     $(function(){
         //给登陆界面添加点击事件
        $("#search").on('click',function(event){
             $.ajax({
                 type: "POST",//提交方式为POST
                 url: "<?php echo url('search'); ?>",//设置提交数据处理的脚本文件地址
                 data: $("form").serialize(),//将当前表单的数据序列化以后再提交
                 dataType: 'json',//设置提交数据的类型为json
                 success: function (data){
                     //只有返回标志位为1，才进行处理
                     if (data.status == 1) {
                         var res=data.data;
                         var res1=data.data1;
                         var len=res.length;
                         var len1=res1.length;
                         console.log(len);
                         console.log(len1);
                         $(".biaoxiang").hide();
                         $(".biaoxiang2").remove();
                         for(var i=0;i<len;i++){
                             for(key in res[i]) {
                                 var tem = $("<img src='/tp5/public/static/yuyueguahao/img/科室.png' alt='科室图片'/>");
                                 var tem1 = $("<a id="+i+"></a>");
                                 var str=$("<p></p>").text(res[i].name);
                                 var ks=res[i].name;
                                 // alert(ks);
                                 tem1.attr("href","<?php echo url('neike'); ?>?ks="+ks);
                                 tem1.append(str);
                                 var te=$("<div class='biaoxiang2'></div>");
                                 te.append(tem,tem1);
                             }

                             //alert(ks);
                            // console.log(ks);


                             $("body").append(te);
                         }


                         //var div='<div id="'+math1+'"></div>';

                         for(var j=0;j<len1;j++){
                             for(key in res1[j]) {
                                 var tem3 = $("<img src='/tp5/public/static/yuyueguahao/img/科室.png' alt='科室图片'/>");
                                 var pdid = 'a' + j;

                                 var tem4=$("<a id="+pdid+"></a>");
                                 var str=$("<p></p>").text(res1[j].name+"    "+res1[j].zhicheng+"    "+res1[j].keshi.name);

                                 //var ks=res1[j].name+' '+res1[j].zhicheng+' '+res1[j].keshi.name;
                                 tem4.attr("href","<?php echo url('ys'); ?>?name="+res1[j].name+"&zhicheng="+res1[j].zhicheng+
                                 "&ks="+res1[j].keshi.name);
                                 tem4.append(str);
                                 var te=$("<div class='biaoxiang2'></div>");
                                 te.append(tem3,tem4);
                             }
                             $("body").append(te);

                         }

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