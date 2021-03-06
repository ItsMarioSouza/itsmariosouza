<?php
	// Template for Posts

	get_header();
?>

		<div class="contentContainer contentContainer--post" role="main">
			<article class="post">
				<?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>
					<h1 class="post__title"><?php the_title(); ?></h1>

					<?php if( !post_password_required() ): //If password is not needed ?>
						<section class="post__hero">
							<div class="post__hero-container">
								<?php
									$image = get_field('post_hero-image_acf');
									$size = 'full';
									if($image) {
										echo wp_get_attachment_image($image, $size);
									}
								?>
							</div>
						</section>

						<section class="post__content">
							<div class="post__row">
								<?php if( have_rows('post_details_list_acf') ) : while( have_rows('post_details_list_acf') ) : the_row(); ?>
									<div class="post__details">
										<hr />

										<ul class="post__details-list">
											<li>
												<span>Client: </span><?php the_sub_field('client_acf'); ?>
											</li>
											<li>
												<span>Role: </span><?php the_sub_field('role_acf'); ?>
											</li>
										</ul>
									</div>
								<?php endwhile; endif; ?>

									<div class="post__copy post__copy--intro borderLink">
										<?php the_field('post_intro_copy_acf'); ?>
									</div>
							</div>

							<?php
								if( have_rows('post_content_acf') ) : while ( have_rows('post_content_acf') ) : the_row();
									if (get_row_layout() == 'copy_acf') {
										$copy = get_sub_field('text_acf');
										echo '<div class="post__row"><div class="post__copy borderLink">' . $copy . '</div></div>';
									} elseif (get_row_layout() == 'image_acf') {
										$columns = get_sub_field('columns_acf');
										$imageOne = get_sub_field('image_one_acf');
										$imageTwo = get_sub_field('image_two_acf');
										$size = 'full';

										if ($columns == '1') {
											echo '<div class="post__row"><div class="post__image-container"><div class="post__image post__image--single">' . wp_get_attachment_image($imageOne, $size) . '</div></div></div>';
										} elseif ($columns == '2') {
											echo '<div class="post__row"><div class="post__image post__image--double"><div class="post__image-container">' . wp_get_attachment_image($imageOne, $size) . '</div><div class="post__image-container">' . wp_get_attachment_image($imageTwo, $size) . '</div></div></div>';
										}
									}
								endwhile; endif;
							?>
						</section>

					<?php else: //If password is needed ?>
						<section>
							<?php the_content(); ?>
						</section>

					<?php endif; //End password protect ?>

				<?php endwhile; endif; //have posts ?>
			</article>

			<?php
				// ACF Fields
				if( have_rows('post_back_link_acf', 'option') ) : while( have_rows('post_back_link_acf', 'option') ) : the_row();
					$icon = get_sub_field('icon_acf');
					$text = get_sub_field('text_acf');
				endwhile; endif;
			?>

			<section>
				<div class="arrowLink arrowLink--back">
					<a href="/work">
						<i class="<?php echo $icon ?>"></i>
						<span><?php echo $text ?></span>
					</a>
				</div>
			</section>
		</div> <!-- /contentContainer -->

<?php get_footer(); ?>
