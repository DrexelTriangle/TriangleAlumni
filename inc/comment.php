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
	
    <<?php echo $tag; ?> <?php comment_class( empty( $args['has_children'] ) ? '' : 'parent' ); ?> id="comment-<?php comment_ID() ?>">
	
		<?php if ('div' != $args['style']) : ?>
			<div id="div-comment-<?php comment_ID() ?>" class="comment-body">
		<?php endif; ?>
	
		<div class="comment-meta">
			<?php
                /* translators: 1: date, 2: time */
                printf(__('%1$s at %2$s'), get_comment_date(), get_comment_time());
			?>
        </div>
		
        <div class="comment-author vcard">
			<?php 
				if ($args['avatar_size'] != 0)
					echo get_avatar($comment, $args['avatar_size']);
					
				printf(__( '<cite class="fn">%s</cite> <span class="says">says:</span>' ), get_comment_author_link());
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
                            'add_below' => $add_below, 
                            'depth'     => $depth, 
                            'max_depth' => $args['max_depth'] 
                        ) 
                    ) 
                );
			?>
        </div>
	
	<?php if ('div' != $args['style']) : ?>
        </div>
	<?php endif;
}