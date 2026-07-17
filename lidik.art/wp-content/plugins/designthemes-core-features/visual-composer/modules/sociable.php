<?php add_action( 'vc_before_init', 'dt_sc_sociable_vc_map' );
function dt_sc_sociable_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Sociable", 'dtthemes-core' ),
		"base" => "dt_sc_sociable",
		"icon" => "dt_sc_sociable",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("To show sociables configured in admin panel, RedArt Options -> Layout -> Sociable",'dtthemes-core'),
		"params" => array(

			# Link Target
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Target','dtthemes-core'),
				'param_name' => 'target',
				'value' => array(
					esc_html__('Blank','dtthemes-core') => '_blank',
					esc_html__('New','dtthemes-core') => '_new',
					esc_html__('Parent','dtthemes-core') => '_parent',
					esc_html__('Self','dtthemes-core') => '_self',
					esc_html__('Top','dtthemes-core') => '_top'
				),
				'std' => '_blank'
			),

			# Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'dtthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular element differently - add a class name and refer to it in custom CSS','dtthemes-core')
      		)
		)
	) );
} ?>