<?php
/**
 * The template for displaying the group directory.
 *
 * This is the template that displays the group directory by default.
 *
 * @link https://codex.buddypress.org/themes/theme-compatibility-1-7/template-hierarchy/
 *
 * @package Alumni
 */

get_header(); ?>

Group directory

<?php if ( bp_has_groups() ) : ?>
 
    <div class="pagination">
 
        <div class="pag-count" id="group-dir-count">
            <?php bp_groups_pagination_count() ?>
        </div>
 
        <div class="pagination-links" id="group-dir-pag">
            <?php bp_groups_pagination_links() ?>
        </div>
 
    </div>
 
    <ul id="groups-list" class="item-list">
    <?php while ( bp_groups() ) : bp_the_group(); ?>
 
        <li>
            <div class="item-avatar">
                <a href="<?php bp_group_permalink() ?>"><?php bp_group_avatar( 'type=thumb&width=50&height=50' ) ?></a>
            </div>
 
            <div class="item">
                <div class="item-title"><a href="<?php bp_group_permalink() ?>"><?php bp_group_name() ?></a></div>
                <div class="item-meta"><span class="activity"><?php printf( __( 'active %s ago', 'buddypress' ), bp_get_group_last_active() ) ?></span></div>
 
                <div class="item-desc"><?php bp_group_description_excerpt() ?></div>
 
                <?php do_action( 'bp_directory_groups_item' ) ?>
            </div>
 
            <div class="action">
                <?php bp_group_join_button() ?>
 
                <div class="meta">
                    <?php bp_group_type() ?> / <?php bp_group_member_count() ?>
                </div>
 
                <?php do_action( 'bp_directory_groups_actions' ) ?>
            </div>
 
            <div class="clear"></div>
        </li>
 
    <?php endwhile; ?>
    </ul>
 
    <?php do_action( 'bp_after_groups_loop' ) ?>
 
<?php else: ?>
 
    <div id="message" class="info">
        <p><?php _e( 'There were no groups found.', 'buddypress' ) ?></p>
    </div>
 
<?php endif; ?>

<?php get_footer(); ?>