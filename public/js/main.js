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

App.init();

$(window).resize(function(){
	App.init();
});
