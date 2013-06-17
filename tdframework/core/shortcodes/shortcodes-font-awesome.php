<?php

if (!defined('CORE_VERSION'))
	die();


// Disable wpautop
//remove_filter('the_content', 'wpautop');
// Pre run the shorcodes first before wp_autop() and wp_textuarize()
function core_prerun_shortcode( $content ) {
    global $shortcode_tags;

    // Backup current registered shortcodes and clear them all out
    $orig_shortcode_tags = $shortcode_tags;
    $shortcode_tags = array();
    remove_all_shortcodes();

    add_shortcode('toggle', 'core_shortcode_toggle');
    add_shortcode('toggle_content', 'core_shortcode_toggle_content');
    add_shortcode('header', 'core_shortcode_heading');
   // add_shortcode('code', 'core_shortcode_code');
    add_shortcode('divider', 'core_shortcode_divider');
    add_shortcode('button', 'core_shortcode_button');
    //add_shortcode('gallery', 'core_shortcode_gallery');
    add_shortcode('tabs', 'core_shortcode_tabs');
    add_shortcode('tab', 'core_shortcode_tab');
    add_shortcode('notify', 'core_shortcode_notify');
	//add_shortcode('list', 'core_shortcode_list');
	add_shortcode('columns', 'core_shortcode_columns');
	add_shortcode('column', 'core_shortcode_column');
	add_shortcode('custom_columns', 'core_shortcode_custom_columns');
	add_shortcode('shortcode', 'core_shortcode_display_shortcode');
	//add_shortcode('pullquote', 'core_shortcode_pullquote');
	//add_shortcode('quote-symbol', 'core_shortcode_quote_symbol');
	//add_shortcode('quote', 'core_shortcode_quote');
	//add_shortcode('dropcap', 'core_shortcode_dropcap');

   // Do the shortcode (only the one above is registered)
    $content = do_shortcode( $content );

    // Put the original shortcodes back
    $shortcode_tags = $orig_shortcode_tags;

    return $content;
}
add_filter( 'the_content', 'core_prerun_shortcode', 5 );

// Toggle
// [toggle]
// [toggle_content title="title" subtitle="subtitle"]
// [/toggle_content]
// [/toggle]
//
function core_shortcode_toggle($atts, $content=null, $tag) {
	$output = '<ul class="shortcode-toggle">';
	$output .= do_shortcode($content);
	$output .= '</ul>';

	return $output;
}

function core_shortcode_toggle_content($atts, $content=null, $tag) {
	extract(shortcode_atts(array(
		'title' => '',
		'subtitle' => '',
	), $atts));

	$output = '<li>';
	$output .= '<div class="header"><i class="icon-plus icon"></i> <span class="title">' . $title . '</span><span class="subtitle">' . $subtitle . '</span></div>';

	$output .= '<div class="content">';
	$output .= do_shortcode(wpautop($content));
	$output .= '</div>';

	$output .= '</li>';

	return $output;
}

// Padded headings
// [header 1|2|3|4|5|6]content[/header]
//
$core_shortcode_headings = array('1', '2', '3', '4', '5', '6');
function core_shortcode_heading($atts, $content=null, $tag) {
	global $core_shortcode_headings;

	$style = core_shortcode_validate_type($atts, $core_shortcode_headings, '1');

	return '<div class="shortcode-header"><h' .$style. '>' .$content. '</h' .$style. '></div>';
}

// Divider
// [divider solid|dotted|invisible|totop]
//
$core_shortcode_divider_styles = array('solid', 'dotted', 'invisible', 'slashed', 'totop');
function core_shortcode_divider($atts, $content=null, $tag) {
	global $core_shortcode_divider_styles;

	$style = core_shortcode_validate_type($atts, $core_shortcode_divider_styles, 'solid');
	$extra = '';
	$thickness = isset($atts['thickness']) ? $atts['thickness'] : 10;
	if ($style == 'totop')
		$extra = '<a href="#" class="totop"></a>';

	return '<div class="shortcode-divider ' .$style. '" style="margin-top:'.($thickness/2).'px; margin-bottom:'.($thickness/2).'px;">' . $extra. '</div>';
}

