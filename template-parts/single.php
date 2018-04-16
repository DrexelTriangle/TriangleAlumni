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

<div id="article-<?php the_ID(); ?>" class="single-container">
	<div class="single-jumbotron">
		<?php echo get_the_post_thumbnail($post, 'feature-jumbotron'); ?>
	</div>
		
	<article class="single-content">
		<?php the_title('<h1 class="single-title">', '</h1>'); ?>
		
		<div class="single-meta">
			<div class="author">By <?php the_author_link() ?></div>
			<?php the_date('M. j, Y', '<div class="date">', '</div>'); ?>
		</div>
	
		<?php the_content(); ?>
	</article>
	
	<?php
		// If comments are open or we have at least one comment, load up the comment template.
		if(comments_open() || get_comments_number())
			comments_template();
	?>
</div>