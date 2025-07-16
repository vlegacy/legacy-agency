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
	<!-- Google Tag Manager -->
<script>(function(w,d,s,l,i){w[l]=w[l]||[];w[l].push({'gtm.start':
new Date().getTime(),event:'gtm.js'});var f=d.getElementsByTagName(s)[0],
j=d.createElement(s),dl=l!='dataLayer'?'&l='+l:'';j.async=true;j.src=
'https://www.googletagmanager.com/gtm.js?id='+i+dl;f.parentNode.insertBefore(j,f);
})(window,document,'script','dataLayer','GTM-WXZ2FWD');</script>
<!-- End Google Tag Manager -->
	<?php echo get_field('scripts', 'option'); ?>
	<meta charset="<?php bloginfo('charset'); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<?php wp_head(); ?>
	<?php echo get_field('styles', 'option')?>
</head>
	<!-- Google tag (gtag.js) -->
<script async src="https://www.googletagmanager.com/gtag/js?id=G-L0PHBY1YXM"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'G-L0PHBY1YXM');
</script>
<style>
	#preloader {
		position: fixed;
		display: flex;
		flex-wrap: wrap;
		flex-direction: row;
		justify-content: center;
		align-items: center;
		width: 100vw;
		height: 100vh;
		z-index: 100;
		top: 0;
		left: 0;
		font-size: 48px;
		font-weight: bold;
		text-align: center;
		transition: opacity ease-in-out 1.5s;
		background: #0b0d0f;
		/* opacity: 0; */
		pointer-events: none;
	}

	.show {
		opacity: 1;
		/* transition: opacity ease-in-out 1.5s; */
	}

	.hidden {
		opacity: 0;
		pointer-events: none;
	}

	.word {
		margin: 0;
		padding: 0;
		position: absolute;
		width: 100%;
		top: 50%;
		bottom: 50%;
		line-height: 0px;
		filter: contrast(10);
	}

	.word div {
		width: 100%;
		text-align: center;
		position: absolute;
		font-size: 20rem;
		margin: 0;
		color: #fff;
		font-size: 170px;
		margin: 0;
		text-shadow: 4px 4px 120px rgba(0, 0, 0, 1),
			-4px -4px 120px rgba(0, 0, 0, 1), -4px 4px 120px rgba(0, 0, 0, 1),
			4px -4px 120px rgba(0, 0, 0, 1);
	}

	@keyframes anim {
		0% {
			opacity: 0;
			filter: blur(28px);
		}

		10% {
			opacity: 0;
		}

		90% {
			opacity: 1;
		}

		100% {
			opacity: 1;
			filter: blur(6px);
		}
	}

	.A {
		animation: anim 4s infinite alternate-reverse;
	}

	.B {
		animation: anim 4s infinite alternate;
	}
</style>


<body class="smooth-scroll" <?php body_class(); ?>>
<!-- Google Tag Manager (noscript) -->
<noscript><iframe src="https://www.googletagmanager.com/ns.html?id=GTM-WXZ2FWD"
height="0" width="0" style="display:none;visibility:hidden"></iframe></noscript>
<!-- End Google Tag Manager (noscript) -->
	<?php if (is_front_page()): ?>
		<div id="preloader" class="show">
			<div class="word">
				<div class="A">load</div>
				<div class="B">hello</div>
			</div>
		</div>
	<?php endif; ?>


	<script>
		if (sessionStorage.getItem("preloaderShown")) {
			document.write('<style>#preloader { opacity: 0; visibility: hidden; }</style>');
		}
	</script>
	<script>
		window.addEventListener("load", () => {
			const preloader = document.getElementById("preloader");

			if (preloader && preloader.classList.contains("show")) {

				sessionStorage.setItem("preloaderShown", "true");

				preloader.classList.remove("show");
				preloader.classList.add("hidden");
			}
		});
	</script>

	<?php wp_body_open(); ?>
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
					<?php echo $legacytheme_description; // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
					?>
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
						<a href="#" class="btn-base js-scrollto-form">Send Request
							<!-- <span class="icon-arrow">
								<svg width="100%" height="100%" viewBox="0 0 21 13" fill="currentcolor"
									xmlns="http://www.w3.org/2000/svg">
									<path
										d="M20.5303 7.03033C20.8232 6.73744 20.8232 6.26256 20.5303 5.96967L15.7574 1.1967C15.4645 0.903806 14.9896 0.903806 14.6967 1.1967C14.4038 1.48959 14.4038 1.96447 14.6967 2.25736L18.9393 6.5L14.6967 10.7426C14.4038 11.0355 14.4038 11.5104 14.6967 11.8033C14.9896 12.0962 15.4645 12.0962 15.7574 11.8033L20.5303 7.03033ZM0 7.25H20V5.75H0V7.25Z"
										fill="currentcolor" />
								</svg>
							</span> -->
						</a>
						<!-- <?php
									$contact_email = get_theme_mod('contact_email', '');
									$contact_phone = get_theme_mod('contact_phone', '');

									echo '<a href="mailto:' . esc_attr($contact_email) . '" class="contact-link">' . esc_html($contact_email) . '</a>';
									echo '<a href="tel:' . esc_attr($contact_phone) . '" class="contact-link">' . esc_html($contact_phone) . '</a>';
									?> -->
					</div>
				</div>
			</nav>
		</div>
	</header>
	<div id="page_wrap" class="webgl-mouse">
		<div class="wrapper" id="content-scroll">
			<!--  header -->
			<a class="skip-link screen-reader-text" href="#primary">
				<?php esc_html_e('Skip to content', 'legacytheme'); ?>
			</a>

			<!-- / header -->
			<?php if (is_front_page()) { ?>
				<div id="webgl-container">
					<canvas id="webgl-canvas" class="home-bg__animation"></canvas>
				</div>
			<?php
			}
			?>