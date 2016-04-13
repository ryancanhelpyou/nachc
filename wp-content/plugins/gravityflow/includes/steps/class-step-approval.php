<?php
/**
 * Gravity Flow Step Approval
 *
 *
 * @package     GravityFlow
 * @subpackage  Classes/Gravity_Flow_Step_Approval
 * @copyright   Copyright (c) 2015, Steven Henty
 * @license     http://opensource.org/licenses/gpl-2.0.php GNU Public License
 * @since       1.0
 */


if ( ! class_exists( 'GFForms' ) ) {
	die();
}

class Gravity_Flow_Step_Approval extends Gravity_Flow_Step {
	public $_step_type = 'approval';

	public function get_status_config() {
		return array(
			array(
				'status' => 'rejected',
				'status_label' => __( 'Rejected', 'gravityflow' ),
				'destination_setting_label' => esc_html__( 'Next step if Rejected', 'gravityflow' ),
				'default_destination' => 'complete',
			),
			array(
				'status' => 'approved',
				'status_label' => __( 'Approved', 'gravityflow' ),
				'destination_setting_label' => __( 'Next Step if Approved', 'gravityflow' ),
				'default_destination' => 'next',
			),
		);
	}

	public function supports_expiration() {
		return true;
	}

	public function get_label() {
		return esc_html__( 'Approval', 'gravityflow' );
	}

	public function get_icon_url() {
		return '<i class="fa fa-check" style="color:darkgreen;"></i>';
	}


