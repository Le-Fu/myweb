/*基本图文组件对象*/

var H5ComponentBase = function (name, cfg) {
	var cfg = cfg || {};
	var id = ('h5_c_' + Math.random()).replace('.', '_');

	//把当前的组件类型添加到样式中进行标记
	var cls = ' h5_component_' + cfg.type;
	var component = $('<div class="h5_component '+ cls +' h5_component_name_' + name + '" id="'+id+'">');

	cfg.text && component.text(cfg.text);
	cfg.width && component.width(cfg.width/2);
	cfg.height && component.height(cfg.height/2);

	cfg.css && component.css(cfg.css);
	cfg.bg && component.css('backgroundImage', 'url(' + cfg.bg + ')');

	if (cfg.center === true) {
		component.css({
			marginLeft: (-1 * cfg.width/4) + 'px',
			left: '50%'
		})
	}
	if (cfg.relativeTo) {
		var reference = $('body').find('.h5_component_name_' + cfg.relativeTo).offset();		
		if (cfg.center === true) {
			reference.left = 0;
		}
		component.css('transform', 'translate(' + reference.left + 'px, ' + reference.top + 'px)');
	}

	// 很多自定义的参数
	if (typeof cfg.onclick === 'function') {
		component.on('click', cfg.onclick);
	} 

	component.on('onLoad', function() {

		setTimeout(function () {
			component.addClass(cls + '_load').removeClass(cls + '_leave');
			cfg.animateIn && component.animate(cfg.animateIn);
		}, cfg.delay || 0);

		return false;
	});
	component.on('onLeave', function() {
		
		setTimeout(function () {
			component.addClass(cls + '_leave').removeClass(cls + '_load');
			cfg.animateOut && component.animate(cfg.animateOut);
		}, cfg.delay || 0);
		
		return false;
	});
	return component;
};


/*柱子图组件对象*/

var H5ComponentBar = function (name, cfg) {
	var component = new H5ComponentBase(name, cfg);	

	$.each(cfg.data, function (index, item) {

		var line = $('<div class="line"></div>');
		var name = $('<div class="name"></div>');
		var rate = $('<div class="rate"></div>');
		var per = $('<div class="per"></div>');

		var width = item[1]*100 + '%';

		var bgStyle = '';
		if (item[2]) {
			bgStyle = 'style = "background-color:'+ item[2] +'"' 
		} 
		rate.html('<div class="bg" '+bgStyle+'></div>');
		rate.css('width', width);

		name.text(item[0]);

		per.text(width);

		line.append(name).append(rate).append(per);

		component.append(line);


	});


	return component;
};

/* 垂直柱图组件对象 */

var H5ComponentBar_v =function ( name, cfg ) {

  //  (1) 完成 component 的初始化定义（补全 var component = ???）
  var component = new H5ComponentBar(name, cfg);
  //(2) 完成 width 每个柱图中项目的宽度计算。（补全 var width = ???）
  var width = (100 / cfg.data.length ) >> 0;//删除小数点后的数
  component.find('.line').width( width + '%');
  
  $.each( component.find('.rate') ,function(){
      var w = $(this).css('width');
      //(3) 把进度区的宽度重设为高度，并且取消原来的宽度
      $(this).height(w).width(''); 
  });

  $.each( component.find('.per'),function(){
      //(4) 重新调整 DOM 结构，把百分比数值(.per)添加到 进度区 (.rate)中，和色块元素(.bg)同级。提示，获得 进度区 元素：$(this).prev() 
      $(this).appendTo( $(this).prev() );
  })

  return component;
}

/*散点图组件对象*/

var H5ComponentPoint = function (name, cfg) {
	var component = new H5ComponentBase(name, cfg);	

	var base = cfg.data[0][1]; //以第一个数据的比例为大小的100%

	//	输出每个 point
	$.each( cfg.data, function(index, item) {
		var point = $('<div class="point point_'+ index +'">');

		var name = $('<div class="name">'+ item[0] +'</div>')
		var rate = $('<div class="rate">'+ (item[1]*100) + '%' +'</div>')

		name.append(rate);
		point.append(name);

		var per = (item[1] / base * 100) + '%';
		point.width(per).height(per);

		if(item[2])	{
			point.css('backgroundColor', item[2]);
		}

		if(item[3] !== undefined && item[4] !== undefined )	{
			point.css({
				left: item[3],
				top: item[4]
			});
			//暂存left、top到元素上
			point.data('left', item[3]).data('top', item[4]);
		}

		// 设置zIndex、重设位置
		point.css('zIndex', 100-index);
		point.css('left', 0).css('top', 0);


		point.css('transition', 'all 1s ' + index*0.5 + 's');
		component.append( point );
	} );

	//onLoad之后去除暂存的left、top 并且附加到CSS中
	component.on('onLoad', function () {
		component.find('.point').each(function (index, item) {
			$(item).css('left', $(item).data('left')).css('top', $(item).data('top'));
		});
	});

	//onLeave 之后，还原初始的位置
	component.on('onLeave', function () {
		component.find('.point').each(function (index, item) {
			$(item).css('left', 0).css('top', 0);
		});
	});

	component.find('.point').on('click',function(){

	    component.find('.point').removeClass('point_focus');
	    $(this).addClass('point_focus');

	    return false;
	}).eq(0).addClass('point_focus')


	return component;
};

