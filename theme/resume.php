<?php
	/*
	Template Name: Resume
	*/

	get_header();
?>
		<?php if( ! post_password_required() ): //If password is not needed ?>

			<div class="contentContainer contentContainer--resume" role="main">
				<section class="post__intro">
					<h1 class="post__intro-title">Mario Souza</h1>

					<div class="post__intro-icons">
						<a class="about__icon-container about__icon-container--link" href="#" target="_blank">
							<i class="fal fa-file-alt"></i>
							<span class="about__icon-text">Résumé</span>
						</a>
					</div>
				</section>

				<section class="">

				</section>

				<aside class="">
					<section class="">

					</section>
				</aside> <!-- /aside -->
			</div> <!-- /main -->

		<?php
			//If password is needed
			else: the_content();
			//End password protect
			endif;
		?>

<?php get_footer(); ?>
