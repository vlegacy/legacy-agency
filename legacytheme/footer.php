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

$telega = get_field('social_telegram', 'option');
$calendly = get_field('social_calendly', 'option');

?>
<!--  footer -->
<footer id="footer" class="footer">
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
				<div class="contact-info-block" id="contact">
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
<?php if ($telega || $calendly) { ?>
	<div class="social_block js-social-block">
		<div class="container social_block__container">
			<div class="social_block__row">
				<div class="social_block__item_col">

					<?php

					if ($telega) { ?>
						<div class="social_block__item">
							<a href="<?php echo $telega; ?>" class="social_block__item_btn social_block__item_btn--telega js-social-link-item">
								<span class="social_block__item_btn_icon">
									<svg width="24" height="24" viewBox="0 0 24 24" fill="none" xmlns="http://www.w3.org/2000/svg">
										<path fill-rule="evenodd" clip-rule="evenodd"
											d="M19.777 4.42997C20.0241 4.32596 20.2946 4.29008 20.5603 4.32608C20.826 4.36208 21.0772 4.46863 21.2877 4.63465C21.4982 4.80067 21.6604 5.02008 21.7574 5.27005C21.8543 5.52002 21.8825 5.79141 21.839 6.05597L19.571 19.813C19.351 21.14 17.895 21.901 16.678 21.24C15.66 20.687 14.148 19.835 12.788 18.946C12.108 18.501 10.025 17.076 10.281 16.062C10.501 15.195 14.001 11.937 16.001 9.99997C16.786 9.23897 16.428 8.79997 15.501 9.49997C13.199 11.238 9.50302 13.881 8.28102 14.625C7.20302 15.281 6.64102 15.393 5.96902 15.281C4.74302 15.077 3.60602 14.761 2.67802 14.376C1.42402 13.856 1.48502 12.132 2.67702 11.63L19.777 4.42997Z"
											fill="#2AABEE" />
									</svg>
								</span>
								<span class="social_block__item_btn_text">Chat Us Now</span>
							</a>
						</div>
					<?php }; ?>
					<?php

					if ($calendly) { ?>
						<div class="social_block__item">
							<a href="<?php echo $calendly; ?>" class="social_block__item_btn social_block__item_btn--calendly js-social-link-item">
								<span class="social_block__item_btn_icon">
									<svg width="24" height="25" viewBox="0 0 24 25" fill="none" xmlns="http://www.w3.org/2000/svg">
										<g clip-path="url(#clip0_2953_16590)">
											<path
												d="M16.4504 16.2116C15.6744 16.9158 14.7063 17.7921 12.9458 17.7921H11.896C10.6234 17.7921 9.4663 17.3199 8.63831 16.4626C7.82948 15.6255 7.38399 14.4794 7.38399 13.2353V11.7648C7.38399 10.5207 7.82948 9.37465 8.63831 8.53747C9.4663 7.68023 10.6234 7.20798 11.896 7.20798H12.9458C14.7063 7.20798 15.6735 8.08435 16.4504 8.78853C17.256 9.51884 17.9521 10.1493 19.8062 10.1493C20.089 10.1494 20.3714 10.1263 20.6506 10.0802C20.6506 10.0746 20.647 10.0695 20.6447 10.0639C20.5335 9.7819 20.4031 9.50824 20.2544 9.24492L19.0147 7.04932C18.4558 6.05964 17.6519 5.2378 16.6839 4.66637C15.7158 4.09494 14.6177 3.79406 13.4999 3.79395H11.02C9.90224 3.79406 8.80415 4.09494 7.83611 4.66637C6.86808 5.2378 6.0642 6.05964 5.50525 7.04932L4.26554 9.24492C3.70669 10.2346 3.41248 11.3573 3.41248 12.5001C3.41248 13.6428 3.70669 14.7655 4.26554 15.7552L5.50525 17.9508C6.06422 18.9404 6.86811 19.7622 7.83615 20.3335C8.80419 20.9049 9.90228 21.2057 11.02 21.2057H13.4999C14.6177 21.2057 15.7158 20.9049 16.6838 20.3335C17.6519 19.7622 18.4558 18.9404 19.0147 17.9508L20.2544 15.7552C20.4031 15.4919 20.5335 15.2182 20.6447 14.9362C20.6447 14.9306 20.6488 14.9255 20.6506 14.9199C20.3714 14.8739 20.089 14.8508 19.8062 14.8508C17.9521 14.8508 17.256 15.4813 16.4504 16.2116Z"
												fill="#006BFF" />
											<path
												d="M12.9458 8.53979H11.896C9.95971 8.53979 8.68713 9.95375 8.68713 11.7639V13.2343C8.68713 15.0445 9.95971 16.4584 11.896 16.4584H12.9458C15.7675 16.4584 15.5475 13.5185 19.8062 13.5185C20.2099 13.5182 20.6128 13.5558 21.0098 13.631C21.139 12.883 21.139 12.1176 21.0098 11.3696C20.6129 11.4451 20.21 11.4829 19.8062 11.4825C15.5462 11.482 15.7675 8.53979 12.9458 8.53979Z"
												fill="#006BFF" />
											<path
												d="M23.4573 14.7056C22.7314 14.1632 21.8945 13.7962 21.0098 13.6323C21.0098 13.6398 21.0075 13.6473 21.0062 13.6543C20.9302 14.088 20.8111 14.5127 20.6506 14.9217C21.3816 15.0373 22.0751 15.3291 22.674 15.7729C22.674 15.7794 22.6704 15.7859 22.6681 15.7929C22.3287 16.9199 21.8157 17.9843 21.1486 18.9461C20.4891 19.8991 19.6883 20.7411 18.775 21.4418C16.5643 23.142 13.8049 23.9214 11.054 23.6224C8.3031 23.3235 5.76562 21.9685 3.95394 19.8311C2.14226 17.6936 1.19136 14.9331 1.29324 12.1067C1.39512 9.28035 2.5422 6.59881 4.50285 4.60353C5.83482 3.2428 7.48809 2.257 9.30237 1.7417C11.1166 1.2264 13.0304 1.19909 14.858 1.66241C16.6856 2.12573 18.3652 3.06397 19.7338 4.38616C21.1024 5.70834 22.1136 7.36962 22.6695 9.20893C22.6717 9.21593 22.6736 9.22246 22.6754 9.229C22.0761 9.67283 21.382 9.96443 20.6506 10.0797C20.811 10.4891 20.9303 10.914 21.0066 11.3481C21.0066 11.3551 21.0066 11.3621 21.0098 11.3686C21.8947 11.2051 22.7316 10.8381 23.4573 10.2953C24.1552 9.76751 24.0201 9.17113 23.9137 8.81834C22.376 3.71082 17.7252 0 12.2264 0C5.47417 0 0 5.59657 0 12.4998C0 19.403 5.47417 25 12.2264 25C17.7252 25 22.376 21.2892 23.9114 16.1831C24.0201 15.8303 24.1552 15.2339 23.4573 14.7056Z"
												fill="#006BFF" />
											<path
												d="M20.6506 10.0796C20.3713 10.1257 20.089 10.1488 19.8061 10.1487C17.952 10.1487 17.256 9.51826 16.4503 8.78795C15.6744 8.08377 14.7062 7.2074 12.9457 7.2074H11.8959C10.6233 7.2074 9.46622 7.67965 8.63823 8.53689C7.8294 9.37407 7.38391 10.5202 7.38391 11.7643V13.2347C7.38391 14.4788 7.8294 15.6249 8.63823 16.4621C9.46622 17.3193 10.6233 17.7916 11.8959 17.7916H12.9457C14.7062 17.7916 15.6735 16.9152 16.4503 16.211C17.256 15.4807 17.952 14.8502 19.8061 14.8502C20.089 14.8502 20.3713 14.8733 20.6506 14.9193C20.811 14.5103 20.9302 14.0856 21.0061 13.6519C21.0061 13.6449 21.0089 13.6374 21.0098 13.6299C20.6128 13.5548 20.2099 13.5171 19.8061 13.5175C15.5461 13.5175 15.7675 16.4574 12.9457 16.4574H11.8959C9.95964 16.4574 8.68707 15.0434 8.68707 13.2333V11.7647C8.68707 9.95458 9.95964 8.54063 11.8959 8.54063H12.9457C15.7675 8.54063 15.5475 11.4805 19.8061 11.4805C20.2099 11.481 20.6128 11.4431 21.0098 11.3676C21.0098 11.3611 21.0098 11.3541 21.0066 11.3471C20.9302 10.9134 20.8109 10.4887 20.6506 10.0796Z"
												fill="#0AE9EF" />
											<path
												d="M20.6506 10.0796C20.3713 10.1257 20.089 10.1488 19.8061 10.1487C17.952 10.1487 17.256 9.51826 16.4503 8.78795C15.6744 8.08377 14.7062 7.2074 12.9457 7.2074H11.8959C10.6233 7.2074 9.46622 7.67965 8.63823 8.53689C7.8294 9.37407 7.38391 10.5202 7.38391 11.7643V13.2347C7.38391 14.4788 7.8294 15.6249 8.63823 16.4621C9.46622 17.3193 10.6233 17.7916 11.8959 17.7916H12.9457C14.7062 17.7916 15.6735 16.9152 16.4503 16.211C17.256 15.4807 17.952 14.8502 19.8061 14.8502C20.089 14.8502 20.3713 14.8733 20.6506 14.9193C20.811 14.5103 20.9302 14.0856 21.0061 13.6519C21.0061 13.6449 21.0089 13.6374 21.0098 13.6299C20.6128 13.5548 20.2099 13.5171 19.8061 13.5175C15.5461 13.5175 15.7675 16.4574 12.9457 16.4574H11.8959C9.95964 16.4574 8.68707 15.0434 8.68707 13.2333V11.7647C8.68707 9.95458 9.95964 8.54063 11.8959 8.54063H12.9457C15.7675 8.54063 15.5475 11.4805 19.8061 11.4805C20.2099 11.481 20.6128 11.4431 21.0098 11.3676C21.0098 11.3611 21.0098 11.3541 21.0066 11.3471C20.9302 10.9134 20.8109 10.4887 20.6506 10.0796Z"
												fill="#0AE9EF" />
										</g>
										<defs>
											<clipPath id="clip0_2953_16590">
												<rect width="24" height="25" fill="white" />
											</clipPath>
										</defs>
									</svg>

								</span>
								<span class="social_block__item_btn_text">Schedule a Meeting</span>
							</a>
						</div>
					<?php }; ?>
				</div>
				<div class="social_block__item social_block__item--button-on">
					<button class="social_block__btn_on js-social-toggler">
						<span class="social_block__btn_on_title js-social-text"> Any Questions?</span>
						<div class="social_block__btn_close js-social-cross">
							<svg width="26" height="25" viewBox="0 0 26 25" fill="none" xmlns="http://www.w3.org/2000/svg">
								<rect x="0.834473" width="24.331" height="24.331" rx="12.1655" fill="white" fill-opacity="0.04" />
								<rect x="1.33447" y="0.5" width="23.331" height="23.331" rx="11.6655" stroke="white"
									stroke-opacity="0.16" />
								<path
									d="M17.1655 14.9175L14.4145 12.166L17.1645 9.415L15.751 8L12.9995 10.751L10.2485 8L8.83447 9.415L11.5845 12.166L8.83447 14.917L10.2495 16.331L12.9995 13.58L15.7495 16.331L17.1655 14.9175Z"
									fill="white" />
							</svg>
						</div>
						<span class="social_block__hand_w">
							<span class="social_block__hand">👋</span>
						</span>
					</button>
				</div>

			</div>

		</div>
	</div>
<?php }; ?>

<?php wp_footer(); ?>
</div>
</body>

</html>