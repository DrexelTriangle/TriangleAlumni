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
	<div class="cover cover-full" style="background-image: url(<?php echo get_template_directory_uri() . '/images/covers/cover-home.jpg'; ?>)">
		<div class="cover-overlay">
			<div class="container">
				<h1 class="cover-heading">Welcome Back.</h1>
				<p class="cover-caption">
					<span>Over 90 years of history and hundreds of alumni to rediscover.</span>
					<span>See how you can get involved.</span>
				</p>
				
				<div class="clearfix"></div>
				
				<p class="cover-caption">
					<span><a class="btn btn-primary" href="/join">JOIN THE ALUMNI NETWORK</a></span>
				</p>
			</div>
			
			<div class="home-cards-container">
				<a href="/about" class="home-card" style="background-image: url(<?php echo get_template_directory_uri() . '/images/cards/card1.jpg'; ?>)">
					<div class="card-contents">
						<h1 class="caption">About</h1>
					</div>
				</a>
				
				<a href="/news" class="home-card" style="background-image: url(<?php echo get_template_directory_uri() . '/images/cards/card2.jpg'; ?>)">
					<div class="card-contents">
						<h1 class="caption">News</h1>
					</div>
				</a>
				
				<a href="/volunteer" class="home-card" style="background-image: url(<?php echo get_template_directory_uri() . '/images/cards/card3.jpg'; ?>)">
					<div class="card-contents">
						<h1 class="caption">Volunteer</h1>
					</div>
				</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>