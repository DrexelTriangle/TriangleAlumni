<?php
/**
 * The main template file.
 *
 * This is the most generic template file in a WordPress theme
 * and one of the two required files for a theme (the other being style.css).
 * It is used to display a page when nothing more specific matches a query.
 * E.g., it puts together the home page when no home.php file exists.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alumni
 */
 
get_header(); ?>

<div class="image-background">
	<div class="image-fullpage" style="background-image: url(<?php echo get_template_directory_uri() . '/images/covers/cover-home.png'; ?>)">
		<div class="image-overlay">
			<div class="container">
				<h1 class="title">Welcome Back.</h1>
				<p class="caption">
					<span>Over 90 years of history and hundreds of alumni to rediscover.</span>
					<span>See how you can get involved.</span>
				</p>
				<div class="clearfix"></div>
				<p class="caption">
					<span><a class="btn btn-primary" href="/join">JOIN THE ALUMNI NETWORK</a></span>
				</p>
			</div>
		</div>
		
		<div class="image-card-container">
			<a href="#" class="image-card" style="background-image: url(<?php echo get_template_directory_uri() . '/images/cards/card1.jpg'; ?>)"></a>
			
			<a href="#" class="image-card" style="background-image: url(<?php echo get_template_directory_uri() . '/images/cards/card2.jpg'; ?>)"></a>
			
			<a href="#" class="image-card" style="background-image: url(<?php echo get_template_directory_uri() . '/images/cards/card3.jpg'; ?>)"></a>
		</div>
	</div>
</div>

<?php get_footer(); ?>