<?php
/**
 * Month View Template
 * The wrapper template for month view.
 *
 * This file is used to override the default template found in /wp-content/plugins/the-events-calendar/src/views/month.php
 *
 * @package Alumni
 *
 */

if ( ! defined( 'ABSPATH' ) ) {
	die( '-1' );
} ?>

<?php

do_action( 'tribe_events_before_template' );

// Main Events Content
tribe_get_template_part( 'month/content' );

do_action( 'tribe_events_after_template' );

?>