<?php

require('../../../../../../wp-load.php');

if (!is_user_logged_in() || !current_user_can('edit_posts'))
	die();

$shortcode_categories = array(

	__('Buttons', THEME_SLUG) => array(
		__('Small button', THEME_SLUG) => array(
			'description' => __('Inserts a small button. If you add the <i>window</i> attribute, the link will be opened in a new window.', THEME_SLUG),
			'shortcode' => '[button small link="link"]button text[/button]',
		),
		__('Medium button', THEME_SLUG) => array(
			'description' => __('Inserts a medium sized button. If you add the <i>window</i> attribute, the link will be opened in a new window.', THEME_SLUG),
			'shortcode' => '[button medium link="link"]button text[/button]',
		),
		__('Large button', THEME_SLUG) => array(
			'description' => __('Inserts a large button. If you add the <i>window</i> attribute, the link will be opened in a new window.', THEME_SLUG),
			'shortcode' => '[button large link="link"]button text[/button]',
		),
		__('Small button with Icon', THEME_SLUG) => array(
			'description' => __('Inserts a small button with font awesome icon. If you add the <i>window</i> attribute, the link will be opened in a new window.', THEME_SLUG),
			'shortcode' => '[button small link="link" icon="icon-cog"]button text[/button]',
		),
		__('Medium button with Icon', THEME_SLUG) => array(
			'description' => __('Inserts a medium sized button with font awesome icon. If you add the <i>window</i> attribute, the link will be opened in a new window.', THEME_SLUG),
			'shortcode' => '[button medium link="link" icon="icon-cog"]button text[/button]',
		),
		__('Large button with Icon', THEME_SLUG) => array(
			'description' => __('Inserts a large button with font awesome icon. If you add the <i>window</i> attribute, the link will be opened in a new window.', THEME_SLUG),
			'shortcode' => '[button large link="link" icon="icon-cog"]button text[/button]',
		),
	),

	__('Columns', THEME_SLUG) => array(
		__('2 columns', THEME_SLUG) => array(
			'description' => __('Inserts two columns in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns]\n[column half]Content here[/column]\n[column half last]Content here[/column]\n[/columns]",
		),
		__('1/3 - 2/3', THEME_SLUG) => array(
			'description' => __('Inserts two columns, one a third and the other two thirds, in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns]\n[column third]Content here[/column]\n[column twothird last]Content here[/column]\n[/columns]",
		),
		__('2/3 - 1/3', THEME_SLUG) => array(
			'description' => __('Inserts two columns, one two thirds and the other a third, in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns]\n[column twothird]Content here[/column]\n[column third last]Content here[/column]\n[/columns]",
		),
		__('1/4 - 3/4', THEME_SLUG) => array(
			'description' => __('Inserts two columns, one a fourth and the other three fourths, in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns]\n[column fourth]Content here[/column]\n[column threefourth last]Content here[/column]\n[/columns]",
		),
		__('3/4 - 1/4', THEME_SLUG) => array(
			'description' => __('Inserts two columns, one three fourths and the other a fourth, in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns]\n[column threefourth]Content here[/column]\n[column fourth last]Content here[/column]\n[/columns]",
		),
		__('3 columns', THEME_SLUG) => array(
			'description' => __('Inserts three columns in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns]\n[column third]Content here[/column]\n[column third]Content here[/column]\n[column third last]Content here[/column]\n[/columns]",
		),
		__('4 columns', THEME_SLUG) => array(
			'description' => __('Inserts four columns in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns]\n[column fourth]Content here[/column]\n[column fourth]Content here[/column]\n[column fourth]Content here[/column]\n[column fourth last]Content here[/column]\n[/columns]",
		),
		__('5 columns', THEME_SLUG) => array(
			'description' => __('Inserts five columns in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns]\n[column fifth]Content here[/column]\n[column fifth]Content here[/column]\n[column fifth]Content here[/column]\n[column fifth]Content here[/column]\n[column fifth last]Content here[/column]\n[/columns]",
		),
		__('Custom 2 columns', THEME_SLUG) => array(
			'description' => __("1. Insert the default column shortcode, which also can be changed into 3/4/5 columns  \n2. Then insert only the URL of your favourite background image. \n3. Choose your own personal text color  \n4. Set your own image size (default settings are: 100 % and 150 px), which can be made larger or smaller", THEME_SLUG),
			'shortcode' => "[custom_columns image=\"image url\" textcolor=\"#FFFFFF\" width=\"100\" height=\"150\"]\n[column half]Content here[/column]\n[column half last]Content here[/column]\n[/custom_columns]",
		)
	),

	__('Columns (divider)', THEME_SLUG) => array(
		__('2 columns + divider', THEME_SLUG) => array(
			'description' => __('Inserts two columns separated by a divider line in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns divider]\n[column half]Content here[/column]\n[column half last]Content here[/column]\n[/columns]",
		),
		__('1/3 - 2/3 + divider', THEME_SLUG) => array(
			'description' => __('Inserts two columns, one a third and the other two thirds, separated by a divider line in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns divider]\n[column third]Content here[/column]\n[column twothird last]Content here[/column]\n[/columns]",
		),
		__('2/3 - 1/3 + divider', THEME_SLUG) => array(
			'description' => __('Inserts two columns, one two thirds and the other a third, separated by a divider line in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns divider]\n[column twothird]Content here[/column]\n[column third last]Content here[/column]\n[/columns]",
		),
		__('1/4 - 3/4 + divider', THEME_SLUG) => array(
			'description' => __('Inserts two columns, one a fourth and the other three fourths, separated by a divider line in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns divider]\n[column fourth]Content here[/column]\n[column threefourth last]Content here[/column]\n[/columns]",
		),
		__('3/4 - 1/4 + divider', THEME_SLUG) => array(
			'description' => __('Inserts two columns, one three fourths and the other a fourth, separated by a divider line in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns divider]\n[column threefourth]Content here[/column]\n[column fourth last]Content here[/column]\n[/columns]",
		),
		__('3 columns + divider', THEME_SLUG) => array(
			'description' => __('Inserts three columns separated by a divider line in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns divider]\n[column third]Content here[/column]\n[column third]Content here[/column]\n[column third last]Content here[/column]\n[/columns]",
		),
		__('4 columns + divider', THEME_SLUG) => array(
			'description' => __('Inserts four columns separated by a divider line in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns divider]\n[column fourth]Content here[/column]\n[column fourth]Content here[/column]\n[column fourth]Content here[/column]\n[column fourth last]Content here[/column]\n[/columns]",
		),
		__('5 columns + divider', THEME_SLUG) => array(
			'description' => __('Inserts five columns separated by a divider line in which you can place further content.', THEME_SLUG),
			'shortcode' => "[columns divider]\n[column fifth]Content here[/column]\n[column fifth]Content here[/column]\n[column fifth]Content here[/column]\n[column fifth]Content here[/column]\n[column fifth last]Content here[/column]\n[/columns]",
		),

	),

	__('Dividers', THEME_SLUG) => array(
		__('Dotted', THEME_SLUG) => array(
			'description' => __('Inserts a dotted divider line.', THEME_SLUG),
			'shortcode' => '[divider dotted thickness=10]',
		),
		__('Invisible Spacer 20px', THEME_SLUG) => array(
			'description' => __('Inserts a spacer of 20 pixels high. Perfect to create space between columns.', THEME_SLUG),
			'shortcode' => '[divider invisible thickness=10]',
		),
		__('Slashed', THEME_SLUG) => array(
			'description' => __('Inserts a slashed tall divider line.', THEME_SLUG),
			'shortcode' => '[divider slashed thickness=10]',
		),
		__('Solid', THEME_SLUG) => array(
			'description' => __('Inserts a solid divider line.', THEME_SLUG),
			'shortcode' => '[divider solid thickness=10]',
		),
		__('To top', THEME_SLUG) => array(
			'description' => __('Inserts a solid divider line with a button that scrolls the page to the top.', THEME_SLUG),
			'shortcode' => '[divider totop thickness=10]',
		),
	),

	__('Dropcaps', THEME_SLUG) => array(
		__('Red dropcap', THEME_SLUG) => array(
			'description' => __('Inserts a red dropcap.', THEME_SLUG),
			'shortcode' => '[dropcap red]A[/dropcap]',
		),
		__('Green dropcap', THEME_SLUG) => array(
			'description' => __('Inserts a green dropcap.', THEME_SLUG),
			'shortcode' => '[dropcap green]A[/dropcap]',
		),
		__('Blue dropcap', THEME_SLUG) => array(
			'description' => __('Inserts a blue dropcap.', THEME_SLUG),
			'shortcode' => '[dropcap blue]A[/dropcap]',
		),
		__('White dropcap', THEME_SLUG) => array(
			'description' => __('Inserts a white dropcap.', THEME_SLUG),
			'shortcode' => '[dropcap white]A[/dropcap]',
		),
		__('Black dropcap', THEME_SLUG) => array(
			'description' => __('Inserts a black dropcap.', THEME_SLUG),
			'shortcode' => '[dropcap black]A[/dropcap]',
		),
		__('Grey dropcap', THEME_SLUG) => array(
			'description' => __('Inserts a grey dropcap.', THEME_SLUG),
			'shortcode' => '[dropcap grey]A[/dropcap]',
		),
	),

	__('Headings', THEME_SLUG) => array(
		__('Padded heading 1', THEME_SLUG) => array(
			'description' => __('Inserts a padded heading.', THEME_SLUG),
			'shortcode' => "[header 1]text[/header]",
		),
		__('Padded heading 2', THEME_SLUG) => array(
			'description' => __('Inserts a padded heading.', THEME_SLUG),
			'shortcode' => "[header 2]text[/header]",
		),
		__('Padded heading 3', THEME_SLUG) => array(
			'description' => __('Inserts a padded heading.', THEME_SLUG),
			'shortcode' => "[header 3]text[/header]",
		),
		__('Padded heading 4', THEME_SLUG) => array(
			'description' => __('Inserts a padded heading.', THEME_SLUG),
			'shortcode' => "[header 4]text[/header]",
		),
		__('Padded heading 5', THEME_SLUG) => array(
			'description' => __('Inserts a padded heading.', THEME_SLUG),
			'shortcode' => "[header 5]text[/header]",
		),
		__('Padded heading 6', THEME_SLUG) => array(
			'description' => __('Inserts a padded heading.', THEME_SLUG),
			'shortcode' => "[header 6]text[/header]",
		),
	),

	__('Image gallery', THEME_SLUG) => array(
		__('Image gallery, 2 columns', THEME_SLUG) => array(
			'description' => __('Inserts an image gallery with 2 columns.', THEME_SLUG),
			'shortcode' => "[tdgallery columns=\"2\"]\n[image url=\"image url\" title=\"image title\" description=\"image description\"]\n[/tdgallery]",
		),
		__('Image gallery, 3 columns', THEME_SLUG) => array(
			'description' => __('Inserts an image gallery with 3 columns.', THEME_SLUG),
			'shortcode' => "[tdgallery columns=\"3\"]\n[image url=\"image url\" title=\"image title\" description=\"image description\"]\n[/tdgallery]",
		),
		__('Image gallery, 4 columns', THEME_SLUG) => array(
			'description' => __('Inserts an image gallery with 4 columns.', THEME_SLUG),
			'shortcode' => "[tdgallery columns=\"4\"]\n[image url=\"image url\" title=\"image title\" description=\"image description\"]\n[/tdgallery]",
		),
		__('Image gallery, 6 columns', THEME_SLUG) => array(
			'description' => __('Inserts an image gallery with 6 columns.', THEME_SLUG),
			'shortcode' => "[tdgallery columns=\"6\"]\n[image url=\"image url\" title=\"image title\" description=\"image description\"]\n[/tdgallery]",
		),
	),

	__('Lists', THEME_SLUG) => array(
		__('Balloon', THEME_SLUG) => array(
			'description' => __('A list with balloon icon bullets.', THEME_SLUG),
			'shortcode' => "[list balloon]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Circle', THEME_SLUG) => array(
			'description' => __('A list with circular bullets.', THEME_SLUG),
			'shortcode' => "[list circle]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Creditcard', THEME_SLUG) => array(
			'description' => __('A list with creditcard icon bullets.', THEME_SLUG),
			'shortcode' => "[list creditcard]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Dot', THEME_SLUG) => array(
			'description' => __('A list with dotted bullets.', THEME_SLUG),
			'shortcode' => "[list dots]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('File', THEME_SLUG) => array(
			'description' => __('A list with file icon bullets.', THEME_SLUG),
			'shortcode' => "[list file]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Mail', THEME_SLUG) => array(
			'description' => __('A list with mail icon bullets.', THEME_SLUG),
			'shortcode' => "[list mail]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Info', THEME_SLUG) => array(
			'description' => __('A list with info icon bullets.', THEME_SLUG),
			'shortcode' => "[list info]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Minus', THEME_SLUG) => array(
			'description' => __('A list with minus sign bullets.', THEME_SLUG),
			'shortcode' => "[list minus]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Phone', THEME_SLUG) => array(
			'description' => __('A list with phone icon bullets.', THEME_SLUG),
			'shortcode' => "[list phone]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Plus', THEME_SLUG) => array(
			'description' => __('A list with plus sign bullets.', THEME_SLUG),
			'shortcode' => "[list plus]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Question', THEME_SLUG) => array(
			'description' => __('A list with question icon bullets.', THEME_SLUG),
			'shortcode' => "[list question]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Square', THEME_SLUG) => array(
			'description' => __('A list with square bullets.', THEME_SLUG),
			'shortcode' => "[list square]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Support', THEME_SLUG) => array(
			'description' => __('A list with "support" icon bullets.', THEME_SLUG),
			'shortcode' => "[list support]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('V', THEME_SLUG) => array(
			'description' => __('A list with tick bullets.', THEME_SLUG),
			'shortcode' => "[list v]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('Warning', THEME_SLUG) => array(
			'description' => __('A list with warning icon bullets.', THEME_SLUG),
			'shortcode' => "[list warning]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
		__('X', THEME_SLUG) => array(
			'description' => __('A list with cross bullets.', THEME_SLUG),
			'shortcode' => "[list x]\nitem 1\nitem 2\nitem 3\nitem 4\n[/list]",
		),
	),

	__('Notifications', THEME_SLUG) => array(
		__('Warning', THEME_SLUG) => array(
			'description' => __('A warning notification.', THEME_SLUG),
			'shortcode' => '[notify warn]Text here[/notify]',
		),
		__('Info', THEME_SLUG) => array(
			'description' => __('An informative notification.', THEME_SLUG),
			'shortcode' => '[notify info]Text here[/notify]',
		),
		__('Textbox white', THEME_SLUG) => array(
			'description' => __('An informative White box notification.', THEME_SLUG),
			'shortcode' => '[notify textbox-white]Text here[/notify]',
		),
		__('Textbox black', THEME_SLUG) => array(
			'description' => __('An informative Black box notification.', THEME_SLUG),
			'shortcode' => '[notify textbox-black]Text here[/notify]',
		),
		__('Textbox grey', THEME_SLUG) => array(
			'description' => __('An informative Grey box notification.', THEME_SLUG),
			'shortcode' => '[notify textbox-grey]Text here[/notify]',
		),
		__('Ok', THEME_SLUG) => array(
			'description' => __('A positive notification.', THEME_SLUG),
			'shortcode' => '[notify ok]Text here[/notify]',
		),
		__('Question', THEME_SLUG) => array(
			'description' => __('A question notification.', THEME_SLUG),
			'shortcode' => '[notify question]Text here[/notify]',
		),
		__('Error', THEME_SLUG) => array(
			'description' => __('An error notification.', THEME_SLUG),
			'shortcode' => '[notify error]Text here[/notify]',
		),
		__('Custom', THEME_SLUG) => array(
			'description' => __('A custom notification.', THEME_SLUG),
			'shortcode' => '[notify custom bg="#000000" color="#FFFFFF"]Text here[/notify]',
		),
		__('Custom with Icon', THEME_SLUG) => array(
			'description' => __('A custom notification.', THEME_SLUG),
			'shortcode' => '[notify custom bg="#000000" color="#FFFFFF" icon="icon-cog"]Text here[/notify]',
		),
	),

	__('Quotes', THEME_SLUG) => array(
		__('Quote block', THEME_SLUG) => array(
			'description' => __('Inserts a block which is styled like a quote.', THEME_SLUG),
			'shortcode' => '[quote]content here[/quote]',
		),
		__('Pullquote left', THEME_SLUG) => array(
			'description' => __('Inserts a left-aligned pullquote block.', THEME_SLUG),
			'shortcode' => '[pullquote left]content here[/pullquote]',
		),
		__('Pullquote right', THEME_SLUG) => array(
			'description' => __('Inserts a right-aligned pullquote block.', THEME_SLUG),
			'shortcode' => '[pullquote right]content here[/pullquote]',
		),
		__('Quote symbol 1', THEME_SLUG) => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', THEME_SLUG),
			'shortcode' => '[quote-symbol symbol1]',
		),
		__('Quote symbol 2', THEME_SLUG) => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', THEME_SLUG),
			'shortcode' => '[quote-symbol symbol2]',
		),
		__('Quote symbol 3', THEME_SLUG) => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', THEME_SLUG),
			'shortcode' => '[quote-symbol symbol3]',
		),
		__('Quote symbol 4', THEME_SLUG) => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', THEME_SLUG),
			'shortcode' => '[quote-symbol symbol4]',
		),
		__('Quote symbol 5', THEME_SLUG) => array(
			'description' => __('Inserts a quote symbol image, which will be placed like a dropcap.', THEME_SLUG),
			'shortcode' => '[quote-symbol symbol5]',
		),
	),

	__('Tabs', THEME_SLUG) => array(
		__('Tab block', THEME_SLUG) => array(
			'description' => __('Inserts a tabbed content block. Use [tab] shortcodes to add more tabs.', THEME_SLUG),
			'shortcode' => "[tabs]\n[tab title=\"Title here\"]Content here[/tab]\n[/tabs]",
		),
		__('Left Tab block', THEME_SLUG) => array(
			'description' => __('Inserts a tabbed content block with tab titles on the left. Use [tab] shortcodes to add more tabs.', THEME_SLUG),
			'shortcode' => "[tabs left]\n[tab title=\"Title here\"]Content here[/tab]\n[/tabs]",
		),
		__('Right Tab block', THEME_SLUG) => array(
			'description' => __('Inserts a tabbed content block with tab titles on the left. Use [tab] shortcodes to add more tabs.', THEME_SLUG),
			'shortcode' => "[tabs right]\n[tab title=\"Title here\"]Content here[/tab]\n[/tabs]",
		),
		__('Single tab', THEME_SLUG) => array(
			'description' => __('A single tab. This needs to be placed inside a [tabs] shortcode (and not inside another [tab] shortcode) to work.', THEME_SLUG),
			'shortcode' => '[tab title="Title here"]Content here[/tab]',
		),
	),

	__('Toggle', THEME_SLUG) => array(
		__('Toggle block', THEME_SLUG) => array(
			'description' => __('Inserts a toggled content block. Use [toggle_content] shortcodes to add more content sections.', THEME_SLUG),
			'shortcode' => "[toggle]\n[toggle_content title=\"Title here\" subtitle=\"Optional subtitle here\"]Content here[/toggle_content]\n[/toggle]",
		),
		__('Single toggle section', THEME_SLUG) => array(
			'description' => __('A single toggle content section. This needs to be placed inside a [toggle] shortcode (and not inside another [toggle_content] shortcode) to work.', THEME_SLUG),
			'shortcode' => '[toggle_content title="Title here" subtitle="Optional subtitle here"]Content here[/toggle_content]',
		),
	),

	__('Special Shortcodes', THEME_SLUG) => array(
		__('Thumbnail Post Slider', THEME_SLUG) => array(
			'description' => __('Inserts an Accordion-Carousel Thumbnail slider.', THEME_SLUG),
			'shortcode' => '[thumbnailslider category="all" number="20" background="#CCC" textcolor="#000" words="10"]',
		),
		__('Thumbnail Product Slider', THEME_SLUG) => array(
			'description' => __('Inserts an Accordion-Carousel Thumbnail slider.', THEME_SLUG),
			'shortcode' => '[thumbnailslider post_type="product" category="all" number="20" background="#CCC" textcolor="#000" words="10"]',
		),
		__('Latest Posts', THEME_SLUG) => array(
			'description' => __('Inserts a list of latest posts.', THEME_SLUG),
			'shortcode' => '[latestposts title="Latest Posts" category="_name" number="10" orderby="latest"]',
		),
		__('Popular Posts', THEME_SLUG) => array(
			'description' => __('Inserts a list of popular posts.', THEME_SLUG),
			'shortcode' => '[latestposts title="Popular Posts" category="_name" number="10" orderby="popular"]',
		),
		__('Random Posts', THEME_SLUG) => array(
			'description' => __('Inserts a list of random posts.', THEME_SLUG),
			'shortcode' => '[latestposts title="Random Posts" category="_name" number="10" orderby="random"]',
		),
		__('Custom Latest Posts', THEME_SLUG) => array(
			'description' => __('Inserts a list of latest posts in a blog style format. You put a custom title, select which category to display, limit the number of posts, limit the number of words and use thumbnail, medium or large as the size of the featured image.', THEME_SLUG),
			'shortcode' => '[blogposts title="Latest Blog Posts" category="all" number="10" count="55" orderby="latest" image="thumbnail"]'),
		__('Highlight', THEME_SLUG) => array(
			'description' => __('Inserts a highlighted text shortcode.', THEME_SLUG),
			'shortcode' => '[highlight bg="#000000" color="#FFFFFF"]highlighted text[/highlight]'),

		__('Login Form', THEME_SLUG) => array(
			'description' => __('Inserts a WP Login Form.', THEME_SLUG),
			'shortcode' => '[loginform redirect="http://www.home-url.com"]'
		),
	),

	__('Icons', THEME_SLUG) => array(
		'icon-adjust'	 => array(	'description' => __('Inserts an icon-adjust shortcode. [icon name=icon-adjust size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-adjust]' ),
		'icon-align-center'	 => array(	'description' => __('Inserts an icon-align-center shortcode. [icon name=icon-align-center size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-align-center]' ),
  		'icon-align-justify'	 => array(	'description' => __('Inserts an icon-align-justify shortcode. [icon name=icon-align-justify size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-align-justify]' ),
  		'icon-align-left'	 => array(	'description' => __('Inserts an icon-align-left shortcode. [icon name=icon-align-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-align-left]' ),
	  	'icon-align-right'	 => array(	'description' => __('Inserts an icon-align-right shortcode. [icon name=icon-align-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-align-right]' ),
	  	'icon-ambulance'	 => array(	'description' => __('Inserts an icon-ambulance shortcode. [icon name=icon-ambulance size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-ambulance]' ),
	  	'icon-angle-down'	 => array(	'description' => __('Inserts an icon-angle-down shortcode. [icon name=icon-angle-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-angle-down]' ),
	  	'icon-angle-left'	=> array(	'description' => __('Inserts an icon-angle-left shortcode. [icon name=icon-angle-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-angle-left]' ),
	  	'icon-angle-right'	 => array(	'description' => __('Inserts an icon-angle-right shortcode. [icon name=icon-angle-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-angle-right]' ),
	  	'icon-angle-up'	 => array(	'description' => __('Inserts an icon-angle-up shortcode. [icon name=icon-angle-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-angle-up]' ),
	  	'icon-arrow-down'	 => array(	'description' => __('Inserts an icon-arrow-down shortcode. [icon name=icon-arrow-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-arrow-down]' ),
	  	'icon-arrow-left'	 => array(	'description' => __('Inserts an icon-arrow-left shortcode. [icon name=icon-arrow-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-arrow-left]' ),
	  	'icon-arrow-right'	 => array(	'description' => __('Inserts an icon-arrow-right shortcode. [icon name=icon-arrow-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-arrow-right]' ),
	  	'icon-arrow-up'	 => array(	'description' => __('Inserts an icon-arrow-up shortcode. [icon name=icon-arrow-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-arrow-up]' ),
	  	'icon-asterisk'	 => array(	'description' => __('Inserts an icon-asterisk shortcode. [icon name=icon-asterisk size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-asterisk]' ),
	  	'icon-backward'	=> array(	'description' => __('Inserts an icon-backward shortcode. [icon name=icon-backward size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-backward]' ),
	  	'icon-ban-circle'	 => array(	'description' => __('Inserts an icon-ban-circle shortcode. [icon name=icon-ban-circle size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-ban-circle]' ),
	  	'icon-bar-chart'	 => array(	'description' => __('Inserts an icon-bar-chart shortcode. [icon name=icon-bar-chart size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bar-chart]' ),
	  	'icon-barcode'	 => array(	'description' => __('Inserts an icon-barcode shortcode. [icon name=icon-barcode size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-barcode]' ),
	  	'icon-beaker'	 => array(	'description' => __('Inserts an icon-beaker shortcode. [icon name=icon-beaker size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-beaker]' ),
	  	'icon-beer'	 => array(	'description' => __('Inserts an icon-beer shortcode. [icon name=icon-beer size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-beer]' ),
	  	'icon-bell'	 => array(	'description' => __('Inserts an icon-bell shortcode. [icon name=icon-bell size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bell]' ),
	  	'icon-bell-alt'	 => array(	'description' => __('Inserts an icon-bell-alt shortcode. [icon name=icon-bell-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bell-alt]' ),
	  	'icon-bold'	 => array(	'description' => __('Inserts an icon-bold shortcode. [icon name=icon-bold size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bold]' ),
	  	'icon-bolt'	 => array(	'description' => __('Inserts an icon-bolt shortcode. [icon name=icon-bolt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bolt]' ),
	  	'icon-book'	 => array(	'description' => __('Inserts an icon-book shortcode. [icon name=icon-book size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-book]' ),
	  	'icon-bookmark'	 => array(	'description' => __('Inserts an icon-bookmark shortcode. [icon name=icon-bookmark size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bookmark]' ),
	  	'icon-bookmark-empty'	 => array(	'description' => __('Inserts an icon-bookmark-empty shortcode. [icon name=icon-bookmark-empty size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bookmark-empty]' ),
	  	'icon-briefcase'	 => array(	'description' => __('Inserts an icon-briefcase shortcode. [icon name=icon-briefcase size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-briefcase]' ),
	  	'icon-building'	 => array(	'description' => __('Inserts an icon-building shortcode. [icon name=icon-building size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-building]' ),
	  	'icon-bullhorn'	 => array(	'description' => __('Inserts an icon-bullhorn shortcode. [icon name=icon-bullhorn size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bullhorn]' ),
	  	'icon-calendar'	 => array(	'description' => __('Inserts an icon-calendar shortcode. [icon name=icon-calendar size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-calendar]' ),
	  	'icon-camera'	 => array(	'description' => __('Inserts an icon-camera shortcode. [icon name=icon-camera size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-camera]' ),
	  	'icon-camera-retro'	 => array(	'description' => __('Inserts an icon-camera-retro shortcode. [icon name=icon-camera-retro size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-camera-retro]' ),
	  	'icon-caret-down'	 => array(	'description' => __('Inserts an icon-caret-down shortcode. [icon name=icon-caret-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-caret-down]' ),
	  	'icon-caret-left'	 => array(	'description' => __('Inserts an icon-caret-left shortcode. [icon name=icon-caret-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-caret-left]' ),
	  	'icon-caret-right'	 => array(	'description' => __('Inserts an icon-caret-right shortcode. [icon name=icon-caret-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-caret-right]' ),
	  	'icon-caret-up'	 => array(	'description' => __('Inserts an icon-caret-up shortcode. [icon name=icon-caret-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-caret-up]' ),
	  	'icon-certificate'	 => array(	'description' => __('Inserts an icon-certificate shortcode. [icon name=icon-certificate size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-certificate]' ),
	  	'icon-check'	 => array(	'description' => __('Inserts an icon-check shortcode. [icon name=icon-check size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-check]' ),
	  	'icon-check-empty'	 => array(	'description' => __('Inserts an icon-check-empty shortcode. [icon name=icon-check-empty size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-check-empty]' ),
	  	'icon-chevron-down'	 => array(	'description' => __('Inserts an icon-chevron-down shortcode. [icon name=icon-chevron-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-chevron-down]' ),
	  	'icon-chevron-left'	 => array(	'description' => __('Inserts an icon-chevron-left shortcode. [icon name=icon-chevron-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-chevron-left]' ),
	  	'icon-chevron-right'	 => array(	'description' => __('Inserts an icon-chevron-right shortcode. [icon name=icon-chevron-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-chevron-right]' ),
	  	'icon-chevron-up'	 => array(	'description' => __('Inserts an icon-chevron-up shortcode. [icon name=icon-chevron-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-chevron-up]' ),
	  	'icon-circle'	 => array(	'description' => __('Inserts an icon-circle shortcode. [icon name=icon-circle size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-circle]' ),
	  	'icon-circle-arrow-down'	 => array(	'description' => __('Inserts an icon-circle-arrow-down shortcode. [icon name=icon-circle-arrow-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-circle-arrow-down]' ),
	  	'icon-circle-arrow-left'	 => array(	'description' => __('Inserts an icon-circle-arrow-left shortcode. [icon name=icon-circle-arrow-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-circle-arrow-left]' ),
	  	'icon-circle-arrow-right'	 => array(	'description' => __('Inserts an icon-circle-arrow-right shortcode. [icon name=icon-circle-arrow-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-circle-arrow-right]' ),
	  	'icon-circle-arrow-up'	 => array(	'description' => __('Inserts an icon-circle-arrow-up shortcode. [icon name=icon-circle-arrow-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-circle-arrow-up]' ),
	  	'icon-circle-blank'	 => array(	'description' => __('Inserts an icon-circle-blank shortcode. [icon name=icon-circle-blank size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-circle-blank]' ),
	  	'icon-cloud'	 => array(	'description' => __('Inserts an icon-cloud shortcode. [icon name=icon-cloud size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-cloud]' ),
	  	'icon-cloud-download'	 => array(	'description' => __('Inserts an icon-cloud-download shortcode. [icon name=icon-cloud-download size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-cloud-download]' ),
	  	'icon-cloud-upload'	 => array(	'description' => __('Inserts an icon-cloud-upload shortcode. [icon name=icon-cloud-upload size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-cloud-upload]' ),
	  	'icon-coffee'	 => array(	'description' => __('Inserts an icon-coffee shortcode. [icon name=icon-coffee size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-coffee]' ),
	  	'icon-cog'	 => array(	'description' => __('Inserts an icon-cog shortcode. [icon name=icon-cog size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-cog]' ),
	  	'icon-cogs'	 => array(	'description' => __('Inserts an icon-cogs shortcode. [icon name=icon-cogs size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-cogs]' ),
	  	'icon-columns'	 => array(	'description' => __('Inserts an icon-columns shortcode. [icon name=icon-columns size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-columns]' ),
	  	'icon-comment'	 => array(	'description' => __('Inserts an icon-comment shortcode. [icon name=icon-comment size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-comment]' ),
	  	'icon-comment-alt'	 => array(	'description' => __('Inserts an icon-comment-alt shortcode. [icon name=icon-comment-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-comment-alt]' ),
	  	'icon-comments'	 => array(	'description' => __('Inserts an icon-comments shortcode. [icon name=icon-comments size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-comments]' ),
	  	'icon-comments-alt'	 => array(	'description' => __('Inserts an icon-comments-alt shortcode. [icon name=icon-comments-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-comments-alt]' ),
	  	'icon-copy'	 => array(	'description' => __('Inserts an icon-copy shortcode. [icon name=icon-copy size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-copy]' ),
	  	'icon-credit-card'	 => array(	'description' => __('Inserts an icon-credit-card shortcode. [icon name=icon-credit-card size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-credit-card]' ),
	  	'icon-cut'	 => array(	'description' => __('Inserts an icon-cut shortcode. [icon name=icon-cut size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-cut]' ),
	  	'icon-dashboard'	 => array(	'description' => __('Inserts an icon-dashboard shortcode. [icon name=icon-dashboard size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-dashboard]' ),
	  	'icon-desktop'	 => array(	'description' => __('Inserts an icon-desktop shortcode. [icon name=icon-desktop size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-desktop]' ),
	  	'icon-double-angle-down'	 => array(	'description' => __('Inserts an icon-double-angle-down shortcode. [icon name=icon-double-angle-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-double-angle-down]' ),
	  	'icon-double-angle-left'	 => array(	'description' => __('Inserts an icon-double-angle-left shortcode. [icon name=icon-double-angle-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-double-angle-left]' ),
	  	'icon-double-angle-right'	 => array(	'description' => __('Inserts an icon-double-angle-right shortcode. [icon name=icon-double-angle-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-double-angle-right]' ),
	  	'icon-double-angle-up'	 => array(	'description' => __('Inserts an icon-double-angle-up shortcode. [icon name=icon-double-angle-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-double-angle-up]' ),
	  	'icon-download'	 => array(	'description' => __('Inserts an icon-download shortcode. [icon name=icon-download size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-download]' ),
	  	'icon-download-alt'	 => array(	'description' => __('Inserts an icon-download-alt shortcode. [icon name=icon-download-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-download-alt]' ),
	  	'icon-edit'	 => array(	'description' => __('Inserts an icon-edit shortcode. [icon name=icon-edit size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-edit]' ),
	  	'icon-eject'	 => array(	'description' => __('Inserts an icon-eject shortcode. [icon name=icon-eject size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-eject]' ),
	  	'icon-envelope'	 => array(	'description' => __('Inserts an icon-envelope shortcode. [icon name=icon-envelope size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-envelope]' ),
	  	'icon-envelope-alt'	 => array(	'description' => __('Inserts an icon-envelope-alt shortcode. [icon name=icon-envelope-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-envelope-alt]' ),
	  	'icon-exchange'	 => array(	'description' => __('Inserts an icon-exchange shortcode. [icon name=icon-exchange size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-exchange]' ),
	  	'icon-exclamation-sign'	 => array(	'description' => __('Inserts an icon-exclamation-sign shortcode. [icon name=icon-exclamation-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-exclamation-sign]' ),
	  	'icon-external-link'	 => array(	'description' => __('Inserts an icon-external-link shortcode. [icon name=icon-external-link size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-external-link]' ),
	  	'icon-eye-close'	 => array(	'description' => __('Inserts an icon-eye-close shortcode. [icon name=icon-eye-close size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-eye-close]' ),
	  	'icon-eye-open'	 => array(	'description' => __('Inserts an icon-eye-open shortcode. [icon name=icon-eye-open size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-eye-open]' ),
	  	'icon-facebook'	 => array(	'description' => __('Inserts an icon-facebook shortcode. [icon name=icon-facebook size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-facebook]' ),
	  	'icon-facebook-sign'	 => array(	'description' => __('Inserts an icon-facebook-sign shortcode. [icon name=icon-facebook-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-facebook-sign]' ),
	  	'icon-facetime-video'	 => array(	'description' => __('Inserts an icon-facetime-video shortcode. [icon name=icon-facetime-video size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-facetime-video]' ),
	  	'icon-fast-backward'	 => array(	'description' => __('Inserts an icon-fast-backward shortcode. [icon name=icon-fast-backward size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-fast-backward]' ),
	  	'icon-fast-forward'	 => array(	'description' => __('Inserts an icon-fast-forward shortcode. [icon name=icon-fast-forward size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-fast-forward]' ),
	  	'icon-fighter-jet'	 => array(	'description' => __('Inserts an icon-fighter-jet shortcode. [icon name=icon-fighter-jet size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-fighter-jet]' ),
	  	'icon-file'	 => array(	'description' => __('Inserts an icon-file shortcode. [icon name=icon-file size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-file]' ),
	  	'icon-file-alt'	 => array(	'description' => __('Inserts an icon-file-alt shortcode. [icon name=icon-file-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-file-alt]' ),
	  	'icon-film'	 => array(	'description' => __('Inserts an icon-film shortcode. [icon name=icon-film size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-film]' ),
	  	'icon-filter'	 => array(	'description' => __('Inserts an icon-filter shortcode. [icon name=icon-filter size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-filter]' ),
	  	'icon-fire'	 => array(	'description' => __('Inserts an icon-fire shortcode. [icon name=icon-fire size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-fire]' ),
	  	'icon-flag'	 => array(	'description' => __('Inserts an icon-flag shortcode. [icon name=icon-flag size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-flag]' ),
	  	'icon-folder-close'	 => array(	'description' => __('Inserts an icon-folder-close shortcode. [icon name=icon-folder-close size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-folder-close]' ),
	  	'icon-folder-open'	 => array(	'description' => __('Inserts an icon-folder-open shortcode. [icon name=icon-folder-open size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-folder-open]' ),
	  	'icon-font'	 => array(	'description' => __('Inserts an icon-font shortcode. [icon name=icon-font size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-font]' ),
	  	'icon-food'	 => array(	'description' => __('Inserts an icon-food shortcode. [icon name=icon-food size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-food]' ),
	  	'icon-forward'	 => array(	'description' => __('Inserts an icon-forward shortcode. [icon name=icon-forward size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-forward]' ),
	  	'icon-fullscreen'	 => array(	'description' => __('Inserts an icon-fullscreen shortcode. [icon name=icon-fullscreen size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-fullscreen]' ),
	  	'icon-gift'	 => array(	'description' => __('Inserts an icon-gift shortcode. [icon name=icon-gift size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-gift]' ),
	  	'icon-github'	 => array(	'description' => __('Inserts an icon-github shortcode. [icon name=icon-github size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-github]' ),
	  	'icon-github-sign'	 => array(	'description' => __('Inserts an icon-github-sign shortcode. [icon name=icon-github-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-github-sign]' ),
	  	'icon-glass'	 => array(	'description' => __('Inserts an icon-glass shortcode. [icon name=icon-glass size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-glass]' ),
	  	'icon-globe'	 => array(	'description' => __('Inserts an icon-globe shortcode. [icon name=icon-globe size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-globe]' ),
	  	'icon-google-plus'	 => array(	'description' => __('Inserts an icon-google-plus shortcode. [icon name=icon-google-plus size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-google-plus]' ),
	  	'icon-google-plus-sign'	 => array(	'description' => __('Inserts an icon-google-plus-sign shortcode. [icon name=icon-google-plus-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-google-plus-sign]' ),
	  	'icon-group'	 => array(	'description' => __('Inserts an icon-group shortcode. [icon name=icon-group size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-group]' ),
	  	'icon-h-sign'	 => array(	'description' => __('Inserts an icon-h-sign shortcode. [icon name=icon-h-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-h-sign]' ),
	  	'icon-hand-down'	 => array(	'description' => __('Inserts an icon-hand-down shortcode. [icon name=icon-hand-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-hand-down]' ),
	  	'icon-hand-left'	 => array(	'description' => __('Inserts an icon-hand-left shortcode. [icon name=icon-hand-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-hand-left]' ),
	  	'icon-hand-right'	 => array(	'description' => __('Inserts an icon-hand-right shortcode. [icon name=icon-hand-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-hand-right]' ),
	  	'icon-hand-up'	 => array(	'description' => __('Inserts an icon-hand-up shortcode. [icon name=icon-hand-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-hand-up]' ),
	  	'icon-hdd'	 => array(	'description' => __('Inserts an icon-hdd shortcode. [icon name=icon-hdd size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-hdd]' ),
	  	'icon-headphones'	 => array(	'description' => __('Inserts an icon-headphones shortcode. [icon name=icon-headphones size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-headphones]' ),
	  	'icon-heart'	 => array(	'description' => __('Inserts an icon-heart shortcode. [icon name=icon-heart size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-heart]' ),
	  	'icon-heart-empty'	 => array(	'description' => __('Inserts an icon-heart-empty shortcode. [icon name=icon-heart-empty size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-heart-empty]' ),
	  	'icon-home'	 => array(	'description' => __('Inserts an icon-home shortcode. [icon name=icon-home size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-home]' ),
	  	'icon-hospital'	 => array(	'description' => __('Inserts an icon-hospital shortcode. [icon name=icon-hospital size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-hospital]' ),
	  	'icon-inbox'	 => array(	'description' => __('Inserts an icon-inbox shortcode. [icon name=icon-inbox size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-inbox]' ),
	  	'icon-indent-left'	 => array(	'description' => __('Inserts an icon-indent-left shortcode. [icon name=icon-indent-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-indent-left]' ),
	  	'icon-indent-right'	 => array(	'description' => __('Inserts an icon-indent-right shortcode. [icon name=icon-indent-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-indent-right]' ),
	  	'icon-info-sign'	 => array(	'description' => __('Inserts an icon-info-sign shortcode. [icon name=icon-info-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-info-sign]' ),
	  	'icon-italic'	 => array(	'description' => __('Inserts an icon-italic shortcode. [icon name=icon-italic size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-italic]' ),
	  	'icon-key'	 => array(	'description' => __('Inserts an icon-key shortcode. [icon name=icon-key size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-key]' ),
	  	'icon-laptop'	 => array(	'description' => __('Inserts an icon-laptop shortcode. [icon name=icon-laptop size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-laptop]' ),
	  	'icon-leaf'	 => array(	'description' => __('Inserts an icon-leaf shortcode. [icon name=icon-leaf size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-leaf]' ),
	  	'icon-legal'	 => array(	'description' => __('Inserts an icon-legal shortcode. [icon name=icon-legal size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-legal]' ),
	  	'icon-lemon'	 => array(	'description' => __('Inserts an icon-lemon shortcode. [icon name=icon-lemon size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-lemon]' ),
	  	'icon-lightbulb'	 => array(	'description' => __('Inserts an icon-lightbulb shortcode. [icon name=icon-lightbulb size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-lightbulb]' ),
	  	'icon-link'	 => array(	'description' => __('Inserts an icon-link shortcode. [icon name=icon-link size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-link]' ),
	  	'icon-linkedin'	 => array(	'description' => __('Inserts an icon-linkedin shortcode. [icon name=icon-linkedin size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-linkedin]' ),
	  	'icon-linkedin-sign'	 => array(	'description' => __('Inserts an icon-linkedin-sign shortcode. [icon name=icon-linkedin-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-linkedin-sign]' ),
	  	'icon-list'	 => array(	'description' => __('Inserts an icon-list shortcode. [icon name=icon-list size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-list]' ),
	  	'icon-list-alt'	 => array(	'description' => __('Inserts an icon-list-alt shortcode. [icon name=icon-list-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-list-alt]' ),
	  	'icon-list-ol'	 => array(	'description' => __('Inserts an icon-list-ol shortcode. [icon name=icon-list-ol size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-list-ol]' ),
	  	'icon-list-ul'	 => array(	'description' => __('Inserts an icon-list-ul shortcode. [icon name=icon-list-ul size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-list-ul]' ),
	  	'icon-lock'	 => array(	'description' => __('Inserts an icon-lock shortcode. [icon name=icon-lock size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-lock]' ),
	  	'icon-magic'	 => array(	'description' => __('Inserts an icon-magic shortcode. [icon name=icon-magic size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-magic]' ),
	  	'icon-magnet'	 => array(	'description' => __('Inserts an icon-magnet shortcode. [icon name=icon-magnet size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-magnet]' ),
	  	'icon-map-marker'	 => array(	'description' => __('Inserts an icon-map-marker shortcode. [icon name=icon-map-marker size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-map-marker]' ),
	  	'icon-medkit'	 => array(	'description' => __('Inserts an icon-medkit shortcode. [icon name=icon-medkit size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-medkit]' ),
	  	'icon-minus'	 => array(	'description' => __('Inserts an icon-minus shortcode. [icon name=icon-minus size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-minus]' ),
	  	'icon-minus-sign'	 => array(	'description' => __('Inserts an icon-minus-sign shortcode. [icon name=icon-minus-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-minus-sign]' ),
	  	'icon-mobile-phone'	 => array(	'description' => __('Inserts an icon-mobile-phone shortcode. [icon name=icon-mobile-phone size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-mobile-phone]' ),
	  	'icon-money'	 => array(	'description' => __('Inserts an icon-money shortcode. [icon name=icon-money size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-money]' ),
	  	'icon-move'	 => array(	'description' => __('Inserts an icon-move shortcode. [icon name=icon-move size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-move]' ),
	  	'icon-music'	 => array(	'description' => __('Inserts an icon-music shortcode. [icon name=icon-music size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-music]' ),
	  	'icon-off'	 => array(	'description' => __('Inserts an icon-off shortcode. [icon name=icon-off size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-off]' ),
	  	'icon-ok'	 => array(	'description' => __('Inserts an icon-ok shortcode. [icon name=icon-ok size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-ok]' ),
	  	'icon-ok-circle'	 => array(	'description' => __('Inserts an icon-ok-circle shortcode. [icon name=icon-ok-circle size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-ok-circle]' ),
	  	'icon-ok-sign'	 => array(	'description' => __('Inserts an icon-ok-sign shortcode. [icon name=icon-ok-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-ok-sign]' ),
	  	'icon-paper-clip'	 => array(	'description' => __('Inserts an icon-paper-clip shortcode. [icon name=icon-paper-clip size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-paper-clip]' ),
	  	'icon-paste'	 => array(	'description' => __('Inserts an icon-paste shortcode. [icon name=icon-paste size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-paste]' ),
	  	'icon-pause'	 => array(	'description' => __('Inserts an icon-pause shortcode. [icon name=icon-pause size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-pause]' ),
	  	'icon-pencil'	 => array(	'description' => __('Inserts an icon-pencil shortcode. [icon name=icon-pencil size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-pencil]' ),
	  	'icon-phone'	 => array(	'description' => __('Inserts an icon-phone shortcode. [icon name=icon-phone size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-phone]' ),
	  	'icon-phone-sign'	 => array(	'description' => __('Inserts an icon-phone-sign shortcode. [icon name=icon-phone-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-phone-sign]' ),
	  	'icon-picture'	 => array(	'description' => __('Inserts an icon-picture shortcode. [icon name=icon-picture size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-picture]' ),
	  	'icon-pinterest'	 => array(	'description' => __('Inserts an icon-pinterest shortcode. [icon name=icon-pinterest size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-pinterest]' ),
	  	'icon-pinterest-sign'	 => array(	'description' => __('Inserts an icon-pinterest-sign shortcode. [icon name=icon-pinterest-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-pinterest-sign]' ),
	  	'icon-plane'	 => array(	'description' => __('Inserts an icon-plane shortcode. [icon name=icon-plane size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-plane]' ),
	  	'icon-play'	 => array(	'description' => __('Inserts an icon-play shortcode. [icon name=icon-play size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-play]' ),
	  	'icon-play-circle'	 => array(	'description' => __('Inserts an icon-play-circle shortcode. [icon name=icon-play-circle size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-play-circle]' ),
	  	'icon-plus'	 => array(	'description' => __('Inserts an icon-plus shortcode. [icon name=icon-plus size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-plus]' ),
	  	'icon-plus-sign'	 => array(	'description' => __('Inserts an icon-plus-sign shortcode. [icon name=icon-plus-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-plus-sign]' ),
	  	'icon-plus-sign-alt'	 => array(	'description' => __('Inserts an icon-plus-sign-alt shortcode. [icon name=icon-plus-sign-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-plus-sign-alt]' ),
	  	'icon-print'	 => array(	'description' => __('Inserts an icon-print shortcode. [icon name=icon-print size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-print]' ),
	  	'icon-pushpin'	 => array(	'description' => __('Inserts an icon-pushpin shortcode. [icon name=icon-pushpin size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-pushpin]' ),
	  	'icon-qrcode'	 => array(	'description' => __('Inserts an icon-qrcode shortcode. [icon name=icon-qrcode size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-qrcode]' ),
	  	'icon-question-sign'	 => array(	'description' => __('Inserts an icon-question-sign shortcode. [icon name=icon-question-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-question-sign]' ),
	  	'icon-quote-left'	 => array(	'description' => __('Inserts an icon-quote-left shortcode. [icon name=icon-quote-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-quote-left]' ),
	  	'icon-quote-right'	 => array(	'description' => __('Inserts an icon-quote-right shortcode. [icon name=icon-quote-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-quote-right]' ),
	  	'icon-random'	 => array(	'description' => __('Inserts an icon-random shortcode. [icon name=icon-random size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-random]' ),
	  	'icon-refresh'	 => array(	'description' => __('Inserts an icon-refresh shortcode. [icon name=icon-refresh size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-refresh]' ),
	  	'icon-remove'	 => array(	'description' => __('Inserts an icon-remove shortcode. [icon name=icon-remove size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-remove]' ),
	  	'icon-remove-circle'	 => array(	'description' => __('Inserts an icon-remove-circle shortcode. [icon name=icon-remove-circle size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-remove-circle]' ),
	  	'icon-remove-sign'	 => array(	'description' => __('Inserts an icon-remove-sign shortcode. [icon name=icon-remove-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-remove-sign]' ),
	  	'icon-reorder'	 => array(	'description' => __('Inserts an icon-reorder shortcode. [icon name=icon-reorder size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-reorder]' ),
	  	'icon-repeat'	 => array(	'description' => __('Inserts an icon-repeat shortcode. [icon name=icon-repeat size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-repeat]' ),
	  	'icon-reply'	 => array(	'description' => __('Inserts an icon-reply shortcode. [icon name=icon-reply size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-reply]' ),
	  	'icon-resize-full'	 => array(	'description' => __('Inserts an icon-resize-full shortcode. [icon name=icon-resize-full size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-resize-full]' ),
	  	'icon-resize-horizontal'	 => array(	'description' => __('Inserts an icon-resize-horizontal shortcode. [icon name=icon-resize-horizontal size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-resize-horizontal]' ),
	  	'icon-resize-small'	 => array(	'description' => __('Inserts an icon-resize-small shortcode. [icon name=icon-resize-small size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-resize-small]' ),
	  	'icon-resize-vertical'	 => array(	'description' => __('Inserts an icon-resize-vertical shortcode. [icon name=icon-resize-vertical size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-resize-vertical]' ),
	  	'icon-retweet'	 => array(	'description' => __('Inserts an icon-retweet shortcode. [icon name=icon-retweet size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-retweet]' ),
	  	'icon-road'	 => array(	'description' => __('Inserts an icon-road shortcode. [icon name=icon-road size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-road]' ),
	  	'icon-rss'	 => array(	'description' => __('Inserts an icon-rss shortcode. [icon name=icon-rss size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-rss]' ),
	  	'icon-save'	 => array(	'description' => __('Inserts an icon-save shortcode. [icon name=icon-save size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-save]' ),
	  	'icon-screenshot'	 => array(	'description' => __('Inserts an icon-screenshot shortcode. [icon name=icon-screenshot size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-screenshot]' ),
	  	'icon-search'	 => array(	'description' => __('Inserts an icon-search shortcode. [icon name=icon-search size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-search]' ),
	  	'icon-share'	 => array(	'description' => __('Inserts an icon-share shortcode. [icon name=icon-share size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-share]' ),
	  	'icon-share-alt'	 => array(	'description' => __('Inserts an icon-share-alt shortcode. [icon name=icon-share-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-share-alt]' ),
	  	'icon-shopping-cart'	 => array(	'description' => __('Inserts an icon-shopping-cart shortcode. [icon name=icon-shopping-cart size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-shopping-cart]' ),
	  	'icon-sign-blank'	 => array(	'description' => __('Inserts an icon-sign-blank shortcode. [icon name=icon-sign-blank size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sign-blank]' ),
	  	'icon-signal'	 => array(	'description' => __('Inserts an icon-signal shortcode. [icon name=icon-signal size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-signal]' ),
	  	'icon-signin'	 => array(	'description' => __('Inserts an icon-signin shortcode. [icon name=icon-signin size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-signin]' ),
	  	'icon-signout'	 => array(	'description' => __('Inserts an icon-signout shortcode. [icon name=icon-signout size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-signout]' ),
	  	'icon-sitemap'	 => array(	'description' => __('Inserts an icon-sitemap shortcode. [icon name=icon-sitemap size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sitemap]' ),
	  	'icon-sort'	 => array(	'description' => __('Inserts an icon-sort shortcode. [icon name=icon-sort size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sort]' ),
	  	'icon-sort-down'	 => array(	'description' => __('Inserts an icon-sort-down shortcode. [icon name=icon-sort-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sort-down]' ),
	  	'icon-sort-up'	 => array(	'description' => __('Inserts an icon-sort-up shortcode. [icon name=icon-sort-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sort-up]' ),
	  	'icon-spinner'	 => array(	'description' => __('Inserts an icon-spinner shortcode. [icon name=icon-spinner size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-spinner]' ),
	  	'icon-star'	 => array(	'description' => __('Inserts an icon-star shortcode. [icon name=icon-star size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-star]' ),
	  	'icon-star-empty'	 => array(	'description' => __('Inserts an icon-star-empty shortcode. [icon name=icon-star-empty size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-star-empty]' ),
	  	'icon-star-half'	 => array(	'description' => __('Inserts an icon-star-half shortcode. [icon name=icon-star-half size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-star-half]' ),
	  	'icon-step-backward'	 => array(	'description' => __('Inserts an icon-step-backward shortcode. [icon name=icon-step-backward size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-step-backward]' ),
	  	'icon-step-forward'	 => array(	'description' => __('Inserts an icon-step-forward shortcode. [icon name=icon-step-forward size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-step-forward]' ),
	  	'icon-stethoscope'	 => array(	'description' => __('Inserts an icon-stethoscope shortcode. [icon name=icon-stethoscope size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-stethoscope]' ),
	  	'icon-stop'	 => array(	'description' => __('Inserts an icon-stop shortcode. [icon name=icon-stop size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-stop]' ),
	  	'icon-strikethrough'	 => array(	'description' => __('Inserts an icon-strikethrough shortcode. [icon name=icon-strikethrough size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-strikethrough]' ),
	  	'icon-suitcase'	 => array(	'description' => __('Inserts an icon-suitcase shortcode. [icon name=icon-suitcase size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-suitcase]' ),
	  	'icon-table'	 => array(	'description' => __('Inserts an icon-table shortcode. [icon name=icon-table size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-table]' ),
	  	'icon-tablet'	 => array(	'description' => __('Inserts an icon-tablet shortcode. [icon name=icon-tablet size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-tablet]' ),
	  	'icon-tag'	 => array(	'description' => __('Inserts an icon-tag shortcode. [icon name=icon-tag size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-tag]' ),
	  	'icon-tags'	 => array(	'description' => __('Inserts an icon-tags shortcode. [icon name=icon-tags size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-tags]' ),
	  	'icon-tasks'	 => array(	'description' => __('Inserts an icon-tasks shortcode. [icon name=icon-tasks size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-tasks]' ),
	  	'icon-text-height'	 => array(	'description' => __('Inserts an icon-text-height shortcode. [icon name=icon-text-height size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-text-height]' ),
	  	'icon-text-width'	 => array(	'description' => __('Inserts an icon-text-width shortcode. [icon name=icon-text-width size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-text-width]' ),
	  	'icon-th'	 => array(	'description' => __('Inserts an icon-th shortcode. [icon name=icon-th size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-th]' ),
	  	'icon-th-large'	 => array(	'description' => __('Inserts an icon-th-large shortcode. [icon name=icon-th-large size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-th-large]' ),
	  	'icon-th-list'	 => array(	'description' => __('Inserts an icon-th-list shortcode. [icon name=icon-th-list size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-th-list]' ),
	  	'icon-thumbs-down'	 => array(	'description' => __('Inserts an icon-thumbs-down shortcode. [icon name=icon-thumbs-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-thumbs-down]' ),
	  	'icon-thumbs-up'	 => array(	'description' => __('Inserts an icon-thumbs-up shortcode. [icon name=icon-thumbs-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-thumbs-up]' ),
	  	'icon-time'	 => array(	'description' => __('Inserts an icon-time shortcode. [icon name=icon-time size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-time]' ),
	  	'icon-tint'	 => array(	'description' => __('Inserts an icon-tint shortcode. [icon name=icon-tint size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-tint]' ),
	  	'icon-trash'	 => array(	'description' => __('Inserts an icon-trash shortcode. [icon name=icon-trash size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-trash]' ),
	  	'icon-trophy'	 => array(	'description' => __('Inserts an icon-trophy shortcode. [icon name=icon-trophy size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-trophy]' ),
	  	'icon-truck'	 => array(	'description' => __('Inserts an icon-truck shortcode. [icon name=icon-truck size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-truck]' ),
	  	'icon-twitter'	 => array(	'description' => __('Inserts an icon-twitter shortcode. [icon name=icon-twitter size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-twitter]' ),
	  	'icon-twitter-sign'	 => array(	'description' => __('Inserts an icon-twitter-sign shortcode. [icon name=icon-twitter-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-twitter-sign]' ),
	  	'icon-umbrella'	 => array(	'description' => __('Inserts an icon-umbrella shortcode. [icon name=icon-umbrella size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-umbrella]' ),
	  	'icon-underline'	 => array(	'description' => __('Inserts an icon-underline shortcode. [icon name=icon-underline size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-underline]' ),
	  	'icon-undo'	 => array(	'description' => __('Inserts an icon-undo shortcode. [icon name=icon-undo size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-undo]' ),
  		'icon-unlock'	 => array(	'description' => __('Inserts an icon-unlock shortcode. [icon name=icon-unlock size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-unlock]' ),
  		'icon-upload'	 => array(	'description' => __('Inserts an icon-upload shortcode. [icon name=icon-upload size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-upload]' ),
  		'icon-upload-alt'	 => array(	'description' => __('Inserts an icon-upload-alt shortcode. [icon name=icon-upload-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-upload-alt]' ),
  		'icon-user'	 => array(	'description' => __('Inserts an icon-user shortcode. [icon name=icon-user size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-user]' ),
  		'icon-user-md'	 => array(	'description' => __('Inserts an icon-user-md shortcode. [icon name=icon-user-md size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-user-md]' ),
  		'icon-volume-down'	 => array(	'description' => __('Inserts an icon-volume-down shortcode. [icon name=icon-volume-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-volume-down]' ),
  		'icon-volume-off'	 => array(	'description' => __('Inserts an icon-volume-off shortcode. [icon name=icon-volume-off size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-volume-off]' ),
  		'icon-volume-up'	 => array(	'description' => __('Inserts an icon-volume-up shortcode. [icon name=icon-volume-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-volume-up]' ),
  		'icon-warning-sign'	 => array(	'description' => __('Inserts an icon-warning-sign shortcode. [icon name=icon-warning-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-warning-sign]' ),
  		'icon-wrench'	 => array(	'description' => __('Inserts an icon-wrench shortcode. [icon name=icon-wrench size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-wrench]' ),
  		'icon-zoom-in'	 => array(	'description' => __('Inserts an icon-zoom-in shortcode. [icon name=icon-zoom-in size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-zoom-in]' ),
  		'icon-zoom-out'	 => array(	'description' => __('Inserts an icon-zoom-out shortcode. [icon name=icon-zoom-out size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-zoom-out]' ),

  		'expand-alt'	 => array(	'description' => __('Inserts an expand-alt shortcode. [icon name=expand-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=expand-alt]' ),
  		' icon-collapse-alt'	 => array(	'description' => __('Inserts an  icon-collapse-alt shortcode. [icon name= icon-collapse-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-collapse-alt]' ),
  		'icon-smile'	 => array(	'description' => __('Inserts an icon-smile shortcode. [icon name=icon-smile size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-smile]' ),
  		'icon-frown'	 => array(	'description' => __('Inserts an icon-frown shortcode. [icon name=icon-frown size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-frown]' ),
  		'icon-meh'	 => array(	'description' => __('Inserts an icon-meh shortcode. [icon name=icon-meh size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-meh]' ),
  		'icon-gamepad'	 => array(	'description' => __('Inserts an icon-gamepad shortcode. [icon name=icon-gamepad size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-gamepad]' ),
  		'icon-keyboard'	 => array(	'description' => __('Inserts an icon-keyboard shortcode. [icon name=icon-keyboard size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-keyboard]' ),
  		'icon-flag-alt'	 => array(	'description' => __('Inserts an icon-flag-alt shortcode. [icon name=icon-flag-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-flag-alt]' ),
  		'icon-flag-checkered'	 => array(	'description' => __('Inserts an icon-flag-checkered shortcode. [icon name=icon-flag-checkered size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-flag-checkered]' ),
  		'icon-terminal'	 => array(	'description' => __('Inserts an icon-terminal shortcode. [icon name=icon-terminal size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-terminal]' ),
  		'icon-code'	 => array(	'description' => __('Inserts an icon-code shortcode. [icon name=icon-code size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-code]' ),
  		'icon-mail-forward'	 => array(	'description' => __('Inserts an icon-mail-forward shortcode. [icon name=icon-mail-forward size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-mail-forward]' ),
  		'icon-mail-reply'	 => array(	'description' => __('Inserts an icon-mail-reply shortcode. [icon name=icon-mail-reply size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-mail-reply]' ),
  		'icon-reply-all'	 => array(	'description' => __('Inserts an icon-reply-all shortcode. [icon name=icon-reply-all size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-reply-all]' ),
  		'icon-mail-reply-all'	 => array(	'description' => __('Inserts an icon-mail-reply-all shortcode. [icon name=icon-mail-reply-all size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-mail-reply-all]' ),
  		'icon-star-half-empty'	 => array(	'description' => __('Inserts an icon-star-half-empty shortcode. [icon name=icon-star-half-empty size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-star-half-empty]' ),
  		'icon-star-half-full'	 => array(	'description' => __('Inserts an icon-star-half-full shortcode. [icon name=icon-star-half-full size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-star-half-full]' ),
  		'icon-location-arrow'	 => array(	'description' => __('Inserts an icon-location-arrow shortcode. [icon name=icon-location-arrow size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-location-arrow]' ),
  		'icon-rotate-left'	 => array(	'description' => __('Inserts an icon-rotate-left shortcode. [icon name=icon-rotate-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-rotate-left]' ),
  		'icon-rotate-right'	 => array(	'description' => __('Inserts an icon-rotate-right shortcode. [icon name=icon-rotate-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-rotate-right]' ),
  		'icon-crop'	 => array(	'description' => __('Inserts an icon-crop shortcode. [icon name=icon-crop size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-crop]' ),
  		'icon-code-fork'	 => array(	'description' => __('Inserts an icon-code-fork shortcode. [icon name=icon-code-fork size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-code-fork]' ),
  		'icon-unlink'	 => array(	'description' => __('Inserts an icon-unlink shortcode. [icon name=icon-unlink size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-unlink]' ),
  		'icon-question'	 => array(	'description' => __('Inserts an icon-question shortcode. [icon name=icon-question size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-question]' ),
  		'icon-info'	 => array(	'description' => __('Inserts an icon-info shortcode. [icon name=icon-info size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-info]' ),
  		'icon-exclamation'	 => array(	'description' => __('Inserts an icon-exclamation shortcode. [icon name=icon-exclamation size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-exclamation]' ),
  		'icon-superscript'	 => array(	'description' => __('Inserts an icon-superscript shortcode. [icon name=icon-superscript size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-superscript]' ),
  		'icon-subscript'	 => array(	'description' => __('Inserts an icon-subscript shortcode. [icon name=icon-subscript size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-subscript]' ),
  		'icon-eraser'	 => array(	'description' => __('Inserts an icon-eraser shortcode. [icon name=icon-eraser size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-eraser]' ),
  		'icon-puzzle-piece'	 => array(	'description' => __('Inserts an icon-puzzle-piece shortcode. [icon name=icon-puzzle-piece size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-puzzle-piece]' ),
  		'icon-microphone'	 => array(	'description' => __('Inserts an icon-microphone shortcode. [icon name=icon-microphone size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-microphone]' ),
  		'icon-microphone-off'	 => array(	'description' => __('Inserts an icon-microphone-off shortcode. [icon name=icon-microphone-off size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-microphone-off]' ),
  		'icon-shield'	 => array(	'description' => __('Inserts an icon-shield shortcode. [icon name=icon-shield size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-shield]' ),
  		'icon-calendar-empty'	 => array(	'description' => __('Inserts an icon-calendar-empty shortcode. [icon name=icon-calendar-empty size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-calendar-empty]' ),
  		'icon-fire-extinguisher'	 => array(	'description' => __('Inserts an icon-fire-extinguisher shortcode. [icon name=icon-fire-extinguisher size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-fire-extinguisher]' ),
  		'icon-rocket'	 => array(	'description' => __('Inserts an icon-rocket shortcode. [icon name=icon-rocket size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-rocket]' ),
  		'icon-maxcdn'	 => array(	'description' => __('Inserts an icon-maxcdn shortcode. [icon name=icon-maxcdn size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-maxcdn]' ),
  		'icon-chevron-sign-left'	 => array(	'description' => __('Inserts an icon-chevron-sign-left shortcode. [icon name=icon-chevron-sign-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-chevron-sign-left]' ),
  		'icon-chevron-sign-right'	 => array(	'description' => __('Inserts an icon-chevron-sign-right shortcode. [icon name=icon-chevron-sign-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-chevron-sign-right]' ),
  		'icon-chevron-sign-up'	 => array(	'description' => __('Inserts an icon-chevron-sign-up shortcode. [icon name=icon-chevron-sign-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-chevron-sign-up]' ),
  		'icon-chevron-sign-down'	 => array(	'description' => __('Inserts an icon-chevron-sign-down shortcode. [icon name=icon-chevron-sign-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-chevron-sign-down]' ),
  		'icon-html5'	 => array(	'description' => __('Inserts an icon-html5 shortcode. [icon name=icon-html5 size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-html5]' ),
  		'icon-css3'	 => array(	'description' => __('Inserts an icon-css3 shortcode. [icon name=icon-css3 size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-css3]' ),
  		'icon-anchor'	 => array(	'description' => __('Inserts an icon-anchor shortcode. [icon name=icon-anchor size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-anchor]' ),
  		'icon-unlock-alt'	 => array(	'description' => __('Inserts an icon-unlock-alt shortcode. [icon name=icon-unlock-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-unlock-alt]' ),
  		'icon-bullseye'	 => array(	'description' => __('Inserts an icon-bullseye shortcode. [icon name=icon-bullseye size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bullseye]' ),
  		'icon-ellipsis-horizontal'	 => array(	'description' => __('Inserts an icon-ellipsis-horizontal shortcode. [icon name=icon-ellipsis-horizontal size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-ellipsis-horizontal]' ),
  		'icon-ellipsis-vertical'	 => array(	'description' => __('Inserts an icon-ellipsis-vertical shortcode. [icon name=icon-ellipsis-vertical size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-ellipsis-vertical]' ),
  		'icon-rss-sign'	 => array(	'description' => __('Inserts an icon-rss-sign shortcode. [icon name=icon-rss-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-rss-sign]' ),
  		'icon-play-sign'	 => array(	'description' => __('Inserts an icon-play-sign shortcode. [icon name=icon-play-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-play-sign]' ),
  		'icon-ticket'	 => array(	'description' => __('Inserts an icon-ticket shortcode. [icon name=icon-ticket size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-ticket]' ),
  		'icon-minus-sign-alt'	 => array(	'description' => __('Inserts an icon-minus-sign-alt shortcode. [icon name=icon-minus-sign-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-minus-sign-alt]' ),
  		'icon-check-minus'	 => array(	'description' => __('Inserts an icon-check-minus shortcode. [icon name=icon-check-minus size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-check-minus]' ),
  		'icon-level-up'	 => array(	'description' => __('Inserts an icon-level-up shortcode. [icon name=icon-level-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-level-up]' ),
  		'icon-level-down'	 => array(	'description' => __('Inserts an icon-level-down shortcode. [icon name=icon-level-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-level-down]' ),
  		'icon-check-sign'	 => array(	'description' => __('Inserts an icon-check-sign shortcode. [icon name=icon-check-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-check-sign]' ),
  		'icon-edit-sign'	 => array(	'description' => __('Inserts an icon-edit-sign shortcode. [icon name=icon-edit-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-edit-sign]' ),
  		'icon-external-link-sign'	 => array(	'description' => __('Inserts an icon-external-link-sign shortcode. [icon name=icon-external-link-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-external-link-sign]' ),
  		'icon-share-sign'	 => array(	'description' => __('Inserts an icon-share-sign shortcode. [icon name=icon-share-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-share-sign]' )

  		'icon-compass'	 => array(	'description' => __('Inserts an icon-compass shortcode. [icon name=icon-compass size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-compass]' ),
  		'icon-eur'	 => array(	'description' => __('Inserts an icon-eur shortcode. [icon name=icon-eur size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-eur]' ),
  		'icon-dollar'	 => array(	'description' => __('Inserts an icon-dollar shortcode. [icon name=icon-dollar size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-dollar]' ),
  		'icon-yen'	 => array(	'description' => __('Inserts an icon-yen shortcode. [icon name=icon-yen size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-yen]' ),
  		'icon-won'	 => array(	'description' => __('Inserts an icon-won shortcode. [icon name=icon-won size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-won]' ),
  		'icon-file-text'	 => array(	'description' => __('Inserts an icon-file-text shortcode. [icon name=icon-file-text size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-file-text]' ),
  		'icon-sort-by-attributes-alt'	 => array(	'description' => __('Inserts an icon-sort-by-attributes-alt shortcode. [icon name=icon-sort-by-attributes-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sort-by-attributes-alt]' ),
  		'icon-thumbs-down'	 => array(	'description' => __('Inserts an icon-thumbs-down shortcode. [icon name=icon-thumbs-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-thumbs-down]' ),
  		'icon-xing-sign'	 => array(	'description' => __('Inserts an icon-xing-sign shortcode. [icon name=icon-xing-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-xing-sign]' ),
  		'icon-instagram'	 => array(	'description' => __('Inserts an icon-instagram shortcode. [icon name=icon-instagram size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-instagram]' ),
  		'icon-collapse'	 => array(	'description' => __('Inserts an icon-collapse shortcode. [icon name=icon-collapse size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-collapse]' ),
  		'icon-collapse-top'	 => array(	'description' => __('Inserts an icon-collapse-top shortcode. [icon name=icon-collapse-top size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-collapse-top]' ),
  		'icon-expand'	 => array(	'description' => __('Inserts an icon-expand shortcode. [icon name=icon-expand size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-expand]' ),
  		'icon-gbp'	 => array(	'description' => __('Inserts an icon-gbp shortcode. [icon name=icon-gbp size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-gbp]' ),
  		'icon-usd'	 => array(	'description' => __('Inserts an icon-usd shortcode. [icon name=icon-usd size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-usd]' ),
  		'icon-inr'	 => array(	'description' => __('Inserts an icon-inr shortcode. [icon name=icon-inr size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-inr]' ),
  		'icon-jpy'	 => array(	'description' => __('Inserts an icon-jpy shortcode. [icon name=icon-jpy size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-jpy]' ),
  		'icon-cny'	 => array(	'description' => __('Inserts an icon-cny shortcode. [icon name=icon-cny size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-cny]' ),
  		'icon-krw'	 => array(	'description' => __('Inserts an icon-krw shortcode. [icon name=icon-krw size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-krw]' ),
  		'icon-btc'	 => array(	'description' => __('Inserts an icon-btc shortcode. [icon name=icon-btc size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-btc]' ),
  		'icon-file'	 => array(	'description' => __('Inserts an icon-file shortcode. [icon name=icon-file size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-file]' ),
  		'icon-sort-by-alphabet'	 => array(	'description' => __('Inserts an icon-sort-by-alphabet shortcode. [icon name=icon-sort-by-alphabet size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sort-by-alphabet]' ),
  		'icon-sort-by-alphabet-alt'	 => array(	'description' => __('Inserts an icon-sort-by-alphabet-alt shortcode. [icon name=icon-sort-by-alphabet-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sort-by-alphabet-alt]' ),
  		'icon-sort-by-attributes'	 => array(	'description' => __('Inserts an icon-sort-by-attributes shortcode. [icon name=icon-sort-by-attributes size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sort-by-attributes]' ),
  		'icon-sort-by-order'	 => array(	'description' => __('Inserts an icon-sort-by-order shortcode. [icon name=icon-sort-by-order size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sort-by-order]' ),
  		'icon-sort-by-order-alt'	 => array(	'description' => __('Inserts an icon-sort-by-order-alt shortcode. [icon name=icon-sort-by-order-alt size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-sort-by-order-alt]' ),
  		'icon-thumbs-up'	 => array(	'description' => __('Inserts an icon-thumbs-up shortcode. [icon name=icon-thumbs-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-thumbs-up]' ),
  		'icon-thumbs-down'	 => array(	'description' => __('Inserts an icon-thumbs-down shortcode. [icon name=icon-thumbs-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-thumbs-down]' ),
  		'icon-youtube-sign'	 => array(	'description' => __('Inserts an icon-youtube-sign shortcode. [icon name=icon-youtube-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-youtube-sign]' ),
  		'icon-youtube'	 => array(	'description' => __('Inserts an icon-youtube shortcode. [icon name=icon-youtube size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-youtube]' ),
  		'icon-xing'	 => array(	'description' => __('Inserts an icon-xing shortcode. [icon name=icon-xing size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-xing]' ),
  		'icon-youtube-play'	 => array(	'description' => __('Inserts an icon-youtube-play shortcode. [icon name=icon-youtube-play size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-youtube-play]' ),
  		'icon-dropbox'	 => array(	'description' => __('Inserts an icon-dropbox shortcode. [icon name=icon-dropbox size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-dropbox]' ),
  		'icon-stackexchange'	 => array(	'description' => __('Inserts an icon-stackexchange shortcode. [icon name=icon-stackexchange size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-stackexchange]' ),
  		'icon-flickr'	 => array(	'description' => __('Inserts an icon-flickr shortcode. [icon name=icon-flickr size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-flickr]' ),
  		'icon-adn'	 => array(	'description' => __('Inserts an icon-adn shortcode. [icon name=icon-adn size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-adn]' ),
  		'icon-bitbucket'	 => array(	'description' => __('Inserts an icon-bitbucket shortcode. [icon name=icon-bitbucket size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bitbucket]' ),
  		'icon-bitbucket-sign'	 => array(	'description' => __('Inserts an icon-bitbucket-sign shortcode. [icon name=icon-bitbucket-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-bitbucket-sign]' ),
  		'icon-tumblr'	 => array(	'description' => __('Inserts an icon-tumblr shortcode. [icon name=icon-tumblr size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-tumblr]' ),
  		'icon-tumblr-sign'	 => array(	'description' => __('Inserts an icon-tumblr-sign shortcode. [icon name=icon-tumblr-sign size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-tumblr-sign]' ),
  		'icon-long-arrow-down'	 => array(	'description' => __('Inserts an icon-long-arrow-down shortcode. [icon name=icon-long-arrow-down size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-long-arrow-down]' ),
  		'icon-long-arrow-up'	 => array(	'description' => __('Inserts an icon-long-arrow-up shortcode. [icon name=icon-long-arrow-up size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-long-arrow-up]' ),
  		'icon-long-arrow-left'	 => array(	'description' => __('Inserts an icon-long-arrow-left shortcode. [icon name=icon-long-arrow-left size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-long-arrow-left]' ),
  		'icon-long-arrow-right'	 => array(	'description' => __('Inserts an icon-long-arrow-right shortcode. [icon name=icon-long-arrow-right size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-long-arrow-right]' ),
  		'icon-apple'	 => array(	'description' => __('Inserts an icon-apple shortcode. [icon name=icon-apple size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-apple]' ),
  		'icon-compass'	 => array(	'description' => __('Inserts an icon-compass shortcode. [icon name=icon-compass size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-compass]' ),
  		'icon-compass'	 => array(	'description' => __('Inserts an icon-compass shortcode. [icon name=icon-compass size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-compass]' ),
  		'icon-compass'	 => array(	'description' => __('Inserts an icon-compass shortcode. [icon name=icon-compass size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-compass]' ),
  		'icon-compass'	 => array(	'description' => __('Inserts an icon-compass shortcode. [icon name=icon-compass size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-compass]' ),
  		'icon-compass'	 => array(	'description' => __('Inserts an icon-compass shortcode. [icon name=icon-compass size=default] You can increase the size by using large, 2x, 3x, 4x', THEME_SLUG),'shortcode' => '[icon name=icon-compass]' ),

	),
	__('Price Table ', THEME_SLUG) => array(
		__('Price Table', THEME_SLUG) => array(
			'description' => __('Inserts a Price Table.', THEME_SLUG),
			'shortcode' => '[tdpricetable columns="1"][tdpricetable_column  title="title" titlefontcolor="#282828" subtitle="subtitle" toplisttitle="toplisttitle" toplistsubtitle="toplistsubtitle" backgroundcolor="#ffffff"  fontcolor="#7D7D7D" ][tdpricetable_content][list none]
list 1
list 2
list 3
list 4
[/list][/tdpricetable_content][tdpricetable_button buttoncolor="#999999" buttonfontcolor="#ffffff" buttonlink="#" buttontitle="Button Title"]Register Here![/tdpricetable_button][/tdpricetable_column][/tdpricetable]',
		)
	),
	__('Progress Bar', THEME_SLUG) => array(
		__('Progress Bar Gray', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="gray" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Orange', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="orange" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Silver', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="silver" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Green', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="green" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Blue', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="blue" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Yellow', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="yellow" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Red', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="red" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Aqua', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="aqua" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Teal', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="teal" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Purple', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="purple" hidetitle="no"][/progressbar]',
		),
		__('Progress Bar Pink', THEME_SLUG) => array(
			'description' => __('Inserts a Progress Bar Gray.', THEME_SLUG),
			'shortcode' => '[progressbar title="Progress Bar" percent="100" color="pink" hidetitle="no"][/progressbar]',
		)

	)
);


// Outputs a category list
//
function core_shortcodes_overlay_categories() {
	global $shortcode_categories;

	foreach ($shortcode_categories as $category => $shortcodes) {
		echo '<li data-category="', sanitize_title_with_dashes($category), '">', $category, '</li>';
	}
}

// Outputs categories and their shortcodes
//
function core_shortcodes_overlay_shortcodes() {
	global $shortcode_categories;

	foreach ($shortcode_categories as $category => $shortcodes) {
		echo '<ul class="shortcodes-', sanitize_title_with_dashes($category), '">';
		foreach ($shortcodes as $name => $shortcode) {
			if ( !preg_match("/icon/", $name) )
				echo '<li data-description=\'', $shortcode['description'], '\' data-shortcode=\'', $shortcode['shortcode'], '\'>', $name, '</li>';
			else
				echo '<li data-description=\'', $shortcode['description'], '\' data-shortcode=\'', $shortcode['shortcode'], '\' class=\'icon\'><i class=\'', $name, '\'></i></li>';
		}
		echo '</ul>';
	}
}

?>
<!doctype html>
<html>
<head>
<title>Shortcodes</title>
<link rel="stylesheet" href="<?php echo THEME_URI; ?>/tdframework/css/font-awesome.min.css">
<!--[if IE 7]>
<link rel="stylesheet" href="<?php echo THEME_URI; ?>/tdframework/css/font-awesome-ie7.min.css">
<![endif]-->
<style type="text/css">
	#categories {
		vertical-align: top;
		width: 130px;
		display: inline-block;
		margin: 0;
		padding: 10px;
		height: 90%;
	}

	#categories > li {
		cursor: pointer;
		padding: 5px;
		margin: 0;
	}

	#categories > li:hover {
		background-color: #21759B;
		color: #fff;
	}

	#shortcodes {
		vertical-align: top;
		width: 260px;
		display: inline-block;
		margin: 0;
		padding: 10px;
		border-left: 1px solid #ddd;
		height: 90%;
	}

	#shortcodes > ul {
		display: none;
	}

	#shortcodes > ul > li {
		cursor: pointer;
		padding: 5px;
		margin: 0;
	}

	#shortcodes > ul > li.icon {
		display: inline-block;
	}

	#shortcodes > ul > li:hover {
		background-color: #21759B;
		color: #fff;
	}

	#description {
		vertical-align: top;
		width: 160px;
		display: inline-block;
		margin: 0;
		padding: 10px;
		border-left: 1px solid #ddd;
		height: 90%;
	}

	#description > p {
		padding: 5px;
	}

	h1 {
		font-size: 1.1em;
		margin: 10px 0;
		padding: 5px;
	}
</style>

<script type="text/javascript">
	var ANIMATION_SPEED = 100;

	// Show a category's shortcodes
	jQuery('#categories > li').click(function() {
		var category = jQuery(this).attr('data-category');

		jQuery('#shortcodes > ul').slideUp(ANIMATION_SPEED);
		jQuery('#shortcodes > .shortcodes-' + category).stop(true, false).show(ANIMATION_SPEED);
	});

	// Show description when hovering over a shortcode
	jQuery('#shortcodes > ul > li').hover(function() {
		var description = jQuery(this).attr('data-description');

		jQuery('#description > p').fadeOut(ANIMATION_SPEED, function() {
			jQuery(this).html(description);
			jQuery(this).fadeIn(ANIMATION_SPEED);
		});
	});

	// Insert shortcode
	jQuery('#shortcodes > ul > li').click(function() {
		var shortcode = jQuery(this).attr('data-shortcode');
		window.send_shortcode(shortcode);
	});
</script>

</head>

<body>
	<ul id="categories">
		<h1><?php _e('Categories', THEME_SLUG); ?></h1>
		<?php core_shortcodes_overlay_categories(); ?>
	</ul>

	<div id="shortcodes">
		<h1><?php _e('Shortcodes', THEME_SLUG); ?></h1>
		<?php core_shortcodes_overlay_shortcodes(); ?>
	</div>

	<div id="description">
		<h1><?php _e('Description', THEME_SLUG); ?></h1>
		<p></p>
	</div>
</body>
</html>