<?php add_action( 'vc_before_init', 'dt_sc_horizontal_timeline_vc_map' );
function dt_sc_horizontal_timeline_vc_map() {

	class WPBakeryShortCode_dt_sc_horizontal_timeline extends WPBakeryShortCodesContainer {
	}
	class WPBakeryShortCode_dt_sc_hr_timeline_entry extends WPBakeryShortCode {
	}

	vc_map( array(
		"name" => esc_html__( "Horizontal timeline", 'dtthemes-core' ),
		"base" => "dt_sc_horizontal_timeline",
		"icon" => "dt_sc_horizontal_timeline",
		"category" => DT_VC_CATEGORY,
		"content_element" => true,
		"js_view" => 'VcColumnView',
		'as_parent' => array( 'only' => 'dt_sc_hr_timeline_entry' ),
		'description' => esc_html__( 'Tabbed content', 'dtthemes-core' ),		
		"params" => array(

			// Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
      			'admin_label' => true,
				'value' => array(
					esc_html__( 'Classic', 'dtthemes-core' ) => 'type1',
					esc_html__( 'With Image', 'dtthemes-core' ) => 'type2',
				),
				'std' => 'type1',
				'heading' => esc_html__( 'Type', 'dtthemes-core' ),
			),

			// Column
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Columns','dtthemes-core'),
				'param_name' => 'column',
				'value' => array(
					esc_html__('II Columns','dtthemes-core') => 2 ,
					esc_html__('III Columns','dtthemes-core') => 3,
					esc_html__('IV Columns','dtthemes-core') => 4,
				),
				'std' => '3'
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'dtthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','dtthemes-core')
      		)									
		)		
	) );
}?>