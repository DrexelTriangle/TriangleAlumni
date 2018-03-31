<?php
/**
 * The template for displaying all member pages.
 *
 * This is the template that displays all member pages by default.
 *
 * @link https://codex.buddypress.org/themes/theme-compatibility-1-7/template-hierarchy/
 *
 * @package Alumni
 */

get_header(); ?>

<div class="d-flex justify-content-center">
	<div class="profile-container">
		<div class="profile-cover"></div>

		<div class="profile-photo">
			<div class="img-thumbnail" id="item-header-avatar">
				<a href="<?php bp_displayed_user_link(); ?>">
					<?php bp_displayed_user_avatar('type=full'); ?>
				</a>
			</div>
		</div>
	</div>
</div>

<?php get_footer(); ?>