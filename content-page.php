<?php
/**
 * The template used for displaying page content in page.php
 *
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<header class="entry-header">
		<?php if ( core_options_get('titles') ) : ?>
		<h1 class="entry-title"><?php the_title(); ?></h1>
		<?php endif; ?>

		<?php core_theme_breadcrumb(); ?>

		<?php if ( core_options_get('titles') || core_options_get('breadcrumbs') ) : ?>
		<div class="title-row"></div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php do_action('core_theme_hook_before_entry_content'); ?>

	<div class="entry-content">
		<?php the_content(); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->

	<?php do_action('core_theme_hook_after_entry_content'); ?>

	<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<footer class="entry-meta"><span class="edit-link">', '</span></footer>' ); ?>
</article><!-- #post-## -->
