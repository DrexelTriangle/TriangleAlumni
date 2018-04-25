<form action="<?php echo bp_get_signup_page();?>" name="signup_form" id="signup_form" method="post" enctype="multipart/form-data">

    <?php if ('registration-disabled' == bp_get_current_signup_step()) : ?>
		<?php do_action('template_notices'); ?>
		<?php do_action('bp_before_registration_disabled'); ?>

			<p>User registration is currently not allowed.</p>

		<?php do_action('bp_after_registration_disabled'); ?>
    <?php endif; // registration-disabled signup step ?>
	
 
    <?php if ('request-details' == bp_get_current_signup_step()) : ?>
 
		<?php do_action('template_notices'); ?>

		<p>If you're interested in joining The Triangle Alumni Association, fill out the form below and we\'ll process your request as soon as possible. 
			You will recieve an email from us once your information has been verified.
		</p>

		<?php do_action('bp_before_account_details_fields'); ?>
		
		<?php /***** Basic Account Details ******/ ?>
		<div id="basic-details-section">				
			<h4>Account Details</h4>

			<div class="form-group">
				<label for="signup_username">Username*</label>
				<?php do_action('bp_signup_username_errors'); ?>
				<input type="text" name="signup_username" id="signup_username" class="form-control" value="<?php bp_signup_username_value(); ?>" <?php bp_form_field_attributes('username'); ?>/>
			</div>

			<div class="form-group">
				<label for="signup_email">Email Address*</label>
				<?php do_action('bp_signup_email_errors'); ?>
				<input type="email" name="signup_email" id="signup_email" class="form-control" value="<?php bp_signup_email_value(); ?>" <?php bp_form_field_attributes('email'); ?>/>
			</div>
			
			<div class="form-group">
				<label for="signup_password">Password*</label>
				<?php do_action('bp_signup_password_errors'); ?>
				<input type="password" name="signup_password" id="signup_password" value="" class="form-control" <?php bp_form_field_attributes('password'); ?>/>
				<div id="pass-strength-result"></div>
			</div>

			<div class="form-group">
				<label for="signup_password_confirm">Confirm Password*</label>
				<?php do_action('bp_signup_password_confirm_errors'); ?>
				<input type="password" name="signup_password_confirm" id="signup_password_confirm" value="" class="form-control" <?php bp_form_field_attributes('password'); ?>/>
			</div>

			<?php do_action('bp_account_details_fields'); ?>
		</div>

		<?php do_action('bp_after_account_details_fields'); ?>

		<?php /***** Extra Profile Details ******/ ?>
		<?php if(bp_is_active('xprofile')) : ?>

			<?php do_action('bp_before_signup_profile_fields'); ?>

			<div class="register-section" id="profile-details-section">
				<h4>Profile Details</h4>
				<p><i>Only verified alumni will be able to see this information.</i></p>

				<?php /* Use the profile field loop to render input fields for the 'base' profile field group */ ?>
				<?php if (bp_is_active('xprofile')) : if (bp_has_profile(array('profile_group_id' => 1, 'fetch_field_data' => false))) : while (bp_profile_groups()) : bp_the_profile_group(); ?>

				<?php while (bp_profile_fields()) : bp_the_profile_field(); ?>
					<div <?php bp_field_css_class('form-group'); ?>>

						<?php 
							$field_type = bp_xprofile_create_field_type(bp_get_the_profile_field_type());
							
							$requiredLabel = '';
							
							// Set required label if field is requried
							if(bp_get_the_profile_field_is_required())
								$requiredLabel = '*';								
							
							//Print field name label
							printf('<label id="%1$s-1">%2$s%3$s</label>', bp_get_the_profile_field_input_name(), bp_get_the_profile_field_name(), $requiredLabel);
							
							// Print form input with class dependent on field type
							if(bp_get_the_profile_field_type() == 'textbox' || bp_get_the_profile_field_type() == 'textarea')
								$field_type->edit_field_html($args = array ('class' => 'form-control'));
							else
								$field_type->edit_field_html();
						?>

						<?php
							// For registering user to select visibility of profile fields - not used in our case
							/*do_action('bp_custom_profile_edit_fields_pre_visibility');

							if (bp_current_user_can('bp_xprofile_change_field_visibility')) : ?>
								<p class="field-visibility-settings-toggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
										<?php printf( __( 'This field can be seen by: <span class="current-visibility-level">%s</span>', 'buddypress' ), bp_get_the_profile_field_visibility_level_label() ) ?> <a href="#" class="visibility-toggle-link"><?php _ex( 'Change', 'Change profile field visibility level', 'buddypress' ); ?></a>
								</p>

								<div class="field-visibility-settings" id="field-visibility-settings-<?php bp_the_profile_field_id() ?>">
									<fieldset class="form-group">
										<legend><?php _e('Who can see this field?', 'buddypress') ?></legend>

										<?php bp_profile_visibility_radio_buttons() ?>

									</fieldset>
									<a class="field-visibility-settings-close" href="#"><?php _e('Close', 'buddypress') ?></a>

								</div>
							<?php else : ?>
									<p class="field-visibility-settings-notoggle" id="field-visibility-settings-toggle-<?php bp_the_profile_field_id() ?>">
											<?php printf( __( 'This field can be seen by: <span class="current-visibility-level">%s</span>', 'buddypress' ), bp_get_the_profile_field_visibility_level_label() ) ?>
									</p>
							<?php endif ?>

							<?php do_action('bp_custom_profile_edit_fields'); ?>

							<p class="description"><?php bp_the_profile_field_description(); ?></p>*/
						?>
					</div>
				<?php endwhile; ?>

				<input type="hidden" name="signup_profile_field_ids" id="signup_profile_field_ids" value="<?php bp_the_profile_field_ids(); ?>" />

				<?php endwhile; endif; endif; ?>

				<?php do_action('bp_signup_profile_fields'); ?>
			</div><!-- #profile-details-section -->

			<?php do_action('bp_after_signup_profile_fields'); ?>

		<?php endif; ?>

		<?php if (bp_get_blog_signup_allowed()) : ?>

			<?php do_action( 'bp_before_blog_details_fields' ); ?>

			<?php /***** Blog Creation Details ******/ ?>

			<div class="register-section" id="blog-details-section">

				<h4><?php _e( 'Blog Details', 'buddypress' ); ?></h4>

				<p><input type="checkbox" name="signup_with_blog" id="signup_with_blog" value="1"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes, I\'d like to create a new site', 'buddypress' ); ?></p>

				<div id="blog-details"<?php if ( (int) bp_get_signup_with_blog_value() ) : ?>class="show"<?php endif; ?>>

					<label for="signup_blog_url"><?php _e( 'Blog URL', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
					<?php do_action( 'bp_signup_blog_url_errors' ); ?>

					<?php if ( is_subdomain_install() ) : ?>
							http:// <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" /> .<?php bp_signup_subdomain_base(); ?>
					<?php else : ?>
							<?php echo home_url( '/' ); ?> <input type="text" name="signup_blog_url" id="signup_blog_url" value="<?php bp_signup_blog_url_value(); ?>" />
					<?php endif; ?>

					<label for="signup_blog_title"><?php _e( 'Site Title', 'buddypress' ); ?> <?php _e( '(required)', 'buddypress' ); ?></label>
					<?php do_action( 'bp_signup_blog_title_errors' ); ?>
					<input type="text" name="signup_blog_title" id="signup_blog_title" value="<?php bp_signup_blog_title_value(); ?>" />

					<span class="label"><?php _e( 'I would like my site to appear in search engines, and in public listings around this network.', 'buddypress' ); ?></span>
					<?php do_action( 'bp_signup_blog_privacy_errors' ); ?>

					<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_public" value="public"<?php if ( 'public' == bp_get_signup_blog_privacy_value() || !bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'Yes', 'buddypress' ); ?></label>
					<label><input type="radio" name="signup_blog_privacy" id="signup_blog_privacy_private" value="private"<?php if ( 'private' == bp_get_signup_blog_privacy_value() ) : ?> checked="checked"<?php endif; ?> /> <?php _e( 'No', 'buddypress' ); ?></label>

					<?php do_action( 'bp_blog_details_fields' ); ?>
				</div>
			</div><!-- #blog-details-section -->

			<?php do_action( 'bp_after_blog_details_fields' ); ?>

		<?php endif; ?>

		<?php do_action( 'bp_before_registration_submit_buttons' ); ?>

		<input type="submit" name="signup_submit" id="signup_submit" class="btn btn-primary" value="<?php esc_attr_e('Complete Sign Up', 'buddypress'); ?>" />

		<?php do_action('bp_after_registration_submit_buttons'); ?>

		<?php wp_nonce_field('bp_new_signup'); ?>
 
    <?php endif; // request-details signup step ?>
 
    <?php if ('completed-confirmation' == bp_get_current_signup_step()) : ?>
 
		<?php do_action('template_notices'); ?>
		<?php do_action('bp_before_registration_confirmed'); ?>

		<?php if (bp_registration_needs_activation()) : ?>
				<p>You have successfully submitted your account request! Your account will be activated and you will receive an email once we have verified your information.</p>
		<?php else : ?>
				<p>You have successfully created your account! Please log in using the username and password you have just created.</p>
		<?php endif; ?>

		<?php do_action('bp_after_registration_confirmed'); ?>
 
    <?php endif; // completed-confirmation signup step ?>
 
    <?php do_action('bp_custom_signup_steps'); ?>
 
</form>