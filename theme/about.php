<?php
	/*
	Template Name: About
	*/

	get_header();
?>

		<div class="contentContainer contentContainer--about" role="main">
			<section class="about">
				<h1 class="about__title"><?php the_title(); ?></h1>

				<?php if( ! post_password_required() ): //If password is not needed ?>
					<div class="about__content-container">
						<div class="about__image-container">
							<?php $image = get_field('about_image_acf'); ?>
							<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
						</div>

						<div class="about__details-container">
							<div class="about__row">
								<ul class="about__link-list">
									<?php if( have_rows('about_icon_link_list_acf') ): while( have_rows('about_icon_link_list_acf') ): the_row(); ?>

										<?php $choice = get_sub_field('link_type_acf'); ?>

										<li>
											<?php if( $choice == 'url' ): //If it's a link ?>
												<?php $link = get_sub_field('link_acf'); ?>

												<a class="icon__container about__icon-container about__icon-container--link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
													<i class="<?php the_sub_field('icon_acf'); ?>"></i>
													<span class="icon__text about__icon-text"><?php the_sub_field('text_acf'); ?></span>
												</a>

											<?php elseif( $choice == 'file' ): //If it's a file ?>
												<?php
													// $window = get_sub_field('window_target_acf');
													//
													// if( $window == 'new' ):
													// 	$target = '_blank';
													// elseif( $window == 'existing' ):
													// 	$target = '';
													// endif;
												?>

												<a class="icon__container about__icon-container about__icon-container--link" href="<?php the_sub_field('file_acf'); ?>" target="_blank">
													<i class="<?php the_sub_field('icon_acf'); ?>"></i>
													<span class="icon__text about__icon-text"><?php the_sub_field('text_acf'); ?></span>
												</a>

											<?php endif; ?>
										</li>

									<?php endwhile; endif; ?>
								</ul>
							</div>
						</div> <!-- /about__details-container -->
					</div>

				<?php
					//If password is needed
					else: the_content();
					//End password protect
					endif;
				?>
			</section>
		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
