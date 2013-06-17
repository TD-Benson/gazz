	<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class('item'); ?>>

	<?php if ( has_post_thumbnail() && core_options_get('featured_img') ) : ?>
	<div class="item-image grid col-twelve ">
		<?php
			 $large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		?>
		<a data-rel="prettyPhoto" href="<?php echo $large_image_url[0]; ?>" title="<?php echo the_title_attribute('echo=0'); ?>">
			<?php the_post_thumbnail('post-excerpt'); ?>
		</a>
	</div>
	<?php endif; ?>

	<div class="grid col-twelve">

	<?php if ( core_options_get('meta') ) : ?>
	<div class="grid col-one">
		<div class="item-date ">
			<div class="item-day">
				<?php the_time('j'); ?>
			</div>
			<div class="item-month">
				<?php echo strtoupper(substr(get_the_time('F'), 0 ,3)); ?>
			</div>
			<?php /*?><div class="item-year">
				<?php the_time('Y'); ?>
			</div><?php */?>
		</div>
	</div>
	<?php endif; ?>

	<?php $column = core_options_get('meta') ? 'col-eleven' : 'col-twelve'; ?>
	<div class="item-content grid-right <?php echo $column; ?> fit">
		<header class="entry-header">
			<?php if ( core_options_get('titles')  ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>

			<?php if ( is_single() ) core_theme_breadcrumb(); ?>
			<?php /*?><?php core_theme_hook_entry_header(); ?><?php */?>
			<div class="entry-meta-list">
				<?php core_theme_posted_in(); ?>
				<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
			</div>
		</header><!-- .entry-header -->

		<?php do_action('core_theme_hook_before_entry_content'); ?>

		<?php if ( is_archive() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php the_excerpt(); ?>
			<?php /*?><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">Read more &rarr; </a><?php */?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<?php do_action('core_theme_hook_after_entry_content'); ?>

	</div>
	</div>
	<div class="clear"></div>
</article><!-- #post-## -->
