<?php add_action( 'vc_before_init', 'dt_sc_hr_timeline_entry_vc_map' );
function dt_sc_hr_timeline_entry_vc_map() {
	vc_map( array(
		"name" => esc_html__( "Timeline Entry", 'dtthemes-core' ),
		"base" => "dt_sc_hr_timeline_entry",
		"icon" => "dt_sc_horizontal_timeline",
		"category" => DT_VC_CATEGORY,
		'as_child' => array( 'only' => 'dt_sc_horizontal_timeline' ),
		'description' => esc_html__( 'Section for Timeline entries', 'dtthemes-core' ),
		"params" => array(

			# Title
			array(
				'type' => 'textfield',
				'param_name' => 'title',
				'heading' => esc_html__( 'Title', 'dtthemes-core' ),
      			'admin_label' => true,
				'description' => esc_html__( 'Enter title', 'dtthemes-core' )
			),

			# Image
            array(
            	'type' => 'attach_image',
            	'heading' => esc_html__('Image','dtthemes-core'),
            	'param_name' => 'url'
            ),

			# Content
      		array(
      			'type' => 'textarea_html',
      			'heading' => esc_html__( 'Content', 'dtthemes-core' ),
      			'param_name' => 'content',
				'value' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.'
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

}?>