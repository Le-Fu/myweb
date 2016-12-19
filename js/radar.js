define(['jquery'], function () {

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

			text.css('transition', 'all .1s '+ i/4+'s');

			if (x > w/2) {
				text.css('left', x/2 );

			} else {
				text.css('right', (w-x)/2);

			}
			if (y > h/2) {
				text.css('top', y/2);
				
			} else {
				text.css('buttom', (h-y)/2);

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
			ctx.moveTo(r + Math.sin(0)* r*cfg.data[0][1]*per, r + Math.cos(0)* r*cfg.data[0][1]*per);
			for (var i = 0; i < step; i++) {
				var rad = (2*Math.PI/360)*(360/step)*i;
				var rate = cfg.data[i][1]*per;
				var x = r + Math.sin(rad)* r*rate;
				var y = r + Math.cos(rad)* r*rate;
				ctx.lineTo(x, y);

			}

			ctx.closePath();
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
			for (var i = 0; i < 10; i++) {
				setTimeout(function(){
					s-=.1;
					draw(s);
				}, i*10);
			}
		});

		return component;
	};

	return H5ComponentRadar;
});