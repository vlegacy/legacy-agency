<?php
/**
 * The template for displaying the footer
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package LegacyTheme
 */

?>
<!--  footer -->
<footer class="footer">
	<div class="container">
		<div class="ready-work">
			<div class="container container-md">
				<span class="section-title">
					<span><span>Ready to work</span> <br><span class="text-gradient">together</span> <span class="mark">?</span></span>
				</span>
				<div class="text-holder intro-text">
					<p>Please fill out the form below and we will contact you as soon as possible.</p>
				</div>
			</div>
		</div>
		<div class="row">
			<div class="col-3">
				<div class="footer-group">
					<p class="menu-title">
						Where <br>
						you can <br>
						follow us?
					</p>
					<ul>
						<?php
						$dribbble_link = get_theme_mod('dribbble_link', '');
						$behance_link = get_theme_mod('behance_link', '');
						$telegram_link = get_theme_mod('telegram_link', '');
						$instagram_link = get_theme_mod('instagram_link', '');

						if ($dribbble_link) {
							echo '<li><a href="' . esc_url($dribbble_link) . '" target="_blank">Dribbble</a></li>';
						}

						if ($behance_link) {
							echo '<li><a href="' . esc_url($behance_link) . '" target="_blank">Behance</a></li>';
						}

						if ($telegram_link) {
							echo '<li><a href="' . esc_url($telegram_link) . '" target="_blank">Telegram</a></li>';
						}

						if ($instagram_link) {
							echo '<li><a href="' . esc_url($instagram_link) . '" target="_blank">Instagram</a></li>';
						}
						?>
					</ul>
				</div>
				<div class="contact-info-block">
					<?php
					$contact_email = get_theme_mod('contact_email', '');
					$contact_phone = get_theme_mod('contact_phone', '');

					echo '<a href="mailto:' . esc_attr($contact_email) . '" class="contact-link">' . esc_html($contact_email) . '</a>';
					echo '<a href="tel:' . esc_attr($contact_phone) . '" class="contact-link">' . esc_html($contact_phone) . '</a>';
					?>
				</div>
			</div>
			<div class="col-9">
				<div class="contact-form">
					<?php echo do_shortcode('[contact-form-7 id="c6967a7" title="Контактна форма 1"]'); ?>
				</div>
			</div>
		</div>
		<?php
		$copyright_text = get_theme_mod('copyright_text', '');

		if (!empty($copyright_text)) {
			echo '<p class="copyright">' . esc_html($copyright_text) . '</p>';
		}
		?>
	</div>
</footer>
<!-- / footer -->
</div>
<div class="mobile-menu">
	<?php
	wp_nav_menu(
		array(
			'theme_location' => 'menu-1',
			'menu_id' => 'primary-menu',
		)
	);
	?>
</div>
<?php if (is_front_page()) { ?>
	<div class="popup-wrap">
		<div class="popup-eclipse" custom-cursor="cursor-close"></div>
		<div class="popup">
			<div class="popup-inner">
				<div class="media-preloader">
					<div class="media-preloader-inner"></div>
				</div>
				<div class="video-holder" style="padding:56.25% 0 0 0;position:relative;">
					<?php $properties = function_exists('get_fields') ? get_fields() : []; ?>
					<?php if (!empty($properties['home_video'])): ?>
						<video loop="loop" autoplay="autoplay" preload="auto" muted="muted" id="home-modal-video" playsinline="" poster="" src="<?= $properties['home_video']['url'] ?>"></video>
					<?php endif; ?>
				</div>
			</div>
		</div>
	</div>
	<?php
}
?>
<span class="cursor">
	<span class="cursor-inner"></span>
	<span class="cursor-border">
		<span class="cursor-click">
			<span class="pulse-click">
			</span>
		</span>
	</span>
</span>
<?php wp_footer(); ?>
</div>
</body>

</html>