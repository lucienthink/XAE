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
	if(okayToGo&& firstnum != secnum)//��firstnum!=secnum����Ѱ�ұ��ĵ�IDΪy'X'��Ԫ�ز�����z���α��
	{ 
		tounum=firstnum; 
		document.getElementById("img"+firstnum).style.zIndex = 10*forwardBackward;
		document.getElementById("img"+secnum).style.zIndex = 20*forwardBackward;
		startTheMove =window.setInterval(function(){rightOrLeft(firstnum,secnum)},20);//ָ��20����,1000��������ƶ�,���ص��ô���
		//setInterval() �����ɰ���ָ�������ڣ��Ժ���ƣ������ú����������ʽ�� ����setInterval() �����᲻ͣ�ص��ú�����ֱ�� clearInterval() �����û򴰿ڱ��رա��� setInterval() ���ص� ID ֵ������ clearInterval() �����Ĳ�����
	} 
}

 
function rightOrLeft(firstnum,secnum) 
{ 
	if (ticked == 1020)//��51���ж�
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