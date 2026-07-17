<?php add_action( 'vc_before_init', 'dt_sc_blockquote_vc_map' );
function dt_sc_blockquote_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__( "Blockquote", 'dtthemes-core' ),
            "base" => "dt_sc_blockquote",
		"icon" => "dt_sc_blockquote",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Types
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Types', 'dtthemes-core' ),
      			'param_name' => 'type',
                        'admin_label' => true,
      			'value' => array( esc_html__('Classic','dtthemes-core') => 'type1', esc_html__('With Icon','dtthemes-core') => 'type2' ),
      			'description' => esc_html__( 'Select blockquote type', 'dtthemes-core' ),
      		),

			# Align
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Align', 'dtthemes-core' ),
      			'param_name' => 'align',
                        'admin_label' => true,
                        'value' => array( 
      				esc_html__('None','dtthemes-core') => '',
      				esc_html__('Left','dtthemes-core') => 'alignleft',
      				esc_html__('Center','dtthemes-core') => 'aligncenter',
      				esc_html__('Right','dtthemes-core') => 'alignright',
      			),
      			'description' => esc_html__( 'Select blockquote type', 'dtthemes-core' ),
      		),

      		# Cite
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Cite", 'dtthemes-core' ),
      			"param_name" => "cite"
      		),

      		# Role
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Role", 'dtthemes-core' ),
      			"param_name" => "role"
      		),

      		// Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','dtthemes-core'),
				'param_name' => 'content',
				'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
            ),
			
			# Variation
            array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Border Color', 'dtthemes-core' ),
				'admin_label' => true,
				'param_name' => 'variation',
				'value' => $variations,
				'description' => esc_html__( 'Select Border color', 'dtthemes-core' ),
            ),
			
			# Custom Text Color
      		array(
      			'type' => 'colorpicker',
      			'heading' => esc_html__( 'Custom Border color', 'dtthemes-core' ),
      			'param_name' => 'bordercolor',
				'dependency' => array( 'element' => 'variation', 'value' =>'-' ),
      			'description' => esc_html__( 'Select Border color', 'dtthemes-core' ),
      		)
		)
	) );	
} ?>