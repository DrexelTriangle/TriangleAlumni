<?php
/**
 * The template for displaying the member directory.
 *
 * This is the template that displays the member directory by default.
 *
 * @link https://codex.buddypress.org/themes/theme-compatibility-1-7/template-hierarchy/
 *
 * @package Alumni
 */

get_header(); ?>

<div class="cover-quarter" style="background-image: url(<?php echo get_template_directory_uri() . '/images/covers/events.jpg'; ?>)">
	Member Directory
</div>

<div class="generic-container">

<div class="row">
	<div class="col-lg-6 col-xs-12">
		<form action="<?php echo bp_search_form_action() ?>" method="post" id="member-search">
			<div class="form-group">
				<label for="search-terms">Search the member directory</label>
				<div class="input-group">						
					<input type="text" class="form-control" id="search-terms" placeholder="Search for..." name="search-terms" value="<?php echo isset($_REQUEST['s']) ? esc_attr($_REQUEST['s']) : ""; ?>" />
					
					<span class="input-group-append">
						<button class="btn btn-primary" type="submit" form="member-search" value="<?php _e('Search', 'commentpress-core') ?>">
							<i class="fas fa-search" style="line-height: inherit"></i>
						</button>
					</span>
				</div>
			</div>
			
			<?php wp_nonce_field('bp_search_form') ?>
		</form>
	</div>
</div>

<?php if (bp_has_members(bp_ajax_querystring('members'))): ?>
	 
	<div id="pag-top" class="pagination">
		<div class="pag-count" id="member-dir-count-top">
			<?php bp_members_pagination_count(); ?>
		</div>

		<div class="pagination-links" id="member-dir-pag-top">
			<?php bp_members_pagination_links(); ?>
		</div>
	</div>
	
	<!--<form action="<php echo bp_search_form_action() ?>" method="post" id="member-search">
		<label for="search-terms" class="accessibly-hidden"><php _e('Search for:', 'commentpress-core'); ?></label>
		<input type="text" id="search-terms" name="search-terms" value="<php echo isset($_REQUEST['s']) ? esc_attr($_REQUEST['s']) : ""; ?>" />

		<php echo bp_search_form_type_select() ?>

		<input type="submit" name="search-submit" id="search-submit" value="<php _e('Search', 'commentpress-core') ?>" />

		<php wp_nonce_field('bp_search_form') ?>
	</form>-->
	 
	<?php do_action( 'bp_before_directory_members_list' ); ?>
	 
	<ul class="directory-list" role="main">

		<?php while ( bp_members() ) : bp_the_member(); ?>
		
		<li class="directory-card">
			<div class="directory-avatar">
				<a href="<?php bp_member_permalink(); ?>"><?php bp_member_avatar(); ?></a>
			</div>
	 
			<div class="directory-biographics">
				<a class="directory-name" href="<?php bp_member_permalink(); ?>"><?php bp_member_name(); ?></a>
 
				<!--<php if ( bp_get_member_latest_update() ) : ?> 
					<span class="update"> <php bp_member_latest_update(); ?></span>	 
				<php endif; ?>-->
	 
				<!--<div class="item-meta"><span class="activity"><php bp_member_last_active(); ?></span></div>-->
		 
				<?php do_action('bp_directory_members_item'); ?>
		 
				<?php
					/***
						* If you want to show specific profile fields here you can,
						* but it'll add an extra query for each member in the loop
						* (only one regardless of the number of fields you show):
						*
						* bp_get_member_profile_data('field=the field name');
					*/
				
					$positions = bp_get_member_profile_data('field=Positions Held');
					$yearJoined = date('Y', strtotime(bp_get_member_profile_data('field=Year Joined The Triangle')));
					$yearLeft = date('Y', strtotime(bp_get_member_profile_data('field=Year Left The Triangle')));
				?>
				
				<div><span><?php echo $positions ?> from <?php echo $yearJoined ?> to <?php echo $yearLeft ?></span></div>
			</div>
	 
			<div class="action"> 
				<?php do_action( 'bp_directory_members_actions' ); ?> 
			</div>
	 
			<div class="clear"></div>
		</li>
	 
		<?php endwhile; ?>
	 
	</ul>
	 
	<?php do_action( 'bp_after_directory_members_list' ); ?>
	 
	<?php bp_member_hidden_fields(); ?>
	 
	<div id="pag-bottom" class="pagination"> 
		<div class="pag-count" id="member-dir-count-bottom"> 
			<?php bp_members_pagination_count(); ?> 
		</div>
	 
		<div class="pagination-links" id="member-dir-pag-bottom"> 
			<?php bp_members_pagination_links(); ?> 
		</div> 
	</div>
	 
<?php else: ?>
	 
		<div id="message" class="info">
			<p><?php _e( "Sorry, no members were found.", 'buddypress' ); ?></p>
		</div>
	 
<?php endif; ?>
</div>

<?php get_footer(); ?>