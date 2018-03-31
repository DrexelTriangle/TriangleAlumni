<?php
/**
 * Class for overwritting default BuddyPress XProfile Textbox output
 *
 * @link https://alumni.thetriangle.org
 *
 * @package Alumni
 */

// Exit if accessed directly.
defined('ABSPATH') || exit;

class Alumni_BP_XProfile_Field_Type_Textbox extends BP_XProfile_Field_Type_Textbox
{
    public function edit_field_html(array $raw_properties = array())
	{		
        // User_id is a special optional parameter that certain other fields
		// types pass to {@link bp_the_profile_field_options()}.
		if (isset($raw_properties['user_id']))
		{
			unset($raw_properties['user_id']);
		}

		$r = bp_parse_args($raw_properties, array(
			'type'  => 'text',
			'value' => bp_get_the_profile_field_edit_value(),
		));
		
		print('<div class="form-group">');
		
		//Print field name label
		$field_input_name = bp_get_the_profile_field_input_name();
		$field_name = bp_get_the_profile_field_name();
		$field_required_label = bp_get_the_profile_field_required_label();
		printf('<label id="%1$s-1">%2$s %3$s</label>', $field_input_name, $field_name, $field_required_label);

		/** This action is documented in bp-xprofile/bp-xprofile-classes */
		do_action(bp_get_the_profile_field_errors_action());
		
		//Print field textbox
		$field_html_elements = $this->get_edit_field_html_elements($r);
		printf('<input class="form-control" %1$s aria-labelledby="%2$s-1" aria-describedby="%3$s-3">', $field_html_elements, $field_input_name, $field_input_name);

		if (bp_get_the_profile_field_description())
		{
			//Print field description
			$field_description = bp_get_the_profile_field_description();
			printf('<p id="%1$s-3">%2$s</p>', $field_input_name, $field_description);
		}
		
		print('</div>');
    }
}

?>