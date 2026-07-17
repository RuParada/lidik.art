<?php add_action( 'vc_before_init', 'dt_sc_hr_svg_vc_map' );
function dt_sc_hr_svg_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Stamp Divider", 'dtthemes-core' ),
		"base" => "dt_sc_hr_svg",
		"icon" => "dt_sc_hr_svg",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'dtthemes-core'),
				'param_name' => 'type',
				'value' => array( esc_html__('Divider Down','dtthemes-core') => 'stamp-divider-down', esc_html__('Divider Up','dtthemes-core') => 'stamp-divider-up' ),
				'std' => 'stamp-divider-down'
			),

			# Fill Color
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Fill color", 'dtthemes-core' ),
      			"param_name" => "fillcolor",
      			"description" => esc_html__( "Select fill color", 'dtthemes-core' ),
      			"value" => '#ffffff'
      		),

			# Stroke Color
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Stroke color", 'dtthemes-core' ),
      			"param_name" => "strokecolor",
      			"description" => esc_html__( "Select stroke color", 'dtthemes-core' ),
      			"value" => '#ffffff'
      		)			
		)
	) );	
}?>