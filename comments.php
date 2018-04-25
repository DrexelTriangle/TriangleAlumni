<?php
/**
 * The template for displaying comments.
 *
 * This is the template that displays the area of the page that contains both the current comments
 * and the comment form.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package Alumni
 */

/*
 * If the current post is protected by a password and
 * the visitor has not yet entered the password we will
 * return early without loading the comments.
 */
if (post_password_required())
{
	return;
}
?>

<div id="comments" class="comments-area">
	<?php 
		$args = array(
			'comment_field' => '<div class="form-group"><textarea class="form-control" id="comment" name="comment" rows="5" aria-required="true"></textarea></div>',
			'submit_button' => '<input name="%1$s" type="submit" id="%2$s" class="btn btn-primary" value="%4$s" />'
		);
	
		comment_form($args);
	?>

	<?php
	if (have_comments()) : ?>
	
		<?php if (get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-above" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e( 'Comment navigation', 'alumni' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'alumni')); ?></div>
					<div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'alumni')); ?></div>

				</div>
			</nav>
		<?php endif; // Check for comment navigation. ?>

		<div class="comment-list">
			<?php
				wp_list_comments(array(
									'callback' => 'alumni_comment',
									'reverse_top_level' => true,
									'type' => 'all',
								));
			?>
		</div>

		<?php if ( get_comment_pages_count() > 1 && get_option('page_comments')) : // Are there comments to navigate through? ?>
			<nav id="comment-nav-below" class="navigation comment-navigation" role="navigation">
				<h2 class="screen-reader-text"><?php esc_html_e('Comment navigation', 'alumni' ); ?></h2>
				<div class="nav-links">

					<div class="nav-previous"><?php previous_comments_link(esc_html__('Older Comments', 'alumni')); ?></div>
					<div class="nav-next"><?php next_comments_link(esc_html__('Newer Comments', 'alumni')); ?></div>

				</div>
			</nav>
		<?php endif; // Check for comment navigation. ?>

	<?php endif; // Check for have_comments(). ?>

	<?php
		// If comments are closed and there are comments, leave a message
		if (!comments_open() && get_comments_number() && post_type_supports(get_post_type(), 'comments'))
			printf('<p class="no-comments">%1$s</p>', esc_html_e('Comments are closed.', 'alumni'));
	?>
</div>