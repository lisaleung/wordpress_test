<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package A_eight
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">
		<?php
		if ( is_single() ) :
			the_title( '<h1 class="entry-title">', '</h1>' );
		else :
			the_title( '<h2 class="entry-title"><a href="' . esc_url( get_permalink() ) . '" rel="bookmark">', '</a></h2>' );
		endif;

		if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta">
			<?php a_eight_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php
		endif; ?>
	</header><!-- .entry-header -->

	<div class="entry-content">
		<article>
			<?php the_post_thumbnail('special_feauture_size', array('class'=>'alignleft')); ?>
			<?php the_content(); ?>
		</article>
	</div><!-- .entry-content -->

	<footer class="entry-footer">
		<?php a_eight_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
