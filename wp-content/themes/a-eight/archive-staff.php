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

			</header><!-- .page-header -->

<?php 
	
	$args = array(

			"post_type"=> "staff",
			"posts_per_page"=> -1,
			"tax_query"=> array(

						"taxonomy"=> "staff-type",
						"field"=> "slug",
						"terms"=> "faculty",
						)

			);


	$faculty = new WP_Query($args);

	if ($faculty->have_posts()) {
		echo "<h1>Faculty</h1>";
		while ($faculty->have_posts()) {
			$faculty->the_post();

			echo "<article class='students'>";
			echo "<a href='";
			the_permalink();
			echo "'>";
			the_title();
			echo "</a>";
			the_excerpt();
			echo "</article>";
		}
		wp_reset_postdata();
	}
?>
<?php 
	
	$args = array(

			"post_type"=> "staff",
			"posts_per_page"=> -1,
			"tax_query"=> array(

						"taxonomy"=> "staff-type",
						"field"=> "slug",
						"terms"=> "administrative",
						)

			);


	$administrative = new WP_Query($args);

	if ($administrative->have_posts()) {
		echo "<h1>Administrative Staff</h1>";
		while ($administrative->have_posts()) {
			$administrative->the_post();

			echo "<article class='students'>";
			echo "<a href='";
			the_permalink();
			echo "'>";
			the_title();
			echo "</a>";
			the_excerpt();
			echo "</article>";
		}
		wp_reset_postdata();
	}
?>

		</main><!-- #main -->
	</div><!-- #primary -->

<?php
get_footer();
