<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alumni
 */

?>

<footer id="colophon" class="footer-wrapper">
	<div class="container col-xs-12 col-md-7">
		<div class="row">
			<div class="footer-logo col-xs-12 col-md-4">
				<a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
					<img src="<?php echo get_template_directory_uri() . '//images/logo-white.svg'; ?>"></img>
				</a>
			</div>
			
			<div class="footer-tagline col-xs-12 col-md-8">
				THE INDEPENDENT STUDENT NEWSPAPER AT DREXEL UNIVERSITY SINCE 1926
			</div>
		</div>
		
		<nav class="row navbar-footer">
				<ul class="navbar-nav">
					<span class="nav-heading">Content Network</span>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://thetriangle.org/">The Triangle</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://therectangle.org/">The Rectangle</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="http://sets.library.drexel.edu/triangle/">Triangle Archives</a>
					</li>
				</ul>
			
				<ul class="navbar-nav">
					<span class="nav-heading">Community</span>
					<li class="nav-item">
						<a class="nav-link" href="/news">News</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/members">Member Directory</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/events">Events Calendar</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/volunteer">Volunteer</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/contact">Contact</a>
					</li>
				</ul>
			
				<ul class="navbar-nav">
					<span class="nav-heading">Stay up to date</span>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.facebook.com/drexeltriangle/">Facebook</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://twitter.com/drexeltriangle">Twitter</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.instagram.com/drexeltriangle/">Instagram</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" target="_blank" href="https://www.youtube.com/user/DrexelTriangle">YouTube</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="">LinkedIn</a>
					</li>
				</ul>
		</nav>
		
		<div class="row">
			<p class="footer-disclaimers">&copy<?php echo date("Y"); ?> The Triangle. All rights are reserved.</p>
		</div>
	</div>
</footer>

<?php wp_footer(); ?>

</body>
</html>
