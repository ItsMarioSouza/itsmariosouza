<?php
	/*
	Template Name: Home
	*/

	get_header();
?>

		<div class="contentContainer contentContainer--home" role="main">
			<section class="intro">
				<div class="intro__copy-container borderLink borderLink--option">
					<?php the_field('home_copy_acf'); ?>
				</div>
			</section>

			<section class="grid">
				<?php if( !post_password_required($post) ): ?>
					<div class="grid__list grid_list--home">
						<?php
							// Arguments
							$args = array(
								'post_type' 		=> 'post',
								'meta_key'			=> 'posts_order_acf',
								'orderby'			=> 'meta_value',
								'order'				=> 'ASC',
							);

							// Query
							$the_query = new WP_Query($args);
						?>

						<!-- Get Posts & Place Them Into Template -->
						<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<?php if( have_rows('post_title_options_acf') ): while( have_rows('post_title_options_acf') ): the_row(); ?>
								<article class="grid__item grid__item--home">
									<a class="grid__item-link" href="<?php the_permalink(); ?>">
										<img class="grid__item-img" src="<?php the_field('post_grid_image_acf'); ?>" alt="" />

										<div class="grid__item-copy-container">
											<h1 class="grid__item-title <?php the_sub_field('color_acf'); ?> <?php the_sub_field('visibility_acf'); ?>">
												<span></span>
												<?php the_title(); ?>
											</h1>
										</div>
									</a>
								</article>
							<?php endwhile; endif;  ?>


						<?php endwhile; else : ?>
							<p><?php esc_html_e('Sorry, no posts to display.'); ?></p>

						<!-- Stop The Loop -->
						<?php endif; ?>

						<!-- Reset The Query -->
						<?php wp_reset_query(); ?>
					</div> <!-- /grid__list -->

				<?php endif; //post_password_required ?>

				<?php the_content(); ?>
			</section>

		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
