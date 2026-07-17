<?php add_action( 'vc_before_init', 'dt_sc_hexagon_wrapper_vc_map' );
function dt_sc_hexagon_wrapper_vc_map() {

	class WPBakeryShortCode_dt_sc_hexagon_wrapper extends WPBakeryShortCodesContainer {
	}

	class WPBakeryShortCode_dt_sc_hexagon_item extends WPBakeryShortCode {
	}

	vc_map( array(
		"name" => esc_html__( "Hexagon", 'dtthemes-core' ),
		"base" => "dt_sc_hexagon_wrapper",
		"icon" => "dt_sc_hexagon_wrapper",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_hexagon_item' ),
		'description' => esc_html__( 'Hexagon wrapper', 'dtthemes-core' ),
		"params" => array(

			# Title
			array(
				'type' => 'textfield',
				'param_name' => 'title',
				'heading' => esc_html__( 'Title', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter title', 'dtthemes-core' )
			),

			# Sub Title
			array(
				'type' => 'textfield',
				'param_name' => 'subtitle',
				'heading' => esc_html__( 'Sub title', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter sub title', 'dtthemes-core' )
			),

			# Extra Sub Title
			array(
				'type' => 'textfield',
				'param_name' => 'extratitle',
				'heading' => esc_html__( 'Extra sub title', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter extra sub title', 'dtthemes-core' )
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','dtthemes-core'),
                'param_name' => 'image'
            )												
		)
	) );
}?>