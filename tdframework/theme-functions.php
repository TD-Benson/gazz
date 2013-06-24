<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * The function hooks in displaying the theme functions.
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */

if ( ! function_exists( 'core_theme_wrap_before' ) ) {
/**
 * Theme row wrapper open
 * @since framework 1.0
 */
	function core_theme_wrap_before(){
		echo "<div class=\"theme-wrap\">\n";
	} // core_theme_wrap_before()
}

if ( ! function_exists( 'core_theme_wrap_after' ) ) {
/**
 * Theme row wrapper open
 * @since framework 1.0
 */
	function core_theme_wrap_after(){
		echo "</div>\n";
	} // core_theme_wrap_after()
}
add_action('core_theme_hook_in_header', 'core_theme_wrap_before', 1);
add_action('core_theme_hook_in_header', 'core_theme_wrap_after', 100);
//add_action('core_theme_hook_before_content', 'core_theme_wrap_before', 1);
add_action('core_theme_hook_after_content', 'core_theme_wrap_after', 101);
add_action('core_theme_hook_after_content', 'core_theme_wrap_after', 100);
add_action('core_theme_hook_footer_content', 'core_theme_wrap_before', 1);
add_action('core_theme_hook_footer_content', 'core_theme_wrap_after', 100);

if ( ! function_exists( 'core_theme_content_wrapper' ) ) {
/**
 * Theme row wrapper open
 * @since framework 1.0
 */
	function core_theme_content_wrapper(){
		echo "<div class=\"theme-wrap\">";
		echo "<div class=\"grid box-twelve theme_content_area\">";
		echo "<div id=\"content-main\">";
	} // core_theme_content_wrapper()
}
add_action('core_theme_hook_before_content', 'core_theme_content_wrapper');

if ( ! function_exists( 'core_theme_clear_content_after' ) ) {
/**
 * Theme row wrapper open
 * @since framework 1.0
 */
	function core_theme_clear_content_after(){
		echo "<div class=\"clear\"></div>";
	} // core_theme_clear_content_after()
}
add_action('core_theme_hook_after_content', 'core_theme_clear_content_after', 99);

if ( ! function_exists( 'core_theme_fixed_sidebar' ) ) {
/**
 * Browser Happy
 * @since framework 1.0
 */
	function core_theme_fixed_sidebar(){
		//echo "<div id=\"sidebar\" class=\"sidebar grid box-two fit\" >";
		//do_action('core_theme_fixed_sidebar');
		//echo "</div><!-- #sidebar -->";
		echo "</div>";
	} // core_theme_fixed_sidebar()
}
add_action('core_theme_hook_after_content', 'core_theme_fixed_sidebar', 999);

if ( ! function_exists( 'core_theme_favicon' ) ) {
/**
 * Theme Favicon
 * @since framework 1.0
 */
	function core_theme_favicon(){
		$favicon_uri = core_options_get('favicon');
		if ($favicon_uri)
			echo "<link rel=\"shortcut icon\" href=\"". $favicon_uri. "\">\n";
	} // core_theme_favicon()
}
add_action('wp_head', 'core_theme_favicon', 5);


if ( ! function_exists( 'core_theme_seo' ) ) {
/**
 * Theme Favicon
 * @since framework 1.0
 */
	function core_theme_seo(){
		// SEO Basic Activation
		$seobasic = core_options_get('seobasic');
		if ( $seobasic ){
			core_seo_basic('meta');
		}
	} // core_theme_seo()
}
add_action('wp_head', 'core_theme_seo', 1);


if ( ! function_exists( 'core_theme_load_page_styles' ) ) {
/**
 * Load Page Styles
 * @since framework 1.0
 */
	function core_theme_load_page_styles(){
		echo "<!-- Per-page CSS -->\n";
		get_template_part('tdframework/theme-styles');
	} // core_theme_load_page_styles()
}
add_action('wp_head', 'core_theme_load_page_styles', 100);


if ( ! function_exists( 'core_theme_social_icons' ) ) {
/**
 * Social Icons
 * @since framework 1.0
 */
	function core_theme_social_icons(){
		echo "<div id=\"site-info\">";
		echo "<div class=\"grid fit sociables\">";
		core_sociables('social_icons');
		echo "</div>";
		echo "</div>";
	} // core_theme_social_icons()
}

