var ticked=0; 
var okayToGo = true; 
var forwardBackward = 1; 
var firstnum = 1; 
var secnum = 2;
var tounum=1; 
var top=document.getElementById("image").offsetHeight+20;
var height=document.getElementById("image").height;
var num=document.getElementsByName("image").length;
document.getElementById("mainid").style.top=top+"px";
document.getElementById("selectimg").style.height=height*Math.ceil(num/2)+3+"px";
function moveItem(firstnum,secnum)
{ 
	if(okayToGo&& firstnum != secnum)//若firstnum!=secnum，则寻找本文档ID为y'X'的元素并将其z轴层次变更
	{ 
		tounum=firstnum; 
		document.getElementById("img"+firstnum).style.zIndex = 10*forwardBackward;
		document.getElementById("img"+secnum).style.zIndex = 20*forwardBackward;
		startTheMove =window.setInterval(function(){rightOrLeft(firstnum,secnum)},20);//指定20毫秒,1000毫秒完成移动,返回调用次数
		//setInterval() 方法可按照指定的周期（以毫秒计）来调用函数或计算表达式。 　　setInterval() 方法会不停地调用函数，直到 clearInterval() 被调用或窗口被关闭。由 setInterval() 返回的 ID 值可用作 clearInterval() 方法的参数。
	} 
}

 
function rightOrLeft(firstnum,secnum) 
{ 
	if (ticked == 1020)//第51次判断
	{
		window.clearInterval(startTheMove); 
		ticked = 0;
		forwardBackward = 1; 
		okayToGo = true; 
	} 
	else 
	{ 
		okayToGo = false; 
		thisAngle = (Math.PI/2)*(ticked/1000);
		//var height=document.getElementById("img")[0].offsetHeight;
		document.getElementById("img"+firstnum).style.left = " "+(735-Math.sin(thisAngle)*700)+"px"; //35-735
		document.getElementById("img"+firstnum).style.top = " "+(85-(forwardBackward*Math.cos(thisAngle)*55))+"px";//85-140 
		document.getElementById("img"+secnum).style.left = " "+(735-Math.sin(thisAngle+Math.PI/2)*700)+"px";//735-35 
		document.getElementById("img"+secnum).style.top = " "+(85-(forwardBackward*Math.cos(thisAngle+Math.PI/2)*55))+"px"; //140-85
		ticked += 20;
	} 
} // JavaScript Document