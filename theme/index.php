<?php
	/*
	Template Name: Home
	*/

	get_header();
?>

		<div class="contentContainer contentContainer--home" role="main">
			<section class="intro">
				<div class="intro__copy-container borderLink">
					<?php the_field('home_copy_acf'); ?>
				</div>
			</section>

			<?php if( !post_password_required($post) ): ?>
				<section class="grid">
					<h2 class="grid__title"><?php the_field('home_grid_title_acf'); ?></h2>

					<div class="grid__list grid_list--home">
						<?php if( have_rows('home_grid_items_acf') ): while( have_rows('home_grid_items_acf') ): the_row(); ?>
							<?php
								// Feilds from parent repeater – grid items
								$post_object = get_sub_field('post_acf');
								if( $post_object ) : $post = $post_object;
							?>

							<?php if( have_rows('title_options_acf') ): while( have_rows('title_options_acf') ): the_row(); ?>
								<?php
									// Feilds from child repeater – title options
									$color = get_sub_field('color_acf');
									$visibility = get_sub_field('visibility_acf');
								?>
							<?php endwhile; endif; ?>

							<?php if( have_rows('post_details_list_acf') ): while( have_rows('post_details_list_acf') ): the_row(); ?>
								<?php
									// Feilds from child repeater – title options
									$client = get_sub_field('client_acf');
								?>
							<?php endwhile; endif; ?>

							<article class="grid__item grid__item--home">
								<a class="grid__item-link" href="<?php the_permalink(); ?>">
									<img class="grid__item-img" src="<?php the_field('post_grid_image_acf'); ?>" alt="" />

									<div class="grid__item-copy-container">
										<h1 class="grid__item-title <?php echo $color ?> <?php echo $visibility ?>">
											<span><?php echo $client ?></span>
											<?php the_title(); ?>
										</h1>
									</div>
								</a>
							</article>

							<?php wp_reset_postdata(); endif; //ACF Post Object ?>

						<?php endwhile; endif; ?>
					</div> <!-- /grid__list -->

					<?php if( have_rows('home_grid_cta_acf') ): while( have_rows('home_grid_cta_acf') ): the_row(); ?>
						<div class="grid__cta grid__cta--home">
							<a href="<?php the_sub_field('link_acf'); ?>">
								<button class="button"><?php the_sub_field('text_acf'); ?></button>
							</a>
						</div>
					<?php endwhile; endif; ?>
				</section> <!-- /grid -->

			<?php else: // If password is needed ?>
				<section>
					<?php the_content(); ?>
				</section>

			<?php endif; // password protect ?>
		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
