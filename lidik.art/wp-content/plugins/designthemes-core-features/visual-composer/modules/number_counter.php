<?php add_action( 'vc_before_init', 'dt_sc_number_counter_vc_map' );
function dt_sc_number_counter_vc_map() {

	global $variations;

	vc_map( array(
		"name" => esc_html__("Counting Number", 'dtthemes-core'),
		"base" => "dt_sc_number_counter",
		"icon" => "dt_sc_number_counter",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add different types of counting number",'dtthemes-core'),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'dtthemes-core'),
				'param_name' => 'type',
				'value' => array( esc_html__('Classic','dtthemes-core') => 'type1', esc_html__('Boxed','dtthemes-core') => 'type2'),
				'std' => 'type1'
			),

			# Icon Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Icon Type', 'dtthemes-core'),
				'param_name' => 'icon_type',
				'value' => array( esc_html__('Icon class','dtthemes-core') => 'icon_class', esc_html__('Image','dtthemes-core') => 'icon_url' )
			),

			# Icon Class
			array(
				'type' => 'textfield',
				'heading' => esc_html__('Icon Class', 'dtthemes-core'),
				'param_name' => 'icon',
				'dependency' => array('element' => 'icon_type','value' => 'icon_class')
			),

			# Image url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'dtthemes-core'),
				'param_name' => 'iconurl',
				'dependency' => array('element' => 'icon_type','value' => 'icon_url')
			),

      		# Variation
      		array(
      			'type' => 'dropdown',
      			'heading' => esc_html__( 'Icon Color', 'dtthemes-core' ),
      			'param_name' => 'iconcolor',
      			'value' => $variations,
				'dependency' => array('element' => 'icon_type','value' => 'icon_class')      			
      		),

      		# Value
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Number Value", 'dtthemes-core' ),
      			"param_name" => "value",
      		),

      		# Append Text
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Append Text", 'dtthemes-core' ),
      			"param_name" => "append",
      		),

      		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'dtthemes-core' ),
      			"param_name" => "title",
      		),

			# Extra Class
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Extra class name", 'dtthemes-core' ),
      			"param_name" => "class",
      			'description' => esc_html__('Style particular icon box element differently - add a class name and refer to it in custom CSS','dtthemes-core')
      		)
		)
	) );	
}?>