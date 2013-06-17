(function($) {

	// Thumbnail CA Slider
	$('.shortcode-tdacs').tinycarousel({ interval: true, display: 1, intervaltime: 2500, duration: 1000 });

    var maxWidth = 380;
    var minWidth = 105;
    $('#lastblock').animate({width: maxWidth+"px"}, { queue:false, duration:800});
    var lastBlock = $("#lastblock");

    $(".overview li img").hover(
      function(){
        $(lastBlock).animate({width: minWidth+"px"}, { queue:false, duration:800});
        //$(lastBlock).next().animate( { width: minWidth+"px"}, { queue:false, duration:800 });
        $(this).parent().parent().animate({ width: maxWidth+"px"}, { queue:false, duration:800});
        lastBlock = $(this).parent().parent();
      }
    );

})(jQuery);