<?php if (!defined('THINK_PATH')) exit();?><!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>应用-推荐应用</title>
<link rel="shortcut icon" href="__PUBLIC__/Information/favicon.ico" />
<link rel="stylesheet" href="__PUBLIC__/CSS/common.css" />
<link rel="stylesheet" href="__PUBLIC__/CSS/app.css" />
<link>
</head>

<script type="text/javascript">
function get_name1(){ 
   if(document.app_form1.app_id.value=="--请选择应用--"){
     alert('请选择应用！');
     return false;
   }
}
function get_name2(){
   if(document.app_form2.app_id.value=="--请选择应用--"){
     alert('请选择应用！');
     return false;
   }
}

</script>

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
<li><a href='__APP__/Index/logout'>注销</a>&nbsp;|&nbsp;</li>";
	}else{
echo <<<EOF
    	<li><a href="__APP__/Index/login">登录</a>&nbsp;|&nbsp;</li>
		<li><a href="__APP__/Index/register">注册</a>&nbsp;|&nbsp;</li>
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
		 <li><a href="__APP__/Index/index" ><span >首页</span><br><span class="eng_size">HOME</span></a></li>
		 <li><a href="__APP__/Index/application" class="selected"><span id="selected">应用</span><br><span class="eng_size">APPLICATION</span></a></li>
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
		<div class="navigation">
			<ul id="menu">

<?php
if(isset($_SESSION[C('USER_AUTH_KEY')]) && true === $_SESSION['login']){
echo <<<Eof
	<li><a href="__URL__/Myapp">我的应用</a></li>
Eof;
}
?>
			<li><a class="selected" href="#">推荐应用</a></li>
<?php
if(isset($_SESSION[C('USER_AUTH_KEY')]) && true === $_SESSION['login']){

echo <<<Eof
	<li><a href="__APP__/File/index">上传应用</a></li>
Eof;
}
?>		
			</ul>
		</div>
		<div id="main">
			<div class="separator radius">
			<img  src="__PUBLIC__/Information/bulb1.png" width="24" height="30" align="left">&nbsp;&nbsp;推荐应用
			</div>
			<div class="clr"></div>
			<div class="app">
				<div class="app_image"><img  src="__PUBLIC__/Information/wordpress.png"  border="0"/></div>
				<div class="app_introduce">
					<div class="app_introduce_title">Wordpress for XAE</div><br />
					<div><span style="color:#70019C">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;基于wordpress3.1.2中文版修改而成的XAE一键开发专用版本!</span></div>
				</div>
	<?php
		if (isset($_SESSION[C('USER_AUTH_KEY')]) && true === $_SESSION['login'])
			{
	?>			
			<form method="post" action="__URL__/getName" name="app_form1">  
				<div calss="app_load">
				<div class="app_select">
				<SELECT id="app_id" style="text-align:center;" name="app_id" style="width:110px;">
				<OPTION width="200" selected="selected" value="--请选择应用--">--请选择应用--</OPTION>                		
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><OPTION  width="200" value="<?php echo ($vo["C_id"]); ?>"><?php echo ($vo["C_id"]); ?></OPTION><?php endforeach; endif; else: echo "" ;endif; ?>
            		        </SELECT>
				</div>
				<input class="app_button" type="submit" value="立即安装" 
				onmouseover="this.className='app_button_over'" onmouseout="this.className='app_button'">
				</div>
			</form>
			
	<?php
			}
	?>
		</div>	

			<div class="app">
			<div class="app_image"><img  src="__PUBLIC__/Information/discuz.png"  border="0"/></div>
				<div class="app_introduce">
					<div class="app_introduce_title">Discuz for XAE</div><br />
					<div><span style="color:#70019C">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;基于discuzX2修改而成的XAE一键开发专用版本!</span></div>
				</div>
	<?php
		if(isset($_SESSION[C('USER_AUTH_KEY')]) && true === $_SESSION['login'])
			{
	?>
			<form method="post" action="__URL__/getName1" name="app_form2">  
				<div class="app_load">
				<div class="app_select">
				<SELECT id="app_id" style="text-align:center;" name="app_id" style="width:110px;">
				<OPTION width="200" selected="selected" value="--请选择应用--">--请选择应用--</OPTION>                		
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><OPTION width="200" value="<?php echo ($vo["C_id"]); ?>"><?php echo ($vo["C_id"]); ?></OPTION><?php endforeach; endif; else: echo "" ;endif; ?>
            		        </SELECT>
				</div>
				<input class="app_button" type="submit" value="立即安装" 
				onmouseover="this.className='app_button_over'" onmouseout="this.className='app_button'">
				</div>
			</form>
	<?php			
			}
	?>
			</div>
			<div class="app">
			<div class="app_image"><img  src="__PUBLIC__/Information/ecshop.jpg"  border="0"/></div>
				<div class="app_introduce">
					<div class="app_introduce_title">ECShop for XAE</div><br />
					<div><span style="color:#70019C">&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;基于ECShop修改而成的XAE一键开发专用版本!</span></div>
				</div>
	<?php
		if(isset($_SESSION[C('USER_AUTH_KEY')]) && true === $_SESSION['login'])
			{
	?>
			<form method="post" action="__URL__/getName2" name="app_form3">  
				<div class="app_load">
				<div class="app_select">
				<SELECT id="app_id" style="text-align:center;" name="app_id" style="width:110px;">
				<OPTION width="200" selected="selected" value="--请选择应用--">--请选择应用--</OPTION>                		
				<?php if(is_array($list)): $i = 0; $__LIST__ = $list;if( count($__LIST__)==0 ) : echo "" ;else: foreach($__LIST__ as $key=>$vo): ++$i;$mod = ($i % 2 )?><OPTION width="200" value="<?php echo ($vo["C_id"]); ?>"><?php echo ($vo["C_id"]); ?></OPTION><?php endforeach; endif; else: echo "" ;endif; ?>
            		        </SELECT>
				</div>
				<input class="app_button" type="submit" value="立即安装" 
				onmouseover="this.className='app_button_over'" onmouseout="this.className='app_button'">
				</div>
			</form>
	<?php			
			}
	?>
			</div>
		</div>
	</div>
<!--<div>各个浏览器解析问题，不要加该div-->

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

</body>
</html>