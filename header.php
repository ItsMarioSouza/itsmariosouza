<!DOCTYPE html>
<html lang="en" class="nav-closed">
	<head>
		<!-- Meta -->
		<title><?php bloginfo('name'); ?> <?php wp_title("|", true); ?></title>
		<meta charset="UTF-8" />
		<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />
		<meta name="description" content="<?php bloginfo('description'); ?>" />

		<!-- Favicon / Device Images -->
		<!-- Insert favicon code -->

		<?php
			// Iclude WP head
			wp_head();
		?>

		<!-- Fonts --> 
		<link href="https://fonts.googleapis.com/css?family=Inconsolata|Lato:300,300i,400,400i,700,700i" rel="stylesheet">
	</head>

	<body <?php body_class(); ?>>
		<header class="header">
			<div class="header__global-container">
				<div class="header__mobile-container">
					<h1 class="header__logo">
						<a href="/"><?php the_field('header_logo_title_acf', 'option'); ?></a>
					</h1>
					<?php if( have_rows('mobile_nav_acf', 'option') ): while( have_rows('mobile_nav_acf', 'option') ): the_row(); ?>
						<div class="navicon navicon-js <?php the_sub_field('navicon_style_acf'); ?>">
							<span class="navicon__line"></span>
							<span class="navicon__line"></span>
							<span class="navicon__line"></span>
						</div>
					<?php endwhile; endif; ?>
				</div> <!-- /header_mobile-container -->

				<nav class="globalNav globalNav-js">
					<?php wp_nav_menu(array(
						'theme_location' => 'global-nav',
						'container' => false,
						'menu_class' => 'globalNav__list'
					)); ?>

					<ul class="globalNav__social-list">
						<?php if( have_rows('header_icons_acf', 'option') ): while( have_rows('header_icons_acf', 'option') ): the_row(); ?>
							<?php $link = get_sub_field('icon_link_acf'); ?>
							<li class="globalNav__social-item">
								<a href="<?php echo $link['url']; ?>" target="<?php echo $link['target']; ?>">
									<i class="<?php the_sub_field('icon_class_acf'); ?>"></i>
									<span class="hidden"><?php echo $link['title']; ?></span>
								</a>
							</li>
						<?php endwhile; endif; ?>
					</ul>
				</nav>
			</div> <!-- /header_global-container -->
		</header>
