<?php
/**
 * The template for displaying all categories.
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#category
 *
 * @package Alumni
 */

$cat = get_queried_object();
 
get_header(); ?>

<div id="primary" class="generic-wrapper">
	<div class="category-title">
		<h1 class="text-title-large"><?php single_cat_title('', true); ?></h1>
	</div>

	<div class="generic-flex-container">
		<main id="section-articles" class="flex-main">
			<?php			
				$query = new WP_Query(array('posts_per_page' => 15, 'offset' => 0, 'cat' => $cat->term_id));
				
				while($query->have_posts())
				{
					$query->the_post();
					
					$title = get_the_title();
					$link = get_permalink();
					$date = get_the_date('M. j, Y');
					//$authors = coauthors_posts_links(null, null, null, null, false);
					//$excerpt = get_the_summary($post->ID);
					$thumb = get_the_post_thumbnail($post, array('class' => '169-preview-medium'));
					
					echo '<div class="category-post">';
					
					// Left box - date
					printf('<div class="category-date">%1$s</div>', esc_attr($date));
					
					// Middle box flex - headline, author, and excerpt
					echo '<div class="category-post-info">';
					printf('<a class="text-headline-medium" href="%1$s">%2$s</a>', esc_attr($link), esc_html($title));
					printf('<div class="category-tease">%1$s</div>', $excerpt);
					printf('<div class="category-author">By %1$s</div>', $authors);
					echo '</div>';
					
					// Right box - thumbnail
					printf('<a href="%1$s"><div class="category-thumbnail">%2$s</div></a>', $link, $thumb);
					
					echo '</div>';
				}
			?>
		</main>

		<aside class="flex-sidebar">
			
		</aside>
	</div>
</div>

<?php get_footer(); ?>