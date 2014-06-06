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

var Scroll = (function(){
	var amount = 30;
	allow = true;

	$('.portfolio').on('scroll', function(){
		if(!allow) return;

		allow = false;
		if(!$('.scroll').hasClass('active')) {
			$('.scroll').addClass('active');
		}
		var sPerc = 100 * $(this).scrollLeft()/($(this).find('.portfolio-cont').outerWidth() - $(this).outerWidth());
		var number = 0;
		var min = 150;
		var nArr = [];
		for(var i = 0; i < amount; i++) {
			var away = Math.abs(~~(sPerc - i*100/amount));
			if(away < min) {
				min = away;
				number = i;
			}
		}
		scrollIt(number);
		setTimeout(function(){
			allow = true;
		}, 50);
	});

	var scrollIt = function(number) {
		$('.scroll-dot').removeClass('active').removeClass('b-active').removeClass('bb-active');

		if(!(number < 2)) $('.scroll-dot').eq(number-2).addClass('bb-active');
		if(!(number < 1)) $('.scroll-dot').eq(number-1).addClass('b-active');
		$('.scroll-dot').eq(number).addClass('active');
		$('.scroll-dot').eq(number+1).addClass('b-active');
		$('.scroll-dot').eq(number+2).addClass('bb-active');
	}

	var init = function() {
		for(var i = 0; i < amount; i++) {
			$('<div class="scroll-dot"></div>').appendTo('.scroll')/*.css('top', i*80/amount + '%')*/;
		}
		scrollIt(0);
	}

	return { init: init, scrollIt: scrollIt }
})();

App.init();
Carousel.init();
Scroll.init();

$(window).resize(function(){
	App.init();
	Carousel.init();
});
