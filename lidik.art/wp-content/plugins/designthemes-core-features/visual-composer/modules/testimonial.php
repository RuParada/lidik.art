<?php add_action( 'vc_before_init', 'dt_sc_testimonial_vc_map' );
function dt_sc_testimonial_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Testimonial", 'dtthemes-core' ),
		"base" => "dt_sc_testimonial",
		"icon" => "dt_sc_testimonial",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__( 'Type', 'dtthemes-core' ),
				'description' => esc_html__( 'Select testimonial type', 'dtthemes-core' ),
				'param_name' => 'type',
				'value' => array(
					esc_html__('Classic','dtthemes-core') => 'type1',
					esc_html__('Tool Tip','dtthemes-core') => 'type2',
					esc_html__('Classic Alt','dtthemes-core') => 'type3',
					esc_html__('Minimal','dtthemes-core') => 'type4',
					esc_html__('Minimal Seperated','dtthemes-core') => 'type5'
				),
				'std' => 'type1'
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','dtthemes-core'),
                'param_name' => 'image'
            ),

			# Name
			array(
				'type' => 'textfield',
				'param_name' => 'name',
				'heading' => esc_html__( 'Name', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter name', 'dtthemes-core' )
			),

			# Role
			array(
				'type' => 'textfield',
				'param_name' => 'role',
				'heading' => esc_html__( 'Role', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter role', 'dtthemes-core' )
			),

      		// Content
            array(
            	'type' => 'textarea_html',
            	'heading' => esc_html__('Content','dtthemes-core'),
            	'param_name' => 'content',
            	'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at.Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
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
} ?>