// Button
// [button small|medium|large link="" icon=""]
//
$core_shortcode_button_sizes = array('small', 'medium', 'large', 'xlarge');
$core_shortcode_button_colors = array('blue', 'red', 'orange', 'yellow', 'green', 'olive', 'purple', 'pink', 'brick', 'gold', 'brown', 'silver', 'gray', 'black');
function core_shortcode_button($atts, $content=null, $tag) {
	global $core_shortcode_button_sizes;
	global $core_shortcode_button_colors;

	$size = core_shortcode_validate_type($atts, $core_shortcode_button_sizes, 'medium');
	$color = core_shortcode_validate_type($atts, $core_shortcode_button_colors, 'default');
	$icon = '';

	if (isset($atts['link']))
		$link = $atts['link'];
	else
		$link = '/';

	if (in_array('window', $atts))
		$target = '_blank';
	else
		$target = '_self';

	if (isset($atts['icon']))
		$icon = '<i class="' . $atts['icon'].'"></i>';

	return '<a href="' .$link. '" target="' .$target. '" class="button ' .$size. ' '. $color.'">' . $icon . ' ' .do_shortcode($content). '</a>';
}

// Gallery
// [gallery columns="4"]<img src="">[/gallery]
//
function core_shortcode_gallery($atts, $content=null, $tag) {
	extract(shortcode_atts(array(
		'columns' => 4,
	), $atts));

	// SUpported column types
	$column = intval($columns);
	if ($columns == 2)
		$column_class = 'grid col-six';
	else if ($columns == 3)
		$column_class = 'grid col-four';
	else if ($columns == 4)
		$column_class = 'grid col-three';
	else if ($columns == 6)
		$column_class = 'grid col-two';
	else
		return 'grid col-four';

	$image_list = array();
	// Extract image tags
	preg_match_all('/<img[^>]+>/i', $content, $image_list);

	// Output gallery list
	$id = core_get_uuid('gallery');
	$index = 0;
	$output = '<ul class="shortcode-gallery">';
	foreach($image_list[0] as $image) {
		$index += 1;
		if ($index == $columns) {
			$column_last = ' fit';
			$index = 0;
		} else {
			$column_last = '';
		}

		unset($width);
		unset($height);
		$alt ='';
		$title = '';

		// Extract attributes
		preg_match_all('/(src|alt|title|width|height)=("[^"]*")/i', $image, $attribs);
		$attrs = array_combine($attribs[1], $attribs[2]);
		foreach($attrs as $key => $value) {
			$attrs[$key] = substr($value, 1, -1);
		}
		extract($attrs);

		// Default thumb size
		if (!isset($width))
			$width = '200';
		if (!isset($height))
			$height = '150';

		// Output list item
		$output .= '<li class="' . $column_class . $column_last . '"><a href="' .$src. '" data-rel="prettyPhoto[' .$id. ']">';
		$output .= '<img src="' .core_generate_thumbnail($src, $width, $height, true). '" alt="' .$alt. '" title="' .$title. '">';
		$output .= '</a></li>';
	}
	$output .= '</ul>';

	return $output;
}
//remove_shortcode('gallery', 'gallery_shortcode');

// Tabs
// [tabs][tab title="title"]content[/tab][/tabs]
//
$core_shortcode_tabs_position = array('top', 'left', 'right');
function core_shortcode_tabs($atts, $content=null, $tag) {
	global $core_shortcode_tabs_position;

	$position = core_shortcode_validate_type($atts, $core_shortcode_tabs_position, null);
	$output = '<div class="shortcode-tabs '.$position.'">';
	$output .= '<div class="titles"></div>';
	$output .= '<div class="content"></div>';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}

function core_shortcode_tab($atts, $content=null, $tag) {
	extract(shortcode_atts(array(
		'title' => 'Tab',
	), $atts));

	$output = '<div class="shortcode-tab-title">' .$title. '</div>';
	$output .= '<div class="shortcode-tab">' .do_shortcode($content). '</div>';

	return $output;
}