	public function get_settings() {

		$account_choices = gravity_flow()->get_users_as_choices();

		$type_field_choices = array(
			array( 'label' => __( 'Select', 'gravityflow' ), 'value' => 'select' ),
			array( 'label' => __( 'Conditional Routing', 'gravityflow' ), 'value' => 'routing' ),
		);


		$assignee_notification_fields = array(
			array(
				'name'    => 'assignee_notification_enabled',
				'label'   => '',
				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label'         => __( 'Send Email to the assignee(s).', 'gravityflow' ),
						'tooltip'   => __( 'Enable this setting to send email to each of the assignees as soon as the entry has been assigned. If a role is configured to receive emails then all the users with that role will receive the email.', 'gravityflow' ),
						'name'          => 'assignee_notification_enabled',
						'default_value' => false,
					),
				),
			),
			array(
				'name'  => 'assignee_notification_from_name',
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'From Name', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'assignee_notification_from_email',
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'From Email', 'gravityflow' ),
				'type'  => 'text',
				'default_value' => '{admin_email}',
			),
			array(
				'name'  => 'assignee_notification_reply_to',
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'Reply To', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'assignee_notification_bcc',
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'BCC', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'assignee_notification_subject',
				'class' => 'large fieldwidth-1 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'Subject', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'assignee_notification_message',
				'label' => __( 'Message to Assignee(s)', 'gravityflow' ),
				'type'  => 'visual_editor',
				'default_value' => __( 'A new entry is pending your approval. Please check your Workflow Inbox.', 'gravityflow' ),
			),
			array(
				'name'    => 'assignee_notification_autoformat',
				'label'   => '',
				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label'         => __( 'Disable auto-formatting', 'gravityflow' ),
						'name'          => 'assignee_notification_disable_autoformat',
						'default_value' => false,
						'tooltip'       => __( 'Disable auto-formatting to prevent paragraph breaks being automatically inserted when using HTML to create the email message.', 'gravityflow' ),

					),
				),
			),
			array(
				'name' => 'resend_assignee_email',
				'label' => '',
				'type' => 'checkbox_and_text',
				'checkbox' => array(
					'label' => __( 'Send reminder', 'gravityflow' ),
				),
				'text' => array(
					'default_value' => 7,
					'before_input' => __( 'Resend the assignee email after', 'gravityflow' ),
					'after_input' => ' ' . __( 'day(s)', 'gravityflow' ),
				),
			),
		);

		$rejection_notification_fields = array(
			array(
				'name'    => 'rejection_notification_enabled',
				'label'   => '',
				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label'         => __( 'Send email when the entry is rejected', 'gravityflow' ),
						'tooltip'   => __( 'Enable this setting to send an email when the entry is rejected.', 'gravityflow' ),
						'name'          => 'rejection_notification_enabled',
						'default_value' => false,
					),
				),
			),
			array(
				'name'    => 'rejection_notification_type',
				'label'   => __( 'Send To', 'gravityflow' ),
				'type'       => 'radio',
				'default_value' => 'select',
				'horizontal' => true,
				'choices'    => $type_field_choices,
			),
			array(
				'id'       => 'rejection_notification_users',
				'name'    => 'rejection_notification_users[]',
				'label'   => __( 'Select User', 'gravityflow' ),
				'size'     => '8',
				'multiple' => 'multiple',
				'type'     => 'select',
				'choices'  => $account_choices,
			),
			array(
				'name'  => 'rejection_notification_routing',
				'label' => __( 'Routing', 'gravityflow' ),
				'type'  => 'user_routing',
			),
			array(
				'name'  => 'rejection_notification_from_name',
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'From Name', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'rejection_notification_from_email',
				'label' => __( 'From Email', 'gravityflow' ),
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'type'  => 'text',
				'default_value' => '{admin_email}',
			),
			array(
				'name'  => 'rejection_notification_reply_to',
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'Reply To', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'rejection_notification_bcc',
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'BCC', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'rejection_notification_subject',
				'class' => 'fieldwidth-1 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'Subject', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'rejection_notification_message',
				'label' => __( 'Message', 'gravityflow' ),
				'type'  => 'visual_editor',
				'default_value' => __( 'Entry {entry_id} has been rejected', 'gravityflow' ),
			),
			array(
				'name'    => 'rejection_notification_autoformat',
				'label'   => '',
				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label'         => __( 'Disable auto-formatting', 'gravityflow' ),
						'name'          => 'rejection_notification_disable_autoformat',
						'default_value' => false,
						'tooltip'       => __( 'Disable auto-formatting to prevent paragraph breaks being automatically inserted when using HTML to create the email message.', 'gravityflow' ),

					),
				),
			),
		);

		$approval_notification_fields = array(
			array(
				'name'    => 'approval_notification_enabled',
				'label'   => '',

				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label'         => __( 'Send email when the entry is approved', 'gravityflow' ),
						'tooltip'   => __( 'Enable this setting to send an email when the entry is approved.', 'gravityflow' ),
						'name'          => 'approval_notification_enabled',
						'default_value' => false,
					),
				),
			),
			array(
				'name'    => 'approval_notification_type',
				'label'   => __( 'Send To', 'gravityflow' ),
				'type'       => 'radio',
				'default_value' => 'select',
				'horizontal' => true,
				'choices'    => $type_field_choices,
			),
			array(
				'id'       => 'approval_notification_users',
				'name'    => 'approval_notification_users[]',
				'label'   => __( 'Select', 'gravityflow' ),
				'size'     => '8',
				'multiple' => 'multiple',
				'type'     => 'select',
				'choices'  => $account_choices,
			),
			array(
				'name'  => 'approval_notification_routing',
				'label' => __( 'Routing', 'gravityflow' ),
				'class' => 'large',
				'type'  => 'user_routing',
			),
			array(
				'name'  => 'approval_notification_from_name',
				'label' => __( 'From Name', 'gravityflow' ),
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'type'  => 'text',
			),
			array(
				'name'  => 'approval_notification_from_email',
				'label' => __( 'From Email', 'gravityflow' ),
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'type'  => 'text',
				'default_value' => '{admin_email}',
			),
			array(
				'name'  => 'approval_notification_reply_to',
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'Reply To', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'approval_notification_bcc',
				'class' => 'fieldwidth-2 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'BCC', 'gravityflow' ),
				'type'  => 'text',
			),
			array(
				'name'  => 'approval_notification_subject',
				'class' => 'fieldwidth-1 merge-tag-support mt-hide_all_fields mt-position-right ui-autocomplete-input',
				'label' => __( 'Subject', 'gravityflow' ),
				'type'  => 'text',

			),
			array(
				'name'  => 'approval_notification_message',
				'label' => __( 'Approval Message', 'gravityflow' ),
				'type'  => 'visual_editor',
				'default_value' => __( 'Entry {entry_id} has been approved', 'gravityflow' ),
			),
			array(
				'name'    => 'approval_notification_autoformat',
				'label'   => '',
				'type'    => 'checkbox',
				'choices' => array(
					array(
						'label'         => __( 'Disable auto-formatting', 'gravityflow' ),
						'name'          => 'approval_notification_disable_autoformat',
						'default_value' => false,
						'tooltip'       => __( 'Disable auto-formatting to prevent paragraph breaks being automatically inserted when using HTML to create the email message.', 'gravityflow' ),
					),
				),
			),
		);


		// Support for Gravity PDF 4
		if ( defined( 'PDF_EXTENDED_VERSION' ) && version_compare( PDF_EXTENDED_VERSION, '4.0-RC2', '>=' ) ) {

			$form_id    = $this->get_form_id();
			$gpdf_feeds = GPDFAPI::get_form_pdfs( $form_id );

			if ( ! is_wp_error( $gpdf_feeds ) ) {

				/* Format the PDFs in the appropriate format for use in a select field */
				$gpdf_choices = array();
				foreach ( $gpdf_feeds as $gpdf_feed ) {
					$gpdf_choices[] = array( 'label' => $gpdf_feed['name'], 'value' => $gpdf_feed['id'] );
				}

				/* Create a select box for the Gravity PDFs */
				$pdf_setting = array(
					'name'     => 'assignee_notification_gpdf',
					'label'    => '',
					'type'     => 'checkbox_and_select',
					'checkbox' => array(
						'label' => esc_html__( 'Attach PDF', 'gravityflow' ),
					),
					'select'   => array(
						'choices' => $gpdf_choices,
					),
				);

				/* Include PDF select box in assignee notification settings */
				$assignee_notification_fields[]  = $pdf_setting;

				/* Include PDF select box in rejection notification settings */
				$pdf_setting['name']             = 'rejection_notification_gpdf';
				$rejection_notification_fields[] = $pdf_setting;

				/* Include PDF select box in aproval notification settings */
				$pdf_setting['name']             = 'approval_notification_gpdf';
				$approval_notification_fields[]  = $pdf_setting;
			}
		}

		$settings = array(
			'title'  => esc_html__( 'Approval', 'gravityflow' ),
			'fields' => array(
				array(
					'name'       => 'type',
					'label'      => __( 'Assign To:', 'gravityflow' ),
					'type'       => 'radio',
					'default_value' => 'select',
					'horizontal' => true,
					'choices'    => $type_field_choices,
				),
				array(
					'id'       => 'assignees',
					'name'     => 'assignees[]',
					'tooltip'   => __( 'Users and roles fields will appear in this list. If the form contains any assignee fields they will also appear here. Click on an item to select it. The selected items will appear on the right. If you select a role then anybody from that role can approve.', 'gravityflow' ),
					'size'     => '8',
					'multiple' => 'multiple',
					'label'    => esc_html__( 'Select Assignees', 'gravityflow' ),
					'type'     => 'select',
					'choices'  => $account_choices,
				),
				array(
					'name'  => 'routing',
					'tooltip'   => __( 'Build assignee routing rules by adding conditions. Users and roles fields will appear in the first drop-down field. If the form contains any assignee fields they will also appear here. Select the assignee and define the condition for that assignee. Add as many routing rules as you need.', 'gravityflow' ),
					'label' => __( 'Routing', 'gravityflow' ),
					'type'  => 'routing',
				),
				array(
					'name'     => 'unanimous_approval',
					'label'    => __( 'Approval Policy', 'gravityflow' ),
					'tooltip'   => __( 'Define how approvals should be processed. If all assignees must approve then the entry will require unanimous approval before the step can be completed. If the step is assigned to a role only one user in that role needs to approve.', 'gravityflow' ),
					'type'     => 'radio',
					'default_value' => false,
					'choices' => array(
						array(
							'label' => __( 'At least one assignee must approve', 'gravityflow' ),
							'value' => false,
						),
						array(
							'label' => __( 'All assignees must approve', 'gravityflow' ),
							'value' => true,
						),
					),
				),
				array(
					'name'  => 'instructions',
					'label' => __( 'Instructions', 'gravityflow' ),
					'type'  => 'checkbox_and_textarea',
					'tooltip' => esc_html__( 'Activate this setting to display instructions to the user for the current step.', 'gravityflow' ),
					'checkbox' => array(
						'label' => esc_html__( 'Display instructions', 'gravityflow' ),
					),
					'textarea'  => array(
						'use_editor' => true,
						'default_value' => esc_html__( 'Instructions: please review the values in the fields below and click on the Approve or Reject button', 'gravityflow' ),
					),
				),
				array(
					'name'     => 'display_fields',
					'label'    => __( 'Display Fields', 'gravityflow' ),
					'tooltip'   => __( 'Select the fields to hide or display.', 'gravityflow' ),
					'type'     => 'display_fields',
				),
				array(
					'name' => 'notification_tabs',
					'label' => __( 'Emails', 'gravityflow' ),
					'tooltip'   => __( 'Configure the emails that should be sent for this step.', 'gravityflow' ),
					'type' => 'tabs',
					'tabs' => array(
						array(
							'label'  => __( 'Assignee Email', 'gravityflow' ),
							'id' => 'tab_assignee_notification',
							'fields' => $assignee_notification_fields,
						),
						array(
							'label' => __( 'Rejection Email', 'gravityflow' ),
							'id' => 'tab_rejection_notification',
							'fields' => $rejection_notification_fields,
						),
						array(
							'label' => __( 'Approval Email', 'gravityflow' ),
							'id' => 'tab_approval_notification',
							'fields' => $approval_notification_fields,
						),
					),
				),
			),
		);

		$revert_field = array();
		$form_id = $this->get_form_id();
		$steps = gravity_flow()->get_steps( $form_id );
		foreach ( $steps as $step ) {
			if ( $step->get_type() === 'user_input' ) {
				$user_input_step_choices[] = array( 'label' => $step->get_name(), 'value' => $step->get_id() );
			}
		}

		if ( ! empty( $user_input_step_choices ) ) {
			$revert_field = array(
				'name' => 'revert',
				'label' => esc_html__( 'Revert to User Input step', 'gravityflow' ),
				'type' => 'checkbox_and_select',
				'tooltip' => esc_html__( 'The Revert setting enables a third option in addition to Approve and Reject which allows the assignee to send the entry directly to a User Input step without changing the status. Enable this setting to show the Revert button next to the Approve and Reject buttons and specify the User Input step the entry will be sent to.', 'gravityflow' ),
				'checkbox' => array(
					'label' => esc_html__( 'Enable', 'gravityflow' ),
				),
				'select' => array(
					'choices' => $user_input_step_choices,
				),
			);
		}

		$note_mode_setting = array(
			'name' => 'note_mode',
			'label' => esc_html__( 'Workflow Note', 'gravityflow' ),
			'type' => 'select',
			'tooltip' => esc_html__( 'The text entered in the Note box will be added to the timeline. Use this setting to select the options for the Note box.', 'gravityflow' ),
			'default_value' => 'not_required',
			'choices' => array(
				array( 'value' => 'hidden', 'label' => esc_html__( 'Hidden', 'gravityflow' ) ),
				array( 'value' => 'not_required', 'label' => esc_html__( 'Not required', 'gravityflow' ) ),
				array( 'value' => 'required','label' => esc_html__( 'Always required', 'gravityflow' ) ),
				array( 'value' => 'required_if_approved', 'label' => esc_html__( 'Required if approved', 'gravityflow' ) ),
				array( 'value' => 'required_if_rejected', 'label' => esc_html__( 'Required if rejected', 'gravityflow' ) ),
			),
		);

		if ( ! empty( $revert_field ) ) {
			$note_mode_setting['choices'][] = array( 'value' => 'required_if_reverted', 'label' => esc_html__( 'Required if reverted', 'gravityflow' ) );
			$note_mode_setting['choices'][] = array( 'value' => 'required_if_reverted_or_rejected', 'label' => esc_html__( 'Required if reverted or rejected', 'gravityflow' ) );
			$settings['fields'][] = $revert_field;
		}

		$settings['fields'][] = $note_mode_setting;

		return $settings;
	}

	public function process() {
		return $this->assign();
	}


	public function get_next_step_id() {
		if ( isset( $this->_next_step_id ) ) {
			return $this->_next_step_id;
		}

		$status = $this->evaluate_status();
		$this->_next_step_id = $status == 'rejected' ? $this->destination_rejected : $this->destination_approved;
		return $this->_next_step_id;
	}

	/**
	 *
	 * @return Gravity_Flow_Assignee[]
	 */
	public function get_assignees() {

		$approvers = array();

		$type = $this->type;

		switch ( $type ) {
			case 'select' :
				if ( is_array( $this->assignees ) ) {
					foreach ( $this->assignees as $assignee_key ) {
						$approvers[] = new Gravity_Flow_Assignee( $assignee_key, $this );
					}
				}
				break;
			case 'routing' :
				$routings = $this->routing;
				if ( is_array( $routings ) ) {
					$entry = $this->get_entry();
					foreach ( $routings as $routing ) {
						$assignee_key = rgar( $routing, 'assignee' );
						if ( in_array( $assignee_key, $approvers ) ) {
							continue;
						}
						if ( $entry ) {
							if ( $this->evaluate_routing_rule( $routing ) ) {
								$approvers[] = new Gravity_Flow_Assignee( $assignee_key, $this );
							}
						} else {
							$approvers[] = new Gravity_Flow_Assignee( $assignee_key, $this );
						}
					}
				}

				break;
		}

		return $approvers;
	}

	public function is_complete() {
		$status = $this->evaluate_status();

		return ! in_array( $status, array( 'pending', 'queued' ) );
	}

	public function evaluate_status() {

		if ( $this->is_queued() ) {
			return 'queued';
		}

		if ( $this->is_expired() ) {
			return $this->get_expiration_status_key();
		}

		$approvers = $this->get_assignees();

		$step_status = 'approved';

		foreach ( $approvers as $approver ) {

			$approver_status = $approver->get_status();

			if ( $approver_status == 'rejected' ) {
				$step_status = 'rejected';
				break;
			}
			if ( $this->type == 'select' && ! $this->unanimous_approval ) {
				if ( $approver_status == 'approved' ) {
					$step_status = 'approved';
					break;
				} else {
					$step_status = 'pending';
				}
			} else if ( empty( $approver_status ) || $approver_status == 'pending' ) {
				$step_status = 'pending';
			}
		}

		return $step_status;
	}

	public function is_valid_token( $token ) {

		$token_json = base64_decode( $token );
		$token_array = json_decode( $token_json, true );

		if ( empty( $token_array ) ) {
			return false;
		}

		$timestamp = $token_array['timestamp'];
		$user_id = $token_array['user_id'];
		$new_status = $token_array['new_status'];
		$entry_id = $token_array['entry_id'];
		$sig = $token_array['sig'];


		$expiration_days = apply_filters( 'gravityflow_approval_token_expiration_days', 1 );

		$i = wp_nonce_tick();

		$is_valid = false;

		for ( $n = 1; $n <= $expiration_days; $n++ ) {
			$sig_key = sprintf( '%s|%s|%s|%s|%s|%s', $i, $this->get_id(), $timestamp, $entry_id, $user_id, $new_status );
			$verification_sig     = substr( wp_hash( $sig_key ),  -12, 10 );
			if ( hash_equals( $verification_sig, $sig ) ) {
				$is_valid = true;
				break;
			}
			$i--;
		}
		return $is_valid;
	}

	/**
	 * Handles POSTed values from the workflow detail page.
	 *
	 * @param $form
	 * @param $entry
	 *
	 * @return string|bool|WP_Error Return a success feedback message or a WP_Error instance with an error.
	 */
	public function maybe_process_status_update( $form, $entry ) {

		$feedback = false;
		$step_status_key = 'gravityflow_approval_new_status_step_' . $this->get_id();
		if ( isset( $_REQUEST[ $step_status_key ] ) || isset( $_GET['gflow_token'] ) || $token = gravity_flow()->decode_access_token() ) {
			global $current_user;
			if ( isset( $_POST['_wpnonce'] ) && check_admin_referer( 'gravityflow_approvals_' . $this->get_id() ) ) {
				$new_status = rgpost( $step_status_key );
				$validation = $this->validate_status_update( $new_status, $form );
				if ( is_wp_error( $validation )  ) {
					return $validation;
				}

				if ( $token = gravity_flow()->decode_access_token() ) {
					$assignee = new Gravity_Flow_Assignee( sanitize_text_field( $token['sub'] ), $this );
				} else {
					$assignee = new Gravity_Flow_Assignee( 'user_id|' . $current_user->ID, $this );
				}
			} else {

				$gflow_token = rgget( 'gflow_token' );
				$new_status      = rgget( 'new_status' );

				if ( ! $gflow_token ) {
					return false;
				}

				if ( $gflow_token ) {
					$token_json = base64_decode( $gflow_token );
					$token_array = json_decode( $token_json, true );

					if ( empty( $token_array ) ) {
						return false;
					}

					$new_status = $token_array['new_status'];
					if ( empty( $new_status ) ) {
						return false;
					}
				}

				$valid_token = $this->is_valid_token( $gflow_token );

				if ( ! ( $valid_token ) ) {
					return false;
				}

				$assignee = new Gravity_Flow_Assignee( 'user_id|' . $current_user->ID, $this );
			}

			$feedback = $this->process_assignee_status( $assignee, $new_status, $form );

			$entry = $this->refresh_entry();

			do_action( 'gravityflow_post_status_update_approval', $entry, $assignee, $new_status, $form );

			apply_filters( 'gravityflow_feedback_approval', $feedback, $entry, $assignee, $new_status, $form );

		}
		return $feedback;
	}

	/**
	 * @param Gravity_Flow_Assignee $assignee
	 * @param $new_status
	 * @param $form
	 *
	 * @return bool|string If processed return a message to be displayed to the user.
	 */
	public function process_assignee_status( $assignee, $new_status, $form ) {
		$feedback = false;

		if ( ! in_array( $new_status, array( 'pending', 'approved', 'rejected', 'revert' ) ) ) {
			return $feedback;
		}

		$current_user_status = $assignee->get_status();

		$current_role_status = false;
		$role = false;
		foreach ( gravity_flow()->get_user_roles() as $role ) {
			$current_role_status = $this->get_role_status( $role );
			if ( $current_role_status == 'pending' ) {
				break;
			}
		}

		if ( $current_user_status != 'pending' && $current_role_status != 'pending' ) {
			return esc_html__( 'The status could not be changed because this step has already been processed.', 'gravityflow' );
		}

		if ( $new_status == 'revert' ) {
			if ( $this->revertEnable ) {
				$step = gravity_flow()->get_step( $this->revertValue, $this->get_entry() );
				if ( $step ) {
					$this->end();
					$note      = $this->get_name() . ': ' . esc_html__( 'Reverted to step', 'gravityflow' ) . ' - ' . $step->get_label();
					$user_note = rgpost( 'gravityflow_note' );
					if ( ! empty( $user_note ) ) {
						$note .= sprintf( "\n%s: %s", __( 'Note', 'gravityflow' ), $user_note );
					}
					$this->add_note( $note );
					$step->start();
					$feedback = esc_html__( 'Reverted to step:', 'gravityflow' ) . ' ' . $step->get_label();
				}
			}

			return $feedback;
		}

		if ( $current_user_status == 'pending' ) {
			$assignee->update_status( $new_status );
		}

		if ( $current_role_status == 'pending' ) {
			$this->update_role_status( $role, $new_status );
		}

		$note = '';

		if ( $new_status == 'approved' ) {
			$note = $this->get_name() . ': ' . __( 'Approved.', 'gravityflow' );
		} elseif ( $new_status == 'rejected' ) {
			$note = $this->get_name() . ': ' . __( 'Rejected.', 'gravityflow' );
		}

		if ( ! empty( $note ) ) {
			$user_note = rgpost( 'gravityflow_note' );
			if ( ! empty( $user_note ) ) {
				$note .= sprintf( "\n%s: %s", __( 'Note', 'gravityflow' ), $user_note );
			}
			$user_id = ( $assignee->get_type() == 'user_id' ) ? $assignee->get_id() : 0;
			$this->add_note( $note, $user_id, $assignee->get_display_name() );
		}

		$status = $this->evaluate_status();
		$this->update_step_status( $status );
		$entry = $this->refresh_entry();

		switch ( $new_status ) {
			case 'approved':
				$feedback = __( 'Entry Approved', 'gravityflow' );
				break;
			case 'rejected':
				$feedback = __( 'Entry Rejected', 'gravityflow' );
				break;
		}

		return $feedback;
	}


	public function validate_status_update( $new_status, $form ) {
		$valid = true;
		$note = rgpost( 'gravityflow_note' );
		switch ( $this->note_mode ) {
			case 'required' :
				$valid = ! empty( $note );
				break;
			case 'required_if_approved' :
				if ( $new_status == 'approved' && empty( $note ) ) {
					$valid = false;
				}
				break;
			case 'required_if_rejected' :
				if ( $new_status == 'rejected' && empty( $note ) ) {
					$valid = false;
				}
				break;
			case 'required_if_reverted' :
				if ( $new_status == 'revert' && empty( $note ) ) {
					$valid = false;
				}
			case 'required_if_reverted_or_rejected' :
				if ( ( $new_status == 'revert' || $new_status == 'rejected' ) && empty( $note ) ) {
					$valid = false;
				}
		}


		if ( ! $valid ) {
			$form['failed_validation'] = true;
			$form['workflow_note'] = array( 'failed_validation' => true, 'validation_message' => esc_html__( 'A note is required' ) );
		}

		$validation_result = array(
			'is_valid' => $valid,
			'form' => $form,
		);

		$validation_result = apply_filters( 'gravityflow_validation_approval', $validation_result, $this );

		if ( is_wp_error( $validation_result ) ) {
			return $validation_result;
		}

		if ( ! $validation_result['is_valid'] ) {
			$valid = new WP_Error( 'validation_result', esc_html__( 'There was a problem while updating the form.', 'gravityflow' ), $validation_result );
		}

		return $valid;
	}

	public function workflow_detail_status_box( $form ) {
		$status               = esc_html__( 'Pending Approval', 'gravityflow' );
		$approve_icon         = '<i class="fa fa-check" style="color:green"></i>';
		$reject_icon          = '<i class="fa fa-times" style="color:red"></i>';
		$revert_icon          = '<i class="fa fa-undo" style="color:blue"></i>';
		$approval_step_status = $this->get_status();
		if ( $approval_step_status == 'approved' ) {
			$status = $approve_icon . ' ' . __( 'Approved', 'gravityflow' );
		} elseif ( $approval_step_status == 'rejected' ) {
			$status = $reject_icon . ' ' . __( 'Rejected', 'gravityflow' );
		} elseif ( $approval_step_status == 'queued' ) {
			$status = __( 'Queued', 'gravityflow' );
		}
		?>

		<h4>
			<?php printf( '%s (%s)', $this->get_name(), $status ); ?>
		</h4>
		<div>
			<ul>
				<?php
				$assignees = $this->get_assignees();
				foreach ( $assignees as $assignee ) {
					$user_approval_status = $assignee->get_status();
					$status_label = $this->get_status_label( $user_approval_status );
					if ( ! empty( $user_approval_status ) ) {
						$assignee_type = $assignee->get_type();

						switch ( $assignee_type ) {
							case 'email' :
								$type_label = esc_html__( 'Email', 'gravityflow' );
								$display_name = $assignee->get_id();
								break;
							case 'role' :
								$type_label = esc_html__( 'Role', 'gravityflow' );
								$display_name = translate_user_role( $assignee->get_id() );
								break;
							case 'user_id' :
								$user = get_user_by( 'id', $assignee->get_id() );
								$display_name = $user ? $user->display_name : $assignee->get_id() . ' ' . esc_html__( '(Missing)', 'gravityflow' );
								$type_label = esc_html__( 'User', 'gravityflow' );
								break;
							default :
								$display_name = $assignee->get_id();
								$type_label = $assignee->get_type();
						}
						$assignee_status_label = sprintf( '%s: %s (%s)', $type_label, $display_name,  $status_label );

						$assignee_status_label = apply_filters( 'gravityflow_assignee_status_workflow_detail', $assignee_status_label, $assignee, $this );

						$assignee_status_li = sprintf( '<li>%s</li>', $assignee_status_label );

						echo $assignee_status_li;

					}
				}
				?>
			</ul>
			<div>
				<?php

				$user_approval_status = $this->get_user_status();

				$role_approval_status = false;
				foreach ( gravity_flow()->get_user_roles() as $role ) {
					$role_approval_status = $this->get_role_status( $role );
					if ( $role_approval_status == 'pending' ) {
						break;
					}
				}

				if ( $user_approval_status == 'pending' || $role_approval_status == 'pending' ) {
					wp_nonce_field( 'gravityflow_approvals_' . $this->get_id() );

					if ( $this->note_mode !== 'hidden' ) { ?>
						<br />
						<div>
							<label for="gravityflow-note">
								<?php
								esc_html_e( 'Note', 'gravityflow' );
								$required_indicator = ( $this->note_mode == 'required' ) ? '*' : '';
								printf( "<span class='gfield_required'>%s</span>", $required_indicator );
								?>
							</label>
						</div>
						<textarea id="gravityflow-note" style="width:100%;" rows="4" class="wide" name="gravityflow_note" ><?php
							echo rgar( $form, 'failed_validation' ) ? esc_textarea( rgpost( 'gravityflow_note' ) ) : '';
							?></textarea>
						<?php
						$invalid_note = ( isset( $form['workflow_note'] ) && is_array( $form['workflow_note'] ) && $form['workflow_note']['failed_validation'] );
						if ( $invalid_note ) {
							printf( "<div class='gfield_description validation_message'>%s</div>", $form['workflow_note']['validation_message'] );
						}
					}

					do_action( 'gravityflow_above_approval_buttons', $this, $form );
					?>
					<br /><br />
					<div style="text-align:right;">
						<button name="gravityflow_approval_new_status_step_<?php echo $this->get_id() ?>" value="approved" type="submit"
						        class="button">
							<?php echo $approve_icon; ?> <?php esc_html_e( 'Approve', 'gravityflow' ); ?>
						</button>
						<button name="gravityflow_approval_new_status_step_<?php echo $this->get_id() ?>" value="rejected" type="submit"
						        class="button">
							<?php echo $reject_icon; ?> <?php esc_html_e( 'Reject', 'gravityflow' ); ?>
						</button>
                        <?php if ( $this->revertEnable ) :  ?>
                            <button name="gravityflow_approval_new_status_step_<?php echo $this->get_id() ?>" value="revert" type="submit"
                                    class="button">
                                <?php echo $revert_icon; ?> <?php esc_html_e( 'Revert', 'gravityflow' ); ?>
                            </button>
                            <?php
						endif;
						?>
					</div>
				<?php
				}
				?>
			</div>
		</div>
		<?php

	}

	public function entry_detail_status_box( $form ) {

		$status = $this->evaluate_status();
		?>

		<h4 style="padding:10px;"><?php echo $this->get_name() . ': ' . $status ?></h4>

		<div style="padding:10px;">
			<ul>
				<?php
				$assignees = $this->get_assignees();
				foreach ( $assignees as $assignee ) {
					$user_approval_status = $assignee->get_status();
					if ( ! empty( $user_approval_status ) ) {
						$assignee_type = $assignee->get_type();
						$assignee_id = $assignee->get_id();
						if ( $assignee_type == 'email' ) {
							echo '<li>' . $assignee_id . ': ' . $user_approval_status . '</li>';
							continue;
						}
						if ( $assignee_type == 'role' ) {
							$users = get_users( array( 'role' => $assignee_id ) );
						} else {
							$users = get_users( array( 'include' => array( $assignee_id ) ) );
						}

						foreach ( $users as $user ) {
							echo '<li>' . $user->display_name . ': ' . $user_approval_status . '</li>';
						}
					}
				}

				?>
			</ul>
		</div>
	<?php

	}

	public function send_approval_notification() {

		if ( ! $this->approval_notification_enabled ) {
			return;
		}

		$assignees = array();

		$notification_type = $this->approval_notification_type;

		switch ( $notification_type ) {
			case 'select' :
				if ( is_array( $this->approval_notification_users ) ) {
					foreach ( $this->approval_notification_users as $assignee_key ) {
						$assignees[] = new Gravity_Flow_Assignee( $assignee_key, $this );
					}
				}

				break;
			case 'routing' :
				$routings = $this->approval_notification_routing;
				if ( is_array( $routings ) ) {
					foreach ( $routings as $routing ) {
						if ( $user_is_assignee = $this->evaluate_routing_rule( $routing ) ) {
							$assignees[] = new Gravity_Flow_Assignee( rgar( $routing, 'assignee' ), $this );
						}
					}
				}

				break;
		}

		if ( empty( $assignees ) ) {
			return;
		}

		$notification['workflow_notification_type'] = 'approval';
		$notification['fromName']                   = $this->approval_notification_from_name;
		$notification['from']                       = $this->approval_notification_from_email;
		$notification['replyTo']                    = $this->approval_notification_reply_to;
		$notification['bcc']                        = $this->approval_notification_bcc;
		$notification['subject']                    = $this->approval_notification_subject;
		$notification['message']                    = $this->approval_notification_message;
		$notification['disableAutoformat']          = $this->approval_notification_disable_autoformat;

		if ( defined( 'PDF_EXTENDED_VERSION' ) && version_compare( PDF_EXTENDED_VERSION, '4.0-RC2' , '>=' ) ) {
			if ( $this->approval_notification_gpdfEnable ) {
				$gpdf_id = $this->approval_notification_gpdfValue;
				$notification = $this->gpdf_add_notification_attachment( $notification, $gpdf_id );
			}
		}

		$this->send_notifications( $assignees, $notification );

	}

	public function send_rejection_notification() {

		if ( ! $this->rejection_notification_enabled ) {
			return;
		}

		$assignees = array();

		$notification_type = $this->rejection_notification_type;

		switch ( $notification_type ) {
			case 'select' :
				if ( is_array( $this->rejection_notification_users ) ) {
					foreach ( $this->rejection_notification_users as $assignee_key ) {
						$assignees[] = new Gravity_Flow_Assignee( $assignee_key, $this );
					}
				}
				break;
			case 'routing' :
				$routings = $this->rejection_notification_routing;
				if ( is_array( $routings ) ) {
					foreach ( $routings as $routing ) {
						if ( $user_is_assignee = $this->evaluate_routing_rule( $routing ) ) {
							$assignees[] = new Gravity_Flow_Assignee( rgar( $routing, 'assignee' ), $this );
						}
					}
				}

				break;
		}

		if ( empty( $assignees ) ) {
			return;
		}

		$notification['workflow_notification_type'] = 'rejection';
		$notification['fromName']                   = $this->rejection_notification_from_name;
		$notification['from']                       = $this->rejection_notification_from_email;
		$notification['replyTo']                    = $this->rejection_notification_reply_to;
		$notification['bcc']                        = $this->rejection_notification_bcc;
		$notification['subject']                    = $this->rejection_notification_subject;
		$notification['message']                    = $this->rejection_notification_message;
		$notification['disableAutoformat']          = $this->rejection_notification_disable_autoformat;

		if ( defined( 'PDF_EXTENDED_VERSION' ) && version_compare( PDF_EXTENDED_VERSION, '4.0-RC2', '>=' ) ) {
			if ( $this->rejection_notification_gpdfEnable ) {
				$gpdf_id = $this->rejection_notification_gpdfValue;
				$notification = $this->gpdf_add_notification_attachment( $notification, $gpdf_id );
			}
		}

		$this->send_notifications( $assignees, $notification );

	}

	/**
	 * @param $text
	 * @param Gravity_Flow_Assignee $assignee
	 *
	 * @return mixed
	 */
	public function replace_variables( $text, $assignee ) {
		$text = parent::replace_variables( $text, $assignee );
		$comment = rgpost( 'gravityflow_note' );
		$text = str_replace( '{workflow_note}', $comment, $text );

		$expiration_days = apply_filters( 'gravityflow_approval_token_expiration_days', 2 );

		$expiration_str = '+' . (int) $expiration_days . ' days';

		$expiration_timestamp = strtotime( $expiration_str );

		$scopes = array(
			'pages' => array( 'inbox' ),
			'step_id'    => $this->get_id(),
			'entry_timestamp'  => $this->get_entry_timestamp(),
			'entry_id' => $this->get_entry_id(),
			'action' => 'approve',
		);

		$approve_token = '';

		if ( $assignee ) {
			$approve_token = gravity_flow()->generate_access_token( $assignee, $scopes, $expiration_timestamp );

			$text = str_replace( '{workflow_approve_token}', $approve_token, $text );
		}

		preg_match_all( '/{workflow_approve_url(:(.*?))?}/', $text, $matches, PREG_SET_ORDER );
		if ( is_array( $matches ) ) {
			foreach ( $matches as $match ) {
				$full_tag       = $match[0];
				$options_string = isset( $match[2] ) ? $match[2] : '';
				$options        = shortcode_parse_atts( $options_string );

				$a = shortcode_atts(
					array(
						'page_id' => 'admin',
					), $options
				);

				$approve_url = $this->get_entry_url( $a['page_id'], $assignee, $approve_token );
				$approve_url = esc_url_raw( $approve_url );

				$text = str_replace( $full_tag, $approve_url, $text );
			}
		}

		preg_match_all( '/{workflow_approve_link(:(.*?))?}/', $text, $matches, PREG_SET_ORDER );
		if ( is_array( $matches ) ) {
			foreach ( $matches as $match ) {
				$full_tag       = $match[0];
				$options_string = isset( $match[2] ) ? $match[2] : '';
				$options        = shortcode_parse_atts( $options_string );

				$a = shortcode_atts(
					array(
						'page_id' => 'admin',
						'text' => esc_html__( 'Approve', 'gravityflow' ),
					), $options
				);

				$approve_url = $this->get_entry_url( $a['page_id'], $assignee, $approve_token );
				$approve_url = esc_url_raw( $approve_url );
				$approve_link = sprintf( '<a href="%s">%s</a>', $approve_url, esc_html( $a['text'] ) );
				$text = str_replace( $full_tag, $approve_link, $text );
			}
		}

		$scopes['action'] = 'reject';

		$reject_token = '';

		if ( $assignee ) {
			$reject_token = gravity_flow()->generate_access_token( $assignee, $scopes, $expiration_timestamp );
			$text = str_replace( '{workflow_reject_token}', $reject_token, $text );
		}

		preg_match_all( '/{workflow_reject_url(:(.*?))?}/', $text, $matches, PREG_SET_ORDER );
		if ( is_array( $matches ) ) {
			foreach ( $matches as $match ) {
				$full_tag       = $match[0];
				$options_string = isset( $match[2] ) ? $match[2] : '';
				$options        = shortcode_parse_atts( $options_string );

				$a = shortcode_atts(
					array(
						'page_id' => 'admin',
					), $options
				);

				$reject_url = $this->get_entry_url( $a['page_id'], $assignee, $reject_token );
				$reject_url = esc_url_raw( $reject_url );
				$text = str_replace( $full_tag, $reject_url, $text );
			}
		}

		preg_match_all( '/{workflow_reject_link(:(.*?))?}/', $text, $matches, PREG_SET_ORDER );
		if ( is_array( $matches ) ) {
			foreach ( $matches as $match ) {
				$full_tag       = $match[0];
				$options_string = isset( $match[2] ) ? $match[2] : '';
				$options        = shortcode_parse_atts( $options_string );

				$a = shortcode_atts(
					array(
						'page_id' => 'admin',
						'text' => esc_html__( 'Reject', 'gravityflow' ),
					), $options
				);

				$reject_url = $this->get_entry_url( $a['page_id'], $assignee, $reject_token );
				$reject_url = esc_url_raw( $reject_url );
				$reject_link = sprintf( '<a href="%s">%s</a>', $reject_url, esc_html( $a['text'] ) );
				$text = str_replace( $full_tag, $reject_link, $text );
			}
		}

		return $text;
	}

	/**
	 * Provides a way for a step to process a token action before anything else. If feedback is returned it is displayed and nothing else with be rendered.
	 *
	 * @param $action
	 * @param $token
	 * @param $form
	 * @param $entry
	 *
	 * @return bool|string|void|WP_Error
	 */
	public function maybe_process_token_action( $action, $token, $form, $entry ) {

		$feedback = parent::maybe_process_token_action( $action, $token, $form, $entry );

		if ( $feedback ) {
			return $feedback;
		}

		if ( ! in_array( $action, array( 'approve', 'reject' ) ) ) {
			return false;
		}

		$entry_id = rgars( $token, 'scopes/entry_id' );
		if ( empty( $entry_id ) || $entry_id != $entry['id'] ) {
			return new WP_Error( 'incorrect_entry_id', esc_html__( 'Error: incorrect entry.', 'gravityflow' ) );
		}

		$step_id = rgars( $token, 'scopes/step_id' );
		if ( empty( $step_id ) || $step_id != $this->get_id() ) {
			return new WP_Error( 'step_already_processed', esc_html__( 'Error: step already processed.', 'gravityflow' ) );
		}

		$assignee_key = sanitize_text_field( $token['sub'] );
		$assignee = new Gravity_Flow_Assignee( $assignee_key, $this );
		$new_status = false;
		switch ( $token['scopes']['action'] ) {
			case 'approve' :
				$new_status = 'approved';
				break;
			case 'reject' :
				$new_status = 'rejected';
				break;
		}
		$feedback = $this->process_assignee_status( $assignee , $new_status, $form );

		return $feedback;
	}

	public function end() {
		$status = $this->evaluate_status();
		if ( $status == 'approved' ) {
			$this->send_approval_notification();
		} elseif ( $status == 'rejected' ) {
			$this->send_rejection_notification();
		}
		if ( $status == 'approved' || $status == 'rejected'  ) {
			GFAPI::send_notifications( $this->get_form(), $this->get_entry(), 'workflow_approval' );
		}
		parent::end();
	}
}
Gravity_Flow_Steps::register( new Gravity_Flow_Step_Approval() );
