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
	<header class="entry-header">
		<?php if ( core_options_get('titles')  ) : ?>
		<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
		<?php endif; ?>

		<?php if ( is_single() ) core_theme_breadcrumb(); ?>
		<?php core_theme_hook_entry_header(); ?>

		<?php if ( core_options_get('titles') || core_options_get('breadcrumbs') ) : ?>
		<div class="title-row"></div>
		<?php endif; ?>
	</header><!-- .entry-header -->

	<?php do_action('core_theme_hook_before_entry_content'); ?>

	<?php if ( has_post_thumbnail() && core_options_get('featured_img') ) : ?>
	<div class="item-image grid col-twelve ">
			<?php the_post_thumbnail('post-excerpt'); ?>
	</div>
	<?php endif; ?>

	<?php if ( is_archive() ) : // Only display Excerpts for Search ?>
	<div class="entry-summary">
		<?php the_excerpt(); ?>
	</div><!-- .entry-summary -->
	<?php else : ?>
	<div class="entry-content">
		<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?>
		<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
	</div><!-- .entry-content -->
	<?php endif; ?>

	<footer class="entry-meta">
		<?php core_theme_posted_in(); ?>
		<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
	</footer><!-- .entry-meta -->

	<?php do_action('core_theme_hook_after_entry_content'); ?>

	<?php get_template_part('author', 'content'); ?>

</article><!-- #post-## -->