// Notifications
// [notify textbox-white|textbox-black|textbox-grey|warn|info|ok|question|error]content[/notify]
//
$core_shortcode_notify_types = array('textbox-white','textbox-black','textbox-grey','warn', 'info', 'ok', 'question', 'error', 'custom');
function core_shortcode_notify($atts, $content=null, $tag) {
	global $core_shortcode_notify_types;
	extract(shortcode_atts(array(
		'bg' => '',
		'color' => '',
		'icon' => null,
	), $atts));
	$type = core_shortcode_validate_type($atts, $core_shortcode_notify_types, null);
	$boxtype = '';
	$icon = isset($atts['icon']) ? 'icon' : ' ';

	if (!$type)
		return core_get_warning(__('Invalid or no "notify" shortcode attribute.', THEME_SLUG));

	switch ($type) {
		case 'ok' : 	$boxtype = 'ok';
					break;
		case 'question' : 	$boxtype = 'question';
					break;
		case 'error' : 	$boxtype = 'warning-sign';
					break;
		case 'info' : 	$boxtype = 'flag';
					break;
		case 'warn' : 	$boxtype = 'info-sign';
					break;
	}

	if ($bg !='' && $color  !='' )
		return '<div class="shortcode-notify ' .$type. ' ' .$icon. '" style="background-color: '.$bg.'; color: '.$color.'; "><div class="circle"><i class="notify icon-'.$boxtype.' '.$atts['icon'].'"></i></div> ' .do_shortcode($content). '</div>';

	if ($bg !='')
		return '<div class="shortcode-notify ' .$type. ' ' .$icon. '" style="background-color: '.$bg.'; "><div class="circle"><i class="notify icon-'.$boxtype.' '.$atts['icon'].'"></i></div> ' .do_shortcode($content). '</div>';

	if ($color !='')
		return '<div class="shortcode-notify ' .$type. ' ' .$icon. '" style="color: '.$color.'; "><div class="circle"><i class="notify icon-'.$boxtype.' '.$atts['icon'].'"></i></div> ' .do_shortcode($content). '</div>';

	return '<div class="shortcode-notify ' .$type. ' ' .$icon. '"><div class="circle"><i class="notify icon-'.$boxtype.' '.$atts['icon'].'"></i></div> ' .do_shortcode($content). '</div>';
}

// Lists
//
$core_shortcode_list_types = array(	'circle', 'square', 'dot', 'phone', 'mail', 'file',
									'plus', 'minus', 'balloon', 'support', 'creditcard', 'info',
									'question', 'v', 'x', 'warning', 'none');
function core_shortcode_list($atts, $content=null, $tag) {
	global $core_shortcode_list_types;

	$list_items = core_shortcode_get_array($content);
	$type = core_shortcode_validate_type($atts, $core_shortcode_list_types, null);

	if (!$type)
		return core_get_warning(__('Invalid or no "list" shortcode attribute.', THEME_SLUG));
	if ($type = 'none')
	{
		$type = '';
	}
	$output = '';
	$output .= '<ul class="shortcode-list ' .$type. '">';
	foreach($list_items as $item)
		$output .= '<li>' .do_shortcode(trim($item)). '</li>';
	$output .= '</ul>';

	return $output;
}

// Columns
// [columns divider][column half|third|twothird|twofourth|threefourth|fifth|twofifth|threefifth|fourfifth]content[/column][/columns]
//
// Column container
function core_shortcode_columns($atts, $content=null, $tag) {
	if (is_array($atts) && in_array('divider', $atts))
		$class = ' divider';
	else
		$class = '';

	if (is_array($atts) && in_array('last', $atts))
		$class = ' last';

	return '<div class="shortcode-columns' .$class. '">' .do_shortcode($content). '</div>';
}

// Single column
$core_shortcode_column_types = array('half', 'third', 'twothird', 'fourth', 'twofourth', 'threefourth', 'fifth', 'twofifth', 'threefifth', 'fourfifth');
function core_shortcode_column($atts, $content=null, $tag) {
	global $core_shortcode_column_types;

	$type = core_shortcode_validate_type($atts, $core_shortcode_column_types, null);

	if (!$type)
		return core_get_warning(__('Invalid or no "column" shortcode attribute.', THEME_SLUG));

	return '<div class="shortcode-column ' .$type. '">' .do_shortcode($content). '</div>';
}

