<?php
function lidikart_setup() {
	add_theme_support( 'title-tag' );
	add_theme_support( 'post-thumbnails' );
	register_nav_menus( array( 'primary' => 'Primary Menu' ) );
}
add_action( 'after_setup_theme', 'lidikart_setup' );

function lidikart_scripts() {
	wp_enqueue_style( 'lidikart-fonts', 'https://fonts.googleapis.com/css2?family=Kurale&family=Golos+Text:wght@400;500;600&family=Comfortaa:wght@700&family=Oswald:wght@400;500&display=swap', array(), null );
	wp_enqueue_style( 'lidikart-style', get_stylesheet_uri(), array( 'lidikart-fonts' ), '3.0.0' );
	wp_enqueue_script( 'lidikart-theme', get_template_directory_uri() . '/js/theme.js', array(), '3.0.0', true );
}
add_action( 'wp_enqueue_scripts', 'lidikart_scripts' );

/* Fallback menu when no WP menu is assigned yet */
function lidikart_default_menu() {
	$base = home_url( '/' );
	echo '<ul>'
		. '<li><a href="' . esc_url( $base . 'gallery/' ) . '">Gallery</a></li>'
		. '<li><a href="' . esc_url( $base . 'murals/' ) . '">Wall Murals</a></li>'
		. '<li><a href="' . esc_url( $base . 'biography/' ) . '">Biography</a></li>'
		. '<li><a href="' . esc_url( $base . 'exhibitions/' ) . '">Exhibitions</a></li>'
		. '<li><a href="' . esc_url( $base . 'contact/' ) . '">Contact</a></li>'
		. '</ul>';
}

/* Helper: theme asset URL */
function lidikart_asset( $path ) {
	return esc_url( get_template_directory_uri() . '/assets/' . ltrim( $path, '/' ) );
}
