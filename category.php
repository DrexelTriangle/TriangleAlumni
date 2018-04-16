<?php
/**
 * The template for displaying all categories.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package Alumni
 */

$cat = get_queried_object();
 
get_header();

get_template_part('template-parts/category', get_queried_object()->name);

get_footer(); ?>