var menuids=["dropmenu"];

function dropdown_menu(){//ÏÂÀ­²Ëµ¥
	for(var i=0;i<menuids.length;i++){
		var ultags=document.getElementById(menuids[i]).getElementsByTagName("ul");
		for(var t=0;t<ultags.length;t++){
			ultags[t].style.top=ultags[t].parentNode.offsetHeight+"px";
			ultags[t].parentNode.onmouseover=function(){
				this.getElementsByTagName("ul")[0].style.visibility="visible";
			}
			ultags[t].parentNode.onmouseout=function(){
				this.getElementsByTagName("ul")[0].style.visibility="hidden";	
			}
		}
	}
}

if(window.addEventListener){
	window.addEventListener("load",dropdown_menu,false);
}
else if(window.attachEvent){
	window.attachEvent("onload",dropdown_menu);
}