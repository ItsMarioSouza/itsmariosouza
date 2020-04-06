<?php
/**
 * @link https://rudrastyh.com/wordpress/ajax-post-filters.html
 * @link https://codex.wordpress.org/Class_Reference/WP_Query
 * @link https://www.smashingmagazine.com/2011/10/how-to-use-ajax-in-wordpress/
 */

function filterPosts() {
	get_template_part('/partials/template_parts/work-content-query');

	die();
}
add_action('wp_ajax_myfilter', 'filterPosts'); //`myfilter` is tied to the hidden HTML form input value
add_action('wp_ajax_nopriv_myfilter', 'filterPosts'); //`FilterPosts` is tied to the PHP function above