// Column with a background
function core_shortcode_custom_columns($atts, $content=null){
	extract( shortcode_atts( array(
      'image' => '',
      'textcolor' => '#FFFFFF',
      'width' => 100,
      'height' => 200,
      ), $atts ) );

    $bg = '';
    $width = intval($width)-4;
    $height = intval($height);

    if($image || $image != '')
    	$bg = 'style="background: url('.$image.') top center repeat; color: '.$textcolor.'; width: '.$width.'%; min-height: '.$height.'px;';

    return '<div class="shortcode-columns custom" '.$bg.'">' .do_shortcode($content). '</div>';

}

// Pullquotes
// [pullquote left|right]content[/pullquote]
//
$core_shortcode_pullquote_types = array('left', 'right');
function core_shortcode_pullquote($atts, $content = null) {
	global $core_shortcode_pullquote_types;

	$type = core_shortcode_validate_type($atts, $core_shortcode_pullquote_types, 'left');

	return '<div class="shortcode-pullquote ' . $type . '">' . do_shortcode($content) . '</div>';
}

// Quote symbol
// [quote-symbol symbol1|symbol2|symbol3|symbol4|symbol5]content[/pullquote]
//
$core_shortcode_quote_symbol_types = array('symbol1', 'symbol2', 'symbol3', 'symbol4', 'symbol5');
function core_shortcode_quote_symbol($atts, $content = null) {
	global $core_shortcode_quote_symbol_types;

	$type = core_shortcode_validate_type($atts, $core_shortcode_quote_symbol_types, 'left');

	return '<span class="shortcode-quote-symbol ' . $type . '"></span>';
}

// Quote block shortcode
// [quote]content[/quote]
//
function core_shortcode_quote($atts, $content=null, $tag) {
	return '<div class="shortcode-quote">' .do_shortcode($content). '</div>';
}

// Drop caps
//
$core_shortcode_dropcap_types = array('red', 'green', 'blue', 'black', 'white', 'grey');
function core_shortcode_dropcap($atts, $content=null, $tag) {
	global $core_shortcode_dropcap_types;

	$type = core_shortcode_validate_type($atts, $core_shortcode_dropcap_types, 'left');

	return '<span class="shortcode-dropcap ' . $type . '">' . do_shortcode($content) . '</span>';
}

// Latest Post Shortcode
// [latestposts title="Latest Posts" category="all" number="10" orderby="latest|popular|random" ]
//
function td_latestpost_shortcode($atts, $content=null) {

	extract(shortcode_atts(array(
		'title'		=> '',
		'category'	=> '',
		'number'	=> '10',
		'orderby'	=> 'date'
	), $atts));

	$output = '';
	if ( $title ) $output .= '<h4>' . $title . '</h4>';

	if ( $category == '' || $category == 'all') :
		$args = array('category_name' => '');
	else :
		$args = array('category_name' => $category);
	endif;

	if ( $orderby == 'random') :
		$orderby = 'rand';
	elseif ( $orderby == 'popular') :
		$orderby = 'comment_count';
	else :
		$orderby = 'date';
	endif;

	$queryargs = array(
			'posts_per_page' 		=> $number,
			'no_found_rows' 		=> true,
			'post_status' 			=> 'publish',
			'ignore_sticky_posts' 	=> true,
			'order'					=> 'desc',
			'orderby' 				=> $orderby
		 );
	$queryargs = array_merge($queryargs, $args );


	$r = new WP_Query( apply_filters( 'td_latestpost_shortcode_args', $queryargs, $atts ) ); //$queryargs);
	$meta = core_options_get('meta');
	if ($r->have_posts()) :

		$output .= '<ul class="td_postWidget_posts">';
		while ($r->have_posts()) : $r->the_post();

			$output .= '	<li>';
			if( has_post_thumbnail() ) :
				$output .= '<a href="'.get_permalink().'" title="'.get_the_title().'">';
				$output .= get_the_post_thumbnail(null, 'large', array('class' => 'large alignleft'));
				$output .= '</a>';
			endif;

			$output .= '<a  class="post-title" href="' .get_permalink(). '" title="'.get_the_title().'">'.get_the_title().'</a>';
			if ( $meta ) :
				$category = get_the_category();
				if($category[0]){
					$output .= '<span class="td_postWidget_meta"><a class="cat" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a> ';
			}

				$output .= '<span>'.get_the_date(). '</span> | by <i>' .get_the_author(). '</i></span>';
			endif;
			$output .= '	</li>';
		endwhile;
		$output .= '</ul>';

	else:

		$output .= '<p>' . __('No posts found.', THEME_SLUG) . '</p>';

	endif;

	// Reset the global $the_post as this query will have stomped on it
	wp_reset_postdata();


	return $output;

}

