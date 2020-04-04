<?php
	if($terms = get_terms(array(
		'taxonomy' => 'category',
		'orderby' => 'name',
		'exclude' => 1
	))) :
?>

	<form id="filter" class="grid__filter" method="GET" autocomplete="on">
		<span class="grid__filter-label">Filter By: </span>

		<label for="all">All</label>
		<input type="radio" name="category" value="all" id="all">

		<?php foreach ($terms as $term) {
			$name = $term->name;
			$id = $term->term_id;

			echo '<label for="' . $id . '">' . $name . '</label> ';
			echo '<input type="radio" name="category" value="' . strtolower($name) . '" id="' . $id . '"> ';
		} ?>

		<input type="hidden" name="action" value="myfilter" aria-hidden="true">
	</form>

<?php endif; ?>