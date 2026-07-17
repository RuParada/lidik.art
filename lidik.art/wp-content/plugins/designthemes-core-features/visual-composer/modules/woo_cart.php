<?php add_action( 'vc_before_init', 'dt_sc_woo_cart_vc_map' );
function dt_sc_woo_cart_vc_map() {
	vc_map( array(
		"name" => esc_html__( "RedArt Cart", 'dtthemes-core' ),
		"base" => "dt_sc_woo_cart",
		"icon" => "dt_sc_woo_cart",
		"category" => esc_html__( 'WooCommerce', 'dtthemes-core' ),
		"params" => array(
			# Class
			array(
				"type" => "textfield",
				"heading" => esc_html__( "Extra class name", 'designthemes-core' ),
				"param_name" => "class",
				'description' => esc_html__('Add a class name and refer to it in custom CSS','designthemes-core')
			)
		)
	) );
}?>