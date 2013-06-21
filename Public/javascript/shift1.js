var n;
n=1;
setTimeout('change_img()',5000);//5Ãë
function change_img(){
	if(n>4)n=1;
	setTimeout('set_layer('+n+')',5000);
	n++;
	st=setTimeout('change_img()',5000);
}
function set_layer(i){
	switch(i){
		case 1:
		document.getElementById("what").style.display="block";
		document.getElementById("why").style.display="none";
		document.getElementById("how").style.display="none";
		document.getElementById("whatnav").style.color="#ff2424";
		document.getElementById("whynav").style.color="#0060bf";
		document.getElementById("hownav").style.color="#0060bf";
		break;
		case 2:
		document.getElementById("what").style.display="none";
		document.getElementById("why").style.display="block";
		document.getElementById("how").style.display="none";
		document.getElementById("whatnav").style.color="#0060bf";
		document.getElementById("whynav").style.color="#ff2424";
		document.getElementById("hownav").style.color="#0060bf";
		break;
		case 3:
		document.getElementById("what").style.display="none";
		document.getElementById("why").style.display="none";
		document.getElementById("how").style.display="block";
		document.getElementById("whatnav").style.color="#0060bf";
		document.getElementById("whynav").style.color="#0060bf";
		document.getElementById("hownav").style.color="#ff2424";
		break;
	}
}