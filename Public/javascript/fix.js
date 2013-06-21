function changeAgain(){
	var left=document.getElementById("selected").getBoundingClientRect().left;
	var right=document.getElementById("selected").getBoundingClientRect().right;
	var change=document.getElementById("nav_cur").style.left=(left+right-30)/2+7+"px";
	setTimeout("changeAgain()",100);
}
changeAgain();