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

				<section class="grid">
					<h2 class="grid__title"><?php the_field('home_grid_title_acf'); ?></h2>

					<?php if( ! post_password_required() ): //If password is not needed ?>
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
										// Feilds from child repeater
										$client = get_sub_field('client_acf');
									?>
								<?php endwhile; endif; ?>

								<article class="grid__item grid__item--home">
									<a class="grid__item-link" href="<?php the_permalink(); ?>">

										<?php
											$image = get_field('post_grid_image_acf');
											$size = 'full';
											if($image) {
												echo wp_get_attachment_image($image, $size, false, ['class' => 'grid__item-img']);
											}
										?>

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

					<?php
						//If password is needed
						else: the_content();
						//End password protect
						endif;
					?>
				</section> <!-- /grid -->

		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
