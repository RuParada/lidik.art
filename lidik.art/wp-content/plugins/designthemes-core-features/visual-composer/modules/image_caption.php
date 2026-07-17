<?php add_action( 'vc_before_init', 'dt_sc_image_caption_vc_map' );
function dt_sc_image_caption_vc_map() {

	vc_map( array(
		"name" => esc_html__("Image Caption", 'dtthemes-core'),
		"base" => "dt_sc_image_caption",
		"icon" => "dt_sc_image_caption",
		"category" => DT_VC_CATEGORY,
		"description" => esc_html__("Add different types of image caption",'dtthemes-core'),
		"params" => array(

			# Type
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Type', 'dtthemes-core'),
				'param_name' => 'type',
				'value' => array( esc_html__('With Icon','dtthemes-core') => '',
					esc_html__('Pull Out','dtthemes-core') => 'type2',
					esc_html__('Alternate Content','dtthemes-core') => 'type3',
					esc_html__('Classic','dtthemes-core') => 'type4',
					esc_html__('Punched','dtthemes-core') => 'type5',
					esc_html__('Clean','dtthemes-core') => 'type6',
					esc_html__('Modern','dtthemes-core') => 'type7',
				),
			),			

      		# Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Title", 'dtthemes-core' ),
      			"param_name" => "title",
			),
			
			# Title Link
      		array(
				"type"       => "vc_link",
				"heading"    => esc_html__( "Title Link", 'dtthemes-core' ),
				"param_name" => "title_link",
      		),

      		# Sub Title
      		array(
      			"type" => "textfield",
      			"heading" => esc_html__( "Sub Title", 'dtthemes-core' ),
      			"param_name" => "subtitle",
      		), 

			# Image url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'dtthemes-core'),
				'param_name' => 'image',
			),

			# Image Position
			array(
				'type' => 'dropdown',
				'heading' => esc_html__('Image Position', 'dtthemes-core'),
				'param_name' => 'imgpos',
				'value' => array( esc_html__('Default','dtthemes-core') => '', esc_html__('Below Content','dtthemes-core') => 'bottom' )
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

			# Icon url
			array(
				'type' => 'attach_image',
				'heading' => esc_html__('Image URL', 'dtthemes-core'),
				'param_name' => 'iconurl',
				'dependency' => array('element' => 'icon_type','value' => 'icon_url')
			),

			# Content
			array(
				'type' => 'textarea_html',
				'heading' => esc_html__('Content','dtthemes-core'),
				'param_name' => 'content',
				'value' => '<p> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi hendrerit elit turpis, a porttitor tellus sollicitudin at. Class aptent taciti sociosqu ad litora torquent per conubia nostra, per inceptos himenaeos.</p>'
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
} ?>