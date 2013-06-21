/**
 *glide.layerGlide((oEventCont,oSlider,sSingleSize,sec,fSpeed,point);
 *@param auto type:bolean �Ƿ��Զ����� ��ֵ��true��ʱ�� Ϊ�Զ�����
 *@param oEventCont type:object �����¼�������������
 *@param oSlider type:object ��������
 *@param sSingleSize type:number ���������ﵥ��Ԫ�صĳߴ磨width����height��  �ߴ�����point ����
 *@param second type:number �Զ��������ӳ�ʱ��  ��λ/��
 *@param fSpeed type:float   ���� ȡֵ��0.05--1֮�� ��ȡֵ��1ʱ  û�л���Ч��
 *@param point type:string   left or top
 */
var glide =new function(){
	function $id(id){return document.getElementById(id);};
	this.layerGlide=function(auto,oEventCont,oSlider,sSingleSize,second,fSpeed,point){
		var oSubLi = $id(oEventCont).getElementsByTagName('li');
		var interval,timeout,oslideRange;
		var time=1; 
		var speed = fSpeed;
		var sum = oSubLi.length;
		var a=0;
		var delay=second * 1000; 
		var setValLeft=function(s){
			return function(){
				oslideRange = Math.abs(parseInt($id(oSlider).style[point]));	
				$id(oSlider).style[point] =-Math.floor(oslideRange+(parseInt(s*sSingleSize) - oslideRange)*speed) +'px';
				if(oslideRange==[(sSingleSize * s)]){
					clearInterval(interval);
					a=s;
				}
			}
		};
		var setValRight=function(s){
			return function(){	 	
				oslideRange = Math.abs(parseInt($id(oSlider).style[point]));							
				$id(oSlider).style[point] =-Math.ceil(oslideRange+(parseInt(s*sSingleSize) - oslideRange)*speed) +'px';
				if(oslideRange==[(sSingleSize * s)]){
					clearInterval(interval);
					a=s;
				}
			}
		};
		
		function autoGlide(){
			for(var c=0;c<sum;c++){oSubLi[c].className='';oSubLi[c].style.color="#0060fb";}
			clearTimeout(interval);
			if(a==(parseInt(sum)-1)){//parseInt(sum)��3�����a=3-1�������ʼΪ��һ��block
				for(var c=0;c<sum;c++){oSubLi[c].className='';}
				a=0;
				oSubLi[a].className="active";
				oSubLi[a].style.color="#ff2424";
				
				interval = setInterval(setValLeft(a),time);
				timeout = setTimeout(autoGlide,delay);
			}else{//a!=3-1ʱ�������л�
				a++;
				oSubLi[a].className="active";
				oSubLi[a].style.color="#ff2424";
				interval = setInterval(setValRight(a),time);	
				timeout = setTimeout(autoGlide,delay);
			}
		}
	
		if(auto){timeout = setTimeout(autoGlide,delay);};
		for(var i=0;i<sum;i++){	
			oSubLi[i].onmouseover = (function(i){
				return function(){
					for(var c=0;c<sum;c++){oSubLi[c].className='';oSubLi[c].style.color="#0060fb";};
					clearTimeout(timeout);
					clearInterval(interval);
					oSubLi[i].className="active";
					oSubLi[i].style.color="#ff2424";
					if(Math.abs(parseInt($id(oSlider).style[point]))>[(sSingleSize * i)]){
						interval = setInterval(setValLeft(i),time);
						this.onmouseout=function(){if(auto){timeout = setTimeout(autoGlide,delay);};};
					}else if(Math.abs(parseInt($id(oSlider).style[point]))<[(sSingleSize * i)]){
							interval = setInterval(setValRight(i),time);
						this.onmouseout=function(){if(auto){timeout = setTimeout(autoGlide,delay);};};
					}
				}
			})(i)
		}
	}
}
glide.layerGlide(true,'menu','show_pic',610,5,0.05,'left');