<?php
/**
 * Template part for displaying categories.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alumni
 */

$cat = get_queried_object();
 
?>

<div id="newsCarousel" class="carousel slide news-carousel" data-ride="carousel">
	<ol class="carousel-indicators">
		<li data-target="#newsCarousel" data-slide-to="0" class="active"></li>
		<li data-target="#newsCarousel" data-slide-to="1"></li>
		<li data-target="#newsCarousel" data-slide-to="2"></li>
	</ol>
	<div class="carousel-inner">
		<?php $query = new WP_Query(array('posts_per_page' => 3, 'offset' => 0, 'cat' => $cat->term_id)); ?>
		
		<?php 
				$i = 0;
				while($query->have_posts()) :
				$query->the_post();
				
				$title = get_the_title();
				$link = get_permalink();
				$excerpt = get_the_excerpt();
				$thumb = get_the_post_thumbnail($post, '169-preview-large');
				
				// If first story, add active class
				if ($i == 0)
				{
					printf('<div class="carousel-item active">');
					$i++;
				}
				else
				{
					printf('<div class="carousel-item">');
				}
			?>
			
				<div class="d-block w-100">
					<div class="row no-gutters">
						<div class="col-lg-6 image-container">
							<?php echo $thumb ?>
						</div>
						<div class="col-lg-6 meta-container">
							<h1><?php echo $title ?></h1>
							<p><?php echo $excerpt ?></p>
							<a class="btn btn-primary btn-read white" href="<?php echo $link ?>">Read More</a>
						</div>
					</div>
				</div>
				
			</div>			
		<?php endwhile; ?>
	</div>
	
	<a class="carousel-control-prev" href="#newsCarousel" role="button" data-slide="prev">
		<span class="carousel-control-prev-icon" aria-hidden="true"></span>
		<span class="sr-only">Previous</span>
	</a>
	
	<a class="carousel-control-next" href="#newsCarousel" role="button" data-slide="next">
		<span class="carousel-control-next-icon" aria-hidden="true"></span>
		<span class="sr-only">Next</span>
	</a>
</div>

<div class="news-splash">
	<h1>Media, alumni updates, and more</h1>
</div>

<div class="news-grid">
	<?php			
		$query = new WP_Query(array('posts_per_page' => 15, 'offset' => 0, 'cat' => $cat->term_id));
		
		// For counting stories to put rows
		$i = 1;
		
		// First row div
		printf('<div class="row">');
		
		while($query->have_posts())
		{
			$query->the_post();
			
			$title = get_the_title();
			$link = get_permalink();
			$date = get_the_date('M. j, Y');
			$author = get_the_author();
			$thumb = get_the_post_thumbnail($post, '169-preview-large');
			
			// Story container
			printf('<div class="news-card col-md-4"><div class="content-container"><a href="%1$s">', $link);
			
			// Thumbnail
			printf('<div class="image-container">');
			printf($thumb);
			printf('</div>');
			
			// Date author, and sub-category
			printf('<div class="meta">%1$s | By %2$s</div>', esc_attr($date), $author);
			
			// Headline
			printf('<div class="headline" href="%1$s">%2$s</div>', esc_attr($link), esc_html($title));
			
			// 'Read' button
			printf('<div class="buttons"><a class="btn btn-primary btn-read black" href="%1$s">Read More</a></div>', $link);
			
			printf('</a></div></div>');
			
			// Print a new row div every 3 stories
			if($i % 3 == 0)
				printf('</div><div class="row">');
		}
		
		// Close last row div
		printf('</div>');
		
		// Allow infinite scroll using Ajax Load More plugin
		//echo do_shortcode("[ajax_load_more post_type='post' repeater='default' offset='19' posts_per_page='15' transition='fade' category='" . $cat->slug . "']");
	?>
</div>