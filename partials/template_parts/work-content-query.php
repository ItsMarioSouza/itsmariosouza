<?php
	if(isset($_GET['category'])) {
		$args = array(
			'post_type' 	=> 'post',
			'post_status' 	=> 'publish',
			'meta_key' 		=> 'posts_order_acf',
			'orderby' 		=> 'meta_value date',
			'order' 		=> 'DESC',
			'category_name' => $_GET['category']
			// 'cat' 			=> $_GET['category']
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