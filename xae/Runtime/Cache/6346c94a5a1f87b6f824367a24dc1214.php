<?php if (!defined('THINK_PATH')) exit();?>﻿<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">

<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>用户注册</title>
<link rel="shortcut icon" href="__PUBLIC__/Information/favicon.ico" />
<link rel="stylesheet" href="__PUBLIC__/CSS/common.css" />
<link rel="stylesheet" href="__PUBLIC__/CSS/app.css" />

<script type="text/javascript" src="__PUBLIC__/javascript/Base.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/prototype.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/mootools.js"></script>
<script type="text/javascript" src="__PUBLIC__/javascript/Ajax/ThinkAjax.js"></script>

<script type="text/javascript">
function freshVerify()
{
	document.getElementById('verifyImg').src='__URL__/verify/'+Math.random();
}
</script>



</head>
<script type="text/javascript">
function check(){
   ThinkAjax.send("__URL__/checkTitle","ajax=1&A_id="+$('A_id').value,'',"result");
   }
function check_info(){
   if(document.form.A_id.value.length<4){
     alert('用户名过短！');
	 return false;
   }else if(document.form.A_id.value.length>12){
     alert('用户名过长！');
	 return false;
   }
   if(document.form.A_code.value.length<4){
     alert('密码过短！');
	 return false;
   }
   if(document.form.A_mail.value.length<4){
     alert('邮箱必须！');
	 return false;
   }else{
     var patten=/^([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+@([a-zA-Z0-9]+[_|\-|\.]?)*[a-zA-Z0-9]+\.[a-zA-Z]{2,3}$/; 
	 if (!patten.test(document.form.A_mail.value)) {
       document.form.A_mail.select();
	   alert('请输入正确的邮箱！');
       return false;
	 }
   }
}
</script>

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
			<div class="separator radius">
			<img src="__PUBLIC__/Information/bulb1.png" width="24" height="30" align="left">&nbsp;&nbsp;新用户注册
			</div>	
			<div class="clr"></div>
            <div class="container" align="center">
            	
        <form name="form" id="form" method="post"  action="__URL__/insert" onsubmit="return check_info();">
  
		
        <table>
                <tr>
                    <td class="diyilie">用户名：</td>
		            <td class="dierlie"><input type="text" name="A_id" id="A_id" class="input_information" style="width:150px;" value="最少四位哦!" onClick="value=''"  /><span style="color:red">&nbsp;&nbsp;*最少4位</span>
		            <input type="button" value="检 查" onClick="check()">
                    <td><div id="result" style="font-size:20px; display:none; color:blue">
		This is result!!!!!!
		</div></td><br /></td>
		        </tr>
		        <tr>
		            <td class="diyilie">邮箱：</td>
					<td class="dierlie"><input type="text" name="A_mail" id="A_mail" class="input_information" style="width:150px;" value="请输入常用的邮箱..." onClick="value=''" /><font color="red">&nbsp;&nbsp;*</font></td>
		        </tr>
		        <tr>
		            <td class="diyilie">设置密码：</td>
		            <td class="dierlie"><input type="password" name="A_code" id="A_code" class="input_information" style="width:150px" /><span style="color:red">&nbsp;&nbsp;*最少4位</span></td>
		        </tr>
		        <tr>
		            <td class="diyilie">确认密码：</td>
		            <td class="dierlie"><input type="password" name="code" class="input_information" style="width:150px" /><font color="red">&nbsp;&nbsp;*</font></td>
		        </tr>
		        <tr>            
					<td class="diyilie">验证码：</td>
					<td class="dierlie">
						<input type="text" name="verifytest" size="6" class="input_information" onclick="value=''" ><font color="red">&nbsp;&nbsp;*</font>
					</td>
				</tr>
				<tr>
					<td class="diyilie">&nbsp;</td>
					<td class="dierlie">
						<img style="cursor:pointer" title="刷新验证码" src="__URL__/verify/"  id="verifyImg" onClick="freshVerify()"/>
					</td>
				</tr>

					<tr>
						<td>&nbsp;
	                    
	                    </td>
	                    <td>
	                    <button type="submit"><img  src="__PUBLIC__/Information/确定.jpg"></button>&nbsp;&nbsp;&nbsp;
	                    <button type="reset"><img  src="__PUBLIC__/Information/取消.jpg"></button>
	                    </td>
                    </tr>
                   </table> 
                </form>
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