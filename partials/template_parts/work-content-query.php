<?php
	$queryString = $_GET['category'];

	if( isset($queryString) && $queryString !== 'all') {
		$args = array(
			'post_type' 	=> 'post',
			'post_status' 	=> 'publish',
			'meta_key' 		=> 'posts_order_acf',
			'orderby' 		=> 'meta_value date',
			'order' 		=> 'DESC',
			'category_name' => $queryString
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