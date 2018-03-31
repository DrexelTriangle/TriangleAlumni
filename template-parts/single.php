<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alumni
 */

 the_title('<title>', ' | The Triangle Alumni Association</title>');
 
?>

<?php insert_ad('Global Banner Top', 'banner-top'); ?>

<div class="generic-container" style="margin-bottom: 0px;">
	<div class="single-title">
		<?php
			the_title('<h1>', '</h1>');
		
			if (the_subtitle('', '', false) !== '' || the_subtitle('', '', false) !== false)
				echo the_subtitle('<h2>', '</h2>');
		?>
	</div>
	
	<div class="single-meta">
		<div class="author">By <?php /*coauthors_posts_links();*/ ?></div>
		<?php
			the_date('M. j, Y', '<div class="date">', '</div>');
		?>
	</div>
</div>

<div id="post-<?php the_ID(); ?>" class="generic-flex-container">
	<main class="flex-main">
		<div class="article-image">
			
		</div>
		
		<article class="single-content">
			<?php the_content(); ?>
		</article>
	</main>
	
	<aside class="flex-sidebar">			
		<!-- todo - load sidebar here -->
	</aside>
</div>