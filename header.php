<?php
/**
 * The header for our theme.
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package Alumni
 */

?><!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
	<meta charset="<?php bloginfo( 'charset' ); ?>">
	<meta name="viewport" content="user-scalable=no width=device-width, initial-scale=1">
	<link rel="profile" href="http://gmpg.org/xfn/11">
	<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.9/css/all.css" integrity="sha384-5SOiIsAziJl6AWe0HWRKTXlfcSHKmYV4RBF18PPJ173Kzn7jzMyFuTtk8JA7QQG1" crossorigin="anonymous">
	<?php wp_head(); ?>
</head>

<body>

<header role="banner">
		<!-- Toolbar -->
		<nav class="navbar navbar-expand-md navbar-toolbar" id="toolbar">
			<div class="collapse navbar-collapse justify-content-start">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link">Network:</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="https://thetriangle.org">The Triangle</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="http://therectangle.org">The Rectangle</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Archives</a>
					</li>
				</ul>
			</div>
			
			<div class="collapse navbar-collapse justify-content-end">
				<ul class="navbar-nav">				
					<?php
						if (is_user_logged_in())
						{
							$id = bp_loggedin_user_id();
							
							printf('<li class="nav-item">');
							printf('<a class="nav-link" href="/members/%1$s">Howdy, %2$s</a>', bp_core_get_username($id), bp_core_get_user_displayname($id));
							printf('</li>');
							
							printf('<li class="nav-item">');
							printf('<a class="nav-link" href="#">|</a>');
							printf('</li>');
							
							printf('<li class="nav-item">');
							printf('<a class="nav-link" href="%1$s">Sign Out</a>', wp_logout_url('/'));
							printf('</li>');
						}
						else
						{
							printf('<li class="nav-item">');
							printf('<a class="nav-link" href="%1$s">Sign In</a>', wp_login_url('/'));
							printf('</li>');
						}
					?>
				</ul>
			</div>
		</nav>
		
		<!-- Main Menu -->
		<nav class="navbar navbar-expand-md navbar-main" id="mainmenu" role="navigation">			
			<a class="navbar-brand" id="triangle-logo" href="<?php echo esc_url(home_url('/')); ?>" rel="home">
				<img src="<?php echo get_template_directory_uri() . '/images/logo-black.svg'; ?>" alt="Triangle Alumni"></img>
			</a>
			
			<button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#main-content" aria-controls="main-content" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			
			<div class="collapse navbar-collapse justify-content-end" id="main-content">
				<ul class="navbar-nav">
					<li class="nav-item">
						<a class="nav-link" href="/">Home</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/about">About</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="/news">News</a>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-members" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Member Center</a>
						<div class="dropdown-menu" aria-labelledby="dropdown-members">
							<a href="/members" class="dropdown-item">Member Directory</a>
							<a href="/events" class="dropdown-item">Events Calendar</a>
							<a href="<?php echo bp_loggedin_user_domain() . 'profile/edit/'; ?>" class="dropdown-item">Manage Account</a>
						</div>
					</li>
					<li class="nav-item dropdown">
						<a class="nav-link dropdown-toggle" href="#" id="dropdown-members" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">Get Involved</a>
						<div class="dropdown-menu" aria-labelledby="dropdown-members">
							<a href="/join" class="dropdown-item">Alumni Association</a>
							<a href="/back-issues" class="dropdown-item">Donate Back-Issues</a>
						</div>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="#">Contact</a>
					</li>
				</ul>
			</div>
		</nav>
</header>