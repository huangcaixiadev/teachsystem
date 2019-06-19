<?php if (!defined('THINK_PATH')) exit(); /*a:6:{s:60:"E:\www\tp5\public/../application/index\view\index\index.html";i:1532397054;s:50:"E:\www\tp5\application\index\view\public\base.html";i:1532391057;s:50:"E:\www\tp5\application\index\view\public\meta.html";i:1532672438;s:52:"E:\www\tp5\application\index\view\public\header.html";i:1532333407;s:50:"E:\www\tp5\application\index\view\public\menu.html";i:1532585058;s:52:"E:\www\tp5\application\index\view\public\footer.html";i:1532672551;}*/ ?>
<!--_meta 作为公共模版分离出去-->
<!DOCTYPE HTML>
<html>
<head>
    <meta charset="utf-8">
    <meta name="renderer" content="webkit|ie-comp|ie-stand">
    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
    <meta name="viewport" content="width=device-width,initial-scale=1,minimum-scale=1.0,maximum-scale=1.0,user-scalable=no" />
    <meta http-equiv="Cache-Control" content="no-siteapp" />
    <link rel="Bookmark" href="favicon.ico" >
    <link rel="Shortcut Icon" href="favicon.ico" />
    <!--[if lt IE 9]>
    <script type="text/javascript" src="/tp5/public/static/lib/html5.js"></script>
    <script type="text/javascript" src="/tp5/public/static/lib/respond.min.js"></script>
    <![endif]-->

    <link rel="stylesheet" type="text/css" href="/tp5/public/static/static/h-ui/css/H-ui.min.css" />
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/static/h-ui.admin/css/H-ui.admin.css" />
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/lib/Hui-iconfont/1.0.8/iconfont.css" />
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/static/h-ui.admin/skin/default/skin.css" />
    <link rel="stylesheet" type="text/css" href="/tp5/public/static/static/h-ui.admin/css/style.css" />
    <!--导入boostrap-->
    <link rel="stylesheet" href="/tp5/public/static/lib/bootstrap/css/bootstrap.min.css" />
    <!--[if IE 6]>
   <!--&lt;!&ndash; <script type="text/javascript" src="http://lib.h-ui.net/DD_belatedPNG_0.0.8a-min.js" ></script>
    <script>DD_belatedPNG.fix('*');</script>
    <![endif]-->
    <!--/meta 作为公共模版分离出去-->


<title><?php echo (isset($title) && ($title !== '')?$title:'页面标题'); ?></title>
<meta name="keywords" content="<?php echo (isset($keywords) && ($keywords !== '')?$keywords:'页面关键字'); ?>">
<meta name="description" content="<?php echo (isset($desc) && ($desc !== '')?$desc:'页面描述'); ?>">

</head>
<body>


<!--_header 作为公共模版分离出去-->
<header class="navbar-wrapper">
    <div class="navbar navbar-fixed-top">
        <div class="container-fluid cl"> <a class="logo navbar-logo f-l mr-10 hidden-xs" href="/aboutHui.shtml">H-ui.admin</a> <a class="logo navbar-logo-m f-l mr-10 visible-xs" href="/aboutHui.shtml">H-ui</a>
            <span class="logo navbar-slogan f-l mr-10 hidden-xs">v3.0</span>
            <a aria-hidden="false" class="nav-toggle Hui-iconfont visible-xs" href="javascript:;">&#xe667;</a>
            <nav class="nav navbar-nav">
                <ul class="cl">
                    <li class="dropDown dropDown_hover"><a href="javascript:;" class="dropDown_A"><i class="Hui-iconfont">&#xe600;</i> 新增 <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" onclick="article_add('添加资讯','article-add.html')"><i class="Hui-iconfont">&#xe616;</i> 资讯</a></li>
                            <li><a href="javascript:;" onclick="picture_add('添加资讯','picture-add.html')"><i class="Hui-iconfont">&#xe613;</i> 图片</a></li>
                            <li><a href="javascript:;" onclick="product_add('添加资讯','product-add.html')"><i class="Hui-iconfont">&#xe620;</i> 产品</a></li>
                            <li><a href="javascript:;" onclick="member_add('添加用户','member-add.html','','510')"><i class="Hui-iconfont">&#xe60d;</i> 用户</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
            <nav id="Hui-userbar" class="nav navbar-nav navbar-userbar hidden-xs">
                <ul class="cl">
                    <li>超级管理员</li>
                    <li class="dropDown dropDown_hover"> <a href="#" class="dropDown_A"><?php echo session('user_info.name'); ?> <i class="Hui-iconfont">&#xe6d5;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <!--<li><a href="javascript:;" onClick="myselfinfo()">个人信息</a></li>
                            <li><a href="#">切换账户</a></li>-->
                            <li><a href="<?php echo url('user/logout'); ?>">退出</a></li>
                        </ul>
                    </li>
                    <li id="Hui-msg"> <a href="#" title="消息"><span class="badge badge-danger">1</span><i class="Hui-iconfont" style="font-size:18px">&#xe68a;</i></a> </li>
                    <li id="Hui-skin" class="dropDown right dropDown_hover"> <a href="javascript:;" class="dropDown_A" title="换肤"><i class="Hui-iconfont" style="font-size:18px">&#xe62a;</i></a>
                        <ul class="dropDown-menu menu radius box-shadow">
                            <li><a href="javascript:;" data-val="default" title="默认（黑色）">默认（黑色）</a></li>
                            <li><a href="javascript:;" data-val="blue" title="蓝色">蓝色</a></li>
                            <li><a href="javascript:;" data-val="green" title="绿色">绿色</a></li>
                            <li><a href="javascript:;" data-val="red" title="红色">红色</a></li>
                            <li><a href="javascript:;" data-val="yellow" title="黄色">黄色</a></li>
                            <li><a href="javascript:;" data-val="orange" title="橙色">橙色</a></li>
                        </ul>
                    </li>
                </ul>
            </nav>
        </div>
    </div>
