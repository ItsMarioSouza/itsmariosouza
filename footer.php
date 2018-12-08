		<footer class="footer">
			<div class="footer__social">
				<ul class="footer__social-list">
					<?php if( have_rows('footer_icons_acf', 'option') ): while( have_rows('footer_icons_acf', 'option') ): the_row(); ?>
						<?php $link = get_sub_field('icon_link_acf'); ?>
						<li class="footer__social-item">
							<a class="footer__social-link" href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
								<i class="<?php the_sub_field('icon_class_acf'); ?>"></i>
								<span class="hidden"><?php echo $link['title']; ?></span>
							</a>
						</li>
					<?php endwhile; endif;?>
				</ul>
			</div>

			<div class="footer__copyright">
				<span class="footer__copyright-text"><?php the_field('footer_copyright_acf', 'option'); ?></span>
			</div>
		</footer>

		<div class="modal modal-js"></div>

		<?php wp_footer(); ?>
	</body>
</html>
