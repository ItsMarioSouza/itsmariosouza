<?php
	/*
	Template Name: Blog
	*/

	/**
	 * @link https://wordpress.stackexchange.com/questions/111376/use-query-string-in-url-to-display-content-on-the-page/111429
	 */

	get_header();
?>

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

				<div class="hero__mario" data-aos="slide-right">
					<img src="/wp-content/themes/itsmariosouza/ux/img/mario.png" />
				</div>
			</section>

			<section class="grid">
				<div class="grid__intro">
					<h2 class="grid__title"><?php the_field('blog_grid_title_acf'); ?></h2>
					<?php get_template_part('/partials/template_parts/work-content-post-filter'); ?>
				</div>

				<?php if( ! post_password_required() ): ?>
					<div class="grid__ajax-response" id="response">test</div>

					<div class="grid__list grid_list--blog">
						<?php get_template_part('/partials/template_parts/work-content-query'); ?>
					</div> <!-- /grid_list -->

				<?php
					//If password is needed
					else : the_content();
					//End password protect
					endif;
				?>
			</section>
		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
