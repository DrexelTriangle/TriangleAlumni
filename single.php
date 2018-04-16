<?php
/**
 * The template for displaying all single posts.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package Alumni
 */

get_header(); ?>

<?php
	while(have_posts())
	{
		the_post();
		get_template_part('template-parts/single', get_post_format());
	}
?>

<?php get_footer(); ?>