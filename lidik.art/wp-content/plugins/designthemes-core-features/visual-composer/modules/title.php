<?php add_action( 'vc_before_init', 'dt_sc_simple_heading_vc_map' );
function dt_sc_simple_heading_vc_map() {

	vc_map( array(
		"name" => esc_html__( "Simple Heading", 'dtthemes-core' ),
		"base" => 'dt_sc_simple_heading',
		"icon" => 'dt_sc_simple_heading',
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Types
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type','dtthemes-core'),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Simple','dtthemes-core') => 'simple'
				),
				'std' => 'two-border',
				'admin_label' => true
			),

			# Heading Tag
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Heading tag','dtthemes-core'),
				'param_name' => 'tag',
				'value' => array(
					'H1' => 'h1',
					'H2' => 'h2',
					'H3' => 'h3',
					'H4' => 'h4',
					'H5' => 'h5',
					'H6' => 'h6'
				),
				'std' => 'h2',
			),

			# Text
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Text', 'dtthemes-core' ),
				'param_name' => 'text',
				'value' => 'Lorem ipsum dolor'
			),

			# Extra class name
			array(
				'type' => 'textfield',
				'heading' => esc_html__( 'Extra class name', 'dtthemes-core' ),
				'param_name' => 'class',
				'description' => esc_html__( 'Style particular element differently - add a class name and refer to it in custom CSS', 'dtthemes-core' )
      		)			
		)
	) );
}?>