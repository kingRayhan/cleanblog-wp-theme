<?php
/**
 * CleanBlog Theme Customizer
 *
 * @package CleanBlog
 */

/**
 * Add postMessage support for site title and description for the Theme Customizer.
 *
 * @param WP_Customize_Manager $wp_customize Theme Customizer object.
 */
function cleanblog_customize_register( $wp_customize ) {

	$wp_customize->add_section('footer_section',array(
		'title' => 'Footer'
	));



	$wp_customize->add_setting('show_copyright_text',array(
		'default' => 'Copyright &copy; Your Website 2016',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('show_copyright_text',array(
		'section' => 'footer_section',
		'type' => 'checkbox',
		'label' => __('Show Copyright text','cleanblog')
	));




	$wp_customize->add_setting('footer_copyright',array(
		'default' => 'Copyright &copy; Your Website 2016',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('footer_copyright',array(
		'section' => 'footer_section',
		'type' => 'textarea',
		'label' => __('Copyright text','cleanblog')
	));


	$wp_customize->add_setting('show_footer_social_icon',array(
		'default' => true,
		'transport' => 'refresh'
	));
	$wp_customize->add_control('show_footer_social_icon',array(
		'section' => 'footer_section',
		'type' => 'checkbox',
		'label' => __('Show social icons','cleanblog')
	));


	$wp_customize->add_setting('social_icons',array(
		'transport' => 'refresh'
	));
	$wp_customize->add_control('social_icons',array(
		'section' => 'footer_section',
		'type' => 'hidden',
		'label' => __('','cleanblog'),
		'description' => __("<h1>Social Icons</h1>Give your social profile url which icons you want to show in footer. <br/><b>NOTE:</b> you must have to put url with <code>http://</code> or <code>https://</code>",'cleanblog')
	));


	/**
	 * Facebook
	 */
	$wp_customize->add_setting('social_icon_Facebook',array(
		'default' => '#',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('social_icon_Facebook',array(
		'label' => __('Facebook','cleanblog'),
		'type' => 'text',
		'section' => 'footer_section'
	));

	/**
	 * Twitter
	 */

	$wp_customize->add_setting('social_icon_Twitter',array(
		'default' => '#',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('social_icon_Twitter',array(
		'label' => __('Twitter','cleanblog'),
		'type' => 'text',
		'section' => 'footer_section'
	));


	/**
	 * GooglePlus
	 */
	$wp_customize->add_setting('social_icon_GooglePlus',array(
		'default' => '#',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('social_icon_GooglePlus',array(
		'label' => __('GooglePlus','cleanblog'),
		'type' => 'text',
		'section' => 'footer_section'
	));


	/**
	 * YouTube
	 */
	$wp_customize->add_setting('social_icon_YouTube',array(
		'default' => '#',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('social_icon_YouTube',array(
		'label' => __('YouTube','cleanblog'),
		'type' => 'text',
		'section' => 'footer_section'
	));


	/**
	 * Github
	 */
	$wp_customize->add_setting('social_icon_Github',array(
		'default' => '#',
		'transport' => 'refresh'
	));
	$wp_customize->add_control('social_icon_Github',array(
		'label' => __('Github','cleanblog'),
		'type' => 'text',
		'section' => 'footer_section'
	));






}
add_action( 'customize_register', 'cleanblog_customize_register' );

/**
 * Binds JS handlers to make Theme Customizer preview reload changes asynchronously.
 */
function cleanblog_customize_preview_js() {
	wp_enqueue_script( 'cleanblog_customizer', get_template_directory_uri() . '/js/customizer.js', array( 'customize-preview' ), '20151215', true );
}
add_action( 'customize_preview_init', 'cleanblog_customize_preview_js' );
