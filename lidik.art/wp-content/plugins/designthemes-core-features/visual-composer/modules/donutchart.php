<?php add_action( 'vc_before_init', 'dt_sc_donutchart_vc_map' );
function dt_sc_donutchart_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Donut chart", 'dtthemes-core' ),
		"base" => "dt_sc_donutchart",
		"icon" => "dt_sc_donutchart",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			// Label			
			array(
				"type" => "textfield",
      			'admin_label' => true,
      			"heading" => esc_html__( "Label", 'dtthemes-core' ),
      			"param_name" => "title",
      			"description" => esc_html__( "Enter text used as title of donut chart", 'dtthemes-core' ),
      		),

			// Size
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Size', 'dtthemes-core'),
				'param_name' => 'size',
				'admin_label' => true,
				'value' => array(
					esc_html__('Small','dtthemes-core') => 'small',
					esc_html__('Medium','dtthemes-core') => 'medium',
					esc_html__('Large','dtthemes-core') => 'large'					
				),
				'std' => 'medium'
			),

			// Datasize
			array(
				"type" => "textfield",
      			"heading" => esc_html__( "Data size", 'dtthemes-core' ),
      			"param_name" => "datasize",
      			'value' => 100,
      			"description" => esc_html__( "Enter data size", 'dtthemes-core' ),
      		),

			// Datasize
			array(
				"type" => "textfield",
      			"heading" => esc_html__( "Data size", 'dtthemes-core' ),
      			"param_name" => "datapercent",
      			'value' => 60,
      			"description" => esc_html__( "Enter data percentage eg: 70% , give 70 only", 'dtthemes-core' ),
      		),

			// BG Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Background color", 'dtthemes-core' ),
      			"param_name" => "bgcolor",
      			"description" => esc_html__( "Select chart background color", 'dtthemes-core' ),
      			'value' => '#79deff'
      		),

			// FG Color			
			array(
				"type" => "colorpicker",
      			"heading" => esc_html__( "Foreground color", 'dtthemes-core' ),
      			"param_name" => "fgcolor",
      			"description" => esc_html__( "Select chart foreground color", 'dtthemes-core' ),
      			'value' => '#666666'
      		)      		      		      					
		)
	) );
}?>