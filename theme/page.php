<?php
	/*
	Template Name: Blog
	*/

	get_header();
?>
<?php $animation = get_the_field('blog_grid_item_animation_acf'); ?>

		<div class="contentContainer contentContainer--blog" role="main">
			<section class="hero">
				<?php if( have_rows('blog_headline_options_acf') ): while( have_rows('blog_headline_options_acf') ): the_row(); ?>
					<h1 class="hero__title <?php the_sub_field('color_acf'); ?> <?php the_sub_field('visibility_acf'); ?>"><?php the_title(); ?></h1>
				<?php endwhile; endif; ?>

				<?php if( have_rows('blog_hero_image_acf') ): while( have_rows('blog_hero_image_acf') ): the_row(); ?>
					<picture class="hero__image">
						<source media="(max-width: 767px)" srcset="<?php the_sub_field('image_mobile_acf'); ?>">

						<img src="<?php the_sub_field('image_desktop_acf'); ?>" alt="">
					</picture>
				<?php endwhile; endif; ?>
			</section>

			<section class="grid">
				<h2 class="grid__title"><?php the_field('blog_grid_title_acf'); ?></h2>

				<?php if( ! post_password_required() ): ?>
					<div class="grid__list grid_list--blog">
						<?php
							// Arguments
							$args = array(
								'post_type' 	=> 'post',
								'meta_key' 		=> 'posts_order_acf',
								'orderby' 		=> 'meta_value',
								'order' 		=> 'ASC',
							);

							// Query
							$the_query = new WP_Query($args);
						?>

						<!-- Get Posts & Place Them Into Template -->
						<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

							<?php if( have_rows('post_title_options_acf') ): while( have_rows('post_title_options_acf') ): the_row(); ?>

								<?php if( have_rows('post_details_list_acf') ): while( have_rows('post_details_list_acf') ): the_row(); ?>
									<?php
										// Feilds from child repeater – title options
										$client = get_sub_field('client_acf');
									?>
								<?php endwhile; endif; ?>

								<article class="grid__item grid_item--blog" data-aos="<?php echo $animation ?>">
									<a class="grid__item-link" href="<?php the_permalink(); ?>">
										<img class="grid__item-img" src="<?php the_field('post_grid_image_acf'); ?>" alt="" />

										<div class="grid__item-copy-container">
											<h1 class="grid__item-title <?php the_sub_field('color_acf'); ?> <?php the_sub_field('visibility_acf'); ?>">
												<span><?php echo $client ?></span>
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
					</div> <!-- /grid_list -->

				<?php
					//If password is needed
					else: the_content();
					//End password protect
					endif;
				?>
			</section>
		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
