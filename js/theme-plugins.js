jQuery(document).ready(function() {
	// Target your #container, #wrapper etc.
	jQuery("#wrapper").fitVids();
	jQuery('#container').each(function(index, element) {
		var element = jQuery(element);
		element.css({
			'opacity': 0
		});
	});
	// Sub Menu Item Arrows
	jQuery('#site-navigation #theme-menu-main li').each(function(index, element) {
		var item = jQuery(element);
		var parent = jQuery('#theme-menu-main > li:first-child');
		var subMenu = item.children('ul');
		var isSubmenu = item.parent().hasClass('sub-menu');
		// Add dropdown indicators
		if (parent && item.children().hasClass('sub-menu') && !isSubmenu) {
			var arrowDown = ' <i class="icon-plus"></i>';
			//item.children('a').append(arrowDown);
		}
		// Submenus in submenus
		if (isSubmenu && subMenu.length) {
			var arrowRight = ' <i class="icon-plus"></i>&nbsp;&nbsp;';
			item.children('a').append(arrowRight);
		}
	});
	// Append arrows to some elements
	var rarr = jQuery('<i class="icon-double-angle-right"> </i>');
	jQuery('.widget li > a:first-child').each(function(index, element) {
		element = jQuery(element);
		if (!element.parents(".widget").hasClass('widget_td_categories') && !element.parents(".widget").hasClass('widget_themedutch_posts')) element.prepend(rarr);
	});
	// Input field placeholder text
	jQuery('input[placeholder]').each(function(index, element) {
		var element = jQuery(element);
		var placeholderText = element.attr('placeholder');
		if (!placeholderText === '') return;
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
		animationSpeed: 'normal',
		/* fast/slow/normal */
		slideshow: 3000,
		autoplay_slideshow: false,
		theme: "pp_default",
		/*pp_default/light_rounded/dark_rounded/dark_square/light_square/facebook */
		opacity: 0.35,
		/* Value between 0 and 1 */
		hook: 'data-rel',
		showTitle: false /* true/false */
	});
	// Responsive Menu (TinyNav)
	jQuery("#theme-menu-main").tinyNav({
		active: 'current_page_item',
		// Set the "active" class for default menu
		label: '',
		// String: Sets the <label> text for the <select> (if not set, no label will be added)
		header: '',
		// String: Specify text for "header" and show header instead of the active item
	});
	// Responsive Menu (Selectbox)
	jQuery(function() {
		jQuery(".tinynav").selectbox();
	});
	// Cleanup empty p tags
	jQuery('p').each(function(index, element) {
		element = jQuery(element);
		if (element.html() === '' || element.html() === '<br>') element.remove();
	});
	// Close Open Top Area
	jQuery('#close-open').click(function(e) {
		var icon = jQuery(this).find('i');
		if (icon.hasClass('icon-caret-down')) {
			var h = jQuery('#top-slide-row .theme-wrap').height();
			jQuery('#top-slide-row').animate({
				"height": h+40
			}, 500);
			icon.removeClass('icon-caret-down');
			icon.addClass('icon-caret-up');
		} else {
			jQuery('#top-slide-row').animate({
				"height": 0
			}, 500);
			icon.removeClass('icon-caret-up');
			icon.addClass('icon-caret-down');
		}
	});
	// Search Icon
	jQuery('#site-search').click(function(e) {
		jQuery('#theme-search').animate({
			"top": 0
		}, "slow");
	});
	// Close search
	jQuery('#theme-search .icon-remove').click(function(e) {
		jQuery('#theme-search').animate({
			"top": -200
		}, "slow");
	});
	var show = false;
	var hide = true;
	// Show/Hide Background
	jQuery('#hide-show-bg .icon-minus').click(function(e) {
		e.preventDefault();
		if (hide) {
			show = true;
			hide = false;
			jQuery("#container").animate({
				"left": "-=2800px"
			}, "slow");
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
			jQuery("#container").animate({
				"left": "+=2800px"
			}, "slow");
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


	// Footer Tabs
	//
	jQuery('#footer-widget-area').each(function() {
		var tabContainer = jQuery(this);
		var tabTitleList = jQuery('.titles', tabContainer);
		var tabContentList = jQuery('.content', tabContainer);
		var contentWidth = tabContainer.width();

		// Tab buttons
		jQuery('.shortcode-tab-title', this).each(function(index, element) {
			var tabTitle = jQuery(this);
			var tabContent = tabTitle.next();

			// Move title into title container
			tabTitle.detach();
			tabTitleList.append(tabTitle);

			// Move content into content container
			tabContent.detach();
			tabContentList.append(tabContent);

			// Hide all but the first tab
			//if (index > 0)
				tabContent.hide();
			//else
				//tabTitle.addClass('active');

			function findIcon(element){
				var thisTitle = element;
				var titleIcon = thisTitle.find('i');

				jQuery('.shortcode-tab-title').find('i').removeClass('icon-minus');
				jQuery('.shortcode-tab-title').find('i').addClass('icon-plus');

				if (titleIcon.hasClass('icon-plus') && !titleIcon.parent().hasClass('active') ) {
					titleIcon.removeClass('icon-plus');
					titleIcon.addClass('icon-minus');
				}

			}

			// Tab title click
			tabTitle.click(function() {

				if (tabContent.css('display') !== 'none'){

					tabContent.slideToggle(500);
					findIcon(tabTitle);
				} else {

					// Toggle tab style and content visibility
					tabContainer.find('.shortcode-tab:visible').slideToggle(500);
					tabTitleList.find('.active').removeClass('active');
					tabContent.slideToggle(500);
					findIcon(tabTitle);
				}

				// Always scroll to the bottom
				jQuery('html, body').animate({scrollTop: jQuery(document).height()+jQuery('footer-widget-area').height()}, 500);

				tabTitle.addClass('active');
			});
		});
	});

});
jQuery(window).load(function() {
	jQuery('#container').each(function(index, element) {
		var element = jQuery(element);
		element.css({
			'opacity': 1
		});
	});
	// Remove loader when ready
	jQuery('.core-loader').delay(50).fadeOut(150);
	// Sidebar Heights
	var ua = navigator.userAgent;
	var checker = {
		iphone: ua.match(/(iPhone|iPod)/),
		blackberry: ua.match(/BlackBerry/),
		android: ua.match(/Android/)
	};
	if (checker.android) {
		//empty
	} else if (checker.iphone) {
		//empty
	} else if (checker.blackberry) {
		//empty
	} else {

        // Correct the sidebar borders
		var minContentHeight = jQuery('#content-main .theme-content').height();
		var maxContentHeight = minContentHeight;
		if(jQuery('#content-main .theme-sidebar').length > 0 ) {
			jQuery('#content-main .theme-sidebar').each(function(index, element){
				var element = jQuery(element);
				var elementHeight = element.height();

				if ( elementHeight > maxContentHeight ){
					maxContentHeight = elementHeight;
				}

			});
		}

		jQuery('#content-main .theme-content').stop(true, true).animate({height: maxContentHeight }, 350);
		jQuery('#content-main .theme-sidebar').stop(true, true).animate({height: maxContentHeight }, 350);

	}
});
/*!
 * Responsive JS Plugins v1.2.2
 */
// Placeholder
jQuery(function() {
	//jQuery('input[placeholder], textarea[placeholder]').placeholder();
});
// Have a custom video player? We now have a customSelector option where you can add your own specific video vendor selector (mileage may vary depending on vendor and fluidity of player):
// jQuery("#thing-with-videos").fitVids({ customSelector: "iframe[src^='http://example.com'], iframe[src^='http://example.org']"});
// Selectors are comma separated, just like CSS
// Note: This will be the quickest way to add your own custom vendor as well as test your player's compatibility with FitVids.
// To top
//

function toTop() {
	var TOP_MINIMUM = 200;
	var ANIMATE_SPEED = 500;
	var toTop = jQuery('.scroll-top');

	function updateToTop() {
		var scrollTop = jQuery(window).scrollTop();
		if (scrollTop > TOP_MINIMUM) toTop.stop(true, true).slideDown(ANIMATE_SPEED);
		else if (scrollTop <= TOP_MINIMUM) toTop.stop(true, true).slideUp(ANIMATE_SPEED);
	}
	jQuery(window).scroll(updateToTop);
	updateToTop();
	// To top button
	toTop.bind('click', function() {
		jQuery('html, body').stop(true, true).animate({
			scrollTop: 0
		}, ANIMATE_SPEED);
		return false;
	});
}