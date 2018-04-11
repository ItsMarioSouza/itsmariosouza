<?php
	/*
	Template Name: Home
	*/

	get_header();
?>

		<div class="contentContainer contentContainer--home" role="main">
			<section class="intro">

				<?php if( have_rows('home_hero_image_acf') ): ?>
					<?php while( have_rows('home_hero_image_acf') ): the_row(); ?>
						<picture class="intro__image">
							<source media="(max-width: 767px)" srcset="<?php the_sub_field('image_mobile_acf'); ?>">

							<img src="<?php the_sub_field('image_desktop_acf'); ?>" alt="">
						</picture>
					<?php endwhile; ?>
				<?php endif; ?>

				<div class="intro__copy borderLink borderLink--option">
					<h1><?php the_field('home_headline_acf'); ?></h1>

					<?php the_field('home_copy_acf'); ?>
				</div>
			</section>

			<section class="grid">
				<ul class="grid__list grid_list--home">

					<?php
						// Arguments
						$args = array(
							'post_type' 		=> 'post',
							'posts_per_page' 	=> 3,
							'meta_key'			=> 'posts_order_acf',
							'orderby'			=> 'meta_value',
							'order'				=> 'ASC',
						);

						// Query
						$the_query = new WP_Query($args);
					?>

					<!-- Get Posts & Place Them Into Template -->
					<?php if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post(); ?>

						<?php if( have_rows('home_grid_items_acf') ): while( have_rows('home_grid_items_acf') ): the_row(); ?>
							<?php
								// Feilds from parent repeater – grid items
								$link = get_sub_field('link_acf');
								$image = get_sub_field('image_acf');
								$title = get_sub_field('title_acf');
							?>

							<?php if( have_rows('title_options_acf') ): while( have_rows('title_options_acf') ): the_row(); ?>
								<?php
									// Feilds from child repeater – title options
									$color = get_sub_field('color_acf');
									$visibility = get_sub_field('visibility_acf');
								?>
							<?php endwhile; endif; ?>

							<li class="grid__item grid__item--home">
								<a class="grid__item-link" href="<?php the_permalink(); ?>">
									<img class="grid__item-img" src="<?php echo $image ?>" alt="" />

									<div class="grid__item-copy-container">
										<h1 class="grid__item-title <?php echo $color ?> <?php echo $visibility ?>">
											<span><!-- ADD CLIENT FIELD --></span>
											<?php echo $title ?>
										</h1>
									</div>
								</a>
							</li>
						<?php endwhile; endif; //home grid items loop ?>


					<?php endwhile; else : ?>
						<p><?php esc_html_e('Sorry, no posts to display.'); ?></p>

					<!-- Stop The Loop -->
					<?php endif; ?>

					<!-- Reset The Query -->
					<?php wp_reset_query(); ?>

				</ul> <!-- /grid__list -->
			</section>

		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
