<?php add_action( 'vc_before_init', 'dt_sc_hr_custom_vc_map' );
function dt_sc_hr_custom_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Horizontal Custom", 'dtthemes-core' ),
		"base" => "dt_sc_hr_custom",
		"icon" => "dt_sc_hr_custom",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'dtthemes-core'),
				'param_name' => 'type',
				'value' => array( esc_html__('Down Arrow','dtthemes-core') => 'down-arrow',
					esc_html__('Up Arrow','dtthemes-core') => 'up-arrow',
					esc_html__('Up Arrow Bottom','dtthemes-core') => 'up-arrow-bottom',
					esc_html__('Clear','dtthemes-core') => 'clear',
					esc_html__('Shadow','dtthemes-core') => 'shadow'					
				),
				'std' => 'clear'
			),

			# Extra class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'dtthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','dtthemes-core')
      		)			
		)
	) );	
}?>