/*折线图组件对象*/

var H5ComponentPolyline = function (name, cfg) {
	var component = new H5ComponentBase(name, cfg);	

	//	绘制网格线
	var w = cfg.width;
	var h = cfg.height;

	//加入一个画布（网格线背景） ---背景层
	var cns = document.createElement('canvas');
	var ctx = cns.getContext('2d');
	cns.width = ctx.width = w;
	cns.height = ctx.height = h;
	component.append(cns);

	//水平网格线 100 份 --> 10 份
	var step_x = 10;
	ctx.beginPath();
	ctx.lineWidth = 1;
	ctx.strokeStyle = "#aaa";

	window.ctx = ctx;
	for (var i = 0; i <= step_x; i++) {
		var y = (h / step_x) *i;
		ctx.moveTo(0, y);
		ctx.lineTo(w, y);	
	}
	
	//垂直网格线
	var step_v = cfg.data.length+1;
	var text_w = w / step_v >> 0;

	for (var i = 0; i <= step_v; i++) {
		var x = (w / step_v)*i;
		ctx.moveTo(x, 0);
		ctx.lineTo(x, h);	

		if (cfg.data[i]) {
			var myText = $('<div class="myText"></div>');
			myText.text(cfg.data[i][0]);
			myText.css('width', text_w).css('left', x/2);

			component.append(myText);
		} 
	}

	ctx.stroke();

	//加入一个画布（网格线背景） ---数据层
	var cns = document.createElement('canvas');
	var ctx = cns.getContext('2d');
	cns.width = ctx.width = w;
	cns.height = ctx.height = h;
	component.append(cns);

	


	/**
	*	绘制折线以及对应的数据的阴影
	*	@param  {float} per 0到1之间的数据，会根据这个值绘制最终数据对应的中间状态
	*	@return {DOM} component 
	*
	*/

	var draw = function (per) {

		// 清空画布
		ctx.clearRect(0, 0, w, h);
		//绘制折线数据
		ctx.beginPath();
		ctx.lineWidth = 3;
		ctx.strokeStyle = "#ff8878";

		var x = 0;
		var y = 0;
		var row_w = (w / (cfg.data.length+1)) ;
		//画点
		for (var i = 0; i < cfg.data.length; i++) {
			var item = cfg.data[i] ;

			x = row_w * (i+1);
			y = h - (item[1]*h*per);

			ctx.moveTo(x, y);
			ctx.arc(x, y, 5, 0, 2*Math.PI);	
		}
		//连线
		//移动画笔到第一个点的位置

		ctx.moveTo(row_w, h-(cfg.data[0][1]*h*per));
		for (var i = 0; i < cfg.data.length; i++) {
			var item = cfg.data[i] ;
			x = row_w * (i+1);
			y = h - (item[1]*h*per);
			ctx.lineTo(x, y);
		}

		ctx.stroke();

		ctx.strokeStyle = 'rgba(255, 136, 120, 0)';
		//绘制阴影
		ctx.lineTo(x, h);
		ctx.lineTo(row_w, h);
		ctx.fillStyle = 'rgba(255, 136, 120, 0.20)';
		ctx.fill();

		//写数据
		for (var i = 0; i < cfg.data.length; i++) {
			var item = cfg.data[i] ;

			x = row_w * (i+1);
			y = h - (item[1]*h*per);
			ctx.fillStyle = item[2] ? item[2] : '#595959';

			ctx.fillText((item[1]*100>>0)+'%', x-10, y-10);
		}
	}	


	component.on('onLoad', function (){
		//数据生长动画
		var s= 0;
		for (var i = 0; i < 100; i++) {
			setTimeout(function(){
				s+=.01;
				draw(s);
			}, i*10+500);
		}
	});

	component.on('onLeave', function (){
		//数据生长动画
		var s= 1;
		for (var i = 0; i < 100; i++) {
			setTimeout(function(){
				s-=.01;
				draw(s);
			}, i*10);
		}
	});

	return component;
};

