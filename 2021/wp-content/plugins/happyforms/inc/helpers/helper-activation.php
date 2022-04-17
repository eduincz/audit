<?php

function happyforms_free_cleanup() {
	if ( ! happyforms_cleanup_on_deactivation() ) {
		return;
	}

	delete_transient( 'happyforms_review_notice_recommend' );
	delete_option( 'happyforms_modal_dismissed_onboarding' );
	delete_option( 'happyforms_show_powered_by' );
	delete_option( '_happyforms_received_submissions' );
}

add_action( 'happyforms_deactivate', 'happyforms_free_cleanup' );
