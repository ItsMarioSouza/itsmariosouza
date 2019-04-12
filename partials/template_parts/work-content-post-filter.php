<?php
	if($terms = get_terms(array(
		'taxonomy' => 'category',
		'orderby' => 'name',
		'exclude' => 1
	))) :
?>

	<form class="grid__filter" method="POST" id="filter">
		<span class="grid__filter-label">Filter By: </span>

		<label for="all" class="active">All</label>
		<input type="radio" name="categoryfilter" value="all" id="all">

		<?php foreach ($terms as $term) {
			echo '<label for="' . $term->term_id . '">' . $term->name . '</label> ';
			echo '<input type="radio" name="categoryfilter" value="' . $term->term_id . '" id="' . $term->term_id . '"> ';
		} ?>

		<input type="hidden" name="action" value="myfilter" aria-hidden="true">
	</form>

<?php endif; ?>
