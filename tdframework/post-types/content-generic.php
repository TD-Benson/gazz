<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<?php if (core_options_get('titles') == true) : ?>
	<h1 class="entry-title"><?php the_title(); ?></h1>
	<?php endif; ?>

	<?php //core_theme_breadcrumb(); ?>

	<?php do_action('core_theme_hook_before_entry_content'); ?>

	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<footer class="entry-meta">
		<?php core_theme_posted_in(); ?>

		<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->

	<?php do_action('core_theme_hook_after_entry_content'); ?>

</article><!-- #post-## -->