</header>
<!--/_header 作为公共模版分离出去-->




<!--_menu 作为公共模版分离出去-->
<aside class="Hui-aside">

    <div class="menu_dropdown bk_2">
        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 学生管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>

                    <li><a href="<?php echo url('student/studentList'); ?>" title="学生列表">学生列表</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i>教师管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('teacher/teacherList'); ?>" title="教师列表">教师列表</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i>班级管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>

                    <li><a href="<?php echo url('grade/gradeList'); ?>" title="课程列表">班级列表</a></li>
                </ul>
            </dd>
        </dl>

        <dl id="menu-admin">
            <dt><i class="Hui-iconfont">&#xe62d;</i> 管理员管理<i class="Hui-iconfont menu_dropdown-arrow">&#xe6d5;</i></dt>
            <dd>
                <ul>
                    <li><a href="<?php echo url('user/adminList'); ?>" title="管理员列表">管理员列表</a></li>
                </ul>
            </dd>
        </dl>

    </div>
</aside>
<div class="dislpayArrow hidden-xs"><a class="pngfix" href="javascript:void(0);" onClick="displaynavbar(this)"></a></div>
<!--/_menu 作为公共模版分离出去-->



<section class="Hui-article-box">
	<nav class="breadcrumb"><i class="Hui-iconfont"></i> <a href="/" class="maincolor">首页</a> 
		<span class="c-999 en">&gt;</span>
		<span class="c-666">我的桌面</span> 
		<a class="btn btn-success radius r" style="line-height:1.6em;margin-top:3px" href="javascript:location.replace(location.href);" title="刷新" ><i class="Hui-iconfont">&#xe68f;</i></a></nav>
	<div class="Hui-article">
		<article class="cl pd-20">
			<p class="f-20 text-success">欢迎使用H-ui.admin
				<span class="f-14">v2.3</span>
				后台模版！</p>
			<p>登录次数：<?php echo \think\Session::get('user_info.login_count'); ?> </p>
			<p>上次登录IP：<?php echo \think\Request::instance()->ip(); ?>  上次登录时间：<?php echo date("Y-m-d H:i:s",\think\Session::get('user_info.login_time')); ?></p>

			<table class="table table-border table-bordered table-bg mt-20">
				<thead>
					<tr>
						<th colspan="2" scope="col">服务器信息</th>
			</tr>
		</thead>
				<tbody>
					<tr>
						<th width="30%">服务器计算机名</th>
						<td><span id="lbServerName"><?php echo \think\Request::instance()->host(); ?></span></td>
			</tr>
					<tr>
						<td>服务器IP地址</td>
						<td><?php echo \think\Request::instance()->ip(); ?></td>
			</tr>
					<tr>
						<td>服务器域名</td>
						<td><?php echo \think\Request::instance()->domain(); ?></td>
			</tr>
					<tr>
						<td>当前PHP版本 </td>
						<td><?php echo PHP_VERSION; ?></td>
			</tr>
					<tr>
						<td>服务器版本 </td>
						<td><?php echo PHP_OS; ?></td>
			</tr>
					<tr>
						<td>当前请求URL </td>
						<!--传入参数true,显示包括域名的完整绝对URL请求地址-->
						<!--PHP语言：<?php echo \think\Request::instance()->url(true);?>-->
						<td><?php echo \think\Request::instance()->url(true); ?></td>
			</tr>
					<tr>
						<td>当前Session数量 </td>
						<!--这里用原生$_SESSION,TP5无对应方法-->
						<td><?php echo count($_SESSION); ?></td>
			</tr>
					<tr>
						<td>当前SessionID </td>
						<!--执行原生session_id()方法，因为tp5中无对应请求方法-->
						<td><?php echo session_id(); ?></td>
			</tr>
		</tbody>
	</table>
</article>
		<footer class="footer">
			<p>感谢jQuery、layer、laypage、Validform、UEditor、My97DatePicker、iconfont、Datatables、WebUploaded、icheck、highcharts、bootstrap-Switch<br> Copyright &copy;2015 H-ui.admin v3.0 All Rights Reserved.<br> 本后台系统由<a href="http://www.h-ui.net/" target="_blank" title="H-ui前端框架">H-ui前端框架</a>提供前端技术支持</p>
</footer>
</div>
</section>


<!--_footer 作为公共模版分离出去-->
<script type="text/javascript" src="/tp5/public/static/lib/jquery/1.9.1/jquery.min.js"></script>
<script type="text/javascript" src="/tp5/public/static/lib/layer/2.4/layer.js"></script>
<script type="text/javascript" src="/tp5/public/static/static/h-ui/js/H-ui.js"></script>
<script type="text/javascript" src="/tp5/public/static/static/h-ui.admin/js/H-ui.admin.page.js"></script>
<!--导入boostrap-->
<script type="text/javascript" src="/tp5/public/static/lib/bootstrap/js/bootstrap.min.js"></script>
<!--/_footer /作为公共模版分离出去-->

</body>
</html>