<?php
	/*
	Template Name: Resume
	*/

	get_header();
?>
		<?php if( !post_password_required($post) ): ?>

			<div class="contentContainer contentContainer--resume" role="main">
				<section class="">

				</section>
			</div> <!-- /main -->

			<aside class="">
				<section class="">

				</section>
			</aside> <!-- /aside -->

		<?php endif; //post_password_required ?>

		<?php the_content(); ?>
<?php get_footer(); ?>
