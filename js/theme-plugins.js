-

jQuery(document).ready(function(){
// Target your #container, #wrapper etc.
    jQuery("#wrapper").fitVids();

    jQuery('#container').each(function(index, element) {
    	var element = jQuery(element);
    	element.css({ 'opacity': 0});
    });


    // Sub Menu Item Arrows
	jQuery('#site-navigation #theme-menu-main li').each(function(index, element) {
		var item = jQuery(element);
		var parent = jQuery('#theme-menu-main > li:first-child');
		var subMenu = item.children('ul');
		var isSubmenu = item.parent().hasClass('sub-menu');

		// Add dropdown indicators
		if ( parent && item.children().hasClass('sub-menu') && !isSubmenu ) {
			var arrowDown = ' <i class="icon-plus"></i>';
			//item.children('a').append(arrowDown);
		}

		// Submenus in submenus
		if (isSubmenu && subMenu.length) {
			var arrowRight = ' <i class="icon-plus"></i>&nbsp;&nbsp;';
			item.children('a').append(arrowRight);
		}

	});

	// Collapsible Menu
	jQuery('#theme-sidebar-menu li').each(function(index, element) {
		var item = jQuery(element);
		var parent = jQuery('#theme-sidebar-menu > li:first-child');
		var subMenu = item.children('ul');
		var isSubmenu = item.parent().hasClass('sub-menu');

		// Add dropdown indicators
		// parent
		if ( parent && item.children().hasClass('sub-menu') && !isSubmenu ) {
			var contentHtml = item.children('a').html();
			item.children('a').html('<span>' + contentHtml + '</span>');
			var iconPlus = ' <i class="icon-plus"></i>';
			item.children('a').append(iconPlus);
		}

		// Submenus in submenus
		if (isSubmenu && subMenu.length) {
			var iconPlus = ' <i class="icon-plus"></i>';
			item.children('a').append(iconPlus);
		}

	});

	jQuery('#theme-sidebar-menu li a [class^="icon-"], #theme-sidebar-menu li a [class*=" icon-"]').each(function(index, element) {
		var item = jQuery(element);

		item.click(function(e) {
			e.preventDefault();

			if( item.hasClass('icon-plus') ){
				item.removeClass('icon-plus');
				item.addClass('icon-minus');
			} else {
				item.removeClass('icon-minus');
				item.addClass('icon-plus');
			}

			item.parent().next('.sub-menu').slideToggle(400);
		});
	});


	// Append arrows to some elements
	var rarr = jQuery('<i class="icon-double-angle-right"> </i>');
	jQuery('.widget li > a:first-child').each(function(index, element) {
			element = jQuery(element);
			if( !element.parents(".widget").hasClass('widget_td_categories') && !element.parents(".widget").hasClass('widget_themedutch_posts') )
				element.prepend(rarr);
	});

	// Input field placeholder text
	jQuery('input[placeholder]').each(function(index, element) {
		var element = jQuery(element);

		var placeholderText = element.attr('placeholder');
		if (!placeholderText === '')
			return;
		element.removeAttr('placeholder');

		// Place first placeholder
		if (element.val() === '') {
			element.val(placeholderText);
			element.addClass('placeholderActive');
		}

		element.bind('focus', function() {
			if (element.val() === placeholderText) {
				element.val('');
				element.removeClass('placeholderActive');
			}
		});
		element.bind('blur', function() {
			if (element.val() === '') {
				element.val(placeholderText);
				element.addClass('placeholderActive');
			}
		});
	});

    // show the back top link
    toTop();

    // Setup PrettyPhoto links
	//
	jQuery('a[data-rel^="prettyPhoto"]').prettyPhoto({
		animationSpeed: 'normal', /* fast/slow/normal */
		slideshow: 3000,
		autoplay_slideshow: false,
		theme: "pp_default", /*pp_default/light_rounded/dark_rounded/dark_square/light_square/facebook */
		opacity: 0.35, /* Value between 0 and 1 */
		hook: 'data-rel',
		showTitle: false /* true/false */
	});

	// Responsive Menu (TinyNav)
	jQuery("#theme-menu-main").tinyNav({
		active: 'current_page_item', // Set the "active" class for default menu
		label: '', // String: Sets the <label> text for the <select> (if not set, no label will be added)
	    header: '', // String: Specify text for "header" and show header instead of the active item
	});

	// Responsive Menu (Selectbox)
	jQuery(function () {
	    jQuery(".tinynav").selectbox();
	});

	// Cleanup empty p tags
	jQuery('p').each(function(index, element) {
		element = jQuery(element);
		if ( element.html() === '' || element.html() === '<br>')
			element.remove();
	});

	// Close Open Top Area
	jQuery('#close-open').click(function(e) {
	    alert('Open Sesame!');
	});

	// Search Icon
	jQuery('#site-search').click(function(e) {
	    alert('Site Search!');
	});

	var show = false;
	var hide = true;
	// Show/Hide Background
	jQuery('#hide-show-bg .icon-minus').click(function(e) {
	    e.preventDefault();

	    if (hide) {
			show = true;
			hide = false;
	        jQuery("#container").animate({"left": "-=2800px"}, "slow");
	        //$("#show-wall-image").css("display","none");
	        //$("#show-wall").removeClass("show-download");

	        jQuery('#hide-show-bg .icon-plus').css('opacity', 1);
	        jQuery('#hide-show-bg .icon-minus').css('opacity', 0.5);
	    }
	 });

	 jQuery('#hide-show-bg .icon-plus').click(function(e) {
	    e.preventDefault();

	    if (show) {
			show = false;
			hide = true;
	        jQuery("#container").animate({"left": "+=2800px"}, "slow");
	        //$("#show-wall-image").css("display","block");
	        //$("#show-wall").addClass("show-download");
	        //$('#show-wall').html("Show site");

	        jQuery('#hide-show-bg .icon-plus').css('opacity', 0.5);
	        jQuery('#hide-show-bg .icon-minus').css('opacity', 1);
        }
	 });


	 //Icon tooltip
	 jQuery('.icon-tip').each(function(index, element) {
    	var element = jQuery(element);
    	element.tooltipsy();
    });

    jQuery(".comment-reply-link").click(function() {
	  //jQuery("#respond").slideDown("slow");
	  jQuery("#respond").hide().slideDown('slow');

	});

});

