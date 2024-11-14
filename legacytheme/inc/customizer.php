<?php
/**
 * LegacyTheme Theme Customizer
 *
 * @package LegacyTheme
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function legacytheme_customize_register($wp_customize)
{
	$wp_customize->get_setting('blogname')->transport = 'postMessage';
	$wp_customize->get_setting('blogdescription')->transport = 'postMessage';
	$wp_customize->get_setting('header_textcolor')->transport = 'postMessage';

	if (isset($wp_customize->selective_refresh)) {
		$wp_customize->selective_refresh->add_partial(
			'blogname',
			array(
				'selector' => '.site-title a',
				'render_callback' => 'legacytheme_customize_partial_blogname',
			)
		);
		$wp_customize->selective_refresh->add_partial(
			'blogdescription',
			array(
				'selector' => '.site-description',
				'render_callback' => 'legacytheme_customize_partial_blogdescription',
			)
		);
	}


	$wp_customize->add_section(
		'footer_section',
		array(
			'title' => esc_html__('Налаштування футера', 'legacytheme'),
			'priority' => 25,
		)
	);

	// soc-links
	$wp_customize->add_section(
		'social_links',
		array(
			'title' => esc_html__('Посилання на соціальні мережі', 'legacytheme'),
			'priority' => 30,
		)
	);

	$social_networks = array('dribbble', 'behance', 'telegram', 'instagram');

	foreach ($social_networks as $network) {
		$wp_customize->add_setting(
			$network . '_link',
			array(
				'default' => '',
				'sanitize_callback' => 'esc_url_raw',

			)
		);

		$wp_customize->add_control(
			$network . '_link',
			array(
				'label' => ucfirst($network) . ' ' . esc_html__('Link', 'legacytheme'),
				'section' => 'social_links',
				'type' => 'text',
				'section' => 'footer_section',
			)
		);
	}


	// copyright
	$wp_customize->add_section(
		'copyright_section',
		array(
			'title' => esc_html__('Копірайт', 'legacytheme'),
			'priority' => 40,
		)
	);

	$wp_customize->add_setting(
		'copyright_text',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'copyright_text',
		array(
			'label' => esc_html__('Текст копірайту', 'legacytheme'),
			'section' => 'copyright_section',
			'type' => 'text',
			'section' => 'footer_section',
		)
	);


	// section contact
	$wp_customize->add_section(
		'contacts_section',
		array(
			'title' => esc_html__('Контакти', 'legacytheme'),
			'priority' => 35,
		)
	);

	// email
	$wp_customize->add_setting(
		'contact_email',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_email',
		)
	);

	$wp_customize->add_control(
		'contact_email',
		array(
			'label' => esc_html__('Емейл', 'legacytheme'),
			'section' => 'contacts_section',
			'type' => 'email',
		)
	);

	// phone
	$wp_customize->add_setting(
		'contact_phone',
		array(
			'default' => '',
			'sanitize_callback' => 'sanitize_text_field',
		)
	);

	$wp_customize->add_control(
		'contact_phone',
		array(
			'label' => esc_html__('Телефон', 'legacytheme'),
			'section' => 'contacts_section',
			'type' => 'text',
		)
	);
}
add_action('customize_register', 'legacytheme_customize_register');



/**
 * Render the site title for the selective refresh partial.
 *
 * @return void
 */
function legacytheme_customize_partial_blogname()
{
	bloginfo('name');
}

/**
 * Render the site tagline for the selective refresh partial.
 *
 * @return void
 */
function legacytheme_customize_partial_blogdescription()
{
	bloginfo('description');
}

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function legacytheme_customize_preview_js()
{
	wp_enqueue_script('legacytheme-customizer', get_template_directory_uri() . '/js/customizer.js', array('customize-preview'), _S_VERSION, true);
}
add_action('customize_preview_init', 'legacytheme_customize_preview_js');