// Blog Post Shortcode
// [blogposts title="Latest Blog Posts" category="all" number="10" orderby="latest|popular|random" image="thumbnail|medium|large" ]
//
function td_blogpost_shortcode($atts, $content=null) {

	extract(shortcode_atts(array(
		'title'		=> '',
		'category'	=> '',
		'number'	=> '10',
		'words'		=> '55',
		'count'		=> '55',
		'orderby'	=> 'date',
		'image'		=> 'thumbnail',
	), $atts));

	$output = '';
	if ( $title ) $output .= '<h4>' . $title . '</h4>';

	if ( $category == '' || $category == 'all') :
		$args = array('category_name' => '');
	else :
		$args = array('category_name' => $category);
	endif;

	if ( $orderby == 'random') :
		$orderby = 'rand';
	elseif ( $orderby == 'popular') :
		$orderby = 'comment_count';
	else :
		$orderby = 'date';
	endif;

	//$words = (int)$words;
	$words = (int)$count;

	if (!$image) $image = "large";

	$queryargs = array(
			'posts_per_page' 		=> $number,
			'no_found_rows' 		=> true,
			'post_status' 			=> 'publish',
			'ignore_sticky_posts' 	=> true,
			'order'					=> 'desc',
			'orderby' 				=> $orderby
		 );
	$queryargs = array_merge($queryargs, $args );


	$r = new WP_Query( apply_filters( 'td_latestpost_shortcode_args', $queryargs, $atts ) ); //$queryargs);
	$meta = core_options_get('meta');
	if ($r->have_posts()) :

		$output .= '<ul class="td_postWidget_posts">';
		while ($r->have_posts()) : $r->the_post();

			$output .= '	<li class="item-entry">';

			if( has_post_thumbnail() ) :
				$output .= get_the_post_thumbnail(null, $image, array('class' => $image . ' thumbs alignleft'));
			endif;

			$output .= '<h4><a  class="post-title" href="' .get_permalink(). '" title="'.get_the_title().'">'.get_the_title().'</a></h4><div class="item">';

			$output .= '<div class="td_postWidget_meta">';

			$num_comments = get_comments_number(); // get_comments_number returns only a numeric value

			if ( $num_comments == 0 )
				$comments = '<span class="num">0</span> ';
			elseif ( $num_comments > 1 )
				$comments = '<span class="num">' . $num_comments . '</span>';
			else
				$comments = '<span class="num">1</span> ';

			if ( $meta ) :
				$output .= '<span>'.get_the_date(). '</span> <span class="sep"> | </span> <span><i class="icon-user"></i> <a href="'.esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ).'">' .get_the_author(). '</a></span> ';

				$output .= ' <span class="sep"> | </span> <i class="icon-comments"></i> <a href="' . get_comments_link() .'"><span class="comment">'. $comments.'</span></a> </div>';
			endif;

			$output .= '</div><p>' . excerpt($words).'</p>';
			$output .= '<div class="title-row"></div>';

			$output .= '<div class="td_postWidget_meta">';
			$output .= '<a class="button small alignright" href="'.get_permalink().'"><i class="icon-plus-sign"></i>  '.__(' Read more', THEME_SLUG).'</a>';

			if ( $meta ) :
				$category = get_the_category();
				if($category[0]){
					$output .= '<i class="icon-bookmark"></i> <a class="cat" href="'.get_category_link($category[0]->term_id ).'">'.$category[0]->cat_name.'</a> ';
				}


				$tags = get_the_tag_list('',',','');
				if ($tags){
					$output .= '<br><i class="icon-tags"></i> '.$tags;
				}
			endif;

			$output .= '</div>';

			$output .= '	</li>';
		endwhile;
		$output .= '</ul>';
		$output .= '<script type="text/javascript" src="'.THEME_URI.'/js/tdac-slider.js"></script>';
	else:

		$output .= '<p>' . __('No posts found.', THEME_SLUG) . '</p>';

	endif;

	// Reset the global $the_post as this query will have stomped on it
	wp_reset_postdata();


	return $output;

}


