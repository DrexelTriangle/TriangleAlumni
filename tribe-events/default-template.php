<?php
/**
 * Default Events Template
 * This file is the basic wrapper template for all the views if 'Default Events Template'
 * is selected in Events -> Settings -> Template -> Events Template.
 *
 * This file is used to override the default template found in /wp-content/plugins/the-events-calendar/src/views/default-template.php
 *
 * @package Alumni
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
}

get_header();
?>

<?php 
	// Only show the events calendar if the user is logged in
	if (is_user_logged_in()): 
?>

	<?php
		// Tribe Bar
		tribe_get_template_part('modules/bar');
	?>

	<div id="tribe-events-pg-template" class="tribe-events-pg-template">
		<?php tribe_events_before_html(); ?>
		<?php tribe_get_view(); ?>
		<?php tribe_events_after_html(); ?>
	</div>
	
<?php 
	// If the user is not logged in, display a message
	else: 
?>

	<div class="generic-container">
		<div class="card card-form">
			<h1>This page is for members only</h1>
			<p>
				The Triangle periodically hosts exclusive events for the members of its alumni community. If you wish to participate, please consider
				<a href="/join">joining the alumni association</a>. If you've already joined and been verified, 
				please <a href="<?php echo wp_login_url('/events'); ?>">sign in</a> to view the events calendar.
			</p>
		</div>
	</div>

<?php endif; ?>

<?php get_footer(); ?>