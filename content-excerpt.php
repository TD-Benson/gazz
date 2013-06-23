	<?php

// Exit if accessed directly
if ( !defined('ABSPATH')) exit;

/**
 * @package WordPress
 * @subpackage TDFramework
 * @since framework 1.0
 */


$odd_even = ($wp_query->current_post % 2 == 0) ? 'item-even' : 'item-odd';
$post_size = core_options_get('post_width', get_post_type());
$post_size_thumbs = 'post-excerpt-full';

?>

<article id="post-<?php the_ID(); ?>" <?php post_class('item ' . $odd_even); ?>>

	<div class="grid col-twelve">

	<?php if ( has_post_thumbnail() && core_options_get('featured_img') ) : ?>
	<?php

		if ( $post_size == 'small' && $odd_even == 'item-odd')
			$item_class = 'grid-right box-four fit';
		else if ( $post_size == 'small' && $odd_even == 'item-even')
			$item_class = 'grid box-four';
		else if ( $post_size == 'medium' && $odd_even == 'item-odd')
			$item_class = 'grid-right box-eight fit';
		else if ( $post_size == 'medium' && $odd_even == 'item-even')
			$item_class = 'grid box-eight';
		else
			$item_class = 'grid box-twelve';
	?>
	<div class="item-image <?php echo $item_class; ?>">
		<?php
			if ( !$post_size == 'full' )
				$post_size_thumbs = 'post-excerpt-small';

			$large_image_url = wp_get_attachment_image_src( get_post_thumbnail_id(), 'full');
		?>
		<a data-rel="prettyPhoto" href="<?php echo $large_image_url[0]; ?>" title="<?php echo the_title_attribute('echo=0'); ?>">
			<?php the_post_thumbnail($post_size_thumbs); ?>
		</a>
		<div class="item-image-hover">
			<a data-rel="prettyPhoto" class="icon-search icon-2x icon-tip" href="<?php echo $large_image_url[0]; ?>" title="View larger image"></a>
			<a class="icon-share icon-2x icon-tip"  href="<?php the_permalink(); ?>" title="Open in new tab" rel="bookmark" target="_blank"></a>
			<div class="entry-meta-list">
				<?php core_theme_posted_in(); ?>
				<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
			</div>
		</div>
	</div>
	<?php endif; ?>

	<?php
		if ( $post_size == 'small' && $odd_even == 'item-odd')
			$item_class = 'grid-right box-eight fit';
		else if ( $post_size == 'small' && $odd_even == 'item-even')
			$item_class = 'grid box-eight';
		else if ( $post_size == 'medium' && $odd_even == 'item-odd')
			$item_class = 'grid-right box-four fit';
		else if ( $post_size == 'medium' && $odd_even == 'item-even')
			$item_class = 'grid box-four';
		else
			$item_class = 'grid box-twelve';
	?>
	<div class="item-content <?php echo $item_class; ?>">
		<header class="entry-header">
			<?php if ( core_options_get('titles')  ) : ?>
			<h1 class="entry-title"><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( '%s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php the_title(); ?></a></h1>
			<?php endif; ?>

			<?php if ( is_single() ) : core_theme_breadcrumb(); ?>
			<?php /*?><?php core_theme_hook_entry_header(); ?><?php */?>
			<div class="entry-meta-list">
				<?php core_theme_posted_in(); ?>
				<?php edit_post_link( __( 'Edit', THEME_SLUG ), '<span class="sep"> | </span><span class="edit-link">', '</span>' ); ?>
			</div>
			<?php endif; ?>

		</header><!-- .entry-header -->

		<?php do_action('core_theme_hook_before_entry_content'); ?>

		<?php if ( is_archive() ) : // Only display Excerpts for Search ?>
		<div class="entry-summary">
			<?php //the_excerpt();
				if ( $post_size == 'small' )
					echo '<p>'.limited_excerpt(350).'</p>';
				else
					echo '<p>'.limited_excerpt(650).'</p>';
			?>
			<?php /*?><a href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark">Read more &rarr; </a><?php */?>
		</div><!-- .entry-summary -->
		<?php else : ?>
		<div class="entry-content">
			<?php //the_content( __( 'Continue reading <span class="meta-nav">&rarr;</span>', THEME_SLUG ) ); ?>
			<?php //the_excerpt();

				if ( $post_size == 'small' )
					echo '<p>'.limited_excerpt(350).'</p>';
				else
					echo '<p>'.limited_excerpt(650).'</p>';
			?>
			<p><a class="button medium alignright" href="<?php the_permalink(); ?>" title="<?php echo esc_attr( sprintf( __( 'Permalink to %s', THEME_SLUG ), the_title_attribute( 'echo=0' ) ) ); ?>" rel="bookmark"><?php _e('Read more &rarr;', THEME_SLUG); ?></a></p>
			<?php wp_link_pages( array( 'before' => '<div class="page-links">' . __( 'Pages:', THEME_SLUG ), 'after' => '</div>' ) ); ?>
		</div><!-- .entry-content -->
		<?php endif; ?>

		<?php do_action('core_theme_hook_after_entry_content'); ?>

	</div>
	</div>
	<div class="clear"></div>
</article><!-- #post-## -->
