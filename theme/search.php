<?php
	// Template for Search Results

	get_header();
?>

		<div class="contentContainer contentContainer--error" role="main">
			<section class="error404">
				<div class="error404__container">
					<h1 class="error404__headline error__headline--option"><?php the_field('error404_headline_acf', 'options'); ?></h1>

					<div class="error4-4__content borderLink borderLink--option">
						<?php the_field('error404_content_acf', 'options'); ?>
					</div>
				</div>
			</section>
		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
