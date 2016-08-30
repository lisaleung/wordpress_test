<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package A_eight
 */

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">


			<header class="page-header">
				<h1>Our Students</h1>
			</header><!-- .page-header -->
			<section>
<?php 
	
	$args = array(

		'post_type'=> 'student',
		'posts_per_page'=> -1,
		'orderby' => 'title',
		'order' => 'ASC',
		'tax_query'=> array(
						array(

							'taxonomy'=> 'student-type',
							'field'=> 'slug',
							'terms'=> 'designer',

						)
					)

	);

	$designer = new WP_Query($args);

	if ($designer->have_posts()) {
		while ($designer->have_posts()) {
			$designer->the_post();

			echo "<article class='students'>";
			echo "<a href='";
			the_permalink();
			echo "'>";
			the_title();
			the_post_thumbnail('medium');
			echo "</a>";
			the_excerpt();
			echo get_the_term_list($post->ID, "student-type", 'Interest: ', ', ', '. ');
			echo "</article>";

		}
		wp_reset_postdata();
	}

?>

<?php 
	
	$args = array(

		'post_type'=> 'student',
		'posts_per_page'=> -1,
		'order' => 'title',
		'tax_query'=> array(
						array(

							'taxonomy'=> 'student-type',
							'field'=> 'slug',
							'terms'=> 'developer',

						)
					)

	);

	$developer = new WP_Query($args);

	if ($developer->have_posts()) {
		while ($developer->have_posts()) {
			$developer->the_post();

			echo "<article class='students'>";
			echo "<a href='";
			the_permalink();
			echo "'>";
			the_title();
			the_post_thumbnail('medium');
			echo "</a>";
			the_excerpt();
			echo get_the_term_list($post->ID, "student-type", 'Interest: ', ', ', '. ');
			echo "</article>";

		}
		wp_reset_postdata();
	}

?>
			</section>
		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
