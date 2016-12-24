define([], function() {
	var oGoTop = document.getElementById("go-top");
	oGoTop.onclick = function(){
		var iScrollTop = document.body.scrollTop || document.documentElement.scrollTop;//获取当前位置
		var timer = setInterval( function(){
			// console.log(random());
			window.scrollTo(0 , iScrollTop *= 0.9)
			if(iScrollTop < 1){
				window.scrollTo(0,0);
				clearInterval(timer);
			}
		} ,20)
		return false;
	};
	window.onscroll = function(){
		var iScrollTop = document.body.scrollTop || document.documentElement.scrollTop;//获取当前位置
		if(iScrollTop > 300){
			oGoTop.style.display = "block";
		}else{
			oGoTop.style.display = "none";
		}
	};
});