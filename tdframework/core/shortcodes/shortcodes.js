
jQuery(document).ready(function() {

	// Tabs shortcode
	//
	jQuery('.shortcode-tabs').each(function() {
		var tabContainer = jQuery(this);
		var tabTitleList = jQuery('.shortcode-tabs .titles', tabContainer);
		var tabContentList = jQuery('.shortcode-tabs .content', tabContainer);
		var contentWidth = tabContainer.width();

		// Tab buttons
		jQuery('.shortcode-tab .shortcode-tab-title', this).each(function(index, element) {
			var tabTitle = jQuery(this);
			var tabContent = tabTitle.next();

			// Move title into title container
			tabTitle.detach();
			tabTitleList.append(tabTitle);

			// Move content into content container
			tabContent.detach();
			tabContentList.append(tabContent);

			// Hide all but the first tab
			if (index > 0)
				tabContent.hide();
			else
				tabTitle.addClass('active');

			// Tab title click
			tabTitle.click(function() {
				if (tabContent.css('display') !== 'none')
					return;

				// Toggle tab style and content visibility
				tabContainer.find('.shortcode-tab .shortcode-tab:visible').slideUp(200);
				tabTitleList.find('.active').removeClass('active');
				tabContent.slideDown(200);

				tabTitle.addClass('active');
			});
		});
	});

	// Tabs Title arrows
	//
	jQuery('.shortcode-tabs.left .shortcode-tab-title').each(function() {
		var tabItem =  jQuery(this);
		tabItem.append('<i class="icon-angle-right"></i> ');
	});
	//
	jQuery('.shortcode-tabs.right .shortcode-tab-title').each(function() {
		var tabItem =  jQuery(this);
		tabItem.prepend('<i class="icon-angle-left"></i> ');
	});

	// Toggle shortcode
	//
	jQuery('.shortcode-toggle > li > div.header').each(function(index, element) {
		element = jQuery(element);
		var content = element.siblings('div.content');
		var arrow = element.find('span.arrow');
		var icon = element.find('.icon');

		arrow.css('top', ((element.outerHeight(true) / 2) - (arrow.outerHeight(true) / 2)) + 'px');

		element.bind('mouseenter', function() {
			arrow.stop(true, true).animate({right: '-5px'}, 200);
		});

		element.bind('mouseleave', function() {
			arrow.stop(true, true).animate({right: '5px'}, 200);
		});

		element.bind('click', function() {
			if (content.hasClass('visible')) {
				content.stop(true, true).slideUp(300);
				content.removeClass('visible');
				icon.removeClass('icon-minus');
				icon.addClass('icon-plus');
				icon.removeClass('active');
			} else {
				content.stop(true, true).slideDown(300);
				content.addClass('visible');
				icon.removeClass('icon-plus');
				icon.addClass('active');
				icon.addClass('icon-minus');
			}
		});
	});

	// To top divider
	jQuery('.shortcode-divider.totop > a.totop').bind('click', function() {
		jQuery('html, body').animate({scrollTop: 0}, 300);
		return false;
	});

	// Thumbnail CA Slider
	jQuery('.shortcode-tdacs').tinycarousel({ interval: true, display: 1, intervaltime: 2500, duration: 1500 });

    var maxWidth = 380;
    var minWidth = 105;
    jQuery('.lastblock').animate({width: maxWidth+"px"}, { queue:false, duration:800});
    var lastBlock = jQuery(".lastblock");

    jQuery(".overview li img").hover(
      function(){
        jQuery(lastBlock).animate({width: minWidth+"px"}, { queue:false, duration:800});
        jQuery(this).parent().parent().animate({ width: maxWidth+"px"}, { queue:false, duration:800});
        lastBlock = jQuery(this).parent().parent();
      }
    );


});
jQuery(window).ready(function() {
	// Thumbnail CA Slider
	jQuery('.shortcode-tdacs .overview').animate({opacity: 1}, { queue:false, duration:1000});



});


/*Progress Bar Script */
function mainProgressBar(pID, percent, elementName){
	var elemName = '#' + pID.replace(/ /g,'');
	var progressBarWidth = percent * jQuery(elemName).width() / 100;
	jQuery(elemName).find('div.main-pbar').animate({ width: progressBarWidth }, 3000);
	jQuery('.title-pblk').hide().fadeIn('slow');
}


/**
 * Tiny Carousel
 * A lightweight jQuery plugin
 * http://baijs.nl/tinycarousel/
 *
 * @since Mikmag 2.0
 */
(function(a){function b(b,c){function r(){k=q?a(g[0]).outerWidth(true):a(g[0]).outerHeight(true);var b=Math.ceil((q?e.outerWidth():e.outerHeight())/(k*c.display)-1);l=Math.max(1,Math.ceil((g.length+3)/c.display)-b);m=Math.min(l,Math.max(1,c.start))-2;f.css(q?"width":"height",k*(g.length+3));d.move(1);s()}function s(){if(c.controls&&i.length>0&&h.length>0){i.click(function(){d.move(-1);return false});h.click(function(){d.move(1);return false})}if(c.interval){b.hover(d.stop,d.start)}if(c.pager&&j.length>0){a("a",j).click(u)}}function t(){if(c.controls){i.toggleClass("disable",!(m>0));h.toggleClass("disable",!(m+1<l))}if(c.pager){var b=a(".pagenum",j);b.removeClass("active");a(b[m]).addClass("active")}}function u(b){if(a(this).hasClass("pagenum")){d.move(parseInt(this.rel),true)}return false}function v(){if(c.interval&&!o){clearTimeout(n);n=setTimeout(function(){m=m+1==l?-1:m;p=m+1==l?false:m==0?true:p;d.move(p?1:-1)},c.intervaltime)}}var d=this;var e=a(".viewport:first",b);var f=a(".overview:first",b);var g=f.children();var h=a(".next:first",b);var i=a(".prev:first",b);var j=a(".pager:first",b);var k,l,m,n,o,p=true,q=c.axis=="x";this.stop=function(){clearTimeout(n);o=true};this.start=function(){o=false;v()};this.move=function(a,b){m=b?a:m+=a;if(m>-1&&m<l){var d={};d[q?"left":"top"]=-(m*k*c.display);f.animate(d,{queue:false,duration:c.animation?c.duration:0,complete:function(){if(typeof c.callback=="function")c.callback.call(this,g[m],m)}});t();v()}};return r()}a.tiny=a.tiny||{};a.tiny.carousel={options:{start:1,display:1,axis:"x",controls:true,pager:false,interval:false,intervaltime:2e3,rewind:true,animation:true,duration:1e3,callback:null}};a.fn.tinycarousel=function(c){var c=a.extend({},a.tiny.carousel.options,c);this.each(function(){a(this).data("tcl",new b(a(this),c))});return this};a.fn.tinycarousel_start=function(){a(this).data("tcl").start()};a.fn.tinycarousel_stop=function(){a(this).data("tcl").stop()};a.fn.tinycarousel_move=function(b){a(this).data("tcl").move(b-1,true)};})(jQuery)