// ThemeDutch Carousel - Accordion-like Thumbnail Slider
// Usage: [thumbnailslider category=all number=15]
//
function td_thumbnail_slider_shortcode($attr) {

	extract(shortcode_atts(array(
		'category'	 => '',
		'number'	 => '15',
		'count'      => '15',
		'background' => '#FFF',
		'textcolor'  => '#000',
		'orderby'	 => 'date'
	), $attr));

	$number = intval($number);
	$count = intval($count);

	$output = '';
	//if ( $title ) $output .= '<div class="shortcode-header"><h3>' . $title . '</h3></div>';

	if ( $category == '' || $category == 'all') :
		$args = array('category_name' => '');
	else :
		$args = array('category_name' => $category);
	endif;

	$queryargs = array(
			'posts_per_page' 		=> $number,
			'no_found_rows' 		=> true,
			'post_status' 			=> 'publish',
			'ignore_sticky_posts' 	=> true,
			'order'					=> 'desc',
			'orderby' 				=> 'date'
		 );
	$queryargs = array_merge($queryargs, $args );


	$r = new WP_Query( apply_filters( 'td_thumbnail_slider_shortcode_args', $queryargs, $attr ) );
	$i = 1;
	if ($r->have_posts()) :

		$output .= '<div class="shortcode-tdacs"><div class="buttons prev">left</div><div class="viewport" style="background:'.$background.'; "><ul class="overview">';
		while ($r->have_posts()) : $r->the_post();
			if( has_post_thumbnail() ) :

				if($i<=1){
					$output .= '<li class="lastblock">';
					$i++;
				}else{
					$output .= '<li>';
				}

				$output .= '<a href="'.get_permalink().'" title="'.get_the_title().'" >';
				$output .= get_the_post_thumbnail(null, 'tdac-thumb', array('class' => 'thumbs alignnone'));
				$output .= '</a>';

				$output .= '<div class="item-wrap"><h4 style="color:'.$textcolor.';" class="item-title">'.get_the_title().'</h4>';


				$output .= '<p style="color:'.$textcolor.';">'.excerpt($count).' <a href="'.get_permalink().'">'.__('read more', THEME_SLUG) . ' &rarr;</a></p>';

				$output .= '</div></li>';
			endif;
		endwhile;
		$output .= '</ul></div><div style="color:'.$textcolor.';" class="buttons next">'.__('right', THEME_SLUG).'</div></div>';

	else:

		$output .= '<p>' . __('No posts found.', THEME_SLUG) . '</p>';

	endif;

	// Reset the global $the_post as this query will have stomped on it
	wp_reset_postdata();

	return $output;

}


// A highlighted text shortcode
//[highlight bg="#000000" color="#FFFFFF"]some content[/highlight]
//

function core_shortcode_highlight($atts, $content=null, $tag){
	extract(shortcode_atts(array(
		'bg' => '#FF6600',
		'color' => '#FFFFFF',
	), $atts));

	return '<span style="background-color: '.$bg.'; color: '.$color.';">&nbsp;'.$content.'&nbsp;</span>';
}

// Font Awesome Shortcode
// [icon name=icon-chevron-left size=large, 2x, 3x, 4x ]
function core_shortcode_icon( $atts, $content=null, $tag ) {
    extract( shortcode_atts( array(
                'name'  => 'icon-wrench',
                'size'  => ' '
            ), $atts ) );
    $core_shortcode_icon_sizes = array('large', '2x', '3x', '4x');
    $size = in_array($size, $core_shortcode_icon_sizes) ? $size : '';
    return '<i class="'.$atts['name'].' icon-'.$size.'">&nbsp;</i>';
}

