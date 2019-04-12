<?php
/**
 * @link https://rudrastyh.com/wordpress/ajax-post-filters.html
 * @link https://codex.wordpress.org/Class_Reference/WP_Query
 * @link https://www.smashingmagazine.com/2011/10/how-to-use-ajax-in-wordpress/
 */


function filterPosts() {
	if( isset( $_POST['categoryfilter'] ) ) {
		if ($_POST['categoryfilter'] !== 'all') {
			$args = array(
				'post_type' 	=> 'post',
				'post_status' 	=> 'publish',
				'meta_key' 		=> 'posts_order_acf',
				'orderby' 		=> 'meta_value date',
				'order' 		=> 'DESC',
				'cat' 			=> $_POST['categoryfilter']
			);
		} else {
			$args = array(
				'post_type' 	=> 'post',
				'post_status' 	=> 'publish',
				'meta_key' 		=> 'posts_order_acf',
				'orderby' 		=> 'meta_value date',
				'order' 		=> 'DESC',
			);
		}
	}

	$the_query = new WP_Query($args);

	if ( $the_query->have_posts() ) {
		while ( $the_query->have_posts() ) {
			$the_query->the_post();
			get_template_part('/partials/template_parts/work-content-posts');
		}
	} else {
		get_template_part('/partials/template_parts/work-content-no-posts');
	}

	wp_reset_postdata();

	die();
}

add_action('wp_ajax_myfilter', 'filterPosts');
add_action('wp_ajax_nopriv_myfilter', 'filterPosts');