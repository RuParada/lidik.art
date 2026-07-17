<?php add_action( 'vc_before_init', 'dt_sc_triangle_wrapper_vc_map' );
function dt_sc_triangle_wrapper_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Triangle wrapper", 'dtthemes-core' ),
		"base" => "dt_sc_triangle_wrapper",
		"icon" => "dt_sc_triangle_wrapper",
		"category" => DT_VC_CATEGORY,
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

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','dtthemes-core'),
                'param_name' => 'image'
            ),

            # Link
			array(
				'type' => 'vc_link',
				'heading' => esc_html__('Link','dtthemes-core'),
                'param_name' => 'link'
            ),

			# Type
			array(
				'type' => 'dropdown',
				'param_name' => 'type',
				'heading' => esc_html__('Type','dtthemes-core'),
				'value' => array( esc_html__('Image First','dtthemes-core') => '', esc_html__('Details First','dtthemes-core') => 'alter' )
			)                        						
		)
	) );	
}?>