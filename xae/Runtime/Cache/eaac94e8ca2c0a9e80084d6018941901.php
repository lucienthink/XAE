<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>西安电子科技大学云计算</title>
<link rel="shortcut icon" href="__PUBLIC__/Information/favicon.ico" /><!--窗口图标-->
<link rel="stylesheet" href="__PUBLIC__/CSS/common.css" type="text/css"/>
<link rel="stylesheet" href="__PUBLIC__/CSS/app.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/CSS/log.css" type="text/css" />
</head>

<body>

<meta http-equiv="content-type" content="text/html;charset=utf-8">
<link rel="stylesheet" href="__PUBLIC__/CSS/temp.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/CSS/common.css" type="text/css" />
<link rel="stylesheet" href="__PUBLIC__/CSS/app.css" type="text/css" />
<script language="javascript" src="__PUBLIC__/javascript/dropmenu.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/prototype.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/mootools.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Ajax/ThinkAjax.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Form/CheckForm.js"></script>
<script language="JavaScript">
<!--
ThinkAjax.updateTip = '<IMG SRC="__PUBLIC__/Information/loading2.gif" WIDTH="16" HEIGHT="16" BORDER="0" ALT="loading..." align="absmiddle"> 数据处理中...';
//-->
</script>
<div id="hd">
<div id="top_box">
	<div id="logo">
		<a href="__URL__/index"><img src="__PUBLIC__/Information/logo.png" height="70" width="130" id="logo1"></a>
	</div>
	<div id="top_content">
		<div class="hlinks strong">
		 <div class="bluetabs" style="float:right;position:relative;"><!--其中内嵌style="float:right;"与CSS样式中的float:right不一样-->
		 <ul id="dropmenu">
         
<?php
	if(isset($_SESSION[C('USER_AUTH_KEY')]) && true === $_SESSION['login']){
echo "
    	<li><a href='__URL__/userinfoshow'>";
echo $_SESSION['account'];
echo "</a>&nbsp;|&nbsp;</li>
		<li><a href='__URL__/logout'>注销</a>&nbsp;|&nbsp;</li>";
	}else{
echo <<<EOF
    	<li><a href="__URL__/login">登录</a>&nbsp;|&nbsp;</li>
		<li><a href="__URL__/register">注册</a>&nbsp;|&nbsp;</li>
EOF;
    }

?>

		 <li><a href="#">开发资料</a><img src="__PUBLIC__/Information/drop.png" />&nbsp;|&nbsp;
			 <ul>
			 <li><a href="__APP__/Index/DevCenter">部署代码</a></li>
			 <li><a href="__APP__/Index/Doc">文档中心</a></li>
			 <li><a href="__APP__/Index/API">API文档</a></li>
			 <li><a href="__APP__/Index/FAQ">FAQs</a></li>
			 </ul>
		 </li>
		 <li><a href="__APP__/Index/suggestion">意见反馈</a></li>
		 </ul>
		 </div>
		 <div class="clr"></div><!--清除设置的浮动效果，否则下一个层将置顶-->
		 </div>
		 <div id="top_nav">
		 <ul class="nav">
		 <li><a href="__APP__/Index/index" class="selected"><span id="selected">首页</span><br><span class="eng_size">HOME</span></a></li>
		 <li><a href="__APP__/Index/application"><span>应用</span><br><span class="eng_size">APPLICATION</span></a></li>
		 <li><a href="__APP__/Index/DevCenter"><span>开发者中心</span><br><span class="eng_size">DEVELOPER CENTER</span></a></li>
		 <li><a href="__APP__/Index/FAQ"><span>常见问题</span><br><span class="eng_size">FAQs</span></a></li>
		 <li><a href="__APP__/Index/applications"><span>应用发布</span><br><span class="eng_size">APPLICATION PUBLIC</span></a></li>
		 </ul>
		 </div>
	</div>
	<div class="clr"></div>
</div>

</div>

<div id="line">
	<div id="nav_cur">
	<img src="__PUBLIC__/Information/cursor.png" width="16" height="20" id="cursor">	</div>
	</div>
<script language="javascript" type="text/javascript" src="__PUBLIC__/javascript/fix.js"></script>

<div id="doc">
	<div id="body">
		<div id="main">
			<div class="padding_top">	
			
				<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<link href="__PUBLIC__/CSS/common.css" type="text/css"  rel="stylesheet"/>