jQuery(window).load(function() {

	jQuery('#container').each(function(index, element) {
    	var element = jQuery(element);
    	element.css({ 'opacity': 1});
    });

	// Remove loader when ready
	jQuery('.core-loader').delay(50).fadeOut(150);

	// Fades Site Navigation
	jQuery('#site-navigation li').fadeTo("slow", 1);

	jQuery('#hide-show-bg .icon-plus').css('opacity', 0.5);

	// Sidebar Heights
	var ua = navigator.userAgent;
    var checker = {
      iphone: ua.match(/(iPhone|iPod)/),
      blackberry: ua.match(/BlackBerry/),
      android: ua.match(/Android/)
    };
    if (checker.android){
        //empty
    }
    else if (checker.iphone){
        //empty
    }
    else if (checker.blackberry){
        //empty
    }
    else {
	    //empty
    }

});

/*!
 * Responsive JS Plugins v1.2.2
 */
// Placeholder
jQuery(function(){
    //jQuery('input[placeholder], textarea[placeholder]').placeholder();
});

// Have a custom video player? We now have a customSelector option where you can add your own specific video vendor selector (mileage may vary depending on vendor and fluidity of player):
// jQuery("#thing-with-videos").fitVids({ customSelector: "iframe[src^='http://example.com'], iframe[src^='http://example.org']"});
// Selectors are comma separated, just like CSS
// Note: This will be the quickest way to add your own custom vendor as well as test your player's compatibility with FitVids.


// Masonry
//jQuery(function(){
//    jQuery('#container').masonry({
//      itemSelector: '.grid',
//      columnWidth: 200,
      //isAnimated: !Modernizr.csstransitions,
//      isFitWidth: true
//    });
//  });

// To top
//
function toTop() {
	var TOP_MINIMUM = 200;
	var ANIMATE_SPEED = 500;

	var toTop = jQuery('.scroll-top');

	function updateToTop() {
		var scrollTop = jQuery(window).scrollTop();

		if (scrollTop > TOP_MINIMUM)
			toTop.stop(true, true).slideDown(ANIMATE_SPEED);
		else if (scrollTop <= TOP_MINIMUM)
			toTop.stop(true, true).slideUp(ANIMATE_SPEED);
	}

	jQuery(window).scroll(updateToTop);
	updateToTop();

	// To top button
	toTop.bind('click', function() {
		jQuery('html, body').stop(true, true).animate({scrollTop: 0}, ANIMATE_SPEED);
		return false;
	});
}



