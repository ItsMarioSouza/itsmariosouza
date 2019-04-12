<?php
	// Get grid animation from work page, id 2
	$animation = get_field('blog_grid_item_animation_acf', 2);
?>


<?php if( have_rows('post_title_options_acf') ): while( have_rows('post_title_options_acf') ): the_row(); ?>

	<?php if( have_rows('post_details_list_acf') ): while( have_rows('post_details_list_acf') ): the_row(); ?>
		<?php
			// Feilds from child repeater
			$client = get_sub_field('client_acf');
		?>
	<?php endwhile; endif; ?>

	<article class="grid__item grid__item--blog" data-aos="<?php echo $animation ?>">
		<a class="grid__item-link" href="<?php the_permalink(); ?>">

			<?php
				$image = get_field('post_grid_image_acf');
				$size = 'full';
				if($image) {
					echo wp_get_attachment_image($image, $size, false, ['class' => 'grid__item-img']);
				}
			?>

			<div class="grid__item-copy-container">
				<h1 class="grid__item-title <?php the_sub_field('color_acf'); ?> <?php the_sub_field('visibility_acf'); ?>">
					<span><?php echo $client ?></span>
					<?php the_title(); ?>
				</h1>
			</div>
		</a>
	</article>
<?php endwhile; endif; ?>