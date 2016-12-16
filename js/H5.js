/*内容管理对象*/

var H5 = function ( ) {
	this.id = ('h5_' + Math.random()).replace('.', '_');
	this.el = $('<div class="h5" id= "'+ this.id +'">').hide();
	this.page = [];
	$('body').append( this.el );

	/**
	 *	新增一个页
	 *	@param {string} name 组件的名称，会加入到ClassName中
	 *	@param {string} text 页面的默认文本
	 *	@return {H5} H5对象，可以重复使用H5对象支持的方法
	 */
	this.addPage = function (name, text) {
		var page = $('<div class="h5_page section">');

		if( name != undefined ) {
			page.addClass('h5_page_' + name);
		}
		if( text != undefined ) {
			page.text(text);
		}
		this.el.append( page );
		this.page.push( page );
		if ( typeof this.whenAddPage === 'function' ) {
			this.whenAddPage();
		}
		return this;
			
	}
	/*新增一个组件*/
	this.addComponent = function (name, cfg) {
		var cfg = cfg || {};
		cfg = $.extend({
			type: 'base'

		}, cfg);
		var component;	// 定义一个变量，存储组件元素
		var page = this.page.slice(-1)[0];
		console.log(page);

		switch ( cfg.type ) {
			case 'base':
				component = new H5ComponentBase(name, cfg);
			break;

			case 'polyline':
				component = new H5ComponentPolyline(name, cfg);
			break;

			case 'bar':
				component = new H5ComponentBar(name, cfg);
			break;

			case 'radar':
				component = new H5ComponentRadar(name, cfg);
			break;

			case 'point':
				component = new H5ComponentPoint(name, cfg);
			break;

			case 'bar_v':
				component = new H5ComponentBar_v(name, cfg);
			break;


			default:
		}
		page.append(component);
		return this;
	}

	/*H5对象初始化呈现*/
	this.loader = function(firstPage) {
		this.el.fullpage({
			onLeave: function (index, nextIndex, direction) {
				$(this).find('.h5_component').trigger('onLeave');
			},
			afterLoad: function (anchorLink, index) {
				$(this).find('.h5_component').trigger('onLoad');
			}
		});
		this.page[0].find('.h5_component').trigger('onLoad');
		this.el.show();
		if (firstPage) {
			$.fn.fullpage.moveTo(firstPage);
		}
	}
	
	this.loader = typeof H5_loading == 'function' ? H5_loading : this.loader; 
	
	return this;
};

var H5_loading = function (images, firstPage) {

	var id = this.id;
	console.log(this);

	if (this._images == undefined) { //第一次进入

		this._images = (images || []).length;
		this._loaded = 0;

		window[id] = this; 	//把当前对象存储在全局对象 window中，用来进行某个图片加载完成之后的回调

		for (var i = 0; i < images.length; i++) {
			var item = images[i];
			var img = new Image;
			img.onload = function () {
				window[id].loader();
			} 
			img.src = item;
		}

		$('.loading_rate').eq(0).text('0%');

		return this;
	} else {
		this._loaded ++;
		$('.loading_rate').eq(0).text(((this._loaded / this._images * 100) >> 0) + '%');

		if (this._loaded < this._images) {
			return this;
		}

	}

	window[id] = null;



	this.el.fullpage({
		onLeave: function (index, nextIndex, direction) {
			$(this).find('.h5_component').trigger('onLeave');
		},
		afterLoad: function (anchorLink, index) {
			$(this).find('.h5_component').trigger('onLoad');
		}
	});
	this.page[0].find('.h5_component').trigger('onLoad');
	this.el.show();
	if (firstPage) {
		$.fn.fullpage.moveTo(firstPage);
	}
}
