<?php
	/*
	Template Name: About
	*/

	get_header();
?>

		<div class="contentContainer contentContainer--about" role="main">
			<section class="about">
				<h1 class="about__title"><?php the_title(); ?></h1>

				<div class="about__content-container">
					<div class="about__image-container">
						<?php $image = get_field('about_image_acf'); ?>
						<img src="<?php echo $image['url']; ?>" alt="<?php echo $image['alt']; ?>" />
					</div>

					<div class="about__details-container">
						<div class="about__row">
							<h2 class="about__name"><?php the_field('about_name_acf'); ?></h2>

							<?php if( have_rows('about_location_acf') ): while( have_rows('about_location_acf') ): the_row(); ?>
								<div class="about__icon-container">
									<i class="<?php the_sub_field('icon_acf'); ?>"></i>
									<span class="about__icon-text"><?php the_sub_field('text_acf'); ?></span>
								</div>
							<?php endwhile; endif;?>

							<div class="about__intro-copy borderLink"><?php the_field('about_intro_copy_acf'); ?></div>
						</div>

						<div class="about__row">
							<ul class="about__link-list">
								<?php if( have_rows('about_icon_link_list_acf') ): while( have_rows('about_icon_link_list_acf') ): the_row(); ?>
									<?php $link = get_sub_field('link_acf'); ?>
									<li>
										<a class="about__icon-container about_icon-container--link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
											<i class="<?php the_sub_field('icon_acf'); ?>"></i>
											<span class="about__icon-text"><?php the_sub_field('text_acf'); ?></span>
										</a>
									</li>
								<?php endwhile; endif; ?>
							</ul>
						</div>
					</div> <!-- /contactInfo -->
				</div>
			</section>
		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
