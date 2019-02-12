<section>
	<form action="<?php echo site_url() ?>/wp-admin/admin-ajax.php" method="POST" id="filter">
		<?php if( $terms = get_terms( array( 'taxonomy' => 'category', 'orderby' => 'name' ) ) ) : ?>
			<select name="categoryfilter">
				<option value="">Select category...</option>
				<?php foreach ( $terms as $term ) :
					echo '<option value="' . $term->term_id . '">' . $term->name . '</option>'; // ID of the category as the value of an option
				endforeach; ?>
			</select>
		<?php endif; ?>
		<button>Apply filter</button>
		<input type="hidden" name="action" value="myfilter">
	</form>
	<div id="response"></div>
</section>