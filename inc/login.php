<?php
/**
 * Functions for customizing the login page
 *
 * @link https://thetriangle.org
 *
 * @package Alumni
 */

//Login-Page

function wc_login_scripts()
{
	wp_enqueue_style('alumni-style', get_stylesheet_uri());
	wp_enqueue_script('jquery');
}
add_action('login_enqueue_scripts', 'wc_login_scripts');

function tri_login_logo_url()
{
    return get_bloginfo('url');
}
add_filter('login_headerurl', 'tri_login_logo_url');

function tri_login_logo_title()
{
    return 'The Triangle, Drexel&rsquo;s Independent Student Newspaper';
}
add_filter('login_headertitle', 'tri_login_logo_title');

?>