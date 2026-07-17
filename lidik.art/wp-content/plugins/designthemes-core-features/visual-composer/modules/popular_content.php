<?php add_action( 'vc_before_init', 'dt_sc_popular_content_vc_map' );
function dt_sc_popular_content_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Popular content", 'dtthemes-core' ),
		"base" => "dt_sc_popular_content",
		"icon" => "dt_sc_popular_content",
		"category" => DT_VC_CATEGORY,
		"params" => array(

			# Title
			array(
				'type' => 'textfield',
				'param_name' => 'title',
				'heading' => esc_html__( 'Title', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter title', 'dtthemes-core' )
			),

			# Image
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image','dtthemes-core'),
                'param_name' => 'image'
            ),

			# Duration
			array(
				'type' => 'textfield',
				'param_name' => 'duration',
				'heading' => esc_html__( 'Duration', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter duration', 'dtthemes-core' )
			),

			# Price
			array(
				'type' => 'textfield',
				'param_name' => 'price',
				'heading' => esc_html__( 'Price', 'dtthemes-core' ),
				'description' => esc_html__( 'Enter price', 'dtthemes-core' )
			),

			# Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Add content','dtthemes-core'),
				'param_name' => 'content',
				'value' => ''
			)
		)
	) );
}?>