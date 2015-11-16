(function ($) {
 $(document).ready(function() { 

	$(".sidebar-menu li").click(function(){
			$(this).find('ul').first().toggle("normal");

	});

	 $("#preloader").css({
		 "position": "fixed",
		 "left": "0",
		 "top": "0",
		 "right": "0",
		 "bottom": "0",
		 "background": "white",
		 "z-index": "100500",
	 });

	 $(".spinner").css({
		 "width": "125px",
		 "height": "125px",
		 "position": "absolute",
		 "left": "50%",
		 "top": "50%",
		 "background": "url('/images/Preloader_3.gif') no-repeat 50% 50%",
		 "margin": "-16px 0 0 -16px",
	 });

	 $(window).on('load', function () {

		 var $preloader = $('#preloader'),
			 $spinner   = $preloader.find('.spinner');
		 $spinner.fadeOut();
		 $preloader.delay(350).fadeOut('slow');
	 });

});

})(jQuery);