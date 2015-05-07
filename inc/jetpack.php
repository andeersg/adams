<?php
/**
 * Jetpack Compatibility File
 * See: https://jetpack.me/
 *
 * @package Adams
 */

/**
 * Add theme support for Infinite Scroll.
 * See: https://jetpack.me/support/infinite-scroll/
 */
function adams_jetpack_setup() {
	add_theme_support( 'infinite-scroll', array(
		'container' => 'main',
		'render'    => 'adams_infinite_scroll_render',
		'footer'    => 'page',
	) );
} // end function adams_jetpack_setup
add_action( 'after_setup_theme', 'adams_jetpack_setup' );

function adams_infinite_scroll_render() {
	while ( have_posts() ) {
		the_post();
		get_template_part( 'template-parts/content', get_post_format() );
	}
} // end function adams_infinite_scroll_render