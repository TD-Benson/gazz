<?php
/**
 * The template for displaying posts in the Audio post format.
 *
 * @package WordPress
 * @subpackage Twenty_Thirteen
 * @since Twenty Thirteen 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>

	<div class="item-content grid box-twelve">

		<header class="entry-header">
			<?php if ( core_options_get('titles')  ) : ?>
			<?php if ( is_single() ) : ?>
			<h1 class="entry-title"><i class="icon-music pull-right"> </i> <?php the_title(); ?> </h1>
			<?php else : ?>
			<h1 class="entry-title">
				<a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a>
			</h1>
			<?php endif; // is_single() ?>
			<?php endif; ?>

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

		<div class="entry-media">
			<div class="audio-content">
				<?php //the_post_format_audio(); ?>
			</div><!-- .audio-content -->
		</div><!-- .entry-media -->

		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links"><span class="page-links-title">' . __( 'Pages:', THEME_SLUG ) . '</span>', 'after' => '</div>', 'link_before' => '<span>', 'link_after' => '</span>' ) ); ?>
		</div><!-- .entry-content -->

		<?php if ( is_single() ) : ?>
		<footer class="entry-meta">
			<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="edit-link">', '</span>' ); ?>
		</footer><!-- .entry-meta -->
		<?php endif; // is_single() ?>

		<?php do_action('core_theme_hook_after_entry_content'); ?>


	</div>
	<div class="clear"></div>

</article><!-- #post -->