/*雷达图组件对象*/

var H5ComponentRadar = function (name, cfg) {
	var component = new H5ComponentBase(name, cfg);	

	//	绘制网格线---背景层
	var w = cfg.width;
	var h = cfg.height;

	//加入一个画布（网格线背景） 
	var cns = document.createElement('canvas');
	var ctx = cns.getContext('2d');
	cns.width = ctx.width = w;
	cns.height = ctx.height = h;
	component.append(cns);

	var r = w/2;
	var step = cfg.data.length;

/*	ctx.beginPath();
	ctx.arc(r, r, 5, 0, 2*Math.PI);
	ctx.stroke();	

	ctx.beginPath();
	ctx.arc(r, r, r, 0, 2*Math.PI);
	ctx.stroke();*/

	//计算一个圆周上的坐标（计算多边形顶点坐标）；
	//已知： 圆心坐标(a, b)、半径 r 角度 deg
	//rad = (2*Math.PI/360)*(360/step)*i
	//x = a + Math.sin(rad)* r;
	//y = b + Math.cos(rad)* r;

	//绘制网格背景（分面绘制，分10份）
	var isBlue = false;
	for (var s=10; s>0; s--) {

		ctx.beginPath();
		for (var i = 0; i < step; i++) {
			var rad = (2*Math.PI/360)*(360/step)*i;

			var x = r + Math.sin(rad)* r *(s/10);
			var y = r + Math.cos(rad)* r *(s/10);
			ctx.lineTo(x, y);
		}	

		ctx.closePath();

		ctx.fillStyle = (isBlue = !isBlue) ? '#99c0ff' : '#f1f9ff';

		ctx.fill();
	}

	//绘制伞骨
	for (var i = 0; i < step; i++) {
		var rad = (2*Math.PI/360)*(360/step)*i;

		var x = r + Math.sin(rad)* r;
		var y = r + Math.cos(rad)* r;
		ctx.moveTo(r, r);
		ctx.lineTo(x, y);
		//输出项目文字
		var text = $('<div class="text"></div>');
		text.text(cfg.data[i][0]);
		
		text.css('transition', 'all .5s '+ i/2+'s')

		if (x > w/2) {
			text.css('left', x/2+5);

		} else {
			text.css('right', (w-x)/2+5);

		}
		if (y > h/2) {
			text.css('top', y/2+5);
			
		} else {
			text.css('bottom', (h-y)/2+5);

		}
		if (cfg.data[i][2]) {
			text.css('color', cfg.data[i][2]);
		}
		text.css('opacity', 0);

		component.append(text);

	}
	ctx.strokeStyle = '#e0e0e0';
	ctx.stroke();

	//数据层
	var cns = document.createElement('canvas');
	var ctx = cns.getContext('2d');
	cns.width = ctx.width = w;
	cns.height = ctx.height = h;
	component.append(cns);	
	
	ctx.strokeStyle = '#f00';
	var draw = function (per) {
		if (per<=1) {
			component.find('.text').css('opacity', 0);
		}
		if (per>=1) {
			component.find('.text').css('opacity', 1);
		}

		ctx.clearRect(0, 0, w, h);

		//输出数据的折线
		for (var i = 0; i < step; i++) {
			var rad = (2*Math.PI/360)*(360/step)*i;
			var rate = cfg.data[i][1]*per;
			var x = r + Math.sin(rad)* r*rate;
			var y = r + Math.cos(rad)* r*rate;
			ctx.lineTo(x, y);

		}
		// ctx.closePath();
		ctx.stroke();

		//输出数据的点

		ctx.fillStyle = '#ff7676';
		for (var i = 0; i < step; i++) {
			var rad = (2*Math.PI/360)*(360/step)*i;
			var rate = cfg.data[i][1]*per;
			var x = r + Math.sin(rad)* r*rate;
			var y = r + Math.cos(rad)* r*rate;

			ctx.beginPath();
			ctx.arc(x, y, 5, 0, 2*Math.PI);
			ctx.fill();
			ctx.closePath();
		}

	}	

	component.on('onLoad', function (){
		//数据生长动画
		var s= 0;
		for (var i = 0; i < 100; i++) {
			setTimeout(function(){
				s+=.01;
				draw(s);
			}, i*10+500);
		}
	});

	component.on('onLeave', function (){
		//数据生长动画
		var s= 1;
		for (var i = 0; i < 100; i++) {
			setTimeout(function(){
				s-=.01;
				draw(s);
			}, i*10);
		}
	});

	return component;
};