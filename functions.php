<?php

	/**
	 * Custom Styles + Scipts
	 *
	 * https://code.tutsplus.com/articles/how-to-include-javascript-and-css-in-your-wordpress-themes-and-plugins--wp-24321
	 */
	 function load_my_scripts() {
 		// Register AOS CSS
 		wp_enqueue_style( 'aos-css', get_template_directory_uri() . '/ux/vendor/aos.css', array(), null, 'screen' );
 		wp_enqueue_style( 'aos-css' );

 		// Register Main CSS
 		wp_enqueue_style( 'main-css', get_template_directory_uri() . '/ux/css/styles.min.css', array(), null, 'screen' );

		// Register Font Awesome JS
		// wp_enqueue_script('font-awesome-js', get_template_directory_uri() . '/ux/vendor/fontawesome-all.min.js', array('jquery'), null, true);

		// Register AOS JS
		wp_enqueue_script('aos-js', get_template_directory_uri() . '/ux/vendor/aos.js', array(), null, true);

		// Register Main JS
		wp_enqueue_script('main-js', get_template_directory_uri() . '/ux/js/main.min.js', array('jquery'), null, true);
	}
	add_action('wp_enqueue_scripts', 'load_my_scripts');



	/**
	 * Register Menu
	 *
	 * https://codex.wordpress.org/Navigation_Menus#Display_Menus_on_Theme
	 */
	function register_my_menu() {
	  register_nav_menu( 'global-nav',__('Global Nav') );
	}
	add_action('init', 'register_my_menu');



	/**
	 * Add an options/styguide
	 *
	 * https://www.advancedcustomfields.com/resources/options-page/
	 */
	 if( function_exists('acf_add_options_page') ) {
		acf_add_options_page(array(
			'page_title'	=> 'Theme General Settings',
			'menu_title'	=> 'Theme Settings',
			'menu_slug' 	=> 'theme-general-settings',
			'capability'	=> 'edit_posts',
			'redirect'		=> false
		));

		acf_add_options_sub_page(array(
			'page_title'	=> 'Theme Header Settings',
			'menu_title'	=> 'Header',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title'	=> 'Theme Footer Settings',
			'menu_title'	=> 'Footer',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title'	=> 'Theme Posts Settings',
			'menu_title'	=> 'Posts',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title'	=> 'Theme 404 Error Settings',
			'menu_title'	=> '404 Error',
			'parent_slug'	=> 'theme-general-settings',
		));

		acf_add_options_sub_page(array(
			'page_title'	=> 'Theme Password Protect Settings',
			'menu_title'	=> 'Password Protect',
			'parent_slug'	=> 'theme-general-settings',
		));
	}



	/**
	 * Add admin columns to all posts
	 *
	 * https://catapultthemes.com/add-acf-fields-to-admin-columns/
	 */

	// Add column: https://codex.wordpress.org/Plugin_API/Filter_Reference/manage_posts_columns
	function add_acf_columns($columns) {
		return array_merge( $columns, array(
				'posts_order_acf' => __( 'Order No.' )
		) );
	}
	add_filter ('manage_posts_columns', 'add_acf_columns');

	// Get data https://codex.wordpress.org/Plugin_API/Action_Reference/manage_posts_custom_column
	function posts_custom_column($column, $post_id) {
		switch ( $column ) {
		case 'posts_order_acf':
			echo get_post_meta ( $post_id, 'posts_order_acf', true );
			break;
		}
	}
	add_action('manage_posts_custom_column', 'posts_custom_column', 10, 2);



	/**
	 * Get Password protection customizations
	 */
	get_template_part('/partials/function_parts/password-protection');

?>
