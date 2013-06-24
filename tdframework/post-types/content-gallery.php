<?php
/**
 * The template for displaying posts in the Gallery post format.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="item-content grid box-twelve">

		<header class="entry-header">
			<?php if (core_options_get('titles') == true) : ?>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><i class="icon-th-large pull-right"></i> <?php the_title(); ?></h1>

			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php endif; ?>
			<?php //core_theme_posted_on(); ?>

			<?php if ( is_single() ) core_theme_breadcrumb(); ?>
			<?php //core_theme_hook_entry_header(); ?>
			<?php if ( !is_single() ) : ?>
			<div class="entry-meta-list">
				<?php core_theme_posted_in(); ?>
				<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
			</div>
			<?php endif; ?>

			<?php if ( is_single() && (core_options_get('titles') || core_options_get('breadcrumbs')) ) : ?>
			<?php endif; ?>

		</header><!-- .entry-header -->

		<?php do_action('core_theme_hook_before_entry_content'); ?>

		<div class="entry-content">
				<?php core_theme_featured_gallery($post); ?>
		</div><!-- .entry-content -->

		<?php if ( is_single() ) : ?>
		<footer class="entry-meta">
			<?php core_theme_posted_in(); ?>
			<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
		<?php endif; // is_single() ?>

		<?php do_action('core_theme_hook_after_entry_content'); ?>

	</div>
	<div class="clear"></div>

</article><!-- #post -->
