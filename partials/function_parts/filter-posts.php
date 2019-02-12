<?php

function filterPosts(){
	$args = array(
		'orderby' => 'date', // we will sort posts by date
		'order'	=> $_POST['date'] // ASC or DESC
	);

	if( isset( $_POST['categoryfilter'] ) ) {
		$args['tax_query'] = array(
			array(
				'taxonomy' => 'category',
				'field' => 'id',
				'terms' => $_POST['categoryfilter']
			)
		);
	}

	$query = new WP_Query( $args );

	if( $query->have_posts() ) :
		while( $query->have_posts() ): $query->the_post();
			get_template_part('/partials/function_parts/post-part');
		endwhile;
		wp_reset_postdata();
	else :
		echo 'No posts found';
	endif;

	die();
}

add_action('wp_ajax_myfilter', 'filterPosts');
add_action('wp_ajax_nopriv_myfilter', 'filterPosts');

?>