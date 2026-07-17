<?php add_action( 'vc_before_init', 'dt_sc_progress_bar_vc_map' );
function dt_sc_progress_bar_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Progress Bar", 'dtthemes-core' ),
		"base" => "dt_sc_progress_bar",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Style
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Style', 'dtthemes-core'),
				'param_name' => 'type',
				'admin_label' => true,
				'value' => array(
					esc_html__('Standard','dtthemes-core') => 'standard',
					esc_html__('Striped','dtthemes-core') => 'progress-striped',
					esc_html__('Active Striped','dtthemes-core') => 'progress-striped-active'					
				),
				'std' => 'progress-striped'
			),

			// Label			
			array(
				"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Label", 'dtthemes-core' ),
      			"param_name" => "text",
      			"description" => esc_html__( "Enter text used as title of bar", 'dtthemes-core' ),
      		),

			// Value			
			array(
				"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Value", 'dtthemes-core' ),
      			"param_name" => "value",
      			"description" => esc_html__( "Enter value of bar", 'dtthemes-core' ),
      		),

			// Colorpicker			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Color", 'dtthemes-core' ),
      			"param_name" => "color",
      			"description" => esc_html__( "Select bar background color", 'dtthemes-core' ),
      		),      				
		)
	) );
}?>