<link href="__PUBLIC__/CSS/temp.css" type="text/css" rel="stylesheet" />

    <ul id="menu">
        <li id="whatnav" style="color:#ff2424;">XAE是什么</li><!--初始化为红色-->
        <li id="whynav">为何选择XAE</li>
        <li id="hownav">开始使用XAE</li>
    </ul>
<div id="picBox">
	<table border="0" cellpadding="0" cellspacing="0" id="show_pic" style="left:-1px;"><!--这个没了是不能动的.-->
    	<tr>
        <td><!--what_pane-->
		<div class="pane" id="what" style="display:block;">
            
			<div class="img-div">
			<img src="__PUBLIC__/Information/XAE是什么.jpg"/>
			</div>
			<div class="threeparts">
				<div class="left">
                    <div class="grey">
                        <strong>3分钟完成一个Web应用</strong>
                        <div id="how-video-box"><a href="#" target="_blank"><img src="__PUBLIC__/Information/xae视频.jpg" width="182" height="130" style="margin:0 3px;"/></a></div>	
                    </div>
				</div>
				<div class="middle">
					<div class="grey">
						<strong>环境和服务</strong>
						<ul class="blue" style="list-style-type:disc;">
							<li><a href="http://cn.php.net" target="_blank">PHP5</a></li>
							<li><a href="http://www.mysql.com" target="_blank">MySQL</a></li>
							<li><a href="http://memcached.org" target="_blank">Memcache</a></li>
							<li><a href="http://www.crontab.com" target="_blank">Crontab</a></li>
							<li><a href="#" target="_blank">Mail</a></li>
						</ul>
					</div>
				</div>
				<div class="right">
					<div class="grey">
						<strong>最近更新</strong>
						<ul class="blue" id="news">
							<li><a target="_blank" href="#">服务变更通知</a></li>
							<li><a target="_blank" href="#">XAE正式开放注册！</a></li>
							<li><a target="_blank" href="#" style="color:red;">老用户升级必看</a></li>
							<li><a target="_blank" href="#">更多</a></li>
						</ul>
					</div>	
				</div>
			</div><!--threeparts-->
            </div>
			</td>
        <td><!--why_pane-->
		<div class="pane" id="why">
				<div class="img-div">
				<img src="__PUBLIC__/Information/为何选择XAE.jpg" />
                </div>
				<div class="threeparts">
					<div class="left">
						<div class="grey">
							<strong>开发更便捷</strong>
							<ul class="blue">
								<li><span class="blue">在线创建、配置、调优应用</span></li>
								<li><span class="blue">操作简单的多平台版本SDK</span></li>
								<li><span class="blue">友好的API调用接口</span></li>
								<li><span class="blue">方便的团队协作管理</span></li>
								<li><span class="blue">可在线检索的服务日志</span></li>
							</ul>
						</div>
					</div>
					
					<div class="right">
						<div class="grey">
						<strong>服务更可靠</strong>
						<ul class="blue">
							<li><span class="blue">基于成熟的LAMP架构</span></li>
							<li><span class="blue">前端自动负载均衡</span></li>
							<li><span class="blue">SandBox保证的良好隔离</span></li>
							<li><span class="blue">数据全冗余分布式架构</span></li>
							<li><span class="blue">可靠安全的数据传输存储</span></li>
						</ul>		
						</div>	
					</div>
					
					<div class="middle">
						<div class="grey">
							<strong>运行更高效</strong>
							<ul class="blue">
								<li><span class="blue">无限水平扩展设计</span></li>
								<li><span class="blue">分布式数据存储服务</span></li>
								<li><span class="blue">键值分布式缓存服务</span></li>
								<li><span class="blue">众多可选用的增强服务</span></li>
								<li><span class="blue">同步/异步通讯支持</span></li>
							</ul>
						</div>
					</div><!--middle-->
				</div>            	
            </div>
			</td>
        <td>
		<div class="pane" id="how">
					<div class="img-div">
						<img src="__PUBLIC__/Information/开始使用XAE.jpg"/>					
                    </div>
					<div class="threeparts">
						<div class="left">
							<div class="grey">
								<strong>观看视频教学</strong>
								<ul class="blue">
									<li><a href="#">创建应用</a></li>
									<li><a href="#">Memcache的使用</a></li>
									<li><a href="#">Crontab的使用</a></li>
								</ul>	
							</div>
						</div>
						<div class="middle">
							<div class="grey">
								<strong>查阅开发资源</strong>
								<ul class="blue">
									<li><a href="__APP__/Index/Doc" target="_blank">文档中心</a></li>
									<li><a href="#">教程汇总</a></li>
								</ul>
							</div>
						</div>
						<div class="right">
							<div class="grey">
								<strong>和我们交流</strong>
							<ul class="blue">
								<li><a href="__APP__/Index/suggestion">意见反馈</a></li>
								<li><a href="#" target="_blank">开发博客</a></li>
								<li><a href="http://t.xidian.edu.cn/" target="_blank">西电微博</a></li>
							</ul>		
							</div>	
						</div>
					</div>
			</div>
			</td>
            </tr>
            </table>
  </ul>
