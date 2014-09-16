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
			setTimeout( function(){ $('.logo-group h1').addClass('active'); $artDir.removeClass('hidden').addClass('flipInX'); }, 2500 );

			setTimeout( function(){ $curr.fadeOut(100);$uiDes.removeClass('hidden').addClass('flipInX'); }, 5000);
			

			var timer = setTimeout( function run() {
				Logos.changeStates($uiDes);
				timer = setTimeout( run, 5000 );
			}, 7000);
		},
		changeStates: function(elem) {
			if(elem.hasClass('flipInX')) {
				elem.removeClass('flipInX').addClass('flipOutX');

				$curr.fadeIn(1500);
			} else {
				elem.removeClass('flipOutX').addClass('flipInX');


				$curr.fadeOut(100);
			}
		}
	};
})();

var Scroll = (function(){
	var amount = 30;
	allow = true;

	$('.portfolio').on('scroll', function(){
		if(!allow) return;

		if($(this).scrollLeft() > 0) {
			$('.start').addClass('faded');
		} else {
			$('.start').removeClass('faded');
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
			$('<div class="scroll-dot"></div>').appendTo('.scroll');
		}
		scrollIt(0);
		setTimeout(function(){
			$('.scroll-it').addClass('loaded');
		}, 1000);
	}

	return { init: init, scrollIt: scrollIt }
})();

var Nav = (function(){
	$(document).on('click', '.nav-item[data-href=about]', function(){
		if($('.portfolio').scrollLeft() == 0) {
			$('.start').removeClass('faded');
		} else {
			$('.portfolio').animate({ scrollLeft : 0 }, 1000);
		}
	});
	$(document).on('click', '.nav-item[data-href=works]', function(){
		$('.start').addClass('faded');
	});
	$(document).on('click', '.nav-item[data-href=contacts]', function(){
		$('.portfolio').animate({ scrollLeft : $('.portfolio-cont').width() }, 1000);
	});
})();

App.init();
Carousel.init();
Logos.init();
Scroll.init();

$(window).resize(function(){
	App.init();
	Carousel.init();
});
