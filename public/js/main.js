var App = (function(){
	var $window = $(window);
	var $header = $('header');
	var $main = $('main');

	return {
		init: function() {
			this.alignHeight();
		},
		alignHeight: function() {
			$main.height( $(window).height() - $header.outerHeight() );
		},
		reinit: function() {
			this.init();
		}
	};
})();

var Carousel = (function(){
	var $item = $('.carousel-item');
	var $container = $('.portfolio-cont');

	return {
		init: function() {
			$item.width( $(window).width() );
			var width = 0;
			$item.each( function(){
				width += $(this).width();
			});
			console.log(width);
			$container.width( width );
		}
	};
})();

App.init();
Carousel.init();

$(window).resize(function(){
	App.init();
	Carousel.init();
});
