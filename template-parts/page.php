<?php
/**
 * Template part for displaying all pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alumni
 */
 
?>

<div class="generic-wrapper">
	<div class="category-title">
		<center><h1 class="text-title-large"><?php the_title(); ?></h1></center>
	</div>

	<div class="generic-container">
		<div class="page-container">
			<?php the_content(); ?>
		</div>
	</div>
</div>