</div>

<script language="javascript" src="__PUBLIC__/javascript/shift.js" type="text/javascript"></script>

				
			</div>
		</div><!--main-->
		<div class="padding_top"></div>
			<div id="rightbody">
				<div class="loginbox">
					﻿<meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
<link rel="stylesheet" href="../Public/__PUBLIC__/CSS/log.css" type="text/css" />
<link rel="stylesheet" href="../Public/__PUBLIC__/CSS/common.css" type="text/css" />
<script language="javascript">
function check_info(){
   if(document.home_form.A_id.value.length<4){
     alert('用户名过短！');
	 return false;
   }
   if(document.home_form.A_code.value.length<4){
     alert('密码过短！');
	 return false;
   }
}
</script>


<?php
if(isset($_SESSION[C('USER_AUTH_KEY')]) && true === $_SESSION['login']){
echo '<br />';
echo '欢迎&nbsp;&nbsp;&nbsp;';
echo '<font size="4">'.$_SESSION['account'].'</font>';
echo <<<EOF
 &nbsp;&nbsp;&nbsp;光临!<br /><br />
 &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp; &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
<a href="__URL__/userinfoshow"> >>>>查看个人资料 </a>
EOF;
}else{
echo <<<EOF
<form name="home_form" method="post" action="__URL__/checkUser" onsubmit="return check_info();">
<div class="log">
	<div>
		<div class="account">用户名：</div>
		<div class="input_name"><input style="width:110px" type="text" id="A_id" name="A_id"/></div>
		 <div class="zhmm"><a href="__URL__/register">
		 <img src="__PUBLIC__/Information/免费注册.gif"  width="50" height="20"></a></div>
	</div>
		<br />
	<div>
		<div class="password">密码：</div>
		<div class="input_pwd"><input type="password" style="width:110px" id="A_code" name="A_code" /></div>
		<div class="zhmm"><a href="__URL__/forget">
		<img src="__PUBLIC__/Information/找回密码.jpg" width="50" height="20"></a></div>
	</div>
		<br />
	<div><button type="submit">
	<img src="__PUBLIC__/Information/登录.jpg"></button>
	</div>
</div>
</form>
EOF;
}
?>


				</div>
			<div class="newbox" id="beijingtu">
			<div>
			<ul>
			<marquee scrollamount='1' scrolldelay='10' direction= 'UP' onmouseover='this.stop()' onmouseout='this.start()' width=180 height=150>
			<li style="text-align:center"><a href="http://www.baidu.com">西电云计算正式发布</a></li>
			<li style="text-align:center"><a href="#">西电云计算成员名单</a></li>
			<li style="text-align:center"><a href="#">西电云计算不告诉你</a></li>
			<li style="text-align:center"><a href="#">西电云计算最新通告</a></li>
			<li style="text-align:center"><a href="#">西电云计算不告诉你</a></li>
			</marquee>
			</ul>
			</div>
			</div>
		</div>
	</div>
</div>

<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<div class="clr"></div>
<div id="line"></div>
<div id="bottom">
	<div>
		<p>
		<label>开发资源</label>
		<span><a href="#">SDK下载</a>&nbsp;|&nbsp;</span>
		<span><a href="__APP__/Index/Doc">文档中心</a>&nbsp;|&nbsp;</span>
		<span><a href="#">API文档</a>&nbsp;|&nbsp;</span>
		<span><a href="__APP__/Index/FAQ">常见问题</a></span>
		</p>
	</div>
	<p class="right">CopyRight &copy;2011 西安电子科技大学.All rights reserved. </p>
</div>

<script language="javascript">
var main_bottom = document.getElementById("main").getBoundingClientRect().bottom;
var body_top = document.getElementById("body").getBoundingClientRect().top;
var body_height=document.getElementById("body").style.height=main_bottom-body_top+"px";
</script>