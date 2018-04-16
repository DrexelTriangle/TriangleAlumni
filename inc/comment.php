<?php
/**
 * Custom comment for callback function.
 *
 * @package Alumni
 */
 
function alumni_comment($comment, $args, $depth)
{
    if ('div' === $args['style'])
	{
        $tag       = 'div';
        $add_below = 'comment';
    }
	else 
	{
        $tag       = 'li';
        $add_below = 'div-comment';
    }
?>
	
	<!--<<php echo $tag; ?> <php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<php comment_ID() ?>">-->

	<div id="div-comment-<?php comment_ID() ?>" class="media mb-4">
		
		<?php			
			if ($args['avatar_size'] != 0)
				echo get_avatar($comment, 50, $default, $alt, array('class' => array('d-flex', 'mr-3', 'rounded-circle')));
		?>
	
		<div class="media-body">
			<div class="comment-meta">
				<?php
					printf('%1$s %2$s ago', get_comment_author_link(), human_time_diff(get_comment_date('U'), current_time('timestamp')));
				?>
			</div>
			
			<?php 
				if ($comment->comment_approved == '0')
					printf('<em class="comment-awaiting-moderation">%1$s</em><br/>', _e('Your comment is awaiting moderation.'));
			?>

			<?php comment_text(); ?>

			<div class="reply">
				<?php 
					comment_reply_link(
						array_merge( 
							$args, 
							array( 
								'add_below'  => $add_below, 
								'reply_text' => '<i class="fas fa-reply" style="font-size: 12px;"></i> Reply',
								'depth'      => $depth, 
								'max_depth'  => $args['max_depth'] 
							) 
						) 
					);
				?>
			</div>
		</div>
	</div>
<?php
}
?>