if ( ! function_exists( 'core_theme_social_search' ) ) {
/**
 * Social Icons
 * @since framework 1.0
 */
	function core_theme_social_search(){
		printf('<div class="theme-search">
					<div class="container">');
		get_template_part('searchform');
		printf('<i id="search" class="icon-search icon-2x"></i><i id="close" class="icon-remove icon-2x"></i>
					</div>
					<div id="theme-search-icon"><span class="menu-icon"></span><i class="icon-search"></i></div>
					<div id="theme-hand-icon"><i class="icon-hand-up"></i></div>
				</div>');
	} // core_theme_social_icons()
}
//add_action('core_theme_hook_in_header', 'core_theme_social_search', 5);


if ( ! function_exists( 'core_theme_left_right_sidebar_selector' ) ) :
/*
 * Displays the Featured Image on each post
 */
 	function core_theme_left_right_sidebar_selector(){
	 	printf('<div id="sidebar-selector">
	 				<ul>
	 					<li class="grid box-icon"><i class="icon-cog icon-2x pull-left"></i> </li>
	 					<li class="grid"><strong>Select your preference for experiencing our website</strong></li>
	 					<li class="grid-right box-icon close"><i class="icon-remove icon-2x"></i></li>
			 			<li class="grid-right"><small class="left_sidebar"><i class="icon-hand-right"></i> I&#39;m Left Handed</small> or <small class="right_sidebar"><i class="icon-hand-left"></i> I&#39;m Right Handed</small></li>
		 			</ul>
	 			</div>');
 	} // core_theme_left_right_sidebar_selector()
endif;
//add_action('core_theme_hook_in_header','core_theme_left_right_sidebar_selector', 10);


if ( ! function_exists( 'core_theme_hide_show_bg' ) ) {
/**
 * Show Hide Content
 *
 * @since framework 1.0
 */
	function core_theme_hide_show_bg(){
		echo "<div id=\"hide-show-bg\"><i class=\"icon-minus icon-2x\"></i> <i class=\"icon-plus icon-2x\"></i></div>";
	} // core_theme_hide_show_bg()
}
add_action('core_theme_hook_after_container', 'core_theme_hide_show_bg', 99);


if ( ! function_exists( 'core_theme_bg_info' ) ) {
/**
 * Main Navigation Menu
 *
 * @since framework 1.0
 */
	function core_theme_bg_info(){
		$post_type = get_post_type();
		$category = get_query_var('cat');
		$current_category = get_category ($category);
		$author_slug = '';
		$link_slug = '';
		$author = null;
		$link = '#';

		if ( is_home() ) {
			$backgroundimage 	= core_options_get('layout-home_background', 'theme');
			$author 			= core_options_get('layout-home_background_author', 'theme');
			$link 				= core_options_get('layout-home_background_link', 'theme');
		} else {
			$backgroundimage 	= core_options_get('layout-default_background', 'theme');
			$author 			= core_options_get('layout-default_background_author', 'theme');
			$link 				= core_options_get('layout-default_background_link', 'theme');
		}

		if ( is_singular() && (is_page() || is_single()) ) {
			$backgroundimage 	= core_options_get('background_image', get_post_type());
			$author 			= core_options_get('background_image_author', get_post_type());
			$link 				= core_options_get('background_image_link', get_post_type());
		}

		if (is_archive()){
			if (is_category() && !$backgroundimage) {
				$obj = get_queried_object();
				$backgroundimage 	= core_options_get('category_background_' .$obj->slug);
				$author 			= core_options_get('category_background_author_' .$obj->slug);
				$link 				= core_options_get('category_background_link_' .$obj->slug);
			} elseif (is_author()) {
				$backgroundimage 	= core_options_get('layout-author_background', 'theme');
				$author 			= core_options_get('layout-author_background_author', 'theme');
				$link 				= core_options_get('layout-author_background_link', 'theme');
			} elseif (is_tag()) {
				$backgroundimage 	= core_options_get('layout-tag_background', 'theme');
				$author 			= core_options_get('layout-tag_background_author', 'theme');
				$link 				= core_options_get('layout-tag_background_link', 'theme');
			} else {
				$backgroundimage 	= core_options_get('layout-archive_background', 'theme');
				$author 			= core_options_get('layout-archive_background_author', 'theme');
				$link 				= core_options_get('layout-archive_background_link', 'theme');
			}
		}

		if (is_404()) {
			$backgroundimage 	= core_options_get('layout-404_background', 'theme');
			$author 			= core_options_get('layout-404_background_author', 'theme');;
			$link 				= core_options_get('layout-404_background_link', 'theme');
		}

		if (is_search()) {
			$backgroundimage 	= core_options_get('layout-search_background', 'theme');
			$author 			= core_options_get('layout-search_background_author', 'theme');
			$link 				= core_options_get('layout-search_background_link', 'theme');
		}

		//$backgroundimage = apply_filters('layout_background', $backgroundimage);

		if (!$backgroundimage || $backgroundimage == 'none') {
			$backgroundimage 	= core_options_get('background_image');
			$author 			= core_options_get('background_image_author');
			$link 				= core_options_get('background_image_link');
		}

		if ( !$author )
			return;

		echo "<div id=\"bg-info\">";
		if ( $author || $link  )
			printf('<a href="%1s" title="%2s"><div class="author">%3s</div></a>', $link, $author, $author);
		echo "</div>";
	} // core_theme_bg_info()
}
add_action('core_theme_hook_after_container', 'core_theme_bg_info', 99);


if ( ! function_exists( 'core_theme_logo' ) ) {
/**
 * Theme Logo
 * @since framework 1.0
 */
	function core_theme_logo(){

	?>
		<div id="theme-logo" class="grid col-twelve">

		<?php if(core_options_get('logo') == '') : ?>
			<hgroup>
				<h1 id="site-title"><a href="<?php echo esc_url( home_url( '/' ) ); ?>" title="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" rel="home"><?php bloginfo( 'name' ); ?></a></h1>
			</hgroup>
		<?php else : ?>
			<a href="<?php echo home_url(); ?>">
				<img src="<?php echo core_options_get('logo'); ?>" alt="<?php echo bloginfo('name'); ?>">
			</a>
		<?php endif; ?>

			<div class="grid box-six">
				<p><?php bloginfo( 'description' ); ?></p>
			</div>

			<div class="grid box-six fit">
				<?php
					$today = array();
					$today['day'] = date("l");
					$today['month'] = date("F");
					$today['year'] = date("Y");
					$today['date'] = date("j");
					printf('<p><span class="date day">%1s</span> <span class="date month">%2s</span> <span class="date">%3s</span> <span class="date year">%4s</span></p>', $today['day'], $today['month'], $today['date'], $today['year']);
				?>
			</div>

		</div><!-- ends here #theme-logo -->
	<?php
	} // core_theme_logo()
}
add_action('core_theme_hook_in_header', 'core_theme_logo', 5);


if ( ! function_exists( 'core_theme_menu_main' ) ) {
/**
 * Main Navigation Menu
 *
 * @since framework 1.0
 */
	function core_theme_menu_main(){
		echo "<div id=\"top-nav\" class=\"container\">";
		echo "<div class=\"theme-wrap\">";
		$admin_logo = core_options_get('login_logo');
		if ( $admin_logo )
			printf("<div class=\"logo grid box-one\"><a href=\"%1s\"><img src=\"%2s\" alt=\"%3s\" title=\"%4s\"> </div>", home_url(), $admin_logo, esc_attr( get_bloginfo( 'name', 'display' ) ), esc_attr( get_bloginfo( 'name', 'display' ) ) );
		echo '<nav id="site-navigation" class="grid box-seven">';
		core_layout_menu('main');
	    echo '</nav><!-- ends here #theme-row -->';
	    echo "<div class=\"grid box-four sociables\">";
		core_sociables('social_icons');
		echo "</div>";
		echo "<div class=\"clear\"></div>";
	    echo "</div></div>";
	} // core_theme_menu_main()
}
add_action('core_theme_hook_before_container', 'core_theme_menu_main');


if ( ! function_exists( 'core_theme_unregister_sidebars' ) ) {
/**
 * Unregister Sidebar
 */
 	function core_theme_unregister_sidebars(){
 		global $core_sidebars;

		$core_sidebars = core_options_get('sidebars');

		foreach ($core_sidebars as $sidebar_slug => $sidebar_title) {
			unregister_sidebar( $sidebar_slug );
		}
 	} // core_theme_unregister_sidebars
}
add_action( 'widgets_init', 'core_theme_unregister_sidebars' );


if ( ! function_exists( 'core_theme_register_main_sidebar' ) ) {
/**
 * Register Main Sidebar
 */
 	function core_theme_register_main_sidebar(){
		register_sidebar(array(
			'name' => __( 'Main Sidebar', THEME_SLUG),
			'id' => 'theme-main-sidebar',
			'description' => __( 'This sidebar is located just below the logo.', THEME_SLUG ),
			'before_widget' => '<aside id="%1$s" class="widget %2$s">',
			'after_widget' => '</aside>',
			'before_title' => '<h3 class="widget-title">',
			'after_title' => '<i class="icon- "></i></h3>')
		);
	} // core_theme_register_main_sidebar()
}
add_action( 'widgets_init', 'core_theme_register_main_sidebar' );
add_action( 'widgets_init', 'core_layout_sidebars_register' );

if ( ! function_exists( 'core_theme_top_menu' ) ) {
/**
 * Sidebar Navigation Menu
 *
 * @since framework 1.0
 */
	function core_theme_sidebar_menu(){
		echo '<nav id="sidebar-navigation">';
		core_layout_menu('sidemenu');
	    echo '</nav><!-- ends here #sidebar-navigation -->';
	} // core_theme_sidebar_menu()
}
add_action('core_theme_fixed_sidebar', 'core_theme_sidebar_menu');

if ( ! function_exists( 'core_theme_sidebar_widget_container' ) ) {
/**
 * Sidebar Navigation Menu
 *
 * @since framework 1.0
 */
	function core_theme_sidebar_widget_container(){
		if ( is_active_sidebar( 'theme-main-sidebar' ) )
			dynamic_sidebar('theme-main-sidebar');
	} // core_theme_sidebar_widget_container()
}
add_action('core_theme_fixed_sidebar', 'core_theme_sidebar_widget_container');

if ( ! function_exists( 'core_theme_slider_area' ) ) {
/**
 * Slider Area
 *
 * @since framework 1.0
 */
	function core_theme_slider_area(){

		$post_type = get_post_type();
		$category = get_query_var('cat');
		$current_category = get_category ($category);
		$slug = '';
		$slider = 'none';
		$widget_position = 'none';
		if ( is_home() ) {
			$post_type = 'theme';
			$slug = '_layout-home';
		} else {
			$post_type = 'theme';
			$slug = '_layout-default';
		}

		if ( is_singular() ) {
			$post_type = get_post_type();
			$slug = '';
		}

		if ( is_archive() ){
			$post_type = 'theme';
			$slug = '_layout-archive';

			if ( is_category() )
				$slug = '_'.$current_category->slug;

			elseif ( is_author() )
				$slug = '_layout-author';

			elseif ( is_tag() )
				$slug = '_layout-tag';
		}

		if ( is_404() ){
			$post_type = 'theme';
			$slug = '_layout-404';
		}

		if ( is_search() ){
			$post_type = 'theme';
			$slug = '_layout-search';
		}

		if (!$post_type)
			return;

		$slider = apply_filters('slider_area', $slider);

		$slider = core_options_get('slider'.$slug, $post_type);


		if (!$slider || $slider == 'none')
			return;

		if ( is_category() ){
			// Slider widget
			$widget_position = '';
			$widget_sidebar = '';
		} else {
			// Slider widget
			$widget_position = core_options_get('widget_position', $post_type);
			$widget_sidebar = core_options_get('widget_sidebar', $post_type);
		}


		echo '<div id="theme_slider_area">';
		// Left widget
		if ($widget_position == 'left' && $widget_sidebar) {
			?>
			<div class="grid col-four">
				<ul class="border-box" id="theme-slider-widget">
					<?php dynamic_sidebar($widget_sidebar); ?>
				</ul>
			</div>
			<div class="grid col-eight fit">
				<div class="border-box" id="theme-slider">
					<?php core_slider($slider); ?>
				</div>
			</div>
			<div class="clearfix"></div>
			<?php

		// Right widget
		} else if ($widget_position == 'right' && $widget_sidebar) {
			?>
			<div class="grid col-eight">
				<div class="border-box" id="theme-slider">
					<?php core_slider($slider); ?>
				</div>
			</div>
			<div class="grid col-four fit">
				<ul class="border-box" id="theme-slider-widget">
					<?php dynamic_sidebar($widget_sidebar); ?>
				</ul>
			</div>
			<div class="clearfix"></div>
			<?php

		// No widget
		} else {
			?>
			<div id="theme-slider">
				<?php core_slider($slider); ?>
			</div>
			<div class="clearfix"></div>
			<?php
		}
	    echo '</div><!-- ends here #theme_slider_area -->';
	} // core_theme_slider_area()
}
add_action('core_before_content', 'core_theme_slider_area', 10);

if ( ! function_exists( 'core_theme_custom_content' ) ) {
/**
 * Custom Content Area
 *
 * @since framework 1.0
 */
	function core_theme_custom_content(){
		$content = theme_custom_content();
		if ($content) {
			echo "<div id=\"theme-custom-content\">\n";
			echo do_shortcode($content);
			echo "</div><!-- ends here #theme-custom-content -->";
		}
	} // core_theme_custom_content()
}
add_action('core_before_content', 'core_theme_custom_content');


if ( ! function_exists( 'core_theme_breadcrumb' ) ) {
/**
 * Breadcrumb
 *
 * @since framework 1.0
 */
	function core_theme_breadcrumb(){
		if (core_options_get('breadcrumbs') == true ) {
			echo '<div class="theme-breadcrumbs breadcrumb-list">';
			echo core_breadcrumbs(' \ ', '<i class="icon-home"></i> ');
			echo '</div>';
		}
	} // core_theme_breadcrumb()
}
//add_action('core_theme_hook_entry_header', 'core_theme_breadcrumb');


if ( ! function_exists( 'core_theme_entry_content' ) ) {
/**
 * Post content: entry content just after the_content()
 *
 * @since framework 1.0
 */
	function core_theme_entry_content(){

	} // core_theme_entry_content()
}

if ( ! function_exists( 'core_theme_entry_footer_meta' ) ) {
/**
 * Post content: entry header
 *
 * @since framework 1.0
 */
	function core_theme_entry_footer_meta(){

	} // core_theme_entry_footer_meta()
}

if ( ! function_exists( 'core_theme_footer_widget_container' ) ) {
/**
 * Footer Widget Area
 *
 * @since framework 1.0
 */
 	function core_theme_footer_widget_container(){
 		$layout = core_layout_current();

 		if( $layout['footer']->slug != 'none' ){
		 	echo "<div id=\"footer-widget-area\" class=\"widget_container\">\n";
			do_action('core_footer');
			echo "<div class=\"clear\"></div>\n";
			echo "</div>\n";
 		}
 	} // core_theme_footer_widget_container()
}
add_action('core_after_content', 'core_theme_footer_widget_container');


if ( ! function_exists( 'core_theme_footer_background' ) ) {
/**
 * Footer Menu
 *
 * @since framework 1.0
 */
	function core_theme_footer_background(){
		echo '<div id="footer-background">';
		echo "</div>\n";
	} // core_theme_footer_background()
}
//add_action('core_theme_hook_footer_after', 'core_theme_footer_background', 99);



if ( ! function_exists( 'core_theme_footer_menu' ) ) {
/**
 * Footer Menu
 *
 * @since framework 1.0
 */
	function core_theme_footer_menu(){
		//if( core_layout_menu('footer') ){
			echo '<nav class="grid box-six">';
			core_layout_menu('footer');
		    echo '</nav><!-- ends here .footer_menu -->';
		//}
	} // core_theme_footer_menu()
}
add_action('core_theme_hook_footer_content', 'core_theme_footer_menu');


if ( ! function_exists( 'core_theme_copyright' ) ) {
/**
 * Copyright
 *
 * @since framework 1.0
 */
	function core_theme_copyright(){
		echo '<div id="theme-copyright" class="grid box-six">';
		echo '<div class="copyright">';
		$copyright_link = core_options_get('copyright_link');
		$copyright_name = core_options_get('copyright_name');
		$copyright_html = core_options_get('copyright_html');
		$copyright_year = date('Y');

		if (!$copyright_html) {
			if (!$copyright_link)
				$copyright_link = site_url();

			echo '&copy; ', $copyright_year, ' <a href="', $copyright_link, '">',$copyright_name, '</a>';
		} else
			echo $copyright_html;
		echo '</div>';
	    echo '</div><!-- ends here .copyright -->';
	} // core_theme_copyright()
}
add_action('core_theme_hook_footer_content', 'core_theme_copyright');


if ( ! function_exists( 'core_theme_powered' ) ) {
/**
 * Powered by
 *
 * @since framework 1.0
 */
	function core_theme_powered(){
		echo '<div class="grid col-six fit powered">';
	    echo '        <a href="#" title="', get_bloginfo('name'),'">';
	    echo '                ', get_bloginfo('name'),'</a>';
	    echo '        ', __('powered by', THEME_SLUG),' <a href="http://wordpress.org/" title="WordPress">';
	    echo '                WordPress</a>';
	    echo '</div><!-- ends here .powered -->';
	} // core_theme_powered()
}
//add_action('core_theme_hook_footer_content', 'core_theme_powered');


if ( ! function_exists( 'core_theme_to_top' ) ) {
/**
 * Back to top link
 *
 * @since framework 1.0
 */
	function core_theme_to_top(){
		echo "<div class=\"scroll-top\"><a href=\"#scroll-top\" title=\"scroll to top\"><i class=\"icon-caret-up\"></i></a></div>";
	} // core_theme_to_top()
}
add_action('core_theme_hook_footer_after', 'core_theme_to_top');


if ( ! function_exists( 'core_theme_google_analytics' ) ) {
/**
 * Google Analytics
 *
 * @since framework 1.0
 */
	function core_theme_google_analytics(){
		$google_analytics= '';

		// add google analytics settings
		$google_analytics = core_options_get('google_analytics');
		if ($google_analytics){
			echo "<script type=\"text/javascript\">";
			echo strip_tags($google_analytics);
			echo "</script>\n";
		}
	} // core_theme_google_analytics()
}
add_action('wp_head', 'core_theme_google_analytics', 101);


if ( ! function_exists( 'core_theme_custom_js' ) ) {
/**
 * Custom Js
 *
 * @since framework 1.0
 */
	function core_theme_custom_js(){
		$custom_js = '';

		// add custom javascripts
		$custom_js = core_options_get('custom_js');
		if ($custom_js){
			echo "<script type=\"text/javascript\">\n";
			echo strip_tags($custom_js) . "\n";
			echo "</script>\n";
		}
	} // core_theme_custom_js()
}
add_action('wp_footer', 'core_theme_custom_js', 10);

if ( ! function_exists( 'core_theme_custom_css' ) ) {
/**
 * Custom Css
 *
 * @since framework 1.0
 */
	function core_theme_custom_css(){
		$custom_css ='';

		// add custom javascripts
		$custom_css = core_options_get('custom_css');
		if ($custom_css)
			echo strip_tags($custom_css);
	} // core_theme_custom_css()
}
add_action('core_theme_hook_styles', 'core_theme_custom_css');

if ( ! function_exists( 'core_theme_customize' ) ) {
/**
 * Customize Demo Pane
 *
 * @since framework 1.0
 */
	function core_theme_customize(){
		// add demo settings
		$customize = core_options_get('customize');
		if($customize)
			core_demo_settings_enable(true);
	} // core_theme_customize()
}
add_action('core_theme_hook_after_container', 'core_theme_customize');



if ( ! function_exists( 'core_theme_loader' ) ) {
/**
 * Container Class
 *
 * @since Mikmag 2.0
 */
	function core_theme_loader() {
		$core_loader = core_options_get('core_loader');
		if ( $core_loader ) {
			echo '<div class="core-loader">';
			echo '<div class="content">';

			echo '<div class="logo">';
			$logo = core_options_get('logo');
			if($logo)
				echo '<a href="', home_url(), '"><img src="', $logo, '" alt="', get_bloginfo('title'), '" /></a>';
			else
				echo '<a href="', home_url(), '">', get_bloginfo('name'), '</a>';

			echo '</div>';

			echo '<div class="indicator">';
			echo '<img src="', CORE_URI, '/images/core-loader.gif" alt="loading" title="loading">';
			echo '</div>';

			echo '</div>';
			echo '</div>';
		}
	}
}
add_action('core_theme_hook_before_container', 'core_theme_loader');


function core_theme_content_ad_before() {
	if ( core_ads_get('content_before') )
		echo core_ads_get('content_before');
}
add_action('core_theme_hook_before_entry_content', 'core_theme_content_ad_before');

function core_theme_content_ad_after() {
	if ( core_ads_get('content_after') )
		echo core_ads_get('content_after');
}
add_action('core_theme_hook_after_entry_content', 'core_theme_content_ad_after');


if ( ! function_exists( 'core_theme_container_class' ) ) {
/**
 * Container Class
 *
 * @since framework 1.0
 */
	function core_theme_container_class(){
		// add custom container class in the template
		$layout_style = core_options_get('layout_style');
		if($layout_style)
			echo $layout_style . ' hfeed';
		else
			echo 'hfeed';
	} // core_theme_container_class()
}
add_action('container_class', 'core_theme_container_class');


// Custom CSS for content color schemes
// TODO: Move CSS rules into customizable array, or something similar
//
function core_colorschemes_css() {
	$scheme = null;

	if ( is_home() )
		$scheme = core_options_get('layout-home_colorscheme', 'theme');
	else
		$scheme = core_options_get('layout-default_colorscheme', 'theme');

	// Get scheme from post\page or category
	if ( is_singular() )
		$scheme = core_options_get('colorscheme', get_post_type());

	if (is_archive()){

		if (is_category()) {
			$obj = get_queried_object();
			$scheme = core_options_get('category_colorscheme_' .$obj->slug);
		} elseif (is_author())
			$scheme = core_options_get('layout-author_colorscheme', 'theme');

		elseif (is_tag())
			$scheme = core_options_get('layout-tag_colorscheme', 'theme');
		else
			$scheme = core_options_get('layout-archive_colorscheme', 'theme');
	}

	if (is_404())
		$scheme = core_options_get('layout-404_colorscheme', 'theme');

	if (is_search())
		$scheme = core_options_get('layout-search_colorscheme', 'theme');

	if (!$scheme)
		return;

	$schemes = core_options_get('colorschemes');
	if (!isset($schemes[$scheme]))
		return;

	$scheme = $schemes[$scheme];

	// Calculate rgba() strings
	$backgroundcolor = core_hex2rgb($scheme['color-background']);
	$backgroundcolor['alpha'] = intval($scheme['opacity-background']) / 100;

	// Outline is 60% alpha of original
	$outline = core_hex2rgb($scheme['color-background']);
	$outline['alpha'] = intval($scheme['opacity-background']) / 100 * 0.6;

	// Content block CSS
	echo '#wrapper .theme_content_area {';
	echo 'background-color: ', core_color2rgba($backgroundcolor), ';';
	//echo 'outline-color: ', core_color2rgba($outline), ';';
	echo 'color: #', $scheme['color-paragraph'], ';';
	echo '}';

	// Heading shortcodes
	echo 'div.shortcode-header h1,';
	echo 'div.shortcode-header h2,';
	echo 'div.shortcode-header h3,';
	echo 'div.shortcode-header h4,';
	echo 'div.shortcode-header h5,';
	echo 'div.shortcode-header h6 {';
	echo 'background-color: ', core_color2rgba($backgroundcolor), ';';
	echo '}';

	// Content Css
	echo '#wrapper .theme-content * {';
	echo 'color: #', $scheme['color-paragraph'], ';';
	echo '}';

}
add_action('core_custom_css', 'core_colorschemes_css');


if ( ! function_exists( 'core_theme_content_nav' ) ) :
/**
 * Display navigation to next/previous pages when applicable
 *
 * @since framework 1.0
 */
function core_theme_content_nav( $nav_id ) {
	global $wp_query, $post;

	// Don't print empty markup on single pages if there's nowhere to navigate.
	if ( is_single() ) {
		$previous = ( is_attachment() ) ? get_post( $post->post_parent ) : get_adjacent_post( false, '', true );
		$next = get_adjacent_post( false, '', false );

		if ( ! $next && ! $previous )
			return;
	}

	// Don't print empty markup in archives if there's only one page.
	if ( $wp_query->max_num_pages < 2 && ( is_home() || is_archive() || is_search() ) )
		return;

	$nav_class = ( is_single() ) ? 'navigation single' : 'navigation paging';

	?>
	<nav role="navigation" id="<?php echo esc_attr( $nav_id ); ?>" class="<?php echo $nav_class; ?>">
		<h1 class="screen-reader-text"><?php _e( 'Post navigation', THEME_SLUG ); ?></h1>

	<?php if ( is_single() ) : // navigation links for single posts ?>

		<?php previous_post_link( '<div class="previous">%link</div>', '<span class="meta-nav">' . _x( '<i class="icon-long-arrow-left"></i>', 'Previous post link', THEME_SLUG ) . '</span> %title' ); ?>
		<?php next_post_link( '<div class="next">%link</div>', '%title <span class="meta-nav">' . _x( '<i class="icon-long-arrow-right"></i>', 'Next post link', THEME_SLUG ) . '</span>' ); ?>

	<?php elseif ( $wp_query->max_num_pages > 1 && ( is_home() || is_archive() || is_search() ) ) : // navigation links for home, archive, and search pages ?>

		<?php if ( get_next_posts_link() ) : ?>
		<div class="previous"><?php next_posts_link( __( '<span class="meta-nav">&larr;</span> Older posts', THEME_SLUG ) ); ?></div>
		<?php endif; ?>

		<?php if ( get_previous_posts_link() ) : ?>
		<div class="next"><?php previous_posts_link( __( 'Newer posts <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?></div>
		<?php endif; ?>

	<?php endif; ?>
		<div class="clear"></div>
	</nav><!-- #<?php echo esc_html( $nav_id ); ?> -->
	<?php
} // core_theme_content_nav
endif;

if ( ! function_exists( 'core_theme_comment' ) ) :
/**
 * Template for comments and pingbacks.
 *
 * Used as a callback by wp_list_comments() for displaying the comments.
 *
 * @since framework 1.0
 */
function core_theme_comment( $comment, $args, $depth ) {
	$GLOBALS['comment'] = $comment;
	switch ( $comment->comment_type ) :
		case 'pingback' :
		case 'trackback' :
	?>
	<li class="post pingback">
		<p><?php _e( 'Pingback:', THEME_SLUG ); ?> <?php comment_author_link(); ?><?php edit_comment_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '<span>' ); ?></p>
	<?php
			break;
		default :
	?>
	<li <?php comment_class(); ?> id="li-comment-<?php comment_ID(); ?>">
		<article id="comment-<?php comment_ID(); ?>" class="comment-body">
			<footer>
				<div class="comment-author vcard">
					<?php echo get_avatar( $comment, 40 ); ?>
					<?php printf( __( '%s <span class="says">says:</span>', THEME_SLUG ), sprintf( '<cite class="fn">%s</cite>', get_comment_author_link() ) ); ?>
				</div><!-- .comment-author .vcard -->
				<?php if ( $comment->comment_approved == '0' ) : ?>
					<em><?php _e( 'Your comment is awaiting moderation.', THEME_SLUG ); ?></em>
					<br />
				<?php endif; ?>

				<div class="comment-meta commentmetadata">
					<a href="<?php echo esc_url( get_comment_link( $comment->comment_ID ) ); ?>"><time datetime="<?php comment_time( 'c' ); ?>">
					<?php printf( _x( '%1$s at %2$s', '1: date, 2: time', THEME_SLUG ), get_comment_date(), get_comment_time() ); ?>
					</time></a>
					<?php edit_comment_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '<span>' ); ?>
				</div><!-- .comment-meta .commentmetadata -->
			</footer>

			<div class="comment-content"><?php comment_text(); ?></div>

			<div class="reply">
				<i class="icon-reply"></i>
				<?php comment_reply_link( array_merge( $args, array( 'depth' => $depth, 'max_depth' => $args['max_depth'] ) ) ); ?>
			</div><!-- .reply -->
		</article><!-- #comment-## -->

	<?php
			break;
	endswitch;
} // core_theme_comment()
endif; // ends check for core_theme_comment()

if ( ! function_exists( 'core_theme_posted_on' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since framework 1.0
 */
function core_theme_posted_on() {
	$meta = core_options_get('meta');
	if ( !is_page() && $meta && is_single() ) {

		printf( __( '<i class="icon-calendar"></i> <a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a><span class="sep"> | </span>', THEME_SLUG ),
			esc_url( get_permalink() ),
			esc_attr( get_the_time() ),
			esc_attr( get_the_date( 'c' ) ),
			esc_html( get_the_date() )
		);
	}
} // core_theme_posted_on()
endif;
//add_action('core_theme_hook_entry_header', 'core_theme_posted_on');


if ( ! function_exists( 'core_theme_posted_in' ) ) :
/**
 * Prints HTML with meta information for the current categories, tags, comments.
 *
 * @since framework 1.0
 */
 	function core_theme_posted_in() {

 		core_theme_posted_on();

		if ( 'post' == get_post_type() && core_options_get('meta') ) : // Hide category and tag text for pages on Search

		printf( '<span class="author vcard"><i class="icon-user"></i> <a class="url fn n" href="%1$s" title="%2$s" rel="author">%3$s</a></span>',
			esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ),
			esc_attr( sprintf( __( 'View all posts by %s', THEME_SLUG ), get_the_author() ) ),
			get_the_author()
		);

		/* translators: used between list items, there is a space after the comma */
		$categories_list = get_the_category_list( __( ', ', THEME_SLUG ) );
		if ( $categories_list && core_theme_categorized_blog() )
			printf('<span class="sep"> | </span><span class="cat-links"><i class="icon-bookmark"></i> %1$s</span>', $categories_list);

		/* translators: used between list items, there is a space after the comma */
		$tags_list = get_the_tag_list( '', __( ', ', THEME_SLUG ) );
		if ( $tags_list )
			printf( '<span class="sep"> | </span><span class="tags-links"><i class="icon-tags"></i> %1$s</span> ', $tags_list);
		?>

		<?php if ( ! post_password_required() && ( comments_open() || '0' != get_comments_number() ) ) : ?>
		<span class="sep"> | </span>
		<span class="comments-link"> <i class="icon-comments"></i> <?php comments_popup_link( __( 'Leave a comment', THEME_SLUG ), __( '1 Comment', THEME_SLUG ), __( '% Comments', THEME_SLUG ) ); ?></span>
		<?php endif; ?>

		<?php
			$icon = "icon-copy";
			switch(get_post_format()) {
				case "aside":  	$icon = "icon-reorder";
								break;
				case "audio":  	$icon = "icon-music";
								break;
				case "chat":  	$icon = "icon-comments-alt";
								break;
				case "gallery":  	$icon = "icon-th-large";
								break;
				case "image":  	$icon = "icon-picture";
								break;
				case "link":  	$icon = "icon-link";
								break;
				case "quote":  	$icon = "icon-quote-right";
								break;
				case "status":  	$icon = "icon-lightbulb";
								break;
				case "video":  	$icon = "icon-facetime-video";
								break;
			}

			printf('<span class="sep"> | </span><i class="%1$s"></i> ', $icon );
		?>


		<?php endif;
	} // core_theme_posted_in()
endif;


if ( ! function_exists( 'core_theme_entry_meta' ) ) :
/**
 * Prints HTML with meta information for the current post-date/time and author.
 *
 * @since Mikmag 2.0
 */

 function core_theme_entry_meta(){
 /* translators: used between list items, there is a space after the comma */
	$category_list = get_the_category_list( __( ', ', THEME_SLUG ) );

	/* translators: used between list items, there is a space after the comma */
	$tag_list = get_the_tag_list( '', __( ', ', THEME_SLUG ) );

	if ( ! core_theme_categorized_blog() ) {
		// This blog only has 1 category so we just need to worry about tags in the meta text
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', THEME_SLUG );
		} else {
			$meta_text = __( 'Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', THEME_SLUG );
		}

	} else {
		// But this blog has loads of categories so we should probably display them here
		if ( '' != $tag_list ) {
			$meta_text = __( 'This entry was posted in %1$s and tagged %2$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', THEME_SLUG );
		} else {
			$meta_text = __( 'This entry was posted in %1$s. Bookmark the <a href="%3$s" title="Permalink to %4$s" rel="bookmark">permalink</a>.', THEME_SLUG );
		}

	} // end check for categories on this blog

	printf(
		$meta_text,
		$category_list,
		$tag_list,
		get_permalink(),
		the_title_attribute( 'echo=0' )
	);
} // core_theme_entry_meta()
endif;
add_action('core_theme_hook_entry_footer_meta', 'core_theme_entry_meta');

/**
 * Returns true if a blog has more than 1 category
 *
 * @since framework 1.0
 */
function core_theme_categorized_blog() {
	if ( false === ( $all_the_cool_cats = get_transient( 'all_the_cool_cats' ) ) ) {
		// Create an array of all the categories that are attached to posts
		$all_the_cool_cats = get_categories( array(
			'hide_empty' => 1,
		) );

		// Count the number of categories that are attached to the posts
		$all_the_cool_cats = count( $all_the_cool_cats );

		set_transient( 'all_the_cool_cats', $all_the_cool_cats );
	}

	if ( '1' != $all_the_cool_cats ) {
		// This blog has more than 1 category so core_theme_categorized_blog should return true
		return true;
	} else {
		// This blog has only 1 category so core_theme_categorized_blog should return false
		return false;
	}
} // core_theme_categorized_blog()

/**
 * Flush out the transients used in core_theme_categorized_blog
 *
 * @since framework 1.0
 */
function core_theme_category_transient_flusher() {
	// Like, beat it. Dig?
	delete_transient( 'all_the_cool_cats' );
} // core_theme_category_transient_flusher()
add_action( 'edit_category', 'core_theme_category_transient_flusher' );
add_action( 'save_post', 'core_theme_category_transient_flusher' );

/**
 * Post Format Support
 *********************************************************************/

if ( ! function_exists( 'core_theme_entry_date' ) ) :
/**
 * Prints HTML with date information for current post.
 *
 * Create your own core_theme_entry_date() to override in a child theme.
 *
 * @since Twenty Thirteen 1.0
 *
 * @param boolean $echo Whether to echo the date. Default true.
 * @return string
 */
function core_theme_entry_date( $echo = true ) {
	$format_prefix = ( has_post_format( 'chat' ) || has_post_format( 'status' ) ) ? _x( '%1$s on %2$s', '1: post format name. 2: date', 'twentythirteen' ): '%2$s';

	$date = sprintf( '<span class="date"><a href="%1$s" title="%2$s" rel="bookmark"><time class="entry-date" datetime="%3$s">%4$s</time></a></span>',
		esc_url( get_permalink() ),
		esc_attr( sprintf( __( 'Permalink to %s', 'twentythirteen' ), the_title_attribute( 'echo=0' ) ) ),
		esc_attr( get_the_date( 'c' ) ),
		esc_html( sprintf( $format_prefix, get_post_format_string( get_post_format() ), get_the_date() ) )
	);

	if ( $echo )
		echo $date;

	return $date;
}
endif;

/**
 * Returns the URL from the post.
 *
 * @uses get_the_link() to get the URL in the post meta (if it exists) or
 * the first link found in the post content.
 *
 * Falls back to the post permalink if no URL is found in the post.
 *
 * @since Twenty Thirteen 1.0
 * @return string URL
 */
function core_theme_get_link_url() {
	$has_url = get_the_post_format_url();

	return ( $has_url ) ? $has_url : apply_filters( 'the_permalink', get_permalink() );
}

if ( ! function_exists( 'core_theme_featured_gallery' ) ) :
/**
 * Displays first gallery from post content. Changes image size from thumbnail
 * to large, to display a larger first image.
 *
 * @since Twenty Thirteen 1.0
 *
 * @return void
 */
function core_theme_featured_gallery($post) {
	$pattern = get_shortcode_regex();

	if ( preg_match( "/$pattern/s", get_the_content(), $match ) && 'gallery' == $match[2] ) {
		add_filter( 'shortcode_atts_gallery', 'large' );
		echo do_shortcode_tag( $match );
	}
} // core_theme_featured_gallery()
endif;

if ( ! function_exists( 'core_theme_featured_image' ) ) :
/*
 * Displays the Featured Image on each post
 */
 function core_theme_featured_image($post) {
	if ( has_post_thumbnail() && (core_options_get('featured_img') == true) ) {
		echo "<div class=\"featured-image\">";
			the_post_thumbnail('post-excerpt');
		echo "</div>";
	}
 } // core_theme_featured_image()
endif;
//add_action('core_theme_hook_before_entry_content', 'core_theme_featured_image');


function add_flexslider_js(){
	wp_enqueue_script( 'flexslider', CORE_URI . '/slider/slider-flexslider/jquery.flexslider-min.js', array(), '2.1', true );
} // add_flexslider_js()


// Outputs the page title and breadcrumbs before a template page
//
function core_theme_page_title() {
	if ( !is_home() && !is_front_page() && !is_singular() ) {
		global $post;

		if (core_options_get('titles') || core_options_get('breadcrumbs') )
			echo '<header class="entry-header">';

		if (core_options_get('titles') ){
			if (is_category())
				echo '<h1 class="title entry-title">',single_cat_title( '', false ), '</h1>';
			elseif (is_archive() && is_day() )
				printf( '<h1 class="title entry-title">' . __( 'Daily Archives: %s', THEME_SLUG ), get_the_date() . '</h1>' );
			elseif (is_archive() && is_month() )
				printf( '<h1 class="title entry-title">' .  __( 'Monthly Archives: %s', THEME_SLUG ), get_the_date( _x( 'F Y', 'monthly archives date format', 'themedutch' ) ) . '</h1>' );
			elseif (is_archive() && is_year() )
				printf( '<h1 class="title entry-title">' .  __( 'Yearly Archives: %s', THEME_SLUG ), get_the_date( _x( 'Y', 'yearly archives date format', 'themedutch' ) ) . '</h1>' );
			elseif (is_tag() )
				printf( '<h1 class="title entry-title">' .  __( 'Showing posts with tag: %s', THEME_SLUG ), single_term_title("", false) . '</h1>' );
			elseif (is_search() )
				printf( '<h1 class="title entry-title">' .  __( 'Search Results: %s', THEME_SLUG ) , '"<span>' . get_search_query() . '</span>"' . '</h1>' );
			elseif (is_author() ){
				$author = get_user_by('slug', get_query_var('author_name'));
				printf(  '<h1 class="title entry-title">' . __( 'Author Archive for: %s', THEME_SLUG ) , '<span>' . $author->display_name . '</span>' . '</h1>' );
			}
			//else
			//	echo '<h1 class="title entry-title">', get_the_title(), '</h1>';
		}

		if (core_options_get('breadcrumbs') ) {
			core_theme_breadcrumb();
		}

		if (core_options_get('titles') || core_options_get('breadcrumbs') ) {
			echo '</header><!-- .entry-header -->';
		}
	}
}
add_action('core_before_template', 'core_theme_page_title');


?>