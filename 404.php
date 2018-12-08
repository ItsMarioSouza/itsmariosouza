<?php
	// Template for 404 Error

	get_header();
?>

		<div class="contentContainer contentContainer--error" role="main">
			<section class="error404">
				<div class="error404__container">
					<h1 class="error404__headline"><?php the_field('error_headline_acf', 'options'); ?></h1>

					<div class="error404__content borderLink">
						<?php the_field('error_content_acf', 'options'); ?>
					</div>
				</div>
			</section>
		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