// Toggle
// [tdpricetable columns="[1][2][3][4][5][6]"]
// [tdpricetable  title="title" subtitle="subtitle" toplisttitle="toplisttitle" toplistsubtitle="toplistsubtitle" backgroundcolor="backgroundcolor"  fontcolor="fontolor" buttoncolor="buttoncolor" buttonfontcolor="buttonfontcolor" buttonlink="bottonlink" buttontext="bottontext"]
// [/tdpricetable]
// [/tdpricetable]
//

function core_shortcode_tdpricetable($atts, $content=null, $tag) {
	extract(shortcode_atts(array(
		'columns' => '1'
	), $atts));
	$colscss = 'td-pricing-'.$columns;

	$output ='<div class="td-pricingtable">';
	$output .= '<div class="td-pricing-row '.$colscss.'">';
	$output .= do_shortcode($content);
	$output .= '</div>';
	$output .= '</div>';
	$output .= '<br clear="all" />';

	return $output;
}

function core_shortcode_tdpricetable_column($atts, $content=null, $tag) {
	extract(shortcode_atts(array(
		'title' => '',
		'titlefontcolor' => '#282828',
		'subtitle' => '',
		'toplisttitle' => '',
		'toplistsubtitle' => '',
		'backgroundcolor' => '',
		'fontcolor' => '#7D7D7D'
	), $atts));

	$output .= '<div class="td-pricing-col" style="background-color:'.$backgroundcolor.';color:'.$fontcolor.'">';
	$output .= '<div class="td-pricing-blk">';
	$output .= '<div class="td-pricing-title">';
	$output .= '<h1 style="color:'.$titlefontcolor.'">'.$title.'</h1>';
	$output .= '<p>'.$subtitle.'</p>';
	$output .= '</div>';
	$output .= '<div class="td-pricing-top">';
	$output .= '<p>'.$toplisttitle.'</p>';
	$output .= '<div>'.$toplistsubtitle.'</div></div>';
//	$output .= '<div class="td-pricing-content">';
	$output .= do_shortcode($content);
//	$output .= '</div>';
//	$output .= '<div class="td-pricing-btn"><a class="btn-pricing" title="'.$buttontitle.'" style="'.$buttoncolorstyle.' '.$buttonfontcolorstyle.'" href="'.$buttonlink.'">'.do_shortcode($buttontext).'</a></div>';
	$output .= '</div>';
	$output .= '</div>';

	return $output;
}

function core_shortcode_tbpricetable_content($atts, $content=null, $tag) {
	$output .= '<div class="td-pricing-content">';
	$output .= do_shortcode($content);
	$output .= '</div>';

	return $output;
}
function core_shortcode_tdpricetable_button($atts, $content=null, $tag) {
	extract(shortcode_atts(array(
		'buttoncolor' => '',
		'buttonfontcolor' => '',
		'buttonlink' => '#',
		'buttontitle' => 'Button Title'
	), $atts));
	$buttoncolorstyle='';
	$buttonfontcolorstyle='';

	if($buttoncolor != '')
	{
		$buttoncolorstyle = 'background-color:'.$buttoncolor.';';
	}
	if($buttonfontcolor != '')
	{
		$buttonfontcolorstyle = 'color:'.$buttonfontcolor.';';
	}

	$output .= '<div class="td-pricing-btn"><a class="btn-pricing" title="'.$buttontitle.'" style="'.$buttoncolorstyle.' '.$buttonfontcolorstyle.'" href="'.$buttonlink.'">';
	$output .= do_shortcode($content);
	$output .= '</a></div>';

	return $output;
}

// Display shortcodes
// [shortcode]your shortcode[/shortcode]
function core_shortcode_display_shortcode( $atts, $content = null ) {
	$content = preg_replace('/\[/', '&#91;', $content);
	$content = preg_replace('/\]/', '&#93;', $content);
	return '<p><code>'.$content.'</code></p>';
}
add_shortcode('shortcode', 'core_shortcode_display_shortcode');

