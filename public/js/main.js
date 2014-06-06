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

var Logos = (function(){
	var $artDir = $('.art-director');
	var $uiDes = $('.ui-designer');
	var $curr = $artDir;
	var $last = $uiDes;

	return {
		init: function() {
			setTimeout( function(){ $artDir.removeClass('hidden').addClass('flipInX'); }, 2500 );
			setTimeout( function(){ $uiDes.removeClass('hidden').addClass('flipInX'); }, 5000);

			var timer = setTimeout( function run() {
				Logos.changeStates($uiDes);
				timer = setTimeout( run, 5000 );
			}, 7000);
		},
		changeStates: function(elem) {
			if(elem.hasClass('flipInX')) {
				elem.removeClass('flipInX').addClass('flipOutX');
			} else {
				elem.removeClass('flipOutX').addClass('flipInX');
			}
		}
	};
})();

App.init();
Carousel.init();
Logos.init();

$(window).resize(function(){
	App.init();
	Carousel.init();
});
