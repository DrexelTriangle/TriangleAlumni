<?php
/**
 * The template for displaying the member registration.
 *
 * This is the template that displays the member registration by default.
 *
 * @link https://codex.buddypress.org/themes/theme-compatibility-1-7/template-hierarchy/
 *
 * @package Alumni
 */

get_header(); ?>

<div style="background-color: rgb(115, 190, 230); height: auto;">
	&nbsp;
	<div class="card card-form col-xs-12 col-md-5">
		<div class="card-block">
			<h1>Alumni Registration</h1>
			<?php get_template_part('buddypress/members/registration-form'); ?>
		</div>
	</div>
	&nbsp;
</div>

<?php get_footer(); ?>