// Login Form shortcode
// [loginform redirect="http://www.home-url.com"]
function core_shortcode_login_form( $atts, $content = null ) {
	extract( shortcode_atts( array(
      'redirect' => esc_url( home_url( "/" ) )
      ), $atts ) );

    $form = '<div id="login">';

    if(core_options_get('logo') == '')
	    $form .= '<h1 class="site-title"><a href="'. esc_url( home_url( "/" ) ) .'" title="'. esc_attr( get_bloginfo( "name", 'display' ) ).'" rel="home">'. esc_attr( get_bloginfo( "name", 'display' ) ).'</a></h1>';
    else
		$form .= '<h1 class="site-title"><a href="'.home_url().'"><img src="'.core_options_get('logo').'" /></a></h1>';
		//$form .= '<h1 class="site-title"><a href="'.home_url().'"><img src="'.core_options_get('logo').'" alt="'.bloginfo('name').'" /></a></h1>';
		//note: alt tag causing text on the upper part
	if (!is_user_logged_in()) {
		if($redirect) {
			$redirect_url = $redirect;
		} else {
			$redirect_url = get_permalink();
		}
		$form .= wp_login_form(array('echo' => false, 'redirect' => $redirect_url ));
	}

	$form .= '</div>';

	return $form;
}

function core_shortcode_progressbar($atts, $content=null, $tag) {
	extract(shortcode_atts(array(
		'title' => 'Progress Bar',
		'percent' => 100,
		'color' => 'gray',
		'hidetitle' => 'no'
	), $atts));
	STATIC $inc = 0;
	$inc++;
	$pBarID = "mainBar-" . $inc;
	$hideshowclass = '';

	if($percent > 100)
		$percent = 100;
	if ($hidetitle=='yes')
		$hideshowclass = 'hide-pblk';
	else
		$hideshowclass = '';

	$titleStrip = preg_replace('/\s+/', '', $title);
	$output = '<div id="'.$pBarID.'" class="'.$titleStrip.' jquery-ui-like"><div class="'.$color.'-bar main-pbar"><div class="title-pblk '.$hideshowclass.'">'.do_shortcode($content).$title.'</div><br clear="all" /></div></div>';
	$output .= '<script type=\'text/javascript\'>
				jQuery(window).load(function () {mainProgressBar("'.$pBarID.'",'.$percent.',"'.$title.'");});';
	$output .= '</script>';


	return $output;
}




// Register all shortcodes
add_shortcode('toggle', 'core_shortcode_toggle');
add_shortcode('toggle_content', 'core_shortcode_toggle_content');
add_shortcode('header', 'core_shortcode_heading');
add_shortcode('code', 'core_shortcode_code');
add_shortcode('divider', 'core_shortcode_divider');
add_shortcode('button', 'core_shortcode_button');
add_shortcode('tdgallery', 'core_shortcode_gallery');
add_shortcode('tabs', 'core_shortcode_tabs');
add_shortcode('tab', 'core_shortcode_tab');
add_shortcode('notify', 'core_shortcode_notify');
add_shortcode('list', 'core_shortcode_list');
add_shortcode('columns', 'core_shortcode_columns');
add_shortcode('column', 'core_shortcode_column');
add_shortcode('custom_columns', 'core_shortcode_custom_columns');
add_shortcode('pullquote', 'core_shortcode_pullquote');
add_shortcode('quote-symbol', 'core_shortcode_quote_symbol');
add_shortcode('quote', 'core_shortcode_quote');
add_shortcode('dropcap', 'core_shortcode_dropcap');
add_shortcode('latestposts', 'td_latestpost_shortcode');
add_shortcode('blogposts', 'td_blogpost_shortcode');
add_shortcode('thumbnailslider', 'td_thumbnail_slider_shortcode');
add_shortcode('highlight', 'core_shortcode_highlight');
add_shortcode('icon', 'core_shortcode_icon');
add_shortcode('loginform', 'core_shortcode_login_form');

add_shortcode('tdpricetable', 'core_shortcode_tdpricetable');
add_shortcode('tdpricetable_column', 'core_shortcode_tdpricetable_column');
add_shortcode('tdpricetable_content', 'core_shortcode_tbpricetable_content');
add_shortcode('tdpricetable_button', 'core_shortcode_tdpricetable_button');

add_shortcode('progressbar', 'core_shortcode_progressbar');




?>