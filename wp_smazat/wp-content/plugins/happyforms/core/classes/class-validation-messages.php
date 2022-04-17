<?php

class HappyForms_Validation_Messages {

	/**
	 * The singleton instance.
	 *
	 * @since 1.0
	 *
	 * @var HappyForms_Validation_Messages
	 */
	private static $instance;

	/**
	 * The singleton constructor.
	 *
	 * @return HappyForms_Validation_Messages
	 */
	public static function instance() {
		if ( is_null( self::$instance ) ) {
			self::$instance = new self();
		}

		self::$instance->hook();

		return self::$instance;
	}

	public function hook() {
		add_filter( 'happyforms_part_attributes', array( $this, 'add_accessibility_attributes' ), 10, 4 );
	}

	/**
	 * Adds HTML attributes for better accessibility in case of form returns some errors.
	 *
	 * @hooked filter `happyforms_part_attributes`
	 *
	 * @param array  $attributes Array of attributes.
	 * @param array  $part       Part data.
	 * @param array  $form       Form data.
	 * @param string $component  Component if available.
	 *
	 * @return array Array of attributes.
	 */
	public function add_accessibility_attributes( $attributes, $part, $form, $component ) {
		$part_name = happyforms_get_part_name( $part, $form );
		$errors = happyforms_get_session()->get_messages( $part_name );

		if ( empty( $errors ) ) {
			return $attributes;
		}

		$error_id = "happyforms-error-{$part_name}";
		$error_id = ( $component ) ? "{$error_id}_{$component}" : $error_id;

		$attributes[] = 'aria-invalid="true"';
		$attributes[] = 'aria-describedby="'. $error_id .'"';

		return $attributes;
	}

	public function get_default_messages() {
		$messages = array(
			'field_empty' => __( 'Please fill in this field', 'happyforms' ),
			'field_invalid' => __( 'This is invalid', 'happyforms' ),
			'values_mismatch' => __( 'This doesn\'t match', 'happyforms' ),
			'select_more_choices' => __( 'Please select more choices', 'happyforms' ),
			'select_less_choices' => __( 'Please select fewer choices', 'happyforms' ),
			'message_too_long' => __( 'This message is too long', 'happyforms' ),
			'message_too_short' => __( 'This message is too short', 'happyforms' ),
		);

		return apply_filters( 'happyforms_default_validation_messages', $messages );
	}

	/**
	 * Gets validation message from messages array key. Runs message through the filter which
	 * allows altering the message through code.
	 *
	 * @param string $message_key Array key of the message.
	 *
	 * @return string Empty string on failure (if array key is not found), message ran through the
	 * `happyforms_validation_message filter on success.
	 */
	public function get_message( $message_key ) {
		$default_messages = $this->get_default_messages();
		$message = '';

		if ( ! isset( $default_messages[$message_key] ) ) {
			return $message;
		}

		$message = $default_messages[$message_key];
		$message = apply_filters( 'happyforms_validation_message', $message, $message_key );

		return $message;
	}

}

if ( ! function_exists( 'happyforms_validation_messages' ) ):
/**
 * Get the HappyForms_Validation_Messages class instance.
 *
 * @since 1.0
 *
 * @return HappyForms_Validation_Messages
 */
function happyforms_validation_messages() {
	return HappyForms_Validation_Messages::instance();
}

endif;

/**
 * Initialize the HappyForms_Validation_Messages class immediately.
 */
happyforms_validation_messages();
