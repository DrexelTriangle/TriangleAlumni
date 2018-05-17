<?php
/**
 * Template part for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alumni
 */
 
?>

<div class="cover cover-quarter" style="background-image: url(<?php echo get_the_post_thumbnail_url($post, 'feature-jumbotron'); ?>)">
	<div class="cover-overlay">
		<?php the_title('<h1 class="cover-heading">', '</h1>'); ?>
	</div>
</div>

<div id="page-<?php the_ID(); ?>" class="single-container">
	<div class="page-container">
		<?php the_content(); ?>
	</div>
</div>