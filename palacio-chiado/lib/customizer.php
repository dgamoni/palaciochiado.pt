<?php

namespace Roots\Sage\Customizer;

use Roots\Sage\Assets;

/**
 * Add postMessage support
 */
function customize_register($wp_customize) {
  $wp_customize->get_setting('blogname')->transport = 'postMessage';
}
add_action('customize_register', __NAMESPACE__ . '\\customize_register');

/**
 * Customizer JS
 */
function customize_preview_js() {
  wp_enqueue_script('sage/customizer', Assets\asset_path('scripts/customizer.js'), ['customize-preview'], null, true);
}
add_action('customize_preview_init', __NAMESPACE__ . '\\customize_preview_js');

/**
 * Add footer widget
 */
register_sidebar( array(
	'name' => 'Footer Sidebar 1',
	'id' => 'footer-sidebar-1',
	'description' => 'Appears in the footer area',
	'before_widget' => '<div class="footer__item">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="footer__title"><span class="footer__icon icon-location"></span>',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Footer Sidebar 2',
	'id' => 'footer-sidebar-2',
	'description' => 'Appears in the footer area',
	'before_widget' => '<div class="footer__item">',
	'after_widget' => '</div>',
	'before_title' => '<h3 class="footer__title"><span class="footer__icon">@</span>',
	'after_title' => '</h3>',
) );

register_sidebar( array(
	'name' => 'Newsletter Field',
	'id' => 'footer-newsletter',
	'description' => 'Newsletter Field',
	'before_widget' => '<div class="footer__item">',
	'after_widget' => '</div>'
) );

register_sidebar( array(
	'name' => 'Footer Terms',
	'id' => 'footer-terms',
	'description' => 'Terms and Conditions PDF',
	'before_widget' => '<div class="footer__link">',
	'after_widget' => '</div>'
) );
