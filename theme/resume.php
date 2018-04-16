<?php
	/*
	Template Name: Resume
	*/

	get_header();
?>
		<?php if( ! post_password_required() ): //If password is not needed ?>

			<div class="contentContainer contentContainer--resume" role="main">
				<section class="">

				</section>
			</div> <!-- /main -->

			<aside class="">
				<section class="">

				</section>
			</aside> <!-- /aside -->

		<?php
			//If password is needed
			else: the_content();
			//End password protect
			endif;
		?>

<?php get_footer(); ?>
