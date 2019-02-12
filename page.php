<?php
	/*
	Template Name: Blog
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

			<?php // get_template_part('/partials/function_parts/filter-items'); ?>

			<section class="grid">
				<h2 class="grid__title"><?php the_field('blog_grid_title_acf'); ?></h2>

				<?php if( ! post_password_required() ): ?>
					<div class="grid__list grid_list--blog">
						<?php
							// Arguments
							$args = array(
								'post_type' 	=> 'post',
								'meta_key' 		=> 'posts_order_acf',
								'orderby' 		=> 'meta_value date',
								'order' 		=> 'DESC',
							);

							// Query
							$the_query = new WP_Query($args);
						?>

						<!-- Get Posts & Place Them Into Template -->
						<?php
							if ( $the_query->have_posts() ) : while ( $the_query->have_posts() ) : $the_query->the_post();
								get_template_part('/partials/function_parts/post-part');
							endwhile; else :
						?>
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

		<!-- <script>
			jQuery(function($){
				$('#filter').submit(function(){
					var filter = $('#filter');
					$.ajax({
						url:filter.attr('action'),
						data:filter.serialize(), // form data
						type:filter.attr('method'), // POST
						beforeSend:function(xhr){
							filter.find('button').text('Processing...');
						},
						success:function(data){
							filter.find('button').text('Apply filter');
							$('.grid__list').html(data); // insert data
						}
					});
					return false;
				});
			});
		</script> -->

<?php get_footer(); ?>
