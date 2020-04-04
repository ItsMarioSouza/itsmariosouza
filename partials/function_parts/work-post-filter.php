<?php
/**
 * @link https://rudrastyh.com/wordpress/ajax-post-filters.html
 * @link https://codex.wordpress.org/Class_Reference/WP_Query
 * @link https://www.smashingmagazine.com/2011/10/how-to-use-ajax-in-wordpress/
 */


function filterPosts() {
	$formMethod = $_GET;
	$getCategoryName = $_GET['category'];

	if(isset($formMethod['category'])) {
		if ($formMethod['category'] !== 'all') {
			$args = array(
				'post_type' 	=> 'post',
				'post_status' 	=> 'publish',
				'meta_key' 		=> 'posts_order_acf',
				'orderby' 		=> 'meta_value date',
				'order' 		=> 'DESC',
				'category_name' => $formMethod['category']
				// 'cat' 			=> $formMethod['category']
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

add_action('wp_ajax_myfilter', 'filterPosts'); //`myfilter` is tied to the hidden HTML form input value
add_action('wp_ajax_nopriv_myfilter', 'filterPosts'); //`FilterPosts` is tied to the PHP function above