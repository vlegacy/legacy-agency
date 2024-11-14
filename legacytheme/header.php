<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LegacyTheme
 */

?>
<!doctype html>
<html <?php language_attributes(); ?>>

<head>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
</head>

<body class="smooth-scroll" <?php body_class(); ?>>
	<?php wp_body_open(); ?>
	<div id="page_wrap" class="webgl-mouse">
		<div class="wrapper" id="content-scroll">
			<!--  header -->
			<a class="skip-link screen-reader-text" href="#primary">
				<?php esc_html_e('Skip to content', 'legacytheme'); ?>
			</a>
			<header class="header">
				<div class="container">
					<?php
					$custom_logo_id = get_theme_mod('custom_logo');
					$custom_logo_url = wp_get_attachment_image_src($custom_logo_id, 'full');

					if ($custom_logo_id) {

						?>
						<a href="<?php echo esc_url(home_url('/')); ?>" class="logo-holder">
							<img src="<?php echo esc_url($custom_logo_url[0]); ?>" alt="<?php bloginfo('name'); ?>" />
						</a>
						<?php
					} else {

						?>
						<a href="<?php echo esc_url(home_url('/')); ?>" class="logo-holder">
							<img src="<?php echo get_template_directory_uri(); ?>/assets/images/logo.svg" alt="<?php bloginfo('name'); ?>" />
						</a>
						<?php
					}



					$legacytheme_description = get_bloginfo('description', 'display');
					if ($legacytheme_description || is_customize_preview()):
						?>
						<p class="site-description">
							<?php echo $legacytheme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped ?>
						</p>
					<?php endif; ?>
					<nav class="main-navigation" id="site-navigation">
						<div class="inner-holder">
							<?php
							wp_nav_menu(
								array(
									'theme_location' => 'menu-1',
									'menu_id' => 'primary-menu',
								)
							);
							?>
							<div class="contact-info-block">
								<?php
								$contact_email = get_theme_mod('contact_email', '');
								$contact_phone = get_theme_mod('contact_phone', '');

								echo '<a href="mailto:' . esc_attr($contact_email) . '" class="contact-link">' . esc_html($contact_email) . '</a>';
								echo '<a href="tel:' . esc_attr($contact_phone) . '" class="contact-link">' . esc_html($contact_phone) . '</a>';
								?>
							</div>
						</div>
					</nav>
				</div>
			</header>
			<!-- / header -->
			<?php if (is_front_page()) { ?>
				<div id="webgl-container">
					<canvas id="webgl-canvas" class="home-bg__animation"></canvas>
				</div>
				<?php
			}
			?>