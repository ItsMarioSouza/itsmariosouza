<?php

	/**
	 * Remove the 'Protected:' text from posts titles
	 *
	 * https://codex.wordpress.org/Using_Password_Protection
	 * https://developer.wordpress.org/reference/classes/wp_rest_posts_controller/protected_title_format/
	 */
	function remove_protected_text() {
		return __('%s');
	}
	add_filter('protected_title_format', 'remove_protected_text');



	/**
	 * Disable password protection for Logged in users
	 *
	 * https://wordpress.stackexchange.com/questions/267952/disable-password-protected-page-for-logged-users
	 * https://codex.wordpress.org/Function_Reference/current_user_can
	 */
	function password_protection_bypass($returned, $post) {
		if( $returned && current_user_can('manage_options') ) {
			$returned = false;
		}

		return $returned;
	}
	add_filter('post_password_required', 'password_protection_bypass', 10, 2);



	/**
	 * Customize password protection content w/ error message
	 *
	 * https://codex.wordpress.org/Using_Password_Protection
	 * https://stackoverflow.com/questions/42593216/check-if-wordpress-password-protect-cookie-exists
	**/
	function my_password_form() {
		global $post;

		// Variables
		$id = 'pwbox-'.( empty( $post->ID ) ? rand() : $post->ID );
		$label = esc_html__( 'Password:' );
		$message = get_field('password_intro_copy_acf', 'option');
		$submit = get_field('button_text_acf', 'option');

		// Error Message
		if(isset($_COOKIE)){
			foreach($_COOKIE as $key=>$val) {
				if(strpos($key,'wp-postpass_') === false) {
					$errorCopy = '';
				} else {
					$errorCopy = get_field('password_error_message_acf', 'option');
				}
			}
		}

		// Intro
		$intro = '<p>' . $message . '</p>';

		// Form
		$form ='<form class="form form--password" action="' . esc_url( site_url('wp-login.php?action=postpass', 'login_post') ) . '" method="post"><label class="hidden" for="' . $id . '">' . $label . '</label><input name="post_password" id="' . $id . '" type="password" placeholder="Password" /><button class="button" type="submit" name="Submit">' . $submit . '</button><p aria-live="polite" class="errorMessage">' . $errorCopy  . '</p></form>';

		//Sections
		$sectionOpen = '<section>';
		$sectionClose = '</section>';

		// return $intro . $form;
		// return  $sectionOpen . $intro . $form . $sectionClose;
		return  '<section>' . $intro . $form . '</section>';
	}
	add_filter( 'the_password_form', 'my_password_form' );

?>
